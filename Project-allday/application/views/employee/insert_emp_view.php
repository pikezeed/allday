<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Page Insert</title>
        <meta charset="UTF-8">
         
        <meta name="viewport" content="width=device-width">
                <link href="<?=base_url()?>assets/css/main.css" rel="stylesheet" type="text/css" media="screen" />
                <link href="<?=base_url()?>assets/css/employee/insert_emp.css" rel="stylesheet" type="text/css" media="screen" />
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
                <h1>เพิ่มข้อมูลพนักงาน</h1>
                <hr>
             </section>
             

             <section class="showInfo">
                 <?php echo form_open_multipart('employee/main_emp_controller/insertEmp'); ?>
                 <ul>
                     <li>
                         <label>Code:</label>
                         <span class="box_right">
                             <input type="text" name="code" placeholder="EMP0000">
                         </span>
                         <?= form_error('code')?>
                         
                     </li>
                     <li>
                         <label>Username:</label>
                         <span class="box_right">
                             <input type="text" name="username">
                         </span>
                         <?= form_error('username')?>
                     </li>
                     <li>
                         <label>Password:</label>
                         <span class="box_right">
                            <input type="password" name="password">
                         </span>
                          <?= form_error('password')?>
                     </li>
                     <li>
                         <label>Name:</label>
                         <span class="box_right">
                            <input type="text" name="name">
                         </span>
                         <?= form_error('name')?>
                     </li>
                     <li>
                         <label>Surname:</label>
                         <span class="box_right">
                             <input type="text" name="surname">
                         </span>
                         <?= form_error('surname')?>
                     </li>
                     <li>
                         <label>Address:</label>
                         <span class="box_right">
                            <textarea name="address" rows="2" cols="40" ></textarea>
                         </span>
                          <?= form_error('address')?>
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
                         <label>Sex:</label>
                         <span class="box_right">
                            <label>male:</label>
                            <input type="radio" name="sex" value="male" checked>
                            <label>female:</label>
                            <input type="radio" name="sex" value="female">
                         </span>
                     </li>
                     <li>
                         <label>Permission:</label>
                         <span class="box_right">
                             <select name="id_permission">
                                 <option value="1" selected="selected">admin</option>
                                 <option value="2">employee</option>
                             </select>
                         </span>
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
