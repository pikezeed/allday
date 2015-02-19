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
        <link href="<?=base_url()?>assets/css/main.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?=base_url()?>assets/css/sell/print_sell.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?=base_url()?>assets/css/sell/main_sell.css" rel="stylesheet" type="text/css" media="all" />
        
        <meta name="viewport" content="width=device-width">
    </head>
   <body>
        <header>
            
                
            
        </header>
        
        <article>
             <section class="topic">
                <h1>ข้อมูลการขายทั้งหมด</h1>
                <hr>
             </section>

            
            <section class="error"><p><?php  if( !empty($error) ){ echo $error;} ?></p></section>
 
             <section class="showInfo">
            
                 <table class="tbl_emp">
                     <thead>
                        <tr>
                            <th>No.</th>
                    
                            <th>Picture</th>
                            <th>Code</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Detail</th>
                            <th>จำนวนสินค้าทั้งหมด</th>
                            <th>จำนวนสินค้าที่ขายไป</th>         
                            <th>จำนวนสินค้าคงเหลือ</th>
                            <th>รายได้</th>
                            <th>Date</th>
                        </tr> 
                     </thead>
         
                     <tbody>
                         <?php if( empty($query) ) { ?>
                         <tr><td colspan="11">ไม่พบข้อมูล</td></tr>
                         <?php }else{ ?>
                         
                            <!-- ##### count No. ##### -->

                            <?php $no = 1; ?> 
                            
                            
                            <?php foreach($query as $item): ?>
                       
                            <tr>
                               <td><?=$no?></td>
                               
                               <td><img src="<?=base_url()."/assets/imgs/product/".$item->picture_p."?".$date?>" alt="รูปสินค้า" width="100" height="60" ></td>
                               
                               <td><?=$item->code_id; ?></td>
                               <td><?=$item->name_p; ?></td>
                               <td><?=$item->price_p; ?></td>
                               <td><?=$item->detail_p?></td>
                               <td><?=$item->total_amount; ?></td>
                               <td><?=$item->total_amount_sell?></td>
                               <td><?=$item->total_amount - $item->total_amount_sell?> </td>
                               <td><?=$item->total_amount_sell * $item->price_p?> บาท</td>
                               <td><?=$item->date?></td>
                            </tr>
                            <?php $no++; ?>
                            <?php endforeach; ?>
                            
                         <?php } ?>
                           
                         
                     </tbody>
            
                     
                    
                 </table>   
                 <div class="result">
                     <p>รวมสินค้าทั้งหมด <?=$total->totalAmountProduct?> ชิ้น</p>
                     <p>จำนวนสินค้าที่ขายไปทั้งหมด <?=$total->totalAmountSell?> ชิ้น</p>
                     <p>รวมสินค้าคงเหลือทั้งหมด <?=$total->remain?> ชิ้น</p>
                     <p>รายได้รวม <?=number_format($total->revenue)?> บาท</p>
                 </div>
             </section>   
        </article>       
         <footer>
             <section class="copyright">Copyright © 2015  All rights reserved.</section>
        </footer>
    </body>    
   
    
    

</html>