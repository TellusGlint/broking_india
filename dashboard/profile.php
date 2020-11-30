<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
include('includes/db.php');
   if (!isset($_SESSION['reg_email']))
   {
      header("location: index.php");
   }
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
 <?php include("meta.php"); ?> 
</head>
<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper">
     <?php include("header.php"); ?> 
        <div class="page-wrapper">
            <div class="container-fluid">
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
						 <?php										
							$query=mysqli_query($bd, "select * from tbluser");
							while($row=mysqli_fetch_array($query))
							{
								$imagepath = "doc/";
								$reg_image = $row['reg_image'];
								$path= $imagepath.$reg_image;
						?>
                            <div class="card-body pb-0">
                                <center class="mt-4"> <img src="<?php echo $path; ?>" class="rounded-circle" width="150" />
                                    <h4 class="card-title mt-2"><?php echo  htmlentities($row['reg_name']);?></h4>                                                                      
                                </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body"> <small class="text-muted">Email address </small>
                                <h6><a href="" class=""><?php echo  htmlentities($row['reg_email']);?></a></h6> <small class="text-muted pt-4 db">Phone</small>
                                <h6><?php echo  htmlentities($row['reg_mobile']);?></h6> <small class="text-muted pt-4 db">Address</small>
                                <h6><?php echo  htmlentities($row['reg_address']);?></h6>
                                                              
                            </div>
							<?php } ?>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Tabs -->
                            <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">                               
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Profile</a>
                                </li> 
								<li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="false">Change Password</a>
                                </li>
                            </ul>
                            <!-- Tabs -->
                            <div class="tab-content" id="pills-tabContent">                                
                                <div class="tab-pane fade show active" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                                    <?php										
										$query=mysqli_query($bd, "select * from tbluser");
										while($row=mysqli_fetch_array($query))
										{
											$imagepath = "doc/";
											$reg_image = $row['reg_image'];
											$path= $imagepath.$reg_image;
									?>										
									<div class="card-body">
                                        <form class="form-horizontal form-material" action="authenticate.php" method="post" enctype="multipart/form-data" id="profile-form">
                                            <div class="form-group">
                                                <label class="col-md-12">Full Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control form-control-line" name="reg_name" value="<?php echo  htmlentities($row['reg_name']);?>">
												</div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Email</label>
                                                <div class="col-md-12">
                                                    <input type="email" value="<?php echo  htmlentities($row['reg_email']);?>" class="form-control form-control-line" name="reg_email" id="reg_email" >
                                                </div>
                                            </div>                                           
                                            <div class="form-group">
                                                <label class="col-md-12">Phone No</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="123 456 7890" class="form-control form-control-line" name="reg_mobile" value="<?php echo  htmlentities($row['reg_mobile']);?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Address</label>
                                                <div class="col-md-12">
                                                    <textarea rows="5" class="form-control form-control-line" name="reg_address" ><?php echo  $row['reg_address'];?></textarea>
                                                </div>
                                            </div> 
											<div class="form-group">
                                                <label class="col-md-12">Pin Code</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="Pin Code" class="form-control form-control-line" name="reg_pincode" value="<?php echo  htmlentities($row['reg_pincode']);?>">
                                                </div>
                                            </div>
											<div class="form-group">
												<label class="col-sm-12 text-left control-label col-form-label">Select File</label>
												<div class="col-sm-12">
													<div class="input-group mb-3">
														<div class="custom-file">
															<input type="file" class="custom-file-input" id="inputGroupFile01" name="reg_image">
															<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
														</div>
													</div>
												</div>
											</div>
											<?php } ?>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success" type="submit" name="submit_profile">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
										<div class="row">
										<div class="col-sm-12">
											<button class="btn btn-info" id="profile_edit">Edit</button>
											<button class="btn btn-secondary" id="profile_cancel">Cancel</button>
										</div>
										
										</div>
                                    </div>
                                </div>
								<div class="tab-pane fade" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <?php										
										$query=mysqli_query($bd, "select * from tbluser");
										while($row=mysqli_fetch_array($query))
										{
											$imagepath = "doc/";
											$reg_image = $row['reg_image'];
											$path= $imagepath.$reg_image;
									?>										
									<div class="card-body">
                                        <form class="form-horizontal form-material" action="authenticate.php" method="post" enctype="multipart/form-data" id="pass-form">
                                            <div class="form-group">
                                                <label class="col-md-12">Old Password</label>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control form-control-line" name="reg_name" value="<?php echo  htmlentities($row['reg_name']);?>">
												</div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">New Password</label>
                                                <div class="col-md-12">
                                                    <input type="email" value="<?php echo  htmlentities($row['reg_email']);?>" class="form-control form-control-line" name="reg_email" id="reg_email" >
                                                </div>
                                            </div>                                           
                                            <div class="form-group">
                                                <label class="col-md-12">Confirm Password</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="123 456 7890" class="form-control form-control-line" name="reg_mobile" value="<?php echo  htmlentities($row['reg_mobile']);?>">
                                                </div>
                                            </div>
											<?php } ?>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success" type="submit" name="submit_pass">Update Password</button>
                                                </div>
                                            </div>
                                        </form>
										<div class="row">
										<div class="col-sm-12">
											<button class="btn btn-info" id="pass_edit">Edit</button>
											<button class="btn btn-secondary" id="pass_cancel">Cancel</button>
										</div>
										
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
			<script src="assets/libs/jquery/dist/jquery.min.js"></script>
<?php include("footer.php"); ?> 
<script>
    $(document).ready(function(){
        $("#profile-form :input").prop("disabled", true);
		$("#profile_edit").click(function () {
			 $("#profile-form :input").prop("disabled", false);
		});
		$("#profile_cancel").click(function () {
			 $("#profile-form :input").prop("disabled", true);
		});
    });
</script>
<script>
    $(document).ready(function(){
        $("#pass-form :input").prop("disabled", true);
		$("#pass_edit").click(function () {
			 $("#pass-form :input").prop("disabled", false);
		});
		$("#pass_cancel").click(function () {
			 $("#pass-form :input").prop("disabled", true);
		});
    });
</script>
<script>
$(document).ready(function(){
 $('#drop_list').submit(function() {   
 if($('#newpassword').val() != $('#confirmpassword').val()){
 	alert("Please re-enter confirm Password");
 	$('#confirmpassword').val('');
 	$('#confirmpassword').focus();
 	return false;
 }
    });
    function clear_form()
     {
        $("#newpassword").val('');
        $("#confirmpassword").val('');	
		
     }
});
</script>
</body>
</html>