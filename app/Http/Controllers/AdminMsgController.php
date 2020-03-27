<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use Auth;
use App\Doctor;
use App\Patient;
use App\Msg;

class AdminMsgController extends Controller {
	
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
		
		$list = Msg::orderBy('id', 'desc')->get();
		$chat_id = $request->input('category_id');
		
		if ($chat_id) {
			$list = Msg::where(['chat_id' => $chat_id])->orderBy('id', 'asc')->get();
		}
		
		$chats = [];
		if ($list->count()) {
			foreach ($list as $rec) {
				
				$rec = Msg::where(['chat_id' => $rec->chat_id])->first();

				if (isset($chats[$rec->chat_id])) {
					continue;
				}
				
				/* Участники */
				$members = 'неизвестно / неизвестно';
				
				if ($rec->sender_type == 'doctor') {
					$member1 = Doctor::find($rec->sender_id);
				}
				else {
					$member1 = Patient::find($rec->sender_id);
				}
				
				if ($rec->rec_type == 'doctor') {
					$member2 = Doctor::find($rec->rec_id);
				}
				else {
					$member2 = Patient::find($rec->rec_id);
				}
				
				if ($member1 && $member2) {
					$members = $member1->last_name.' '.$member1->name.' '.$member1->second_name.' / '.$member2->last_name.' '.$member2->name.' '.$member2->second_name;
				}
				
				$chats[$rec->chat_id] = $members;
				
			}
		}
		
		$chats = json_decode(json_encode($chats));
		
		/* */
		$return = [
		
			'page_title' => 'Чаты',
			'list' => $chats,
		
		];
		
        return view('chats', $return);
		
    }
	
	public function add($chat_id, Request $request) {
		
		/* Ищем чат */
		$chat = Msg::where(['chat_id' => $chat_id])->first();
		if (!$chat) {
			return redirect('/admin/msg')->with('error', 'Неверный чат!');
		}
		
		$rec_id = $chat->rec_id;
		if ($rec_id == $chat->rec_id) {
			$rec_id = $chat->sender_id;
		}
		
		$type = 'default';
		$text = $request->input('message');
		
		/* Заливка файла */
		$file = null;
		if ($request->file('file')) {
			$file = $request->file('file')->store('files/'.$request->input('token'), 'files');
		}
		
		if ($file) {
			
			$name = $request->file('file')->getClientOriginalName();
			$type = 'attach';
			$text = '<a href="/'.$file.'" style="display: block; padding: 5px; border: 1px solid #ededed; margin: 10px 0;">Скачать файл ('.$name.')</a><br />'.$text;
			
		}
		
		$new = new Msg;
		
		$new->msg_type = $type;
		$new->chat_id = $chat_id;
		$new->sender_id = 99999;
		$new->sender_type = 'admin';
		$new->rec_id = $rec_id;
		$new->rec_type = 'patient';
		$new->text = $text;
		
		$new->save();
		
		return redirect()->back();
		
	}
	
	public function chat($chat_id, Request $request) {
				
		$list = Msg::where(['chat_id' => $chat_id])->get();
		if (!$list->count()) {
			return redirect('/admin/msg')->with('error', 'Чат не найден!');
		}
		
		$left_id = null;
		if ($list->count()) {
			foreach ($list as $msg) {
			
				if (!$left_id) {
					$left_id = $msg->sender_id;
				}
				
				/* Имя */
				$msg->name = 'неизвестно';
				if ($msg->sender_type == 'doctor') {
					
					$this_name = Doctor::find($msg->sender_id);
					if ($this_name) {
						$msg->name = $this_name->last_name.' '.$this_name->name.' '.$this_name->second_name;
					}
					
				}
				else {

					$this_name = Patient::find($msg->sender_id);
					if ($this_name) {
						$msg->name = $this_name->last_name.' '.$this_name->name.' '.$this_name->second_name;
					}
					
				}
				if ($msg->sender_type == 'admin') {
					$msg->name = 'Администратор';
				}
				
			}
		}

		
		/* */
		$return = [
		
			'page_title' => 'Чат #'.$chat_id,
			'chat_id' => $chat_id,
			'list' => $list,
			'left_id' => $left_id,
			
		]; 
		
		return view('chat_view', $return);
		
	}
	
}
