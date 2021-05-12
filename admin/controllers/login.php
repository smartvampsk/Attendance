<?php
	$msg = '';
	if(isset($_POST['login'])){
		$loginAdmin = $pdo->prepare("SELECT * FROM admins WHERE email =:email");
		$criteria = ['email'=> $_POST['email']];
		$wrong = false;
		$loginAdmin -> execute($criteria);
		if($loginAdmin->rowCount()>0){
			$admin = $loginAdmin->fetch();
			if(password_verify($_POST['password'], $admin['password'])){
				$_SESSION['logged_admin_id'] = $admin['admin_id'];
				$_SESSION['logged_admin_email'] = $admin['email'];
				$_SESSION['logged_admin_type'] = $admin['is_super'];
			}
			else {
				$wrong = true;
			}
		}
		else{
			$wrong = true;
		}
		if($wrong == true){
			// echo '<script type="text/javascript"> alert("Wrong username or password"); </script>';
			$msg = 'Wrong Username and password. Please try again!';
		}
	}

	$templateVars = ['msg' => $msg ];
	
	$title = 'Online Attendance - Login';
	$content = loadTemplate('../views/login_template.php', $templateVars);
?>