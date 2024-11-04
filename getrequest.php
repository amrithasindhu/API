<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');


include("interaction.php");

$read=new interaction();
$result=$read->read();

echo json_encode([
    "status"=>"Data read",
    "Result"=>$result
]);