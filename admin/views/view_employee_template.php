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
                    <th scope="col">Firstname</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Status</th>
                    <?php if ($_SESSION['logged_admin_type'] == 1) {
                        echo '<th scope="col">Operation</th>';
                    } ?>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if ($employees->rowCount() >0 ){
                        $sn = 1;
                        foreach ($employees as $employee) {?>
                            <tr>
                                <th><?php echo $sn++; ?></th>
                                <td><?php echo $employee['firstname']; ?></td>
                                <td><?php echo $employee['surname']; ?></td>
                                <td><?php echo $employee['email']; ?></td>
                                <td><?php echo $employee['phone']; ?></td>
                                <td>
                                    <?php if($employee['status'] == 1)
                                        echo "Active";
                                    else 
                                        echo "Inactive" ?>
                                </td>

                                <?php if ($_SESSION['logged_admin_type'] == 1) {
                                    echo '<td>
                                        <a class="btn btn-sm btn-info" href="view_employee_detail?eid='.$employee['employee_id'].'">View</a>
                                        <a class="btn btn-sm btn-success" href="edit_employee?eid='.$employee['employee_id'].'">Edit</a>'
                                        ?>
                                        <a class="btn btn-sm btn-danger" href="view_employee?did=<?php echo $employee['employee_id']; ?>" onclick="return confirm('Are you sure you want to Delete?');">Delete</a>
                                    <?php
                                    '</td>';
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
