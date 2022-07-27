<?php 
session_start();
require_once('header.php');
require_once('layouts/class/dashboard.php');
$obj = new Dash;

//$id = $_GET['id'];
//$show = $obj->show_data();

//Maintenance Data

$view1 = $obj->show_tab1();
$view2 = $obj->show_tab2();
$view3 = $obj->show_tab3();
$view4 = $obj->show_tab4();
$view5 = $obj->show_tab5();
$view6 = $obj->show_tab6();
$view7 = $obj->show_tab7();
$view8 = $obj->show_tab8();
$view9 = $obj->show_tab9();
$view10 = $obj->show_tab10();
$view11 = $obj->show_tab11();
$view12 = $obj->show_tab12();

//Fuel Data

$see1 = $obj->fuel_tab1();
$see2 = $obj->fuel_tab2();
$see3 = $obj->fuel_tab3();
$see4 = $obj->fuel_tab4();
$see5 = $obj->fuel_tab5();
$see6 = $obj->fuel_tab6();
$see7 = $obj->fuel_tab7();
$see8 = $obj->fuel_tab8();
$see9 = $obj->fuel_tab9();
$see10 = $obj->fuel_tab10();
$see11 = $obj->fuel_tab11();
$see12 = $obj->fuel_tab12();

?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->

            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>

          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- /.content-header -->

<!-- Modal -->
      <!-- <div class="container" >
            <div class="modal fade" id="empModal" role="dialog">
                <div class="modal-dialog modal-xl">
                
   
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"></h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          
                        </div>
                        <div class="modal-body">
                          
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                  
                </div>
            </div>

            <br/>
        </div> -->



    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box text-light bg-dark">
              <div class="inner">
               <p><u><b>Dhaka Metro - CHA 52-0736</b></u></p>
                  <?php
                  $value = "3000";
                  
                  $rows = mysqli_fetch_array($view1);

                  ?>

                <!-- <p>Driver: <b></b></p> -->
                 <!--  <p style="background-color: green;">General Servicing</b></p> -->
                 <p><button class="fa fa-info-circle text-primary userinfo" data-id='<?php echo $rows["id"]?>' data-toggle="modal" data-target="#exampleModal"> General Servicing</button></p>
                <p style="font-size: 14px;">Last General Servicing Mileage: <?php if(isset($rows['current_reading'] )){ echo $rows['current_reading']; }?> km on 
                  <?php           
                 /* $timeStamp = $rows['previous_date'] ;
                  $timeStamp = date( "d-M-Y", strtotime($timeStamp));
                  echo $timeStamp; */
                  ?>
                  
                </p>

                <p style="font-size: 14px;">Next General Servicing Mileage: <?php if(isset($rows['current_reading'] )){
                  echo $rows['current_reading'] + $value; }?> km</p>

                <p style="font-size: 14px;">Next General Service Date 
                <?php 

                  $timeStamp = $rows['curr_date']; 
                  $timeStamp = date( "d-M-y", strtotime($timeStamp. '+90 days'));
                  echo $timeStamp;
                ?>
                
                </p>  


              </div>
              <div class="icon">
                <i class="fas fa-car"></i>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
             <div class="small-box text-light bg-dark">
              <div class="inner">
               <!-- <span class="fa fa-info-circle text-primary"> </span> -->
                <p><u><b>Dhaka Metro - CHA 53-6527</b></u></p>
                 <?php
                  $value = "3000";
                  
                  $rows = mysqli_fetch_array($view2);

                  ?>

                <!-- <p>Driver: <b></b></p> -->
                 <!--  <p style="background-color: green;">General Servicing</b></p> -->
                 <p><button class="fa fa-info-circle text-primary userinfo" data-id='<?php echo $rows["id"]?>' data-toggle="modal" data-target="#exampleModal"> General Servicing</button></p>
                <p style="font-size: 14px;">Last General Servicing Mileage: =<?php echo $rows['current_reading'] ?> km</p>
                <p style="font-size: 14px;">Next General Servicing Mileage: <?php if($rows['current_reading'] != null){
                  echo $rows['current_reading'] + $value; }?> km
                </p>

                <p style="font-size: 14px;">Next General Service Date: 
                <?php
                $timeStamp = $rows['curr_date'];  
                if (isset($timeStamp)) {
                $timeStamp = date( "d-M-y", strtotime($timeStamp. '+90 days'));
                  echo $timeStamp;
                  }
                  
                ?>
                
                </p>
              </div>
              <div class="icon">
                <i class="fas fa-car"></i>
              </div>
             <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
             <div class="small-box text-light bg-dark">
              <div class="inner">
               <!-- <span class="fa fa-info-circle text-primary"> </span> -->
                <p><u><b>Dhaka Metro - CHA 53-5300</b></u></p>
                 <?php
                  $value = "3000";
                  
                  $rows = mysqli_fetch_array($view3);

                  ?>

                <!-- <p>Driver: <b></b></p> -->
                 <!--  <p style="background-color: green;">General Servicing</b></p> -->
                 <p><button class="fa fa-info-circle text-primary userinfo" data-id='<?php echo $rows["id"]?>' data-toggle="modal" data-target="#exampleModal"> General Servicing</button></p>
                <p style="font-size: 14px;">Last General Servicing Mileage: =<?php echo $rows['current_reading'] ?> km</p>
                <p style="font-size: 14px;">Next General Servicing Mileage: <?php if($rows['current_reading'] != null){
                  echo $rows['current_reading'] + $value; }?> km
                </p>

                <p style="font-size: 14px;">Next General Service Date: 
                <?php
                $timeStamp = $rows['curr_date'];  
                if (isset($timeStamp)) {
                $timeStamp = date( "d-M-y", strtotime($timeStamp. '+90 days'));
                  echo $timeStamp;
                  }
                  
                ?>
                
                </p>

              </div>
              <div class="icon">
                <i class="fas fa-car"></i>
              </div>
             <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>

          
          <div class="col-lg-3 col-6">
            <!-- small box -->
             <div class="small-box text-light bg-dark">
              <div class="inner">
               <!-- <span class="fa fa-info-circle text-primary"> </span> -->
                <p><u><b>Dhaka Metro - CHA 53-6837</b></u></p>
                 <?php
                  $value = "3000";
                  
                  $rows = mysqli_fetch_array($view4);

                  ?>

                <!-- <p>Driver: <b></b></p> -->
                 <!--  <p style="background-color: green;">General Servicing</b></p> -->
                 <p><button class="fa fa-info-circle text-primary userinfo" data-id='<?php echo $rows["id"]?>' data-toggle="modal" data-target="#exampleModal"> General Servicing</button></p>
                <p style="font-size: 14px;">Last General Servicing Mileage: =<?php echo $rows['current_reading'] ?> km</p>
                <p style="font-size: 14px;">Next General Servicing Mileage: <?php if($rows['current_reading'] != null){
                  echo $rows['current_reading'] + $value; }?> km</p>

                <p style="font-size: 14px;">Next General Service Date: 
                <?php
                $timeStamp = $rows['curr_date'];  
                if (isset($timeStamp)) {
                $timeStamp = date( "d-M-y", strtotime($timeStamp. '+90 days'));
                  echo $timeStamp;
                  }
                  
                ?>
                
                </p>

              </div>
              <div class="icon">
                <i class="fas fa-car"></i>
              </div>
             <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>

           
          <div class="col-lg-3 col-6">
            <!-- small box -->
             <div class="small-box text-light bg-dark">
              <div class="inner">
               <!-- <span class="fa fa-info-circle text-primary"> </span> -->
                <p><u><b>Dhaka Metro - CHA 56-3756</b></u></p>
                 <?php
                  $value = "3000";
                  
                  $rows = mysqli_fetch_array($view5);

                  ?>

                <!-- <p>Driver: <b></b></p> -->
                 <!--  <p style="background-color: green;">General Servicing</b></p> -->
                 <p><button class="fa fa-info-circle text-primary userinfo" data-id='<?php echo $rows["id"]?>' data-toggle="modal" data-target="#exampleModal"> General Servicing</button></p>
                <p style="font-size: 14px;">Last General Servicing Mileage: =<?php echo $rows['current_reading'] ?> km</p>
                <p style="font-size: 14px;">Next General Servicing Mileage: <?php if($rows['current_reading'] != null){
                  echo $rows['current_reading'] + $value; }?> km
                </p>

                <p style="font-size: 14px;">Next General Service Date: 
                <?php
                $timeStamp = $rows['curr_date'];  
                if (isset($timeStamp)) {
                $timeStamp = date( "d-M-y", strtotime($timeStamp. '+90 days'));
                  echo $timeStamp;
                  }
                  
                ?>
                
                </p>
              </div>
              <div class="icon">
                <i class="fas fa-car"></i>
              </div>
             <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>

           
          <div class="col-lg-3 col-6">
            <!-- small box -->
             <div class="small-box text-light bg-dark">
              <div class="inner">
               <!-- <span class="fa fa-info-circle text-primary"> </span> -->
                <p><u><b>Dhaka Metro - GHA 13-2865</b></u></p>
                 <?php
                  $value = "3000";
                  
                  $rows = mysqli_fetch_array($view6);

                  ?>

                <!-- <p>Driver: <b></b></p> -->
                 <!--  <p style="background-color: green;">General Servicing</b></p> -->
                 <p><button class="fa fa-info-circle text-primary userinfo" data-id='<?php echo $rows["id"]?>' data-toggle="modal" data-target="#exampleModal"> General Servicing</button></p>
                <p style="font-size: 14px;">Last General Servicing Mileage: =<?php echo $rows['current_reading'] ?> km</p>
                <p style="font-size: 14px;">Next General Servicing Mileage: <?php if($rows['current_reading'] != null){
                  echo $rows['current_reading'] + $value; }?> km
                </p>

                <p style="font-size: 14px;">Next General Service Date: 
                <?php
                $timeStamp = $rows['curr_date'];  
                if (isset($timeStamp)) {
                $timeStamp = date( "d-M-y", strtotime($timeStamp. '+90 days'));
                  echo $timeStamp;
                  }
                  
                ?>
                
                </p>

              </div>
              <div class="icon">
                <i class="fas fa-car"></i>
              </div>
             <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>

          
          <div class="col-lg-3 col-6">
            <!-- small box -->
             <div class="small-box text-light bg-dark">
              <div class="inner">
               <!-- <span class="fa fa-info-circle text-primary"> </span> -->
                <p><u><b>Dhaka Metro - GHA 15-0436</b></u></p>
                 <?php
                  $value = "3000";
                  
                  $rows = mysqli_fetch_array($view7);

                  ?>

                <!-- <p>Driver: <b></b></p> -->
                 <!--  <p style="background-color: green;">General Servicing</b></p> -->
                 <p><button class="fa fa-info-circle text-primary userinfo" data-id='<?php echo $rows["id"]?>' data-toggle="modal" data-target="#exampleModal"> General Servicing</button></p>
                <p style="font-size: 14px;">Last General Servicing Mileage: =<?php echo $rows['current_reading'] ?> km</p>
                <p style="font-size: 14px;">Next General Servicing Mileage: <?php if($rows['current_reading'] != null){
                  echo $rows['current_reading'] + $value; }?> km
                </p>

                <p style="font-size: 14px;">Next General Service Date: 
                <?php
                $timeStamp = $rows['curr_date'];  
                if (isset($timeStamp)) {
                $timeStamp = date( "d-M-y", strtotime($timeStamp. '+90 days'));
                  echo $timeStamp;
                  }
                  
                ?>
                
                </p>

              </div>
              <div class="icon">
                <i class="fas fa-car"></i>
              </div>
             <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          

          <div class="col-lg-3 col-6">
            <!-- small box -->
             <div class="small-box text-light bg-dark">
              <div class="inner">
               <!-- <span class="fa fa-info-circle text-primary"> </span> -->
                <p><u><b>Dhaka Metro - GHA 17-7422</b></u></p>
                 <?php
                  $value = "3000";
                  
                  $rows = mysqli_fetch_array($view8);

                  ?>

                <!-- <p>Driver: <b></b></p> -->
                 <!--  <p style="background-color: green;">General Servicing</b></p> -->
                 <p><button class="fa fa-info-circle text-primary userinfo" data-id='<?php echo $rows["id"]?>' data-toggle="modal" data-target="#exampleModal"> General Servicing</button></p>
                <p style="font-size: 14px;">Last General Servicing Mileage: =<?php echo $rows['current_reading'] ?> km</p>
                <p style="font-size: 14px;">Next General Servicing Mileage: <?php if($rows['current_reading'] != null){
                  echo $rows['current_reading'] + $value; }?> km
                </p>
                <p style="font-size: 14px;">Next General Service Date: 
                <?php
                $timeStamp = $rows['curr_date'];  
                if (isset($timeStamp)) {
                $timeStamp = date( "d-M-y", strtotime($timeStamp. '+90 days'));
                  echo $timeStamp;
                  }
                  
                ?>
                
                </p>
 
              </div>
              <div class="icon">
                <i class="fas fa-car"></i>
              </div>
             <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          
         
          <div class="col-lg-3 col-6">
            <!-- small box -->
             <div class="small-box text-light bg-dark">
              <div class="inner">
               <!-- <span class="fa fa-info-circle text-primary"> </span> -->
                <p><u><b>Dhaka Metro - GHA 18-4839</b></u></p>
                 <?php
                  $value = "3000";
                  
                  $rows = mysqli_fetch_array($view9);

                  ?>

                <!-- <p>Driver: <b></b></p> -->
                 <!--  <p style="background-color: green;">General Servicing</b></p> -->
                 <p><button class="fa fa-info-circle text-primary userinfo" data-id='<?php echo $rows["id"]?>' data-toggle="modal" data-target="#exampleModal"> General Servicing</button></p>
                <p style="font-size: 14px;">Last General Servicing Mileage: =<?php echo $rows['current_reading'] ?> km</p>
                <p style="font-size: 14px;">Next General Servicing Mileage: <?php if($rows['current_reading'] != null){
                  echo $rows['current_reading'] + $value; }?> km
                </p>

                <p style="font-size: 14px;">Next General Service Date: 
                <?php
                $timeStamp = $rows['curr_date'];  
                if (isset($timeStamp)) {
                $timeStamp = date( "d-M-y", strtotime($timeStamp. '+90 days'));
                  echo $timeStamp;
                  }
                  
                ?>
                
                </p>
              </div>
              <div class="icon">
                <i class="fas fa-car"></i>
              </div>
             <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
            
            
          <div class="col-lg-3 col-6">
            <!-- small box -->
             <div class="small-box text-light bg-dark">
              <div class="inner">
               <!-- <span class="fa fa-info-circle text-primary"> </span> -->
                <p><u><b>Dhaka Metro - GHA 18-2585</b></u></p>
                 <?php
                  $value = "3000";
                  
                  $rows = mysqli_fetch_array($view10);

                  ?>

                <!-- <p>Driver: <b></b></p> -->
                 <!--  <p style="background-color: green;">General Servicing</b></p> -->
                 <p><button class="fa fa-info-circle text-primary userinfo" data-id='<?php echo $rows["id"]?>' data-toggle="modal" data-target="#exampleModal"> General Servicing</button></p>
                <p style="font-size: 14px;">Last General Servicing Mileage: =<?php echo $rows['current_reading'] ?> km</p>
                <p style="font-size: 14px;">Next General Servicing Mileage: <?php if($rows['current_reading'] != null){
                  echo $rows['current_reading'] + $value; }?> km
                </p>

                <p style="font-size: 14px;">Next General Service Date: 
                <?php
                $timeStamp = $rows['curr_date'];  
                if (isset($timeStamp)) {
                $timeStamp = date( "d-M-y", strtotime($timeStamp. '+90 days'));
                  echo $timeStamp;
                  }
                  
                ?>
                
                </p>

              <div class="icon">
                <i class="fas fa-car"></i>
              </div>
             <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
      </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
             <div class="small-box text-light bg-dark">
              <div class="inner">
               <!-- <span class="fa fa-info-circle text-primary"> </span> -->
                <p><u><b>Dhaka Metro - GHA 18-4019</b></u></p>
                 <?php
                  $value = "3000";
                  
                  $rows = mysqli_fetch_array($view11);

                  ?>

                <!-- <p>Driver: <b></b></p> -->
                 <!--  <p style="background-color: green;">General Servicing</b></p> -->
                 <p><button class="fa fa-info-circle text-primary userinfo" data-id='<?php echo $rows["id"]?>' data-toggle="modal" data-target="#exampleModal"> General Servicing</button></p>
                <p style="font-size: 14px;">Last General Servicing Mileage: =<?php echo $rows['current_reading'] ?> km</p>
                <p style="font-size: 14px;">Next General Servicing Mileage: <?php if($rows['current_reading'] != null){
                  echo $rows['current_reading'] + $value; }?> km
                </p>
                <p style="font-size: 14px;">Next General Service Date: 
                <?php
                $timeStamp = $rows['curr_date'];  
                if (isset($timeStamp)) {
                $timeStamp = date( "d-M-y", strtotime($timeStamp. '+90 days'));
                  echo $timeStamp;
                  }
                  
                ?>
                
                </p>
 
              </div>
              <div class="icon">
                <i class="fas fa-car"></i>
              </div>
             <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>

            <div class="col-lg-3 col-6">
            <!-- small box -->
             <div class="small-box text-light bg-dark">
              <div class="inner">
               <!-- <span class="fa fa-info-circle text-primary"> </span> -->
                <p><u><b>Dhaka Metro - CHA 52-0446</b></u></p>
                 <?php
                  $value = "3000";
                  
                  $rows = mysqli_fetch_array($view12);

                  ?>

                <!-- <p>Driver: <b></b></p> -->
                 <!--  <p style="background-color: green;">General Servicing</b></p> -->
                 <p><button class="fa fa-info-circle text-primary userinfo" data-id='<?php echo $rows["id"]?>' data-toggle="modal" data-target="#exampleModal"> General Servicing</button></p>
                <p style="font-size: 14px;">Last General Servicing Mileage: =<?php echo $rows['current_reading'] ?> km</p>
                <p style="font-size: 14px;">Next General Servicing Mileage: <?php if($rows['current_reading'] != null){
                  echo $rows['current_reading'] + $value; }?> km
                </p>

                <p style="font-size: 14px;">Next General Service Date: 
                <?php
                $timeStamp = $rows['curr_date'];  
                if (isset($timeStamp)) {
                $timeStamp = date( "d-M-y", strtotime($timeStamp. '+90 days'));
                  echo $timeStamp;
                  }
                  
                ?>
                
                </p>

              </div>
              <div class="icon">
                <i class="fas fa-car"></i>
              </div>
             <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>


        </div>
        <!-- /.row -->
        <!-- Main row -->
 
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->

    <a href="index.php" class="brand-link">

     <!-- <img src="https://www.jotform.com/uploads/usmania0015/form_files/COvid%20Logo.5fb085f7efb458.17758393.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->

      <span class="brand-text font-weight-bold">Vehicle Maintenance</span>

    </a>



    <!-- Sidebar -->

    <div class="sidebar">

      <!-- Sidebar user panel (optional) -->

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <div class="image">

        <!--   <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
 -->
        </div>

        <div class="info">

          <a class="d-block">

        

            </a>

        </div>

      </div>





    <!-- Sidebar Menu -->

      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <!-- Add icons to the links using the .nav-icon class

               with font-awesome or any other icon font library -->



         <!-- <li class="nav-header">EXAMPLES</li> -->



           <a href="login.php" class="nav-link active">

              <i class="fas fa-sign-in-alt"></i>

              <p>

              Login

            <!--    <i class="right fas fa-angle-left"></i> -->

              </p>

            </a>

      </nav>

      <!-- /.sidebar-menu -->

    </div>

    <!-- /.sidebar -->

  </aside>



    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->



<?php require ('footer.php'); ?>