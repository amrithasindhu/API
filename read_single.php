<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include("interaction.php");

$read=new interaction();
$read->id = isset($_GET['id'])?$_GET['id'] :die();
$result=$read->read_single();
  if(!empty($result))
  {

  
echo json_encode([
    "status"=>"Data read",
    "Result"=>$result
]);
  }

  else
  {
    echo 'Id not fOUND';
  }
  