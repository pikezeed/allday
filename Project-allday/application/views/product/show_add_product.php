<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?=base_url()?>assets/css/style_edit.css" rel="stylesheet" type="text/css" media="screen" />
<link href="<?=base_url()?>assets/css/style_bar.css" rel="stylesheet" type="text/css" media="screen" />
<title>ADD PRODUCT</title>

</head>

<body>
<nav id="nav-1">
	<a class="link-1" href="main_emp_controller">ระบบจัดการพนักงาน</a></a>
	<a class="link-1" href="#">ระบบจัดการสินค้า</a>
	<a class="link-1" href="#">ระบบจัดการขายสินค้า</a>
	<a class="link-1" href="<?=site_url()?>/home_controller/logout">Logout</a>
</nav>

<h3>ADD PRODUCT</h3>
<?php echo form_open_multipart('product/main_product_controller/addProduct');?>

<form>
<ul class="form-style-1">
    <li><label >Code Product <span class="required">* </span><input type="text" name="code_id" name="field1" class="field-divided"  /></label></li>
    <li><label>Product name <span class="required">*</span><input type="text" name="name" class="field-divided" /></label></li>
    <li><label>Price (per piece)<span class="required">* </span><input type="text" name="price" class="field-divided" /></label></li>
	<!-- <li><label>amount <span class="required">* </span><input type="text" name="amount" class="field-divided" /></label></li> -->
    <li>
        <label>Detail<span class="required">*</span></label>
        <textarea type="text" name="detail" class="field-long field-textarea"></textarea>
    </li>
	<li><label>Picture <span class="required">* </span><input type="file" name="upload_img" id="upload_img"  class="field-divided" /></label></li>
	
    <li>
        <input type="submit" name="submit" value="Submit" />
    </li>
</ul>
</form>
<?php echo validation_errors();?>
<?php 
	if(!empty($error)){
		echo $error;
	}
?>
</body>

</html>





