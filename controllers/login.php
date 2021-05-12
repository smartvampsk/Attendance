<?php
	$msg = '';
	if(isset($_POST['login'])){
		$loginEmp = $pdo->prepare("SELECT * FROM employees WHERE email =:email");
		$criteria = ['email'=> $_POST['email']];
		$wrong = false;
		$loginEmp -> execute($criteria);
		if($loginEmp->rowCount()>0){
			$emp = $loginEmp->fetch();
			if(password_verify($_POST['password'], $emp['password'])){
				$_SESSION['logged_emp_id'] = $emp['employee_id'];
				$_SESSION['logged_emp_email'] = $emp['email'];
			}
			else {
				$wrong = true;
			}
		}
		else{
			$wrong = true;
		}
		if($wrong == true){
			$msg = 'Wrong Username and password. Please try again!';
		}
	}

	$templateVars = ['msg' => $msg ];
	
	$title = 'Online Attendance - Login';
	$content = loadTemplate('../views/login_template.php', $templateVars);
?>