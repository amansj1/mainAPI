<?php
class Instansi{
  
    // tempat setting koneksi dan nama tabel 
    private $conn;
    private $table = "instansi";
  
    //field table nya dimasukin  
    public $id_instansi;
    public $instansi;
  
    // bikin construct untuk konesi database
    public function __construct($db){
        $this->conn = $db;
    
    }
    

    // Get categories
    public function read() {
        // query
        $query = 'select * from ' .$this->table.'';
        // Prepare statement
        $stmt = $this->conn->prepare($query);
        // Execute 
        $stmt->execute();
  
        return $stmt;
      }
  
      // cari spesifik instansi
    public function search(){
      // Create query
      $query = 'SELECT id_instansi, instansi from '.$this->table.' where id_instansi = ? ';
  
        //Prepare statement
        $stmt = $this->conn->prepare($query);
  
        // Bind ID
        $stmt->bindParam(1, $this->id_instansi);
  
        // Execute query
        $stmt->execute();
  
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
        // set properties
        $this->id_instansi = $row['id_instansi'];
        $this->instansi = $row['instansi'];
    }
  
  
    public function create() {
      // Create Query
      $query = 'insert into '.$this->table.' set id_instansi = :id_instansi, instansi = :instansi';
  
    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    $this->id_instansi = htmlspecialchars(strip_tags($this->id_instansi));
    $this->instansi = htmlspecialchars(strip_tags($this->instansi));
    // Bind data
    $stmt-> bindParam(':id_instansi', $this->id_instansi);
    $stmt-> bindParam(':instansi', $this->instansi);
  
    // Execute query
    if($stmt->execute()) {
      return true;
    }
    printf("Error: $s.\n", $stmt->error);
    return false;
    }
  





    // Update Category
    public function update() {
      // Create Query
      $query = 'update ' .
        $this->table . '
      SET
        instansi = :instansi
        WHERE
        id_instansi = :id_instansi';
  
    // Prepare Statement
    $stmt = $this->conn->prepare($query);
  
    // Clean data
    $this->instansi = htmlspecialchars(strip_tags($this->instansi));
    $this->id_instansi = htmlspecialchars(strip_tags($this->id_instansi));
  
    // Bind data
    $stmt-> bindParam(':instansi', $this->instansi);
    $stmt-> bindParam(':id_instansi', $this->id_instansi);
  
    // Execute query
    if($stmt->execute()) {
      return true;
    }
  
    // Print error if something goes wrong
    printf("Error: $s.\n", $stmt->error);
  
    return false;
    }
  
    // Delete 
    public function delete() {
    
      $query = 'DELETE FROM ' . $this->table . ' WHERE id_instansi = :id_instansi';
      $stmt = $this->conn->prepare($query);
  
      // clean data
      $this->id_instansi = htmlspecialchars(strip_tags($this->id_instansi));
  
      // Bind Data
      $stmt-> bindParam(':id_instansi', $this->id_instansi);
  
      // Execute query
      if($stmt->execute()) {
        return true;
      }
      printf("Error: $s.\n", $stmt->error);
  
      return false;
      }
    }