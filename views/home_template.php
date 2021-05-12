<?php
    if(!isset($_SESSION['logged_emp_id'])){
        header('location:login');   
    }
?>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <?php 
                        echo 'Welcome back, <i><strong>'.$_SESSION['logged_emp_email'].'</strong></i>';
                    ?>
                    <p>Have a wonderful Day 😊 </p>
                </div>
            </div>
        </div>
    </div>
</div>