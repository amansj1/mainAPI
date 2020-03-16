<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../config/Database.php';
  include_once '../objects/Instansi.php';


  $database = new Database();
  $db = $database->getConnection();

  $instansi = new Instansi($db);

  // ambil raw datanya
  $data = json_decode(file_get_contents("php://input"));

  $instansi->id_instansi = $data->id_instansi;
  $instansi->instansi = $data->instansi;
  

  // Create Category
  if($instansi->create()) {
    echo json_encode(
      array('message' => 'Instansi Created')
    );
  } else {
    echo json_encode(
      array('message' => 'instansi Not Created')
    );
  }