<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
<title>Detail</title>
 <meta charset="UTF-8">
             <link href="<?=base_url()?>assets/css/main.css" rel="stylesheet" type="text/css" media="screen" />
                <link href="<?=base_url()?>assets/css/table.css" rel="stylesheet" type="text/css" media="screen" />
                <link href="<?=base_url()?>assets/css/insert_emp.css" rel="stylesheet" type="text/css" media="screen" />
    </head>



    <body>
       <header>
            
           
                <div class="container_navigation">
                  <nav>
                    <a class="link_menuTop" href="<?=site_url()?>/employee/main_emp_controller">ระบบจัดการพนักงาน</a> |
                    <a class="link_menuTop" href="<?=site_url()?>/product/main_product_controller">ระบบจัดการสินค้า</a> |
                    <a class="link_menuTop" href="<?=site_url()?>/sell/main_sell_controller">ระบบจัดการขายสิ้นค้า</a> |
                    <a class="link_menuTop" href="<?=site_url()?>/home_controller/logout">Logout</a>
                  </nav>
                </div>     
                
            
        </header>
         <article>
             <section class="topic">
                <h1>รายละเอียดพนักงานรายบุคคล</h1>
                <hr>
             </section>
             

             <section class="showInfo">
                 
                 <ul>
                     <li>
                         <label>Picture</label>
                         <span class="box_right">
                             <img src="<?=base_url()."/assets/imgs/employee/".$query->img_path?>?date=<?=$img_date?>" alt="รูปพนักงาน"  height="100" width="100" >
                         </span>
                     </li>
                     <li>
                         <label>Code:</label>
                         <span class="box_right">
                             <?=$query->emp_number?>
                         </span>
                     </li>
                     <li>
                         <label>Username:</label>
                         <span class="box_right">
                             <?=$query->username?>
                         </span>
                     </li>
                     <li>
                         <label>Password:</label>
                         <span class="box_right">
                            <?=$query->password?>
                         </span>
                     </li>
                     <li>
                         <label>Name:</label>
                         <span class="box_right">
                            <?=$query->name?>
                         </span>
                     </li>
                     <li>
                         <label>Surname:</label>
                         <span class="box_right">
                            <?=$query->surname?>
                         </span>
                     </li>
                     <li>
                         <label>Address:</label>
                         <span class="box_right">
                            <?=$query->address?>
                         </span>
                     </li>
                     <li>
                         <label>Email:</label>
                         <span class="box_right">
                             <?=$query->email?>
                         </span>
                     </li>
                     <li>
                         <label>Tel-Phone:</label>
                         <span class="box_right">
                             <?=$query->tel?>
                         </span>
                     </li>
                     <li>
                         <label>Sex:</label>
                         <span class="box_right">
                            <?=$query->sex?>
                         </span>
                     </li>
                     <li>
                         <label>Permission:</label>
                         <span class="box_right">
                             <?php if($query->id_permission == "1"){?>
                             admin
                             <?php }?>
                             <?php if($query->id_permission == "2"){?>
                             employee
                             <?php }?>
                         </span>
                     </li>


                     
                     
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