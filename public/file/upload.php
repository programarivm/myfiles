<?php

// TODO ...

$result = ['foo' => 'bar'];

http_response_code(200);
header('Content-type: application/json');
print_r(json_encode($result, true));

exit;
