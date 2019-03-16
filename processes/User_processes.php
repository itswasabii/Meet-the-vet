<?php
		//Start a session.
		session_start();
		//mysql database connection.....
		$link = mysqli_connect('localhost','root','','veterinary');
		//Initialize variable.
		$UserID = 'UserID';
		$Firstname = ' ';
		$Lastname = ' ';
		$Username = ' ';
		$email = ' ';
		$Password = ' ';
		$DateOfBirth = ' ';
		$Usertype = ' ';
		$edit_state = false ;
	//Add users process ..
	if(isset($_POST['save']))
	{
		//Variable Declaration..
		$UserID = mysqli_real_escape_string($link ,$_POST['UserID']);
		$Firstname = mysqli_real_escape_string($link ,$_POST['Firstname']);
		$Lastname = mysqli_real_escape_string($link ,$_POST['Lastname']);
		$Username = mysqli_real_escape_string($link,$_POST['Username']);
		$email = mysqli_real_escape_string($link,$_POST['email']);
		$Password = mysqli_real_escape_string($link,$_POST['Password']);
		$DateOfBirth = mysqli_real_escape_string($link,$_POST['DateOfBirth']);
		$Usertype = mysqli_real_escape_string($link ,$_POST['Usertype']);
		//Encrypting the password
		$hash_password=password_hash($Password, PASSWORD_DEFAULT);
		//Inserting into the database.
		$user_insert="INSERT INTO users (Firstname,Lastname,Username,email,Password,DateOfBirth,Usertype) VALUES ('$Firstname','$Lastname','$Username','$email','$hash_password','$dateofbirth','$Usertype')";
		//Executing the sql query
        if($link->query($user_insert)===TRUE)
			{
				//If it inserts into the database
				$_SESSION["msg"] = "User Added Succesfully" ;
				header("Location:  ../Admin/Admin_users.php");
				exit();
			}
	        else
			{
				//If it fails to insert into the database
				$_SESSION["msg"] = "Failed to insert the new user";
				header("Location:  ../Admin/Admin_users.php");
				exit();
			}
	}
	//Update users process.
	if(isset($_POST['edit']))
	{ 
		//Variable Declaration..
		$UserID = mysqli_real_escape_string($link ,$_POST['UserID']);
		$Firstname = mysqli_real_escape_string($link ,$_POST['Firstname']);
		$Lastname = mysqli_real_escape_string($link ,$_POST['Lastname']);
		$Username = mysqli_real_escape_string($link,$_POST['Username']);
		$email = mysqli_real_escape_string($link,$_POST['email']);
		$Password = mysqli_real_escape_string($link,$_POST['Password']);
		$DateOfBirth = mysqli_real_escape_string($link,$_POST['DateOfBirth']);
		$Usertype = mysqli_real_escape_string($link ,$_POST['Usertype']);
		//Encrypting the password.
		$hash_password=password_hash($Password, PASSWORD_DEFAULT);
		//Updating the record.
		$user_update="UPDATE users SET Firstname='$Firstname',Lastname='$Lastname',Username='$Username',email='$email',Password='$hash_password',DateOfBirth='$DateOfBirth',Usertype='$Usertype' WHERE UserID=$UserID";
		//Executing the sql query
        if($link->query($user_update)===TRUE)
			{
				//If it inserts into the database
				$_SESSION["msg"] = "User's details updated succesfully";
				header("Location:  ../Admin/Admin_users.php");
				exit();
			}
	        else
			{
				//If it fails to insert into the database
				$_SESSION["msg"] = "Failed to update the user's  details";
				header("Location:  ../Admin/Admin_users.php");
				exit();
			}
	}
	//Deleting users process.
	if(isset($_GET['del'])){
	$UserID = $_GET['del'];
	mysqli_query($link, "DELETE FROM users WHERE UserID=$UserID");
	$_SESSION['msg'] = "User Deleted Succesfully";
	header("Location:  ../Admin/Admin_users.php");
	exit();
	}
	//Retrieve from the database.
	$results = mysqli_query($link, "SELECT * FROM users");
?>