<?php 
	$msg = '';

	$adminObj = new DatabaseWork($pdo, 'admins');
	$admins = $adminObj->findAll();
	
	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}

	$templateVars = [
		'admins' => $admins,
		'msg'=> $msg
	];
	
	$title = 'Online Attendance - Dashboard - View Admins';
	$content = loadTemplate('../views/view_admin_template.php', $templateVars);
?>