<?php

use MyFiles\DB;

$sql = "SELECT * FROM files;";
$result = DB::getInstance()->query($sql);

$rows = [];
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    $rows[] = $row;
}

http_response_code(200);
print_r(json_encode($rows, true));

exit;
