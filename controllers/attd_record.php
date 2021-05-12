<?php 
	$msg = '';

	$attd = $pdo->prepare("SELECT * 
		FROM attendances 
		WHERE employee_id = :employee_id
		AND check_date >= (CURDATE() - INTERVAL 1 MONTH)
		ORDER BY check_date DESC");

	// $attd = $pdo->prepare("SELECT
	// 	AAA.check_date, IFNULL(BBB.val,0) val
	// 	FROM (
	// 		SELECT check_date
	// 		FROM (
	// 			SELECT MAKEDATE(YEAR(NOW()),1) +
	// 			INTERVAL (MONTH(NOW())-1) MONTH +
	// 			INTERVAL daynum DAY check_date
	// 			FROM (
	// 				SELECT t*10+u daynum 
	// 				FROM
	// 					(SELECT 0 t UNION SELECT 1 UNION SELECT 2 UNION SELECT 3) A,
	// 					(SELECT 0 u UNION SELECT 1 UNION SELECT 2 UNION SELECT 3
	// 					UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7
	// 					UNION SELECT 8 UNION SELECT 9) B 
	// 					ORDER BY daynum
	// 			) AA
	// 		) AA WHERE MONTH(check_date) = MONTH(NOW())
	// 	) AAA LEFT JOIN (SELECT * FROM attendances) BBB
	// 	USING (check_date);");
	
	// $attd = $pdo->prepare(" 
	// 	SELECT
	// 	    AAA.date_field,
	// 	    IFNULL(BBB.val,0) val
	// 	FROM (
	// 	    SELECT date_field
	// 	    FROM (
	// 	        SELECT MAKEDATE(YEAR(NOW()),1) +
	// 	        INTERVAL (MONTH(NOW())-1) MONTH +
	// 	        INTERVAL daynum DAY date_field
	// 	        FROM (
	// 	            SELECT t*10+u daynum FROM
	// 	            (SELECT 0 t UNION SELECT 1 UNION SELECT 2 UNION SELECT 3) A,
	// 	            (SELECT 0 u UNION SELECT 1 UNION SELECT 2 UNION SELECT 3
	// 	            UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7
	// 	            UNION SELECT 8 UNION SELECT 9) B ORDER BY daynum
	// 	        ) AA
	// 	    ) AA WHERE MONTH(date_field) = MONTH(NOW())
	// 	) AAA LEFT JOIN (SELECT employee_id, check_date, check_in, check_out FROM attendances) BBB
	// 	USING (date_field);
	// ");

	$emp_id = $_SESSION['logged_emp_id'];
	$attd = $pdo->prepare("SELECT * 
		FROM attendances a 
		JOIN employees e
		ON a.employee_id = e.employee_id
		WHERE a.employee_id = '$emp_id'
		AND check_date >= (CURDATE() - INTERVAL 1 MONTH)
		ORDER BY check_date DESC");
	$attd->execute();

	$data = [
		'employee_id' => $_SESSION['logged_emp_id']
	];
	$attd->execute($data);

	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}

	$templateVars = [
		'attd' => $attd,
		'msg'=> $msg
	];
	
	$title = 'Online Attendance - Attendance Record';
	$content = loadTemplate('../views/attd_record_template.php', $templateVars);
?>