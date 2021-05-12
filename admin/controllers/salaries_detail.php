<?php 
	$msg = '';

	if (isset($_GET['eid'])) {
		$salary_id = $_GET['eid'];
		$salaries = $pdo->query("SELECT * 
			FROM salaries s 
			JOIN employees e
			ON s.emp_id = e.employee_id
			WHERE s.salary_id = '$salary_id'
		")->fetch();
	}

	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}

	$templateVars = [
		'salaries' => $salaries,
		'msg'=> $msg
	];
	
	$title = 'Online Attendance - Dashboard - Salaries';
	$content = loadTemplate('../views/salaries_detail_template.php', $templateVars);
?>