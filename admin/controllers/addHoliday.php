
<?php
if(!isset($_SESSION['logged_admin_id'])){
    header('location:login');        
}
	$holidayDataTable = new DatabaseWork($pdo,'holidayData');
	if (isset($_POST['submit'])) {
		unset($_POST['submit']);
		$holidayAdder = $holidayDataTable->save($_POST);	
		header('location:viewHoliday');
	}
	$title = 'Add Holiday';
	$content = loadTemplate('../views/addHolidayView.php',[]);
?>