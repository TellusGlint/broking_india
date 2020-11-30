<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="robots" content="">
    <title>Broking India</title>   
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(assets/images/background/login-register.png) no-repeat center center; background-size: cover;">
            <div class="auth-box p-3 bg-white rounded">
				<div class="row">	
					<div class="col-md-3">	</div>				
					<div class="col-md-6 text-center">				   
					  <img src="assets/images/logo.png" alt="homepage" class="logo-login" />
					</div>
					<div class="col-md-3">	</div>	
				</div>
                <div id="loginform">									
                    <div class="logo">
                        <h3 class="box-title mb-3">Forgot Password</h3>
<?php
if ('false' === @$_GET['email']) {
    echo '
<div class="alert alert-success"> <i class="ti-user"></i> Invalid Username
<button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="close();"> 
<span aria-hidden="true">&times;</span> </button>
</div>';
}
?>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            <form class="form-horizontal mt-3 form-material" method="post" action="authenticate.php" enctype="multipart/form-data">
                                <div class="form-group mb-3">
                                    <div class="">
                                        <input class="form-control" type="email" required="" placeholder="Username" name="email"> </div>
                                </div>
								<div class="form-group text-center mt-4">
                                    <div class="col-xs-12">
                                        <button class="btn btn-success btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" name="submit_email">Check</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>          
            </div>
        </div>
    </div>

    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>

    <script>
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    </script>
</body>
</html>