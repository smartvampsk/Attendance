<?php 
	$msg = '';

	$attd = $pdo->prepare("SELECT * 
		FROM archives a 
		JOIN employees e
		ON a.employee_id = e.employee_id
		ORDER BY e.firstname DESC");
	$attd->execute();

	$templateVars = [
		'attd' => $attd,
		'msg'=> $msg
	];
	
	$title = 'Online Attendance - Dashboard - Archive';
	$content = loadTemplate('../views/archive_template.php', $templateVars);
?>