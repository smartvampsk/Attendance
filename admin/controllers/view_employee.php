<?php 
	$msg = '';

	$empObj = new DatabaseWork($pdo, 'employees');
	$employees = $empObj->findAll();
	
	if (isset($_GET['did'])) {
		$did = $_GET['did'];
		$delete = $pdo->prepare("DELETE FROM employees WHERE employee_id = '$did'");
		$delete->execute();
		$msg = "Employee Deleted";
	}

	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}

	$templateVars = [
		'employees' => $employees,
		'msg'=> $msg
	];
	
	$title = 'Online Attendance - Dashboard - View Employees';
	$content = loadTemplate('../views/view_employee_template.php', $templateVars);
?>