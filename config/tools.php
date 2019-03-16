<?php
	function isAuthenticated($redirect)
	{
		if(!isset($_SESSION["control"])){
			header("Location: ".$redirect );
			exit();
		}
	}
	?>