<?php
    if(!isset($_SESSION['logged_admin_id'])){
        header('location:login');        
    }

    $created_at = $salaries['created_at'];
    $created_date = date_format(new DateTime($created_at), "Y-m-d");

    $pay_date = $salaries['salary_of'];
    $year = date('Y', strtotime($pay_date));
    $month = date('F', strtotime($pay_date));
?>

<div class="container">
    <div class="col-md-12 mx-auto">
        <div class="card" id="divToPrint">
            <h2 class="card-header">Salary slip</h2>
            <div class="card-body">
            	<div class="row">
            		<div class="col-md-6">
            			<p class="mb-0"><b>Employee Name: </b><?php echo $salaries['firstname'].' '.$salaries['surname']; ?></p>
            			<p class="mb-0"><b>Bank Detail: </b><?php echo $salaries['bank_name'].', '.$salaries['branch']; ?></p>
            			<p class="mb-0"><b>Account Number: </b><?php echo $salaries['account_number']; ?></p>
            			<p class="mb-0"><b>Account Name: </b><?php echo $salaries['account_name']; ?></p>
            		</div>

            		<div class="col-md-4 offset-md-2">
            			<p class="mb-0"><b>Pay Date: </b><?php echo $created_date; ?></p>
            			<p class="mb-0"><b>Payment of: </b><?php echo $month.' '.$year; ?></p>
            			<p class="mb-0"><b>Total Present: </b><?php echo $salaries['present_days'].' days'; ?></p>
            			<p class="mb-0"><b>Approved Holidays: </b><?php echo $salaries['holidays'].' days'; ?></p>
            		</div>
            	</div>
            	<!-- <hr> -->
            	<div class="table-responsive mt-4">
            		<table class="table table-striped">
            			<thead>
            				<th>Basic Salary</th>
            				<th>Deduction</th>
            				<th>Salary</th>
            				<th>Incentive</th>
            			</thead>
            			<tbody>
            				<tr><?php 
            					echo '<td> Rs. '.$salaries['basic_salary'].'</td>';
            					echo '<td> Rs. '.$salaries['deduction'].'</td>';
            					echo '<td> Rs. '.$salaries['salary'].'</td>';
            					echo '<td> Rs. '.$salaries['incentive'].'</td>';
            				?></tr>
            			</tbody>
            		</table>
            	</div>
            	<div class="pr-4">
            		<p class="mb-0"><b>Grand Total: </b><?php echo 'Rs '.$salaries['total_salary']; ?></p>
            	</div>
            	<hr>
            </div>
            <div class="card-footer pt-0 bg-transparent border-0">
            	<a class="btn btn-primary" id="payBackBtn" href="salaries">Back</a>
                <button class="btn btn-danger" id="payPrintBtn" onclick="printDiv('divToPrint')">Print</button>
            </div>
        </div>
    </div>
</div>
