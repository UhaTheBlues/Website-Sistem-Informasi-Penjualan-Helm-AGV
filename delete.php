<?php
require_once 'db.php';
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sql = "SELECT * FROM datahelm WHERE id = ".$id;
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_assoc($result);
    
      $sql = "DELETE from datahelm WHERE id=".$id;
      if(mysqli_query($conn, $sql)){
        header('location:admin.php');
      }
    }
  }
?>