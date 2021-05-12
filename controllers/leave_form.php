<?php 
	$msg = '';

	if(isset($_POST['apply'])){
		$leaveObj = new DatabaseWork($pdo, 'leaves');
		$data = [
			'employee_id' => $_SESSION['logged_emp_id'],
			'applied_date' => date('Y-m-d'),
			'reason' => $_POST['reason'],
			'description' => $_POST['description'],
			'start_date' => $_POST['start_date'],
			'end_date' => $_POST['end_date']
		];

		// print_r($data);
		
		$success = $leaveObj->save($data);
		unset($data);

		if ($leaveObj){
			$msg='Application sent';
		}
		else{
			$msg='Failed to send an Application';
		}
	}

	$templateVars = ['msg' => $msg ];
	
	$title = 'Online Attendance - Leave Application';
	$content = loadTemplate('../views/leave_form_template.php', $templateVars);
?>