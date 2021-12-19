<?php

// include_once '../config/config.php';
 require_once(__ROOT__.'/config/config.php');

?>

<?php
Class Database{
   public $host   = DB_HOST;
   public $user   = DB_USER;
   public $pass   = DB_PASS;
   public $dbname = DB_NAME;
 
 
   public $link;
   public $error;
 
 public function __construct(){
  $this->connectDB();
 }
 
public function connectDB(){

   $this->link = new mysqli($this->host, $this->user, $this->pass, 
    $this->dbname);
    
   if(!$this->link){
     $this->error ="Connection fail".$this->link->connect_error;
    return false;
   }
 }
 public function ConnectResult(){

  return $this->link = new mysqli($this->host, $this->user, $this->pass, 
   $this->dbname);
   
  
}
// Select or Read data
public function select($query){
  mysqli_set_charset($this->link,'UTF8');
  $result = $this->link->query($query) or 
   die($this->link->error.__LINE__);
  if($result->num_rows > 0){
    return $result;
  } else {
    return false;
  }
 }
 public function selectdc($query){
  mysqli_set_charset($this->link,'UTF8');
  $result = $this->link->query($query) or 
   die($this->link->error.__LINE__);
  if($result->num_rows > 0){
    return $result;
  } else {
    return false;
  }
 }
 
// Insert data
public function insert($query){
  mysqli_set_charset($this->link,'UTF8');
   $insert_row = $this->link->query($query) or 
     die($this->link->error.__LINE__);
   if($insert_row){
     return $insert_row;
   } else {
     return false;
    }
 }
  
 public function insert_r($query){
  mysqli_set_charset($this->link,'UTF8');
   $insert_row = $this->link->query($query) or 
     die($this->link->error.__LINE__);
   if($insert_row){
    $r = $this->link->insert_id;
     return $r;
   } else {
     return false;
    }
 }
// Update data
 public function update($query){
  mysqli_set_charset($this->link,'UTF8');
   $update_row = $this->link->query($query) or 
     die($this->link->error.__LINE__);
   if($update_row){
    return $update_row;
   } else {
    return false;
    }
 }
  
// Delete data
 public function delete($query){
   $delete_row = $this->link->query($query) or 
     die($this->link->error.__LINE__);
   if($delete_row){
     return $delete_row;
   } else {
     return false;
    }
   }
 
}

