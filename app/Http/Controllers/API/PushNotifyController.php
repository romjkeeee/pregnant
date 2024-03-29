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
    public function sendPush($body, $id, $title = false, $badge = false)
    {
        $user = User::query()->where('id',$id)->first();
        $data = [
            "to" => $user->push_key,
            "notification" =>
                [
                    "title" => $title ?? 'Pregnancy',
                    "body" => $body ?? 'New notification',
//                    "icon" => url('/logo.png')
                    'priority'=>'high',
                    'sound' => 'default',
                    'badge' => $badge,
                ],
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=AAAAaTzOGBM:APA91bEwipPyNgtKQo6rWRkcXuA7dPc6pQac0FDb1T44jhuoXBEVL_HhhzcOOoAZrDnfLnTekxe7LbRiSyqyDK33rDCcVYPZYpnOplthsmsC4fNCnaH7i2l-10eynhykLq8mLBAFKh2x',
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $data = curl_exec($ch);
        return response($data);
    }
}
