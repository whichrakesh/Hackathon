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
			      header('Location:  search.php');
			    }
			} else {
			    //echo "0 results";
			}
		} else { //sign up
			echo "signup";
			$name = $_REQUEST["name"];
			$email = $_REQUEST["email"];
			$password = md5($_REQUEST["pwd"]);
			$confirm_password = md5($_REQUEST["confirmpwd"]);
			if(!strcmp($password,$confirm_password)){
				$mobile =  $_REQUEST["mobile"];
				$usertype = $_REQUEST["usertype"];				
				$sql = 'INSERT INTO users(email, password) VALUES ("' . $email . '", "'. $password . '")';
				if ($conn->query($sql) === TRUE) {
					$sql = 'SELECT id from users WHERE email = "' . $email . '"';
					$result = $conn->query($sql);
					if($row = $result->fetch_assoc()){
						$id = $row['id'];
					}
					echo $id ;
					//$specialization = "1,2";
				  	$_SESSION["username"] = $email;
			      	$_SESSION["id"] = $id;
			      	if(strcmp($usertype,"Lawyer") == 0){
						$council_id = $_REQUEST["council_id"];
						$experience = $_REQUEST["experience"];					
						$photo_url = $_REQUEST["photo_url"];					
						$price_range = $_REQUEST["price_range"];
						$city = $_REQUEST["city"];
						$locality = $_REQUEST["locality"];
						$specialization = $_REQUEST["specialization"];
						$sql = 'INSERT INTO lawyers(id, name, phone, specialization, council_id, experience, photo_url, price_range, city, locality) VALUES 
								(' . $id . ',"' 
									 . $name . '", '
									 . $mobile . ',"'
									 . $specialization . '","'
									 . $council_id . '",'
									 . $experience . ',"'
									 . $photo_url . '",'
									 . $price_range . ',"'
									 . $city . '","'
									 . $locality . '")';
						echo $sql;
						if ($conn->query($sql) === TRUE) {
							header('Location:  search.php');
						}
					} else {
						$sql='INSERT INTO customers(id,name,phone) values (
							'. $id .',"'. $name . '",' . $mobile . 
							')';
						echo $sql;
						if ($conn->query($sql) === TRUE) {
							header('Location:  search.php');
						}
					}			      	
			      	//header('Location:  index.php');
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
						<label for="name" class="sr-only">Name:</label> 
						<input type="text"  name="name" class="form-control" placeholder="Name" autofocus>	
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
						<label class="radio-inline"><input type="radio" name="usertype" value="Client">Client</label>
						<label class="radio-inline"><input type="radio" name="usertype" value="Lawyer">Lawyer</label>						
						<div id="lawyer_details">
							<label for="council_id" class="sr-only">Council Id :</label> 
							<input type="text"  name="council_id" class="form-control" placeholder="Council ID" autofocus>
							<label for="experience" class="sr-only">Experience :</label> 
							<input type="number"  name="experience" class="form-control" placeholder="Experience" autofocus>
							<label for="photo_url" class="sr-only">Photo Url :</label> 
							<input type="text"  name="photo_url" class="form-control" placeholder="Photo Url" autofocus>
							<label for="price_range" class="sr-only">Price Range :</label> 
							<input type="number" min="1" max="5" name="price_range" class="form-control" placeholder="Price Range" autofocus>
							<label for="specialization" class="sr-only">specialization :</label> 
							<input type="text"  name="specialization" class="form-control" placeholder="Specialization" autofocus>
							<label for="city" class="sr-only">City :</label> 
							 <select class="form-control" name="city" id="city">
							    <option>Mumbai</option>
							    <option>Delhi</option>
							    <option>Bangalore</option>
							    <option>Kolkata</option>
							  </select>							
							<label for="locality" class="sr-only">Locality :</label> 
							<select class="form-control" name="locality" id="locality">
							    <option>Powai</option>
							    <option>Bandra East</option>
							    <option>Bandra West</option>
							    <option>Andheri West</option>
							  </select>								
						</div>
						<input type="hidden" name="form" value="signup"/>
						<br>
						<button class="btn btn-lg btn-primary btn-block" id="submit" name="submit" type="submit">Submit</button>
					</form> 
				</div>
		    </div>
		  </div>			
		</div>
	</div>

</body>		
<script>
	$(document).ready(function() {
		$('#lawyer_details').hide();
	    $('input[type=radio][name=usertype]').change(function() {
	    	//alert($("input[name='usertype']:checked").val());
	        if (this.value == 'Lawyer') {
	        	$('#lawyer_details').show();
	        	//$('#lawyer_details').css('visibility','visible');
	        }
	        else if (this.value == 'Client') {
	        	$('#lawyer_details').hide();
	            //$('#lawyer_details').css('visibility','gone');
	        }
	    });
});
</script>