<?php include('admin_header.php'); ?>

<div class="container">
  <!-- <form class="form-horizontal"> -->
  <?= form_open('login/login_blogger', ['class'=> 'form-horizontal']) ?>
  <fieldset>
    <legend>Blogger Login</legend>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">User Name</label>
      <div class="col-lg-6">
       <?php echo form_input(['name'=>'username','placeholder'=>'Please enter your user name', 'class'=>'form-control', 'value'=>set_value('username')]); ?>
      </div>
      <?= form_error('username','<p class="text-danger">','</p>'); ?>
    </div>
 <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-6">
       <?php echo form_password(['name'=>'password','placeholder'=>'Please enter your Password', 'class'=>'form-control', 'value'=>set_value('password')]); ?>
      </div>
      <?= form_error('password','<p class="text-danger">','</p>'); ?>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <?php echo form_submit(['name'=>'login','value'=>'Log In', 'class'=>'btn btn-primary']); ?>
      </div>
    </div>
        <a class="col-lg-4 col-lg-offset-2" href="#">Forgot Password</a>
  </fieldset>
  <?php if($this->session->flashdata('login_failed')): ?> 
    <div class="alert alert-dismissible alert-danger col-lg-6 col-lg-offset-2">
    <?= $this->session->flashdata('login_failed'); ?>
    </div>
  <?php endif; ?>


<?php echo form_close(); ?>
</div>



<?php include('admin_footer.php'); ?></html>