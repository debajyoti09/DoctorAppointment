<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sign up Page</title>

<body>

<div id="container">
    <h1>Sign Up</h1>
    <?php
    echo form_open('signup_validation');
    
    echo validation_errors();
    
    echo "<p>Email: ";
    echo form_input('email',$this->input->post('email'));
    echo "</p>";
    
    echo "<p>First Name: ";
    echo form_input('firstname',$this->input->post('firstname'));
    echo "</p>";
    
    echo "<p>Last Namel: ";
    echo form_input('lastname',$this->input->post('lastname'));
    echo "</p>";
    
    echo "<p>Password: ";
    echo form_password('password');
    echo "</p>";
    
    echo "<p>Confirm Password: ";
    echo form_password('cpassword');
    echo "</p>";
    
    echo "<p>";
    echo form_submit('signup_submit','Sign up!');
    echo "</p>";
    
    
    
    echo form_close();
    ?>
    
    
</div>

</body>
</html>