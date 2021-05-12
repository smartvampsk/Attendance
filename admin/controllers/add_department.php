<?php 
	$msg = '';

	if (isset($_POST['submit'])) {
		$data = [
			'department' => $_POST['department'],
		];
		
		$departmentAdd = new DatabaseWork($pdo, 'departments');
		$success = $departmentAdd->save($data);

		if ($departmentAdd){
			header('location:add_department?msg=Department Added');
		}
		else{
			header('location:add_department?msg=Failed to Add Department');
		}
	}

	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}

	$templateVars = ['msg'=>$msg];
	
	$title = 'Online Attendance - Add Department';
	$content = loadTemplate('../views/add_department_template.php', $templateVars);
?>