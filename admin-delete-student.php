
<?php
$db=mysqli_connect('localhost','root','','db_name');
// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
$id=$_GET['id'];
//$id=2;
$qry="delete from student where id=$id";
/*this is delet quer*/

//}
//mysqli_query(​$db,​$qry​);
if (mysqli_query($db,"delete from student where id='$id'")or die("query is incorrect..."))
{
      echo "<script>window.location='admin-manage-students.php'; alert('Record Deleted')</script>";
   //   echo "<script> window.location='admin-manage-menu.php'</script>"​;
}
?>