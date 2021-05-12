<?php
    if(!isset($_SESSION['logged_admin_id'])){
        header('location:login');        
    }
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="card-header">Update Admin</h2>

                <div class="card-body">      
                    <div class="text-left">
                        <?php if (!empty($msg)) { ?>
                            <div class=" p-2 bg-info alert alert-dismissible fade show">
                                <div class="col-md-11">
                                    <?php echo $msg; ?>
                                </div>
                                <button type="button" class="close pt-1" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><b>&times;</b></span>
                                    <?php header('Refresh:5; url=view_admin'); ?>
                                </button>
                            </div>
                        <?php } ?>
                    </div>        
                    <form method="POST" action="" aria-label="Register">
                        <input type="hidden" name="admin_id" value="<?php echo $admins['admin_id']?>">
                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">Firstname</label>
                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="firstname" value="<?php echo $admins['firstname']?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">Surname</label>
                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control" name="surname" value="<?php echo $admins['surname']?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo $admins['email']?>" required>
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
