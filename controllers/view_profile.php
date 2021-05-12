<?php 
	if (isset($_GET['user_id'])) {
		$profileUser = $pdo->query('SELECT * FROM users WHERE user_id = ' . $_GET['user_id'])->fetch();
	}
	$templateVars = [
		'profileUser'=>$profileUser
	];
	
	$title = 'Online Attendance - View Profile';
	$content = loadTemplate('../views/view_profile_template.php', $templateVars);
?>