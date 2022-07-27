<?php
require_once('class/main.php');
$obj = new Model;

 if(isset($_POST['save'])) {
      $insertID = $_POST['save'];
      $obj->maintenance_input($insertID);
  }
  
 if(isset($_POST['save_data'])) {
      $data = $_POST['save_data'];
      $obj->fuel_input($data);
  }

     if(isset($_POST['driver'])) {
      $data = $_POST['driver'];
      $obj->driver_input($data);
  }

     if(isset($_POST['recommender'])) {
      $data = $_POST['recommender'];
      $obj->recommender_input($data);
  }

      if(isset($_POST['approver'])) {
      $data = $_POST['approver'];
      $obj->approver_input($data);
  }

      if(isset($_POST['vehicle'])) {
      $data = $_POST['vehicle'];
      $obj->vehicle_input($data);
  }

  
   if(isset($_POST['problems'])) {
      $data = $_POST['problems'];
      $obj->problem_input($data);
  }

    if(isset($_POST['requisition'])) {
      $data = $_POST['requisition'];
      $obj->requisition_input($data);
  }

   if(isset($_POST['f_update'])) {
      $data = $_POST['f_update'];
      $obj->fuel_update($data);
  }

     if(isset($_POST['update'])) {
      $data = $_POST['update'];
      $obj->data_update($data);
  }
?>
