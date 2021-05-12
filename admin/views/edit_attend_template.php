<?php
    if(!isset($_SESSION['logged_admin_id'])){
        header('location:login');        
    }
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="card-header">Edit Attendance</h2>

                <div class="card-body">
                    <div class="text-left">
                        <?php if (!empty($msg)) { ?>
                            <div class=" p-2 bg-info alert alert-dismissible fade show">
                                <div class="col-md-11">
                                    <?php echo $msg; ?>
                                </div>
                                <button type="button" class="close pt-1" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><b>&times;</b></span>
                                    <?php header('Refresh:5; url=emp_attend'); ?>
                                </button>
                            </div>
                        <?php } ?>
                    </div>
              
                    <form method="POST" action="">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="employee" class="col-form-label">Employee</label>
                                <input type="text" id="employee" name="employee" class="form-control" disabled value="<?php echo $attd['firstname'].' '.$attd['surname']; ?>">
                            </div>
                            <div class="col-sm-6">
                                <label for="check_date" class="col-form-label">Check Date</label>
                                <input type="date" id="check_date" name="check_date" class="form-control" value="<?php echo $attd['check_date']?>" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="check_in" class="col-form-label">Check In</label>
                                <input type="time" id="check_in" name="check_in" class="form-control" value="<?php echo $attd['check_in']?>">
                            </div>
                            <div class="col-sm-6">
                                <label for="check_out" class="col-form-label">Check Out</label>
                                <input type="time" id="check_out" name="check_out" class="form-control" value="<?php echo $attd['check_out']?>">
                            </div>
                        </div>
                        <div class="form-group row justify-content-center pt-3">
                            <input type="hidden" name="attend_id" id="attend_id" class="form-control" value="<?php echo $attd['attend_id']; ?>">
                            <div class="col-sm-6">
                                <input type="submit" id="update" name="update" value="Save" class="form-control btn btn-primary">
                            </div>
                            <div class="col-sm-6">
                                <button type="submit" name="cancel" class="form-control btn btn-warning">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        var check_date = localStorage.getItem('check_date');
        var check_in = localStorage.getItem('check_in');
        var check_out = localStorage.getItem('check_out');

        $('#check_date').val(check_date);
        $('#check_in').val(check_in);
        $('#check_out').val(check_out);
    });
</script>