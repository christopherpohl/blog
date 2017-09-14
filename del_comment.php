<?php
session_start();
include_once("db.php");
$pid=$_GET['pid'];


	$pid2=$_GET['pid2'];
	$sql="DELETE FROM comments WHERE cid=$pid2"; //sucht Kommentare mit übergebender Id aus der Datenbank und löscht diese anschließend.
	mysqli_query($db,$sql);
	header("Location:view_post.php?pid=$pid");
	

?>