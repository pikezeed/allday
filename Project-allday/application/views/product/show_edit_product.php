<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?=base_url()?>assets/css/style_edit.css" rel="stylesheet" type="text/css" media="screen" />
<link href="<?=base_url()?>assets/css/style_bar.css" rel="stylesheet" type="text/css" media="screen" />
<title>Edit</title>
<nav id="nav-1">
            <a class="link-1" href="main_emp_controller">ระบบจัดการพนักงาน</a></a>
            <a class="link-1" href="#">ระบบจัดการสินค้า</a>
            <a class="link-1" href="#">ระบบจัดการขายสินค้า</a>
            <a class="link-1" href="<?=site_url()?>/home_controller/logout">Logout</a>
</nav>
</head>

<body>

<h3>Edit Product</h3>
<?php echo form_open_multipart('product/main_product_controller/editProduct');?>
<form >
<ul class="form-style-1">
	<li><img src="<?=base_url()?>assets/imgs/product/<?=$query->picture_p?>?date=<?=$date?>" alt="รูปproduc" width="100" height="100"></li>
    <li><label >Enter product code: <input type="text" name="code_id" value="<?php echo $query->code_id; ?>" class="field-divided"  /></label></li>
    <li><label>Enter product name:<input type="text" name="name" value="<?php echo $query->name_p; ?>" class="field-divided" /></label></li>
    <li><label>Price (per piece)<input type="text" name="price" value="<?php echo $query->price_p; ?>" class="field-divided" /></label></li>
    <li>
        <label>Detail</label>
        <textarea type="text" name="detail" class="field-long field-textarea"><?php echo $query->detail_p;?></textarea>
    </li>
	<li><label>Picture <input type="file" name="upload_img" id="upload_img" class="field-divided" /></label></li>

	<input type="hidden" name="id_product" value="<?=$query->id_product?>">
	<input type="hidden" name="upload_img_original" value="<?=$query->id_product?>">
	<input type="hidden" name="code_id_original" value="<?=$query->code_id?>">
	<input type="hidden" name="img_path" value="<?=$query->picture_p?>">

    <li>
        <input type="submit" name="submit" value="Edit" />
    </li>
	<li>
		 <?php echo validation_errors(); ?>
		 <?php if( !empty($error) ){ echo $error; }?>
	</li>
	<li><a href="<?=site_url()?>/product/main_product_controller">กลับหน้าแรก</</li>
</ul>
</form>

a>


</body>

</html>