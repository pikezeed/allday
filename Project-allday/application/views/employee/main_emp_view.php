<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>EMPLOYEE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">    
        <link href="<?=base_url()?>assets/css/style_table.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="<?=base_url()?>assets/css/search.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="<?=base_url()?>assets/css/style_bar.css" rel="stylesheet" type="text/css" media="screen" />
        <meta name="viewport" content="width=device-width">

    </head>
	<?php 
			$session = $this->session->userdata('logged_in'); 
	?>
    <body>
        <nav id="nav-1">
            <a class="link-1" href="main_emp_controller">ระบบจัดการพนักงาน</a></a>
            <a class="link-1" href="#">ระบบจัดการสินค้า</a>
            <a class="link-1" href="#">ระบบจัดการขายสินค้า</a>
            <a class="link-1" href="<?=site_url()?>/home_controller/logout">Logout</a>
        </nav>
        <div class="table-title">
		<h3>EMPLOYEE</h3>
	</div>
        
        <div class="table-title"><center>
        <?php  if( !empty($error) ){ echo $error;} ?>
        <?= form_open('employee/main_emp_controller/searchByLike')?>
        </center></div>
        <div id='container'> 
        <div class='cell'><input type="search" id="code" name="code" placeholder="Code id.."/></div>
        <div class='cell'><input type="search" id="name" name="name" placeholder="Name.."/></div>
        <div class='cell'><input type="search" id="surname" name="surname" placeholder="Surname.."/></div>
        <div class='cell'><input type="submit" value="submit"/></div>
        </div>
        <?= form_close()?>       
        
        
       	<div class="table-title" ><a href="<?=site_url()?>/employee/main_emp_controller/viewInsertEmp/"><img src="<?=base_url()?>/assets/imgs/icon/Add_user.png" width="30" height="30"></a></div>
        <?php if( $session['name_permission'] == "admin" ) { ?>
        <div class="table-title" ><a href="<?=site_url()?>/employee/main_emp_controller/printDetailEmp/">Print</a></div>
        <?php } ?>
        
        <table class="table-fill">
             <thead>
				<tr>
				<th class="text-left">No.</th> 
				<th class="text-left">edit</th>
                                <?php if( $session['name_permission'] == "admin" ) { ?>
                <th class="text-left">delete</th>		
                <?php } ?>
				<th class="text-left">code</th>
				<th class="text-left">name</th>
                <th class="text-left">surname</th>
                 <th class="text-left">address</th>
				<th class="text-left">detail</th>				
				</tr>
			</thead>   
            <?php if( !empty($query) ) { ?>
			<?php $no = 0; ?>
            <?php foreach($query as $item): ?>
			<?php $no++; ?>

			<tbody class="table-hover">
			<tr>
				<td class="text-left"><?=$no?></td>
				<td class="text-left"><a href="<?=site_url()?>/employee/main_emp_controller/viewEditEmp/<?="?id_emp=".$item->id_emp?>"><center><img src="<?=base_url()?>/assets/imgs/icon/edit.png" width="30" height="30" ></center></a></td>
                <?php if( $session['name_permission'] == "admin" ) { ?>
                                <td class="text-left"><a href="<?=site_url()?>/employee/main_emp_controller/deleteEmp/<?="?id_emp=".$item->id_emp?>"><center><img src="<?=base_url()?>/assets/imgs/icon/delete_1.png" width="25" height="25"><center></a></td>
		<?php } ?>
                                                <td class="text-left"><?=$item->emp_number?></td>
                <td class="text-left"><?=$item->empName?></td>
                <td class="text-left"><?=$item->surname?></td>
                 <td class="text-left"><?=$item->address?></td>
				<td class="text-left"><a target="_blank" href="<?=site_url()?>/employee/main_emp_controller/viewDetailEmp/<?="?id_emp=".$item->id_emp?>"><center><img src="<?=base_url()?>/assets/imgs/icon/more.png" width="20" height="20"></center></td>
				
			</tr>
            </tbody>
            <?php endforeach; ?>

			<?php }else{ ?>
			<?php 
				
				 echo "ไม่พบข้อมูล";
				} 
			?>
			
        </table> 
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    
    </body>
</html>


