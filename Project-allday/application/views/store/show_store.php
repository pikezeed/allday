

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">


<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
           <link href="<?=base_url()?>assets/css/main.css" rel="stylesheet" type="text/css" media="screen" />
           <link href="<?=base_url()?>assets/css/store/show_store.css" rel="stylesheet" type="text/css" media="screen" />
           <link href="<?=base_url()?>assets/css/store/table_store.css" rel="stylesheet" type="text/css" media="screen" />
<title>store</title>

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
                <h1>เพิ่ม Store สินค้า</h1>
                <hr>
             </section>
             

             <section class="showInfo">
                 
                 <ul>
                     <li>
                         <label>Picture</label>
                         <span class="box_right">
                             <img src="<?=base_url()."/assets/imgs/product/".$query_product->picture_p?>?<?=$date?>" width="100" height="100" >
                         </span>
                     </li>
                     <li>
                         <label>Code Product:</label>
                         <span class="box_right">
                             <?=$query_product->code_id?>
                         </span>
                     </li>
                     <li>
                         <label>Name Product:</label>
                         <span class="box_right">
                             <?=$query_product->name_p?>
                         </span>
                     </li>
                     <li>
                         <label>Price:</label>
                         <span class="box_right">
                            <?=$query_product->price_p?>
                         </span>
                     </li>
                     <li>
                         <label>Detail:</label>
                         <span class="box_right">
                            <?=$query_product->detail_p?>
                         </span>
                         
                     </li>
                     <li>
                         <label>สินค้าใน store:</label>
                         <span class="box_right">
                           <?php if( empty($query_total) ){?>
                              0 ชิ้น
                           <?php }else{ ?>
                           <?=$query_total->total?> ชิ้น
                           <?php } ?>
                         </span>
                         
                     </li>
                     <li>
                         <label>ขายไปแล้ว:</label>
                         <span class="box_right">
                             
                             <?php if(empty($query_remain) ){?>
                                0 ชิ้น
                             <?php }else{ ?>
                             <?=$query_remain->total_remain?> ชิ้น
                             <?php } ?>
                             
                         </span>                       
                     </li>
                     <li>
                         <label>คงเหลือสินค้า:</label>
                         <span class="box_right">
                             
                             <?php if( empty($query_total)  || empty($query_remain) ){?>
                                0 ชิ้น
                             <?php }else{ ?>
                             <?=($query_total->total - $query_remain->total_remain)?> ชิ้น
                             <?php } ?>
                             
                         </span>
                        
                     </li>
                     <li></li>
                     


                     
                     
                 </ul>
                 <?php echo form_open_multipart('store/main_store_controller/addStore');?>
                 <ul>
                     <li>
                         <label>เพิ่ม Store:</label>
                         <span class="box_right">
                             <input type="text" name="total" >
                         </span>
                         <label> ชิ้น</label>
                         <?= form_error('total')?>
                     </li> 
                                       
                     <li>
                         <button class="submit" type="submit" >เพิ่มสินค้า</button>
                     </li>
                     <input type="hidden" name="code_id" value="<?= $query_product->code_id?>">
                     <input type="hidden" name="name" value="<?= $query_product->name_p?>">
                     <input type="hidden" name="price" value="<?= $query_product->price_p?>">
                     <input type="hidden" name="detail" value="<?= $query_product->detail_p?>">
                     <input type="hidden" name="id_product" value="<?= $_GET['id_product'];?>">
                 </ul>
                 <?= form_close()?> 
             </section> 
    <!-- ################### -->
             <section class="showInfo">
            
                 <table class="tbl_emp">
                     <thead>
                        <tr>
                            <th>No.</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            <th>จำนวน</th>
                            <th>วันและเวลาสินค้าเข้า</th>
                        </tr> 
                     </thead>
                     
                     <tbody>
                         <?php if( empty($query_store) ) { ?>
                         <tr><td colspan="11">ไม่พบข้อมูล</td></tr>
                         <?php }else{ ?>
                         
                            <!-- ##### count No. ##### -->
                            <?php $no = 1; ?> 
                            <?php foreach($query_store->result() as $item): ?>
                       
                            <tr>
                                <td><?=$no?></td>
                                <td><a href="<?=base_url("index.php/store/main_store_controller/showEditStore/?id_product=".$_GET['id_product']."&id_store=".$item->id_store); ?>"><img src="<?=base_url()?>/assets/imgs/icon/edit.png" width="30" height="30"></a></td>
                                <!-- should be delete both id product in tbl_store and tbl_sell -->
                                <td><a href="<?=base_url("index.php/store/main_store_controller/deleteStore/?id_product=".$_GET['id_product']."&id_store=".$item->id_store); ?>"><img src="<?=base_url()?>/assets/imgs/icon/delete_1.png" width="25" height="25"></a></td>
                                <td><?=$item->total_p?> ชิ้น</td>
                                <td><?=$item->date?></td>
                               
                               
                   
                              
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