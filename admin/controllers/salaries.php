<?php 
	$msg = '';

	$salaries = $pdo->prepare("SELECT * 
		FROM salaries s 
		JOIN employees e
		ON s.emp_id = e.employee_id");
	$salaries->execute();
	
	if (isset($_GET['did'])) {
		$did = $_GET['did'];
		$delete = $pdo->prepare("DELETE FROM salaries WHERE salary_id = '$did'");
		$delete->execute();
		$msg = "Salary Deleted";
	}

	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}

	$templateVars = [
		'salaries' => $salaries,
		'msg'=> $msg
	];
	
	$title = 'Online Attendance - Dashboard - Salaries';
	$content = loadTemplate('../views/salaries_template.php', $templateVars);
?>