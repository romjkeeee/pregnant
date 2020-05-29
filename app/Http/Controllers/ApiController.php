<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use Auth;
use App\City;
use App\Clinic;
use App\Content;
use App\Doctor;
use App\Duration;
use App\Msg;
use App\Patient;
use App\Region;
use App\Review;
use App\Specialization;
use App\AuthHistory;

class ApiController extends Controller
{

    public static $home = 'http://med.weedoo.ru/';

    /* JSON ответ */
    public function json_response($status, $message, $data = null)
    {

        $response = [

            'status'  => $status,
            'message' => $message,

        ];

        if ($data) {
            $response['data'] = $data;
        }

        header('Content-Type: application/json');
        die(json_encode($response, JSON_UNESCAPED_UNICODE));

    }

    /* Проверка токена авторизации */
    public function check_token(Request $request)
    {

        if (!$request->input('token')) {
            Self::json_response(400, 'Token Missing');
        }

        $auth = AuthHistory::where(['token' => $request->input('token')])->first();
        if (!$auth) {
            Self::json_response(400, 'Token Wrong');
        }

        $type = $auth->type;
        $user_id = $auth->user_id;

        if ($type == 'doctor') {
            $user = Doctor::find($user_id);
        } else {
            $user = Patient::find($user_id);
        }

        if (!$user or $user->token !== $request->input('token')) {
            Self::json_response(400, 'Token Wrong');
        }

        return $user->id;

    }

    /* Проверка обязательных полей */
    public function check_required($required, Request $request)
    {

        if (!is_array($required)) {
            return false;
        }

        $data = [];
        foreach ($required as $field) {
            if (!$request->input($field)) {
                $data[] = 'Field "' . $field . '" Required';
            }
        }

        if ($data) {
            Self::json_response(400, 'Parameters Missing', $data);
        }

        return true;

    }


    /* Список отзывов */
    public function get_reviews(Request $request)
    {

        Self::check_token($request);

        if (!$request->input('clinic_id') && !$request->input('doctor_id')) {
            $list = Review::get();
        } else {

            if ($request->input('clinic_id')) {
                $list = Review::where(['is_for' => 'clinic', 'for_id' => $request->input('clinic')])->get();
            }
            if ($request->input('doctor_id')) {
                $list = Review::where(['is_for' => 'doctor', 'for_id' => $request->input('doctor_id')])->get();
            }

        }

        if ($list->count()) {
            foreach ($list as $rec) {

                /* Пациент */
                $this_patient = Patient::find($rec->user_id);
                if ($this_patient) {
                    $rec->patient = $this_patient->toArray();
                }

                /* Кому отзыв */
                if ($rec->is_for == 'doctor') {
                    $this_for = Doctor::find($rec->for_id);
                } else {
                    $this_for = Clinic::find($rec->for_id);
                }

                if ($this_for) {
                    $rec->for = $this_for->toArray();
                }

            }
        }

        Self::json_response(200, 'Success', $list->toArray());

    }

    /* Список новостей */
    public function get_news(Request $request)
    {

        Self::check_token($request);

        $list = Content::where(['post_type' => 'news'])->orderBy('id', 'desc')->get();

        Self::json_response(200, 'Success', $list->toArray());

    }

    /* Список статей */
    public function get_articles(Request $request)
    {

        Self::check_token($request);

        $list = Content::where(['post_type' => 'article'])->orderBy('id', 'desc')->get();

        Self::json_response(200, 'Success', $list->toArray());

    }

    /* Список рекомендаций */
    public function get_recomendations(Request $request)
    {

        Self::check_token($request);

        $list = Content::where(['post_type' => 'reco'])->orderBy('id', 'desc')->get();

        Self::json_response(200, 'Success', $list->toArray());

    }

    /* Список документов */
    public function get_documents(Request $request)
    {

        Self::check_token($request);

        $list = Content::where(['post_type' => 'doc'])->orderBy('id', 'desc')->get();

        Self::json_response(200, 'Success', $list->toArray());

    }


    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /* Старт чата */
    public function chat_start($user_id, Request $request)
    {

        /* Обязательные */
//		$required = [
//
//			'token',
//
//		];
//
//		Self::check_required($required, $request);
        $my_id = auth()->id();

        $chat_id = rand(100000, 999999);

        $new = new Msg;

        $new->chat_id = $chat_id;
        $new->sender_id = $my_id;
        $new->rec_id = $user_id;
        $new->text = 'Привет!';

        $new->save();

        Self::json_response(200, 'Success', ['chat_id' => $chat_id]);

    }

    /* Сообщение в чат */
    public function chat_send($chat_id, Request $request)
    {

        /* Обязательные */
        $required = [

//			'token',
            'text',

        ];

        Self::check_required($required, $request);
        $my_id = auth()->id();

        $chat = Msg::where(['chat_id' => $chat_id])->first();

        $new = new Msg;

        $new->chat_id = $chat_id;
        $new->sender_id = $my_id;
        $new->rec_id = $chat->rec_id;
        $new->text = $request->input('text');

        $new->save();

        Self::json_response(200, 'Success', ['chat_id' => $chat_id, 'message' => $request->input('text')]);

    }

    /* Сообщения чата */
    public function chat_updates($chat_id, Request $request)
    {

        /* Обязательные */
//		$required = [
//
//			'token',
//
//		];
//
//		Self::check_required($required, $request);
        $my_id = auth()->id();

        $chat = Msg::where(['chat_id' => $chat_id])->orderBy('id', 'desc')->get();

        Self::json_response(200, 'Success', ['chat_id' => $chat_id, 'messages' => $chat->toArray()]);

    }

}
