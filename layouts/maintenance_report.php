<?php 
require_once('class/main.php');
$title = 'Maintenance Report'; include("user_role.php");
$obj = new Model;
$vn = $obj->vehicle_num();

 if(isset($_GET['project']) && !empty($_GET['project'])) {
      $id= $_GET['project'];
      $data= $obj->maintenance_report($id);
  }

?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Maintenance Report</h1>
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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Maintenance Record List</h3>
              </div>

  
              <!-- /.card-header -->
              <div class="card-body">
<!--       <div class="form-group col-md-2">
    <label for="vehicle">Vehicle Number<span class="text-danger">*</span></label> 
    <select class="vehicle2 form-control" id="vehicle" name="vehicle_no" required>
    <option>Select</option> 
    <?php //while ($row = mysqli_fetch_assoc($vn)): ?>
    <option value="<?php //echo $row['vehicle_id'] ?>"><?php// echo $row['vehicle_num'] ?></option>
          <?php //endwhile; ?>
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

                /*Data Table Export to excel button Position Right CSS*/
             /*   div.dt-buttons {
                float: right;
                padding-bottom: 10px;
                  }*/
                  </style>
                <table id="maintenance_table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#SN</th>
                    <th>Driver Name</th>
                    <th>Vehicle No</th>
                    <th>Project</th>
                    <th>Service Type</th>
                    <th>Particulars</th>
                    <th>Cost</th>
                    <th>Vendor</th>
                    <th>Curent Reading</th>
                    <th>Previous Reading</th>
                    <th>Difference</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
<?php 

                  $no=1;
                  while ($rows = mysqli_fetch_array($data)) {

                ?>
                  <tr>
                    <td><?php echo $no. "</br>"; ?></td>
                   <td><?php echo $rows['driver_name']?></td>
                    <td><?php echo $rows['vehicle_num']?></td>
                    <td><?php echo $rows['project_name']?></td>
                    <td><?php echo $rows['type_name']?></td>
                    <td><?php echo $rows['problems']?></td>
                    <td><?php echo $rows['repair_cost']?></td>
                    <td><?php echo $rows['vendor']?></td>
                    <td><?php echo $rows['current_reading']?></td>
                    <td><?php echo $rows['previous_reading']?></td>
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
                  //date_default_timezone_set("Asia/Dhaka");            
                 $timeStamp = $rows['curr_date'] ;
                  $timeStamp = date( "d-M-y", strtotime($timeStamp));
                  echo $timeStamp;
                  ?>
                    
                  </td>
                  <td><a href="edit.php?editId=<?php echo $rows["id"]?>"><button type="button" id="<?php //echo $rows["id"]; ?>" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-edit"></i></button></td>
                     
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

<script>
  // $(function () {
  //   $("#maintenance_table").DataTable({
  //     "responsive": true, "lengthChange": false, "autoWidth": false,
  //      "buttons": [/*"copy", "csv", "print",  "pdf",*/ "excel", "colvis"]
  //   }).buttons().container().appendTo('#maintenance_table_wrapper .col-md-6:eq(0)');
  // });
            $(document).ready(function () {
                
            $('#maintenance_table').DataTable({
                dom: 'Brtip',
                buttons: [
                    {
                  extend: 'excelHtml5',
                  text: 'Export to excel',
                   exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11 ]
                }
                    },
                    'colvis'
                   // $('row c[r*="11"]', sheet).attr( 's', '2' );
                ]
            });


        });


             
</script>


<?php require_once('footer.php'); ?>