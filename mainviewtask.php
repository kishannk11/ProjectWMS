<!DOCTYPE html>
<!-- saved from url=(0044)http://getbootstrap.com/examples/dashboard/# -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>SWACHH BHARAT</title>

    <!-- Bootstrap core CSS -->
    <link href="./Dashboard Template for Bootstrap_files/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="./Dashboard Template for Bootstrap_files/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./Dashboard Template for Bootstrap_files/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./Dashboard Template for Bootstrap_files/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="wmsadmin.php">e-SWACHH BHARAT MAINTANACE</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="">Dashboard</a></li>
            <li><a href="">Settings</a></li>
            <li><a href="">Profile</a></li>
            <li><a href="index.php">Logout</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="wmsmain.php">Daily task <span class="sr-only">(current)</span></a></li>
            <li><a href="completedtask.php">Completed task</a></li>
            <li><a href="mainpendingtask.php">Pending task</a></li>
          </ul>
        </div>

<!--hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh-->
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          

          <?php
		include 'wmsdb.php';
		$cid=$_REQUEST['id'];
        $q="select wastepic from complaints where complaintid='$cid'";
        $r=mysqli_query($con,$q);	  
		while($row=mysqli_fetch_array($r))
        {
			$wastepicfromdb=$row['wastepic'];
		}
		 echo "<a href='".$wastepicfromdb."'><img src='".$wastepicfromdb."'  class='img-thumbnail' height='100' width='100'></a>";
		?>
<!--hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh-->
		
		
		
		
		<h2 class="sub-header"></h2>     
		<form name="Complaint_form"  role="form" method="post" action="">
          <div class="table-responsive">
            <table class="table table-striped">
              <!--<thead>
                <tr>
                  <th>Complaint No</th>
				  <th>Posted By</th>
                  <th>Date/Time</th>
				  <th>Type of Waste</th>
				  <th>Area</th>
				  <th>City</th>
				  <th>Taluku</th>
				  <th>District</th>
                  <th>Pincode</th>
                  <th>Photo</th>
				  <th>Action</th>
                </tr>
              </thead>
              <tbody>-->
		<?php
		include 'wmsdb.php';
		$cid=$_REQUEST['id'];
		
        $q="select * from complaints where complaintid='$cid'";
        $r=mysqli_query($con,$q);	  
		while($row=mysqli_fetch_array($r))
        {
            $cidfromdb=$row['complaintid'];
			$postedby=$row['postedby'];
			$datefromdb=$row['pastedtime'];
			$wastetype=$row['typeofwaste'];
			$area=$row['area'];
            $city=$row['city'];
			$taluk=$row['taluk'];
			$disti=$row['district'];
			$pincode=$row['pincode'];
            $wastepic=$row['wastepic'];
			//$status=$row['status'];
            		  
					echo "<tr>";
					echo "<td>Complaint no</td>";
					echo "<td>C no:".$cidfromdb."</td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<td>Posted by</td>";
					echo "<td>".$postedby."</td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<td>Time/Date</td>";
					echo "<td>".$datefromdb."</td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<td>type of waste</td>";
					echo "<td>".$wastetype."</td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<td>District</td>";
					echo "<td>".$disti."</td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<td>taluk</td>";
					echo "<td>".$taluk."</td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<td>City/Area</td>";
					echo "<td>".$city."/".$area."</td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<td>Pincode</td>";
					echo "<td>".$pincode."</td>";
					echo "</tr>";
					
					
		}
				
			
		echo "</table>";
		
				
				echo "<button type='submit' class='btn btn-primary' name='mark'>Mark As Complete</button>";
				
				
				mysqli_close($con);
				?>
				</form>
          </div>
		  <?php
		  include 'wmsdb.php';
		  
		  	  if(isset($_POST['mark'])) 
				{
						$q="update complaints set status='completed' where complaintid='$cid'";
						$r=mysqli_query($con,$q);
						if($r)
						{
							echo "<font color=green><br><b>Update successfull</b></font>";
						}
						
						
						
				}
				
			
			
		  
		  
		  ?>
	</div>	
	</div>  
 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./Dashboard Template for Bootstrap_files/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="./Dashboard Template for Bootstrap_files/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="./Dashboard Template for Bootstrap_files/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./Dashboard Template for Bootstrap_files/ie10-viewport-bug-workaround.js"></script>
  

</body></html>