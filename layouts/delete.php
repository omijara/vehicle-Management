<?php
require_once('class/main.php');
$obj = new Model;

 if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
      $deleteId = $_GET['deleteId'];
      $obj->maintanance_data_delete($deleteId);
  }
  
  if(isset($_GET['fuel_ID']) && !empty($_GET['fuel_ID'])) {
      $Fuel_Data = $_GET['fuel_ID'];
      $obj->fuel_data_delete($Fuel_Data);
  }

    if(isset($_GET['problem_ID']) && !empty($_GET['problem_ID'])) {
      $problem = $_GET['problem_ID'];
      $obj->problem_delete($problem);
  }

      if(isset($_GET['approver_ID']) && !empty($_GET['approver_ID'])) {
      $approver = $_GET['approver_ID'];
      $obj->approver_delete($approver);
  }

       if(isset($_GET['requisition_ID']) && !empty($_GET['requisition_ID'])) {
      $requisition = $_GET['requisition_ID'];
      $obj->requisition_data_delete($requisition);
  }     
?>