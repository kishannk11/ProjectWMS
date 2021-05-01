
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

    <title>Signin To e-SWACCH BHARAT</title>

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
          <a class="navbar-brand" href="index.php">e-SWACCH BHARAT</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
		
          <form name="login_form" class="navbar-form navbar-right" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control" name="T1">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control" name="T2">
            </div>
            <button type="submit" class="btn btn-success" name="signin">Sign in</button>
            
          </form>
<?php
if(isset($_POST['signin'])) 
{
	include 'wmsdb.php';	
	$flag=0;
	$email=$_POST["T1"];
	$password=$_POST["T2"];
	if(strcmp($email,'admin@gmail.com')==0 && strcmp($password,'admin')==0)
	{
		echo "Hi";
		header('location:wmsadmin.php');
		
	}
	else if(strcmp($email,'main@gmail.com')==0 && strcmp($password,'main')==0)
	{
		header('location:wmsmain.php');
	}
	else{
	$q="select * from users where email='$email'";
	$r=mysqli_query($con,$q);
	
	while($row=mysqli_fetch_array($r))
	{
		$pwdfromdb=$row["password"];
		if(strcmp($pwdfromdb,$password)==0)
		{
			$flag=1;
		}
	}
	if($flag==1)
	{
    $_SESSION["email"]=$email;
    $_SESSION["compid"]="";
		echo"Hi";
		header('location:userhome.php');
	}
	else{
		echo "<script type='text/javascript'> alert('login failed....')</script>";
	}
mysqli_close($con);
}}
?>	
		  
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <!--<div class="jumbotron">-->
       
		<div class="modal-body row">
	    <div class="col-md-9">
    
				<img src="maxresdefault.jpg" class="img-thumbnail" alt="loading...">
	
		</div>
		<div class="col-md-3">
	<form role="form" name="signup_form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">    
            <h3 align="center">Sign-up Here</h3>
			<div class="form-group">
				<label  for="name">Name</label>
				<input type="text" name="T1" placeholder="Name" class="form-control" required="">
			</div>
	
			<div class="form-group">
				<label  for="Address">Address</label>
				<textarea class="form-control" placeholder="Address" rows="5" name="T2" style="resize:none;"></textarea>
			</div>

			<div class="form-group">
				<label  for="email">Email</label>
				<input id="inputEmail" class="form-control" placeholder="Email address" name="T3" required="" autofocus="" type="email">
			</div>

			<div class="form-group">
				<label  for="password">Password</label>
				<input type="password" name="T4" placeholder="Password" class="form-control" required="">
			</div>

			<div class="form-group">
				<label  for="mobile">Mobile no.</label>
				<input type="text" name="T5" placeholder="Mobile No" class="form-control" required="">
			</div>
				<button type="submit" class="btn btn-primary" name="signup">Register</button>
		</form>
  <?php
  if(isset($_POST['signup'])) 
{
	include 'wmsdb.php';
$name=$_POST["T1"];
$address=$_POST["T2"];
$email=$_POST["T3"];
$password=$_POST["T4"];
$mobile=$_POST["T5"];
$found=0;

			$sql="select * from users"; 
			$result=mysqli_query($con,$sql);
			
			while($row=mysqli_fetch_array($result))		
			{
				$emailfromdb=$row['email'];
				
			
				if (strcmp($email,$emailfromdb)==0) 
				{
					$found=1;
					
				}
			}
			if($found==1)
			{
				echo "<b><font color=red>USER EMAIL-ID ALREADY EXIST</font></b>";
				exit(0);
			}
			else
			{
				$q="insert into users values('$name','$address','$email','$password','$mobile')";
				$r=mysqli_query($con,$q);
				if($r)
				{
					echo "<b><font color=green>SUCCESSFULLY REGISTERED</font></b>";
				}
				else{
					echo "<b><font color=red>REGISTRATION FAILED</font></b>";
				}
			}

	mysqli_close($con);	
}
 ?>
</div>
 
</div>

	   
	   
	   
	   
	   

      
    <!--</div>

    <div class="container">
      <!-- Example row of columns 
      <div class="row">
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="http://getbootstrap.com/examples/jumbotron/#" role="button">View details »</a></p>
        </div>
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="http://getbootstrap.com/examples/jumbotron/#" role="button">View details »</a></p>
       </div>
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="http://getbootstrap.com/examples/jumbotron/#" role="button">View details »</a></p>
        </div>
      </div>-->

      <hr>

      <footer>
        <p align="center">© 2020 swachh bharath.</p>
      </footer>
    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./support/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="./support/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./support/ie10-viewport-bug-workaround.js"></script>
  

</body></html>