<?php
	//Starting a session
	session_start();
	//Database connection
	require_once"../config/dbConnect.php";
	//SignUp for veterinary officers
		if(isset($_POST["SignUp"]))
		{
			//Variable Declaration.
			$Vet_ID= mysqli_real_escape_string($link, $_POST['Vet_ID']);
			$FirstName= mysqli_real_escape_string($link, $_POST['FirstName']);
			$LastName= mysqli_real_escape_string($link, $_POST['LastName']);
			$Username= mysqli_real_escape_string($link, $_POST['Username']);
			$Password= mysqli_real_escape_string($link, $_POST['Password']);
			$Confirmpassword= mysqli_real_escape_string($link, $_POST['Confirmpassword']);
			$email= mysqli_real_escape_string($link, $_POST['email']);
			$dateofbirth= mysqli_real_escape_string($link, $_POST['dateofbirth']);
			//Password Verification
				if($Password!=$Confirmpassword)
				{
					header("Location:  ../Register/Vet_signup.html");
					exit();
				}
			//Encrypting the password
			$hash_password=password_hash($Password, PASSWORD_DEFAULT);
			//Inserting data into the users table
			//Users table columns= "Firstname,Lastname,Username,email,Password,DateOfBirth,Usertype,Account_Created(TIMESTAMP),Account_Last_Updated(TIMESTAMP)";
			 //$Usertype="Vet";
			 $Vet_insert = "INSERT INTO users (Firstname,Lastname,Username,email,Password,DateOfBirth,Usertype) VALUES ('$FirstName','$LastName','$Username','$email','$hash_password','$dateofbirth','Vet')";
			 //Executing the sql query
			 if($link->query($Vet_insert)===TRUE)
				{
					header("Location:  ../Login.html");
					exit();
				}
			else
				{
					die("Failed to register the new user" .  $link->error);
				}		
		}
		//Register for farmers
		if(isset($_POST["Register"]))
		{
				//Variable Declaration.
				$FirstName= mysqli_real_escape_string($link, $_POST['FirstName']);
				$LastName= mysqli_real_escape_string($link, $_POST['LastName']);
				$Username= mysqli_real_escape_string($link, $_POST['Username']);
				$Password= mysqli_real_escape_string($link, $_POST['Password']);
				$Confirmpassword= mysqli_real_escape_string($link, $_POST['Confirmpassword']);
				$email= mysqli_real_escape_string($link, $_POST['email']);
				$dateofbirth= mysqli_real_escape_string($link, $_POST['dateofbirth']);
				//Password Verification
				if($Password!=$Confirmpassword)
					{
						header("Location:  ../Register/Farmer_signup.html");
						exit();
					}
				//Encrypting the password
				$hash_password=password_hash($Password, PASSWORD_DEFAULT);
				//Inserting data into the users table
				//Users table columns= "Firstname,Lastname,Username,email,Password,DateOfBirth,Usertype,Account_Created(TIMESTAMP),Account_Last_Updated(TIMESTAMP)";
				//$Usertype="Farmer";
				 $farmer_insert = "INSERT INTO users (Firstname,Lastname,Username,email,Password,DateOfBirth,Usertype) VALUES ('$FirstName','$LastName','$Username','$email','$hash_password','$dateofbirth','Farmer')";
				 //Executing the sql query
				 if($link->query($farmer_insert)===TRUE)
					{
						header("Location:  ../Login.html");
						exit();
					}
				else
					{
						die("Failed to register the new user" .  $link->error);
					}		
		}
?>