<?php
function SlicedDate($dates,$Mformat='m')
{
	// $Mformat  options 
	/*****************************************************************************************************
	F 	A full textual representation of a month								  		January - December
	M 	A short textual representation of a month, three letters 								 Jan - Dec
	m 	Numeric representation of a month, with leading zeros 								 	   01 - 12
	n 	Numeric representation of a month, without leading zeros 									1 - 12
	******************************************************************************************************/
	$mysql_date 		= date('Y-m-d', strtotime($dates));
	$date_arr			= explode("-", $mysql_date);
	$month				= date($Mformat,mktime(0,0,0,$date_arr[1],1,2000));
	$Formatted['Day']	= $date_arr[2];
	$Formatted['Month']	= $month;
	$Formatted['Year']	= $date_arr[0];
	return $Formatted;
}

function otpmail()
{
require '../PHPMailer/class.phpmailer.php';
try {
	$mail = new PHPMailer(true); //New instance, with exceptions enabled
	$body             = "Dear <strong>$username</strong>,<br /><br />".
						"Here is Your One Time Password : <br /><br />".
						"<strong>$vercode</strong><br /><br />".
						"Best Regards,<br />".
						"FilemyITr";
	$body             = preg_replace('/\\\\/','', $body); //Strip backslashes
	$mail->IsSMTP();                           // tell the class to use SMTP
	$mail->SMTPAuth   = true; 
	$mail->SMTPKeepAlive = true;	// enable SMTP authentication
	$mail->Port       = 25;                    // set the SMTP server port
	$mail->Host       = "mail.filemyitr.co.in"; // SMTP server
	$mail->Username   = "payment@filemyitr.co.in";     // SMTP server username
	$mail->Password   = "FilemyITr@2018";            // SMTP server password
	$mail->IsSendmail();  // tell the class to use Sendmail
	$mail->AddReplyTo("payment@filemyitr.co.in","FilemyITr");
	$mail->From       = "payment@filemyitr.co.in";
	$mail->FromName   = "FilemyITr";
	$to = $_POST['email'];
	$mail->AddAddress($to);
	$mail->Subject  = "OTP to login at FilemyItr";
	$mail->AltBody    = ""; // optional, comment out and test
	$mail->WordWrap   = 80; // set word wrap
	$mail->MsgHTML($body);
	$mail->IsHTML(true); // send as HTML
	$mail->Send();
	header('Location: login-otp.php');
} catch (phpmailerException $e) {
	echo $e->errorMessage();
}	

	}
function _generateRandom($length=4)
{
						
						$_rand_src = array(
							array(48,57) //digits
					        //      , array(97,122) //lowercase chars
						//	, array(65,90) //uppercase chars
						);
						srand ((double) microtime() * 1000000);
						$random_string = "";
						
						for($i=0;$i<$length;$i++)
						{
							$i1=rand(0,sizeof($_rand_src)-1);
							$tmp	=	chr(rand($_rand_src[$i1][0],$_rand_src[$i1][1]));
							
							if($tmp	!=	'0' && $tmp	!=	'O' && $tmp	!=	'o' && $tmp	!=	'l' && $tmp	!=	'1')
								$random_string .= $tmp;
							else
								$i--;
						}
						return $random_string;
}


function getMimeType($attachment){
				$nameArray=explode('.',basename($attachment));
				switch(strtolower($nameArray[count($nameArray)-1])){
				case 'jpg':$mimeType='image/jpeg';
				break;
				case 'jpeg':$mimeType='image/jpeg';
				break;
				case 'gif':$mimeType='image/gif';
				break;
				case 'txt':$mimeType='text/plain';
				break;
				case 'pdf':$mimeType='application/pdf';
				break;
				case 'rar';$mimeType='application/rar';
				break;
				case 'html':$mimeType='text/html';
				break;
				case 'zip':$mimeType='application/zip';
				break;
				case 'xml':$mimeType='text/xml';
				break;
				case 'doc':$mimeType='application/word';
				break;
				case 'docx':$mimeType='application/word';
				break;
				case 'xls':$mimeType='application/excel';
				break;
				}
				return $mimeType;
} 


function curPageURL() 
	{
	$isHTTPS = (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on");
	$port = (isset($_SERVER["SERVER_PORT"]) && ((!$isHTTPS && $_SERVER["SERVER_PORT"] != "80") || ($isHTTPS && $_SERVER["SERVER_PORT"] != "443")));
	$port = ($port) ? ':'.$_SERVER["SERVER_PORT"] : '';
	$url = ($isHTTPS ? 'https://' : 'http://').$_SERVER["SERVER_NAME"].$port.$_SERVER["REQUEST_URI"];
	return $url;
	}

function getExtension($str) 
	{
	$i = strrpos($str,".");
	if (!$i) { return ""; }
	$l = strlen($str) - $i;
	$ext = substr($str,$i+1,$l);
	return $ext;
	}
	
function passCrypt($password)
	{
	$salt = '123456789987654321';
	$passLen = strlen($password);	
		if($password && $passLen>2)
		{
		$password_length = strlen($password); // int 8
		$split_at = $password_length / 2; // int 4
		$password_array = str_split($password, $split_at);
		$hash = md5(sha1($password_array[0] . $salt . $password_array[1]));
		return $hash;
		}
	}	

function truncate($str, $length, $trailing='...')
	{
	$length-=mb_strlen($trailing);
	if (mb_strlen($str)> $length)
		{
		return mb_substr($str,0,$length).$trailing;
		}
	else
		{
		$res = $str;
		}
	return $res;
	}
function br2nl($string)
{
    return preg_replace('#<br\s*?/?>#i', "", $string);
}

function br2Space($string)
{
    return preg_replace('#<br\s*?/?>#i', " ", $string);
}

function validateEmailAddress($email) 
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('/@.+\./', $email);
}

?>
