<?php 
	$msg = '';
	$emp = '';
	$dommyRecord = '';
	$leaves = '';

	// $startDate = date('Y-m-01', strtotime('-1 MONTH'));
	// $endDate = date('Y-m-31', strtotime('-1 MONTH'));
	$startDate = date('Y-m-01');
	$endDate = date('Y-m-31');

	if (isset($_POST['next'])) {
		$emp_id = $_POST['employee_id'];
		$emp = $pdo->query("SELECT * FROM employees WHERE employee_id = '$emp_id'")->fetch();

		$dommyRecord = $pdo->query("SELECT count(a.employee_id) as countPresent
			FROM attendances a 
			JOIN employees e
			ON a.employee_id = e.employee_id
			WHERE a.employee_id = '$emp_id'
			AND check_date BETWEEN '$startDate' AND '$endDate'
			ORDER BY check_date DESC")->fetch();
		
		$leaves = $pdo->query("SELECT count(employee_id) as countLeave 
			FROM leaves 
			WHERE employee_id = '$emp_id'
			AND status = 'Accepted'
			AND start_date BETWEEN '$startDate' AND '$endDate'"
		)->fetch();
	}

	if (isset($_POST['generate'])) {
		$data = [
			'emp_id' => $_POST['employee_id'],
			'present_days' => $_POST['present_days'],
			'holidays' => $_POST['holidays'],
			'deduction' => $_POST['deduction'],
			'salary' => $_POST['salary'],
			'incentive' => $_POST['incentive'],
			'total_salary' => $_POST['grand_total'],
			'salary_of' => $endDate,
		];
		$salaryAdd = new DatabaseWork($pdo, 'salaries');
		$success = $salaryAdd->save($data);

		if ($salaryAdd){
			header('location:salary_add?msg=Generated Salary Slip');
		}
		else{
			header('location:salary_add?msg=Failed to generate salary slip');
		}
	}

	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}

	$templateVars = [
		'msg'=>$msg,
		'emp'=>$emp,
		'dommyRecord' => $dommyRecord,
		'leaves' => $leaves,
		'endDate' => $endDate,
	];
	$title = 'Online Attendance - Add Salary';
	$content = loadTemplate('../views/salary_add_template.php', $templateVars);
?>