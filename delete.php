<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods:DELETE');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
include("interaction.php");

$read=new interaction();
$data=json_decode(file_get_contents("php://input") );
$read->id=$data->id;



  if($read->delete())
  {
    echo json_encode(
        array('message'=>'post  Deleted')
    );
  }

else{
    echo json_encode(
        array('message'=>'post Deletion failed')
    );
}