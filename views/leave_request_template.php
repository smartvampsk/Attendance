<?php
if(!isset($_SESSION['logged_emp_id'])){
    header('location:login');        
}
?>

<div class="container justify-content-center">
    <div class="card">
        <h2 class="card-header">My Leave Applications</h2>

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

            <div class="card-body">
                <table class="table-responsive-md table table-sm table-striped text-center">
                    <?php if ($leaves->rowCount() >0 ){ ?>
                        <thead>
                            <tr>
                                <th scope="col">S.N</th>
                                <th scope="col">Applied on</th>
                                <th scope="col">Reason</th>
                                <th scope="col">Description</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">End Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $sn = 1;
                            foreach ($leaves as $leave) {?>
                                <tr>
                                    <th><?php echo $sn++; ?></th>
                                    <td><?php echo $leave['applied_date']; ?></td>
                                    <td><?php echo $leave['reason']; ?></td>
                                    <td><?php echo $leave['description']; ?></td>
                                    <td><?php echo $leave['start_date']; ?></td>
                                    <td><?php echo $leave['end_date']; ?></td>
                                    <td><?php  if($leave['status'] == null){
                                        echo "-";
                                    } else if($leave['status'] == 'Accepted') {
                                        echo '<div class="bg-primary text-white rounded-pill px-2">'.$leave['status'].'</div>';
                                    } else{
                                        echo '<div class="bg-danger text-white rounded-pill px-2">'.$leave['status'].'</div>';
                                    }?></td>
                                    <td><?php 
                                    if ($leave['status'] == null) {
                                        echo '<a class="btn btn-sm btn-danger" href="leave?cid='.$leave['leave_id'].'">Cancel</a>';
                                    } else {
                                        echo 'N/A';
                                    }

                                    ?></td>
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
