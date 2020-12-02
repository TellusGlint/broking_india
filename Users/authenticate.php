<?php
if(!isset($_SESSION)) {session_start();}
include('includes/db.php'); 
include('includes/functions.php');
   if(isset($_POST['submit']))
{	
	$email = mysqli_real_escape_string($bd,$_POST['email']);	
	$fname = mysqli_real_escape_string($bd,$_POST['fname']);
	$lname = mysqli_real_escape_string($bd,$_POST['lname']);
	$address = mysqli_real_escape_string($bd,$_POST['address']);
	$phone = mysqli_real_escape_string($bd,$_POST['phone']);
	$password = mysqli_real_escape_string($bd,$_POST['password']);
	//Password Hash
	$pwd = password_hash($password, PASSWORD_DEFAULT);
	date_default_timezone_set("Asia/Kolkata");
	$date=date("d-m-y h:i:s");
	$time=time();
	$query = mysqli_query($bd, "select email from users where email='".$email."'");
	$query1 = mysqli_query($bd, "select phone from users where phone='".$phone."'");
	$to = $email;
	$subject = "Broking India User Password";
	$txt = "Hello Thanks For your Registration Password='".$password."'";
	$headers = "From: guruprasad@tellusglint.com" . "\r\n" .
	"CC: hr@tellusglint.com";
	mail($to,$subject,$txt,$headers);
	if(mysqli_num_rows($query) > 0)
	{
		header('Location: registration.php?email=false');	 
	}
	elseif(mysqli_num_rows($query1) > 0)
	{
		header('Location: registration.php?phone=false');					
	}	
	else 
	{
	$exe="insert into users(email,fname,lname,address,phone,password,role,balance,time) 
	values('$email','$fname','$lname','$address','$phone','$pwd','user','1000000','$time')";
	if(mysqli_query($bd, $exe))
	{
		header('Location: index.php?login=true');
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
$v1 = "FirstUser";
$v2 = "MyPassword";
$tbl_name	= "users"; // Table name
$myusername = $_POST['email'];
$mypassword = $_POST['password'];
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysqli_real_escape_string($bd, $myusername);
$mypassword = mysqli_real_escape_string($bd, $mypassword);
//$mypassword = passCrypt($mypassword);
if($myusername && $mypassword)
{
		//$sql="SELECT * FROM $tbl_name WHERE email='".$myusername."' and password='".$mypassword."'";
		$result	=	mysqli_query($bd, "SELECT * FROM $tbl_name WHERE email='$myusername'");
		$row	= 	mysqli_fetch_array($result,MYSQLI_ASSOC);
		$count	=	mysqli_num_rows($result);
		$pwd = mysqli_query($bd, "SELECT password FROM $tbl_name WHERE email='".$myusername."'");
		$pas = mysqli_fetch_array($pwd,MYSQLI_ASSOC);
		$pass=$pas['password'];
		$time=time();
		if($count==1)
		{		
			if(password_verify($mypassword, $pass))
			{	
					$_SESSION['1user'] 			= $row['email'];
					$_SESSION['start'] 			= time();
					$_SESSION['expire'] 		= $_SESSION['start'] + (30 * 60);
					$_SESSION['email']			= $row['email'];
					$_SESSION['fname']			= $row['fname'];
					$_SESSION['balance']		= $row['balance'];
					mysqli_query($bd, "UPDATE users SET time = '".$time."' WHERE email = '".$myusername."'");
					header("location:dashboard.php");
			}
			else
			{
				header('Location: index.php?login=false');
			}
		}
		
		if($count==0) 
		{
		header('Location: index.php?login=false');
		}
}				
else
{
	echo "Username and Password are mandatory";
}	
}

//Email Check
   if(isset($_POST['submit_email']))
{
	$email = $_POST['email'];
	$result	=	mysqli_query($bd, "SELECT * FROM users WHERE email='$email'");
	$row	= 	mysqli_fetch_array($result,MYSQLI_ASSOC);
	$count	=	mysqli_num_rows($result);
	if($count==1)
		{
					$_SESSION['1user'] 			= $row['email'];
					$_SESSION['start'] 			= time();
					$_SESSION['expire'] 		= $_SESSION['start'] + (30 * 60);
					$_SESSION['email']			= $row['email'];			
					header("location:password-change.php");
			}
	else
		{
				header('Location: forgot-password.php?email=false');
		}
			
}


//Password Change
if(isset($_POST['submit_password']))
{
$email = $_POST['email'];
$password = $_POST['password'];
$email = stripslashes($email);
$password = stripslashes($password);
$email = mysqli_real_escape_string($bd, $email);
$password = mysqli_real_escape_string($bd, $password);
$pwd = password_hash($password, PASSWORD_DEFAULT);
if($email && $password)
{		
		if(mysqli_query($bd, "UPDATE users SET password = '".$pwd."' WHERE email = '".$email."'"))
		{
			$to = $email;
			$subject = "Broking India User Password";
			$txt = "Password Succesfully changed Password='".$password."'";
			$headers = "From: guruprasad@tellusglint.com" . "\r\n" .
			"CC: hr@tellusglint.com";
			mail($to,$subject,$txt,$headers);
				header('Location: index.php?change=true');		
		} 
		else
		{
				header('Location: index.php?change=false');
		}
}
}

// Buy Stock
   if(isset($_POST['submit_buy']))
{
$stock_symbol = mysqli_real_escape_string($bd,$_POST['st_symbol']);	
$stock_price = mysqli_real_escape_string($bd,$_POST['st_price']);
$stock_qty = mysqli_real_escape_string($bd,$_POST['st_qty']);
$stock_tprice = mysqli_real_escape_string($bd,$_POST['st_total']);
$user_id = $_SESSION['email'];
date_default_timezone_set("Asia/Kolkata");
$stock_date=date("d-m-y h:i:s");
$balance = $_SESSION['balance'];
$stock_balance = $balance - $stock_tprice;
	
$sql="insert into user_stock(stock_type,stock_symbol,stock_price,stock_qty,stock_tprice,stock_date,user_id) 
values('BUY','$stock_symbol','$stock_price','$stock_qty','$stock_tprice','$stock_date','$user_id')";
$sqlu="update users set balance='$stock_balance' where email='$user_id'";


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
$user_id = $_SESSION['email'];
date_default_timezone_set("Asia/Kolkata");
$stock_date=date("d-m-y h:i:s");
$balance = $_SESSION['balance'];
$stock_balance = $balance + $stock_tprice;
	
$sql="insert into user_stock(stock_type,stock_symbol,stock_price,stock_qty,stock_tprice,stock_date,user_id) 
values('SELL','$stock_symbol','$stock_price','$stock_qty','$stock_tprice','$stock_date','$user_id')";
$sqlu="update users set balance='$stock_balance' where email='$user_id'";


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
$fname = mysqli_real_escape_string($bd,$_POST['fname']);
$lname = mysqli_real_escape_string($bd,$_POST['lname']);
$email = mysqli_real_escape_string($bd,$_POST['email']);
$phone = mysqli_real_escape_string($bd,$_POST['phone']);
$address = mysqli_real_escape_string($bd,$_POST['address']);
//$reg_pincode = mysqli_real_escape_string($bd,$_POST['reg_pincode']);
$user_id = $_SESSION['email'];
$query= "select * from users where email = '$user_id'";
$arr = mysqli_query($bd, $query);
$count	=	mysqli_num_rows($arr);
$row	= 	mysqli_fetch_array($arr,MYSQLI_ASSOC);
if($count==1)
{
	
if (!empty($_FILES["photo"]["name"])) {

    $photo = $_FILES["photo"]["name"];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $error = $_FILES['photo']['error'];

    if (!empty($photo)) {
        $location = 'doc/';

        if  (move_uploaded_file($tmp_name, $location.$photo)){
            //echo 'Uploaded';
        }

    } 
}
else
{
	$photo = $row['photo'];
}
date_default_timezone_set("Asia/Kolkata");
$stock_date=date("d-m-y h:i:s");	

$sqlu="update users set fname='$fname',lname='$lname', email='$email', phone='$phone', address='$address',
 photo='$photo'  where email='$user_id'";


if( mysqli_query($bd, $sqlu)){
header('Location: profile.php?insert=true');
} 
else{
    echo "ERROR: Could not able to execute $sqlu" . mysqli_error($bd);
}	
}
}
?>