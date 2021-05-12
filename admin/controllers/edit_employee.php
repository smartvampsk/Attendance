<?php 
	$msg = '';

	if (isset($_GET['eid'])) {
		$eid = $_GET['eid'];

		$employee = $pdo->query("SELECT * 
			FROM employees
			WHERE employee_id = '$eid' 
		")->fetch();

		$departments = $pdo->prepare("SELECT * FROM departments");
		$departments->execute();
	}

	if (isset($_POST['update'])) {
		$stmt = $pdo->prepare('UPDATE employees SET
			firstname = :firstname,
			surname = :surname,
			address = :address,
			email = :email,
			gender = :gender,
			dob = :dob,
			phone = :phone,
			department = :department,
			date_of_joining = :date_of_joining,
			basic_salary = :basic_salary,
			account_name = :account_name,
			account_number = :account_number,
			bank_name = :bank_name,
			branch = :branch,
			status = :status
			WHERE employee_id = :employee_id
		');
		$data = [
			'employee_id' => $_POST['employee_id'],
			'firstname' => $_POST['firstname'],
			'surname' => $_POST['surname'],
			'address' => $_POST['address'],
			'email' => $_POST['email'],
			'gender' => $_POST['gender'],
			'dob' => $_POST['dob'],
			'phone' => $_POST['phone'],
			'department' => $_POST['department'],
			'date_of_joining' => $_POST['date_of_joining'],
			'basic_salary' => $_POST['basic_salary'],
			'account_name' => $_POST['account_name'],
			'account_number' => $_POST['account_number'],
			'bank_name' => $_POST['bank_name'],
			'branch' => $_POST['branch'],
			'status' => $_POST['status'],
		];
		$success = $stmt->execute($data);

		if ($success) {
			$msg = "Employee Updated";
		}
		else{
			$msg = "Failed to Update Employee";
		}
	}

	if (isset($_POST['cancel'])) {
		header('location:view_employee');
	}

	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}

	$templateVars = [
		'msg'=>$msg,
		'employee' => $employee,
		'departments' => $departments
	];
	
	$title = 'Online Attendance - Dashboard - Edit Employee';
	$content = loadTemplate('../views/edit_employee_template.php', $templateVars);
?>