<?php

  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../config/Database.php';
  include_once '../objects/Instansi.php';


  $database = new Database();
  $db = $database->getConnection();


  $instansi = new Instansi($db);
  $instansi->id_instansi = isset($_GET['id_instansi']) ? $_GET['id_instansi'] : die();

  $instansi->search();

  // Create array
  $ins_arr = array(
    'id_instansi' => $instansi->id_instansi,
    'instansi' => $instansi->instansi
  );

  // JSON
  print_r(json_encode($ins_arr));