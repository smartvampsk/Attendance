<?php 
	if(!isset($_SESSION['logged_admin_id'])){
        header('location:login');        
    }
    require '../../db/db.php';

	if(isset($_GET['holidayId']))
    {   
        $holidayId = $_GET['holidayId'];
        $holidayTable = new DatabaseWork($pdo,'holidayData');
        $holidayQueryRemoval = $holidayTable->delete('holidayId',$holidayId);
    }
	$title = 'View Holiday';
	$content = loadTemplate('../views/viewHolidayView.php',[]);
?>