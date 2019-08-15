<?php

use MyFiles\Utils\DB;

$sql = "SELECT SUM(size) AS used FROM files";
$result = DB::getInstance()->query($sql);
$row = $result->fetch_array(MYSQLI_ASSOC);

http_response_code(200);
print_r(json_encode($row, true));

exit;
