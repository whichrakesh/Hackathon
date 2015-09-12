

<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"></link>
	<link rel="stylesheet" type="text/css" href="css/style.css"></link>
	
	<script src="js/jquery-latest.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
<head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    	<div class="container">    		
        	<div class="navbar-header " >
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="#">LawyerDhundo</a>
	        </div>
	        <form action="mainServlet" method="post">
	        <div id="navbar" class="collapse navbar-collapse">
	          <ul class="nav navbar-nav navbar-right">
	          	<li class="active"><a href="#">Home</a></li>
	          	 <li><a href="#about">About</a></li>
	          	<?php 	          		
					if(isset($_SESSION["username"])){
				?> 
						<li class="dropdown">
			              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <?php echo($_SESSION["username"]); ?> <span class="caret"></span></a>
			              
				              <ul class="dropdown-menu" role="menu">
				                	<li><a href="busRegistry.jsp">Bus registry</a></li>			                			                													                					
									<li><a href="#" onclick="$(this).closest('form').submit()">Sign out</a></li>								
									<input type="hidden" name="pageid" VALUE="logout">																							
				              </ul>			           
			            </li>	
				<?php	} else { ?>
						<li><a href='#' data-toggle="modal" data-target="#LoginModal">Login/Sign Up</a></li>								
				<?php 
					}
				?>			            					           
	          </ul>
	        </div><!--/.nav-collapse -->
	        </form>
	    </div>
	</div>		
</body>
</html>