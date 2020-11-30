<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="robots" content="">
    <title>Broking India</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/materialpro/" />
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
            <div class="auth-box p-4 bg-white rounded">
				<div class="row">	
					<div class="col-md-3">	</div>				
					<div class="col-md-6 text-center">				   
					  <img src="assets/images/logo.png" alt="homepage" class="logo-login" />
					</div>
					<div class="col-md-3">	</div>	
				</div>
			
                <div>
                    <div class="logo">
                        <h3 class="box-title mb-3">Sign Up</h3>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            <form class="form-horizontal mt-3 form-material" action="authenticate.php" method="post" enctype="multipart/form-data">
                                <div class="form-group mb-3">
                                    <div class="col-xs-12">
                                        <input class="form-control" type="text" required="" name="reg_name" placeholder="Full Name">
                                    </div>
                                </div>
                                <div class="form-group mb-3 ">
                                    <div class="col-xs-12">
                                        <input class="form-control" type="email" required="" name="reg_email" placeholder="Email">
                                    </div>
                                </div>
								<div class="form-group mb-3 ">
                                    <div class="col-xs-12">
                                        <input class="form-control" type="text" required="" name="reg_mobile" placeholder="Mobile">
                                    </div>
                                </div>
                                <div class="form-group mb-3 ">
                                    <div class="col-xs-12">
                                        <input class="form-control" type="password" required="" name="reg_password" placeholder="Password">
                                    </div>
                                </div>                                
                                <div class="form-group mb-3">
                                    <div class="">
                                        <div class="checkbox checkbox-success pt-0">
                                            <input id="checkbox-signup" type="checkbox" class="chk-col-indigo material-inputs" required>
                                            <label for="checkbox-signup"> I agree to all <a href="#">Terms & Conditions</a></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center mb-3">
                                    <div class="col-xs-12">
                                        <button class="btn btn-success btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" name="submit">Sign Up</button>
                                    </div>
                                </div>
								<div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2 text-center">
                                        <div class="social mb-3">
                                            <a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fab fa-facebook-f"></i> </a>
                                            <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fab fa-google-plus"></i> </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-0 mt-2 ">
                                    <div class="col-sm-12 text-center ">
                                        Already have an account? <a href="index.php" class="text-success ml-1 ">Sign In</a>
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
    $('[data-toggle="tooltip "]').tooltip();
    $(".preloader ").fadeOut();
    </script>
</body>

</html>