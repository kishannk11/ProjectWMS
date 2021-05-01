

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
            <li class="active" id="au"><a href="userhome.php">Send Post</a></li>
			<li><a href="mypost.php">My Post</a></li>
			<li><a href="index.php">Logout</a></li>
         
			</ul>
		  
        </div><!--/.navbar-collapse -->
		
		
		
		
		
		
   
	  </div>
    </nav>

    <div class="modal-body row">
    	<div class="col-md-6">
	   	<img src="maxresdefault.jpg" class="img-thumbnail" alt="loading...">
		
		</div>
	    
		<div class="col-md-3">
		
		
		<h4 align="center">Post Waste Information</h4>
		 <form name="login_form"  role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
	
			<div class="form-group">	
			<label  for="Type of Waste">Type of Waste</label>
			<select class="form-control" name="D1">
			    <option value="Aggricultural waste">Aggricultural waste</option>
				<option value="Biological waste">Biological waste</option>
				<option value="Animal waste">Animal waste</option>
				<option value="Medical waste">Medical waste</option>
				<option value="Plastics">Plastics</option>
				<option value="Others">Others</option>
										
			</select>
			</div>
			
			<!--<div class="form-group">	
			<label  for="State">State</label>
			<select class="form-control" name="D2">
			    <option value="Karnataka">Karnataka</option>
				<option value="Kerala">Kerala</option>
				<option value="Tamilnadu">Tamilnadu</option>
				<option value="Gova">Gova</option>
				<option value="Maharastra">Maharastra</option>
				<option value="Andrapradesh">Andrapradesh</option>
										
			</select>
			</div>-->
		
			<div class="form-group">	
			<label  for="District">District</label>
			<select class="form-control" name="D2">
			<?php
			include 'wmsdb.php';
			$q="select DISTINCT district from pincodes";
			$r=mysqli_query($con,$q);
			while($row=mysqli_fetch_array($r))
			{
			    echo "<option value='".$row['district']."'>".$row['district']."</option>";
			}
			?>
				
			</select>
			</div>
		
			<div class="form-group">	
			<label  for="Taluk">Taluk</label>
			<select class="form-control" name="D3">
			    <?php
			include 'wmsdb.php';
			$q="select DISTINCT taluku from pincodes";
			$r=mysqli_query($con,$q);
			while($row=mysqli_fetch_array($r))
			{
			    echo "<option value='".$row['taluku']."'>".$row['taluku']."</option>";
			}
			?>
				
			</select>
			</div>

			<div class="form-group">	
			<label  for="City">City</label>
			<input type="text" name="D4" placeholder="City name..." class="form-control" required="" id="i1" onblur="convert_caps(this.id,this.value);">
			</div>
		
		
			<div class="form-group">
			<label  for="Area">Area </label>
			<input type="text" name="T1" placeholder="Near to..." class="form-control" required="" id="i1" onblur="convert_caps(this.id,this.value);">
			</div>	

			<div class="form-group">
			<label  for="Pincode">Pincode</label>
			<input type="text" name="T2" placeholder="valid pincode..." class="form-control" required="" id="i1" onblur="convert_caps(this.id,this.value);">
			</div>	

			<div class="form-group">
			<label  for="pic of waste">Pic of waste</label>
			<input type="file" name="file" placeholder="Picture of waste..." class="form-control"  id="i2">
			</div>	

			<button type="submit" class="btn btn-primary" name="complaint">OK</button>	
			</form>
	 
	   </div>

	   <div class="col-md-3" style="visibility:hidden;" id="s">
	   
	   	
	   <?php
	echo "<font color='green'><b>Your post successfully placed</b></font>";

	   	?>
		
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
	while($row=mysqli_fetch_array($r))
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
        <p align="center">© 2020 swachh bharath.</p>
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