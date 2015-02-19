<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="<?=base_url()?>assets/css/main.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?=base_url()?>assets/css/product/edit_product.css" rel="stylesheet" type="text/css" media="screen" />
    <title>แก้ไขข้อมูลสิน้คา</title>
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
                <h1>แก้ไขข้อมูลสินค้า</h1>
                <hr>
             </section>
             

             <section class="showInfo">
                 <?php echo form_open_multipart('product/main_product_controller/editProduct'); ?>
                 <ul>
                     <li>
                         <label>Picture:</label>
                         <span class="box_right">
                             <img src="<?=base_url()?>assets/imgs/product/<?=$query->picture_p?>?date=<?=$date?>" alt="รูปproduct" width="100" height="100">
                         </span>
                     </li>
                     <li>
                         <label>Code Product:</label>
                         <span class="box_right">
                             <input type="text" name="code_id" placeholder="P0001" value="<?=$query->code_id; ?>">
                         </span>
                         <?= form_error('code_id')?>
                         
                     </li>
                     <li>
                         <label>Name Product:</label>
                         <span class="box_right">
                             <input type="text" name="name" value="<?=$query->name_p; ?>">
                         </span>
                         <?= form_error('name_p')?>
                     </li>
                     <li>
                         <label>Price:</label>
                         <span class="box_right">
                            <input type="text" name="price" value="<?=$query->price_p; ?>">
                         </span>
                          <?= form_error('price_p')?>
                     </li>

                     <li>
                         <label>Detail:</label>
                         <span class="box_right">
                            <textarea name="detail" rows="2" cols="40"><?=$query->detail_p;?></textarea>
                         </span>
                          <?= form_error('detail_p')?>
                     </li>

                     <li>
                         <label>Upload Image</label>
                         <span class="box_right">
                             <input type="file" id="upload_img" name="upload_img">
                         </span>
                         <label class="validate_error">
                            <?php 
                                if(!empty($error)){
                                        echo $error;
                                }
                            ?>
                         </label>
                     </li>
                     <li>
                         <button class="submit" type="submit" >แก้ไขข้อมูล</button>
                     </li>
                    <input type="hidden" name="id_product" value="<?=$query->id_product?>">
                    <input type="hidden" name="upload_img_original" value="<?=$query->id_product?>">
                    <input type="hidden" name="code_id_original" value="<?=$query->code_id?>">
                    <input type="hidden" name="img_path" value="<?=$query->picture_p?>">
                     <?= form_close()?> 
                     
                     
                 </ul>
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