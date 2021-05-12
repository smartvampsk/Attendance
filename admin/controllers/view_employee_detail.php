<?php 
	$msg = '';
	$eid = $_GET['eid'];

	$employees = $pdo->prepare("SELECT * 
		FROM employees e 
		JOIN departments d
		ON e.department = d.department_id
		WHERE employee_id = '$eid'
		");
	$employees->execute();

	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}

	$templateVars = [
		'employees' => $employees,
		'msg'=> $msg
	];
	
	$title = 'Online Attendance - Dashboard - View Employees Detail';
	$content = loadTemplate('../views/view_employee_detail_template.php', $templateVars);
?>