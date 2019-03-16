<?php
        //Starting a session service.
		session_start();
		//import the database connection.
		require_once "../config/dbConnect.php";
		//Signin process 
		if(isset($_POST["Login"]))
		{
			//variable declaration
			$entered_email = mysqli_real_escape_string($link, $_POST['email']);
			$entered_password = mysqli_real_escape_string($link, $_POST['Password']);
			//Verify if the username matches any username in the database.
			$spot_username = "SELECT * FROM users WHERE email = '$entered_email' LIMIT 1";
			//executing the sql query.
			$uName_res = $link-> query($spot_username);
			//Count the matching row.
			if($uName_res-> num_rows > 0)
					{
							//Create a session.
							$_SESSION["control"] = $uName_res->fetch_assoc();
							//Use the session to fetch the stored password.
							$stored_password = $_SESSION["control"]["Password"];
							//Verify if the entered password is identical to the stored password.
							if(password_verify($entered_password, $stored_password))//Password verification success
							{
								//if the user is an admin, he is redirected to the Admin Home page 
								 if($_SESSION["control"]["Usertype"] == "Admin"){
									header("Location: ../Admin/Admin_Home.php");
									exit();
								}
								//if the user is an editor, he is redirected to the editors home page
								  else if($_SESSION["control"]["Usertype"] == "Farmer"){
									header("Location: ../Farmer/Farmer_home.php");
									exit();
								}
								   //if the user is an editor, he is redirected to the editors home page
								   else if($_SESSION["control"]["Usertype"] == "Vet"){
									header("Location: ../Vet/Vet_home.php");
									exit();
								}
							}
							else//Password verification failure
							{
								//Else destroy the session and redirect back to the login page
								unset($_SESSION["control"]);
								header("Location: ../Login.html");
								exit();
							}
			    }
        }
		//Signout process.
					if(isset($_GET["Signout"]))
					{
								//Destroy session and redirect back to the login page
								unset($_SESSION["control"]);
								header("Location: ../Login.html");
								exit();
					}
?>
