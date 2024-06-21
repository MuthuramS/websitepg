<?php

require('config.php');

if (isset($_GET['product_id'])) {
    $productID = $_GET['product_id'];
    if (!empty($productID)) {
        $sql = "SELECT * FROM intrested_properties AS ip LEFT JOIN 
                locations AS loc ON ip.locality = loc.loc_id  
                WHERE ip.prpt_id = $productID AND ip.prpt_sts = 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // print_r($results);

        $location = $results[0]['location'];
        $inters = "SELECT * FROM intrested_properties AS ip LEFT JOIN 
                locations AS loc ON ip.locality = loc.loc_id  
                WHERE ip.prpt_sts = 1 AND loc.location = '$location' ";
        $stmt1 = $conn->prepare($inters);
        $stmt1->execute();
        $intprop = $stmt1->fetchAll(PDO::FETCH_ASSOC);
    }
}

function formatCurrency($number)
{
    if ($number < 10000000) {
        // Less than 1 crore, format in lakhs
        $formatted = number_format($number / 100000, 1) . 'L';
    } else {
        // 1 crore or more, format in crores
        $formatted = number_format($number / 10000000, 2) . 'Cr';
    }
    return $formatted;
}

?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Quarter - Real Estate HTML Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Place favicon.png in the root directory -->
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon" />
    <!-- Font Icons css -->
    <link rel="stylesheet" href="css/font-icons.css">
    <!-- plugins css -->
    <link rel="stylesheet" href="css/plugins.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
</head>
<style>
    .widget {
        padding: 35px 30px 40px 35px;
        border: 2px solid var(--border-color-11);
        background-color: #fff;
        z-index: 100;
        transition: all 0.3s ease;
    }

    .sticky {
        position: fixed;
        top: 70px;
        /* Adjust this value as per your design */
        z-index: 100;
        /* Adjust as necessary depending on your layout */
        width: 350px;
        height: 555px;
        box-sizing: border-box;
        padding: 35px 30px 40px 35px;
        background-color: #fff;
        /* border-radius: 0;  */
        bottom: 20px;
        box-shadow: 0 0 1px rgba(0, 0, 0, 0.1);
        /* margin-bottom: 50px; */
    }

    @media (max-width: 767px) {
        .widget {
            /* position: static;  */
            box-shadow: none;
            width: 100%;
        }
    }
</style>

<body>
    <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    <!-- Add your site or application content here -->

    <!-- Body main wrapper start -->
    <div class="body-wrapper">

        <!-- HEADER AREA START (header-5) -->
        <header class="ltn__header-area ltn__header-5 ltn__header-transparent--- gradient-color-4---">
            <!-- ltn__header-top-area start -->
            <?php
            include('./header.php');
            ?>
        </header>
        <!-- HEADER AREA END -->

        <!-- Utilize Cart Menu Start -->
        <div id="ltn__utilize-cart-menu" class="ltn__utilize ltn__utilize-cart-menu">
            <div class="ltn__utilize-menu-inner ltn__scrollbar">
                <div class="ltn__utilize-menu-head">
                    <span class="ltn__utilize-menu-title">Cart</span>
                    <button class="ltn__utilize-close">×</button>
                </div>
                <div class="mini-cart-product-area ltn__scrollbar">
                    <div class="mini-cart-item clearfix">
                        <div class="mini-cart-img">
                            <a href="#"><img src="img/product/1.png" alt="Image"></a>
                            <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                        </div>
                        <div class="mini-cart-info">
                            <h6><a href="#">Wheel Bearing Retainer</a></h6>
                            <span class="mini-cart-quantity">1 x $65.00</span>
                        </div>
                    </div>
                    <div class="mini-cart-item clearfix">
                        <div class="mini-cart-img">
                            <a href="#"><img src="img/product/2.png" alt="Image"></a>
                            <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                        </div>
                        <div class="mini-cart-info">
                            <h6><a href="#">3 Rooms Manhattan</a></h6>
                            <span class="mini-cart-quantity">1 x $85.00</span>
                        </div>
                    </div>
                    <div class="mini-cart-item clearfix">
                        <div class="mini-cart-img">
                            <a href="#"><img src="img/product/3.png" alt="Image"></a>
                            <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                        </div>
                        <div class="mini-cart-info">
                            <h6><a href="#">OE Replica Wheels</a></h6>
                            <span class="mini-cart-quantity">1 x $92.00</span>
                        </div>
                    </div>
                    <div class="mini-cart-item clearfix">
                        <div class="mini-cart-img">
                            <a href="#"><img src="img/product/4.png" alt="Image"></a>
                            <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                        </div>
                        <div class="mini-cart-info">
                            <h6><a href="#">Shock Mount Insulator</a></h6>
                            <span class="mini-cart-quantity">1 x $68.00</span>
                        </div>
                    </div>
                </div>
                <div class="mini-cart-footer">
                    <div class="mini-cart-sub-total">
                        <h5>Subtotal: <span>$310.00</span></h5>
                    </div>
                    <div class="btn-wrapper">
                        <a href="cart.html" class="theme-btn-1 btn btn-effect-1">View Cart</a>
                        <a href="cart.html" class="theme-btn-2 btn btn-effect-2">Checkout</a>
                    </div>
                    <p>Free Shipping on All Orders Over $100!</p>
                </div>

            </div>
        </div>
        <!-- Utilize Cart Menu End -->

        <!-- Utilize Mobile Menu Start -->
        <div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
            <div class="ltn__utilize-menu-inner ltn__scrollbar">
                <div class="ltn__utilize-menu-head">
                    <div class="site-logo">
                        <a href="index.html"><img src="img/logo.png" alt="Logo"></a>
                    </div>
                    <button class="ltn__utilize-close">×</button>
                </div>
                <div class="ltn__utilize-menu-search-form">
                    <form action="#">
                        <input type="text" placeholder="Search...">
                        <button><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <div class="ltn__utilize-menu">
                    <ul>
                        <li><a href="#">Home</a>
                            <ul class="sub-menu">
                                <li><a href="index.html">Home Style 01</a></li>
                                <li><a href="index-2.html">Home Style 02</a></li>
                                <li><a href="index-3.html">Home Style 03</a></li>
                                <li><a href="index-4.html">Home Style 04</a></li>
                                <li><a href="index-5.html">Home Style 05 <span class="menu-item-badge">video</span></a></li>
                                <li><a href="index-6.html">Home Style 06</a></li>
                                <li><a href="index-7.html">Home Style 07</a></li>
                                <li><a href="index-8.html">Home Style 08</a></li>
                                <li><a href="index-9.html">Home Style 09</a></li>
                                <li><a href="index-10.html">Home Style 10 <span class="menu-item-badge">Map</span></a></li>
                                <li><a href="index-11.html">Home Style 11</a></li>
                            </ul>
                        </li>
                        <li><a href="#">About</a>
                            <ul class="sub-menu">
                                <li><a href="about.html">About</a></li>
                                <li><a href="service.html">Services</a></li>
                                <li><a href="service-details.html">Service Details</a></li>
                                <li><a href="portfolio.html">Portfolio</a></li>
                                <li><a href="portfolio-2.html">Portfolio - 02</a></li>
                                <li><a href="portfolio-details.html">Portfolio Details</a></li>
                                <li><a href="team.html">Team</a></li>
                                <li><a href="team-details.html">Team Details</a></li>
                                <li><a href="faq.html">FAQ</a></li>
                                <li><a href="locations.html">Google Map Locations</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Shop</a>
                            <ul class="sub-menu">
                                <li><a href="shop.html">Shop</a></li>
                                <li><a href="shop-grid.html">Shop Grid</a></li>
                                <li><a href="shop-left-sidebar.html">Shop Left sidebar</a></li>
                                <li><a href="shop-right-sidebar.html">Shop right sidebar</a></li>
                                <li><a href="product-details.html">Shop details </a></li>
                                <li><a href="cart.html">Cart</a></li>
                                <li><a href="wishlist.html">Wishlist</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="order-tracking.html">Order Tracking</a></li>
                                <li><a href="account.html">My Account</a></li>
                                <li><a href="login.html">Sign in</a></li>
                                <li><a href="register.html">Register</a></li>
                            </ul>
                        </li>
                        <li><a href="#">News</a>
                            <ul class="sub-menu">
                                <li><a href="blog.html">News</a></li>
                                <li><a href="blog-grid.html">News Grid</a></li>
                                <li><a href="blog-left-sidebar.html">News Left sidebar</a></li>
                                <li><a href="blog-right-sidebar.html">News Right sidebar</a></li>
                                <li><a href="blog-details.html">News details</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Pages</a>
                            <ul class="sub-menu">
                                <li><a href="about.html">About</a></li>
                                <li><a href="service.html">Services</a></li>
                                <li><a href="service-details.html">Service Details</a></li>
                                <li><a href="portfolio.html">Portfolio</a></li>
                                <li><a href="portfolio-2.html">Portfolio - 02</a></li>
                                <li><a href="portfolio-details.html">Portfolio Details</a></li>
                                <li><a href="team.html">Team</a></li>
                                <li><a href="team-details.html">Team Details</a></li>
                                <li><a href="faq.html">FAQ</a></li>
                                <li><a href="history.html">History</a></li>
                                <li><a href="appointment.html">Appointment</a></li>
                                <li><a href="locations.html">Google Map Locations</a></li>
                                <li><a href="404.html">404</a></li>
                                <li><a href="contact.html">Contact</a></li>
                                <li><a href="coming-soon.html">Coming Soon</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>
                <div class="ltn__utilize-buttons ltn__utilize-buttons-2">
                    <ul>
                        <li>
                            <a href="account.html" title="My Account">
                                <span class="utilize-btn-icon">
                                    <i class="far fa-user"></i>
                                </span>
                                My Account
                            </a>
                        </li>
                        <li>
                            <a href="wishlist.html" title="Wishlist">
                                <span class="utilize-btn-icon">
                                    <i class="far fa-heart"></i>
                                    <sup>3</sup>
                                </span>
                                Wishlist
                            </a>
                        </li>
                        <li>
                            <a href="cart.html" title="Shoping Cart">
                                <span class="utilize-btn-icon">
                                    <i class="fas fa-shopping-cart"></i>
                                    <sup>5</sup>
                                </span>
                                Shoping Cart
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="ltn__social-media-2">
                    <ul>
                        <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                        <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Utilize Mobile Menu End -->

        <div class="ltn__utilize-overlay"></div>

        <!-- BREADCRUMB AREA START -->
        <div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image mb-0" data-bg="img/bg/14.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ltn__breadcrumb-inner">
                            <h1 class="page-title">Product Details</h1>
                            <div class="ltn__breadcrumb-list">
                                <ul>
                                    <li><a href="index.html"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                                    <li>Product Details</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMB AREA END -->

        <!-- PAGE DETAILS AREA START (service-details) -->
        <div class="ltn__page-details-area ltn__service-details-area mb-10">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="ltn__page-details-inner ltn__service-details-inner">
                            <div class="ltn__blog-img">
                                <img src="https://propguider.com/crm/upload_images/<?= $results[0]['main_image']; ?>" alt="Image">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <aside class="sidebar-area ltn__right-sidebar">
                            <!-- Menu Widget -->
                            <h2 class="text-uppercase my-3 text-center">Downloads</h2>
                            <div class="widget-2 ltn__menu-widget ltn__menu-widget-2 text-uppercase">
                                <ul>
                                    <li><a href="#">Property Management <span><i class="fas fa-arrow-down"></i></span></a></li>
                                    <li class="active"><a href="#">Mortgage Service <span><i class="fas fa-arrow-down"></i></span></a></li>
                                    <li><a href="#">Consulting Service <span><i class="fas fa-arrow-down"></i></span></a></li>
                                    <li><a href="#">Home Buying <span><i class="fas fa-arrow-down"></i></span></a></li>
                                    <!-- <li><a href="#">Home Selling <span><i class="fas fa-arrow-right"></i></span></a></li> -->
                                    <!-- <li><a href="#">Escrow Services <span><i class="fas fa-arrow-right"></i></span></a></li> -->
                                </ul>
                            </div>
                            <div class="widget ltn__social-media-widget">
                                <h4 class="ltn__widget-title ltn__widget-title-border-2">Follow us</h4>
                                <div class="ltn__social-media-2">
                                    <ul>
                                        <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                        <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>

                                    </ul>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>

        <!-- SHOP DETAILS AREA START -->
        <div class="ltn__shop-details-area pb-10">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="ltn__shop-details-inner ltn__page-details-inner mb-10">
                            <!-- <div class="ltn__blog-meta">
                            <ul>
                                <li class="ltn__blog-category">
                                    <a href="#">Featured</a>
                                </li>
                                <li class="ltn__blog-category">
                                    <a class="bg-orange" href="#">For Rent</a>
                                </li>
                                <li class="ltn__blog-date">
                                    <i class="far fa-calendar-alt"></i>May 19, 2021
                                </li>
                                <li>
                                    <a href="#"><i class="far fa-comments"></i>35 Comments</a>
                                </li>
                            </ul>
                        </div> -->
                            <h1><?= $results[0]['property_name']; ?></h1>
                            <label><span class="ltn__secondary-color"><i class="flaticon-pin"></i></span> <?= $results[0]['location']; ?> , Chennai</label>
                            <h4 class="title-2">About Project</h4>
                            <p>
                                <?= $results[0]['about_project']; ?>
                            </p>
                            <!-- <p>To the left is the modern kitchen with central island, leading through to the unique breakfast family room which feature glass walls and doors out onto the garden and access to the separate utility room.</p> -->

                            <h4 class="title-2">Property Detail</h4>
                            <div class="property-detail-info-list section-bg-1 clearfix mb-20">
                                <ul style="padding: 10px 10px;">
                                    <li><label>Project Name :</label> <span><?= $results[0]['property_name']; ?></span></li>
                                    <li><label>Type : </label> <span><?= $results[0]['zoning']; ?></span></li>
                                    <li><label>Size ( Min - Max ) :</label> <span>
                                            <?php
                                            $min = (array_filter([
                                                strval($results[0]['1_5bhk_size_min']),
                                                strval($results[0]['1bhk_size_min']),
                                                strval($results[0]['2bhk_size_min']),
                                                strval($results[0]['2_5bhk_size_min']),
                                                strval($results[0]['3bhk_size_min']),
                                                strval($results[0]['4bhk_size_min']),
                                                strval($results[0]['5bhk_size_min'])
                                            ], function ($value) {
                                                return $value !== '0';
                                            }));

                                            $max = (max(
                                                strval($results[0]['1bhk_size_max']),
                                                strval($results[0]['1_5bhk_size_max']),
                                                strval($results[0]['2bhk_size_max']),
                                                strval($results[0]['2_5bhk_size_max']),
                                                strval($results[0]['3bhk_size_max']),
                                                strval($results[0]['4bhk_size_max']),
                                                strval($results[0]['5bhk_size_max'])
                                            ));

                                            if (!empty($min)) {
                                                $min = min($min);
                                            } else
                                                $min = 0;

                                            if ($max == 0)
                                                $max = 0;

                                            if ($max == 0 && $min == 0)
                                                echo "Nill";
                                            elseif ($max != 0 && $min != 0)
                                                echo $min . "  - " . $max . " SQ.FT";
                                            elseif ($min != 0 && $max == 0)
                                                echo $min . "max  SQ.FT";
                                            elseif ($min == 0 && $max)
                                                echo $max . " max  SQ.FT";
                                            ?>
                                        </span></li>
                                    <li><label>Land Extend:</label><span><?= $results[0]['land_extent']; ?></span></li>
                                    <li><label>Possession:</label> <span><?php $date = new DateTime($results[0]['possession']);
                                                                            echo $formattedDate = $date->format('M Y'); ?></span></li>
                                </ul>
                                <ul style="padding: 10px 10px;">
                                    <li><label>Location:</label> <span><?= $results[0]['location']; ?> </span></li>
                                    <li><label>Property Type:</label> <span><?= $results[0]['type']; ?></span></li>
                                    <li><label>Budget:</label> <span><?php echo "↓ " . formatCurrency($results[0]['price_in_lacs_lower']) ?> - <?php echo "↑ " . formatCurrency($results[0]['price_in_lacs_upper']) ?></span></li>
                                    <li><label>Price Per Square feet:</label> <span><?= "₹ " . $results[0]['rate_per_sqft']; ?></span></li>
                                    <li><label>Total Units:</label> <span><?= $results[0]['no_of_units']; ?></span></li>
                                </ul>
                            </div>

                            <!-- <h4 class="title-2">Facts and Features</h4> -->
                            <!-- <div class="property-detail-feature-list clearfix mb-45">                            
                            <ul>
                                <li>
                                    <div class="property-detail-feature-list-item">
                                        <i class="flaticon-double-bed"></i>
                                        <div>
                                            <h6>Living Room</h6>
                                            <small>20 x 16 sq feet</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="property-detail-feature-list-item">
                                        <i class="flaticon-double-bed"></i>
                                        <div>
                                            <h6>Garage</h6>
                                            <small>20 x 16 sq feet</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="property-detail-feature-list-item">
                                        <i class="flaticon-double-bed"></i>
                                        <div>
                                            <h6>Dining Area</h6>
                                            <small>20 x 16 sq feet</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="property-detail-feature-list-item">
                                        <i class="flaticon-double-bed"></i>
                                        <div>
                                            <h6>Bedroom</h6>
                                            <small>20 x 16 sq feet</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="property-detail-feature-list-item">
                                        <i class="flaticon-double-bed"></i>
                                        <div>
                                            <h6>Bathroom</h6>
                                            <small>20 x 16 sq feet</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="property-detail-feature-list-item">
                                        <i class="flaticon-double-bed"></i>
                                        <div>
                                            <h6>Gym Area</h6>
                                            <small>20 x 16 sq feet</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="property-detail-feature-list-item">
                                        <i class="flaticon-double-bed"></i>
                                        <div>
                                            <h6>Garden</h6>
                                            <small>20 x 16 sq feet</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="property-detail-feature-list-item">
                                        <i class="flaticon-double-bed"></i>
                                        <div>
                                            <h6>Parking</h6>
                                            <small>20 x 16 sq feet</small>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div> -->
                            <h4 class="title-2">Configurations</h4>
                            <div class="ltn__property-details-gallery mb-10">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Unit Type</th>
                                                <th scope="col">Area</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Floor Plan


                                                </th>
                                                <th scope="col">Cost Sheet</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(($results[0]['1bhk_size_min']&&$results[0]['1bhk_size_max'])!=''&&($results[0]['1bhk_size_min']&&$results[0]['1bhk_size_max'])!=null){
                                            ?>
                                            <tr>
                                                <th scope="row">
                                                    1BHK
                                                </th>
                                                <td>
                                                <?= $results[0]['1bhk_size_min']." sqt"; ?> - <?= $results[0]['1bhk_size_max']." sqt"; ?> 
                                                </td>
                                                <td>
                                                <?= "↓ ".$results[0]['1bhk_budget_min']; ?> - <?= " ↑ ".$results[0]['1bhk_budget_min']; ?>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm p-1">View</button>     
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm p-1">View</button> 
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if(($results[0]['1_5bhk_size_min']&&$results[0]['1_5bhk_size_max'])!=''&&($results[0]['1_5bhk_size_min']&&$results[0]['1_5bhk_size_max'])!=null){
                                            ?>
                                            <tr>
                                                <th scope="row">
                                                    1.5BHK
                                                </th>
                                                <td>
                                                <?= $results[0]['1_5bhk_size_min']." sqt"; ?> - <?= $results[0]['1_5bhk_size_max']." sqt"; ?> 
                                                </td>
                                                <td>
                                                <?= "↓ ".$results[0]['1_5bhk_budget_min']; ?> - <?= " ↑ ".$results[0]['1_5bhk_budget_max']; ?>
                                                </td>
                                                <td>
                                                   <button class="btn btn-primary btn-sm"></button> 
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm p-1">View</button> 
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if(($results[0]['2bhk_size_min']&&$results[0]['2bhk_size_max'])!=''&&($results[0]['2bhk_size_min']&&$results[0]['2bhk_size_max'])!=null){
                                            ?>
                                            <tr>
                                                <th scope="row">
                                                    2BHK
                                                </th>
                                                <td>
                                                <?= $results[0]['2bhk_size_min']." sqt"; ?> - <?= $results[0]['2bhk_size_max']." sqt"; ?> 
                                                </td>
                                                <td>
                                                <?= "↓ ".$results[0]['2bhk_budget_min']; ?> - <?= " ↑ ".$results[0]['2bhk_budget_max']; ?>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm p-1">View</button> 
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm p-1">View</button> 
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if(($results[0]['2_5bhk_size_min']&&$results[0]['2_5bhk_size_max'])!=''&&($results[0]['2_5bhk_size_min']&&$results[0]['2_5bhk_size_max'])!=null){
                                            ?>
                                            <tr>
                                                <th scope="row">
                                                    2.5BHK
                                                </th>
                                                <td>
                                                    <?= $results[0]['2_5bhk_size_min']." sqt"; ?> - <?= $results[0]['2_5bhk_size_max']." sqt"; ?>                                                 </td>
                                                <td>
                                                <?= "↓ ".$results[0]['2_5bhk_budget_min']; ?> - <?= " ↑ ".$results[0]['2_5bhk_budget_max']; ?>                                                    
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm p-1">View</button> 
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm p-1">View</button> 
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if(($results[0]['3bhk_size_min']&&$results[0]['3bhk_size_max'])!=''&&($results[0]['3bhk_size_min']&&$results[0]['3bhk_size_max'])!=null){
                                            ?>
                                            <tr>
                                                <th scope="row">
                                                    3BHK
                                                </th>
                                                <td>
                                                    <?= $results[0]['3bhk_size_min']." sqt"; ?> - <?= $results[0]['3bhk_size_max']." sqt"; ?>                                                 </td>
                                                <td>
                                                <?= "↓ ".$results[0]['3bhk_budget_min']; ?> - <?= " ↑ ".$results[0]['3bhk_budget_max']; ?>                                                    
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm p-1">View</button> 
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm p-1">View</button> 
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if(($results[0]['4bhk_size_min']&&$results[0]['4bhk_size_max'])!=''&&($results[0]['4bhk_size_min']&&$results[0]['4bhk_size_max'])!=null){
                                            ?>
                                            <tr>
                                                <th scope="row">
                                                    4BHK
                                                </th>
                                                <td>
                                                    <?= $results[0]['4bhk_size_min']." sqt"; ?> - <?= $results[0]['4bhk_size_max']." sqt"; ?></td>
                                                <td>
                                                <?= "↓ ".$results[0]['4bhk_budget_min']; ?> - <?= " ↑ ".$results[0]['4bhk_budget_max']; ?>                                                    
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm p-1">View</button> 
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm p-1">View</button> 
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if(($results[0]['5bhk_size_min']&&$results[0]['5bhk_size_max'])!=''&&($results[0]['5bhk_size_min']&&$results[0]['5bhk_size_max'])!=null){
                                            ?>
                                            <tr>
                                                <th scope="row">
                                                    5BHK
                                                </th>
                                                <td>
                                                    <?= $results[0]['5bhk_size_min']." sqt"; ?> - <?= $results[0]['5bhk_size_max']." sqt"; ?></td>
                                                <td>
                                                <?= "↓ ".$results[0]['5bhk_budget_min']; ?> - <?= " ↑ ".$results[0]['5bhk_budget_max']; ?>                                                    
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm p-1">View</button> 
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm p-1">View</button> 
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <h4 class="title-2">From Our Gallery</h4>
                            <div class="ltn__property-details-gallery mb-10">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a href="img/others/14.jpg" data-rel="lightcase:myCollection">
                                            <img class="mb-30" src="https://propguider.com/crm/upload_images/<?= $results[0]['main_image']; ?>" alt="Image">
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="img/others/15.jpg" data-rel="lightcase:myCollection">
                                            <img class="mb-30" src="https://propguider.com/crm/upload_images/<?= $results[0]['main_image']; ?>" alt="Image">
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="img/others/16.jpg" data-rel="lightcase:myCollection">
                                            <img class="mb-30" src="https://propguider.com/crm/upload_images/<?= $results[0]['main_image']; ?>" alt="Image">
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- <h4 class="title-2 mb-10">Amenities</h4> -->
                            <!-- <div class="property-details-amenities mb-60">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="ltn__menu-widget">
                                        <ul>
                                            <li>
                                                <label class="checkbox-item">Air Conditioning
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-item">Gym
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-item">Microwave
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-item">Swimming Pool
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-item">WiFi
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="ltn__menu-widget">
                                        <ul>
                                            <li>
                                                <label class="checkbox-item">Barbeque
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-item">Recreation
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-item">Microwave
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-item">Basketball Cout
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-item">Fireplace
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="ltn__menu-widget">
                                        <ul>
                                            <li>
                                                <label class="checkbox-item">Refrigerator
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-item">Window Coverings
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-item">Washer
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-item">24x7 Security
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-item">Indoor Game
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                            <h4 class="title-2">Location</h4>
                            <div class="property-details-google-map mb-60">
                                <?= $results[0]['address']; ?>
                            </div>

                            <!-- <h4 class="title-2">Floor Plans</h4> -->
                            <!-- APARTMENTS PLAN AREA START -->
                            <!-- <div class="ltn__apartments-plan-area product-details-apartments-plan mb-60"> -->
                            <!-- <div class="ltn__tab-menu ltn__tab-menu-3 ltn__tab-menu-top-right-- text-uppercase--- text-center---">
                                <div class="nav">
                                    <a data-toggle="tab" href="#liton_tab_3_1">First Floor</a>
                                    <a class="active show"  data-toggle="tab" href="#liton_tab_3_2" class="">Second Floor</a>
                                    <a data-toggle="tab" href="#liton_tab_3_3" class="">Third Floor</a>
                                    <a data-toggle="tab" href="#liton_tab_3_4" class="">Top Garden</a>
                                </div>
                            </div> -->
                            <!-- <div class="tab-content">
                                <div class="tab-pane fade" id="liton_tab_3_1">
                                    <div class="ltn__apartments-tab-content-inner">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <div class="apartments-plan-img">
                                                    <img src="img/others/10.png" alt="#">
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="apartments-plan-info ltn__secondary-bg--- text-color-white---">
                                                    <h2>First Floor</h2>
                                                    <p>Enimad minim veniam quis nostrud exercitation ullamco laboris.
                                                        Lorem ipsum dolor sit amet cons aetetur adipisicing elit sedo
                                                        eiusmod tempor.Incididunt labore et dolore magna aliqua.
                                                        sed ayd minim veniam.</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="product-details-apartments-info-list  section-bg-1">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="apartments-info-list apartments-info-list-color mt-40---">
                                                                <ul>
                                                                    <li><label>Total Area</label> <span>2800 Sq. Ft</span></li>
                                                                    <li><label>Bedroom</label> <span>150 Sq. Ft</span></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="apartments-info-list apartments-info-list-color mt-40---">
                                                                <ul>
                                                                    <li><label>Belcony/Pets</label> <span>Allowed</span></li>
                                                                    <li><label>Lounge</label> <span>650 Sq. Ft</span></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade active show" id="liton_tab_3_2">
                                    <div class="ltn__product-tab-content-inner">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <div class="apartments-plan-img">
                                                    <img src="img/others/10.png" alt="#">
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="apartments-plan-info ltn__secondary-bg--- text-color-white---">
                                                    <h2>Second Floor</h2>
                                                    <p>Enimad minim veniam quis nostrud exercitation ullamco laboris.
                                                        Lorem ipsum dolor sit amet cons aetetur adipisicing elit sedo
                                                        eiusmod tempor.Incididunt labore et dolore magna aliqua.
                                                        sed ayd minim veniam.</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="product-details-apartments-info-list  section-bg-1">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="apartments-info-list apartments-info-list-color mt-40---">
                                                                <ul>
                                                                    <li><label>Total Area</label> <span>2800 Sq. Ft</span></li>
                                                                    <li><label>Bedroom</label> <span>150 Sq. Ft</span></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="apartments-info-list apartments-info-list-color mt-40---">
                                                                <ul>
                                                                    <li><label>Belcony/Pets</label> <span>Allowed</span></li>
                                                                    <li><label>Lounge</label> <span>650 Sq. Ft</span></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="liton_tab_3_3">
                                    <div class="ltn__product-tab-content-inner">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <div class="apartments-plan-img">
                                                    <img src="img/others/10.png" alt="#">
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="apartments-plan-info ltn__secondary-bg--- text-color-white---">
                                                    <h2>Third Floor</h2>
                                                    <p>Enimad minim veniam quis nostrud exercitation ullamco laboris.
                                                        Lorem ipsum dolor sit amet cons aetetur adipisicing elit sedo
                                                        eiusmod tempor.Incididunt labore et dolore magna aliqua.
                                                        sed ayd minim veniam.</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="product-details-apartments-info-list  section-bg-1">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="apartments-info-list apartments-info-list-color mt-40---">
                                                                <ul>
                                                                    <li><label>Total Area</label> <span>2800 Sq. Ft</span></li>
                                                                    <li><label>Bedroom</label> <span>150 Sq. Ft</span></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="apartments-info-list apartments-info-list-color mt-40---">
                                                                <ul>
                                                                    <li><label>Belcony/Pets</label> <span>Allowed</span></li>
                                                                    <li><label>Lounge</label> <span>650 Sq. Ft</span></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="liton_tab_3_4">
                                    <div class="ltn__product-tab-content-inner">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <div class="apartments-plan-img">
                                                    <img src="img/others/10.png" alt="#">
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="apartments-plan-info ltn__secondary-bg--- text-color-white---">
                                                    <h2>Top Garden</h2>
                                                    <p>Enimad minim veniam quis nostrud exercitation ullamco laboris.
                                                        Lorem ipsum dolor sit amet cons aetetur adipisicing elit sedo
                                                        eiusmod tempor.Incididunt labore et dolore magna aliqua.
                                                        sed ayd minim veniam.</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="product-details-apartments-info-list  section-bg-1">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="apartments-info-list apartments-info-list-color mt-40---">
                                                                <ul>
                                                                    <li><label>Total Area</label> <span>2800 Sq. Ft</span></li>
                                                                    <li><label>Bedroom</label> <span>150 Sq. Ft</span></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="apartments-info-list apartments-info-list-color mt-40---">
                                                                <ul>
                                                                    <li><label>Belcony/Pets</label> <span>Allowed</span></li>
                                                                    <li><label>Lounge</label> <span>650 Sq. Ft</span></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- </div> -->
                            <!-- APARTMENTS PLAN AREA END -->

                            <h4 class="title-2">Property Video</h4>
                            <div class="ltn__video-bg-img ltn__video-popup-height-500 bg-overlay-black-50 bg-image mb-10">
                                <a class="ltn__video-icon-2 ltn__video-icon-2-border---" href="<?= $results[0]['youtube_url'] ?>" target="_blank">
                                    <i class="fa fa-play"></i>
                                </a>
                            </div>

                            <!-- <div class="ltn__shop-details-tab-content-inner--- ltn__shop-details-tab-inner-2 ltn__product-details-review-inner mb-0"> -->
                            <!-- <h4 class="title-2">Customer Reviews</h4> -->
                            <!-- <div class="product-ratting">
                                <ul>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                    <li class="review-total"> <a href="#"> ( 95 Reviews )</a></li>
                                </ul>
                            </div> -->
                            <!-- <hr> -->
                            <!-- comment-area -->
                            <!-- <div class="ltn__comment-area mb-30">
                                <div class="ltn__comment-inner">
                                    <ul>
                                        <li>
                                            <div class="ltn__comment-item clearfix">
                                                <div class="ltn__commenter-img">
                                                    <img src="img/testimonial/1.jpg" alt="Image">
                                                </div>
                                                <div class="ltn__commenter-comment">
                                                    <h6><a href="#">Adam Smit</a></h6>
                                                    <div class="product-ratting">
                                                        <ul>
                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, omnis fugit corporis iste magnam ratione.</p>
                                                    <span class="ltn__comment-reply-btn">September 3, 2020</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ltn__comment-item clearfix">
                                                <div class="ltn__commenter-img">
                                                    <img src="img/testimonial/3.jpg" alt="Image">
                                                </div>
                                                <div class="ltn__commenter-comment">
                                                    <h6><a href="#">Adam Smit</a></h6>
                                                    <div class="product-ratting">
                                                        <ul>
                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, omnis fugit corporis iste magnam ratione.</p>
                                                    <span class="ltn__comment-reply-btn">September 2, 2020</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ltn__comment-item clearfix">
                                                <div class="ltn__commenter-img">
                                                    <img src="img/testimonial/2.jpg" alt="Image">
                                                </div>
                                                <div class="ltn__commenter-comment">
                                                    <h6><a href="#">Adam Smit</a></h6>
                                                    <div class="product-ratting">
                                                        <ul>
                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, omnis fugit corporis iste magnam ratione.</p>
                                                    <span class="ltn__comment-reply-btn">September 2, 2020</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div> -->
                            <!-- comment-reply -->
                            <!-- <div class="ltn__comment-reply-area ltn__form-box mb-30">
                                <form action="#">
                                    <h4>Add a Review</h4>
                                    <div class="mb-30">
                                        <div class="add-a-review">
                                            <h6>Your Ratings:</h6>
                                            <div class="product-ratting">
                                                <ul>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-item input-item-textarea ltn__custom-icon">
                                        <textarea placeholder="Type your comments...."></textarea>
                                    </div>
                                    <div class="input-item input-item-name ltn__custom-icon">
                                        <input type="text" placeholder="Type your name....">
                                    </div>
                                    <div class="input-item input-item-email ltn__custom-icon">
                                        <input type="email" placeholder="Type your email....">
                                    </div>
                                    <div class="input-item input-item-website ltn__custom-icon">
                                        <input type="text" name="website" placeholder="Type your website....">
                                    </div>
                                    <label class="mb-0"><input type="checkbox" name="agree"> Save my name, email, and website in this browser for the next time I comment.</label>
                                    <div class="btn-wrapper">
                                        <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div> -->
                            <!-- </div> -->

                            <!-- PRODUCT SLIDER AREA START -->
                            <div class="ltn__product-slider-area ltn__product-gutter pt-5 pb-10">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="section-title-area ltn__section-title-2--- text-center">
                                                <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">Property</h6>
                                                <h1 class="section-title">Related Property</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ltn__product-slider-item-three-active slick-arrow-1">
                                        <!-- ltn__product-item silde-->
                                        <?php
                                        foreach ($intprop as $proper) {
                                        ?>
                                            <div class="ltn__gallery-item Plot col-md-4 col-sm-6 col-12">
                                                <div class="ltn__gallery-item-inner">
                                                    <div class="ltn__gallery-item-img">
                                                        <a href="img/gallery/1.jpg" data-rel="lightcase:myCollection">
                                                            <img src="img/gallery/1.jpg" alt="<?php echo "www.propguider.com/crm/upload_images/" . $proper['elevation_image'] ?>">
                                                            <span class="ltn__gallery-action-icon">
                                                                <i class="fas fa-search"></i>

                                                            </span>
                                                            <span class="pricing position-absolute">
                                                                <?= formatCurrency($proper['price_in_lacs_lower']); ?> -
                                                                <?= formatCurrency($proper['price_in_lacs_upper']); ?></span>
                                                            <div class="cover"></div>
                                                            <span class=" configration text-color-white mr-3  position-absolute">
                                                                <?php $bhk = str_replace("BHK", "", $proper['configuration']);
                                                                echo $bhk . " BHK"; ?>
                                                            </span>

                                                        </a>

                                                    </div>
                                                    <div class="ltn__gallery-item-info p-2">
                                                        <h4><a href="portfolio-details.html"><?php echo $proper['property_name']; ?></a>
                                                        </h4>
                                                        <p> <i class="icon-placeholder text-success ml-2"></i><span class="ml-2"><?= $proper['location']; ?>, Chennai</span> </p>
                                                        <div class="d-flex justify-content-between">
                                                            <div>
                                                                <p><i class="fa fa-expand text-success ml-2"></i><span class="ml-2">
                                                                        <?php
                                                                        $min = (array_filter([
                                                                            strval($proper['1bhk_size_min']),
                                                                            strval($proper['1_5bhk_size_min']),
                                                                            strval($proper['2bhk_size_min']),
                                                                            strval($proper['2_5bhk_size_min']),
                                                                            strval($proper['3bhk_size_min']),
                                                                            strval($proper['4bhk_size_min']),
                                                                            strval($proper['5bhk_size_min'])
                                                                        ], function ($value) {
                                                                            return $value !== '0';
                                                                        }));

                                                                        $max = (max(strval($proper['1bhk_size_max']), strval($proper['1_5bhk_size_max']), strval($proper['2bhk_size_max']), strval($proper['2_5bhk_size_max']), strval($proper['3bhk_size_max']), strval($proper['4bhk_size_max']), strval($proper['5bhk_size_max'])));

                                                                        if (!empty($min)) {
                                                                            $min = min($min);
                                                                        } else
                                                                            $min = 0;

                                                                        if ($max == 0)
                                                                            $max = 0;

                                                                        if ($max == 0 && $min == 0)
                                                                            echo "Nill";
                                                                        elseif ($max != 0 && $min != 0)
                                                                            echo $min . " - " . $max . "  SQ.FT";
                                                                        elseif ($min != 0 && $max == 0)
                                                                            echo $min . "  SQ.FT";
                                                                        elseif ($min == 0 && $max)
                                                                            echo $max . "  SQ.FT";
                                                                        ?>
                                                                    </span>
                                                                </p>
                                                            </div>
                                                            <div>
                                                                <p> <i class="fa fa-calendar-alt text-success ml-2"></i><span class="ml-2"><?php $date = new DateTime($proper['possession']);
                                                                                                                                            echo $formattedDate = $date->format('M Y'); ?></span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class=" d-fle">
                                                            <ul class="d-flex list-inline list-group list-group-horizontal justify-content-center">
                                                                <li>
                                                                    <a href="#" title="Quick View" class="list-group-item" data-toggle="modal" data-target="#quick_view_modal" tabindex="0">
                                                                        <i class="flaticon-expand"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" title="Wishlist" data-toggle="modal" class="list-group-item" data-target="#liton_wishlist_modal" tabindex="0">
                                                                        <i class="flaticon-heart-1"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="product-details.html" title="Product Details" class="list-group-item" tabindex="0">
                                                                        <i class="flaticon-add"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <!-- ltn__product-item  silde end-->
                                    </div>
                                </div>
                            </div>
                            <!-- PRODUCT SLIDER AREA END -->
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar---">
                            <!-- Author Widget -->
                            <!-- <div class="widget ltn__author-widget">
                            <div class="ltn__author-widget-inner text-center">
                                <img src="img/team/4.jpg" alt="Image">
                                <h5>Rosalina D. Willaimson</h5>
                                <small>Traveller/Photographer</small>
                                <div class="product-ratting">
                                    <ul>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                        <li><a href="#"><i class="far fa-star"></i></a></li>
                                        <li class="review-total"> <a href="#"> ( 1 Reviews )</a></li>
                                    </ul>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis distinctio, odio, eligendi suscipit reprehenderit atque.</p>
                                <div class="ltn__social-media">
                                    <ul>
                                        <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                        
                                        <li><a href="#" title="Youtube"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                            <!-- Search Widget -->
                            <!-- <div class="widget ltn__search-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border-2">Search Objects</h4>
                            <form action="#">
                                <input type="text" name="search" placeholder="Search your keyword...">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div> -->
                            <!-- Form Widget -->
                            <div class="widget ltn__form-widget" id="sticky-widget">
                                <h4 class="ltn__widget-title ltn__widget-title-border-2">Drop Messege For Site Visit</h4>
                                <form action="#">
                                    <input type="email" name="name" placeholder="Your Name*">
                                    <input type="email" name="email" placeholder="Your e-Mail*">
                                    <input type="tel" name="phone" id="phone" placeholder="Your Phone*">
                                    <textarea name="yourmessage" placeholder="Write Message..."></textarea>
                                    <button style="padding: 10px 40px; margin-bottom: 40px;" type="submit" class="btn theme-btn-1">Send Messege</button>
                                </form>
                            </div>
                            <!-- Top Rated Product Widget -->
                            <!-- <div class="widget ltn__top-rated-product-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border-2">Top Rated Product</h4>
                            <ul>
                                <li>
                                    <div class="top-rated-product-item clearfix">
                                        <div class="top-rated-product-img">
                                            <a href="product-details.html"><img src="img/product/1.png" alt="#"></a>
                                        </div>
                                        <div class="top-rated-product-info">
                                            <div class="product-ratting">
                                                <ul>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h6><a href="product-details.html">Luxury House In Greenville </a></h6>
                                            <div class="product-price">
                                                <span>$30,000.00</span>
                                                <del>$35,000.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="top-rated-product-item clearfix">
                                        <div class="top-rated-product-img">
                                            <a href="product-details.html"><img src="img/product/2.png" alt="#"></a>
                                        </div>
                                        <div class="top-rated-product-info">
                                            <div class="product-ratting">
                                                <ul>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h6><a href="product-details.html">Apartment with Subunits</a></h6>
                                            <div class="product-price">
                                                <span>$30,000.00</span>
                                                <del>$35,000.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="top-rated-product-item clearfix">
                                        <div class="top-rated-product-img">
                                            <a href="product-details.html"><img src="img/product/3.png" alt="#"></a>
                                        </div>
                                        <div class="top-rated-product-info">
                                            <div class="product-ratting">
                                                <ul>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h6><a href="product-details.html">3 Rooms Manhattan</a></h6>
                                            <div class="product-price">
                                                <span>$30,000.00</span>
                                                <del>$35,000.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div> -->
                            <!-- Menu Widget (Category) -->
                            <!-- <div class="widget ltn__menu-widget ltn__menu-widget-2--- ltn__menu-widget-2-color-2---">
                            <h4 class="ltn__widget-title ltn__widget-title-border-2">Top Categories</h4>
                            <ul>
                                <li><a href="#">Apartments <span>(26)</span></a></li>
                                <li><a href="#">Picture Stodio <span>(30)</span></a></li>
                                <li><a href="#">Office  <span>(71)</span></a></li>
                                <li><a href="#">Luxary Vilas <span>(56)</span></a></li>
                                <li><a href="#">Duplex House <span>(60)</span></a></li>
                            </ul>
                        </div> -->
                            <!-- Popular Product Widget -->
                            <!-- <div class="widget ltn__popular-product-widget">        -->
                            <!-- <h4 class="ltn__widget-title ltn__widget-title-border-2">Popular Properties</h4>                      -->
                            <!-- <div class="row ltn__popular-product-widget-active slick-arrow-1"> -->
                            <!-- ltn__product-item -->
                            <!-- <div class="col-12">
                                    <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                                        <div class="product-img">
                                            <a href="product-details.html"><img src="img/product-3/6.jpg" alt="#"></a>
                                            <div class="real-estate-agent">
                                                <div class="agent-img">
                                                    <a href="team-details.html"><img src="img/blog/author.jpg" alt="#"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <div class="product-price">
                                                <span>$349,00<label>/Month</label></span>
                                            </div>
                                            <h2 class="product-title"><a href="product-details.html">New Apartment Nice View</a></h2>
                                            <div class="product-img-location">
                                                <ul>
                                                    <li>
                                                        <a href="product-details.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                                <li><span>3 </span>
                                                    Bedrooms
                                                </li>
                                                <li><span>2 </span>
                                                    Bathrooms
                                                </li>
                                                <li><span>3450 </span>
                                                    square Ft
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> -->
                            <!-- ltn__product-item -->
                            <!-- <div class="col-12">
                                    <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                                        <div class="product-img">
                                            <a href="product-details.html"><img src="img/product-3/4.jpg" alt="#"></a>
                                            <div class="real-estate-agent">
                                                <div class="agent-img">
                                                    <a href="team-details.html"><img src="img/blog/author.jpg" alt="#"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <div class="product-price">
                                                <span>$349,00<label>/Month</label></span>
                                            </div>
                                            <h2 class="product-title"><a href="product-details.html">New Apartment Nice View</a></h2>
                                            <div class="product-img-location">
                                                <ul>
                                                    <li>
                                                        <a href="product-details.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                                <li><span>3 </span>
                                                    Bedrooms
                                                </li>
                                                <li><span>2 </span>
                                                    Bathrooms
                                                </li>
                                                <li><span>3450 </span>
                                                    square Ft
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> -->
                            <!-- ltn__product-item -->
                            <!-- <div class="col-12">
                                    <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                                        <div class="product-img">
                                            <a href="product-details.html"><img src="img/product-3/5.jpg" alt="#"></a>
                                            <div class="real-estate-agent">
                                                <div class="agent-img">
                                                    <a href="team-details.html"><img src="img/blog/author.jpg" alt="#"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <div class="product-price">
                                                <span>$349,00<label>/Month</label></span>
                                            </div>
                                            <h2 class="product-title"><a href="product-details.html">New Apartment Nice View</a></h2>
                                            <div class="product-img-location">
                                                <ul>
                                                    <li>
                                                        <a href="product-details.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                                <li><span>3 </span>
                                                    Bedrooms
                                                </li>
                                                <li><span>2 </span>
                                                    Bathrooms
                                                </li>
                                                <li><span>3450 </span>
                                                    square Ft
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> -->
                            <!--  -->
                            <!-- </div>
                        </div> -->
                            <!-- Popular Post Widget -->
                            <!-- <div class="widget ltn__popular-post-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border-2">Leatest Blogs</h4>
                            <ul>
                                <li>
                                    <div class="popular-post-widget-item clearfix">
                                        <div class="popular-post-widget-img">
                                            <a href="blog-details.html"><img src="img/team/5.jpg" alt="#"></a>
                                        </div>
                                        <div class="popular-post-widget-brief">
                                            <h6><a href="blog-details.html">Lorem ipsum dolor sit
                                                cing elit, sed do.</a></h6>
                                            <div class="ltn__blog-meta">
                                                <ul>
                                                    <li class="ltn__blog-date">
                                                        <a href="#"><i class="far fa-calendar-alt"></i>June 22, 2020</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="popular-post-widget-item clearfix">
                                        <div class="popular-post-widget-img">
                                            <a href="blog-details.html"><img src="img/team/6.jpg" alt="#"></a>
                                        </div>
                                        <div class="popular-post-widget-brief">
                                            <h6><a href="blog-details.html">Lorem ipsum dolor sit
                                                cing elit, sed do.</a></h6>
                                            <div class="ltn__blog-meta">
                                                <ul>
                                                    <li class="ltn__blog-date">
                                                        <a href="#"><i class="far fa-calendar-alt"></i>June 22, 2020</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="popular-post-widget-item clearfix">
                                        <div class="popular-post-widget-img">
                                            <a href="blog-details.html"><img src="img/team/7.jpg" alt="#"></a>
                                        </div>
                                        <div class="popular-post-widget-brief">
                                            <h6><a href="blog-details.html">Lorem ipsum dolor sit
                                                cing elit, sed do.</a></h6>
                                            <div class="ltn__blog-meta">
                                                <ul>
                                                    <li class="ltn__blog-date">
                                                        <a href="#"><i class="far fa-calendar-alt"></i>June 22, 2020</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="popular-post-widget-item clearfix">
                                        <div class="popular-post-widget-img">
                                            <a href="blog-details.html"><img src="img/team/8.jpg" alt="#"></a>
                                        </div>
                                        <div class="popular-post-widget-brief">
                                            <h6><a href="blog-details.html">Lorem ipsum dolor sit
                                                cing elit, sed do.</a></h6>
                                            <div class="ltn__blog-meta">
                                                <ul>
                                                    <li class="ltn__blog-date">
                                                        <a href="#"><i class="far fa-calendar-alt"></i>June 22, 2020</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div> -->
                            <!-- Social Media Widget -->
                            <!-- <div class="widget ltn__social-media-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border-2">Follow us</h4>
                            <div class="ltn__social-media-2">
                                <ul>
                                    <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                    
                                </ul>
                            </div>
                        </div> -->
                            <!-- Tagcloud Widget -->
                            <!-- <div class="widget ltn__tagcloud-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border-2">Popular Tags</h4>
                            <ul>
                                <li><a href="#">Popular</a></li>
                                <li><a href="#">desgin</a></li>
                                <li><a href="#">ux</a></li>
                                <li><a href="#">usability</a></li>
                                <li><a href="#">develop</a></li>
                                <li><a href="#">icon</a></li>
                                <li><a href="#">Car</a></li>
                                <li><a href="#">Service</a></li>
                                <li><a href="#">Repairs</a></li>
                                <li><a href="#">Auto Parts</a></li>
                                <li><a href="#">Oil</a></li>
                                <li><a href="#">Dealer</a></li>
                                <li><a href="#">Oil Change</a></li>
                                <li><a href="#">Body Color</a></li>
                            </ul>
                        </div> -->
                            <!-- Banner Widget -->
                            <div class="widget ltn__banner-widget d-none">
                                <a href="shop.html"><img src="img/banner/2.jpg" alt="#"></a>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
        <!-- SHOP DETAILS AREA END -->

        <!-- PRODUCT SLIDER AREA START -->
        <div class="ltn__product-slider-area ltn__product-gutter pb-70 d-none">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area ltn__section-title-2--- text-center---">
                            <h1 class="section-title">Related Properties</h1>
                        </div>
                    </div>
                </div>
                <div class="row ltn__related-product-slider-two-active slick-arrow-1">
                    <!-- ltn__product-item -->
                    <div class="col-xl-6 col-sm-6 col-12">
                        <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                            <div class="product-img">
                                <a href="product-details.html"><img src="img/product-3/1.jpg" alt="#"></a>
                                <div class="real-estate-agent">
                                    <div class="agent-img">
                                        <a href="team-details.html"><img src="img/blog/author.jpg" alt="#"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-badge">
                                    <ul>
                                        <li class="sale-badg">For Rent</li>
                                    </ul>
                                </div>
                                <h2 class="product-title"><a href="product-details.html">New Apartment Nice View</a></h2>
                                <div class="product-img-location">
                                    <ul>
                                        <li>
                                            <a href="product-details.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
                                        </li>
                                    </ul>
                                </div>
                                <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                    <li><span>3 </span>
                                        Bed
                                    </li>
                                    <li><span>2 </span>
                                        Bath
                                    </li>
                                    <li><span>3450 </span>
                                        Square Ft
                                    </li>
                                </ul>
                                <div class="product-hover-action">
                                    <ul>
                                        <li>
                                            <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                <i class="flaticon-expand"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                <i class="flaticon-heart-1"></i></a>
                                        </li>
                                        <li>
                                            <a href="portfolio-details.html" title="Compare">
                                                <i class="flaticon-add"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info-bottom">
                                <div class="product-price">
                                    <span>$349,00<label>/Month</label></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ltn__product-item -->
                    <div class="col-xl-6 col-sm-6 col-12">
                        <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                            <div class="product-img">
                                <a href="product-details.html"><img src="img/product-3/2.jpg" alt="#"></a>
                                <div class="real-estate-agent">
                                    <div class="agent-img">
                                        <a href="team-details.html"><img src="img/blog/author.jpg" alt="#"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-badge">
                                    <ul>
                                        <li class="sale-badg">For Sale</li>
                                    </ul>
                                </div>
                                <h2 class="product-title"><a href="product-details.html">New Apartment Nice View</a></h2>
                                <div class="product-img-location">
                                    <ul>
                                        <li>
                                            <a href="product-details.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
                                        </li>
                                    </ul>
                                </div>
                                <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                    <li><span>3 </span>
                                        Bed
                                    </li>
                                    <li><span>2 </span>
                                        Bath
                                    </li>
                                    <li><span>3450 </span>
                                        Square Ft
                                    </li>
                                </ul>
                                <div class="product-hover-action">
                                    <ul>
                                        <li>
                                            <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                <i class="flaticon-expand"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                <i class="flaticon-heart-1"></i></a>
                                        </li>
                                        <li>
                                            <a href="portfolio-details.html" title="Compare">
                                                <i class="flaticon-add"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info-bottom">
                                <div class="product-price">
                                    <span>$349,00<label>/Month</label></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ltn__product-item -->
                    <div class="col-xl-6 col-sm-6 col-12">
                        <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                            <div class="product-img">
                                <a href="product-details.html"><img src="img/product-3/3.jpg" alt="#"></a>
                                <div class="real-estate-agent">
                                    <div class="agent-img">
                                        <a href="team-details.html"><img src="img/blog/author.jpg" alt="#"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-badge">
                                    <ul>
                                        <li class="sale-badg">For Rent</li>
                                    </ul>
                                </div>
                                <h2 class="product-title"><a href="product-details.html">New Apartment Nice View</a></h2>
                                <div class="product-img-location">
                                    <ul>
                                        <li>
                                            <a href="product-details.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
                                        </li>
                                    </ul>
                                </div>
                                <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                    <li><span>3 </span>
                                        Bed
                                    </li>
                                    <li><span>2 </span>
                                        Bath
                                    </li>
                                    <li><span>3450 </span>
                                        Square Ft
                                    </li>
                                </ul>
                                <div class="product-hover-action">
                                    <ul>
                                        <li>
                                            <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                <i class="flaticon-expand"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                <i class="flaticon-heart-1"></i></a>
                                        </li>
                                        <li>
                                            <a href="portfolio-details.html" title="Compare">
                                                <i class="flaticon-add"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info-bottom">
                                <div class="product-price">
                                    <span>$349,00<label>/Month</label></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ltn__product-item -->
                    <div class="col-xl-6 col-sm-6 col-12">
                        <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                            <div class="product-img">
                                <a href="product-details.html"><img src="img/product-3/4.jpg" alt="#"></a>
                                <div class="real-estate-agent">
                                    <div class="agent-img">
                                        <a href="team-details.html"><img src="img/blog/author.jpg" alt="#"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-badge">
                                    <ul>
                                        <li class="sale-badg">For Rent</li>
                                    </ul>
                                </div>
                                <h2 class="product-title"><a href="product-details.html">New Apartment Nice View</a></h2>
                                <div class="product-img-location">
                                    <ul>
                                        <li>
                                            <a href="product-details.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
                                        </li>
                                    </ul>
                                </div>
                                <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                    <li><span>3 </span>
                                        Bed
                                    </li>
                                    <li><span>2 </span>
                                        Bath
                                    </li>
                                    <li><span>3450 </span>
                                        Square Ft
                                    </li>
                                </ul>
                                <div class="product-hover-action">
                                    <ul>
                                        <li>
                                            <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                <i class="flaticon-expand"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                <i class="flaticon-heart-1"></i></a>
                                        </li>
                                        <li>
                                            <a href="portfolio-details.html" title="Compare">
                                                <i class="flaticon-add"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info-bottom">
                                <div class="product-price">
                                    <span>$349,00<label>/Month</label></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ltn__product-item -->
                    <div class="col-xl-6 col-sm-6 col-12">
                        <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                            <div class="product-img">
                                <a href="product-details.html"><img src="img/product-3/5.jpg" alt="#"></a>
                                <div class="real-estate-agent">
                                    <div class="agent-img">
                                        <a href="team-details.html"><img src="img/blog/author.jpg" alt="#"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-badge">
                                    <ul>
                                        <li class="sale-badg">For Rent</li>
                                    </ul>
                                </div>
                                <h2 class="product-title"><a href="product-details.html">New Apartment Nice View</a></h2>
                                <div class="product-img-location">
                                    <ul>
                                        <li>
                                            <a href="product-details.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
                                        </li>
                                    </ul>
                                </div>
                                <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                    <li><span>3 </span>
                                        Bed
                                    </li>
                                    <li><span>2 </span>
                                        Bath
                                    </li>
                                    <li><span>3450 </span>
                                        Square Ft
                                    </li>
                                </ul>
                                <div class="product-hover-action">
                                    <ul>
                                        <li>
                                            <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                <i class="flaticon-expand"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                <i class="flaticon-heart-1"></i></a>
                                        </li>
                                        <li>
                                            <a href="portfolio-details.html" title="Compare">
                                                <i class="flaticon-add"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info-bottom">
                                <div class="product-price">
                                    <span>$349,00<label>/Month</label></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                </div>
            </div>
        </div>
        <!-- PRODUCT SLIDER AREA END -->

        <!-- CALL TO ACTION START (call-to-action-6) -->
        <div class="ltn__call-to-action-area call-to-action-6 before-bg-bottom" data-bg="img/1.jpg--">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="call-to-action-inner call-to-action-inner-6 ltn__secondary-bg text-center---">
                            <div class="coll-to-info text-color-white">
                                <h1>Looking for a dream home?</h1>
                                <p>We can help you realize your dream of a new home</p>
                            </div>
                            <div class="btn-wrapper">
                                <a class="btn btn-effect-3 btn-white" href="contact.html">Explore Properties <i class="icon-next"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CALL TO ACTION END -->

        <!-- FOOTER AREA START -->
        <footer class="ltn__footer-area  ">
            <div class="footer-top-area  section-bg-2 plr--5">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-3 col-md-6 col-sm-6 col-12">
                            <div class="footer-widget footer-about-widget">
                                <div class="footer-logo">
                                    <div class="site-logo">
                                        <img src="img/logo.png" alt="Logo">
                                    </div>
                                </div>
                                <p>Lorem Ipsum is simply dummy text of the and typesetting industry. Lorem Ipsum is dummy text of the printing.</p>
                                <div class="footer-address">
                                    <ul>
                                        <li>
                                            <div class="footer-address-icon">
                                                <i class="icon-placeholder"></i>
                                            </div>
                                            <div class="footer-address-info">
                                                <p>Brooklyn, New York, United States</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="footer-address-icon">
                                                <i class="icon-call"></i>
                                            </div>
                                            <div class="footer-address-info">
                                                <p><a href="tel:+0123-456789">+0123-456789</a></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="footer-address-icon">
                                                <i class="icon-mail"></i>
                                            </div>
                                            <div class="footer-address-info">
                                                <p><a href="mailto:example@example.com">example@example.com</a></p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="ltn__social-media mt-20">
                                    <ul>
                                        <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                        <li><a href="#" title="Youtube"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                            <div class="footer-widget footer-menu-widget clearfix">
                                <h4 class="footer-title">Company</h4>
                                <div class="footer-menu">
                                    <ul>
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="shop.html">All Products</a></li>
                                        <li><a href="locations.html">Locations Map</a></li>
                                        <li><a href="faq.html">FAQ</a></li>
                                        <li><a href="contact.html">Contact us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                            <div class="footer-widget footer-menu-widget clearfix">
                                <h4 class="footer-title">Services</h4>
                                <div class="footer-menu">
                                    <ul>
                                        <li><a href="order-tracking.html">Order tracking</a></li>
                                        <li><a href="wishlist.html">Wish List</a></li>
                                        <li><a href="login.html">Login</a></li>
                                        <li><a href="account.html">My account</a></li>
                                        <li><a href="about.html">Terms & Conditions</a></li>
                                        <li><a href="about.html">Promotional Offers</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                            <div class="footer-widget footer-menu-widget clearfix">
                                <h4 class="footer-title">Customer Care</h4>
                                <div class="footer-menu">
                                    <ul>
                                        <li><a href="login.html">Login</a></li>
                                        <li><a href="account.html">My account</a></li>
                                        <li><a href="wishlist.html">Wish List</a></li>
                                        <li><a href="order-tracking.html">Order tracking</a></li>
                                        <li><a href="faq.html">FAQ</a></li>
                                        <li><a href="contact.html">Contact us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-sm-12 col-12">
                            <div class="footer-widget footer-newsletter-widget">
                                <h4 class="footer-title">Newsletter</h4>
                                <p>Subscribe to our weekly Newsletter and receive updates via email.</p>
                                <div class="footer-newsletter">
                                    <form action="#">
                                        <input type="email" name="email" placeholder="Email*">
                                        <div class="btn-wrapper">
                                            <button class="theme-btn-1 btn" type="submit"><i class="fas fa-location-arrow"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <h5 class="mt-30">We Accept</h5>
                                <img src="img/icons/payment-4.png" alt="Payment Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ltn__copyright-area ltn__copyright-2 section-bg-7  plr--5">
                <div class="container-fluid ltn__border-top-2">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="ltn__copyright-design clearfix">
                                <p>All Rights Reserved @ Company <span class="current-year"></span></p>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 align-self-center">
                            <div class="ltn__copyright-menu text-right">
                                <ul>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">Claim</a></li>
                                    <li><a href="#">Privacy & Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- FOOTER AREA END -->

        <!-- MODAL AREA START (Quick View Modal) -->
        <div class="ltn__modal-area ltn__quick-view-modal-area">
            <div class="modal fade" id="quick_view_modal" tabindex="-1">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <!-- <i class="fas fa-times"></i> -->
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="ltn__quick-view-modal-inner">
                                <div class="modal-product-item">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <div class="modal-product-img">
                                                <img src="img/product/4.png" alt="#">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="modal-product-info">
                                                <div class="product-ratting">
                                                    <ul>
                                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                                        <li><a href="#"><i class="far fa-star"></i></a></li>
                                                        <li class="review-total"> <a href="#"> ( 95 Reviews )</a></li>
                                                    </ul>
                                                </div>
                                                <h3>3 Rooms Manhattan</h3>
                                                <div class="product-price">
                                                    <span>$149.00</span>
                                                    <del>$165.00</del>
                                                </div>
                                                <div class="modal-product-meta ltn__product-details-menu-1">
                                                    <ul>
                                                        <li>
                                                            <strong>Categories:</strong>
                                                            <span>
                                                                <a href="#">Parts</a>
                                                                <a href="#">Car</a>
                                                                <a href="#">Seat</a>
                                                                <a href="#">Cover</a>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="ltn__product-details-menu-2">
                                                    <ul>
                                                        <li>
                                                            <div class="cart-plus-minus">
                                                                <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="theme-btn-1 btn btn-effect-1" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">
                                                                <i class="fas fa-shopping-cart"></i>
                                                                <span>ADD TO CART</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="ltn__product-details-menu-3">
                                                    <ul>
                                                        <li>
                                                            <a href="#" class="" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart"></i>
                                                                <span>Add to Wishlist</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="" title="Compare" data-toggle="modal" data-target="#quick_view_modal">
                                                                <i class="fas fa-exchange-alt"></i>
                                                                <span>Compare</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <hr>
                                                <div class="ltn__social-media">
                                                    <ul>
                                                        <li>Share:</li>
                                                        <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                                        <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                                        <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                                        <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL AREA END -->

        <!-- MODAL AREA START (Add To Cart Modal) -->
        <div class="ltn__modal-area ltn__add-to-cart-modal-area">
            <div class="modal fade" id="add_to_cart_modal" tabindex="-1">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="ltn__quick-view-modal-inner">
                                <div class="modal-product-item">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="modal-product-img">
                                                <img src="img/product/1.png" alt="#">
                                            </div>
                                            <div class="modal-product-info">
                                                <h5><a href="product-details.html">3 Rooms Manhattan</a></h5>
                                                <p class="added-cart"><i class="fa fa-check-circle"></i> Successfully added to your Cart</p>
                                                <div class="btn-wrapper">
                                                    <a href="cart.html" class="theme-btn-1 btn btn-effect-1">View Cart</a>
                                                    <a href="checkout.html" class="theme-btn-2 btn btn-effect-2">Checkout</a>
                                                </div>
                                            </div>
                                            <!-- additional-info -->
                                            <div class="additional-info d-none">
                                                <p>We want to give you <b>10% discount</b> for your first order, <br> Use discount code at checkout</p>
                                                <div class="payment-method">
                                                    <img src="img/icons/payment.png" alt="#">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL AREA END -->

        <!-- MODAL AREA START (Wishlist Modal) -->
        <div class="ltn__modal-area ltn__add-to-cart-modal-area">
            <div class="modal fade" id="liton_wishlist_modal" tabindex="-1">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="ltn__quick-view-modal-inner">
                                <div class="modal-product-item">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="modal-product-img">
                                                <img src="img/product/7.png" alt="#">
                                            </div>
                                            <div class="modal-product-info">
                                                <h5><a href="product-details.html">3 Rooms Manhattan</a></h5>
                                                <p class="added-cart"><i class="fa fa-check-circle"></i> Successfully added to your Wishlist</p>
                                                <div class="btn-wrapper">
                                                    <a href="wishlist.html" class="theme-btn-1 btn btn-effect-1">View Wishlist</a>
                                                </div>
                                            </div>
                                            <!-- additional-info -->
                                            <div class="additional-info d-none">
                                                <p>We want to give you <b>10% discount</b> for your first order, <br> Use discount code at checkout</p>
                                                <div class="payment-method">
                                                    <img src="img/icons/payment.png" alt="#">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL AREA END -->

    </div>
    <!-- Body main wrapper end -->

    <!-- All JS Plugins -->
    <script src="js/plugins.js"></script>
    <!-- Main JS -->
    <script src="js/main.js"></script>
    <script>
        window.addEventListener('scroll', function() {
            var widget = document.getElementById('sticky-widget');
            var scrollPosition = window.scrollY;

            if (scrollPosition > 900 && scrollPosition < 3300) { // Adjust this value based on when you want the widget to become fixed
                widget.classList.add('sticky');
            } else {
                widget.classList.remove('sticky');
            }
        });
    </script>
    <script>
        const phoneInputField = document.querySelector("#phone");
        const phoneInput = window.intlTelInput(phoneInputField, {
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });
    </script>
</body>

</html>