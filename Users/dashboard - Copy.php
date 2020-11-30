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
                                     <?php shortcode(['type' => 'ticker', 'symbol' => 'RELIANCE.NS,SBIN.NS,TATAMOTORS.NS,BHARTIARTL.NS,ZEEL-P2.NS,ASIANPAINT.BO,MARUTHI.BO', 'template' => 'background', 'color' => 'black', 'speed' => 20000, 'direction' => 'left', 'pause' => TRUE]); ?>
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
                                        <div class="table-responsive" >
											 <div class="form-group">
											<input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Search for symbol.." title="Type in a name">
                                            </div>
<?php shortcode(['type' => 'table', 'symbol' => 'RELIANCE.NS,SBIN.NS,TATAMOTORS.NS,BHARTIARTL.NS,ASIANPAINT.BO,INDUSINDBK.NS,AXISBANK.NS,UPL.NS,ICICIBANK.NS,JSWSTEEL.NS,HEROMOTOCO.NS,POWERGRID.NS,INFY.NS,DRREDDY.NS,TITAN.NS,NMDC.BO,VIDLI.BO,HBEL.BO,FILTRA.BO,CSLFINANCE.BO,INDTERRAIN.NS,INDTERRAIN.BO,UCALFUEL.BO,UCALFUEL.NS,ACC.NS,ADANIPORTS.NS', 'template' => 'basic', 'fields' => 'virtual.symbol,quote.regularMarketPrice,quote.regularMarketChange,quote.regularMarketChangePercent', 'color' => 'blue']); ?>
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
                                        <h1 class="text-info"><i class="ti-pie-chart"></i></h1>
                                    </div>
                                    <div>
                                        <h3 class="card-title ">Equity</h3>                                        
                                    </div>
                                </div>
								<div class="d-flex no-block align-items-center">									
                                    <div>
                                        <h2>50K</h2>
                                        <h6 class="text-info">Available Balance</h6>
                                    </div>
                                    <div class="ml-auto">                                       
                                        <h6 class="text-info">Magrin Used: 5K</h6>
										<h6 class="text-info">Account Value: 55K</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="card">
                            <div class="card-body">
								<div class="d-flex">
                                    <div class="mr-3 align-self-center">
                                        <h1 class="text-info"><i class="ti-pie-chart"></i></h1>
                                    </div>
                                    <div>
                                        <h3 class="card-title ">Commodity</h3>                                        
                                    </div>
                                </div>
								<div class="d-flex no-block align-items-center">									
                                    <div>
                                        <h2>50K</h2>
                                        <h6 class="text-info">Available Balance</h6>
                                    </div>
                                    <div class="ml-auto">                                       
                                        <h6 class="text-info">Magrin Used: 5K</h6>
										<h6 class="text-info">Account Value: 55K</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
      
  
             
            </div>
			
			
			<div id="register-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">						
						<div class="modal-body">
							<div class="text-center bg-info p-3">
								<p class="text-white mb-0 text-left"> Buy RELIANCE.NS  - Price Rs.21160.30</p>
							</div>
							<form class="form-horizontal">
                                <div class="card-body pb-0">                                    
                                    <div class="form-group row">                                       
                                        <div class="col-sm-12">
                                            <input name="group4" type="radio" id="customControlValidation2" name="radio-stacked" class="with-gap material-inputs material-inputs radio-col-red" />
                                            <label for="customControlValidation2" class="mb-0 mt-2">Market</label>
                                            <input name="group4" type="radio" id="customControlValidation3" name="radio-stacked" class="with-gap material-inputs material-inputs radio-col-red" />
                                            <label for="customControlValidation3" class="mb-0 mt-2">Limit</label>
                                        </div>										
                                    </div>
									<div class="form-group row">
										<div class="col-md-4">
											<div class="form-group">
											 <label>Quantity</label>
												<input type="number" class="form-control" value="6029">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
											 <label>Price</label>
												<input type="number" class="form-control" value="6029">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
											 <label>Total</label>
												<input type="number" class="form-control" value="6029">
											</div>
										</div>
									</div>
                                </div>
                                <hr>
                                <div class="card-body pt-0">
                                    <div class="form-group mb-0  text-right">
                                        <button type="submit" class="btn btn-success waves-effect waves-light">Buy</button>
                                        <button type="submit" class="btn btn-dark waves-effect waves-light">Cancel</button>
                                    </div>
                                </div>
                            </form>

						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
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