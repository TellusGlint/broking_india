<?phpif(!isset($_SESSION)) 
{
	session_start();
}
include('includes/db.php'); 
include('includes/functions.php');
$_SESSION['1user'] 			= $_SESSION['email'];
$_SESSION['start'] 			= time();
$_SESSION['expire'] 		= $_SESSION['start'] + (1 * 60);
?>