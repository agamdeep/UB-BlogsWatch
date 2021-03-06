<?php include('users_header.php'); ?>
<div class="container">
  <!-- <form class="form-horizontal"> -->
  <?= form_open('users/submit_article', ['class'=> 'form-horizontal']); ?>
  <?= form_hidden('user_id', $this->session->userdata('user_id')); ?>
  <fieldset>
    <legend>Add Article</legend>
    <div class="form-group">
      <label class="col-lg-2 control-label">Article Title</label>
      <div class="col-lg-6">
       <?php echo form_input(['name'=>'title','placeholder'=>'Article Title', 'class'=>'form-control', 'value'=>set_value('title')]); ?>
      </div>
      <?php echo form_error('title','<p class="text-danger">','</p>'); ?>
    </div>
    <div class="form-group">
      <label class="col-lg-2 control-label">Article Body</label>
      <div class="col-lg-6">
        <?php echo form_textarea(['class'=> 'form-control', 'name'=>'body', 'placeholder'=> 'Article Body', 'value'=>set_value('body')]); ?>
      </div>
      <?php echo form_error('body','<p class="text-danger">','</p>'); ?>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
       <button type="reset" class="btn btn-default">Cancel</button>
        <?php echo form_submit(['name'=>'submit','value'=>'Submit', 'class'=>'btn btn-primary']); ?>
      </div>
    </div>
  </fieldset>
  
</form>
</div>
</body>
