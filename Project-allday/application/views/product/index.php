<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<script type="text/javascript">

function show_confirm(act)
{

	if(act=="edit")
		var r=confirm("Do you really want to edit?");
}
</script>


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="<?=base_url()?>assets/css/style_table.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="<?=base_url()?>assets/css/search.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="<?=base_url()?>assets/css/style_bar.css" rel="stylesheet" type="text/css" media="screen" />
	<title>PRODUCT</title>
	<meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
</head>



<body>
 <nav id="nav-1">
            <a class="link-1" href="<?=site_url()?>/employee/main_emp_controller">ระบบจัดการพนักงาน</a></a>
            <a class="link-1" href="<?=site_url()?>/product/main_product_controller">ระบบจัดการสินค้า</a>
            <a class="link-1" href="#">ระบบจัดการขายสินค้า</a>
            <a class="link-1" href="<?=site_url()?>/home_controller/logout">Logout</a>
</nav>

<div class="table-title">
<h3>PRODUCT</h3>
</div>
 <div class="table-title"><center>
        <?php  if( !empty($error) ){ echo $error;} ?>
        <?= form_open('product/main_product_controller/searchProduct')?>
        </center></div>
        <div id='container'> 
        <div class='cell'><input type="search" id="code_id" name="code" placeholder="Code id.."/></div>
        <div class='cell'><input type="search" id="name_p" name="name" placeholder="Name.."/></div>
        <div class='cell'><input type="submit" value="submit"/></div>
 </div>
        <?= form_close()?>   

<table class="table-fill">
<div class="table-title"  align="left"> 
		<a href="<?=base_url()?>index.php/product/main_product_controller/showAddProduct" /><img src="<?=base_url()?>/assets/imgs/icon/add_product.png" width="30" height="30"></a>
		<a target="_blank" href="<?=base_url()?>index.php/product/main_product_controller/showPrintProduct"/><img src="<?=base_url()?>/assets/imgs/icon/Print.png" width="30" height="30"></a></div>		
		
		
		
		
<thead>

<tr>
<th class="text-left">CODE</th>
<th class="text-left">Name Product</th>
<th class="text-left">Price(piece)</th>
<th class="text-left">Amount</th>
<th class="text-left">Detail</th>
<th class="text-left">Picture</th>
<th class="text-left">Date</th>
<th class="text-left">Edit</th>
<th class="text-left">Delete</th>
<th class="text-left">Add/Edit Store</th>
</tr>
</thead>
<?php if( !empty($query) ) 
{ 
?>
	<?php $no = 0; ?>
	<?php foreach ($query as $u_key){ ?>

<tbody class="table-hover">
<tr>
<td class="text-left"><?php echo $u_key->code_id; ?></td>
<td class="text-left"><?php echo $u_key->name_p; ?></td>
<td class="text-left"><?php echo $u_key->price_p; ?> บาท</td>
<td class="text-left"><?php echo $u_key->total_amount; ?></td>
<td class="text-left"><?php echo $u_key->detail_p; ?></td>
<td class="text-left"><img src="<?=base_url()."/assets/imgs/product/".$u_key->picture_p."?".$date?>" width="100" height="60" ></td>
<td class="text-left"><?php echo $u_key->date; ?></td>

<td class="text-left" ><a href="<?php echo base_url("index.php/product/main_product_controller/showEditProduct/?id_product=".$u_key->A_id_product); ?>"><center><img src="<?=base_url()?>/assets/imgs/icon/edit.png" width="30" height="30"></center></a></td>
<td class="text-left" ><a href="<?php echo base_url("index.php/product/main_product_controller/deleteProduct/?id_product=".$u_key->A_id_product); ?>"><center><img src="<?=base_url()?>/assets/imgs/icon/delete_1.png" width="25" height="25"><center></a></a></td>
<td class="text-left" ><a  href="<?php echo base_url("index.php/store/main_store_controller/showStore/?id_product=".$u_key->A_id_product); ?> "><center><img src="<?=base_url()?>/assets/imgs/icon/add_income.ico" width="25" height="25"><center></a></a></td>

</tr>
	<?php }?>


<?php 
}
else
{ 
?>
<tr><td colspan="10" style="text-align:center">
<?php 
	echo "ไม่พบข้อมูล";
} 
?></td>
</tr>

</tbody>
</table>
  
</body>
</html>







