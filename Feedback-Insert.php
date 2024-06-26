<?php 
require_once("config/connection.php");
?>
<?php
//session_start();

//$sql="Select * from contact";
	//	$result = mysqli_query($conn,$sql);
		
if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(isset($_POST["message"])  )		
		{
			$uid = $_SESSION['userid'];
			$feedback=$_POST["message"];
			$date=date('y-m-d');
			
			
			if($feedback!='')
			{
				$query="insert into feedback(Feedback,Feedback_Date,User_Id)values('".$feedback."','".$date."','".$uid."')";
				//echo $query;
				//die;
		
				$result=mysqli_query($conn, $query);
			
			
			if($result)
				{
				echo "<meta http-equiv='refresh' content='0;url=index.php'>";

				}
			}
		}
		else
		{
			echo "value not set";
		}
}
?>

