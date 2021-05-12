<?php 
	$msg = '';
	$emp_id = $_SESSION['logged_emp_id'];
	$leaves = $pdo->prepare("SELECT * FROM leaves WHERE employee_id = '$emp_id' ORDER BY applied_date DESC");
	$leaves->execute();
	
	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}

	$templateVars = [
		'leaves' => $leaves,
		'msg'=> $msg
	];
	
	$title = 'Online Attendance - Leave Requests';
	$content = loadTemplate('../views/leave_request_template.php', $templateVars);
?>