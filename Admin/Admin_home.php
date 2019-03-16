<?php
session_start();
require_once "../config/dbConnect.php";
require_once "../config/tools.php";
isAuthenticated("../Login.html");
?>
<!DOCTYPE.html>
<html>
<head>
<Title>HOME</Title>
<meta name = "viewport" content = "width=device-width, initial-scale=1" />
 <meta charset = "utf-8" />
 <meta http-equiv="X-UA-Compatible" content ="ie = edge">
 <link rel="stylesheet" type="text/css" href="../css/Customer.css">   
</head>
<body>
<div class="topnavigationbar">
  <a class="active" href="#profile">PROFILE</a>
  <a  href="Admin_users.php">USERS</a>
  <a href="">FEEDBACK</a>
  <a  href="#profile">LOGIN ACTIVITY</a>
  <div class="logout">
			   <?php
				if(isset($_SESSION["control"])){
				?>
				<a href = "../processes/login_and_logout.php?Signout">Signout</a>
				<a>HELLO  <?php print $_SESSION["control"]["Username"];
				?></a>
				<?php
				}
				?>
	</div>
	</div>
</body>
<html/>
