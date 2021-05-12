<?php 
	$msg = '';

	if (isset($_POST['id'])) {
		$aId = $_POST['id'];

		$attd = $pdo->prepare("SELECT * 
			FROM attendances a 
			JOIN employees e
			ON a.employee_id = e.employee_id
			WHERE a.attend_id = '$aId'");
		$attd->execute();

		while ($row = $attd->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $row;
		}

		echo json_encode($data);

		if (isset($_GET['msg'])) {
			$msg = $_GET['msg'];
		}

		$templateVars = [
			'attd' => $attd,
			'msg'=> $msg
		];
	}
	
	$title = 'Online Attendance - Dashboard - Employee Attendance';
	$content = loadTemplate('../views/emp_attend_template.php', $templateVars);
?>