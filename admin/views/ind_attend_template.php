<?php
    if(!isset($_SESSION['logged_admin_id'])){
        header('location:login');        
    }

    if(!empty($attd)){ ?>
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
		                            <div class="">
		                                <select class="form-control" name="employee_id">
		                                	<?php 
		                                		require '../../db/db.php';
		                                		$empl = $pdo->prepare("SELECT * FROM employees");
		                                		$empl->execute();
		                                		foreach ($empl as $emp) {
		                                			echo '<option value="'.$emp['employee_id'].'">'.$emp['firstname'].' '.$emp['surname'].'</option>';
		                                		}
		                                	?>
		                                </select>
		                            </div>
		                            <input type="submit" name="view_ind" value="View" class="ml-1 btn btn-sm btn-outline-info">
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
		                                <td><?php
		                                    echo '<a href="edit_attend?eid='.$att['attend_id'].'"><i class="fas fa fa-edit text-success"></i></a> ';
		                                    if ($_SESSION['logged_admin_type'] == 1) {
		                                        echo '<a class="pl-2" href="emp_attend?did='.$att['attend_id'].'"><i class="fas fa fa-trash-alt text-danger"></i></a>';
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
	<?php
	} else { ?> 
		<div class="container">
		    <div class="row justify-content-center">
		        <div class="col-md-8">
		            <div class="card">
		                <h2 class="card-header">Choose Staff</h2>

		                <div class="card-body">      
		                    <div class="text-left">
		                        <?php if (!empty($msg)) { ?>
		                            <div class=" p-2 bg-info alert alert-dismissible fade show">
		                                <div class="col-md-11">
		                                    <?php echo $msg; ?>
		                                </div>
		                                <button type="button" class="close pt-1" data-dismiss="alert" aria-label="Close">
		                                    <span aria-hidden="true"><b>&times;</b></span>
		                                    <?php header('Refresh:5; url=register_admin'); ?>
		                                </button>
		                            </div>
		                        <?php } ?>
		                    </div>    
		                    <form method="POST" action="">
			            		<div class="form-group row">
			                        <label for="employee" class="col-md-4 col-form-label text-md-right">Employee</label>
			                        <div class="col-md-8">
			                            <select class="form-control" id="employee" name="employee_id">
				                        	<?php 
				                        		require '../../db/db.php';
				                        		$emplo = $pdo->prepare("SELECT * FROM employees");
				                        		$emplo->execute();
				                        		foreach ($emplo as $emp) {
				                        			echo '<option value="'.$emp['employee_id'].'">'.$emp['firstname'].' '.$emp['surname'].'</option>';
				                        		}
				                        	?>
				                        </select>
			                        </div>
			                    </div>
			                    <div class="form-group row">
			                        <div class="col-md-6 offset-md-4">
			                            <button type="submit" name="view_ind" class="btn btn-primary"> View </button>
			                        </div>
			                    </div>
			            	</form>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	<?php } ?>