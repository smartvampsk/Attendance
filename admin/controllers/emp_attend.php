<?php 
	$msg = '';

	if (isset($_POST['view'])) 
	{
		if (!empty($_POST['search_date'])) {
			$search_date = $_POST['search_date'];


			$timestamp = strtotime($_POST['search_date']);
			$day = date('D', $timestamp);
			
		   
	
			$holidayData = $pdo->query("SELECT * FROM holidayData");
			while ($holData = $holidayData->fetch()) 
			{
				$holidayDate = $holData['holidayDate'];

				if($holidayDate == $_POST['search_date']){
					$msg = "It's Holiday Pal";
				}
				elseif($day == 'Sat'){
					$msg =  "It's Saturday";
					break;
			   }
			}
		   
			$attd = $pdo->prepare("SELECT * 
				FROM attendances a 
				JOIN employees e
				ON a.employee_id = e.employee_id
				WHERE check_date = '$search_date'
				ORDER BY e.firstname DESC");
			$attd->execute();
			
		}

		else if (!empty($_POST['view_by'])) {
			if ($_POST['view_by'] == 'month') {
				$attd = $pdo->prepare("SELECT * 
					FROM attendances a 
					JOIN employees e
					ON a.employee_id = e.employee_id
					WHERE check_date BETWEEN (CURDATE() - INTERVAL 1 MONTH) AND CURDATE()
					ORDER BY check_date DESC");
				$attd->execute();
			}

			elseif ($_POST['view_by'] == 'week') {
				$attd = $pdo->prepare("SELECT * 
					FROM attendances a 
					JOIN employees e
					ON a.employee_id = e.employee_id
					WHERE check_date BETWEEN (CURDATE() - INTERVAL 1 WEEK) AND CURDATE()
					ORDER BY check_date DESC");
				$attd->execute();
			}
			else{
				$attd = $pdo->prepare("SELECT * 
					FROM attendances a 
					JOIN employees e
					ON a.employee_id = e.employee_id
					WHERE check_date = CURDATE()
					ORDER BY e.firstname DESC");
				$attd->execute();
			}
		}
	}
	else{
		$attd = $pdo->prepare("SELECT * 
			FROM attendances a 
			JOIN employees e
			ON a.employee_id = e.employee_id
			WHERE check_date = CURDATE()
			ORDER BY e.firstname DESC");
		$attd->execute();
	}

	if (isset($_GET['did'])) {
		$did = $_GET['did'];

		$insert = $pdo->prepare("
			INSERT INTO archives (employee_id, check_date, check_in, check_out )(
			SELECT employee_id, check_date, check_in, check_out
			FROM attendances
			WHERE attend_id = '$did' )
		");
		$insert->execute();

		$deleteObj = new DatabaseWork($pdo, 'attendances');
		$success = $deleteObj->delete('attend_id', $did);

		if ($success) {
			$msg = 'Deleted';
		}
		else{
			$msg = 'Failed to Delete';
		}
	}

	$absents = $pdo->prepare("
			SELECT employee_id FROM employees
			WHERE status = '1'
			EXCEPT
			SELECT employee_id FROM attendances
			WHERE check_date = CURDATE()
			");
	$absents->execute();

	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}


	if(isset($_POST['generate'])){
		$departmentDetails = new DatabaseWork($pdo,'employees');
		$departmentDataReceived = $departmentDetails->find('status',1);

		foreach($departmentDataReceived as $empData) 
		{
			date_default_timezone_set('Asia/Kathmandu');
		    $check_date = date("Y-m-d");
			$employeeId =  $empData['employee_id'];

			$attendanceDetails = $pdo->prepare("SELECT * FROM attendances WHERE check_date=? AND employee_id=? ");
			$attendanceDetails->execute([$check_date,$employeeId]); 

			if($attendanceDetails->rowCount() == 0)
			{
				$employeeStatus = 'inactive';
				$attendanceStatus = 'absent';

				$leaveInfo = $pdo->prepare("INSERT INTO attendances(employee_id, check_date, employeeStatus, attendanceStatus) 
				VALUES(:employee_id, :check_date, :employeeStatus, :attendanceStatus)");
		
				$leaveData = [
					'employee_id' => $employeeId,
					'check_date' => $check_date,
					'employeeStatus' => $employeeStatus,
					'attendanceStatus' => $attendanceStatus
				];
				$leaveInfo->execute($leaveData);
			}
			else{
				$msg = "Already Generated";
			}
		}
	}


	$templateVars = [
		'attd' => $attd,
		'absents' => $absents,
		'msg'=> $msg
	];
	
	$title = 'Online Attendance - Dashboard - Employee Attendance';
	$content = loadTemplate('../views/emp_attend_template.php', $templateVars);
?>
