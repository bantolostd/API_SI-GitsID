<?php
require_once "connection.php";

if (function_exists($_GET['function'])) {
    $_GET['function']();
}

function upload_image() {
    $image = $_FILES['file_gambar']['tmp_name'];
    $image_name = $_FILES['file_gambar']['name'];

    $file_path = 'images';

    $data = "";

    if (!file_exists($file_path)) {
        mkdir($file_path, 0777, true);
    }

    if (!$image) {
        $response=array(
            'status' => 0,
            'message' => 'Gambar tidak ditemukan!'
         );
    } else {
        if (move_uploaded_file($image, $file_path . '/' . $image_name)) {
            $response=array(
                'status' => 1,
                'message' => 'Gambar berhasil diupload!'
             );
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Gambar gagal diupload!'
            );
        }
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

