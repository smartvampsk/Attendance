<?php 

	if (isset($_GET['cid'])) {
		$cid = $_GET['cid'];
		$delete = $pdo->prepare("DELETE FROM leaves WHERE leave_id = '$cid'");
		$delete->execute();
		header('location:leave_request?msg=Leave Cancelled');
	}
?>