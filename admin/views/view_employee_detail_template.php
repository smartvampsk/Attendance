<?php
    if(!isset($_SESSION['logged_admin_id'])){
        header('location:login');        
    }
?>

<div class="container">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <h2 class="card-header">Employee Detail</h2>
            <div class="card-body">
                <?php foreach ($employees as $employee) {
                    echo '<p><b>Name: </b>'.$employee['firstname'].' '.$employee['surname'].'</p>';
                    echo '<p><b>Address: </b>'.$employee['address'].'</p>';
                    echo '<p><b>Email: </b>'.$employee['email'].'</p>';
                    echo '<p><b>Gender: </b>'.$employee['gender'].'</p>';
                    echo '<p><b>DOB: </b>'.$employee['dob'].'</p>';
                    echo '<p><b>Phone: </b>'.$employee['phone'].'</p>';
                    echo '<p><b>Department: </b>'.$employee['department'].'</p>';
                    echo '<p><b>Date of Joining: </b>'.$employee['date_of_joining'].'</p>';
                    echo '<p><b>Basic Salary: </b>'.$employee['basic_salary'].'</p>';
                    echo '<p><b>Account Name: </b>'.$employee['account_name'].'</p>';
                    echo '<p><b>Account Number: </b>'.$employee['account_number'].'</p>';
                    echo '<p><b>Bank: </b>'.$employee['bank_name'].'</p>';
                    echo '<p><b>Branch: </b>'.$employee['branch'].'</p>';
                    if ($employee['status'] == 1) {
                        echo '<p><b>Status: </b>Active</p>';
                    } else {
                        echo '<p><b>Status: </b>Inctive</p>';
                    }
                } ?>
            <a href="view_employee" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
</div>
