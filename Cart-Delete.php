<?php
require_once("config/connection.php");

if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$sql = "DELETE FROM cart WHERE Cart_Id='".$id."'";
	$result=mysqli_query($conn,$sql);
}

echo "<meta http-equiv='refresh' content='0;url=cart2.php'>";
?>