<?php
    if(!isset($_SESSION['logged_emp_id'])){
        header('location:login');        
    }
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="card-header">Change Password</h2>

                <div class="card-body">      
                    <div class="text-left">
                        <?php if (!empty($msg)) { ?>
                            <div class=" p-2 bg-info alert alert-dismissible fade show">
                                <div class="col-md-11">
                                    <?php echo $msg; ?>
                                </div>
                                <button type="button" class="close pt-1" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><b>&times;</b></span>
                                    <?php header('Refresh:5; url=home'); ?>
                                </button>
                            </div>
                        <?php } ?>
                    </div>        
                    <form method="POST" action="" aria-label="Register">
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Your E-Mail Address <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" name="change" class="btn btn-primary"> Change </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
