<div class="container justify-content-center">
    <div class="card">
        <div class="card-header container">
            <div class="row px-4 justify-content-between">
                <div class="">
                    <h2>Deleted Attendance Record</h2>
                </div>
                <div>
                    <form method="POST" action="">
                        <div class="form-group row">
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>

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
            <table class="table-responsive-md table table-sm table-hover text-center">
                <?php if ($attd->rowCount() >0 ){ ?>
                <thead>
                    <tr>
                        <th scope="col">S.N</th>
                        <th scope="col">Employee</th>
                        <th scope="col">Date</th>
                        <th scope="col">Check In</th>
                        <th scope="col">Check Out</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $sn = 1;
                        foreach ($attd as $att) {?>
                            <tr>
                                <th><?php echo $sn++; ?></th>
                                <td><?php echo $att['firstname'].' '.$att['surname']; ?></td>
                                <td><?php echo $att['check_date']; ?></td>
                                <td><?php echo date('H:i:s', strtotime($att['check_in'])); ?></td>
                                <td><?php echo date('H:i:s', strtotime($att['check_out'])); ?></td>
                                <td><?php 
                                    if ((!empty($att['check_in'])) && (!empty($att['check_out']))) {
                                        echo 'Present';
                                    }
                                    elseif ((empty($att['check_in'])) || (empty($att['check_out']))) {
                                        echo 'N/A';
                                    } 
                                    else{
                                        echo "Absent";
                                    }
                                    ?>
                                </td>
                            </tr>
                       <?php
                    } ?>
                    </tbody>
                <?php }
                else {
                    echo '<p>No Record Found</p>';
                }
                ?>
            </table>
        </div>
    </div>
</div>