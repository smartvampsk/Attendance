<?php
if(!isset($_SESSION['logged_admin_id'])){
	header('location:login');        
}
?>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<h2 class="card-header">Update Pay Slip</h2>

				<div class="card-body">      
					<div class="text-left">
						<?php if (!empty($msg)) { ?>
							<div class=" p-2 bg-info alert alert-dismissible fade show">
								<div class="col-md-11">
									<?php echo $msg; ?>
								</div>
								<button type="button" class="close pt-1" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true"><b>&times;</b></span>
									<?php header('Refresh:5; url=salaries'); ?>
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
								<input type="text" class="form-control" id="present_days" name="present_days" value="<?php echo $emp['present_days']; ?>" readonly>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right">Approved Holidays</label>
							<div class="col-md-6">
								<input type="text" class="form-control" id="holidays" name="holidays" value="<?php echo $emp['holidays']; ?>" readonly>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right">Deduction</label>
							<div class="col-md-6">
								<input type="text" class="form-control" id="deduction" name="deduction" value="<?php echo $emp['deduction'];; ?>" onchange="calculateTotal();">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right">Salary</label>
							<div class="col-md-6">
								<input type="text" class="form-control" id="salary" name="salary" value="<?php echo $emp['salary']; ?>" onchange="calculateTotal();" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right">Incentive</label>
							<div class="col-md-6">
								<input type="text" class="form-control" id="incentive" name="incentive" value="<?php echo $emp['incentive']; ?>" onchange="calculateTotal();" required="">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right">Grand Total (Salary)</label>
							<div class="col-md-6">
								<input type="text" class="form-control" id="grand_total" name="grand_total" value="<?php echo $emp['total_salary']; ?>" required="">
							</div>
						</div>

						<div class="form-group row mb-0 justify-content-center">
							<input type="hidden" class="form-control" id="salary_id" name="salary_id" value="<?php echo $emp['salary_id']; ?>">

							<button type="submit" name="update" class="btn btn-primary mr-3"> Update Slip </button>
							<button class="btn btn-success disabled" name="sum" id="sum" onmouseover="calculateTotal()">Get Total</button>
							<a href="salaries" class="btn btn-danger ml-3">Cancel</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>