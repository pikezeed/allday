

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">


<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?=base_url()?>assets/css/style_edit.css" rel="stylesheet" type="text/css" media="screen" />
<title>Sell</title>

</head>

<body>

<h3> Sell Product</h3>
<?php echo form_open_multipart('sell/sell_product/sell_Add/');?>
<form >
<ul class="form-style-1">
	<li><label ><center><img src="<?=base_url()."/assets/imgs/product/".$picture_p?>" width="250" height="100" ></center></label></li>
    <li><label>Product code: <input type="hidden" name="code_id" value="<?= $code_id?>"/><?php echo $code_id; ?></label></li>
    <li><label>Product name: <?php echo $name_p; ?></label></li>
    <li><label>Price (per piece): <?php echo $price_p; ?></label></li>
	<li><label>Amount:<input type="text" name="amount" value="" class="field-divided" /></label></li>
    <li>
		
        <input type="submit" name="submit" value="Buy" />
    </li>
</ul>
</form>




</body>

</html>