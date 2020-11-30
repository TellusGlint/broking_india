<?php
if(!isset($_SESSION)) {session_start();}
include('includes/db.php'); 
include('includes/functions.php');
   if(isset($_POST['submit']))
{	
	$reg_name = mysqli_real_escape_string($bd,$_POST['reg_name']);	
	$reg_mobile = mysqli_real_escape_string($bd,$_POST['reg_mobile']);
	$reg_email = mysqli_real_escape_string($bd,$_POST['reg_email']);
	$reg_password = mysqli_real_escape_string($bd,$_POST['reg_password']);
	date_default_timezone_set("Asia/Kolkata");
	$reg_date=date("d-m-y h:i:s");	
	$query = mysqli_query($bd, "select reg_email from tbluser where reg_email='".$reg_email."'");
	$query1 = mysqli_query($bd, "select reg_mobile from tbluser where reg_mobile='".$reg_mobile."'");
	if(mysqli_num_rows($query) > 0)
	{
		header('Location: registration.php?email=false');	 
	}
	elseif(mysqli_num_rows($query1) > 0)
	{
		header('Location: registration.php?mobile=false');					
	}	
	else 
	{
	$exe="insert into tbluser(reg_name,reg_email,reg_mobile,reg_password,reg_date,reg_balance) 
	values('$reg_name','$reg_email','$reg_mobile','$reg_password','$reg_date',1000000)";
	if(mysqli_query($bd, $exe))
	{
		header('Location: index.php');
		//Email OTP to Login		
	} 
	else
	{
		echo "ERROR: Could not able to execute $exe " . mysqli_error($bd);
	}		
	}
}

//Login
   if(isset($_POST['submit_login']))
{
$tbl_name	= "tbluser"; // Table name
$myusername = $_POST['log_email'];
$mypassword = $_POST['log_password'];
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysqli_real_escape_string($bd, $myusername);
$mypassword = mysqli_real_escape_string($bd, $mypassword);
//$mypassword = passCrypt($mypassword);
if($myusername && $mypassword)
{
		$sql="SELECT * FROM $tbl_name WHERE reg_email='$myusername' and reg_password='$mypassword'";
		$result	=	mysqli_query($bd, $sql);
		$count	=	mysqli_num_rows($result);
		$row	= 	mysqli_fetch_object($result);
		if($count==1)
			{			
				$_SESSION['reg_email']			= $row->reg_email;
				$_SESSION['reg_name']			= $row->reg_name;
				$_SESSION['reg_balance']		= $row->reg_balance;				
				header("location:dashboard.php");
				}			
		if($count==0) 
		{
	header('Location: login.php?login=false');	
		}
}
else
{
	echo "Username and Password are mandatory";
}	
}
// Buy Stock
   if(isset($_POST['submit_buy']))
{
$stock_symbol = mysqli_real_escape_string($bd,$_POST['st_symbol']);	
$stock_price = mysqli_real_escape_string($bd,$_POST['st_price']);
$stock_qty = mysqli_real_escape_string($bd,$_POST['st_qty']);
$stock_tprice = mysqli_real_escape_string($bd,$_POST['st_total']);
$user_id = $_SESSION['reg_email'];
date_default_timezone_set("Asia/Kolkata");
$stock_date=date("d-m-y h:i:s");
$balance = $_SESSION['reg_balance'];
$stock_balance = $balance - $stock_tprice;
	
$sql="insert into user_stock(stock_type,stock_symbol,stock_price,stock_qty,stock_tprice,stock_date,user_id) 
values('BUY','$stock_symbol','$stock_price','$stock_qty','$stock_tprice','$stock_date','$user_id')";
$sqlu="update tbluser set reg_balance='$stock_balance' where reg_email='$user_id'";


if(mysqli_query($bd, $sql) && mysqli_query($bd, $sqlu)){
header('Location: orders.php');
} 
else{
    echo "ERROR: Could not able to execute $sql , $sqlu" . mysqli_error($bd);
}	
}
// Sell Stock
   if(isset($_POST['submit_sell']))
{
$stock_symbol = mysqli_real_escape_string($bd,$_POST['st_symbol']);	
$stock_price = mysqli_real_escape_string($bd,$_POST['st_price']);
$stock_qty = mysqli_real_escape_string($bd,$_POST['st_qty']);
$stock_tprice = mysqli_real_escape_string($bd,$_POST['st_total']);
$user_id = $_SESSION['reg_email'];
date_default_timezone_set("Asia/Kolkata");
$stock_date=date("d-m-y h:i:s");
$balance = $_SESSION['reg_balance'];
$stock_balance = $balance + $stock_tprice;
	
$sql="insert into user_stock(stock_type,stock_symbol,stock_price,stock_qty,stock_tprice,stock_date,user_id) 
values('SELL','$stock_symbol','$stock_price','$stock_qty','$stock_tprice','$stock_date','$user_id')";
$sqlu="update tbluser set reg_balance='$stock_balance' where reg_email='$user_id'";


if(mysqli_query($bd, $sql) && mysqli_query($bd, $sqlu)){
header('Location: orders.php');
} 
else{
    echo "ERROR: Could not able to execute $sql , $sqlu" . mysqli_error($bd);
}	
}
// Profile
   if(isset($_POST['submit_profile']))
{
$reg_name = mysqli_real_escape_string($bd,$_POST['reg_name']);	
$reg_email = mysqli_real_escape_string($bd,$_POST['reg_email']);
$reg_mobile = mysqli_real_escape_string($bd,$_POST['reg_mobile']);
$reg_address = mysqli_real_escape_string($bd,$_POST['reg_address']);
$reg_pincode = mysqli_real_escape_string($bd,$_POST['reg_pincode']);
$user_id = $_SESSION['reg_email'];
@$query= "select * from tbluser where reg_email = '$user_id'";
$arr = mysqli_query($bd, $query);
$count	=	mysqli_num_rows($arr);
$row	= 	mysqli_fetch_array($arr);
if($count==1)
{
	
if (!empty($_FILES["reg_image"]["name"])) {

    $reg_image = $_FILES["reg_image"]["name"];
    $tmp_name = $_FILES['reg_image']['tmp_name'];
    $error = $_FILES['reg_image']['error'];

    if (!empty($reg_image)) {
        $location = 'doc/';

        if  (move_uploaded_file($tmp_name, $location.$reg_image)){
            //echo 'Uploaded';
        }

    } 
}
else
{
	$reg_image = $row['reg_image'];
}
date_default_timezone_set("Asia/Kolkata");
$stock_date=date("d-m-y h:i:s");	

$sqlu="update tbluser set reg_name='$reg_name', reg_email='$reg_email', reg_mobile='$reg_mobile', reg_address='$reg_address',
reg_pincode='$reg_pincode', reg_image='$reg_image'  where reg_email='$user_id'";


if( mysqli_query($bd, $sqlu)){
header('Location: profile.php?insert=true');
} 
else{
    echo "ERROR: Could not able to execute $sqlu" . mysqli_error($bd);
}	
}
}
?>