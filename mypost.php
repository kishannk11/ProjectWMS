
<?php
session_start();

?>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>Signin To SWACHH BHARAT</title>

    <!-- Bootstrap core CSS -->
    <link href="./support/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="./support/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./support/jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./support/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
    function removeh(id)
	{
    document.getElementById("act").value="remove";
    document.getElementById("cid").value=id;
    document.form.submit();
  

	}	
    </script>

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://getbootstrap.com/examples/jumbotron/#">SWACHH BHARAT</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
            <li id="au"><a href="userhome.php">Send Post</a></li>
			<li class="active"><a href="mypost.php">My Post</a></li>
			<li><a href="logout.php">Logout</a></li>
         
			</ul>
		  
        </div><!--/.navbar-collapse -->
		
		
		
		
		
		
   
	  </div>
    </nav>

    <div class="modal-body row">
    	
	    
		<div class="col-md-6">
		
		
		<h4 align="center">My Post's</h4>
		
		<?php

			     $email=$_SESSION['email'];
            include 'wmsdb.php';
            $q="select * from complaints where postedby='$email'";
            $r=mysqli_query($con,$q);
            $count=1;
            ?>
            <div class="table-responsive"> 
              <form  method="post" action="remove.php">  
              <input type="hidden" id="act" name="act" value="">
              <input type="hidden" id="cid" name="cid" value="">       
                    <table class="table">
                        <tr>
                        <?php
                        $ucount=0;
            while($row=mysqli_fetch_array($r))
            {
              
              $cid=$row['complaintid'];
              $area=$row['area'];
              $pincode=$row['pincode'];
              $status=$row['status'];
              $wastepic=$row['wastepic'];
              if($status=="new") { $status="open";}
              echo "<td align='left'>".$count++."</td>";
                         
                          echo "<td align='left'><a href='".$wastepic."'><img src='".$wastepic."' height='100' class='img-thumbnail' width='100'></a></td>";
                          
                          
                          echo "<td align='left'> C no:".$cid."</td>";
                          echo "<td align='left'>".$area."</td>";
                          echo "<td align='left'>".$pincode."</td>";
                          echo "<td align='left'>".$status."</td>";
                          echo "<td align='left'><button id='".$cid."' type='submit' class='btn btn-primary' name='submit' onclick='removeh(this.id);'>Remove</button></td>";
                          //echo "<td align='left'><button id='".$email."' type='submit' class='btn btn-primary' name='submit' onclick='removeh(this.id);'>Remove</button></td>";
                          
                        echo "</tr>";
                          
             $ucount++;         
            }
            echo "</table>";
            if($count==0) { echo "No post's found";}
            
               echo "</div>";   



		?>
		 
	   </div>
	   <div class="col-md-6">
	   	<img src="maxresdefault.jpg" class="img-thumbnail" alt="loading...">
		
		</div>

	   

	 </div>   
	
<?php
if(isset($_POST['complaint'])) 
{
	include 'wmsdb.php';	
	
	$typeofwaste=$_POST["D1"];
	
	$district=$_POST["D2"];
	$taluk=$_POST["D3"];
	$city=$_POST["D4"];
	$area=$_POST["T1"];
	$pincode=$_POST["T2"];
	$img=$_FILES["file"]["name"];
	if($img==NULL) {$img="";}

	$a1=date("d-m-Y");

    date_default_timezone_set("Asia/Calcutta");
    $b1=date("h:i:sa");
    $entereddate=$b1."->".$a1;
    $postedby=$_SESSION["email"];
	$cid="";
	$status="new";

	$q="select complaintid from complaints";
	$r=mysqli_query($con,$q);
	while($row=mysqli_fetch_array($con,$r))
	{
		$cid=$row["complaintid"];
	}
	
	if($cid==NULL) { $cid=1; } else { $cid++; }

	if(!file_exists("user_complaint_photos")) {
        mkdir("user_complaint_photos");
        }

	$img=$_FILES["file"]["name"];
	$s=move_uploaded_file($_FILES["file"]["tmp_name"],"user_complaint_photos/".$_FILES["file"]["name"]);
	if($s)
		{
			$imagepath="user_complaint_photos/".$img;
            $query="insert into complaints values('$cid','$typeofwaste','$district','$taluk','$city','$area','$pincode','$imagepath','$postedby',' $entereddate','$status')";
            $r=mysqli_query($con,$query);
            if($r) { 
            		$_SESSION["compid"]=$cid;
            		echo "<script type='text/javascript'> document.getElementById('s').style.visibility='visible'</script>";
            	
            	 }
            else { echo "<font color='red'><b>Failed to place complaint...Please try again..</b></font>"; }

		}
		else
		{
			echo "<font color='red'><b>Failed to upload pic & place complaint...please try again..</b></font>"; 
		}
	
	mysqli_close();
}

?>

	
		 <hr>

      <footer>
        <p align="center">© 2016 swachh bharath.</p>
      </footer>
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./support/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="./support/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./support/ie10-viewport-bug-workaround.js"></script>
  

</body></html>