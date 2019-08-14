<?php

use MyFiles\Utils\DB;

$uniqid = uniqid();

if (mkdir(APP_PATH."/storage/$uniqid", 0775, true)) {
    if (move_uploaded_file($_FILES['myfile']['tmp_name'], APP_PATH."/storage/$uniqid/".$_FILES['myfile']['name'])) {
        $name = DB::getInstance()->escape($_FILES['myfile']['name']);
        $mimetype = DB::getInstance()->escape($_FILES['myfile']['type']);
        $sql = "INSERT INTO files(name, mimetype, uniqid) VALUES ('{$name}', '{$mimetype}', '$uniqid')";
        DB::getInstance()->query($sql);
        http_response_code(200);
        $body = ['message' => 'Success'];
    } else {
        http_response_code(500);
        $body = ['message' => 'Internal Server Error'];
    }
}

header('Content-type: application/json');
print_r(json_encode($body, true));

exit;
