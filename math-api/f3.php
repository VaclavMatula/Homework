<?php
$result = 0;
$error = "";

$operation = $_SERVER['REQUEST_URI'];
$operation = str_replace("/php/math-api.php/", "", $operation);

$json = file_get_contents('php://input');
$obj = json_decode($json);
$numbers = $obj->numbers;

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
