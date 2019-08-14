<?php

use MyFiles\Utils\DB;

$id = DB::getInstance()->escape(explode('/', $_SERVER['REQUEST_URI'])[3]);

$sql = "SELECT * FROM files WHERE id='$id'";
$result = DB::getInstance()->query($sql);
$row = $result->fetch_array(MYSQLI_ASSOC);

$filepath = APP_PATH."/storage/{$row['uniqid']}/{$row['name']}";

if (empty($row)) {
    http_response_code(404);
    $body = ['message' => 'Not Found'];
    print_r(json_encode($body, true));
} elseif (!filter_var($id, FILTER_VALIDATE_INT)) {
    http_response_code(400);
    $body = ['message' => 'Bad Request'];
    print_r(json_encode($body, true));
} elseif (file_exists($filepath)) {
    $sql = "DELETE FROM files WHERE id='$id'";
    DB::getInstance()->query($sql);
    http_response_code(200);
    $body = ['message' => 'Bad Success'];
    print_r(json_encode($body, true));
}

exit;
