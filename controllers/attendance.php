<?php 
	$msg = '';
	$message = '';
	$disabled = '';
	$disableCO = '';
	$check_in_time = '';
	$check_out_time = '';
	$date = new DATETIME('now', new DATETIMEZONE('Asia/Kathmandu'));

	// check if user has already checked in
	$check = $pdo->prepare("SELECT * 
		FROM attendances 
		WHERE employee_id = :employee_id
		AND check_date = :check_date");
	$data = [
		'employee_id' => $_SESSION['logged_emp_id'],
		'check_date' => $date->format('Y-m-d')
	];
	$check->execute($data);
	if ($check->rowCount()>0) {
		//

		foreach ($check as $key) {
			if ($key['check_in'] != NULL) {
				$check_in_time = $key['check_in'];
				$disabled = 'disabled';
			}

			if ($key['check_out'] != NULL) {
				$check_out_time = $key['check_out'];
				$disableCO = 'disabled';
				$message = 'You have already Checked In and Checked Out for today.';
			}
		}
	}


	// check in 
	if(isset($_POST['check_in'])){
		$checkOut = $pdo->prepare("UPDATE attendances
			SET check_in = :check_in,
			    employeeStatus = :employeeStatus,
				attendanceStatus = :attendanceStatus
			WHERE employee_id = :employee_id
			AND check_date = :check_date
			");

		$data = [
			'check_in' => $date->format('Y-m-d H:i:sA'),
			'employee_id' => $_SESSION['logged_emp_id'],
			'check_date' => $date->format('Y-m-d'),
			'employeeStatus' => 'inactive',
			'attendanceStatus' => 'present'

		];
		$success = $checkOut->execute($data);
		unset($data);

		if ($success){
			$msg='Checked IN';
		}
		else{
			$msg='Failed to Check In';
		}
	}

	// check out
	if (isset($_POST['check_out'])) {
		$checkOut = $pdo->prepare("UPDATE attendances
			SET check_out = :check_out,
			    employeeStatus = :employeeStatus
			WHERE employee_id = :employee_id
			AND check_date = :check_date
			");

		$data = [
			'check_out' => $date->format('Y-m-d H:i:sA'),
			'employee_id' => $_SESSION['logged_emp_id'],
			'check_date' => $date->format('Y-m-d'),
			'employeeStatus' => 'inactive'

		];
		$success = $checkOut->execute($data);
		unset($data);

		if ($success){
			$msg='Checked Out';
		}
		else{
			$msg='Failed to Check Out';
		}
	}


	// variables to pass
	$templateVars = [
		'msg' => $msg,
		'disabled' => $disabled,
		'disableCO' => $disableCO, 
		'message' => $message,
		'check_in_time' => $check_in_time,
		'check_out_time' => $check_out_time
	];
	$title = 'Online Attendance - Attendance';
	$content = loadTemplate('../views/attendance_template.php', $templateVars);
?>