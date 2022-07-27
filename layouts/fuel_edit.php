<?php
//session_start();
require_once('user_role.php');
require_once('class/main.php');
$obj = new Model;

$vn = $obj->vehicle_num();
$dr = $obj->driver_name();
$project = $obj->projects();
$rc = $obj->recommender();
$ap = $obj->approver();
$fv = $obj->fuel_vendor();

 if(isset($_GET['editId']) && !empty($_GET['editId'])) {
      $userId= $_GET['editId'];
      $data= $obj->print_fuel_data($userId);
  }


?>
<div class="content-wrapper">
<section class="content">
<div class="container-fluid">
<div class="col-md-11">
<h5 class="card-header">Edit Fuel Form</h5>
<!-- <p style="float:right;"><a href="view.php">Back to list</a></p> -->
<div class="card-body">

  <form class="form-row" id="register_form" action="form_insert.php" method="post">
  <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
  
  <div class="form-group col-md-6">
  <label for="vehicle">Vehicle Number<span class="text-danger">*</span></label>
  <select class="vehicle form-control" id="vehicle" name="vehicle_no" required>
  <option value="<?php echo $data['vehicle_id'] ?>"><?php echo $data['vehicle_num'] ?></option> 
  <?php while ($row = mysqli_fetch_assoc($vn)): ?>
  <option value="<?php echo $row['vehicle_id'] ?>"><?php echo $row['vehicle_num'] ?></option>
        <?php endwhile; ?>
  </select>
  <small class="help-text text-muted">Please select your car no. Example: Dhaka Metro-GHA-13-2865</small>
  </div>

  <div class="form-group col-md-6">
  <label for="name">Driver Name<span class="text-danger">*</span></label>
  <select class="name form-control" id="driver_name" name="name" required>
  <option value="<?php echo $data['driver_id'] ?>"><?php echo $data['driver_name'] ?></option>
  <?php while ($row = mysqli_fetch_assoc($dr)): ?>
    <option value="<?php echo $row['driver_id'] ?>"><?php echo $row['driver_name'] ?></option>
  <?php endwhile; ?>
  </select>
  <small class="help-text text-muted">Please select your project name. Example: Sabur Khan</small>
  </div>  

  <div class="form-group col-md-6">
  <label for="project">Project Name<span class="text-danger">*</span></label>
  <select class="project form-control" id="project" name="project" required>
  <option value="<?php echo $data['project_id'] ?>"><?php echo $data['project_name'] ?></option>
  <?php while ($row = mysqli_fetch_assoc($project)): ?>
      <option value="<?php echo $row['project_id'] ?>"><?php echo $row['project_name'] ?></option>
  <?php endwhile; ?>
  </select>
  <small class="help-text text-muted">Please select your project name. Example: scbd</small>
  </div>

<!--    <div class="form-group col-md-6">
  <label for="name">Previous Fuel Quantity (liter)<span class="text-danger">*</span></label>
  <input type=number value=""
  placeholder="Enter previous fuel quantity" id="name"
  class="form-control " name="p_quantity" min="0" max="" required>
  <small class="help-text text-muted">Please enter previous fuel quantity. Example: 50</small>
  </div> -->

    <div class="form-group col-md-6">
  <label for="name">Enter Memo Number<span class="text-danger">*</span></label>
  <input type=number value="<?php echo $data['memo_no'] ?>" placeholder="Enter current meter reading" id="name"
  class="form-control " name="memo_no" min="0" max="" required>
  <small class="help-text text-muted">Please enter memo Number. Example: 27025</small>
  </div>

    <div class="form-group col-md-6">
  <label for="name">Last Fuel Quantity (liter)<span class="text-danger">*</span></label>
  <input type=number value="<?php echo $data['previous_quantity'] ?>"
  placeholder="Enter current fuel quantity" id="last_quantity"
  class="form-control " name="prev_quantity" min="0" max="" required>
  <small class="help-text text-muted">Please enter fuel quantity. Example: 50</small>
  </div>

  <div class="form-group col-md-6">
  <label for="name">Current Fuel Quantity (liter)<span class="text-danger">*</span></label>
  <input type=number value="<?php echo $data['current_quantity'] ?>"
  placeholder="Enter current fuel quantity" id="name"
  class="form-control " name="cur_quantity" min="0" max="" required>
  <small class="help-text text-muted">Please enter fuel quantity. Example: 50</small>
  </div>

   <div class="form-group col-md-6">
    <label for="pass_time">Last fuel filling date<span
                class="text-danger">*</span></label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar-week"></i></span>
            </div>
           <input type="date" value="<?php echo $data['last_date'] ?>" id="last_filling" name="last_date" class="form-control" required>                             
        </div>
         <small class="help-text text-muted">Please enter fuel filling date. Example: dd/mm/yyyy</small>                     
    </div>

       <div class="form-group col-md-6">
    <label for="pass_time">Current fuel filling date<span
                class="text-danger">*</span></label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar-week"></i></span>
            </div>
           <input type="date" value="<?php echo $data['cur_date'] ?>" id="birthday" name="curr_date" class="form-control" required>                             
        </div>
         <small class="help-text text-muted">Please enter fuel filling date. Example: dd/mm/yyyy</small>                     
    </div>


    <div class="form-group col-md-6">
  <label for="name">Last fuel filling meter reading<span class="text-danger">*</span></label>
  <input type=number value="<?php echo $data['previous_reading'] ?>"
  placeholder="Enter current meter reading" id="last_reading"
  class="form-control " name="p_reading" min="0" max="" required>
  <small class="help-text text-muted">Please enter previous meter reading. Example: 4000</small>
  </div>

  <div class="form-group col-md-6">
  <label for="name">Current fuel filling meter reading<span class="text-danger">*</span></label>
  <input type=number value="<?php echo $data['current_reading'] ?>"
  placeholder="Enter current meter reading" id="name"
  class="form-control" name="c_reading" min="0" max="" required>
  <small class="help-text text-muted">Please enter curent meter reading. Example: 7000</small>
  </div>

 <div class="form-group col-md-6">
  <label for="vendor">Select fuel vendors<span class="text-danger">*</span></label>
  <select class="vendor form-control" id="fuel_vendor" name="fuel_vendor" onchange='Checkyesno(this.value);' required>
    <option value="<?php echo $data['fuel_vendor'] ?>"><?php echo $data['fuel_vendor'] ?></option>
      <?php while ($row = mysqli_fetch_assoc($fv)): ?>
      <option value="<?php echo $row['fv_name'] ?>"><?php echo $row['fv_name'] ?></option>
      <?php endwhile; ?>
      <option value="others">Other</option>
       <input type="text" class="form-control" name="othervendor" id="vendor_change" placeholder="write fuel vendor name" style='display:none;' />
  </select>
  <small class="help-text text-muted">Please select fuel vendor.</small>
  </div>

    <div class="form-group col-md-6">
    <label for="r_name">Recommender Name<span class="text-danger">*</span></label>
    <select class="r_name form-control" id="recommend" name="r_name" required>
    <option value="<?php echo $data['recommender_id'] ?>"><?php echo $data['r_name'] ?></option>
    <?php while ($row = mysqli_fetch_assoc($rc)): ?>
      <option value="<?php echo $row['recommender_id'] ?>"><?php echo $row['r_name'] ?></option>
    <?php endwhile; ?>
    </select>
    <small class="help-text text-muted">Please select your recommender name. Example: Sabur Khan</small>
    </div>

      <div class="form-group col-md-6">
    <label for="a_name">Approver Name<span class="text-danger">*</span></label>
    <select class="a_name form-control" id="approver" name="a_name" required>
    <option value="<?php echo $data['approver_id'] ?>"><?php echo $data['a_name'] ?></option>
    <?php while ($row = mysqli_fetch_assoc($ap)): ?>
      <option value="<?php echo $row['approver_id'] ?>"><?php echo $row['a_name'] ?></option>
    <?php endwhile; ?>
    </select>
    <small class="help-text text-muted">Please select your recommender name. Example: Sabur Khan</small>
    </div>

  <div class="col-12">
  <div class="float-right">
  <button type="submit" name="f_update" class="btn btn-sm btn-primary"><i class="fas fa-download"></i> Update</button>
  <a href="fuel_list.php" type="submit" name="data" class="btn btn-sm btn-secondary"></i> Cancel</a>
  </div>
  </div>
  </form>
</div>
</div>
</div>
</section>
</div>

<script type="text/javascript">
     function Checkyesno(val) {
  var element = document.getElementById('vendor_change');
  if (val == 'Select repair vendor' || val == 'others')
    element.style.display = 'block';
  else
    element.style.display = 'none';

}
</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">

  $('#vehicle').select2({
            placeholder: "Select your vehicle number",
            allowClear: true
        });
</script>

<?php require_once('footer.php'); ?>