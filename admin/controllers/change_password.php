<?php 
	$msg = '';

	if (isset($_POST['change'])) {
		if ($_SESSION['logged_admin_email'] == $_POST['email']) {
			if ($_POST['password'] != $_POST['password_confirmation']) {
				$msg = "Password not Matched. Please try again!";
			}
			else{
				$admin = $pdo->prepare("UPDATE admins
					SET password = :password
					WHERE admin_id = :admin_id
				");
				$data = [
					'admin_id' => $_SESSION['logged_admin_id'],
					'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
				];
			
				$success = $admin->execute($data);

				if ($success){
					$msg = 'Password Changed';
				}
				else{
					$msg = 'Failed to change Password';
				}
			}
		}
		else{
			$msg = "Sorry! Your email doesn't match";
		}
	}

	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}

	$templateVars = ['msg'=>$msg];
	
	$title = 'Online Attendance - Dashboard - Change Password';
	$content = loadTemplate('../views/change_password_template.php', $templateVars);
?>