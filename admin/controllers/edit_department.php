<?php 
	$msg = '';

	if (isset($_GET['eid'])) {
		$eid = $_GET['eid'];

		$employee = $pdo->query("SELECT * 
			FROM departments
			WHERE department_id = '$eid' 
		")->fetch();
	}

	if (isset($_POST['update'])) {
		$stmt = $pdo->prepare('UPDATE departments SET
			department = :department
			WHERE department_id = :department_id
		');
		$data = [
			'department_id' => $_POST['department_id'],
			'department' => $_POST['department']
		];
		$success = $stmt->execute($data);

		if ($success) {
			$msg = "Department Updated";
		}
		else{
			$msg = "Failed to Update Department";
		}
	}

	if (isset($_POST['cancel'])) {
		header('location:view_department');
	}

	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}

	$templateVars = [
		'msg'=>$msg,
		'employee' => $employee
	];
	
	$title = 'Online Attendance - Dashboard - Edit Employee';
	$content = loadTemplate('../views/edit_department_template.php', $templateVars);
?>