<?php 
require("functions.php");
require_once("db-const.php");

?>

<?php
   

$mysqli=new mysqli('localhost','root','','db_name');
$result=$mysqli->query("SELECT * FROM posts");
?>

<h2>delete posts</h2>
<div style="align-content: center;">
<table>
<thead>
<tr>
 <th>id</th>
<th>title</th>
<th>body</th>
<th colspan="2">action</th>
</tr>
</thead>
<?php
while ($row=$result->fetch_assoc()): 
?>
<tr>   
			<td><?php echo $row['post-id'];  ?></td>
         	<td><?php  echo $row['title'];  ?></td>
         	<td><?php  echo $row['body'];  ?></td>
         	<td><a href="admin-edit-posts.php?edit=<?php  echo $row['id']; ?>"> edit</a></td>
         	<td><a href="admin-delete-posts.php?delete=<?php  echo $row['post-id']; ?>"> delete</a></td>
         	
		</tr>
<?php endwhile;?>


<?php
$mysqli=new mysqli('localhost','root','','db_name');
$id=$_GET["key"];
$qry="delete from posts where post-id=$id";
if (mysqli_query(​$mysqli,​$qry​)==true)
{
      echo "<script> alert('Record Deleted');</script>";
      echo "<script> window.location='admin-delete-posts.php';</script>"​;
}
?>


	</table>
    </div>
	<aside>
	</main>
	<footer>Footer<footer> 
	</body>
    </html>