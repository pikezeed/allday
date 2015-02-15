
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
   
 <nav id="nav-1">
            <a class="link-1" href="<?=site_url()?>/employee/main_emp_controller">ระบบจัดการพนักงาน</a></a>
            <a class="link-1" href="<?=site_url()?>/product/main_product_controller">ระบบจัดการสินค้า</a>
            <a class="link-1" href="<?=site_url()?>/sell/main_sell_controller">ระบบจัดการขายสินค้า</a>
            <a class="link-1" href="<?=site_url()?>/home_controller/logout">Logout</a>
</nav>

<head>
        
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="<?=base_url()?>assets/css/style_table.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="<?=base_url()?>assets/css/style_bar.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="<?=base_url()?>assets/css/search.css" rel="stylesheet" type="text/css" media="screen" />
	<title>PRODUCT</title>
	<meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">

</head>

<body>
<div class="table-title">
<h3>SELL</h3>
</div>

<div class="table-title"><center>
        <?php  if( !empty($error) ){ echo $error;} ?>
        <?= form_open('sell/main_sell_controller/searchProductForSell')?>
        </center></div>
        <div id='container'> 
        <div class='cell'><input type="search" id="code_id" name="code_id" placeholder="Code id.."/></div>
        <div class='cell'><input type="search" id="name_p" name="name_p" placeholder="Name.."/></div>
        <div class='cell'><input type="submit" value="submit"/></div>
        <a target="_blank" href="<?=site_url()?>/sell/main_sell_controller/showPrintSell"/><img src="<?=base_url()?>/assets/imgs/icon/Print.png" width="30" height="30"></a>
		</div>
        <?= form_close()?>  

<table class="table-fill">

<thead>
<tr>
<th class="text-left">CHOOSE</th>
<th class="text-left">AMOUNT</th>
<th class="text-left">CODE</th>
<th class="text-left">Name Product</th>
<th class="text-left">Price(piece)</th>
<th class="text-left">สินค้าคงเหลือ</th>
<th class="text-left">Picture</th>
<!-- <th class="text-left">Sell</th> -->

</tr>
</thead>

 <?php if( !empty($query) ) { ?>
			<?php $no = 0; ?>
<?php echo form_open_multipart('sell/main_sell_controller/confirmSell');?>
<?php foreach ($query as $u_key){ ?>

<tbody class="table-hover">
<tr>
<td class="text-left"><input type="checkbox" name="checkSelect[]" value="<?=$u_key->A_id_product?>"/></td>
<td class="text-left"><input type="text" name="txt_<?=$u_key->A_id_product?>"/></td>
<input type="hidden" name="total_<?=$u_key->A_id_product?>" value="<?=$u_key->total?>" >
<td class="text-left"><?php echo $u_key->code_id; ?></td>
<td class="text-left"><?php echo $u_key->name_p; ?></td>
<td class="text-left"><?php echo $u_key->price_p; ?></td>
<td class="text-left"><?php echo $u_key->total; ?></td>
<td class="text-left"><img src="<?=base_url()."/assets/imgs/product/".$u_key->picture_p?>?<?=$date?>" width="100" height="60" ></td>
<!-- <td class="text-left" ><a href="<?php echo base_url("index.php/sell/main_sell_controller/showConfirmSell/?id_product=".$u_key->A_id_product); ?>" ><center><img src="<?=base_url()?>/assets/imgs/icon/shopping.png" width="30" height="30" ></center></a></td> -->

</tr>


<?php }?>
<?php }else{ ?>
			<?php 
				 echo "ไม่พบข้อมูล";
				} 
			?>
<tr><td class="text-left" colspan="7"><input  style="float:right;" type="submit" value="Buy"></td></tr>
<?php echo form_close();?>
</tbody>

</table>
  

  </body>







