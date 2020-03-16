<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../config/Database.php';
  include_once '../objects/Instansi.php';


  $database = new Database();
  $db = $database->getConnection();

  $instansi = new Instansi($db);

  // ambil raw datanya
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to UPDATE
  $instansi->id_instansi = $data->id_instansi;
  $instansi->instansi = $data->instansi;

  // Update 
  if($instansi->update()) {
    echo json_encode(
      array('message' => 'Instansi Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Instansi not updated')
    );
  }