<?php
//session_start(); 
require_once('header.php');
require_once('sidebar_menu.php');
require_once('class/main.php');

?>
<div class="content-wrapper">
<section class="content">
<div class="container-fluid">
<div class="col-md-11">
<h5 class="card-header">Add new item</h5>
<!-- <p style="float:right;"><a href="view.php">Back to list</a></p> -->
<div class="card-body">

  <form class="form-row" id="register_form" action="form_insert.php" method="post">
  <input type="hidden" name="id" value="">
  <div class="form-group col-md-6">
  <label for="name">Item name<span class="text-danger">*</span></label>
  <input type=text value=""
  placeholder="Enter item name" id="name"
  class="form-control " name="item_name" min="0" max="" required>
  <small class="help-text text-muted">Enter item.</small>
  </div>

  <div class="col-12">
  <div class="float-left">
  <button type="submit" name="item" class="btn btn-sm btn-primary"><i class="fas fa-download"></i> Save</button>
  <a href="item_list.php" type="submit" name="data" class="btn btn-sm btn-secondary"></i> Cancel</a>
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