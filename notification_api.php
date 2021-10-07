<?php
require_once "connection.php";

    $title = $_POST["notification_title"];
    $message = $_POST["notification_body"];
    // $title = "a";
    // $message = "b";
    //$fcm_token = "cILai7ytT4CaACmyNm508i:APA91bEVnhyDIsTPeMwScT2tRZWDeNsQpi58B-t40OOOCU7I8_7brct0GZu91O2dUKUP7lO5IgYqoRjBdgi5RIrBASibYMPBpuBzFGVGj-lSXklc9o0LMU-WNC8KNwFqquKyuwiUYin1";
    $fcm_token = $_POST["notification_token"];

    function sendPushNotification($fcm_token, $title, $message, $id = null,$action = null) {  
        
        $url = "https://fcm.googleapis.com/fcm/send";            
        $header = [
            'authorization: key=AAAALXctaRA:APA91bE_rslZND_ujGjiQJfXCbME4lETPwJ9mpQDb4VLWh8pO3xdMa9swDyR9oduKNAnfzF1t0mH6-D6J3aPvrCU6z7nuGwoH8fVCiHZPw8DzH9USWs-4HbsfXtWcaGy15c6ldKiTU2h',
            'content-type: application/json'
        ];    

        $notification = [
            'title' =>$title,
            'body' => $message
        ];
        $extraNotificationData = ["message" => $notification,"id" =>$id,'action'=>$action];

        $fcmNotification = [
            'to'        => $fcm_token,
            'notification' => $notification,
            'data' => $extraNotificationData
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        $result = curl_exec($ch);    
        curl_close($ch);

        return $result;
    }

    $response = sendPushNotification($fcm_token, $title, $message);
    header('Content-Type: application/json');
    echo $response;
 ?>