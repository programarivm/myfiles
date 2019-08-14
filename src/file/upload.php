<?php

use MyFiles\DB;

header('Content-type: application/json');

if (move_uploaded_file($_FILES['myfile']['tmp_name'], APP_PATH.'/storage/'.$_FILES['myfile']['name'])) {
    DB::getInstance();
    // TODO ...
    http_response_code(200);
    $body = ['message' => 'Success'];
} else {
    http_response_code(500);
    $body = ['message' => 'Internal Server Error'];
}

print_r(json_encode($body, true));

exit;
