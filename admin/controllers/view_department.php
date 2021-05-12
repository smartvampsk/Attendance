<?php 
	$msg = '';

	$departmentsData = new DatabaseWork($pdo, 'departments');
	$departments = $departmentsData->findAll();
	
	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}

	if (isset($_GET['did'])) {
		$did = $_GET['did'];
		$delete = $pdo->prepare("DELETE FROM departments WHERE department_id = '$did'");
		$delete->execute();
		// header('Refresh:5; url=view_department');
		$msg = "Department Updated";
	}

	$templateVars = [
		'departments' => $departments,
		'msg'=> $msg
	];
	
	$title = 'Online Attendance - View Department';
	$content = loadTemplate('../views/view_department_template.php', $templateVars);
?>