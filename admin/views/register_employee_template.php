<?php
    if(!isset($_SESSION['logged_admin_id'])){
        header('location:login');        
    }
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="card-header">Register Employee</h2>

                <div class="card-body">
                    <div class="text-left">
                        <?php if (!empty($msg)) { ?>
                            <div class=" p-2 bg-info alert alert-dismissible fade show">
                                <div class="col-md-11">
                                    <?php echo $msg; ?>
                                </div>
                                <button type="button" class="close pt-1" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><b>&times;</b></span>
                                    <?php header('Refresh:5; url=register_employee'); ?>
                                </button>
                            </div>
                        <?php } ?>
                    </div>
              
                    <form method="POST" action="" aria-label="Register">
                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">Firstname</label>
                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="firstname" value="" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">Surname</label>
                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control" name="surname" value="" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Gender" class="col-md-4 col-form-label text-md-right">Gender</label>
                            <div class="col-md-6">
                               <input id="gender" type="radio" name="gender" value="Male" checked>Male 
                               <input id="gender" type="radio" name="gender" value="Female">Female
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">Date of Birth</label>
                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control" name="dob" value="" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone no.</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" minlength="10" maxlength="15" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="department" class="col-md-4 col-form-label text-md-right">Department</label>
                            <div class="col-md-6">
                                <select for="department" name="department" class="form-control" required>
                                    <?php foreach ($departments as $key) {
                                        echo '<option value="'.$key['department_id'].'">'.$key['department'].'</option>';
                                    } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="basic_salary" class="col-md-4 col-form-label text-md-right">Basic Salary</label>
                            <div class="col-md-6">
                                <input id="basic_salary" type="number" class="form-control" name="basic_salary" value="" required>
                            </div>
                        </div>

                        <hr class="col-md-10">
                        <div class="form-group row">
                            <label for="account_name" class="col-md-4 col-form-label text-md-right">Account Name</label>
                            <div class="col-md-6">
                                <input id="account_name" type="text" class="form-control" name="account_name" value="" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="account_number" class="col-md-4 col-form-label text-md-right">Account Number</label>
                            <div class="col-md-6">
                                <input id="account_number" type="text" class="form-control" name="account_number" minlength="10" maxlength="20" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bank_name" class="col-md-4 col-form-label text-md-right">Bank Name</label>
                            <div class="col-md-6">
                                <input id="bank_name" type="text" class="form-control" name="bank_name" value="" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="branch" class="col-md-4 col-form-label text-md-right">Branch</label>
                            <div class="col-md-6">
                                <input id="branch" type="text" class="form-control" name="branch" value="" required>
                            </div>
                        </div>

                        <hr class="col-md-10">
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" name="register" class="btn btn-primary"> Register </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
