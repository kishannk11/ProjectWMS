<?php
$cid=$_POST['cid'];
$act=$_POST['act'];

include 'wmsdb.php';
echo $cid.$act;




$q="delete from  complaints where complaintid='$cid'";
$r=mysqli_query($con,$q);
if($r)
{

	header('location:mypost.php');

}
else
{
	echo "error";
}




?>