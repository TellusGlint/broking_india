<?php

$session 			= time();
$session_expire 		= $session + (1 * 60);
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

        if ($now > $session_expire) 
		{
			unset($_SESSION);
            session_destroy();
			header("location: index.php?session=false");
        }
		else 
		{ //Starting this else one [else1]
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<?php include("modal.php"); ?>
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
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive mt-4">
							<table id="default_order" class="table table-striped table-bordered display">
								<thead>
									<tr>
										<th>Sl No.</th>
										<th>Symbol</th>
										<th>Price</th>
										<th>Qty</th>
										<th>Total</th>										
										<th>Date</th>
										<th></th>										
									</tr>
								</thead>						
								<tbody>
				<?php 
				$query = "select * from user_stock where user_id='".$_SESSION['email']."'";									
				$result=mysqli_query($bd, $query)or die(mysqli_connect_error());
				$cnt=1;
				while($row=mysqli_fetch_array($result))
				{
					$mob = $row['phone'];
				?>	
					<tr>
						<td><?php echo htmlentities($cnt);?></td>
						<td><input type="hidden" name="stock_symbol"><?php echo htmlentities($row['stock_symbol']);?></td>
						<td><input type="hidden" name="stock_price"><?php echo htmlentities($row['stock_price']);?></td>
						<td><input type="hidden" name="stock_qty"><?php echo htmlentities($row['stock_qty']);?></td>
						<td><input type="hidden" name="stock_tprice"><?php echo htmlentities($row['stock_tprice']);?></td>
						<td><input type="hidden" name="stock_date"><?php echo htmlentities($row['stock_date']);?></td>
						<td>
						<?php
						if($row['stock_type'] == 'BUY')
						{
							echo'<button type="submit"
                                        class="btn waves-effect waves-light btn-danger" name="submit_sell"><a href="#register-modal" data-toggle="modal" data-target="#register-modal">SELL</a></button>';
						}
						else
						{
							echo'<button type="submit"
                                        class="btn waves-effect waves-light btn-success" name="submit_buy"><a href="#login-modal" data-toggle="modal" data-target="#login-modal">BUY</a></button>';
						}
						?>								
						</td>
					</tr> 
				<?php  $cnt=$cnt+1;} ?>									
												</tbody>
											</table>
											<?php include("modal.php"); ?>
										</div>
                                    </div> 
									
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
<!-- footer -->
<!-- ============================================================== -->
<?php include("footer.php"); ?> 
<script>  
  $(document).ready(function(){ 
	 $("#table-search").on('click','.btnSelect',function(){ 	 
        var currentRow=$(this).closest("tr");
         var col1=currentRow.find("td:eq(0)").text();
		 var col2=currentRow.find("td:eq(1)").text();
		 var col3=currentRow.find("td:eq(2)").text();
        $.ajax({
            type : 'post',
            url : 'pass_record.php', //Here you will fetch records 
            data :  {col1:col1,col2:col2,col3:col3}, //Pass $id
            success : function(data){
            $('.fetched-data').html(data);//Show fetched data from database
            }
        });
     });
		$("#table-search").on('click','.sellSelect',function(){ 	 
        var currentRow=$(this).closest("tr");
         var cols1=currentRow.find("td:eq(0)").text();
		 var cols2=currentRow.find("td:eq(1)").text();
		 var cols3=currentRow.find("td:eq(2)").text();
        $.ajax({
            type : 'post',
            url : 'sell_record.php', //Here you will fetch records 
            data :  {cols1:cols1,cols2:cols2,cols3:cols3}, //Pass $id
            success : function(data){
            $('.fetched-datas').html(data);//Show fetched data from database
            }
        });
     });
});
</script>

</body>
</html>
<?php
        }
    }
?>