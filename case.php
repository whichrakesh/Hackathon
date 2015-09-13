<?php
    include 'functions.php';
    include 'quikr.php';    
    session_start();
    if(!(isset($_SESSION['id']))){
        header('Location:  login.php');
    }
    if(isset($_GET['case_id'])){
        $case_id = $_GET['case_id'];
    } else {
        $case_id = -1;
    }   
    $customer_id = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Catalogue - Mimity</title>
    <link href="./files/bootstrap.css" rel="stylesheet">
    <link href="./files/font-awesome.min.css" rel="stylesheet">
    <link href="./files/style.css" rel="stylesheet">
<style type="text/css"></style>

</head>
<body>
	<header>
	    <div class="container">
	        <div class="row">

	        	<!-- Logo -->
	            <div class="col-lg-4 col-md-3 hidden-sm hidden-xs">
	            	<div class="well logo">
	            		<a href="http://demo.18maret.com/demo/mimity/v1.2/index.html">
	            			Mimity <span>Online Shop</span>
	            		</a>
	            		<div>Lorem ipsum dolor sit amet.</div>
	            	</div>
	            </div>
	            <!-- End Logo -->

				<!-- Search Form -->
	            <div class="col-lg-5 col-md-5 col-sm-7 col-xs-12">
	            	<div class="well">
	                    <form action="">
	                        <div class="input-group">
	                            <input type="text" class="form-control input-search" placeholder="Enter something to search">
	                            <span class="input-group-btn">
	                                <button class="btn btn-default no-border-left" type="submit"><i class="fa fa-search"></i></button>
	                            </span>
	                        </div>
	                    </form>
	                </div>
	            </div>
	            <!-- End Search Form -->

	            <!-- Shopping Cart List -->
	            <div class="col-lg-3 col-md-4 col-sm-5">
	                <div class="well">
	                    <div class="btn-group btn-group-cart">
	                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="pull-left"><i class="fa fa-shopping-cart icon-cart"></i></span>
                                <span class="pull-left">Shopping Cart: 2 item(s)</span>
                                <span class="pull-right"><i class="fa fa-caret-down"></i></span>
                            </button>
                            <ul class="dropdown-menu cart-content" role="menu">
                                <li>
                                    <a href="http://demo.18maret.com/demo/mimity/v1.2/detail.html">
                                        <b>Penn State College T-Shirt</b>
                                        <span>x1 $528.96</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="http://demo.18maret.com/demo/mimity/v1.2/detail.html">
                                        <b>Live Nation ACDC Gray T-Shirt</b>
                                        <span>x1 $428.96</span>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="http://demo.18maret.com/demo/mimity/v1.2/cart.html">Total: $957.92</a></li>
                            </ul>
	                    </div>
	                </div>
	            </div>
	            <!-- End Shopping Cart List -->
	        </div>
	    </div>
    </header>

	<!-- Navigation -->
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- text logo on mobile view -->
                <a class="navbar-brand visible-xs" href="http://demo.18maret.com/demo/mimity/v1.2/index.html">Mimity Online Shop</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="http://demo.18maret.com/demo/mimity/v1.2/index.html">Home</a></li>
                    <li><a href="./files/search.php" class="active">Catalogue</a></li>
                    <li><a href="http://demo.18maret.com/demo/mimity/v1.2/cart.html">Shopping Cart</a></li>
                    <li><a href="http://demo.18maret.com/demo/mimity/v1.2/checkout.html">Checkout</a></li>
                    <li class="nav-dropdown">
                    	<a href="http://demo.18maret.com/demo/mimity/v1.2/catalogue.html#" class="dropdown-toggle" data-toggle="dropdown">
							Pages <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="http://demo.18maret.com/demo/mimity/v1.2/about.html">About Us</a></li>
							<li><a href="http://demo.18maret.com/demo/mimity/v1.2/contact.html">Contact Us</a></li>
							<li><a href="http://demo.18maret.com/demo/mimity/v1.2/typography.html">Typography</a></li>
							<li><a href="http://demo.18maret.com/demo/mimity/v1.2/detail.html">Product Detail</a></li>
                            <li><a href="http://demo.18maret.com/demo/mimity/v1.2/compare.html">Compare</a></li>
                            <li><a href="http://demo.18maret.com/demo/mimity/v1.2/login.html">Login</a></li>
                            <li><a href="http://demo.18maret.com/demo/mimity/v1.2/register.html">Register</a></li>
						</ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navigation -->

    <div class="container main-container">
        <div class="row">
        	<div class="col-lg-3 col-md-3 col-sm-12">

        		<!-- Categories -->
        		<div class="col-lg-12 col-md-12 col-sm-6">
	        		<div class="no-padding">
	            		<span class="title">CATEGORIES</span>
	            	</div>
					<div id="main_menu">
                        <div class="list-group panel panel-cat">
                            <?php foreach(getCasesOfCustomer($customer_id) as $case) {
                                ?>
                                <a href="?case_id=" +  <?php echo $case->id?>  class="list-group-item"> description</a>
                            <?php }
                            ?>
                        </div>
                    </div>
				</div>
				<!-- End Categories -->
			

        	</div>

        	<div class="clearfix visible-sm"></div>

			<!-- Catalogue -->
        	<div class="col-lg-9 col-md-9 col-sm-12">
        		<div class="col-lg-12 col-sm-12">
            		<span class="title">CHATS</span>
            	</div>
                <?php 
                    $messages = getMessagesForCase($case_id);
                    foreach($messages as $message){
                        $specializationsId = explode(",", $lawyer->specialization);   
                    ?>
                    <div class="col-lg-4 col-sm-4 hero-feature text-center">
                        
                    </div>
                    <?php
                    }
                ?>
	            
	              
				<div class="text-center">
		        	<ul class="pagination catalogue-pagination">
						<li class="disabled"><a>First</a></li>
						<li class="disabled"><a>Prev</a></li>
						<li class="active"><a href="http://demo.18maret.com/demo/mimity/v1.2/catalogue.html#">1</a></li>
						<li><a href="http://demo.18maret.com/demo/mimity/v1.2/catalogue.html#">2</a></li>
						<li><a href="http://demo.18maret.com/demo/mimity/v1.2/catalogue.html#">3</a></li>
						<li><a href="http://demo.18maret.com/demo/mimity/v1.2/catalogue.html#">4</a></li>
						<li><a href="http://demo.18maret.com/demo/mimity/v1.2/catalogue.html#">Next</a></li>
						<li><a href="http://demo.18maret.com/demo/mimity/v1.2/catalogue.html#">Last</a></li>
					</ul>
				</div>
        	</div>
        	<!-- End Catalogue -->


        </div>
	</div>

	<footer>
    	<div class="container">
        	<div class="col-lg-3 col-md-3 col-sm-6">
        		<div class="column">
        			<h4>Information</h4>
        			<ul>
        				<li><a href="http://demo.18maret.com/demo/mimity/v1.2/about.html">About Us</a></li>
        				<li><a href="http://demo.18maret.com/demo/mimity/v1.2/typography.html">Policy Privacy</a></li>
        				<li><a href="http://demo.18maret.com/demo/mimity/v1.2/typography.html">Terms and Conditions</a></li>
        				<li><a href="http://demo.18maret.com/demo/mimity/v1.2/typography.html">Shipping Methods</a></li>
        			</ul>
        		</div>
        	</div>
        	<div class="col-lg-3 col-md-3 col-sm-6">
        		<div class="column">
        			<h4>Categories</h4>
        			<ul>
        				<li><a href="./files/search.php">Cras justo odio</a></li>
        				<li><a href="./files/search.php">Dapibus ac facilisis in</a></li>
        				<li><a href="./files/search.php">Morbi leo risus</a></li>
        				<li><a href="./files/search.php">Porta ac consectetur ac</a></li>
        			</ul>
        		</div>
        	</div>
        	<div class="col-lg-3 col-md-3 col-sm-6">
        		<div class="column">
        			<h4>Customer Service</h4>
        			<ul>
        				<li><a href="http://demo.18maret.com/demo/mimity/v1.2/contact.html">Contact Us</a></li>
        				<li><a href="http://demo.18maret.com/demo/mimity/v1.2/catalogue.html#">YM: cs_</a></li>
        				<li><a href="http://demo.18maret.com/demo/mimity/v1.2/catalogue.html#">Phone: +6281234567891</a></li>
        				<li><a href="http://demo.18maret.com/demo/mimity/v1.2/catalogue.html#">Email: cs.domain@domain.tld</a></li>
        			</ul>
        		</div>
        	</div>
        	<div class="col-lg-3 col-md-3 col-sm-6">
        		<div class="column">
        			<h4>Follow Us</h4>
        			<ul class="social">
        				<li><a href="http://demo.18maret.com/demo/mimity/v1.2/catalogue.html#">Google Plus</a></li>
        				<li><a href="http://demo.18maret.com/demo/mimity/v1.2/catalogue.html#">Facebook</a></li>
        				<li><a href="http://demo.18maret.com/demo/mimity/v1.2/catalogue.html#">Twitter</a></li>
        				<li><a href="http://demo.18maret.com/demo/mimity/v1.2/catalogue.html#">RSS Feed</a></li>
        			</ul>
        		</div>
        	</div>
        </div>
        <div class="navbar-inverse text-center copyright">
        	Copyright © 2015 Mimity All right reserved
        </div>
    </footer>

    <a href="http://demo.18maret.com/demo/mimity/v1.2/catalogue.html#top" class="back-top text-center" onclick="$(&#39;body,html&#39;).animate({scrollTop:0},500); return false" style="display: none;">
    	<i class="fa fa-angle-double-up"></i>
    </a>

    <script src="./files/jquery.js"></script>
    <script src="./files/bootstrap.js"></script>
    <script src="./files/jquery.blImageCenter.js"></script>
    <script src="./files/mimity.js"></script>

</body></html>