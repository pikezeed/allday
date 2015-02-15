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
     <link href="<?=base_url()?>assets/css/style_edit.css" rel="stylesheet" type="text/css" media="screen" />
	 <link href="<?=base_url()?>assets/css/style_bar.css" rel="stylesheet" type="text/css" media="screen" />
 <meta charset="UTF-8">
   <title>Detail</title>
 </head>
 <body>
  <nav id="nav-1">
            <a class="link-1" href="<?=site_url()?>/employee/main_emp_controller">ระบบจัดการพนักงาน</a></a>
            <a class="link-1" href="<?=site_url()?>/product/main_product_controller">ระบบจัดการสินค้า</a>
            <a class="link-1" href="<?=site_url()?>/sell/main_sell_controller">ระบบจัดการขายสินค้า</a>
            <a class="link-1" href="<?=site_url()?>/home_controller/logout">Logout</a>
</nav>
   <center><h3>Detail</h3></center>
   <?php echo validation_errors(); ?>
   <?php if( !empty($error) ){ echo $error; }?>
   <?php echo form_open_multipart('employee/main_emp_controller/index'); ?>   
   
   <ul class="form-style-1">
	
    <li><img src="<?=base_url()."/assets/imgs/employee/".$query->img_path?>?date=<?=$img_date?>" alt="รูปพนักงาน" width="100" height="100"></li>
	<li><label >Code: <?=$query->emp_number?></label></li>
        <li><label>Username: <?=$query->username?></label></li>
        <li><label>Password: <?=$query->password?></label></li>
        <li><label>Name: <?=$query->name?></label></li>
	<li><label>Surname: <?=$query->surname?></label></li>
        <li><label>Address: <?=$query->address?></label></li>
	<li><label>Email: <?=$query->email?></label></li>
	<li><label>Tel: <?=$query->tel?></label></li>
	<li>
	<label>sex: <?=$query->sex?></label>
	</li>
	<li><label>permission:
	<?php if($query->id_permission == "1"){?>
	<span>admin</span>
	<?php }?>
	<?php if($query->id_permission == "2"){?>
	<span>employee</span>
	<?php }?></label>
	</li>
	
	<input type="hidden" name="id_code_original" value="<?=$query->emp_number?>">
     <input type="hidden" name="id_authen" value="<?=$query->id_authen?>">
	 <input type="hidden" name="date" value="<?=$query->date_start?>">
	 <input type="hidden" name="img" value="<?=$query->img_path?>">
	 <input type="hidden" name="id_emp" value="<?=$query->id_emp?>">
     <li> <center><input type="submit" value="ย้อนกลับ"/></center></li>

</ul>
     
     
     
     
 
   </form>
 </body>
</html>