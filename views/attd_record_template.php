<?php
if(!isset($_SESSION['logged_emp_id'])){
    header('location:login');   
}
?>

<div class="container justify-content-center">
    <div class="card">
        <h2 class="card-header">Attendance Record</h2>
        
        <div class="card-body">
            <table class="table-responsive-md table table-sm table-hover text-center">
                <?php if ($attd->rowCount() >0 ){ ?>
                    <thead>
                        <tr>
                            <th scope="col">S.N</th>
                            <th scope="col">Name</th>
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
                                <td><?php 
                                if ($att['check_out'] != Null) {
                                    echo date('H:i:s', strtotime($att['check_out']));
                                }
                                else{
                                    echo '-';
                                }
                                ?></td>
                                <td><?php 
                                if ((!empty($att['check_in'])) && (!empty($att['check_out']))) {
                                    echo 'Present';
                                }
                                elseif ((empty($att['check_in'])) || (empty($att['check_out']))) {
                                    echo 'N/A';
                                }
                                else{
                                    echo "Absent";
                                } ?> </td>
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