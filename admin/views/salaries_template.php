<?php
    if(!isset($_SESSION['logged_admin_id'])){
        header('location:login');        
    }
?>

<div class="container">
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

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">S.N</th>
                    <th scope="col">Name</th>
                    <th scope="col">Salary</th>
                    <th scope="col">Incentive</th>
                    <th scope="col">Grand Total</th>
                    <th scope="col">Salary Of</th>
                    <?php if ($_SESSION['logged_admin_type'] == 1) {
                        echo '<th scope="col">Operation</th>';
                    } ?>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if ($salaries->rowCount() >0 ){
                        $sn = 1;
                        foreach ($salaries as $employee) {?>
                            <tr>
                                <th><?php echo $sn++; ?></th>
                                <td><?php echo $employee['firstname'].' '.$employee['surname']; ?></td>
                                <td><?php echo 'Rs. '.$employee['salary']; ?></td>
                                <td><?php echo 'Rs. '.$employee['incentive']; ?></td>
                                <td><?php echo 'Rs. '.$employee['total_salary']; ?></td>
                                <td><?php echo $employee['salary_of']; ?></td>

                                <?php if ($_SESSION['logged_admin_type'] == 1) {
                                    echo '<td>
                                        <a class="btn btn-sm btn-info" href="salaries_detail?eid='.$employee['salary_id'].'">View</a>
                                        <a class="btn btn-sm btn-success" href="edit_salary?eid='.$employee['salary_id'].'">Edit</a>'
                                        ?>
                                        <a class="btn btn-sm btn-danger" href="salaries?did=<?php echo $employee['salary_id']; ?>" onclick="return confirm('Are you sure you want to Delete?')">Delete</a>
                                    <?php '</td>';
                                } ?>
                            </tr>
                       <?php }
                    }
                    else {
                        echo '<p>No Record Found</p>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
