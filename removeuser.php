<?php
$uid=$_POST["uid"];
//echo $uid;
include 'wmsdb.php';
$q="delete from users where email='$uid'";
$r=mysqli_query($con,$q);
if($r)
{
	header('location:registeredusers.php');
	
}
else
{
	echo "failed to delete";
}
?>