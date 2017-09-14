<?php
session_start();
include_once("db.php");
$pid=$_GET['pid'];


if(isset($_POST['comment']))
{
	$name=strip_tags($_POST['name']);
	$text=strip_tags($_POST['text']);
	$pid=$_GET['pid'];
	
	$name = mysqli_real_escape_string($db,$name);
	$text = mysqli_real_escape_string($db,$text);
	

	
	$sql="INSERT into comments(name,text,compare)VALUE('$name','$text','$pid')"; //Variablen werden zunächst aus der Form übernommen und anschließend in die Datenbank übernommen.
	
	if($name ==""||$text==""){
	echo"Kommentar unvollständig";
	return;
}
mysqli_query($db, $sql);
header("Location: view_post.php?pid=$pid");
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Comment</title>
  </head>
  <body>
  <?php 
  echo"<form action='post_comment.php?pid=$pid' method='post' enctype='multipart/form-data'>";
  echo"<input placeholder='Name' name='name' type='text' autofocus size='48'><br /><br />";
  echo" <textarea placeholder='Text' name='text' rows='10' cols='50'></textarea><br />";
  echo"<input name='comment' type='submit' value='Kommentieren'>";
  ?>
  </body>
</html>