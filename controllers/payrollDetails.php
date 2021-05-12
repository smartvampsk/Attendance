<?php 
    if(!isset($_SESSION['logged_emp_id'])){
        header('location:login');   
    }
    $msg = '';
    

	if (isset($_SESSION['logged_emp_id'])) {
		$salary_id = $_SESSION['logged_emp_id'];
		$salaries = $pdo->query("SELECT * 
			FROM salaries s 
			JOIN employees e
			ON s.emp_id = e.employee_id
			WHERE s.emp_id = '$salary_id'
		")->fetch();
	}

	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}

	$templateVars = [
		'salaries' => $salaries,
		'msg'=> $msg
	];
	
	$title = 'Online Attendance - Dashboard - Salaries';
	$content = loadTemplate('../views/payrollDetailsView.php', $templateVars);
?>