<?php
//session_start(); 
require_once('header.php');
require_once('layouts/user_role.php');
require_once('layouts/class/main.php');

$obj = new Model;
$project = $obj->projects();

?>
<div class="content-wrapper">
<section class="content">
<div class="container-fluid">
<div class="col-md-11">
<h5 class="card-header">Add Approver</h5>
<!-- <p style="float:right;"><a href="view.php">Back to list</a></p> -->
<div class="card-body">

  <form class="form-row" id="register_form" action="form_insert.php" method="post">
  <input type="hidden" name="id" value="">
  

  <div class="form-group col-md-6">
  <label for="name">Approver Name<span class="text-danger">*</span></label>
  <input type=text value=""
  placeholder="Enter approver name" id="name"
  class="form-control " name="a_name" min="0" max="" required>
  <small class="help-text text-muted">Enter approver name.</small>
  </div>

  <div class="form-group col-md-6">
  <label for="name">Designation<span class="text-danger">*</span></label>
  <input type=text value=""
  placeholder="Enter designation" id="name"
  class="form-control " name="designation" min="0" max="" required>
  <small class="help-text text-muted">Enter designation.</small>
  </div>

    <div class="form-group col-md-6">
  <label for="project">Project Name<span class="text-danger">*</span></label>
  <select class="project form-control" id="project" name="project" required>
  <option></option>
  <?php while ($row = mysqli_fetch_assoc($project)): ?>
      <option value="<?php echo $row['project_name'] ?>"><?php echo $row['project_name'] ?></option>
  <?php endwhile; ?>
  </select>
  <small class="help-text text-muted">Please select your project name. Example: scbd</small>
  </div>

  <div class="col-12">
  <div class="float-left">
  <button type="submit" name="approver" class="btn btn-sm btn-primary"><i class="fas fa-download"></i> Save</button>
  <a href="approver_list.php" type="submit" name="data" class="btn btn-sm btn-secondary"></i> Cancel</a>
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
<?php require_once('footer.php'); ?>