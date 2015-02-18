

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">


<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <link href="<?=base_url()?>assets/css/main.css" rel="stylesheet" type="text/css" media="screen" />

                <link href="<?=base_url()?>assets/css/store/edit_store.css" rel="stylesheet" type="text/css" media="screen" />

	
<title>Sell</title>

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
                <h1>แก้ไขข้อมูล store</h1>
                <hr>
             </section>
             

             <section class="showInfo">
                 <?php echo form_open_multipart('store/main_store_controller/editStore');?>
                 <ul>
                     <li>
                         <label>Amount:</label>
                         <span class="box_right">
                             <input type="text" name="amount" placeholder="P0001" value="<?=$query_store->total_p; ?>">
                         </span>
                     </li>
                     
                     <li>
                         <input type="hidden" name="id_product" value="<?= $_GET['id_product']?>"/>
                         <input type="hidden" name="id_store" value="<?=$_GET['id_store']?>"/>   
                         <button class="submit" type="submit" >แก้ไขข้อมูล</button>
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