<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

/**
 * @group Push
 *
 * APIs for
 */
class PushNotifyController extends Controller
{
    public function sendPush(Request $request)
    {
        $user = User::find($request->id);
        $data = [
            "to" => $user->push_key,
            "notification" =>
                [
                    "title" => 'Web Push',
                    "body" => "Sample Notification",
                    "icon" => url('/logo.png')
                ],
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . env('FIREBASE_SERVER_KEY'),
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        curl_exec($ch);

        return response('message', 'Notification sent!');
    }
}
