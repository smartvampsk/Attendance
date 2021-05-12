<?php 
	$msg = '';
	$attd = '';

	if (isset($_POST['view_ind'])) {
		$emp_id = $_POST['employee_id'];
		$attd = $pdo->prepare("SELECT * 
			FROM attendances a 
			JOIN employees e
			ON a.employee_id = e.employee_id
			WHERE a.employee_id = '$emp_id'
			AND check_date >= (CURDATE() - INTERVAL 1 MONTH)
			ORDER BY check_date DESC");
		$attd->execute();
	}

	if (isset($_GET['did'])) {
		$did = $_GET['did'];

		$insert = $pdo->prepare("
			INSERT INTO archives (employee_id, check_date, check_in, check_out )(
			SELECT employee_id, check_date, check_in, check_out
			FROM attendances
			WHERE attend_id = '$did' )
		");
		$insert->execute();

		$deleteObj = new DatabaseWork($pdo, 'attendances');
		$success = $deleteObj->delete('attend_id', $did);

		if ($success) {
			$msg = 'Deleted';
		}
		else{
			$msg = 'Failed to Delete';
		}
	}

	$templateVars = [
		'attd' => $attd,
		'msg'=> $msg
	];
	
	$title = 'Online Attendance - Dashboard - Employee Attendance';
	$content = loadTemplate('../views/ind_attend_template.php', $templateVars);
?>