<?php
session_start();
     
error_reporting(E_ALL & ~E_NOTICE);
include('includes/db.php');
   if (!isset($_SESSION['email']))
   {
      header("location: index.php");
   }
   else 
   {
        $now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire']) 
		{
            unset($_SESSION);
			session_destroy();
			header("location: index.php?session=false");
        }
		else 
		{ //Starting this else one [else1]
		
$email = $_SESSION['email'];
$result	=	mysqli_query($bd, "SELECT * FROM users WHERE email='" .$email."'");
$row	= 	mysqli_fetch_array($result,MYSQLI_ASSOC);
$balance = $english_format_number = number_format($row['balance']);

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<?php include("meta.php"); ?> 
<?php require_once 'psmw/shortcode.php'; ?>             
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="psmw/css/style.css" />
<script src="psmw/js/app.min.js"></script> 
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
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
			
				<div class="row">
                    <!-- Column -->
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                     <?php shortcode(['type' => 'ticker', 'symbol' => 'GC=F,RELIANCE.NS,SBIN.NS,TATAMOTORS.NS,BHARTIARTL.NS,ZEEL-P2.NS,ASIANPAINT.BO,MARUTHI.BO', 'template' => 'background', 'color' => 'black', 'speed' => 20000, 'direction' => 'left', 'pause' => TRUE]); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column --> 
                </div>
				
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-8 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive tsearch" >
											 <div class="form-group">
											<input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Search for symbol.." title="Type in a name">
                                            </div>
<?php shortcode(['type' => 'table', 'symbol' => 'GC=F,GOLDSHARE.NS,RELIANCE.NS,SBIN.NS,TATAMOTORS.NS,BHARTIARTL.NS,ASIANPAINT.BO,INDUSINDBK.NS,AXISBANK.NS,UPL.NS,ICICIBANK.NS,JSWSTEEL.NS,HEROMOTOCO.NS,POWERGRID.NS,INFY.NS,DRREDDY.NS,TITAN.NS,NMDC.BO,VIDLI.BO,HBEL.BO,FILTRA.BO,CSLFINANCE.BO,INDTERRAIN.NS,INDTERRAIN.BO,UCALFUEL.BO,UCALFUEL.NS,ACC.NS,ADANIPORTS.NS', 'template' => 'basic', 'fields' => 'virtual.symbol,quote.regularMarketPrice,quote.regularMarketChange,quote.regularMarketChangePercent', 'color' => 'blue']); ?>
									   </div>
                                    </div> 
									
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
								<div class="d-flex">
                                    <div class="mr-3 align-self-center">
                                        <h1 class="text-info"><i class="ti-bar-chart"></i></h1>
                                    </div>
                                    <div>
                                        <h3 class="card-title ">Account Summary</h3>                                        
                                    </div>
                                </div>
								<div class="d-flex no-block align-items-center">							
                                    <div>
                                        <h2><?php echo  $balance;?>&#8377;</h2>
                                        <h6 class="text-info">Available Balance</h6>
                                    </div>
                                    <div class="ml-auto"> 
									<?php										
									$query1=mysqli_query($bd, "select SUM(stock_tprice) AS s_total, SUM(stock_qty) AS s_qty from user_stock where user_id ='".$email."'");
									$row1=mysqli_fetch_array($query1);
									$total= $english_format_number = number_format($row1['s_total']);
																	
									?>
                                        <h2><?php echo  $total;?>&#x20B9;</h2>
										<h6 class="text-info">Total Stock Value</h6>
										
                                    </div>
								
                                </div>
                            </div>
                        </div>
						<div class="card">
                            <div class="card-body">								
								<div class="d-flex no-block align-items-center">									
                                    <?php shortcode(['type' => 'spark', 'symbol' => '^NSEI', 'template' => 'line2', 'color' => 'blue']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row --> 
				
            </div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<form id="" action="authenticate.php" method="post" enctype="multipart/form-data">
<input type="hidden" value="'.$email.'"  id="email" name="email">
<input type="hidden" value="'.$row['balance'].'"  id="balance" name="balance">
<input type="submit" style="visibility: hidden;" />
</form>
<script type="text/javascript">
  document.getElementById('jsform').submit();
</script>
<!-- footer -->
<!-- ============================================================== -->
<?php include("footer.php"); ?> 
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


</body>
</html>
<?php
        }
    }
?>