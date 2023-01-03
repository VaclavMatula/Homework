<?php
$result = 0;
$numbers = explode(",", filter_input(INPUT_GET, "numbers"));

if($_GET['method'] == 'sum')
{
foreach($numbers as $number){
  $result += $number;
}
}
if($_GET['method'] == 'sub')
{
$result = $numbers[0]-$numbers[1];
}

if($_GET['method'] == 'div')
{
$result = $numbers[0]/$numbers[1];
}
if($_GET['method'] == 'mul')
{
$result = $numbers[0]*$numbers[1];
}
$reply = ["report" => "OK", "result" => $result];
echo json_encode($reply);
?>