

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">


<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?=site_url()?>assets/css/style_edit.css" rel="stylesheet" type="text/css" media="screen" />
<title>Sell</title>

</head>

<body>

<h3> Sell Product</h3>
<?php echo form_open_multipart('sell/main_sell_controller/confirmSell/');?>
<form >
<ul class="form-style-1">
	<li><label ><center><img src="<?=base_url()."/assets/imgs/product/".$query->picture_p?>?<?=$date?>" width="250" height="100" ></center></label></li>
    <li><label>Product code: <input type="hidden" name="code_id" value="<?= $query->code_id?>"/><?php echo $query->code_id; ?></label></li>
    <li><label>Product name: <?php echo $query->name_p; ?></label></li>
    <li><label>Price (per piece): <?php echo $query->price_p; ?></label></li>
	<li><label>สิ้นคาทั้งหมด: <?php echo $query->total; ?> ชิ้น</label></li>
	<li><label>Amount:<input type="text" name="amount" class="field-divided" /></label></li>
	<input type="hidden" name="id_product" value="<?= $_GET['id_product']?>"/>
    <li>
		
        <input type="submit" name="submit" value="Buy" />
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