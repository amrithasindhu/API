<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
include("interaction.php");

$read=new interaction();
$data=json_decode(file_get_contents("php://input"));
$read->title=$data->title;
$read->body=$data->body;
$read->author=$data->author;


  if($read->create())
  {
    echo json_encode(
        array('message'=>'post created')
    );
  }

else{
    echo json_encode(
        array('message'=>'post creation failed')
    );
}