<?php

  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');
  
  include_once '../config/Database.php';
  include_once '../objects/Instansi.php';


  $database = new Database();
  $db = $database->getConnection();

  $instansi = new Instansi($db);


  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to UPDATE
  $instansi->id_instansi = $data->id_instansi;

  // Delete post
  if($instansi->delete()) {
    echo json_encode(
      array('message' => 'instansi deleted')
    );
  } else {
    echo json_encode(
      array('message' => 'instansi not deleted')
    );
  }