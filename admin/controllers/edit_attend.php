<?php 
	$msg = '';

	if (isset($_GET['eid'])) {
		$eid = $_GET['eid'];

		$attd = $pdo->query("SELECT * 
			FROM attendances a 
			JOIN employees e
			ON a.employee_id = e.employee_id
			WHERE a.attend_id = '$eid'
		")->fetch();
	}

	if (isset($_POST['update'])) {
		$stmt = $pdo->prepare('UPDATE attendances SET
			check_date = :check_date,
			check_in = :check_in,
			check_out = :check_out
			WHERE attend_id = :attend_id
		');
		$data = [
			'attend_id' => $_POST['attend_id'],
			'check_date' => $_POST['check_date'],
			'check_in' => $_POST['check_in'],
			'check_out' => $_POST['check_out']
		];
		$success = $stmt->execute($data);
		if ($success) {
			$msg = "Attendance Updated";
		}
		else{
			$msg = "Failed to Update Attendance";
		}
	}

	if (isset($_POST['cancel'])) {
		header('location:emp_attend');
	}

	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}

	$templateVars = [
		'msg'=>$msg,
		'attd' => $attd
	];
	
	$title = 'Online Attendance - Dashboard - Edit Attendance';
	$content = loadTemplate('../views/edit_attend_template.php', $templateVars);
?>