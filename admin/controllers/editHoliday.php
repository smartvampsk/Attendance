<?php
    if(!isset($_SESSION['logged_admin_id'])){
        header('location:login');        
    }
    require '../../db/db.php';
    
    $holidayDataTable = new DatabaseWork($pdo,'holidayData');
    if(isset($_GET['holidayId']))
    {
        $holidayId = $_GET['holidayId'];
        $holidayDataGetter = $holidayDataTable->find('holidayId',$holidayId);
        $holidayData = $holidayDataGetter->fetch();
    }
    if (isset($_POST['submit'])) {
        $updateHolidayDetails = $pdo->prepare("UPDATE holidaydata 
                                    SET holidayDate = :holidayDate,
                                        description = :description
                                    WHERE holidayId = $holidayId ");
        $fieldsToUpdate =[
            'holidayDate' => $_POST['holidayDate'],
            'description' => $_POST['description']
        ];	

        $updateHolidayDetails->execute($fieldsToUpdate);
        header('location:viewHoliday');
    }
    
    $variablesHandler=[
        'holidayData'=> $holidayData
    ];
	$title = 'Edit Holidays';
	$content = loadTemplate('../views/editHolidayView.php',$variablesHandler);
?>