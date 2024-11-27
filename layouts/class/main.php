<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// if(!isset($_SESSION)) 
//     { 
//         session_start(); 
//     }

class Model
{
	public function __construct()
	{
		$hostname = "localhost";
		$username = "username";
		$password = "password";
		$database = "vehicle-db";

	$this->link = mysqli_connect($hostname,$username,$password,$database);

	}

	public function maintenance_input($insertID)
	{

		$vehicle_no = $_POST["vehicle_no"];
		$driver_name = $_POST["driver_name"];
		$project = $_POST["project"];
		$service_type = $_POST['type'];
		$previous_reading = $_POST["p_reading"];
		$current_reading = $_POST["c_reading"];
		//foreach ($problems as $problem){}
		$previous_date = $_POST['p_date'];
		$current_date = $_POST['c_date'];
		$problem = $_POST["prob"];
		$problems=implode(', ', $problem);
		$recommender = $_POST["r_name"];
		$approver = $_POST["a_name"];
		date_default_timezone_set('Asia/Dhaka');
		$created_at = date('d-M-y h:i a');
		//$selectedVendor = ($_POST['vendor'] == "others" ) ?  $_POST['othervendor']: $_POST['vendor'];

		$query = "INSERT INTO `maintenance_forms`(`vehicle_id`, `driver_id`, `project_id`, `type_id`, `previous_reading`, `current_reading`, `problems`, `previous_date`, `curr_date`, `recommender_id`, `approver_id`, `submit_at`) VALUES ('$vehicle_no','$driver_name','$project', '$service_type','$previous_reading', '$current_reading','$problems', '$previous_date', '$current_date', '$recommender','$approver', '$created_at')";
		// var_dump($query);
		// exit();
		//mysqli_query($this->link,$query);

		$sql = mysqli_query($this->link,$query);

		// var_dump($this->link);
		// exit();
		//header("location: forms.php");
		if ($sql==true) {
		header("location: maintenance_list.php?msg=Data inserted successfully");
				//exit();
			}else{
				echo "Failed to insert";
			}
	}

	public function fuel_input($data)
	{

	  $vehicle_no = $_POST["vehicle_no"];
      $driver_name = $_POST["name"];
      $project = $_POST["project"];
      $previous_reading = $_POST["p_reading"];
      $current_reading = $_POST["c_reading"];
      $prev_quantity=$_POST["prev_quantity"];
      $current_quantity=$_POST["cur_quantity"];
      //$vendor = $_POST["vendor"];
      $memo = $_POST["memo_no"];
      $last_date = $_POST["last_date"];
      $current_date = $_POST["curr_date"];
      $recommender = $_POST["r_name"];
      $approver = $_POST["a_name"];
      $selectedVendor = ($_POST['fuel_vendor'] == "others" ) ?  $_POST['othervendor']: $_POST['fuel_vendor'];
      date_default_timezone_set('Asia/Dhaka');
	  $created_at = date('d-M-y h:i a');

	  $query = "INSERT INTO `fuel_forms`(`vehicle_id`, `driver_id`, `project_id`, `previous_reading`, `current_reading`, `current_quantity`, `previous_quantity`, `fuel_vendor`, `memo_no`, `last_date`, `cur_date`, `recommender_id`,`approver_id`, `submit_at`) VALUES ('$vehicle_no','$driver_name','$project','$previous_reading','$current_reading','$current_quantity','$prev_quantity','$selectedVendor','$memo','$last_date','$current_date','$recommender','$approver', '$created_at')";

		
		// var_dump($query);
		// exit();
		//mysqli_query($this->link,$query);

		$sql = mysqli_query($this->link,$query);

		// var_dump($this->sql);
		// exit();
		//header("location: forms.php");

		if ($sql==true) {
		 header("location: fuel_list.php?msg=Data inserted successfully");

			}else{
				echo "Failed to insert";
			}
	}


	public function problem_input($data)
	{

	  $problem = $_POST["problem"];
     
		$query = "INSERT INTO `problems`(`problem_list`) VALUES ('$problem')";
	
		// var_dump($query);
		// exit();

		$sql = mysqli_query($this->link,$query);

		if ($sql==true) {
		 header("location: problem_list.php?msg=Data inserted successfully");

			}else{
				echo "Failed to insert";
			}
	}

	public function requisition_input($data)
	{

	  $vehicle_no = $_POST["vehicle_no"];
      $driver_name = $_POST["driver_name"];
      $project = $_POST["project"];
      $recommender = $_POST["r_name"];
      $approver = $_POST["a_name"];
      $remarks = $_POST["comment"];
      date_default_timezone_set('Asia/Dhaka');
	  $created_at = date('d-M-y h:i a');
     
		$query = "INSERT INTO `requisition`(`vehicle_id`, `driver_id`, `project_id`, `recommender_id`, `approver_id`, `remarks`, `submit_at`) VALUES ('$vehicle_no', '$driver_name', '$project', '$recommender', '$approver', '$remarks', '$created_at')";
	
		// var_dump($query);
		// exit();

		$sql = mysqli_query($this->link,$query);

		if ($sql==true) {
		 header("location: requisition_list.php?msg=Data inserted successfully");

			}else{
				echo "Failed to insert";
			}
	}


	public function driver_input($data)
	{

	  $driver_name = $_POST["dr_name"];
	  $project = $_POST["projectm"];
     
		$query = "INSERT INTO `dr_name`(`driver_name`,`project_name`) VALUES ('$driver_name','$project')";
	
		var_dump($query);
		exit();

		$sql = mysqli_query($this->link,$query);

		if ($sql==true) {
		 header("location: driver_list.php?msg=Data inserted successfully");

			}else{
				echo "Failed to insert";
			}
	}


	// public function show_data()
	// {
	// $id=$_GET['page'];

	// if($id=='maintenance')
	// {
	// $query = "SELECT * FROM forms ORDER BY id DESC LIMIT 0,11";
	// }
	// elseif ($id=='fuel') {
	// 	$query = "SELECT * FROM fuel_forms ORDER BY id DESC LIMIT 0,11";
	// }

	// 	return mysqli_query($this->link,$query);
	// }


	public function show_maintenance_data()
	{

	$query = "SELECT * FROM maintenance_forms 
	INNER JOIN vehicle_no ON maintenance_forms.vehicle_id = vehicle_no.vehicle_id
	INNER JOIN drivers ON maintenance_forms.driver_id = drivers.driver_id
	INNER JOIN projects ON maintenance_forms.project_id = projects.project_id
	INNER JOIN service_type ON maintenance_forms.type_id = service_type.type_id  
	INNER JOIN recommender ON maintenance_forms.recommender_id = recommender.recommender_id
	INNER JOIN approver ON maintenance_forms.approver_id = approver.approver_id 
	LEFT JOIN maintenance_cost ON maintenance_forms.id = maintenance_cost.maintenance_forms_id
	ORDER BY id DESC limit 11";


		return mysqli_query($this->link,$query);
	}

	public function show_fuel_data()
	{

	$query = "SELECT * FROM fuel_forms 
	INNER JOIN vehicle_no ON fuel_forms.vehicle_id = vehicle_no.vehicle_id
	INNER JOIN drivers ON fuel_forms.driver_id = drivers.driver_id
	INNER JOIN projects ON fuel_forms.project_id = projects.project_id 
	INNER JOIN recommender ON fuel_forms.recommender_id = recommender.recommender_id 
	INNER JOIN approver ON fuel_forms.approver_id = approver.approver_id ORDER BY id DESC limit 11";


		return mysqli_query($this->link,$query);
	}

	public function print_maintenance_data($userId)
		{
	$query = "SELECT * FROM maintenance_forms 
	INNER JOIN vehicle_no ON maintenance_forms.vehicle_id = vehicle_no.vehicle_id
	INNER JOIN drivers ON maintenance_forms.driver_id = drivers.driver_id
	INNER JOIN projects ON maintenance_forms.project_id = projects.project_id
	INNER JOIN service_type ON maintenance_forms.type_id = service_type.type_id   
	INNER JOIN recommender ON maintenance_forms.recommender_id = recommender.recommender_id 
	INNER JOIN approver ON maintenance_forms.approver_id = approver.approver_id WHERE id = '$userId'";
			$result = mysqli_query($this->link,$query);

			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				return $row;
			}else{
				echo "Record not found";
			}
		}

	public function print_fuel_data($userId)
	{
	$query = "SELECT * FROM fuel_forms 
	INNER JOIN vehicle_no ON fuel_forms.vehicle_id = vehicle_no.vehicle_id
	INNER JOIN drivers ON fuel_forms.driver_id = drivers.driver_id
	INNER JOIN projects ON fuel_forms.project_id = projects.project_id
	INNER JOIN recommender ON fuel_forms.recommender_id = recommender.recommender_id 
	INNER JOIN approver ON fuel_forms.approver_id = approver.approver_id WHERE id = '$userId'";
	$result = mysqli_query($this->link,$query);

	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		return $row;
	}else{
		echo "Record not found";
	}
}

	public function print_requisition_data($userId)
	{
	$query = "SELECT * FROM requisition 
	INNER JOIN vehicle_no ON requisition.vehicle_id = vehicle_no.vehicle_id
	INNER JOIN drivers ON requisition.driver_id = drivers.driver_id
	INNER JOIN projects ON requisition.project_id = projects.project_id 
	INNER JOIN recommender ON requisition.recommender_id = recommender.recommender_id 
	INNER JOIN approver ON requisition.approver_id = approver.approver_id WHERE requisition_id = '$userId'";
	$result = mysqli_query($this->link,$query);

	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		return $row;
	}else{
		echo "Record not found";
	}
}


	public function requisition_data()
	{
	$query = "SELECT * FROM requisition 
	INNER JOIN vehicle_no ON requisition.vehicle_id = vehicle_no.vehicle_id
	INNER JOIN drivers ON requisition.driver_id = drivers.driver_id
	INNER JOIN projects ON requisition.project_id = projects.project_id 
	INNER JOIN recommender ON requisition.recommender_id = recommender.recommender_id 
	INNER JOIN approver ON requisition.approver_id = approver.approver_id ORDER BY requisition_id DESC limit 11";


		return mysqli_query($this->link,$query);
	}

	public function maintenance_report(){


	$id= $_GET['project'];
	switch ($id) {
  	case "CoOf":
	$query = "SELECT * FROM maintenance_forms 
	INNER JOIN vehicle_no ON maintenance_forms.vehicle_id = vehicle_no.vehicle_id
	INNER JOIN drivers ON maintenance_forms.driver_id = drivers.driver_id
	INNER JOIN projects ON maintenance_forms.project_id = projects.project_id
	INNER JOIN service_type ON maintenance_forms.type_id = service_type.type_id  
	INNER JOIN recommender ON maintenance_forms.recommender_id = recommender.recommender_id
	INNER JOIN approver ON maintenance_forms.approver_id = approver.approver_id
	WHERE project_cat = '1' ORDER BY id DESC";
    break;

    case "Bsk":
	$query = "SELECT * FROM maintenance_forms 
	INNER JOIN vehicle_no ON maintenance_forms.vehicle_id = vehicle_no.vehicle_id
	INNER JOIN drivers ON maintenance_forms.driver_id = drivers.driver_id
	INNER JOIN projects ON maintenance_forms.project_id = projects.project_id
	INNER JOIN service_type ON maintenance_forms.type_id = service_type.type_id  
	INNER JOIN recommender ON maintenance_forms.recommender_id = recommender.recommender_id
	INNER JOIN approver ON maintenance_forms.approver_id = approver.approver_id 
	LEFT JOIN maintenance_cost ON maintenance_forms.id = maintenance_cost.maintenance_forms_id
	WHERE project_cat = '2' ORDER BY id DESC";
	break;

	case "Badip":
	$query = "SELECT * FROM maintenance_forms 
	INNER JOIN vehicle_no ON maintenance_forms.vehicle_id = vehicle_no.vehicle_id
	INNER JOIN drivers ON maintenance_forms.driver_id = drivers.driver_id
	INNER JOIN projects ON maintenance_forms.project_id = projects.project_id
	INNER JOIN service_type ON maintenance_forms.type_id = service_type.type_id  
	INNER JOIN recommender ON maintenance_forms.recommender_id = recommender.recommender_id
	INNER JOIN approver ON maintenance_forms.approver_id = approver.approver_id 
	LEFT JOIN maintenance_cost ON maintenance_forms.id = maintenance_cost.maintenance_forms_id
	WHERE project_cat = '3' ORDER BY id DESC";
	break;

	case "Dblp":
	$query = "SELECT * FROM maintenance_forms 
	INNER JOIN vehicle_no ON maintenance_forms.vehicle_id = vehicle_no.vehicle_id
	INNER JOIN drivers ON maintenance_forms.driver_id = drivers.driver_id
	INNER JOIN projects ON maintenance_forms.project_id = projects.project_id
	INNER JOIN service_type ON maintenance_forms.type_id = service_type.type_id  
	INNER JOIN recommender ON maintenance_forms.recommender_id = recommender.recommender_id
	INNER JOIN approver ON maintenance_forms.approver_id = approver.approver_id 
	LEFT JOIN maintenance_cost ON maintenance_forms.id = maintenance_cost.maintenance_forms_id
	WHERE project_cat = '4' ORDER BY id DESC";
	break;

	case "M4c":
	$query = "SELECT * FROM maintenance_forms 
	INNER JOIN vehicle_no ON maintenance_forms.vehicle_id = vehicle_no.vehicle_id
	INNER JOIN drivers ON maintenance_forms.driver_id = drivers.driver_id
	INNER JOIN projects ON maintenance_forms.project_id = projects.project_id
	INNER JOIN service_type ON maintenance_forms.type_id = service_type.type_id  
	INNER JOIN recommender ON maintenance_forms.recommender_id = recommender.recommender_id
	INNER JOIN approver ON maintenance_forms.approver_id = approver.approver_id 
	LEFT JOIN maintenance_cost ON maintenance_forms.id = maintenance_cost.maintenance_forms_id
	WHERE project_cat = '5' ORDER BY id DESC";
	break;

	case "Led":
	$query = "SELECT * FROM maintenance_forms 
	INNER JOIN vehicle_no ON maintenance_forms.vehicle_id = vehicle_no.vehicle_id
	INNER JOIN drivers ON maintenance_forms.driver_id = drivers.driver_id
	INNER JOIN projects ON maintenance_forms.project_id = projects.project_id
	INNER JOIN service_type ON maintenance_forms.type_id = service_type.type_id  
	INNER JOIN recommender ON maintenance_forms.recommender_id = recommender.recommender_id
	INNER JOIN approver ON maintenance_forms.approver_id = approver.approver_id 
	LEFT JOIN maintenance_cost ON maintenance_forms.id = maintenance_cost.maintenance_forms_id
	WHERE project_cat = '6' ORDER BY id DESC";
	break;

		case "All":
	$query = "SELECT * FROM maintenance_forms 
	INNER JOIN vehicle_no ON maintenance_forms.vehicle_id = vehicle_no.vehicle_id
	INNER JOIN drivers ON maintenance_forms.driver_id = drivers.driver_id
	INNER JOIN projects ON maintenance_forms.project_id = projects.project_id
	INNER JOIN service_type ON maintenance_forms.type_id = service_type.type_id  
	INNER JOIN recommender ON maintenance_forms.recommender_id = recommender.recommender_id
	INNER JOIN approver ON maintenance_forms.approver_id = approver.approver_id 
	LEFT JOIN maintenance_cost ON maintenance_forms.id = maintenance_cost.maintenance_forms_id ORDER BY id DESC";
	break;
}
	return mysqli_query($this->link,$query);
}

	public function fuel_report()
	{
	$id= $_GET['project'];
	switch ($id) {
  	case "CoOf":
    $query = "SELECT * FROM fuel_forms 
	INNER JOIN vehicle_no ON fuel_forms.vehicle_id = vehicle_no.vehicle_id
	INNER JOIN drivers ON fuel_forms.driver_id = drivers.driver_id
	INNER JOIN projects ON fuel_forms.project_id = projects.project_id 
	INNER JOIN recommender ON fuel_forms.recommender_id = recommender.recommender_id 
	INNER JOIN approver ON fuel_forms.approver_id = approver.approver_id
	WHERE project_cat = '1' ORDER BY id DESC";
    break;

    case "Bsk":
	$query = "SELECT * FROM fuel_forms 
	INNER JOIN vehicle_no ON fuel_forms.vehicle_id = vehicle_no.vehicle_id
	INNER JOIN drivers ON fuel_forms.driver_id = drivers.driver_id
	INNER JOIN projects ON fuel_forms.project_id = projects.project_id 
	INNER JOIN recommender ON fuel_forms.recommender_id = recommender.recommender_id 
	INNER JOIN approver ON fuel_forms.approver_id = approver.approver_id 
	WHERE project_cat = '2' ORDER BY id DESC";
	break;

	case "Badip":
	$query = "SELECT * FROM fuel_forms 
	INNER JOIN vehicle_no ON fuel_forms.vehicle_id = vehicle_no.vehicle_id
	INNER JOIN drivers ON fuel_forms.driver_id = drivers.driver_id
	INNER JOIN projects ON fuel_forms.project_id = projects.project_id 
	INNER JOIN recommender ON fuel_forms.recommender_id = recommender.recommender_id 
	INNER JOIN approver ON fuel_forms.approver_id = approver.approver_id 
	WHERE project_cat = '3' ORDER BY id DESC";
	break;

	case "Dblp":
	$query = "SELECT * FROM fuel_forms 
	INNER JOIN vehicle_no ON fuel_forms.vehicle_id = vehicle_no.vehicle_id
	INNER JOIN drivers ON fuel_forms.driver_id = drivers.driver_id
	INNER JOIN projects ON fuel_forms.project_id = projects.project_id 
	INNER JOIN recommender ON fuel_forms.recommender_id = recommender.recommender_id 
	INNER JOIN approver ON fuel_forms.approver_id = approver.approver_id 
	WHERE project_cat = '4' ORDER BY id DESC";
	break;

	case "M4c":
	$query = "SELECT * FROM fuel_forms 
	INNER JOIN vehicle_no ON fuel_forms.vehicle_id = vehicle_no.vehicle_id
	INNER JOIN drivers ON fuel_forms.driver_id = drivers.driver_id
	INNER JOIN projects ON fuel_forms.project_id = projects.project_id 
	INNER JOIN recommender ON fuel_forms.recommender_id = recommender.recommender_id 
	INNER JOIN approver ON fuel_forms.approver_id = approver.approver_id 
	WHERE project_cat = '5' ORDER BY id DESC";
	break;

	case "Led":
	$query = "SELECT * FROM fuel_forms 
	INNER JOIN vehicle_no ON fuel_forms.vehicle_id = vehicle_no.vehicle_id
	INNER JOIN drivers ON fuel_forms.driver_id = drivers.driver_id
	INNER JOIN projects ON fuel_forms.project_id = projects.project_id 
	INNER JOIN recommender ON fuel_forms.recommender_id = recommender.recommender_id 
	INNER JOIN approver ON fuel_forms.approver_id = approver.approver_id 
	WHERE project_cat = '6' ORDER BY id DESC";
	break;

	case "All":
	$query = "SELECT * FROM fuel_forms 
	INNER JOIN vehicle_no ON fuel_forms.vehicle_id = vehicle_no.vehicle_id
	INNER JOIN drivers ON fuel_forms.driver_id = drivers.driver_id
	INNER JOIN projects ON fuel_forms.project_id = projects.project_id 
	INNER JOIN recommender ON fuel_forms.recommender_id = recommender.recommender_id 
	INNER JOIN approver ON fuel_forms.approver_id = approver.approver_id ORDER BY id DESC";
	break;

	}

		return mysqli_query($this->link,$query);
	}

	public function vehicle_num()
	{
		$query = "SELECT * FROM vehicle_no ORDER BY created_at ASC";

		return mysqli_query($this->link,$query);
	}

	public function driver_name()
	{
		$query = "SELECT * FROM drivers ORDER BY created_at ASC";

		return mysqli_query($this->link,$query);
	}

	public function projects()
	{
		$query = "SELECT * FROM projects ORDER BY created_at ASC";

		return mysqli_query($this->link,$query);
	}

	public function problems()
	{
		$query = "SELECT * FROM problems ORDER BY created_at ASC";

		return mysqli_query($this->link,$query);
	}


	public function service_type()
	{
		$query = "SELECT * FROM service_type ORDER BY created_at ASC";

		return mysqli_query($this->link,$query);
	}


	public function fuel_vendor()
	{
		$query = "SELECT * FROM fuel_vendor ORDER BY created_at DESC";

		return mysqli_query($this->link,$query);
	}

		public function repair_vendor()
	{
		$query = "SELECT * FROM repair_vendor ORDER BY created_at DESC";

		return mysqli_query($this->link,$query);
	}


	public function recommender()
	{
		$query = "SELECT * FROM recommender ORDER BY created_on ASC";

		return mysqli_query($this->link,$query);
	}

	public function approver()
	{
		$query = "SELECT * FROM approver ORDER BY created_on ASC";

		return mysqli_query($this->link,$query);
	}

	public function sort($q)
	{
		$query = "SELECT * FROM forms WHERE vehicle_no = '".$q."'";

		return mysqli_query($this->link,$query);
	}


	//maintenance Tab start from here

	public function show_tab1()
	{
		$query = "SELECT * FROM maintenance_forms 
	INNER JOIN vehicle_no ON maintenance_forms.vehicle_id = vehicle_no.vehicle_id
 	WHERE where vehicle_no = 'Dhaka Metro-CHA-52-0736' ORDER BY created_at DESC";

		return mysqli_query($this->link,$query);
	}

	public function show_tab2()
	{
		$query = "SELECT current_reading, previous_reading, driver_name FROM forms where vehicle_no = 'Dhaka Metro-CHA-53-6527' ORDER BY created_at DESC";

		return mysqli_query($this->link,$query);
	}

	public function show_tab3()
	{
		$query = "SELECT current_reading, previous_reading, driver_name FROM forms where vehicle_no = 'Dhaka Metro-CHA-53-5300' ORDER BY created_at DESC";

		return mysqli_query($this->link,$query);
	}

	public function show_tab4()
	{
		$query = "SELECT current_reading, previous_reading, driver_name FROM forms where vehicle_no = 'Dhaka Metro-CHA-53-6837' ORDER BY created_at DESC";

		return mysqli_query($this->link,$query);
	}

	public function show_tab5()
	{
		$query = "SELECT current_reading, previous_reading, driver_name FROM forms where vehicle_no = 'Dhaka Metro-CHA-56-3756' ORDER BY created_at DESC";

		return mysqli_query($this->link,$query);
	}

	public function show_tab6()
	{
		$query = "SELECT current_reading, previous_reading, driver_name FROM forms where vehicle_no = 'Dhaka Metro-GHA-13-2865' ORDER BY created_at DESC";

		return mysqli_query($this->link,$query);
	}

	public function show_tab7()
	{
		$query = "SELECT current_reading, previous_reading, driver_name FROM forms where vehicle_no = 'Dhaka Metro-GHA-15-0436' ORDER BY created_at DESC";

		return mysqli_query($this->link,$query);
	}

	public function show_tab8()
	{
		$query = "SELECT current_reading, previous_reading, driver_name FROM forms where vehicle_no = 'Dhaka Metro-GHA-17-7422' ORDER BY created_at DESC";

		return mysqli_query($this->link,$query);
	}

	public function show_tab9()
	{
		$query = "SELECT current_reading, previous_reading, driver_name FROM forms where vehicle_no = 'Dhaka Metro-GHA-18-4839' ORDER BY created_at DESC";

		return mysqli_query($this->link,$query);
	}

	public function show_tab10()
	{
		$query = "SELECT current_reading, previous_reading, driver_name FROM forms where vehicle_no = 'Dhaka Metro-GHA-18-2585' ORDER BY created_at DESC";

		return mysqli_query($this->link,$query);
	}

	public function show_tab11()
	{
		$query = "SELECT current_reading, previous_reading, driver_name FROM forms where vehicle_no = 'Dhaka Metro- GHA-18-4019' ORDER BY created_at DESC";

		return mysqli_query($this->link,$query);
	}

	//Fuel Tab start from here

	public function fuel_tab1()
	{
		$query = "SELECT current_reading, previous_reading, previous_quantity, driver_name FROM fuel_forms where vehicle_no = 'Dhaka Metro-CHA-52-0736' ORDER BY created_at DESC";

		return mysqli_query($this->link,$query);
	}

	public function fuel_tab2()
	{
		$query = "SELECT current_reading, previous_reading, previous_quantity, driver_name FROM fuel_forms where vehicle_no = 'Dhaka Metro-CHA-53-6527' ORDER BY created_at DESC";

		return mysqli_query($this->link,$query);
	}

	public function fuel_tab3()
	{
		$query = "SELECT current_reading, previous_reading, previous_quantity, driver_name FROM fuel_forms where vehicle_no = 'Dhaka Metro-CHA-53-5300' ORDER BY created_at DESC";

		return mysqli_query($this->link,$query);
	}

	public function fuel_tab4()
	{
		$query = "SELECT current_reading, previous_reading, previous_quantity, driver_name FROM fuel_forms where vehicle_no = 'Dhaka Metro-CHA-53-6837' ORDER BY created_at DESC";

		return mysqli_query($this->link,$query);
	}

	public function fuel_tab5()
	{
		$query = "SELECT current_reading, previous_reading, previous_quantity, driver_name FROM fuel_forms where vehicle_no = 'Dhaka Metro-CHA-56-3756' ORDER BY created_at DESC";

		return mysqli_query($this->link,$query);
	}

	public function fuel_tab6()
	{
		$query = "SELECT current_reading, previous_reading, previous_quantity, driver_name FROM fuel_forms where vehicle_no = 'Dhaka Metro-GHA-13-2865' ORDER BY created_at DESC";

		return mysqli_query($this->link,$query);
	}

	public function fuel_tab7()
	{
		$query = "SELECT current_reading, previous_reading, previous_quantity, driver_name FROM fuel_forms where vehicle_no = 'Dhaka Metro-GHA-15-0436' ORDER BY created_at DESC";

		return mysqli_query($this->link,$query);
	}

	public function fuel_tab8()
	{
		$query = "SELECT current_reading, previous_reading, previous_quantity, driver_name FROM fuel_forms where vehicle_no = 'Dhaka Metro-GHA-17-7422' ORDER BY created_at DESC";

		return mysqli_query($this->link,$query);
	}

	public function fuel_tab9()
	{
		$query = "SELECT current_reading, previous_reading, previous_quantity, driver_name FROM fuel_forms where vehicle_no = 'Dhaka Metro-GHA-18-4839' ORDER BY created_at DESC";

		return mysqli_query($this->link,$query);
	}

	public function fuel_tab10()
	{
		$query = "SELECT current_reading, previous_reading, previous_quantity, driver_name FROM fuel_forms where vehicle_no = 'Dhaka Metro-GHA-18-2585' ORDER BY created_at DESC";

		return mysqli_query($this->link,$query);
	}

	public function fuel_tab11()
	{
		$query = "SELECT current_reading, previous_reading, previous_quantity, driver_name FROM fuel_forms where vehicle_no = 'Dhaka Metro-GHA-18-4019' ORDER BY created_at DESC";

		return mysqli_query($this->link,$query);
	}


	public function maintanance_data_delete($id)
	{
		$query = "DELETE FROM `maintenance_forms` WHERE id = $id";

		$sql = mysqli_query($this->link,$query);

		//$sql = $this->link->query($query);
			if ($sql==true) {
				$message = "Record deleted successfully";
				header("Location:maintenance_list.php?msg=$message");
			}else{
				echo "Failed to delete";
			}
	}

	public function fuel_data_delete($id)
	{
		$query = "DELETE FROM `fuel_forms` WHERE id = $id";

		$sql = mysqli_query($this->link,$query);

		//$sql = $this->link->query($query);
			if ($sql==true) {
				$message = "Record deleted successfully";
				header("Location:fuel_list.php?msg=$message");
			}else{
				echo "Failed to delete";
			}
	}

	public function requisition_data_delete($id)
	{
		$query = "DELETE FROM `requisition` WHERE requisition_id = $id";

		$sql = mysqli_query($this->link,$query);

		//$sql = $this->link->query($query);
			if ($sql==true) {
				$message = "Record deleted successfully";
				header("Location:requisition_list.php?msg=$message");
			}else{
				echo "Failed to delete";
			}
	}

	public function problem_delete($id)
	{
		$query = "DELETE FROM `problems` WHERE id = $id";

		$sql = mysqli_query($this->link,$query);

		//$sql = $this->link->query($query);
			if ($sql==true) {
				$message = "Record deleted successfully";
				header("Location:problem_list.php?msg=$message");
			}else{
				echo "Failed to delete";
			}
	}

	public function approver_delete($id)
	{
		$query = "DELETE FROM `approver` WHERE approver_id = $id";

		$sql = mysqli_query($this->link,$query);

		//$sql = $this->link->query($query);
			if ($sql==true) {
				$message = "Record deleted successfully";
				header("Location:problem_list.php?msg=$message");
			}else{
				echo "Failed to delete";
			}
	}


		public function display_edit_data($userId)
		{
			$query = "SELECT * FROM maintenance_forms WHERE id = '$userId'";
			$result = mysqli_query($this->link,$query);

			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				return $row;
			}else{
				echo "Record not found";
			}
		}



	public function data_update($data)

	{
		$ID = $_POST['id'];
		$selectedVendor = ($_POST['vendor'] == "others" ) ?  $_POST['othervendor']: $_POST['vendor'];
		$cost = $_POST['cost'];

		$query = "UPDATE `maintenance_forms` SET `repair_cost`= '$cost', `vendor` = '$selectedVendor' WHERE id = '$ID'";
		// var_dump($query);
		// exit();
		 

		//UPDATE `maintenance_cost` SET `m_cost_id`=[value-1],`maintenance_forms_id`=[value-2],`cost`=[value-3],`vendor_name`=[value-4] WHERE 1

		//INSERT INTO `maintenance_cost`(`maintenance_forms_id`, `cost`, `vendor_name`) VALUES ('169','2250','Mahi') ON DUPLICATE KEY UPDATE m_cost_id = '4'
        // var_dump($query);
        // exit();

		$sql = mysqli_query($this->link,$query);

		//$sql = $this->link->query($query);
			if ($sql==true) {

			//$actual_link = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
				//header("Location:maintenance_report.php?project='.echo $id.'");
				header('Location: ' . $previous);
			}else{
				echo "Unable to update record";
			}
		}

		public function fuel_update($data)

	{
		  $id = $_POST['id'];
		  $vehicle_no = $_POST["vehicle_no"];
	      $driver_name = $_POST["name"];
	      $project_name = $_POST["project"];
	      $previous_reading = $_POST["p_reading"];
	      $current_reading = $_POST["c_reading"];
	      $previous_quantity=$_POST["prev_quantity"];
	      $current_quantity=$_POST["cur_quantity"];
	      //$vendor = $_POST["vendor"];
	      $memo = $_POST["memo_no"];
	      $last_date = $_POST["last_date"];
	      $current_date = $_POST["curr_date"];
	      $recommender = $_POST["r_name"];
	      $approver = $_POST["a_name"];
	      $selectedVendor = ($_POST['fuel_vendor'] == "others" ) ?  $_POST['othervendor']: $_POST['fuel_vendor'];

		$query = "UPDATE `fuel_forms` SET `vehicle_id` = '$vehicle_no', `driver_id` = '$driver_name', `project_id` = '$project_name', `previous_reading` = '$previous_reading', `current_reading` = '$current_reading', `current_quantity` = '$current_quantity', `previous_quantity` = '$previous_quantity', `fuel_vendor` = '$selectedVendor', `memo_no` = '$memo', `last_date` = '$last_date', `cur_date` = '$current_date', `recommender_id` = '$recommender',`approver_id` = '$approver' WHERE id = '$id'";

		// var_dump($query);
		// exit();

		$sql = mysqli_query($this->link,$query);

		//$sql = $this->link->query($query);
			if ($sql==true) {
			header("Location:fuel_list.php?msg=Record updated successfully");
			}else{
				echo "Unable to update record";
			}
	}


}

?>
