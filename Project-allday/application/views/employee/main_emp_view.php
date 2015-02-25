

<!DOCTYPE html>
<html>
    <head>
        <title>EMPLOYEE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">    

 
        <link href="<?=base_url()?>assets/css/main.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="<?=base_url()?>assets/css/employee/main_emp.css" rel="stylesheet" type="text/css" media="screen" />
        
        <meta name="viewport" content="width=device-width">

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
                <h1>ระบบจัดการพนักงาน</h1>
                <hr>
             </section>
             <?= form_open('employee/main_emp_controller/searchByLike')?>
             <section class="search">
                <ul>
                    <li><input type="search" id="code" name="code" placeholder="Code id.."></li>
                    <li><input type="search" id="name" name="name" placeholder="Name.."></li>
                    <li><input type="search" id="surname" name="surname" placeholder="Surname.."></li>
                    <li><input type="submit" value="submit"></li>
                </ul>
              </section>
             <?= form_close()?>  
            
            <section class="error"><p><?php  if( !empty($error) ){ echo $error;} ?></p></section>
             <section class="tools">
                <ul>
                    <li><a  href="<?=site_url()?>/employee/main_emp_controller/viewInsertEmp/"><img src="<?=base_url()?>/assets/imgs/icon/Add_user.png" alt="เพิ่มข้อมูลพนักงาน" width="30" height="30"></a></li>
                    
                    <!-- ##### ตรวจสอบสิทธิ์ ##### -->
                    <?php if( $session['name_permission'] == "admin" ) { ?>
                    <li><a href="<?=site_url()?>/employee/main_emp_controller/printDetailEmp/"><img src="<?=base_url()?>/assets/imgs/icon/Print.png" alt="printข้อมูล" width="30" height="30"></a></li>
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
                            <th>Code</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Address</th>
                            <th>Detail</th>
                        </tr> 
                     </thead>
                     
                     <tbody>
                         <?php if( empty($query) ) { ?>
                         <tr><td colspan="8">ไม่พบข้อมูล</td></tr>
                         <?php }else{ ?>
                         
                            <!-- ##### count No. ##### -->
                            <?php $no = 1; ?> 
                            <?php foreach($query as $item): ?>
                            
                            <tr>
                               <td><?=$no?></td>
                               <td><a href="<?=site_url()?>/employee/main_emp_controller/viewEditEmp/<?="?id_emp=".$item->id_emp?>"><img src="<?=base_url()?>/assets/imgs/icon/edit.png" width="30" height="30" ></a></td>

                               <!-- ##### ตรวจสอบสิทธิ์ ##### -->
                               <?php if( $session['name_permission'] == "admin" ) { ?>
                               <td><a href="<?=site_url()?>/employee/main_emp_controller/deleteEmp/<?="?id_emp=".$item->id_emp?>"><img src="<?=base_url()?>/assets/imgs/icon/delete_1.png" width="25" height="25"></a></td>
                               <?php } ?>
                               <td><?=$item->emp_number?></td>
                               <td><?=$item->empName?></td>
                               <td><?=$item->surname?></td>
                               <td><?=$item->address?></td>
                               <td><a target="_blank" href="<?=site_url()?>/employee/main_emp_controller/viewDetailEmp/<?="?id_emp=".$item->id_emp?>"><img src="<?=base_url()?>/assets/imgs/icon/more.png" width="20" height="20"></a></td>
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


