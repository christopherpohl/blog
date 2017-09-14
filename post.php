<?php
session_start();
include_once("db.php");
if(isset($_POST['post']))
{
	$title=strip_tags($_POST['title']);
	$content=strip_tags($_POST['content']);
	
	$title = mysqli_real_escape_string($db,$title);
	$content = mysqli_real_escape_string($db,$content);
	
	$date = date('j. F Y / H:i:s ');
	$sql="INSERT into posts(title,content,date)VALUE('$title','$content','$date')"; //Variablen werden zunächst aus der Form übernommen und anschließend in die Datenbank übernommen.
	
	if($title ==""||$content==""){
	echo"Post unvollständig";
	return;
}
mysqli_query($db, $sql);
header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Blog-Post</title>
  </head>
  <body>
  <form action="post.php" method="post" enctype="multipart/form-data">
  <input placeholder="Title" name="title" type="text" autofocus size="48"><br /><br />
  <textarea placeholder="Content" name="content" rows="20" cols="50"></textarea><br /> 
  <input name="post" type="submit" value="Abschicken">
  </form>
  <a href='index.php'>Zurück</a>
  </body>
</html>