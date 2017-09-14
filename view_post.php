<?php
session_start();
include_once("db.php");
$pid=$_GET['pid'];
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Blog-Post</title>
  </head>
  <body>
  <?php
  $sql_get="SELECT * FROM posts WHERE id=$pid LIMIT 1"; //sucht den Post aus der Datenbank welcher mit der ID übereinstimmt.
  $res= mysqli_query($db,$sql_get);
  if(mysqli_num_rows($res) >0){
 while($row = mysqli_fetch_assoc($res)){
 $title=$row['title'];
  $content=$row['content'];
  echo "<form action='edit_post.php?pid=$pid' method='post' enctype='multipart/form-data'>";
  echo"<input placeholder='Title' name='title' type='text' value='$title' autofocus size='48'><br /><br />"; //Der Post wird dargestellt.
  echo"<textarea placeholder='Content' name='content' rows='20' cols='50'>$content</textarea><br />";
 }
 }
 ?>

 
<?php
 echo"<div><a href='post_comment.php?pid=$pid'>Kommentieren</a><hr /></div>";  //Kommentarfunktion



$sql1="SELECT * FROM comments WHERE compare=$pid ORDER BY cid DESC"; 
$comments ="";
$res1 = mysqli_query($db, $sql1)or die(mysqli_error($db));

if(mysqli_num_rows($res1) > 0)
  { 
	  while($row=mysqli_fetch_assoc($res1)){
		  
		  $cid = $row['cid'];
		  $name = $row['name'];
		  $text = $row['text'];
		  $compare = $row['compare'];
		  $del="<div><a href='del_comment.php?pid2=$cid&pid=$pid'>Löschen</a>&nbsp"; //Kommentare des aktuellen Posts werden dargestellt.
		  $comments .="<div><h2>$name</h2><p>$text</p>$del<hr /></div>";
		  }
		  echo $comments;
  } else
  {echo "Keine Kommentare vorhanden.<hr />";}

?>
<a href='index.php'>Zurück</a>

</body>
</html>