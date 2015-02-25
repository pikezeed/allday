
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="<?=base_url()?>assets/css/main.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="<?=base_url()?>assets/css/sell/detail_sell.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="<?=base_url()?>assets/css/sell/main_sell.css" rel="stylesheet" type="text/css" media="screen" />
	<title>ระบบขายสินค้า</title>
	<meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">

</head>
    <body>
        <header>
            
           
                <div class="container_navigation">
                  <nav>
                    <a class="link_menuTop" href="<?=site_url()?>/employee/main_emp_controller">ระบบจัดการพนักงาน</a> |
                    <a class="link_menuTop" href="<?=site_url()?>/product/main_product_controller">ระบบจัดการสินค้า</a> |
                    <a class="link_menuTop" href="<?=site_url()?>/sell/main_sell_controller">ระบบจัดการขายสินค้า</a> |
                    <a class="link_menuTop" href="<?=site_url()?>/home_controller/logout">Logout</a>
                  </nav>
                </div>  
                
            
        </header>
        
        <article>
             <section class="topic">
                <h1>ระบบขายสินค้า</h1>
                <hr>
             </section>
             <?= form_open('sell/main_sell_controller/searchProductForSell')?>
             <section class="search">
                <ul>
                    <li><input type="search" id="code" name="code_id" placeholder="Code id.."></li>
                    <li><input type="search" id="name" name="name_p" placeholder="Name.."></li>
                    <li><input type="submit" value="submit"></li>
                </ul>
              </section>
             <?= form_close()?>  
            
            <section class="error"><p><?php  if( !empty($error) ){ echo $error;} ?></p></section>
             <section class="tools">
                <ul>
                    <li><a target="_blank" href="<?=site_url()?>/sell/main_sell_controller/showPrintSell"/><img src="<?=base_url()?>/assets/imgs/icon/Print.png" width="30" height="30"></a></li>
                </ul>
             </section>
             <section class="showInfo">
            
                 <table class="tbl_emp">
                     <thead>
                        <tr>
                            <th>No.</th>
                            <th>เลือกสินค้า</th>
                            <th>Picture</th>
                            <th>Code</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Amount</th>
                            <th>สินค้าคงเหลือ</th>
                            <th>ระบุจำนวน</th>         
  
                        </tr> 
                     </thead>
                     <?php echo form_open_multipart('sell/main_sell_controller/confirmSell');?>
                     <tbody>
                         <?php if( empty($query) ) { ?>
                         <tr><td colspan="11">ไม่พบข้อมูล</td></tr>
                         <?php }else{ ?>
                         
                            <!-- ##### count No. ##### -->

                            <?php $no = 1; ?> 
                            
                            
                            <?php foreach($query as $u_key): ?>
                       
                            <tr>
                               <td><?=$no?></td>
                               <td class="text-left"><input type="checkbox" name="checkSelect[]" value="<?=$u_key->A_id_product?>"/></td>
                               <td><img src="<?=base_url()."/assets/imgs/product/".$u_key->picture_p."?".$date?>" alt="รูปสินค้า" width="100" height="60" ></td>
                               
                               <td><?=$u_key->code_id; ?></td>
                               <td><?=$u_key->name_p; ?></td>
                               <td><?=$u_key->price_p; ?></td>
                               <td><?=$u_key->total_amount; ?></td>
                               <td><?=$u_key->total_amount - $u_key->total_amount_sell ?></td>
                               <td class="text-left"><input type="text" name="txt_<?=$u_key->A_id_product?>"/></td>
                               <input type="hidden" name="total_<?=$u_key->A_id_product?>" value="<?=$u_key->total?>" > 
                            </tr>
                            <?php $no++; ?>
                            <?php endforeach; ?>
                            
                         <?php } ?>
                           
                         
                     </tbody>
                     <tfoot>
                         <tr >
                             <td colspan="8" style="border: none;"><button class="submit" type="submit" >ยืนยัน</button></td>
                         </tr>
                     </tfoot>
                     
                     <?php echo form_close();?>
                 </table>   
      
             </section>   
        </article>       
         <footer>
             <section class="copyright">Copyright © 2015  All rights reserved.</section>
        </footer>
    </body>
    
    

</html>







