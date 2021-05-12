<?php
    if(!isset($_SESSION['logged_emp_id'])){
        header('location:login');   
    }
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="card-header">Leave Request Form</h2>

                <div class="card-body">
                    <div class="text-left">
                        <?php if (!empty($msg)) { ?>
                            <div class=" p-2 bg-info alert alert-dismissible fade show">
                                <div class="col-md-11">
                                    <?php echo $msg; ?>
                                </div>
                                <button type="button" class="close pt-1" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><b>&times;</b></span>
                                    <?php header('Refresh:5; url=leave_form'); ?>
                                </button>
                            </div>
                        <?php } ?>
                    </div>

                    <form method="POST" action="">
                        <div class="p-3">
                            <div class="col-md-8 row">
                                <label class="col-form-label">Date:</label>
                                <label class="col-sm-8 col-form-label"><?php echo date('Y-m-d'); ?></label>
                            </div><hr>
            
                            <div class="form-group row pt-2">
                                <label class="col-sm-4 col-form-label">Reason for leave</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="reason" required>
                                        <option disabled selected>-- Select Reason --</option>
                                        <option value="Sick Leave">Sick Leave</option>
                                        <option value="Annual Leave">Annual Leave </option>
                                        <option value="Bereavement">Bereavement </option>
                                        <option value="Maternity Leave">Maternity Leave </option>
                                        <option value="Parental Leave">Parental Leave </option>
                                        <option value="Unpaid Leave">Unpaid Leave </option>
                                        <option value="Other">Other </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row pt-2">
                                <label class="col-sm-4 col-form-label">Description</label>
                                <div class="col-sm-8">
                                   <textarea class="form-control" name="description" placeholder="Notes/Comments:"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="col-form-label">Start Date</label>
                                    <input type="date" name="start_date" class="form-control" required>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-form-label">End Date</label>
                                    <input type="date" name="end_date" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center pt-3">
                                <div class="col-sm-6">
                                    <input type="submit" name="apply" value="Apply" class="form-control btn btn-primary">
                                </div>
                                <div class="col-sm-6">
                                    <input type="reset" name="reset" class="form-control btn btn-warning">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>