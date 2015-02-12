<html>
	<body>
		<?php foreach($query as $item): ?>

		<?="Emp id = ".$item->id_emp?><br>
		<?="Emp number = ".$item->emp_number?><br>
		<?="Employee name = ".$item->empName?> <br>
		<?="Employee surnname = ".$item->surname?> <br>
		<?="Employee email = ".$item->email?> <br>
		<?="Employee telphone = ".$item->telphone?> <br>
		<?="Employee sex = ".$item->sex?> <br>
		<?="Employee date = ".$item->date_start?> <br>
		<?="Employee name = ".$item->img_path?> <br>

		<?="Permission id = ".$item->id_permission?><br>
		<?="Permission name = ".$item->perName?> <br>
		<?="----------"?>
		<?="<br>"?>

		<?php endforeach; ?>
	</body>
</html>
