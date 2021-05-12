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
                    <?php header('Refresh:5; url=view_department'); ?>
                </button>
            </div>
        <?php } ?>
    </div>
    
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">S.N</th>
                    <th scope="col">Departments</th>
                    <?php if ($_SESSION['logged_admin_type'] == 1) {
                        echo '<th scope="col">Operation</th>';
                    } ?>
                </tr>
            </thead>
            <tbody>
                <?php 
                if ($departments->rowCount() >0 ){
                    $sn = 1;
                    foreach ($departments as $department) {?>
                        <tr>
                            <th><?php echo $sn++; ?></th>
                            <td><?php echo $department['department']; ?></td>

                            <?php if ($_SESSION['logged_admin_type'] == 1) {
                                echo '<td>
                                <a class="btn btn-sm btn-success" href="edit_department?eid='.$department['department_id'].'">Edit</a>
                                <a class="btn btn-sm btn-danger " href="view_department?did='.$department['department_id'].'">Delete</a>
                                </td>';
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
