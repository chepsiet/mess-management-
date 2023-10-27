<?php
$db=mysqli_connect('localhost','root','','db_name');
// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
$id=$_GET['id'];
//$id=2;
$qry="delete from orders where status=1";
/*this is delet quer*/

//}
//mysqli_query(​$db,​$qry​);
if (mysqli_query($db,"delete from orders where status=1")or die("query is incorrect..."))
{
      echo "<script>  alert('Records Deleted'); window.location='admin-manage-orders.php'</script>";
   //   echo "<script> window.location='admin-manage-menu.php'</script>"​;
}
?>