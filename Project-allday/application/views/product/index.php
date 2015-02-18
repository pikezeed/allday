<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">




<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <link href="<?=base_url()?>assets/css/main.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="<?=base_url()?>assets/css/product/main_product.css" rel="stylesheet" type="text/css" media="screen" />
	<title>PRODUCT</title>
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
                <h1>ระบบจัดการสินค้า</h1>
                <hr>
             </section>
             <?= form_open('product/main_product_controller/searchProduct')?>
             <section class="search">
                <ul>
                    <li><input type="search" id="code" name="code" placeholder="Code id.."></li>
                    <li><input type="search" id="name" name="name" placeholder="Name.."></li>
                    <li><input type="submit" value="submit"></li>
                </ul>
              </section>
             <?= form_close()?>  
            
            <section class="error"><p><?php  if( !empty($error) ){ echo $error;} ?></p></section>
             <section class="tools">
                <ul>
                    <li><a href="<?=base_url()?>index.php/product/main_product_controller/showAddProduct" /><img src="<?=base_url()?>/assets/imgs/icon/add_product.png" alt="เพิ่มสินค้า" width="30" height="30"></a></li>
                    
                    <!-- ##### ตรวจสอบสิทธิ์ ##### -->
                    <?php if( $session['name_permission'] == "admin" ) { ?>
                    <li><a target="_blank" href="<?=base_url()?>index.php/product/main_product_controller/showPrintProduct"/><img src="<?=base_url()?>/assets/imgs/icon/Print.png" width="30" height="30"></a></li>
                    <?php } ?>
                </ul>
             </section>
             <section class="showInfo">
            
                 <table class="tbl_emp">
                     <thead>
                        <tr>
                            <th>No.</th>
                            <th>Edit</th>
                            <!-- ##### ตรวจสอบสิทธิ์ ##### -->
                            <?php if( $session['name_permission'] == "admin" ) { ?>
                            <th>Delete</th>
                            <?php } ?>
                            <th>Picture</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Amount</th>
                            <th>สินค้าคงเหลือ</th>
                            <th>Detail</th>
                            <th>Date</th>
                            <th>Add/Edit Store</th>
                            

                            
                            
  
                        </tr> 
                     </thead>
                     
                     <tbody>
                         <?php if( empty($query) ) { ?>
                         <tr><td colspan="11">ไม่พบข้อมูล</td></tr>
                         <?php }else{ ?>
                         
                            <!-- ##### count No. ##### -->
                            	<?php $no = 0; ?>
	
                            <?php $no = 1; ?> 
                            <?php foreach($query as $u_key): ?>
                       
                            <tr>
                               <td><?=$no?></td>
                               <td><a href="<?=base_url("index.php/product/main_product_controller/showEditProduct/?id_product=".$u_key->A_id_product); ?>"><img src="<?=base_url()?>/assets/imgs/icon/edit.png" width="30" height="30"></a></td>
                                <!-- ##### ตรวจสอบสิทธิ์ ##### -->
                               <?php if( $session['name_permission'] == "admin" ) { ?>
                               <td><a href="<?=base_url("index.php/product/main_product_controller/deleteProduct/?id_product=".$u_key->A_id_product); ?>"><img src="<?=base_url()?>/assets/imgs/icon/delete_1.png" width="25" height="25"></a></td>
                               <?php } ?>
                               
                               <td><img src="<?=base_url()."/assets/imgs/product/".$u_key->picture_p."?".$date?>" alt="รูปสินค้า" width="100" height="60" ></td>
                               
                               <td><?=$u_key->code_id; ?></td>
                               <td><?=$u_key->name_p; ?></td>
                               <td><?=$u_key->price_p; ?></td>
                               <td><?=$u_key->total_amount; ?></td>
                               <td><?=$u_key->total_amount - $u_key->total_amount_sell ?></td>
                               <td><?=$u_key->detail_p;?></td>
                               <td><?=$u_key->date;?></td>
                               <td><a  href="<?php echo base_url("index.php/store/main_store_controller/showStore/?id_product=".$u_key->A_id_product); ?> "><img src="<?=base_url()?>/assets/imgs/icon/add_income.ico" width="25" height="25"></a></td>
                               
                               
                     
                               
                               
                   
                              
                            </tr>
                            <?php $no++; ?>
                            <?php endforeach; ?>
                         <?php } ?>
                     </tbody>

                 </table>   
<!--                 <div class="result">
                     <p>รวม</p>
                 </div>-->
             </section>   
        </article>       
         <footer>
             <section class="copyright">Copyright © 2015  All rights reserved.</section>
        </footer>
    </body>



</html>







