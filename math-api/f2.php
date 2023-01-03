<?php
$result = 0;
$error = "";
$uri = $_SERVER['REQUEST_URI'];
$uri = str_replace("/php/math-api.php/", "", $uri);
$uri_parts = explode("/", $uri);
$operation = $uri_parts[0];
$numbers = array_slice($uri_parts, 1);

if ($operation == 'sum') {
    foreach($numbers as $number){
        $result += $number;
    }
} else if ($operation == 'sub') {
    $result = $numbers[0];
    foreach ($numbers as $number) {
        $result -= $number;
    }
} else if ($operation == 'div') {
    if (count($numbers) < 2) {
        $error = "Not enough numbers provided for division.";
    } else {
        $result = $numbers[0];
        foreach ($numbers as $number) {
            $result /= $number;
        }
    }
} else if ($operation == 'mul') {
    $result = 1;
    foreach ($numbers as $number) {
        $result *= $number;
    }
} else {
    $error = "Invalid operation.";
}

if ($error) {
    $reply = ["report" => "Error", "error" => $error];
} else {
    $reply = ["report" => "OK", "result" => $result];
}
echo json_encode($reply);
?>
