<?php
session_start();
   
error_reporting(E_ALL & ~E_NOTICE);
include('includes/db.php');
$email=$_SESSION['email'];
   if (!isset($_SESSION['email']))
   {
      header("location: index.php");
   }
   else 
   {
		$result	=	mysqli_query($bd, "SELECT * FROM users WHERE email='$email'");
		$row	= 	mysqli_fetch_array($result,MYSQLI_ASSOC);
		$imagepath = "doc/";
		$photo = $row['photo'];
		$path= $imagepath.$photo;
		$session_start = $row['time'];
		$session_expire = $session_start + (30 * 60);
        $now = time(); // Checking the time now when home page starts.

        if ($now > $session_expire) 
		{
			unset($_SESSION);
            session_destroy();
			header("location: index.php?session=false");
        }
		else 
		{ //Starting this else one [else1]
			date_default_timezone_set('Asia/Kolkata');
			$date=date('d-m-Y');
?>      
<style>
.myright
{
	margin-left: 610px;
}
.mytop
{
	margin-top: 10px;
}
</style>


	  <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-lg navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-lg-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="assets/images/logo-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="assets/images/logo-text.png" class="light-logo" alt="homepage" />
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-lg-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                      <!--   <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li> -->
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <!--<li class="nav-item d-none d-md-block search-box"> <a
                                class="nav-link d-none d-md-block waves-effect waves-dark" href="javascript:void(0)"><i
                                    class="ti-search"></i></a>
                            <form class="app-search">
                                <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Search For Commodities"> 
                                <a class="srh-btn"><i class="ti-close"></i></a> 
                            </form>
                        </li>-->
                        <!-- ============================================================== -->
                        <!-- Mega Menu -->
                        <!-- ============================================================== -->
                        <!--<li class="nav-item dropdown mega-dropdown"> <a
                                class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-view-grid"></i></a>
                            
                        </li>-->
                        <!-- ============================================================== -->
                        <!-- End Mega Menu -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-message"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox scale-up">
                                <ul class="list-style-none">
                                    <li>
                                        <div class="border-bottom rounded-top py-3 px-4">
                                            <h5 class="mb-0 font-weight-medium">Notifications</h5>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="message-center notifications position-relative" style="height:150px;">
                                            <!-- Message -->
                                            <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                               
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h5 class="message-title mb-0 mt-1">No New Notification</h5></div>
                                            </a>                                            
                                        </div>
                                    </li>                                    
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" id="2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                    class="ti-headphone-alt"></i>
                               
                            </a>
                            <div class="dropdown-menu mailbox dropdown-menu-right scale-up" aria-labelledby="2">
                                <ul class="list-style-none">
                                    <li>
                                        <div class="border-bottom rounded-top py-3 px-4">
                                            <h5 class="font-weight-medium mb-0">SUPPORT</h5>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="message-center message-body position-relative" style="height:80px;">
                                            <!-- Message -->
                                            <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                <span class="user-img position-relative d-inline-block"> <i class="ti-email font-20"></i> <span class="profile-status rounded-circle online"></span> </span>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h5 class="message-title mb-0 mt-1">support@brokingindia.com</h5>  </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                <span class="user-img position-relative d-inline-block"> <i class="ti-mobile font-20"></i> <span class="profile-status rounded-circle online"></span> </span>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h5 class="message-title mb-0 mt-1">+91 80- 4122 9695 </h5>  </div>
                                            </a>
                                        </div>
                                    </li>                                   
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== --> 
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="<?php echo $path; ?>" alt="user" width="30" class="profile-pic rounded-circle" />
                            </a>
                            <div class="dropdown-menu mailbox dropdown-menu-right scale-up">
                                <ul class="dropdown-user list-style-none">
                                    <li>
                                        <div class="dw-user-box p-3 d-flex">
                                            <div class="u-img"><img src="<?php echo $path; ?>" alt="user" class="rounded" width="80"></div>
                                            <div class="u-text ml-2">
                                                <h4 class="mb-0"><?php echo $row['fname'];  echo "&nbsp"; echo $row['lname']; ?></h4>
                                                <p class="text-muted mb-1 font-14"><a href="#" ><?php echo $row['email']; ?></a></p>                                               
                                            </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="dropdown-divider"></li>
                                    <li class="user-list"><a class="px-3 py-2" href="profile.php"><i class="ti-user"></i> My Profile</a></li>
                                    <li class="user-list"><a class="px-3 py-2" href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>                      
                    </ul>
                </div>
            </nav>
        </header>
		    <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
      
	   <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Personal</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="dashboard.php" aria-expanded="false"><span class="hide-menu">Dashboard </span></a> 
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="orders.php" aria-expanded="false"><span class="hide-menu">Orders </span></a> 
                        </li>
						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><span class="hide-menu">Holdings </span></a> 
                        </li>
						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><span class="hide-menu">Positions </span></a> 
                        </li>
						<li class="myright mytop" ><?php echo $date; ?>&nbsp;<li class="mytop" id="timer"></li></li>
                    </ul>
					
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
<script>
setInterval(function() {
    var currentTime = new Date ( );    
    var currentHours = currentTime.getHours ( );   
    var currentMinutes = currentTime.getMinutes ( );   
    var currentSeconds = currentTime.getSeconds ( );
    currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;   
    currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;    
    var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";    
    currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;    
    currentHours = ( currentHours == 0 ) ? 12 : currentHours;    
    var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;
    document.getElementById("timer").innerHTML = currentTimeString;
}, 1000);
</script>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("table-search");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<?php
        }
    }
?>	
		