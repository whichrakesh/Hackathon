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
<style type="text/css"></style></head>
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
                <div class="col-xs-12 product-detail-tab">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class=""><a href="http://demo.18maret.com/demo/mimity/v1.2/detail.html#desc" data-toggle="tab" aria-expanded="false">Description</a></li>
                    <li class="active"><a href="http://demo.18maret.com/demo/mimity/v1.2/detail.html#detail" data-toggle="tab" aria-expanded="true">Detail</a></li>
                    <li class=""><a href="http://demo.18maret.com/demo/mimity/v1.2/detail.html#review" data-toggle="tab" aria-expanded="false">Review</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane" id="desc">
                        <div class="well">
                            <p>Actually this part of clothes is very unique and original. It is a way of self-expression because nowadays making some logo or phrase has become very popular. Obviously the T-shirts are the part of modern culture and they have a great influence on teens because of their freedom and epatage. We are offering you our unique and original products. </p>
                        </div>
                    </div>
                    <div class="tab-pane active" id="detail">
                        <div class="well">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td width="40%">Lorem</td>
                                        <td>Ipsum</td>
                                    </tr>
                                    <tr>
                                        <td>Dolor</td>
                                        <td>Sit Amet</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="review">
                        <div class="well">
                            <div class="media">
                                <a class="pull-left" href="http://demo.18maret.com/demo/mimity/v1.2/detail.html#">
                                    <img class="media-object" alt="64x64" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2NCIgaGVpZ2h0PSI2NCI+PHJlY3Qgd2lkdGg9IjY0IiBoZWlnaHQ9IjY0IiBmaWxsPSIjZWVlIi8+PHRleHQgdGV4dC1hbmNob3I9Im1pZGRsZSIgeD0iMzIiIHk9IjMyIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjEycHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+NjR4NjQ8L3RleHQ+PC9zdmc+">
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                </a>
                                <div class="media-body">
                                    <h5 class="media-heading"><strong>John Thor</strong></h5>
                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                </div>
                            </div>
                            <div class="media">
                                <a class="pull-left" href="http://demo.18maret.com/demo/mimity/v1.2/detail.html#">
                                    <img class="media-object" alt="64x64" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2NCIgaGVpZ2h0PSI2NCI+PHJlY3Qgd2lkdGg9IjY0IiBoZWlnaHQ9IjY0IiBmaWxsPSIjZWVlIi8+PHRleHQgdGV4dC1hbmNob3I9Im1pZGRsZSIgeD0iMzIiIHk9IjMyIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjEycHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+NjR4NjQ8L3RleHQ+PC9zdmc+">
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </a>
                                <div class="media-body">
                                    <h5 class="media-heading"><strong>Michael</strong></h5>
                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                </div>
                            </div>
                            <hr>
                            <h4>Add your review</h4>
                            <p></p>
                            <form role="form">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>1 star</option>
                                        <option>2 stars</option>
                                        <option>3 stars</option>
                                        <option>4 stars</option>
                                        <option>5 stars</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="5" placeholder="Your Review"></textarea>
                                </div>
                                <button type="submit" class="btn btn-default">Submit Review</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>                

            </div>
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