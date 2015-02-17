<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">    

        <link href="<?=base_url()?>assets/css/main.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="<?=base_url()?>assets/css/table.css" rel="stylesheet" type="text/css" media="all" />
        <meta name="viewport" content="width=device-width">
    </head>
   <body>
        <header>
            
           

                
            
        </header>
        
        <article>
             <section class="topic">
                <h1>ข้อมูลพนักงานทั้งหมด</h1>
             </section>
 
  
            <section class="error"><p><?php  if( !empty($error) ){ echo $error;} ?></p></section>
             <section class="showInfo">
            
                 <table class="tbl_emp">
                     <thead>
                        <tr>
                            <th>No.</th>
                            <th>Picture</th>
                            <th>Code</th>     
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Phone number</th>
                            <th>Sex</th>
                            <th>Start Work</th>
                            <th>Permission</th>
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
                               <td><img src="<?=base_url()."/assets/imgs/employee/".$item->img_path?>?date=<?=$img_date?>" alt="รูปพนักงาน" width="100" height="100"></td>
                               <td><?=$item->emp_number?></td>
                               <td><?=$item->empName?></td>
                               <td><?=$item->surname?></td>
                               <td><?=$item->address?></td>
                               <td><?=$item->email?></td>
                               <td><?=$item->tel?></td>
                               <td><?=$item->sex?></td>
                               <td><?=$item->date_start?></td>
                               <td><?=$item->perName?></td>               
                            </tr>
                            <?php $no++; ?>
                            <?php endforeach; ?>
                         <?php } ?>
                     </tbody>
                     
                 </table>   
                 <div class="result">
                     <p>รวมพนักงานทั้งหมด <?=$total?> คน</p>
                 </div>
             </section>   
        </article>       
<!--         <footer>
             <section class="copyright">Copyright © 2015  All rights reserved.</section>
        </footer>-->
    </body>
</html>

