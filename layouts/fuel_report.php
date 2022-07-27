<?php 

require_once('class/main.php');
$title = 'Fuel Report'; include("user_role.php");

$obj = new Model;
$vn = $obj->vehicle_num();

 if(isset($_GET['project']) && !empty($_GET['project'])) {
      $id= $_GET['project'];
      $data= $obj->fuel_report($id);
  }

?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Fuel Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Fuel</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Modal -->
      <div class="container" >
            <!-- Modal -->
            <div class="modal fade" id="empModal" role="dialog">
                <div class="modal-dialog modal-xl">
                
                    <!-- Modal content-->
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
        </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Fuel Record List</h3>
              </div>

  
              <!-- /.card-header -->
              <div class="card-body">
          <!--   <div class="form-group col-md-2">
              <select class="vehicle2 form-control" id="vehicle" name="vehicle_no" required>
              <option>Select</option> 

              </select>
            </div> -->
                  <style>
                  table {
                    font-family: arial, sans-serif;
                    border-collapse: collapse;
                    width: 100%;
                  }

                  td, th {
                    border: 1px solid #dddddd;
                    text-align: left;
                    padding: 8px;
                  }


                  </style>
                <table id="fuel_table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#SN</th>
                    <th>Car Number</th>
                    <th>Driver Name</th>
                    <th>Project</th>
                    <th>Vendor</th>
                    <th>Recharge Date</th>
                    <th>Curent Reading</th>
                    <th>Fuel Quantity</th>
                    <th>KM Usage</th>
                    <th>Avg/L</th>                    
                    <!-- <th>Action</th> -->
                  </tr>
                  </thead>
                  <tbody>
                <?php 

                  $no=1;
                  while ($rows = mysqli_fetch_array($data)) {

                ?>
                  <tr>
                    <td><?php echo $no. "</br>"; ?></td>
                    <td><?php echo $rows['vehicle_num']?></td>
                    <td><?php echo $rows['driver_name']?></td>                   
                    <td><?php echo $rows['project_name']?></td>
                    <td><?php echo $rows['fuel_vendor']?></td>
                    <td>
                    <?php
                    //date_default_timezone_set("Asia/Dhaka");            
                     $timeStamp = $rows['cur_date'] ;
                      $timeStamp = date( "d-M-Y", strtotime($timeStamp));
                      echo $timeStamp;
                    ?>                    
                    </td>
                    <td><?php echo $rows['current_reading']?></td>
                    <td><?php echo $rows['current_quantity']?></td>
                    <td>
                      <?php 


                      $a = $rows['current_reading'];
                      $b = $rows['previous_reading'];

                      $c = $a - $b;

                      echo $c;


                      ?>
                      
                    </td>
                    <td>
                    <?php

                      $a = $rows['current_reading'];
                      $b = $rows['previous_reading'];
                      $c = $rows['previous_quantity'];

                      $d = ($a - $b) / $c;

                      echo number_format((float)$d, 2, '.', '');

                    ?>
                    </td>
                    </tr>


              <?php 
                $no++; 

               } 

               ?>

               <!-- Button trigger modal -->

                  </tbody>
                </table>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<!-- <script>
  $(function () {
    $("#fuel_table").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
       "buttons": [/*"copy", "csv", "print",  "pdf",*/ "excel", "colvis"]
    }).buttons().container().appendTo('#fuel_table_wrapper .col-md-6:eq(0)');
  });
</script> -->

<script>
  // $(function () {
  //   $("#maintenance_table").DataTable({
  //     "responsive": true, "lengthChange": false, "autoWidth": false,
  //      "buttons": [/*"copy", "csv", "print",  "pdf",*/ "excel", "colvis"]
  //   }).buttons().container().appendTo('#maintenance_table_wrapper .col-md-6:eq(0)');
  // });
            $(document).ready(function () {
                
            $('#fuel_table').DataTable({
                dom: 'Brtip',
                buttons: [
                    {
                  extend: 'excelHtml5',
                  text: 'Export to excel',
                  responsive: true,
                    },
                    'colvis'
                   // $('row c[r*="11"]', sheet).attr( 's', '2' );
                ]
            });


        });


             
</script>



<?php require_once('footer.php'); ?>