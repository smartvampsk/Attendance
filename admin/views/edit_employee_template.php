<?php
    if(!isset($_SESSION['logged_admin_id'])){
        header('location:login');        
    }
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="card-header">Update Employee</h2>

                <div class="card-body">
                    <div class="text-left">
                        <?php if (!empty($msg)) { ?>
                            <div class=" p-2 bg-info alert alert-dismissible fade show">
                                <div class="col-md-11">
                                    <?php echo $msg; ?>
                                </div>
                                <button type="button" class="close pt-1" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><b>&times;</b></span>
                                    <?php header('Refresh:5; url=view_employee'); ?>
                                </button>
                            </div>
                        <?php } ?>
                    </div>
              
                    <form method="POST" action="" aria-label="Register">
                        <input type="hidden" name="employee_id" value="<?php echo $employee['employee_id']?>">
                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">Firstname</label>
                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="firstname" value="<?php echo $employee['firstname']?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">Surname</label>
                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control" name="surname" value="<?php echo $employee['surname']?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="<?php echo $employee['address']?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo $employee['email']?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Gender" class="col-md-4 col-form-label text-md-right">Gender</label>
                            <div class="col-md-6">
                               <input id="gender" type="radio" name="gender" value="Male" checked>Male 
                               <input id="gender" type="radio" name="gender" value="Female" <?php if ($employee['gender'] == 'Female') { echo 'checked'; } ?>>Female
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">Date of Birth</label>
                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control" name="dob" value="<?php echo $employee['dob']?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone no.</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" minlength="10" maxlength="15" value="<?php echo $employee['phone']?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="department" class="col-md-4 col-form-label text-md-right">Department</label>
                            <div class="col-md-6">
                                <select for="department" name="department" class="form-control" required>
                                    <?php foreach ($departments as $key) {
                                        if ($employee['department'] == $key['department_id']) {
                                            echo '<option selected="selected" value="'.$key['department_id'].'">'.$key['department'].'</option>';
                                        }
                                        else{
                                            echo '<option value="'.$key['department_id'].'">'.$key['department'].'</option>';
                                        }
                                    } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_of_joining" class="col-md-4 col-form-label text-md-right">Date of Joining</label>
                            <div class="col-md-6">
                                <input id="date_of_joining" type="date" class="form-control" name="date_of_joining" value="<?php echo $employee['date_of_joining']?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="basic_salary" class="col-md-4 col-form-label text-md-right">Basic Salary</label>
                            <div class="col-md-6">
                                <input id="basic_salary" type="number" class="form-control" name="basic_salary" value="<?php echo $employee['basic_salary']?>" required>
                            </div>
                        </div>

                        <hr class="col-md-10">
                        <div class="form-group row">
                            <label for="account_name" class="col-md-4 col-form-label text-md-right">Account Name</label>
                            <div class="col-md-6">
                                <input id="account_name" type="text" class="form-control" name="account_name" value="<?php echo $employee['account_name']?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="account_number" class="col-md-4 col-form-label text-md-right">Account Number</label>
                            <div class="col-md-6">
                                <input id="account_number" type="text" class="form-control" name="account_number" value="<?php echo $employee['account_number']?>" minlength="10" maxlength="20" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bank_name" class="col-md-4 col-form-label text-md-right">Bank Name</label>
                            <div class="col-md-6">
                                <input id="bank_name" type="text" class="form-control" name="bank_name" value="<?php echo $employee['bank_name']?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="branch" class="col-md-4 col-form-label text-md-right">Branch</label>
                            <div class="col-md-6">
                                <input id="branch" type="text" class="form-control" name="branch" value="<?php echo $employee['branch']?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Gender" class="col-md-4 col-form-label text-md-right">Status</label>
                            <div class="col-md-6">
                               <input id="status" type="radio" name="status" value="1" checked>Active 
                               <input id="status" type="radio" name="status" value="0" <?php if ($employee['status'] == '0') { echo 'checked'; } ?>>Inactive
                            </div>
                        </div>

                        <div class="form-group row justify-content-center pt-3">
                            <div class="col-sm-6">
                                <input type="submit" name="update" value="Update" class="form-control btn btn-primary">
                            </div>
                            <div class="col-sm-6">
                                <input type="submit" name="cancel" value="Cancel" class="form-control btn btn-warning">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
