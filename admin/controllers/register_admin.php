<?php 
	$msg = '';

	if (isset($_POST['register'])) {
		if ($_POST['password'] != $_POST['password_confirmation']) {
			$msg = "Password not Matched. Please try again!";
		}
		else{
			$adminObj = new DatabaseWork($pdo, 'admins');
			$data = [
				'firstname' => $_POST['firstname'],
				'surname' => $_POST['surname'],
				'email' => $_POST['email'],
				'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
			];
		}
		
		$success = $adminObj->save($data);

		if ($adminObj){
			header('location:register_admin?msg=Admin Registered');
		}
		else{
			header('location:register_admin?msg=Failed to Register Admin');
		}
	}

	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}

	$templateVars = ['msg'=>$msg];
	
	$title = 'Online Attendance - Dashboard - Register Admin';
	$content = loadTemplate('../views/register_admin_template.php', $templateVars);
?>