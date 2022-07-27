<?php 

class Tr
{
  public function __construct()
  {
    $hostname = "localhost";
    $username = "omil";
    $password = "System@@33";
    $database = "vehicle";

  $this->link = mysqli_connect($hostname,$username,$password,$database);

  }

  //fuel report sql

  public function fuel_report_m4c()
  {
  $query = "SELECT * FROM fuel_forms 
  INNER JOIN vehicle_no ON fuel_forms.vehicle_id = vehicle_no.vehicle_id
  INNER JOIN drivers ON fuel_forms.driver_id = drivers.driver_id
  INNER JOIN projects ON fuel_forms.project_id = projects.project_id 
  INNER JOIN recommender ON fuel_forms.recommender_id = recommender.recommender_id 
  INNER JOIN approver ON fuel_forms.approver_id = approver.approver_id 
  WHERE project_name = 'ASTHA' ORDER BY id DESC";


    return mysqli_query($this->link,$query);
  }

}

?>