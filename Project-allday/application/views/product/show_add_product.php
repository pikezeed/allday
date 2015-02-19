<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <link href="<?=base_url()?>assets/css/main.css" rel="stylesheet" type="text/css" media="screen" />

                <link href="<?=base_url()?>assets/css/product/insert_product.css" rel="stylesheet" type="text/css" media="screen" />
<title>เพิ่มข้อมมูลสินค้า</title>

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
                <h1>เพิ่มข้อมมูลสินค้า</h1>
                <hr>
             </section>
             

             <section class="showInfo">
                 <?php echo form_open_multipart('product/main_product_controller/addProduct'); ?>
                 <ul>
                     <li>
                         <label>Code Product:</label>
                         <span class="box_right">
                             <input type="text" name="code_id" placeholder="P0001">
                         </span>
                         <?= form_error('code_id')?>
                         
                     </li>
                     <li>
                         <label>Name Product:</label>
                         <span class="box_right">
                             <input type="text" name="name">
                         </span>
                         <?= form_error('name')?>
                     </li>
                     <li>
                         <label>Price:</label>
                         <span class="box_right">
                            <input type="text" name="price">
                         </span>
                          <?= form_error('price')?>
                     </li>

                     <li>
                         <label>Detail:</label>
                         <span class="box_right">
                            <textarea name="detail" rows="2" cols="40" ></textarea>
                         </span>
                          <?= form_error('detail')?>
                     </li>
                     <li>
                         <label>Email:</label>
                         <span class="box_right">
                             <input type="text" name="email" placeholder="example@hotmail.com">
                         </span>
                          <?= form_error('email')?>
                     </li>
                     <li>
                         <label>Tel-Phone:</label>
                         <span class="box_right">
                             <input type="text" name="tel" placeholder="99-9999999">
                         </span>
                         <?= form_error('tel')?>
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
                         <button class="submit" type="submit" >เพิ่มข้อมูล</button>
                     </li>
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





