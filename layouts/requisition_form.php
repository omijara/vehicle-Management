<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//session_start(); 
require_once('header.php');
require_once('user_role.php');
require_once('class/main.php');
$obj = new Model;

$vn = $obj->vehicle_num();
$dr = $obj->driver_name();
$project = $obj->projects();
//$items = $obj->item_list();
$rc = $obj->recommender();
$ap = $obj->approver();



?>
<div class="content-wrapper">
<section class="content">
<div class="container-fluid">
<div class="col-md-11">
<h5 class="card-header">Requisitin Form</h5>
<!-- <p style="float:right;"><a href="view.php">Back to list</a></p> -->
<div class="card-body">

  <form class="form-row" id="register_form" action="form_insert.php" method="post">
  <input type="hidden" name="id" value="">

    <div class="form-group col-md-6">
    <label for="vehicle">Vehicle Number<span class="text-danger">*</span></label>
    <select class="vehicle2 form-control" id="vehicle" name="vehicle_no" required>
    <option></option> 
    <?php while ($row = mysqli_fetch_assoc($vn)): ?>
    <option value="<?php echo $row['vehicle_id'] ?>"><?php echo $row['vehicle_num'] ?></option>
          <?php endwhile; ?>
    </select>
    <small class="help-text text-muted">Please select your car no. Example: Dhaka Metro-GHA-13-2865</small>
  </div>
    <div class="form-group col-md-6">
    <label for="name">Driver Name<span class="text-danger">*</span></label>
    <select class="name form-control" id="driver" name="driver_name" required>
    <option></option>
    <?php while ($row = mysqli_fetch_assoc($dr)): ?>
      <option value="<?php echo $row['driver_id'] ?>"><?php echo $row['driver_name'] ?></option>
    <?php endwhile; ?>
    </select>
    <small class="help-text text-muted">Please select your project name. Example: Sabur Khan</small>
    </div>  

  <div class="form-group col-md-6">
  <label for="project">Project Name<span class="text-danger">*</span></label>
  <select class="project form-control" id="project" name="project" required>
  <option></option>
  <?php while ($row = mysqli_fetch_assoc($project)): ?>
      <option value="<?php echo $row['project_id'] ?>"><?php echo $row['project_name'] ?></option>
  <?php endwhile; ?>
  </select>
  <small class="help-text text-muted">Please select your project name. Example: scbd</small>
  </div>
<!-- 
  <div class="form-group col-md-6">
  <label for="name">Current meter reading<span class="text-danger">*</span></label>
  <input type=number value=""
  placeholder="Enter current meter reading" id="name"
  class="form-control" name="c_reading" min="0" max="" required>
  <small class="help-text text-muted">Please enter curent meter reading. Example: 7000</small>
  </div>
 -->

  <div class="form-group col-md-6">
  <label for="name">Remarks<span class="text-danger">*</span></label>
  <textarea id="w3review" name="comment" class="form-control"></textarea>
  <small class="help-text text-muted">Use comma "," after every line</small>
  </div>



<!--   <div class="form-group col-md-6">
  <label for="pass_time">Choose Date<span
  class="text-danger">*</span></label>
  <div class="input-group">
  <div class="input-group-prepend">
  <span class="input-group-text"><i class="fas fa-calendar-week"></i></span>
  </div>
  <input type="text" required name="date" id="date" class="form-control" style="padding: .375rem .75rem;background:#fff" value="dd-mm-yyyy" autocomplete='off' readonly>

  </div>                    
  </div> -->
     <div class="form-group col-md-6">
    <label for="r_name">Recommender Name<span class="text-danger">*</span></label>
    <select class="r_name form-control" id="recommend" name="r_name" required>
    <option></option>
    <?php while ($row = mysqli_fetch_assoc($rc)): ?>
      <option value="<?php echo $row['recommender_id'] ?>"><?php echo $row['r_name'] ?></option>
    <?php endwhile; ?>
    </select>
    <small class="help-text text-muted">Please select your recommender name. Example: Sabur Khan</small>
    </div>

       <div class="form-group col-md-6">
    <label for="a_name">Approver Name<span class="text-danger">*</span></label>
    <select class="a_name form-control" id="approver" name="a_name" required>
    <option></option>
    <?php while ($row = mysqli_fetch_assoc($ap)): ?>
      <option value="<?php echo $row['approver_id'] ?>"><?php echo $row['a_name'] ?></option>
    <?php endwhile; ?>
    </select>
    <small class="help-text text-muted">Please select your recommender name. Example: Sabur Khan</small>
    </div>

  <div class="col-12">
  <div class="float-right">
  <button type="submit" name="requisition" class="btn btn-sm btn-primary"><i class="fas fa-download"></i> Save</button>
  <a href="requisition_list.php" type="submit" class="btn btn-sm btn-secondary"></i> Cancel</a>
  </div>
  </div>
  </form>
</div>
</div>
</div>
</section>
</div>


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">
  $('#vehicle').on('change',function(){
    //alert("Yes");
  $('#project').val('').change();
  $('#driver').val('').change();
  $('#recommend').val('').change();
  $('#approver').val('').change();

  var vehicleID = $("#vehicle").val();
  //$('#project').val('').change();

  if(vehicleID){

  $.ajax({
    url: 'car3.php',
    type: 'POST',
    data: {vehicleID:vehicleID},
    success: function(res) {
      res = JSON.parse(res);
      if(res.status == 'success') {
        $('#project').val(res.data.project_id).change();
         $('#driver').val(res.data.driver_id).change();
        $('#recommend').val(res.data.recommender_id).change();
        $('#approver').val(res.data.approver_id).change();
      }

      else{
        alert(res.msg);
      }

    },
    error: function(err) {
      console.log(err)
    }
  })
}
})

  $('#vehicle').select2({
            placeholder: "Select your vehicle number",
            allowClear: true
        });

</script>

<?php require_once('footer.php'); ?>