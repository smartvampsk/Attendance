<?php
	if(isset($_SESSION['logged_admin_id'])){
		header('location:home');		
	}
?>

<section class="container pt-3 pb-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="card-header">Login</h2>

                <div class="card-body">
                    <div class="text-left">
                        <?php if (!empty($msg)) { ?>
                            <div class=" p-2 bg-danger alert alert-dismissible fade show">
                                <div class="col-md-11">
                                    <?php echo $msg; ?>
                                </div>
                                <button type="button" class="close pt-1" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><b>&times;</b></span>
                                    <?php header('Refresh:5; url=login'); ?>
                                </button>
                            </div>
                        <?php } ?>
                    </div>

                    <form method="POST" action="login" aria-label="Login">
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="" autocomplete="email" required>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php // isset($message){echo $message} ?></strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php // isset($message){echo $message} ?></strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">

                                    <label class="form-check-label" for="remember">Remember Me </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" name="login" class="btn btn-primary">Login</button>
                                <a class="btn btn-link" href="#"> Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>