<?php
    if(!isset($_SESSION['logged_emp_id'])){
        header('location:login');   
    }
?>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="card-header">Attendance</h2>

                <div class="card-body">
                    <div class="text-left">
                        <?php if (!empty($msg)) { ?>
                            <div class=" p-2 bg-info alert alert-dismissible fade show">
                                <div class="col-md-11">
                                    <?php echo $msg; ?>
                                </div>
                                <button type="button" class="close pt-1" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><b>&times;</b></span>
                                    <?php header('Refresh:0; url=attendance'); ?>
                                </button>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="py-4">
                        <form method="POST" action="" class="row justify-content-around">
                            <input type="submit" name="check_in" value="Check In" class="btn btn-primary" <?php echo $disabled; ?> >
                            <input type="submit" name="check_out" value="Check Out" class="btn btn-warning" <?php echo $disableCO; ?>>
                        </form>
                    </div>
                    <div class=" row justify-content-center">
                        <?php if (!empty($check_in_time)) {
                            echo '<p class="pr-5">Check In Time: <span class="text-muted">'.$check_in_time.' </span></p>';
                        } ?>
                        <?php if (!empty($check_out_time)) {
                            echo '<p>Check Out Time: <span class="text-muted">'.$check_out_time.' </span></p>';
                        } ?>
                    </div>
                    <div class="row py-2 text-center justify-content-center text-white">
                        <?php if (!empty($message)) { ?>
                            <div class=" p-2 bg-info alert alert-dismissible fade show">
                                <div class="col-md-11">
                                    <?php echo $message; ?>
                                </div>
                                <button type="button" class="close pt-1" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><b>&times;</b></span>
                                </button>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>