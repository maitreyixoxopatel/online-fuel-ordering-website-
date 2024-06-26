<?php
session_start();
require_once("config/connection.php");

$d = date("Y-m-d");
$uid = $_SESSION['userid'];
$pid = $_GET['productid'];
$qty = $_GET['qty'];
//	$size=$row['Size']



$sql1 = "select Product_Price from product where Product_Id = '" . $pid . "'";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_array($result1);
$amount = $row1['Product_Price'];

$total = $amount * $qty;
$sql1 = "select * from cart where Product_Id=$pid and User_Id=$uid";

$result1 = mysqli_query($conn, $sql1);
if (mysqli_num_rows($result1) == 1) {
	$row1 = mysqli_fetch_array($result1);

	$q = $row1['Qty'];

	$amt = $row1['Product_Price'];
	$amt = $amt + $total;
	$nq = $q + $qty;
	$sql = "update cart set Qty = $nq , Product_Price = $amt where User_Id = $uid and Product_Id=$pid";
	//echo $sql;
	//die;
} else {
	$sql = "insert into cart(User_Id,Qty,Product_Id,Product_Price,Date)values
	('" . $uid . "','" . $qty . "','" . $pid . "','" . $total . "','" . $d . "')";
}
$result = mysqli_query($conn, $sql);
if ($result) {
	//echo "<meta http-equip='refresh' content='0;url=Cart2.php'>";
	header("location:Cart2.php");
} else {
	echo "Value not set";
}
