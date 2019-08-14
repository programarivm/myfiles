<?php

use MyFiles\DB;

if (move_uploaded_file($_FILES['myfile']['tmp_name'], APP_PATH.'/storage/'.$_FILES['myfile']['name'])) {
    $name = DB::getInstance()->escape($_FILES['myfile']['name']);
    $mimetype = DB::getInstance()->escape($_FILES['myfile']['type']);
    $sql = "INSERT INTO files(name, mimetype) VALUES ('{$name}', '{$mimetype}')";
    DB::getInstance()->query($sql);
    http_response_code(200);
    $body = ['message' => 'Success'];
} else {
    http_response_code(500);
    $body = ['message' => 'Internal Server Error'];
}

header('Content-type: application/json');
print_r(json_encode($body, true));

exit;
