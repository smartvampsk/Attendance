<?php
if(!isset($_SESSION['logged_admin_id'])){
    header('location:login');        
}
require '../../db/db.php';

$todayDate = date("Y-m-d");
$pressent = 'present';
$attendanceDetails = $pdo->prepare("SELECT count(*) FROM attendances WHERE check_date=? AND attendanceStatus=? ");
$attendanceDetails->execute([$todayDate,$pressent]); 
$presentCount = $attendanceDetails->fetchColumn(); 
?>

<div class="container">
    <h2 class="text-center mt-0 mb-4 bg-light py-2">Attendance Management System</h2>
    <div class="col-md-8 mx-auto mb-4">
        <div class="card">
            <div class="card-body">
                <?php 
                echo 'Welcome back, <i>'.$_SESSION['logged_admin_email'].'</i>';
                ?>
            </div>
        </div>
    </div>

    <div class="col-md-12 mb-4">
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body bg-success rounded text-white">
                        <h6 class="m-0"><?php echo $emp1Count['emp1Count']; ?></h6>
                        <h6 class="m-0"><b>Employee</b></h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body bg-primary rounded text-white">
                        <h6 class="m-0"><?php echo $depCount['depCount']; ?></h6>
                        <h6 class="m-0"><b>Departments</b></h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body bg-danger rounded text-white">
                        <h6 class="m-0"><?php echo $emp1Count['emp1Count']-$presentCount; ?></h6>
                        <h6 class="m-0"><b>Absent today</b></h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body bg-info rounded text-white">
                        <h6 class="m-0"><?php echo $presentCount; ?></h6>
                        <h6 class="m-0"><b>Present today</b></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
$employeeDetails = "SELECT count(*) FROM employees WHERE status=1"; 
$dataFromTable = $pdo->prepare($employeeDetails); 
$dataFromTable->execute(); 
$totalEmployee = $dataFromTable->fetchColumn(); 



$currentDate = date("Y-m-d");
$status = 'present';
$attendanceDetails = $pdo->prepare("SELECT count(*) FROM attendances WHERE check_date=? AND attendanceStatus=? ");
$attendanceDetails->execute([$currentDate,$status]); 
$attendanceCount = $attendanceDetails->fetchColumn(); 


$presentPercentage = ($attendanceCount/$totalEmployee)*100;

$absentPercentage = 100 - $presentPercentage;


 
 $dataPoints = array( 
     array("label"=>"present", "y"=>$presentPercentage),
     array("label"=>"absent", "y"=>$absentPercentage) 
 )
  
 ?>
 <!DOCTYPE HTML>
 <html>
 <head>
 <script>
 window.onload = function() {
  
  
 var chart = new CanvasJS.Chart("chartContainer", {
     animationEnabled: true,
     title: {
         text: "Attendance of Employees"
     },
     subtitles: [{
         text: "Today"
     }],
     data: [{
         type: "pie",
         yValueFormatString: "#,##0.00\"%\"",
         indexLabel: "{label} ({y})",
         dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
     }]
 });
 chart.render();
  
 }
 </script>

 </head>
 <body>
 <div id="chartContainer" style="height: 370px; width: 100%;"></div>
 <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
 </body>
 </html>