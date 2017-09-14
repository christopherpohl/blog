<?php
session_start();
include_once("db.php");


	$pid=$_GET['pid'];
	$sql="DELETE FROM posts WHERE id=$pid"; //sucht Posts mit übergebender Id aus der Datenbank und löscht diese anschließend.
	mysqli_query($db,$sql);
	header("Location:index.php");
	

?>