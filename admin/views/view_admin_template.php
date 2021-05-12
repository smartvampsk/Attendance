<?php
    if(!isset($_SESSION['logged_admin_id'])){
        header('location:login');        
    }
?>

<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">S.N</th>
                <th scope="col">Firstname</th>
                <th scope="col">Surname</th>
                <th scope="col">Email</th>
                <th scope="col">Type</th>
                <?php if ($_SESSION['logged_admin_type'] == 1) {
                    echo '<th scope="col">Operation</th>';
                } ?>
            </tr>
        </thead>
        <tbody>
            <?php 
                if ($admins->rowCount() >0 ){
                    $sn = 1;
                    foreach ($admins as $admin) {?>
                        <tr>
                            <th><?php echo $sn++; ?></th>
                            <td><?php echo $admin['firstname']; ?></td>
                            <td><?php echo $admin['surname']; ?></td>
                            <td><?php echo $admin['email']; ?></td>
                            <?php if ($admin['is_super'] == 1  ) {
                                echo '<td>Super Admin</td>';
                                } 
                                else  echo '<td>Admin</td>';
                            ?>
                            <?php if ($_SESSION['logged_admin_type'] == 1) {
                                echo '<td><a class="btn btn-sm btn-success" href="edit_admin?eid='.$admin['admin_id'].'">Edit</a></td>'; 
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
