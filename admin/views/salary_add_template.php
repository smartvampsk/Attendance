<?php
if(!isset($_SESSION['logged_admin_id'])){
	header('location:login');        
}
?>

<?php 
if (!empty($dommyRecord)) { ?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<h2 class="card-header">Create Pay Slip</h2>

					<div class="card-body">      
						<div class="text-left">
							<?php if (!empty($msg)) { ?>
								<div class=" p-2 bg-info alert alert-dismissible fade show">
									<div class="col-md-11">
										<?php echo $msg; ?>
									</div>
									<button type="button" class="close pt-1" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true"><b>&times;</b></span>
										<?php header('Refresh:5; url=salary_add'); ?>
									</button>
								</div>
							<?php } ?>
						</div>
						<form method="POST" action="">
							<div class="form-group row">
								<label class="col-md-4 col-form-label text-md-right">Name</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="name" value="<?php echo $emp['firstname'].' '.$emp['surname']; ?>" readonly>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-md-4 col-form-label text-md-right">Basic Salary</label>
								<div class="col-md-6">
									<input type="text" class="form-control" id="basic_salary" name="basic_salary" value="<?php echo $emp['basic_salary']; ?>" readonly>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-md-4 col-form-label text-md-right">Total Present Days</label>
								<div class="col-md-6">
									<input type="text" class="form-control" id="present_days" name="present_days" value="<?php echo $dommyRecord['countPresent'] + 4; ?>" readonly>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-md-4 col-form-label text-md-right">Approved Holidays</label>
								<div class="col-md-6">
									<input type="text" class="form-control" id="holidays" name="holidays" value="<?php echo $leaves['countLeave']; ?>" readonly>
								</div>
							</div>

							<?php 
							$absent = 30 - $dommyRecord['countPresent'] - 4 - $leaves['countLeave'];
							$wage = $emp['basic_salary']/30;
							$deduction = $absent * $wage;
							if ($dommyRecord['countPresent'] < 1) {
								$salary = 0;
							}else {
								$salary = $emp['basic_salary'] - $deduction; 
							}
							?>

							<div class="form-group row">
								<label class="col-md-4 col-form-label text-md-right">Deduction</label>
								<div class="col-md-6">
									<input type="text" class="form-control" id="deduction" name="deduction" value="<?php echo $deduction; ?>" onchange="calculateTotal();">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-4 col-form-label text-md-right">Salary</label>
								<div class="col-md-6">
									<input type="text" class="form-control" id="salary" name="salary" value="<?php echo $salary; ?>" onchange="calculateTotal();" readonly>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-4 col-form-label text-md-right">Incentive</label>
								<div class="col-md-6">
									<input type="text" class="form-control" id="incentive" name="incentive" value="0" onchange="calculateTotal();" required="">
								</div>
							</div>

							<div class="form-group row">
								<label class="col-md-4 col-form-label text-md-right">Grand Total (Salary)</label>
								<div class="col-md-6">
									<input type="text" class="form-control" id="grand_total" name="grand_total" required="">
								</div>
							</div>

							<div class="form-group row mb-0 justify-content-center">
								<input type="hidden" class="form-control" id="employee_id" name="employee_id" value="<?php echo $emp['employee_id']; ?>">

								<button type="submit" name="generate" class="btn btn-primary mr-3"> Generate Slip </button>
								<button class="btn btn-success disabled" name="sum" id="sum" onmouseover="calculateTotal()">Get Total</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } else { ?>
	<!-- field to select user -->
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<h4 class="card-header">Select Staff</h4>

					<div class="card-body">      
						<div class="text-left">
							<?php if (!empty($msg)) { ?>
								<div class=" p-2 bg-info alert alert-dismissible fade show">
									<div class="col-md-11">
										<?php echo $msg; ?>
									</div>
									<button type="button" class="close pt-1" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true"><b>&times;</b></span>
										<?php header('Refresh:5; url=salary_add'); ?>
									</button>
								</div>
							<?php } ?>
						</div>
						<form method="POST" action="">
							<div class="form-group row">
								<label for="employee" class="col-md-4 col-form-label text-md-right">Employee</label>
								<div class="col-md-8">
									<select class="form-control" id="employee" name="employee_id">
										<?php 
										require '../../db/db.php';
										$emplo = $pdo->prepare("SELECT * FROM employees WHERE status = '1'");
										$emplo->execute();
										foreach ($emplo as $emp) {
											echo '<option value="'.$emp['employee_id'].'">'.$emp['firstname'].' '.$emp['surname'].'</option>';
										}
										?>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6 offset-md-4">
									<button type="submit" name="next" class="btn btn-primary"> Next </button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php 
} ?>