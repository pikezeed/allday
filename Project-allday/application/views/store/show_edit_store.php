

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">


<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?=base_url()?>assets/css/style_edit.css" rel="stylesheet" type="text/css" media="screen" />
<link href="<?=base_url()?>assets/css/style_table.css" rel="stylesheet" type="text/css" media="screen" />

	<link href="<?=base_url()?>assets/css/style_bar.css" rel="stylesheet" type="text/css" media="screen" />
<title>Sell</title>

</head>

<body>
 <nav id="nav-1">
            <a class="link-1" href="main_emp_controller">ระบบจัดการพนักงาน</a></a>
            <a class="link-1" href="#">ระบบจัดการสินค้า</a>
            <a class="link-1" href="#">ระบบจัดการขายสินค้า</a>
            <a class="link-1" href="<?=site_url()?>/home_controller/logout">Logout</a>
</nav>
<h3>EDIT Store</h3>
<?php echo form_open_multipart('store/main_store_controller/editStore');?>
<form >  
<ul class="form-style-1">
	
    <!-- <li><label >Product code: <input type="hidden" name="code_id" value="<?= $query_product->code_id?>"/><?php echo $query_product->code_id; ?></label></li>
    <li><label>Product name: <input type="hidden" name="name" value="<?= $query_product->name_p?>"/><?php echo $query_product->name_p; ?></label></li>
	<li><label>Price : <input type="hidden" name="price" value="<?= $query_product->price_p?>"/><?php echo $query_product->price_p; ?></label></li>
	<li><label>detail : <input type="hidden" name="detail" value="<?= $query_product->detail_p?>"/><?php echo $query_product->detail_p; ?></label></li>
	-->

	<li><label>จำนวน:</label><span style="color:red;"><?php echo validation_errors();?></span><input type="text" name="amount" 
	value="<?=$query_store->total_p?>" class="field-divided" /></li>
	<input type="hidden" name="id_product" value="<?= $_GET['id_product']?>"/>
	<input type="hidden" name="id_store" value="<?=$_GET['id_store']?>"/>    
	<li>
        <input type="submit" name="submit" value="EDIT" />
    </li>

	

</ul>

</form>




</body>
</html>