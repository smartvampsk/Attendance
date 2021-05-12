<?php
if(!isset($_SESSION['logged_admin_id'])){
    header('location:login');        
}
?>


<div class="container justify-content-center">
    <div class="card">
        <div class="card-header container">
            <div class="row px-4 justify-content-between">
                <div class="">
                    <h2>Attendance Record</h2>
                </div>
                <div>
                    <form method="POST" action="">
                        <div class="form-group row">
                            <div class="mr-2">
                                <input type="date" name="search_date" class="form-control">
                            </div>
                            <div class="">
                                <select class="form-control" name="view_by">
                                    <option value="today">Today</option>
                                    <option value="week">Weekly </option>
                                    <option value="month">Monthly </option>
                                </select>
                            </div>
                            <input type="submit" name="view" value="View" class="ml-1 btn btn-sm btn-outline-info">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php 
            echo '<br>';
            echo '<form method="POST" action="" style="margin:20px;">
              <button type="submit" name="generate" class="btn btn-outline-info"> Generate Attendance Sheet </button>
           </form>'; 
        ?>

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
                            <th scope="col">Employee Status</th>
                            <th scope="col">Attendance Status</th>
                            <th scope="col">Action</th>
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
                                <td><?php 
                                if ($att['check_in'] != Null) {
                                    echo date('H:i:s', strtotime($att['check_in']));
                                }
                                else{
                                    echo '-';
                                }
                                ?></td>
                                <td><?php 
                                if ($att['check_out'] != Null) {
                                    echo date('H:i:s', strtotime($att['check_out']));
                                }
                                else{
                                    echo '-';
                                }
                                ?></td>
                                <td><?php echo $att['employeeStatus']; ?></td>
                                <td><?php echo $att['attendanceStatus']; ?></td>
                        
                            <td> <?php
                            echo '<a href="edit_attend?eid='.$att['attend_id'].'"><i class="fas fa fa-edit text-success"></i></a> ';
                            if ($_SESSION['logged_admin_type'] == 1) { ?>
                                <a href="emp_attend?did=<?php echo $att['attend_id']; ?>" onclick="return confirm('Are you sure you want to Delete?');"><i class="fas fa fa-trash-alt text-danger"></i></a>
                            <?php } ?>
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


