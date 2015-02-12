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
		<h1>ข้อมูลสินค้าทั้งหมด</h1>
        
             <table class="table-fill">
       <thead>
<tr>
<th class="text-left">Date Sell</th>
<th class="text-left">CODE</th>
<th class="text-left">Name Product</th>
<th class="text-left">Price(piece)</th>
<th class="text-left">Picture</th>
<th class="text-left">Amount</th>

</tr>
</thead>
            <?php if( !empty($query) ) { ?>
			<?php $no = 0; ?>
            <?php foreach($query as $item): ?>
			<?php $no++; ?>

			<tbody class="table-hover">
			<tr>
				
				
				
			
                  <tr>
<td class="text-left"><?php echo $item->date_outcome; ?></td>
<td class="text-left"><?php echo $item->code_id; ?></td>
<td class="text-left"><?php echo $item->name_p; ?></td>
<td class="text-left"><?php echo $item->price_p; ?></td>
<td class="text-left"><img src="<?=base_url()."/assets/imgs/product/".$item->picture_p?>" width="100" height="60" ></td>
<td class="text-left"><?php echo $item->amount; ?></td></tr>
                
		
				
			</tr>
            </tbody>
            <?php endforeach; ?>

			<?php }else{ ?>
			<?php 
				
				 echo "ไม่พบข้อมูล";
				} 
			?>
			
        </table> 
                <br>
                		<?= form_open('sell/sell_product/get_sell')?>

    <center><input type="submit" value="กลับสู่หน้าแรก"/></center>
		<?= form_close()?>
    </body>
</html>