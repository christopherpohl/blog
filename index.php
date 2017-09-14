<?php
session_start();
include_once("db.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Blog</title>
  </head>
  <body>
  <?php
  $sql= "SELECT * FROM posts ORDER BY id DESC";    //sucht alle Posts aus der Datenbank herraus und sortiert diese nach ID.
  $res = mysqli_query($db, $sql)or die(mysqli_error($db)); 
  $posts ="";
  
  if(mysqli_num_rows($res) > 0)
  {
	  while($row=mysqli_fetch_assoc($res)){
		  $id = $row['id'];
		  $title = $row['title'];
		  $content = $row['content'];
		  $date = $row['date'];
		  $admin="<div><a href='del_post.php?pid=$id'>Löschen</a>&nbsp;<a href='edit_post.php?pid=$id'>Bearbeiten</a></div>";
		  $posts .="<div><h2><a href='view_post.php?pid=$id'>$title</a></h2><h3>$date</h3><p>$content</p>$admin<hr /></div>"; //Die Posts werden dargestellt.
		  }
		  echo $posts;
  } else
  {echo "Keine Posts vorhanden.";}
  ?>
  <a href='post.php'>Neuer Post</a>
  </body>
</html>