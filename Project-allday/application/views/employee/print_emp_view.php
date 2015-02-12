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
        <link href="<?=base_url()?>assets/css/style_table.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="<?=base_url()?>assets/css/search.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="<?=base_url()?>assets/css/style_bar.css" rel="stylesheet" type="text/css" media="screen" />
        <meta name="viewport" content="width=device-width">
    </head>
    
    <?php 
          $session = $this->session->userdata('logged_in'); 
    ?>
    
    
    <body>
		<h1>ข้อมูลพนักงานงานทั้งหมด</h1>

	

                        
                        
                        
                        
                        
                        
                        
                        
                        
             <table class="table-fill">
             <thead>
				<tr>
				<th class="text-left">Picture</th>
				<th class="text-left">code</th>
				<th class="text-left">name</th>
                <th class="text-left">surname</th>
                 <th class="text-left">address</th>
                 <th class="text-left">email</th>
                 <th class="text-left">tel-number</th>
                 <th class="text-left">sex</th>
                 <th class="text-left">start date</th>
                 <th class="text-left">permission</th>
						
			
				</tr>
			</thead>   
            <?php if( !empty($query) ) { ?>
			<?php $no = 0; ?>
            <?php foreach($query as $item): ?>
			<?php $no++; ?>

			<tbody class="table-hover">
			<tr>
				<td class="text-left"><img src="<?=base_url()."/assets/imgs/employee/".$item->img_path?>?date=<?=$img_date?>" alt="รูปพนักง าน" width="100" height="100"></td>
			
                  <td class="text-left"><?=$item->emp_number?></td>
                <td class="text-left"><?=$item->empName?></td>
                <td class="text-left"><?=$item->surname?></td>
                 <td class="text-left"><?=$item->address?></td>
                 <td class="text-left"><?=$item->email?></td>
                 <td class="text-left"><?=$item->tel?></td>
                 <td class="text-left"><?=$item->sex?></td>
                 <td class="text-left"><?=$item->date_start?></td>
                  <td class="text-left"><?=$item->perName?></td>
		
				
			</tr>
            </tbody>
            <?php endforeach; ?>

			<?php }else{ ?>
			<?php 
				
				 echo "ไม่พบข้อมูล";
				} 
			?>
			
        </table> 
                <br>
                		<?= form_open('employee/main_emp_controller')?>

    <center><input type="submit" value="กลับสู่หน้าแรก"/></center>
		<?= form_close()?>
    </body>
</html>

