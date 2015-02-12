<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Page Insert</title>
        <meta charset="UTF-8">
           <link href="<?=base_url()?>assets/css/style_edit.css" rel="stylesheet" type="text/css" media="screen" />
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
 	<h3>Insert</h3>
           <?php echo validation_errors(); ?>
		   <?php if(!empty( $error) ){
					echo $error;
				 }
		   ?>
            <?php echo form_open_multipart('employee/main_emp_controller/insertEmp'); ?>

			
			<ul class="form-style-1">
				<li><label >Code:<input type="text" id="code" name="code" class="field-divided"/></label></li>
				<li><label>Username:<input type="text"id="username" name="username" class="field-divided" /></label></li>
				<li><label>Password:<input type="password" id="passowrd" name="password" class="field-divided" /></label></li>
				<li><label>Name:<input type="text" id="name" name="name" class="field-divided" /></label></li>
				<li><label>Surname:<input type="text"id="surname" name="surname" class="field-divided" /></label></li>
                                <li><label>Address:<textarea name="address" rows="2" cols="40"  class="field-divided"></textarea> </label></li>
				<li><label>Email:<input type="text" id="email" name="email" class="field-divided" /></label></li>
				<li><label>Tel:<input type="text" id="tel" name="tel" class="field-divided" /></label></li>
				<li>
				<label>sex:</label>
					<label>male<input type="radio" id="male" name="sex" value="male" checked/>female<input type="radio" id="female" name="sex" value="female"/></label>
				</li>
				<li><label>permission:
				<select name="id_permission">
					<option value="1" <?= set_select('id_permission','1',true)?>>admin</option>
					<option value="2" <?= set_select('id_permission','2')?>>employee</option>
				</select></label>
				</li>
				<li><label>upload image:<input type="file" id="upload_img" name="upload_img"  class="field-divided" /></label></li>
	
			<li><input type="submit" value="submit"/></li>
	
   
                </ul>
            </form>       
        
        
        
        
        
        
        
        

    </body>
</html>
