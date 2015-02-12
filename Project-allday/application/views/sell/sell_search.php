
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<nav id="nav-1">
  <a class="link-1" href="main_emp_controller">ระบบจัดการพนักงาน</a></a>
  <a class="link-1" href="#">About</a>
  <a class="link-1" href="#">Contact</a>
  <a class="link-1" href="home_controller/logout">Logout</a>
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
        <?= form_open('sell/sell_product/searchByLike')?>
        </center></div>
        <div id='container'> 
        <div class='cell'><input type="search" id="code_id" name="code_id" placeholder="Code id.."/></div>
        <div class='cell'><input type="search" id="name_p" name="name_p" placeholder="Name.."/></div>
		<div class='cell'><input type="search" id="date_outcome" name="date_outcome" placeholder="Date.."/></div>
        <div class='cell'><input type="submit" value="submit"/></div>
        </div>
        <?= form_close()?>  

<table class="table-fill">

<thead>
<tr>
<th class="text-left">Date</th>
<th class="text-left">CODE</th>
<th class="text-left">Name Product</th>
<th class="text-left">Price(piece)</th>
<th class="text-left">Picture</th>
<th class="text-left">Amount</th>

</tr>
</thead>

 <?php if( !empty($query) ) { ?>
			<?php $no = 0; ?>

<?php foreach ($query as $u_key){ ?>

<tbody class="table-hover">
<tr>
<td class="text-left"><?php echo $u_key->date_outcome; ?></td>
<td class="text-left"><?php echo $u_key->code_id; ?></td>
<td class="text-left"><?php echo $u_key->name_p; ?></td>
<td class="text-left"><?php echo $u_key->price_p; ?></td>
<td class="text-left"><?php echo $u_key->amount; ?></td>
<td class="text-left"><img src="<?=base_url()."/assets/imgs/product/".$u_key->picture_p?>" width="100" height="60" ></td>
</tr>



<?php }?>
<?php }else{ ?>
			<?php 
				 echo "ไม่พบข้อมูล";
				} 
			?>

</tbody>
</table>
  <br>
                		<?= form_open('sell/sell_product/get_sell')?>

    <center><input type="submit" value="กลับสู่หน้าแรก"/></center>
		<?= form_close()?>

  </body>







