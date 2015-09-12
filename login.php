<?php 
	include 'dbconnect.php';
	session_start();
	if(isset($_REQUEST["submit"])){
		if(!strcmp($_REQUEST["form"],"login")){
			$email = $_REQUEST["email"];
			$password = md5($_REQUEST["pwd"]);
			$sql = "SELECT id FROM users where email='$email' and password='$password'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
			    // output data of each row
			    if($row = $result->fetch_assoc()) {
			      $_SESSION["username"] = $row["email"];
			      $_SESSION["id"] = $row["id"];
			      header('Location:  index.php');
			    }
			} else {
			    //echo "0 results";
			}
		} else { //sign up
			echo "signup";
			$email = $_REQUEST["email"];
			$password = md5($_REQUEST["pwd"]);
			$confirm_password = md5($_REQUEST["confirmpwd"]);
			if(!strcmp($password,$confirm_password)){
				$mobile =  $_REQUEST["mobile"];
				$usertype = $_REQUEST["usertype"];
				$sql = 'INSERT INTO users(email, password) VALUES ("' . $email . '", "'. $password . '")';
				if ($conn->query($sql) === TRUE) {
				  	$_SESSION["username"] = $row["email"];
			      	$_SESSION["id"] = $row["id"];
			      	header('Location:  index.php');
				} else {
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}			
		}		
	}	
?>

<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"></link>
	<link rel="stylesheet" type="text/css" href="css/style.css"></link>
	
	<script src="js/jquery-latest.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
</head>
<body>
	<div>
        <div role="tabpanel" class="col-md-4 col-md-offset-4">
		  <ul class="nav nav-tabs" role="tablist">
		    <li role="presentation" class="active"><a href="#login" aria-controls="login" role="tab" data-toggle="tab">Login</a></li>
		    <li role="presentation"><a href="#signup" aria-controls="signup" role="tab" data-toggle="tab">Sign Up</a></li>
		  </ul>
		
		  <!-- Tab panes -->
		  <div class="tab-content">
		    <div role="tabpanel" class="tab-pane active" id="login">				    	
				<div>
					<form class="form-signin" action="login.php" method="post">
						<h2 class="form-signin-heading">Login</h2>								
						<label for="email" class="sr-only">Email ID :</label> 
						<input type="text"  name="email" class="form-control" placeholder="Email ID" autofocus>				
						<label for="pwd" class="sr-only">Password :</label> 
						<input type="password" name="pwd" class="form-control" placeholder="Password" autofocus>
						<br>
						<input type="hidden" name="form" value="login"/>
						<button class="btn btn-lg btn-primary btn-block" id="submit" name="submit" type="submit">Submit</button>
					</form> 
				</div>
		    </div>
		    <div role="tabpanel" class="tab-pane" id="signup">
		    	<div>
					<form class="form-signin" action="login.php" method="post">
						<h2 class="form-signin-heading">Sign Up</h2>
						<label for="email" class="sr-only">Email ID :</label> 
						<input type="text"  name="email" class="form-control" placeholder="Email ID" autofocus>				
						<label for="pwd" class="sr-only">Password :</label> 
						<input type="password" name="pwd" class="form-control" placeholder="Password" autofocus>
						<label for="confirmpwd" class="sr-only">Confirm Password :</label> 
						<input type="password" name="confirmpwd" class="form-control" placeholder="Confirm Password" autofocus>						
						<label for="mobile" class="sr-only">Mobile No. :</label> 
						<input type="text"  name="mobile" class="form-control" placeholder="Mobile No." autofocus>
						<br>
						Login As &nbsp;
						<label class="radio-inline"><input type="radio" name="usertype">Client</label>
						<label class="radio-inline"><input type="radio" name="usertype">Lawyer</label>
						<br>
						<div id="lawyer_details">

						</div>
						<input type="hidden" name="form" value="signup"/>
						<button class="btn btn-lg btn-primary btn-block" id="submit" name="submit" type="submit">Submit</button>
					</form> 
				</div>
		    </div>
		  </div>			
		</div>
	</div>
</body>		