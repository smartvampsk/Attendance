<?php 
	$msg = '';

	if (isset($_GET['eid'])) {
		$eid = $_GET['eid'];

		$admins = $pdo->query("SELECT * 
			FROM admins
			WHERE admin_id = '$eid' 
		")->fetch();
	}

	if (isset($_POST['update'])) {
		$stmt = $pdo->prepare('UPDATE admins SET
			firstname = :firstname,
			surname = :surname,
			email = :email
			WHERE admin_id = :admin_id
		');
		$data = [
			'admin_id' => $_POST['admin_id'],
			'firstname' => $_POST['firstname'],
			'surname' => $_POST['surname'],
			'email' => $_POST['email']
		];
		$success = $stmt->execute($data);

		if ($success) {
			$msg = "Admin Updated";
		}
		else{
			$msg = "Failed to Update Admin";
		}
	}

	if (isset($_POST['cancel'])) {
		header('location:view_admin');
	}

	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}

	$templateVars = [
		'msg'=>$msg,
		'admins' => $admins
	];
	
	$title = 'Online Attendance - Dashboard - Edit Admin';
	$content = loadTemplate('../views/edit_admin_template.php', $templateVars);
?>