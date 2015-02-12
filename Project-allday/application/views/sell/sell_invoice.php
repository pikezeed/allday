<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="<?=base_url()?>assets/css/style_invoice1.css" rel="stylesheet" type="text/css" />
	
	<title>PRODUCT</title>
	<meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
</head>

<body>
<div class="header">
ใบเสร็จ
</div>
<div class="table-title">
<h3>COMPANY NAME</h3>
</div>


<table class="table-fill">

<div class="table-title">
		
           <h4> ที่อยู่ บริษัท A motor จำกัด  กทม 
		   Phone: (555) 555-5555  </h4>               
            </div>

<thead>
<tr>
<th class="text-left">CODE</th>
<th class="text-left">Name Product</th>
<th class="text-left">Description</th>
<th class="text-left">Quantity</th>
<th class="text-left">Price</th>

</tr>
</thead>

 <?php if( !empty($query) ) { ?>
			<?php $no = 0; ?>

<?php foreach ($query as $u_key){ ?>

<tbody class="table-hover">
<tr>
<td class="text-left"><?php echo $u_key->code_id; ?></td>
<td class="text-left"><?php echo $u_key->name_p; ?></td>
<td class="text-left"><?php echo $u_key->detail_p; ?></td>
<td class="text-left"><?php echo $u_key->amount; ?></td>
<td class="text-left"><?php echo $u_key->price_p; ?></td>

</tr>
</tbody>
	

<?php }?>
<?php }else{ ?>
			<?php 
				 echo "ไม่พบข้อมูล";
				} 
			?>
	
</table>
<br></br>

<div class="total-value">Total : 1,000</div>

<br></br>
 <div class="table-title">
<h4 align="right" >_________________________</h4>
<h4 align="right">ลายเซ็นต์</h4>               
 </div>

 
 <?= form_open('sell/sell_product/get_sell')?>

    <center><input type="submit" value="กลับสู่หน้าแรก"/></center>
		<?= form_close()?>
 
  </body>