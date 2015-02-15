<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">    
        <link href="<?=base_url()?>assets/css/style_table.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="<?=base_url()?>assets/css/search.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="<?=base_url()?>assets/css/style_bar.css" rel="stylesheet" type="text/css" media="screen" />
        <meta name="viewport" content="width=device-width">
    </head>
    
   
    
    
    <body>

	<!--  <nav id="nav-1">
            <a class="link-1" href="main_emp_controller">ระบบจัดการพนักงาน</a></a>
            <a class="link-1" href="#">ระบบจัดการสินค้า</a>
            <a class="link-1" href="#">ระบบจัดการขายสินค้า</a>
            <a class="link-1" href="<?=site_url()?>/home_controller/logout">Logout</a>
	</nav> -->
		<h1>ข้อมูลสินค้าทั้งหมด</h1>
       
             <table class="table-fill">
             <thead>
				<tr>
				<th class="text-left">Picture</th>
				<th class="text-left">code product</th>
				<th class="text-left">name</th>
				<th class="text-left">ราคาต่อชิ้น</th>
				<th class="text-left">detail</th>
				<th class="text-left">จำนวนทั้งหมด</th>
				<th class="text-left">ขายไปแล้ว</th>
				<th class="text-left">จำนวนคงเหลือ</th>
                
				
				 <th class="text-left">รายได้</th>
                 
                 <th class="text-left">date</th>
				
				</tr>
			</thead>   
            <?php if( !empty($query) ) { ?>
			<?php $no = 0; ?>
            <?php foreach($query as $item): ?>
			<?php $no++; ?>

			<tbody class="table-hover">
			<tr>
				<td class="text-left"><img src="<?=base_url()."/assets/imgs/product/".$item->picture_p?>" width="100" height="60" >
                 <td class="text-left"><?=$item->code_id?></td>
                <td class="text-left"><?=$item->name_p?></td>
				<td class="text-left"><?=$item->price_p?> บาท</td>
				 <td class="text-left"><?=$item->detail_p?></td>
				<td class="text-left"><?=$item->total_amount?></td>
				<td class="text-left"><?=$item->total_amount_sell?></td>
				<td class="text-left"><?=$item->total_amount - $item->total_amount_sell?></td>
                
				
				<td class="text-left"><?=$item->total_amount_sell * $item->price_p?> บาท</td>
                
                 <td class="text-left"><?=$item->date?></td>
                
		
				
			</tr>
            </tbody>
            <?php endforeach; ?>
			
			<!-- <tbody class="table-hover">
		     <tr>
			 <td class="text-left" colspan="3" style="text-align:center;background-color:white;">รวมสินค้าทั้งหมด</td>
			 <td class="text-left"><?=$sum->amount_store?></td>
			 </tr>
			</tbody> -->
			<?php }else{ ?>
			<?php 
				
				 echo "ไม่พบข้อมูล";
				} 
			?>

			
        </table> 
		<p style="width:779px;margin-left:auto;margin-right:auto;margin-top:20px;color:black;text-align:right;">รวมสินค้าทั้งหมด <?=$total->totalAmountProduct?> ชิ้น</p>
		<p style="width:779px;margin-left:auto;margin-right:auto;margin-top:20px;color:black;text-align:right;">จำนวนสินค้าที่ขายไปทั้งหมด <?=$total->totalAmountSell?> ชิ้น</p>
		<p style="width:779px;margin-left:auto;margin-right:auto;margin-top:20px;color:black;text-align:right;">รวมสินค้าคงเหลือทั้งหมด <?=$total->remain?> ชิ้น</p>
		<p style="width:779px;margin-left:auto;margin-right:auto;margin-top:20px;color:black;text-align:right;">รายได้รวม <?=number_format($total->revenue)?> บาท</p>
                <br>
                		<?= form_open('showdata/get_All')?>

   <!-- <center><input type="submit" value="กลับสู่หน้าแรก"/></center> -->
		<?= form_close()?>
    </body>
</html>