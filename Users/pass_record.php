<?php
//Include database connection
include('includes/db.php');
if($_POST['col1']) {
	$col3 = trim($_POST['col3']);	
	$col1 = trim($_POST['col1']);
	$col2 = trim($_POST['col2']);	
	$num = str_replace(",", "", $col2);
  echo '<div class="text-center bg-info p-3">
    <p class="text-white mb-0 text-left"> Buy '.$col1.' - Price Rs.'.$col2.'</p>
	</div>
	<form class="form-horizontal" action="authenticate.php" method="post" enctype="multipart/form-data">
		<div class="card-body pb-0"> 
		<div class="form-group row">                                       
			<div class="col-sm-12">
				<input name="group4" type="radio" id="customControlValidation2" name="radio-stacked" class="with-gap material-inputs material-inputs radio-col-red"  checked/>
				<label for="customControlValidation2" class="mb-0 mt-2">Market</label>
				<input name="group4" type="radio" id="customControlValidation3" name="radio-stacked" id="limit_price" class="with-gap material-inputs material-inputs radio-col-red" />
				<label for="customControlValidation3" class="mb-0 mt-2">Limit</label>
			</div>										
		</div>
			<div class="form-group row">
				<div class="col-md-4">
					<div class="form-group">
					 <label>Quantity</label>
						<input type="text" class="form-control" value=""  id="st_qty" name="st_qty">
						<input type="hidden" class="form-control" value="'.$col1.'"  id="st_symbol" name="st_symbol">						
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
					 <label>Price</label>
						<input type="text" class="form-control" value="'.$num.'" placeholder="'.$col2.'" id="st_price" name="st_price" readonly>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
					 <label>Total</label>
						<input type="text" class="form-control" value="" id="st_total" placeholder="" name="st_total">
					</div>
				</div>
			</div>
		</div>
		<hr>
		<div class="card-body pt-0">
			<div class="form-group mb-0  text-right">
				<button type="submit" class="btn btn-success waves-effect waves-light" name="submit_buy">Buy</button>
				<button type="button" class="btn btn-light"  data-dismiss="modal">Close</button>
			</div>
		</div>
	</form>';
}
?>
<script>
$(function() {
$("#st_qty, #st_price").on("keyup", sum);
function sum() {
$("#st_total").val($("#st_qty").val() * $("#st_price").val());
}
});
const packing_name = document.getElementById("st_price");
customControlValidation2.addEventListener("change", function(){
  packing_name.readOnly = true; 
  $("#st_price")[0].reset();
});

customControlValidation3.addEventListener("change", function(){
  packing_name.readOnly = false;  
});
</script>

