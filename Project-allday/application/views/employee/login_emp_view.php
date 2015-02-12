<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Log-in</title>
   <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css" media="screen" type="text/css" />
 </head>
 <body>
 <span href="#" class="button" id="toggle-login">Log in</span>
 <div id="login">
	<div id="triangle"></div>
   <h1>Login Form</h1>
   <?php echo form_open('employee/login_emp_controller/checkAuthentication'); ?>
    <input type="Username" placeholder="Username" id="username" name="username"/>
    <input type="Password" placeholder="Password" id="password" name="password" />
    <input type="submit" value="Login" />
	<center><font color="red"><?php echo validation_errors(); ?></font></center>
   <?php form_close()?>
   </div>     
     
     



 </body>
</html>