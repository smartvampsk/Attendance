<?php 
	
	$empCount = $pdo->query("SELECT count(employee_id) as empCount FROM employees")->fetch();
	$emp1Count = $pdo->query("SELECT count(employee_id) as emp1Count FROM employees WHERE status = '1'")->fetch();
	$depCount = $pdo->query("SELECT count(department_id) as depCount FROM departments")->fetch();

	$presentCount = $pdo->query("SELECT count(employee_id) as presentCount FROM attendances WHERE check_date = CURDATE()")->fetch();

	$templateVars = [
		'empCount' => $empCount,
		'emp1Count' => $emp1Count,
		'depCount' => $depCount,
		'presentCount' => $presentCount,
	];
	
	$title = 'Online Attendance - Dashboard';
	$content = loadTemplate('../views/home_template.php', $templateVars);
?>


