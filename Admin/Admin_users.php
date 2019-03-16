<?php
	require_once "../config/dbConnect.php";
	require_once "../config/tools.php";
	include('../processes/User_processes.php'); 
	if(isset($_GET['edit'])){
			$UserID = $_GET['edit'];
			$rec = mysqli_query($link, "SELECT*FROM users WHERE UserID=$UserID");
			$record = mysqli_fetch_array($rec);
			$UserID = $record['UserID'];
			$Firstname = $record['Firstname'];
			$Lastname = $record['Lastname'];
			$Username = $record['Username'];
			$email = $record['email'];
			$Password = $record['Password'];
			$DateOfBirth = $record['DateOfBirth'];
			$Usertype = $record['Usertype'];
		}
?>
<!DOCTYPE.html>
<html>
<head>
<Title>USERS</Title>
<meta name = "viewport" content = "width=device-width, initial-scale=1" />
 <meta charset = "utf-8" />
 <meta http-equiv="X-UA-Compatible" content ="ie = edge">
 <link rel="stylesheet" type="text/css" href="../css/manage.css">   
</head>
<body>
<div class="topnavigationbar">
  <a class="active" href="#profile">PROFILE</a>
  <a  href="">USERS</a>
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
	<?php if (isset($_SESSION["msg"])): ?>
		<div class = "msg">
			<?php
					echo $_SESSION["msg"];
					unset ($_SESSION["msg"]);
			?>
			</div>
	<?php endif ?>
	<center><a class="del_btn" href="Admin_users.php">Refresh</a></center>
	<table>
	 <thead>
	 <th>Firstname</th>
	 <th>Lastname</th>
	 <th>Username</th>
	 <th>Email Address</th>
	 <th>Usertype</th>
	 </thead>
	 <tbody>
		<?php while ($row = mysqli_fetch_array($results)){?>
			 <tr>
			<td><?php echo $row['Firstname']; ?></td>
			<td><?php echo $row['Lastname']; ?></td>
			<td><?php echo $row['Username']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['Usertype']; ?></td>
			<td>
					<button onclick="document.getElementById('modal-wrapper').style.display='block'" style=" text-decoration: none; padding: 2px 5px; background: #2E8B57; color: white;border-radius: 3px;" href="Admin_users.php?edit=<?php echo $row['UserID']; ?>" onclick="document.getElementById('modal-wrapper').style.display='block'">Edit</button>
					<td>
			</td>
	   </tr>
		<?php } ?>
	 </tbody>
	</table>
	<div id="modal-wrapper" class="modal">
					<form class="modal-content animate" action="../processes/User_processes.php" method="POST" autocomplete="OFF"> 
					<div class="imgcontainer">
					  <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close">&times;</span>
					  <img src="../img/avatar.png" alt="Avatar" class="avatar">
					</div>
					<div class="container">
						<input type="hidden" name="UserID" value="<?php echo $UserID;?>">
						<p>First Name</p>
						<input type="text" name="Firstname" value="<?php echo $Firstname; ?>">
						<p>Last Name</p>
						<input type="text" name="Lastname" value="<?php echo $Lastname; ?>">
						<p>Username</p>
						<input type="text" name="Username" value="<?php echo $Username; ?>">
						<p>Email Address</p>
						<input type="email" name="email" value="<?php echo $email; ?>">
						<p>Usertype</p>
						<select name="Usertype" value="<?php echo $Usertype; ?>">
						  <option value="Admin" >Admin</option>
						  <option value="Farmer" >Farmer</option>
						  <option value="Vet" >Vet</option>
						</select> 
					  <button type="submit" name="edit">UPDATE</button>
					</div>
					</form>
					</div>	
					</td>
</body>
<html/>
