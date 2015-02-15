<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
<?php 

		/*$this->output->set_header('HTTP/1.0 200 OK');
		$this->output->set_header('HTTP/1.1 200 OK');
		$this->output->set_header('Last-modified:'.gmdate('D,d M Y H:i:s', time()).'GMT');
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		$this->output->set_header("Cache-Control: post-check=0, pre-check=0",false);
		$this->output->set_header("Pragma: no-cache");*/
?>
 <meta charset="UTF-8">
     	<link href="<?=base_url()?>assets/css/style_edit.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="<?=base_url()?>assets/css/style_bar.css" rel="stylesheet" type="text/css" media="screen" />
   <title>Edit</title>
 </head>
 <body>
 <nav id="nav-1">
            <a class="link-1" href="<?=site_url()?>/employee/main_emp_controller">ระบบจัดการพนักงาน</a></a>
            <a class="link-1" href="<?=site_url()?>/product/main_product_controller">ระบบจัดการสินค้า</a>
            <a class="link-1" href="<?=site_url()?>/sell/main_sell_controller">ระบบจัดการขายสินค้า</a>
            <a class="link-1" href="<?=site_url()?>/home_controller/logout">Logout</a>
</nav>     
   <h3>Edit</h3>
   <?php echo validation_errors(); ?>
   <?php if( !empty($error) ){ echo $error; }?>
    <?php echo form_open_multipart('employee/main_emp_controller/editEmp'); ?>

<ul class="form-style-1">
    <li><img src="<?=base_url()."/assets/imgs/employee/".$query->img_path?>?date=<?=$img_date?>" alt="รูปพนักงาน" width="100" height="100"></li>
	<li><label >Code:<input type="text" id="code" name="code" value="<?=$query->emp_number?>" class="field-divided"/></label></li>
    <li><label>Username:<input type="text"id="username" name="username" value="<?=$query->username?>" class="field-divided" /></label></li>
    <li><label>Password:<input type="password" id="passowrd" name="password" value="<?=$query->password?>" class="field-divided" /></label></li>
    <li><label>Name:<input type="text" id="name" name="name" value="<?=$query->name?>" class="field-divided" /></label></li>
	<li><label>Surname:<input type="text"id="surname" name="surname" value="<?=$query->surname?>" class="field-divided" /></label></li>
        <li><label>Address:<textarea name="address" rows="2" cols="40" class="field-divided"><?=$query->address?></textarea></label></li>
	<li><label>Email:<input type="text" id="email" name="email" value="<?=$query->email?>" class="field-divided" /></label></li>
	<li><label>Tel:<input type="text" id="tel" name="tel" value="<?=$query->tel?>"  class="field-divided" /></label></li>
	<li>
	<label>sex:</label>
		<label>male<input type="radio" id="male" name="sex" value="male" <?php if($query->sex == "male") echo "checked"; ?>/>
		female<input type="radio" id="female" name="sex" value="female" <?php if($query->sex == "female") echo "checked"; ?> /></label>
	</li>
	<li><label>permission:
	<select name="id_permission">
	<?php if($query->id_permission == "1"){?>
	<option value="1" <?= set_select('id_permission','1',true)?>>admin</option>
	<option value="2" <?= set_select('id_permission','2', false)?>>employee</option>
	<?php }?>
	<?php if($query->id_permission == "2"){?>
	<option value="1" <?= set_select('id_permission','1',false)?>>admin</option>
	<option value="2" <?= set_select('id_permission','2', true)?>>employee</option>
	<?php }?>

	</select></label>
	</li>
	<li><label>upload image:<input  type="file" id="upload_img" name="upload_img" class="field-divided" /></label></li>
	<input type="hidden" name="id_code_original" value="<?=$query->emp_number?>">
     <input type="hidden" name="id_authen" value="<?=$query->id_authen?>">
	 <input type="hidden" name="date" value="<?=$query->date_start?>">
	 <input type="hidden" name="img" value="<?=$query->img_path?>">
	 <input type="hidden" name="id_emp" value="<?=$query->id_emp?>">
     <li><center><input type="submit" value="Edit"/></center></li>
	
   
</ul>
</form>    
     
     
     
     
     
     
     
     
     


 </body>
</html>