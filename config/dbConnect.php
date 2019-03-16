<?php
//Create database connection using previously created constants
//Inserting constants content
require_once"constants.php";
//Create the database connection
$link = new mysqli(HOSTNAME, HOSTUSER, HOSTPASS, DBNAME);
//Verify the Connection
if($link->connect_error)
{
     die("Connection Failed: ". $link->connect_error);
}
else
{
	//print "The connection was successful!!! :-)":
}
?>