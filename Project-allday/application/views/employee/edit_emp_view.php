<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 <meta charset="UTF-8">
               <link href="<?=base_url()?>assets/css/main.css" rel="stylesheet" type="text/css" media="screen" />
 
                <link href="<?=base_url()?>assets/css/employee/edit_emp.css" rel="stylesheet" type="text/css" media="screen" />
   <title>Edit</title>
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
                <h1>แก้ไขข้อมูลพนักงาน</h1>
                <hr>
             </section>
             

             <section class="showInfo">
                 <?php echo form_open_multipart('employee/main_emp_controller/editEmp'); ?>
                 <ul>
                     <li>
                         <label>Picture:</label>
                         <span>
                             <img src="<?=base_url()."/assets/imgs/employee/".$query->img_path?>?date=<?=$img_date?>" alt="รูปพนักงาน" width="100" height="100">
                         </span>
                     </li>
                     <li>
                         <label>Code:</label>
                         <span class="box_right">
                             <input type="text" name="code" placeholder="EMP0000" value="<?=$query->emp_number?>">
                         </span>
                         <?= form_error('code')?>
                         
                     </li>
                     <li>
                         <label>Username:</label>
                         <span class="box_right">
                             <input type="text" name="username" value="<?=$query->username?>">
                         </span>
                         <?= form_error('username')?>
                     </li>
                     <li>
                         <label>Password:</label>
                         <span class="box_right">
                            <input type="password" name="password" value="<?=$query->password?>">
                         </span>
                          <?= form_error('password')?>
                     </li>
                     <li>
                         <label>Name:</label>
                         <span class="box_right">
                            <input type="text" name="name" value="<?=$query->name?>">
                         </span>
                         <?= form_error('name')?>
                     </li>
                     <li>
                         <label>Surname:</label>
                         <span class="box_right">
                             <input type="text" name="surname" value="<?=$query->surname?>">
                         </span>
                         <?= form_error('surname')?>
                     </li>
                     <li>
                         <label>Address:</label>
                         <span class="box_right">
                            <textarea name="address" rows="2" cols="40" ><?=$query->address?></textarea>
                         </span>
                          <?= form_error('address')?>
                     </li>
                     <li>
                         <label>Email:</label>
                         <span class="box_right">
                             <input type="text" name="email" placeholder="example@hotmail.com" value="<?=$query->email?>">
                         </span>
                          <?= form_error('email')?>
                     </li>
                     <li>
                         <label>Tel-Phone:</label>
                         <span class="box_right">
                             <input type="text" name="tel" placeholder="99-9999999" value="<?=$query->tel?>">
                         </span>
                         <?= form_error('tel')?>
                     </li>
                     <li>
                         <label>Sex:</label>
                         <span class="box_right">
                            <label>male:</label>
                            <input type="radio" name="sex" value="male" <?php if($query->sex == "male") echo "checked"; ?>>
                            <label>female:</label>
                            <input type="radio" name="sex" value="female" <?php if($query->sex == "female") echo "checked"; ?>>
                         </span>
                     </li>
                     <li>
                         <label>Permission:</label>
                         <span class="box_right">
                            <select name="id_permission">
                            <?php if($query->id_permission == "1"){?>
                            <option value="1" <?= set_select('id_permission','1',true)?>>admin</option>
                            <option value="2" <?= set_select('id_permission','2', false)?>>employee</option>
                            <?php }?>
                            <?php if($query->id_permission == "2"){?>
                            <option value="1" <?= set_select('id_permission','1',false)?>>admin</option>
                            <option value="2" <?= set_select('id_permission','2', true)?>>employee</option>
                            <?php }?>  
                            </select>
                         </span>
                     </li>
                     <li>
                         <label>Upload Image</label>
                         <span class="box_right">
                             <input type="file" id="upload_img" name="upload_img">
                         </span>
                     </li>
                     <li>
                         <button class="submit" type="submit" >แก้ไขข้อมูล</button>
                     </li>
                     
                    <input type="hidden" name="id_code_original" value="<?=$query->emp_number?>">
                    <input type="hidden" name="id_authen" value="<?=$query->id_authen?>">
                    <input type="hidden" name="date" value="<?=$query->date_start?>">
                    <input type="hidden" name="img" value="<?=$query->img_path?>">
                    <input type="hidden" name="id_emp" value="<?=$query->id_emp?>">
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