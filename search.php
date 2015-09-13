<?php
    include 'functions.php';
    include 'quikr.php';

    $category = $_GET['category'];
    $price_range = $_GET['price_range'];
    $city = $_GET['city'];
    $locality = $_GET['locality'];
    $categories = array("Divorce","Property","Family","Criminal",
        "Matrimonial","HighCourt","Civil","ConsumerCourt","LabourLaw", 
        "CooperativeSociety","LeaveLicenseAgreement","Notary","Corporate","Will","Trademark","Rent");
    $subcategory_id = array_search($_GET['category'], $categories);
    $lawyers_list = getLawyers($subcategory_id, $city, $locality, $price_range);
    $lawyers_listQ = getLawyersQ($_GET['category'], $city, $locality);
    // print_r($lawyers_list);
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
     <link href="./files/style.css" rel="stylesheet">
    <script type="text/javascript" src="./js/jquery-latest.min.js"></script>
<style type="text/css"></style>
<!--Start of Zopim Live Chat Script-->
// <script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="//v2.zopim.com/?3JZTQhap0NApOOlmRqR4MrdYdIjwTfwu";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

// </script>
<!--End of Zopim Live Chat Script-->

</head>
<body>
	<header>
	    <div class="container">
	        <div class="row">

	        	<!-- Logo -->
	            <div class="col-lg-4 col-md-3 hidden-sm hidden-xs">
	            	<div class="well logo">
	            		<a href="http://demo.18maret.com/demo/mimity/v1.2/index.html">
	            			Law <span>Portal</span>
	            		</a>
	            		<div>Find lawyer here</div>
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
                    <li><a href="./case.php">Home</a></li>
                    <li><a href="./search.php" class="active">Search Lawyers</a></li>
                    <li><a href="./wordpress">Law Blog</a></li>
<!--                     <li class="nav-dropdown">
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
                    </li> -->
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
                            <a href="?category=Divorce" class="list-group-item">Divorce Cases</a>
                            <a href="?category=Property" class="list-group-item">Property Cases</a>
                            <a href="?category=Family" class="list-group-item">Family Cases</a>
                            <a href="?category=Criminal" class="list-group-item">Criminal Law</a>
                            <a href="?category=Matrimonial" class="list-group-item">Matrimonial Cases</a>
                            <a href="?category=HighCourt" class="list-group-item">High Court</a>
                            <a href="?category=Civil" class="list-group-item">Civil Lawyers</a>
                            <a href="?category=ConsumerCourt" class="list-group-item">Consumer Court</a>
                            <a href="?category=LabourLaw" class="list-group-item">Labour Law</a>
                            <a href="?category=CooperativeSociety" class="list-group-item">Cooperative Society</a>
                            <a href="?category=LeaveLicenseAgreement" class="list-group-item">Leave License Agreement</a>
                            <a href="?category=Notary" class="list-group-item">Lawyers for Notary</a>
                            <a href="?category=Corporate" class="list-group-item">Corporate Law</a>
                            <a href="?category=Will" class="list-group-item">Lawyers for Will</a>
                            <a href="?category=Trademark" class="list-group-item">Lawyers for Trademark</a>
                            <a href="?category=Rent" class="list-group-item">Lawyers for Rent Matter</a>
                        </div>
                    </div>
				</div>
				<!-- End Categories -->

				
        	</div>

        	<div class="clearfix visible-sm"></div>

			<!-- Catalogue -->
        	<div class="col-lg-9 col-md-9 col-sm-12">
                <form class="col-lg-12 col-sm-12">
                    <span class="title">Filters</span>
                        <label for="locality" class="sr-only">City :</label> 
                        <select class="form-control" name="city" id="city">
                            <option <?php if($_GET["city"] == "Mumbai") echo "selected=\"selected\""; ?>>Mumbai</option>
                            <option <?php if($_GET["city"] == "Delhi") echo "selected=\"selected\""; ?>>Delhi</option>
                            <option <?php if($_GET["city"] == "Bangalore") echo "selected=\"selected\""; ?>>Bangalore</option>
                            <option <?php if($_GET["city"] == "Kolkata") echo "selected=\"selected\""; ?>>Kolkata</option>
                          </select>                         
                        <label for="locality" class="sr-only">Locality :</label> 
                        <select class="form-control" name="locality" id="locality">
                            <option <?php if($_GET["locality"] == "Powai") echo "selected=\"selected\""; ?>>Powai</option>
                            <option <?php if($_GET["locality"] == "Bandra East") echo "selected=\"selected\""; ?>>Bandra East</option>
                            <option <?php if($_GET["locality"] == "Bandra West") echo "selected=\"selected\""; ?>>Bandra West</option>
                            <option <?php if($_GET["locality"] == "Andheri West") echo "selected=\"selected\""; ?>>Andheri West</option>
                        </select> 
                        <label for="locality" class="sr-only">Price Range :</label> 
                        <select class="form-control" name="price_range" id="price_range">
                            <option <?php if($_GET["price_range"] == 1) echo "selected=\"selected\""; ?>value="1">Very Cheap</option>
                            <option <?php if($_GET["price_range"] == 2) echo "selected=\"selected\""; ?>value="2">Cheap</option>
                            <option <?php if($_GET["price_range"] == 3) echo "selected=\"selected\""; ?>value="3">Medium</option>
                            <option <?php if($_GET["price_range"] == 4) echo "selected=\"selected\""; ?>value="4">Costly</option>
                            <option <?php if($_GET["price_range"] == 5) echo "selected=\"selected\""; ?>value="5">Very Costly</option>
                        </select>
                        <input class="btn btn-info" type="submit"></input>                         
                </form>
        		<div class="col-lg-12 col-sm-12">
            		<span class="title">Lawyers</span>
            	</div>
                <?php 
                    foreach($lawyers_list as $lawyer){
                        $specializationsId = explode(",", $lawyer->specialization);   
                    ?>
                    <div class="col-lg-4 col-sm-4 hero-feature text-center">
                        <div class="thumbnail">
                            <center>
                            <img src="<?php if($lawyer->photo_url != null) echo $lawyer->photo_url;?>" name="aboutme" width="140" height="140" border="0" class="img-circle">
                            <h3 class="media-heading"><?=$lawyer->name?>
                                <?php if($lawyer->verified == 1){
                                        echo "<span class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\" style=\"color: green;\"></span>";
                                    }
                                ?>
                            </h3>
                            <span><strong>Specialization: </strong></span>
                                <?php foreach($specializationsId as $id){
                                    echo "<span class=\"label label-success\">".$categories[$id]."</span>\n";
                                    }
                                ?>
                                <br>
                            <span><strong>Rating: </strong></span>
                                <?php 
                                    $ratI = intval($lawyer->ratings);
                                    $ratStr = "<span class=\"product-rating\">";
                                    $i = 1;
                                    for(; $i <= $ratI; $i++){
                                        $ratStr .= "<i class=\"fa fa-star\"></i>"; 
                                    }
                                    if($lawyer->ratings - $ratI != 0) {             
                                        $i ++;                         
                                        $ratStr .= "<i class=\"fa fa-star-half-o\"></i>";  
                                    }                                    
                                    for(; $i <= 5; $i++){
                                        $ratStr .= "<i class=\"fa fa-star-o\"></i>"; 
                                    }                                 
                                    $ratStr .= "</span>";
                                    echo $ratStr;
                                ?>
                                <br> 
                            <span><strong>Experience: </strong><?=$lawyer->experience?> Years</span>  
                            </center>
                        </div>
                    </div>
                    <?php
                    }
                ?>
	            

                <div class="col-lg-12 col-sm-12">
                    <span class="title">Quikr Lawyers</span>
                </div>
                <?php 
                    foreach($lawyers_listQ as $lawyer){
                        $specializationsId = explode(",", $lawyer->specialization);   
                    ?>
                    <div class="col-lg-4 col-sm-4 hero-feature text-center">
                        <div class="thumbnail">
                            <center>
                            <img src="<?php if($lawyer->photo_url != null) echo $lawyer->photo_url;?>" name="aboutme" width="140" height="140" border="0" class="img-circle">
                            <h3 class="media-heading"><?=$lawyer->name?>
                                <?php if($lawyer->verified == 1){
                                        echo "<span class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\" style=\"color: green;\"></span>";
                                    }
                                ?>
                            </h3>
                            <span><strong>Specialization: </strong></span>
                                <?php foreach($specializationsId as $id){
                                    echo "<span class=\"label label-success\">".$categories[$id]."</span>\n";
                                    }
                                ?>
                                <br> 
                            </center>
                        </div>
                    </div>
                    <?php
                    }
                ?>
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