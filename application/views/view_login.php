<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>LogIn Page</title>
<script src="<?php echo base_url().'assets/js/ApplicationJS/jquery-1.11.1.js' ?>"></script>
<script src="<?php echo base_url().'assets/js/BootStrapJS/bootstrap.min.js' ?>"></script>
<link rel="stylesheet" type="text/css"  href="<?php echo base_url().'assets/css/BootstrapCSS/bootstrap.css' ;?>">
<body>

<div id="container">
    <h1>LogIn</h1>
    <h3>
        <?php
        if (isset($welcome_message))
        echo $welcome_message; 
        ?>
    </h3>
    <?php
    
    echo form_open('login_validation');
    
    echo validation_errors();
    
    echo "<p>Email: ";
    echo form_input('email',$this->input->post('email'));
    echo "</p>";
    
    echo "<p>Password: ";
    echo form_password('password');
    echo "</p>";
    
    echo "<p>";
    echo form_submit('login_submit','Login');
    echo "</p>";
    
    echo form_close();
    ?>
    
    <a href='<?php echo base_url()."signup"; ?>'>Sign Up!</a>
</div>

<div class="modal fade" id="error_modal">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Warning</h4>
    </div>
    <div class="modal-body">
      <p>One fine body&hellip;</p>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    
</body>
</html>