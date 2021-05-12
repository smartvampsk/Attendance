<?php 
	$msg = '';

	if (isset($_GET['eid'])) {
		$eid = $_GET['eid'];

		$emp = $pdo->query("SELECT * 
			FROM salaries s
			JOIN employees e 
			ON e.employee_id = s.emp_id
			WHERE s.salary_id = '$eid' 
		")->fetch();
	}

	if (isset($_POST['update'])) {
		$stmt = $pdo->prepare('UPDATE salaries SET
			deduction = :deduction,
			incentive = :incentive,
			total_salary = :total_salary
			WHERE salary_id = :salary_id
		');
		$data = [
			'deduction' => $_POST['deduction'],
			'incentive' => $_POST['incentive'],
			'total_salary' => $_POST['grand_total'],
			'salary_id' => $_POST['salary_id'],
		];
		$success = $stmt->execute($data);

		if ($success) {
			$msg = "Salary Updated";
		}
		else{
			$msg = "Failed to Update Salary";
		}
	}

	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}

	$templateVars = [
		'msg'=>$msg,
		'emp' => $emp,
	];
	
	$title = 'Online Attendance - Dashboard - Edit Salary';
	$content = loadTemplate('../views/edit_salary_template.php', $templateVars);
?>