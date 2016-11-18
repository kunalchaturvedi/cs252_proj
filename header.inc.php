<?php include ( "connect.inc.php" );
error_reporting(0);
session_start();
$username='';
if (!isset($_SESSION['user_login'])) {

}
else {

$username= $_SESSION["user_login"];
//header("Location: home.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title> CS252 PROJECT</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
	<div class="headermenu">
		<div id="wrapper">
			<div class="logo">
				Event Calendar
	 			<!--<img src=""/> -->
			</div>
			
		
			<div class="search_box">
				<form action="search.php" method="GET" id= "search">
					<input type="text" name="q" size="60" placeholder="Search" />
				</form>
			</div>
			
<?php
if(!$username){
			echo'<div id="menu">
				<a href="#" />Home</a>
				<a href="#" />About</a>
				<a href="#" />Sign In</a>
				<a href="#" />Sign Up</a>

			</div>';
}
else{

		echo'<div id="menu">
				<a href="home.php" />Home</a>
				<a href="'.$username.'" />Profile</a>
				<a href="account_settings.php" />Account Settings</a>
				<a href="logout.php" />Logout</a>

			</div>';

}

?>
