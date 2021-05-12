<?php
	$msg = '';

	$leaves = $pdo->prepare("SELECT *, l.status as lstatus
		FROM leaves l 
		JOIN employees e
		ON l.employee_id = e.employee_id
		ORDER BY applied_date DESC");
	$leaves->execute();
	
	if (isset($_GET['aid'])) {
		$aid = $_GET['aid'];
		$upd = $pdo->prepare("UPDATE leaves 
			SET status = 'Accepted'
			WHERE leave_id = '$aid'");
		$upd->execute();

         //begin supplies
		$leaveStartDate = $_GET['fromDate'];
        $leaveEndDate = $_GET['toDate'];
        $begin = new DateTime( $leaveStartDate );
        $end   = new DateTime( $leaveEndDate );


		for($i = $begin; $i <= $end; $i->modify('+1 day'))
		{
            $leaveDates = $i->format("Y-m-d");
            

            $check_date = $leaveDates;
            $employeeStatus = 'onLeave';
            $attendanceStatus = 'onLeave';
            $employeeId = $_GET['employeeName'];
            
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

		$msg = "Status Updated";
	}

	if (isset($_GET['rid'])) {
		$rid = $_GET['rid'];
		$updt = $pdo->prepare("UPDATE leaves 
			SET status = 'Rejected'
			WHERE leave_id = '$rid'");
		$updt->execute();

		$msg = "Status Updated";
	}

	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}

	$templateVars = [
		'leaves' => $leaves,
		'msg'=> $msg
	];

	$title = 'Online Attendance - Dashboard - Leave Applications';
	$content = loadTemplate('../views/leave_template.php', $templateVars);
?>