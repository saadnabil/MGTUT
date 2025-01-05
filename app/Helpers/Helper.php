<?php

use App\Models\Otp;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

// function resource_collection($resource): array
// {
//     return json_decode($resource->response()->getContent(), true) ?? [];
// }

function otpRegister($email)
{
    $code =  str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
    Otp::where(['email' => $email])->delete();
    Otp::create([
        'email' => $email,
        'code' => $code,
    ]);
    return $code;
}

function resource_collection($resource): array
{
    return json_decode($resource->response()->getContent(), true) ?? [];
}

function otpForgetPassword($email){
    $code =  str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
    $user = User::where('email' , $email)->first();
    if(!$user){
        return 'fail';
    }
    Otp::where(['email' => $email])->delete();
    Otp::create([
        'email' => $email,
        'code' => $code,
    ]);
    return $code;
}

// function generate_code_unique() {
//     // Generate a random prefix of length 2 using letters
//     $prefix = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 3);

//     // Get the current date in the format "YmdHis" (YearMonthDayHourMinuteSecond)
//     $currentDate = date('YmdHis');

//     // Generate a random number between 1000 and 9999
//     $randomNumber = mt_rand(1000, 9999);

//     // Combine the prefix, date, and random number to create the code
//     $shipmentCode = $prefix . $currentDate . $randomNumber;

//     return $shipmentCode;
// }



// function generateQrCode($shipmentCode){
//     return QrCode::size(300)->generate($shipmentCode);
// }

// function pushNotificationStore($title, $body, $token)
// {
//     if (!$token) return;

//     if (!is_array($token)) {
//         $token = [$token];
//     }

//     $url = 'https://fcm.googleapis.com/fcm/send';
//     $serverKey = 'AAAAEdvg3CI:APA91bEspQQ7Eb7PFcCPtgj3VVE7ietM1DGtG4H55SMyThAnAPaChUqHSA8p9DYHXpJtQ8uU0Z_8UZALcsOelpKkDJSyVLejM77k9aLGq22oMUa7Fy0JrHt1zaVN61zLuIhmVfA7dTc6';

//     $data = [
//         "registration_ids" => $token,
//         "notification" => [
//             "title" => $title,
//             "body" => $body,
//             "sound" => "default",
//             "badge" => "1",
//             // "click_action" => "FCM_PLUGIN_ACTIVITY",
//         ],
//         // "data" => $notificationData
//     ];

//     $encodedData = json_encode($data);

//     $headers = [
//         'Authorization:key=' . $serverKey,
//         'Content-Type: application/json',
//     ];

//     $ch = curl_init();

//     curl_setopt($ch, CURLOPT_URL, $url);
//     curl_setopt($ch, CURLOPT_POST, true);
//     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//     curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
//     // Disabling SSL Certificate support temporarly
//     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//     curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
//     // Execute post
//     $result = curl_exec($ch);

//     // Close connection
//     curl_close($ch);
//     // FCM response
//     // dump($result);
//     return $result;
// }
