<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../config/Database.php';
  include_once '../objects/Instansi.php';

 
  $database = new Database();
  $db = $database->getConnection();


  $instansi = new Instansi($db);
  $result = $instansi->read();
  $num = $result->rowCount();

  // 
  if($num > 0) {
        
        $ins_arr = array();
        $ins_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
          extract($row);

          $ins_item = array(
            'id_instansi' => $id_instansi,
            'instansi' => $instansi
          );

        
          array_push($ins_arr['data'], $ins_item);
        }

      
        echo json_encode($ins_arr);

  } else {
     
        echo json_encode(
          array('message' => 'No Ins Found')
        );
  }