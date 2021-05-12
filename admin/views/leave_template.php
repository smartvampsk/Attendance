<?php
if(!isset($_SESSION['logged_admin_id'])){
    header('location:login');        
}
?>
<div class="container justify-content-center">
    <div class="card">
        <h2 class="card-header">Leave Applications</h2>
        <div class="card-body">
            <div class="text-left">
                <?php if (!empty($msg)) { ?>
                    <div class=" p-2 bg-info alert alert-dismissible fade show">
                        <div class="col-md-11">
                            <?php echo $msg; ?>
                        </div>
                        <button type="button" class="close pt-1" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><b>&times;</b></span>
                            <?php header('Refresh:0; url=leave'); ?>
                        </button>
                    </div>
                <?php } ?>
            </div>
            <table class="table-responsive-md table table-sm table-striped text-center">
                <?php if ($leaves->rowCount() >0 ){ ?>
                    <thead>
                        <tr>
                            <th scope="col">S.N</th>
                            <th scope="col">Employee</th>
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
                        $today = date('Y-m-d');
                        foreach ($leaves as $leave) {?>
                            <tr>
                                <th><?php echo $sn++; ?></th>
                                <td><?php echo $leave['firstname'].' '.$leave['surname']; ?></td>
                                <td><?php echo $leave['applied_date']; ?></td>
                                <td><?php echo $leave['reason']; ?></td>
                                <td class="text-left"><?php echo $leave['description']; ?></td>
                                <td><?php echo $leave['start_date']; ?></td>
                                <td><?php echo $leave['end_date']; ?></td>
                                <td><?php  if($leave['lstatus'] == null){
                                    echo "-";
                                } else if($leave['lstatus'] == 'Accepted') {
                                    echo '<div class="bg-primary text-white rounded-pill px-2">'.$leave['lstatus'].'</div>';
                                } else{
                                    echo '<div class="bg-danger text-white rounded-pill px-2">'.$leave['lstatus'].'</div>';
                                }?></td>
                                <td><?php
                                if($leave['lstatus'] == 'Accepted' || $leave['lstatus'] == 'Rejected' ){
                                    echo "-";
                                }else{
                                    if ($today < $leave['end_date']) {
                                        echo '<a href="leave?aid='.$leave['leave_id'].'&&fromDate='.$leave['start_date'].'&&toDate='.$leave['end_date'].'&&employeeName='.$leave['employee_id'].'"><i class="fas fa fa-check text-success" data-toggle="tooltip" data-placement="top" title="Accept"></i></a>';
                                        echo '<a class="pl-2" href="leave?rid='.$leave['leave_id'].'"><i class="fas fa fa-times text-danger" data-toggle="tooltip" data-placement="top" title="Reject"></i></a>';
                                    } else {
                                        echo "N/A";
                                    }
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

<script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>