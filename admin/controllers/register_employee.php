<?php 
	$departmentData = new DatabaseWork($pdo, 'departments');
	$departments = $departmentData->findAll();
	
	$msg = '';
	if (isset($_POST['register'])) {
		if ($_POST['password'] != $_POST['password_confirmation']) {
			$msg = "Password not Matched. Please try again!";
		}
		else{
			$empObj = new DatabaseWork($pdo, 'employees');
			$data = [
				'firstname' => $_POST['firstname'],
				'surname' => $_POST['surname'],
				'address' => $_POST['address'],
				'email' => $_POST['email'],
				'gender' => $_POST['gender'],
				'dob' => $_POST['dob'],
				'phone' => $_POST['phone'],
				'department' => $_POST['department'],
				'date_of_joining' => Date('Y-m-d'),
				'basic_salary' => $_POST['basic_salary'],
				'account_name' => $_POST['account_name'],
				'account_number' => $_POST['account_number'],
				'bank_name' => $_POST['bank_name'],
				'branch' => $_POST['branch'],
				'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
			];
			// print_r($data);
			$success = $empObj->save($data);
			// $success = false;
			if ($empObj){
				header('location:register_employee?msg=Employee Registered');
			}
			else{
				header('location:register_employee?msg=Failed to Register Employee');
			}
		}

	}

	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}

	$templateVars = [
		'msg'=>$msg,
		'departments'=>$departments,

	];
	$title = 'Online Attendance - Dashboard - Register Employee';
	$content = loadTemplate('../views/register_employee_template.php', $templateVars);
?>