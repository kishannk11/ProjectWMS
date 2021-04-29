

<!DOCTYPE html>
<!-- saved from url=(0044)http://getbootstrap.com/examples/dashboard/# -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>SWACCH BHARAT</title>

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
	
	<script type="text/javascript">
	
	function remove(id)
	{
		document.getElementById("uid").value=id;
		document.f1.submit();
	}
	
	</script
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
          <a class="navbar-brand" href="">e-SWACCH BHARAT ADMIN</a>
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

    <div class="container">
     
				<div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li ><a href="wmsadmin.php">User Post's <span class="sr-only">(current)</span></a></li>
            <li ><a href="admincompletedwork.php">Completed work</a></li>
            <li ><a href="adminpendingwork.php">pending work</a></li>
            <li ><a href="adminignoredpost.php">Ignored post</a></li>
			<li class="active"><a href="registeredusers.php">Registered users</a></li>
			<li><a href="findpincode.php">Find Pincode</a></li>
          </ul>
          
          
        </div>
		
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		
	   	
		
		

          <h1 class="page-header">Registered users of e-SWACCH BHARAT</h1>

       
			<form name="f1"  role="form" method="post" action="removeuser.php">
				
				
				<input type="hidden" name="uid" value=""id="uid">
			
		 
          
            
         
	
	
 
		
 
 
 
         
		  <?php
		 
			include 'wmsdb.php';	
	
			
			$count=0;
			$q="select * from users";
			$r=mysqli_query($con,$q);
			
		$c=mysqli_num_rows($r);
		if($c>0)
		{
		
         echo "<div class='table-responsive'>";
            echo "<table class='table table-striped'>";
              echo "<thead>";
                echo "<tr>";
					 echo "<th>Sl No</th>";
                  echo "<th>Name</th>";
                  echo "<th>Address</th>";
                  echo "<th>Email</th>";
                  echo "<th>Contact no</th>";
                  echo "<th></th>";
                echo "</tr>";
              echo "</thead>";
              echo "<tbody>";
		}    
		
		while($row=mysqli_fetch_array($r))
        {
			$count=$count+1;
            $name=$row["name"];
			$address=$row["address"];
			$email=$row["email"];
			$contact=$row["mobile"];
           
			
			  
		  
               echo "<tr>";
					echo "<td>".$count."</td>";     //url sending......
					          
                    echo "<td>".$name."</td>";
                    echo "<td>".$address."</td>";
                    echo "<td>".$email."</td>";
					 echo "<td>".$contact."</td>";
					 echo "<td><button type='button' id='".$email."'  class='btn btn-primary' name='remove' onclick='remove(this.id);'>Remove</button></td>";
                    
               echo "</tr>";
		
		if($count==0){ echo "<font color=red><b>No users exist</b></font>";}
		
	}

		?>
                </form>
              </tbody>
            </table>
          </div>		<!--  <div class="table-responsive">-->
		 
 </div>

 </div> <!-- close <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">-->
 </div>	<!--  <div class="row">-->
  </div>	<!--<div class="row placeholders"> -->
 
 </div>		<!-- <div class="container-fluid">-->
    

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