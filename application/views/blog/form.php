<?php $this->load->view('header'); ?>
 <br>
Form View 1 simple form
<br>
<?php echo validation_errors(); ?>
<br>
<?php  $attributes = array('class' => 'blog', 'id' => 'blog_id'); ?>
<?php  echo form_open('blog/form_action',$attributes); ?>
<?php  echo form_input('username',set_value('username'));  ?>
<?php  echo form_password('password');  ?>
<?php  echo form_submit('mysubmit', 'Submit'); ?>
<?php  echo form_close(); ?>
<br>
Form View 2 file uploading
<br>
<?php  echo form_open_multipart('blog/upload'); ?>
<?php  echo form_upload('file');  ?>
<?php  echo form_submit('mysubmit', 'upload file'); ?>
<?php  echo form_close(); ?>