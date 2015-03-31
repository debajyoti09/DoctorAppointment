<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>LogIn Page</title>
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
    if(isset($error))
        echo $error;
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


</body>
</html>