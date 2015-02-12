

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
<h3>Store</h3>
<?php echo form_open_multipart('store/main_store_controller/addStore');?>
<form >  
<ul class="form-style-1">
	<li><label ><center><img src="<?=base_url()."/assets/imgs/product/".$query_product->picture_p?>?<?=$date?>" width="200" height="200" ></center></label></li>
    <li><label >Product code: <input type="hidden" name="code_id" value="<?= $query_product->code_id?>"/><?php echo $query_product->code_id; ?></label></li>
    <li><label>Product name: <input type="hidden" name="name" value="<?= $query_product->name_p?>"/><?php echo $query_product->name_p; ?></label></li>
	<li><label>Price : <input type="hidden" name="price" value="<?= $query_product->price_p?>"/><?php echo $query_product->price_p; ?></label></li>
	<li><label>detail : <input type="hidden" name="detail" value="<?= $query_product->detail_p?>"/><?php echo $query_product->detail_p; ?></label></li>
	<!-- <li><label>วันที่สินค้าเข้ามา : <input type="hidden" name="name_p" value="<?= $date?>"/><?php echo $date; ?></label></li>-->
	<hr>
	<!-- <li><label>date : <?=$date?></label></li> -->

	<!-- <li><label>รหัส stock: <span style="color:red"><?php if(!empty($error)){ echo $error; }?></span><input type="text" name="code_store"  class="field-divided" /></label></li> -->
    <!-- <li><label>ราคา:<input type="text" name="price_p"  class="field-divided" /></label></li-->
	<li><label>จำนวน:</label><span style="color:red;"><?php echo validation_errors();?></span><input type="text" name="total" class="field-divided" /></li>
	<input type="hidden" name="id_product" value="<?= $_GET['id_product'];?>"/>
    <li>
		
        <input type="submit" name="submit" value="ADD" />
    </li>



</ul>

</form>

<!-- ############### delimeter ############# -->
<table class="table-fill">	
<thead>

<tr>
<th class="text-left">No.</th>


<!-- <th class="text-left">ราคา ต่อ ชิ้น</th> -->
<th class="text-left">จำนวน</th>

<th class="text-left">Date</th>
<th class="text-left">Edit</th>
<th class="text-left">Delete</th>
</tr>
</thead>
 <?php if( $query_store->result() ) { ?>
			<?php $no = 1; ?>
<?php foreach ($query_store->result() as $row){ ?>

<tbody class="table-hover">
<tr>
<td class="text-left"><?php echo $no; ?></td>
<!-- <td class="text-left"><?php echo $row->price_p; ?> บาท</td>-->
<td class="text-left"><?php echo $row->total_p; ?> ชิ้น</td>

<td class="text-left"><?php echo $row->date; ?></td>

<td class="text-left" ><a href="<?php echo base_url("index.php/store/main_store_controller/showEditStore/?id_product=".$_GET['id_product']."&id_store=".$row->id_store); ?>"><center><img src="<?=base_url()?>/assets/imgs/icon/edit.png" width="30" height="30"></center></a></td>
<td class="text-left" ><a href="<?php echo base_url("index.php/store/main_store_controller/deleteStore/?id_product=".$_GET['id_product']."&id_store=".$row->id_store); ?>"><center><img src="<?=base_url()?>/assets/imgs/icon/delete_1.png" width="25" height="25"><center></a></a></td>
</tr>


	<?php $no++;?>
	<?php }?>


<?php }else{ ?>




<center><?php  echo "ไม่พบข้อมูล";} ?></center>

<tr>		
<td style="text-align:right;" colspan="5">มีสินค้าทั้งหมด  <?=$query_remain->remain?> ชิ้น</td>
</tr>
</tbody>

</table>
<center></center>
<!--<div><a href="<?=site_url()?>/product/main_product_controller">กลับสู่หน้าหลัก</a></div>-->
</body>
</html>