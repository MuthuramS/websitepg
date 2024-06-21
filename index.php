<?php

include(__DIR__ . "\config.php");

$readytoMove = "SELECT intrested_properties.*,loc.loc_id,loc.location FROM intrested_properties LEFT JOIN locations as loc ON intrested_properties.locality = loc.loc_id  WHERE intrested_properties.possession <= DATE_SUB(NOW(), INTERVAL 1 MONTH) AND intrested_properties.prpt_sts = 1 LIMIT 9";

$stmt = $conn->prepare($readytoMove);
$stmt->execute();
// Fetch all the results
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);


$underCons = "SELECT intrested_properties.*,loc.loc_id,loc.location FROM intrested_properties LEFT JOIN 
        locations AS loc 
    ON 
        intrested_properties.locality = loc.loc_id 
    WHERE 
        intrested_properties.possession >= DATE_SUB(NOW(), INTERVAL 1 MONTH) 
        AND intrested_properties.prpt_sts = 1 
    LIMIT 
        9";

$stmt1 = $conn->prepare($underCons);
$stmt1->execute();
// Fetch all the results
$results1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

$aparment = "SELECT intrested_properties.*,loc.loc_id,loc.location FROM intrested_properties LEFT JOIN 
        locations AS loc 
    ON 
        intrested_properties.locality = loc.loc_id 
    WHERE 
        intrested_properties.type = 'Apartment'  
        AND intrested_properties.prpt_sts = 1 
    LIMIT 
        9";

$stmt2 = $conn->prepare($aparment);
$stmt2->execute();
// Fetch all the results
$results2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

$Villa = "SELECT intrested_properties.*,loc.loc_id,loc.location FROM intrested_properties LEFT JOIN 
        locations AS loc 
    ON 
        intrested_properties.locality = loc.loc_id 
    WHERE 
        intrested_properties.type = 'Villa'  
        AND intrested_properties.prpt_sts = 1 
    LIMIT 
        9";

$stmt3 = $conn->prepare($Villa);
$stmt3->execute();
// Fetch all the results
$results3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

$Plot = "SELECT intrested_properties.*,loc.loc_id,loc.location FROM intrested_properties LEFT JOIN 
        locations AS loc 
    ON 
        intrested_properties.locality = loc.loc_id 
    WHERE 
        intrested_properties.type = 'Plot'  
        AND intrested_properties.prpt_sts = 1 
    LIMIT 
        9";

$stmt4 = $conn->prepare($Plot);
$stmt4->execute();
// Fetch all the results
$results4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);

// Display the results
// foreach($results3 as $row) {
//     print_r($row);
// }

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
    <title>Prop Guider - Click or Call, We do it all</title>
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

    <!-- Include jQuery UI for autocomplete -->
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
    <!-- Optional: Include Bootstrap CSS for styling (if not already included) -->
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->

</head>
<style>
    .hidden {
        display: none;
    }

    .ltn__gallery-item {
        display: none;
        /* Initially hide all gallery items */
    }

    .ltn__gallery-item.show {
        display: block;
        /* Show items with class 'show' */
    }
</style>

<body>

    <!-- Body main wrapper start -->
    <div class="body-wrapper">

        <!-- HEADER AREA START (header-5) -->
        <header class="ltn__header-area ltn__header-5 ltn__header-transparent--- gradient-color-4---">
            <?php
            include('./header.php');
            ?>
            <!-- ltn__header-middle-area end -->
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
                                <li><a href="index-5.html">Home Style 05 <span class="menu-item-badge">video</span></a>
                                </li>
                                <li><a href="index-6.html">Home Style 06</a></li>
                                <li><a href="index-7.html">Home Style 07</a></li>
                                <li><a href="index-8.html">Home Style 08</a></li>
                                <li><a href="index-9.html">Home Style 09</a></li>
                                <li><a href="index-10.html">Home Style 10 <span class="menu-item-badge">Map</span></a>
                                </li>
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
                                <li><a href="add-listing.html">Add Listing</a></li>
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

        <!-- SLIDER AREA START (slider-4) -->
        <div class="ltn__slider-area ltn__slider-4 position-relative fix">
            <div class="ltn__slide-one-active----- slick-slide-arrow-1----- slick-slide-dots-1----- arrow-white----- ltn__slide-animation-active">

                <!-- HTML5 VIDEO -->
                <video autoplay muted loop id="myVideo">
                    <source src="media/3.mp4" type="video/mp4">
                </video>

                <!-- YouTube VIDEO -->
                <!-- <div class="ltn__youtube-video-background">
                <iframe frameborder="0" height="100%" width="100%"
                  src="https://www.youtube.com/embed/eySTo2GgvoY?playlist=eySTo2GgvoY&loop=1&controls=0&showinfo=0&autoplay=1&mute=1">
                </iframe>
            </div> -->

                <!-- ltn__slide-item -->
                <div class="ltn__slide-item ltn__slide-item-2 ltn__slide-item-7 bg-image--- bg-overlay-theme-black-30" data-bg="img/slider/41.jpg">
                    <div class="ltn__slide-item-inner text-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 align-self-center">
                                    <div class="slide-item-car-dealer-form">
                                        <div class="section-title-area ltn__section-title-2 text-center">
                                            <h1 class="section-title  text-color-white">Find Your <span class="ltn__secondary-color-3">Dream</span> Home</h1>
                                        </div>
                                        <div class="ltn__car-dealer-form-tab">
                                            <div class="ltn__tab-menu  text-uppercase text-center">
                                                <div class="nav">
                                                    <a class="active show" href="shop-left-sidebar.php?type=new lanch"><i class="fas fa-home"></i>New Launch</a>
                                                    <a href="shop-left-sidebar.php?type=Ready To move" class=""><i class="fas fa-home"></i>Ready to move</a>
                                                </div>
                                            </div>
                                            <div class="tab-content pb-10">
                                                <div class="tab-pane fade active show" id="ltn__form_tab_1_1">
                                                    <div class="car-dealer-form-inner">
                                                        <form action="#" class="ltn__car-dealer-form-box row">
                                                            <div class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-calendar col-lg-9 col-md-6">
                                                                <input type="text" id="search-input" class="form-control" placeholder="Project Name, Location">
                                                                <input type="hidden" id="type" class="form-control">
                                                                <input type="hidden" id="pro_id" class="form-control">
                                                            </div>
                                                            <div class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-calendar col-lg-3 col-md-6">
                                                                <div class="btn-wrapper text-center mt-0">
                                                                    <button type="button" id="search" class="btn theme-btn-1 btn-effect-1 text-uppercase">Search </button>
                                                                    <!-- <a href="shop-right-sidebar.html" class="btn theme-btn-1 btn-effect-1 text-uppercase">Search</a> -->
                                                                </div>
                                                            </div>
                                                        </form>
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
        </div>
        <!-- SLIDER AREA END -->


        <div class="container">
            <div class="ltn__gallery-area mb-120 mt-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ltn__gallery-menu">
                                <div class="ltn__gallery-filter-menu portfolio-filter text-uppercase mb-10 d-flex justify-content-center">
                                    <button onclick="filterItems('.readytomove')">Ready to Move</button>
                                    <button onclick="filterItems('.underconstraction')">Under Constraction</button>
                                    <button onclick="filterItems('.aparment')">Apartment</button>
                                    <button onclick="filterItems('.villa')">Villas</button>
                                    <button onclick="filterItems('.Plot')">Plots</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Portfolio Wrapper Start-->
                    <div class="ltn__gallery-active  row ltn__gallery-style-1">
                        <div class="ltn__gallery-sizer  col-1"></div>
                        <?php
                        foreach ($results as $proper) {
                        ?>
                            <!-- gallery-item -->
                            <div class="ltn__gallery-item readytomove col-md-4 col-sm-6 col-12">
                                <div class="ltn__gallery-item-inner">
                                    <div class="ltn__gallery-item-img">
                                        <a href="img/gallery/1.jpg" data-rel="lightcase:myCollection">
                                            <img src="img/gallery/1.jpg" alt="<?php echo "www.propguider.com/crm/upload_images/" . $proper['elevation_image'] ?>">
                                            <span class="ltn__gallery-action-icon">
                                                <i class="fas fa-search"></i>

                                            </span>
                                            <span class="pricing position-absolute">
                                                <?= formatCurrency($proper['price_in_lacs_lower']); ?> -
                                                <?= formatCurrency($proper['price_in_lacs_upper']); ?>
                                            </span>
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
                                                    </span></p>
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
                        <!-- gallery-item under constraction -->
                        <?php
                        foreach ($results1 as $proper) {
                        ?>
                            <!-- gallery-item -->
                            <div class="ltn__gallery-item underconstraction col-md-4 col-sm-6 col-12">
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
                                                    </span></p>
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
                        <!-- Aparment items -->

                        <?php
                        foreach ($results2 as $proper) {
                        ?>
                            <!-- gallery-item -->
                            <div class="ltn__gallery-item aparment col-md-4 col-sm-6 col-12">
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
                                                    </span></p>
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
                        <!-- villa items -->
                        <?php
                        foreach ($results3 as $proper) {
                        ?>
                            <!-- gallery-item -->
                            <div class="ltn__gallery-item villa col-md-4 col-sm-6 col-12">
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

                        <!-- Plot items -->
                        <?php
                        foreach ($results4 as $proper) {
                        ?>
                            <!-- gallery-item -->
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

                        <!-- gallery-item -->

                    <!-- <div class="ltn__gallery-itm filter_category_2 col-md-4 col-sm-6 col-12">
                        <div class="ltn__gallery-item-inner">
                            <div class="ltn__gallery-item-img">
                                <a href="#ltn__inline_description_1" data-rel="lightcase:myCollection">
                                    <img src="img/gallery/2.jpg" alt="Image">
                                    <span class="ltn__gallery-action-icon">
                                        <i class="far fa-file-alt"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="ltn__gallery-item-info">
                                <h4><a href="portfolio-details.html">Inline Description </a></h4>
                                <p>Web Design & Development, Branding</p>
                            </div>
                        </div>
                    </div> -->

                        <!-- gallery-item -->
                        <!-- <div class="ltn__gallery-item filter_category_1 col-md-4 col-sm-6 col-12">
                        <div class="ltn__gallery-item-inner">
                            <div class="ltn__gallery-item-img">
                                <a href="//www.youtube.com/embed/6v2L2UGZJAM?version=3" data-rel="lightcase:myCollection">
                                    <img src="img/gallery/3.jpg" alt="Image">
                                    <span class="ltn__gallery-action-icon">
                                        <i class="fab fa-youtube"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="ltn__gallery-item-info">
                                <h4><a href="portfolio-details.html">Youtube Video </a></h4>
                                <p>Web Design & Development, Branding</p>
                            </div>
                        </div>
                    </div> -->
                        <!-- gallery-item -->
                        <!-- <div class="ltn__gallery-item filter_category_3 col-md-4 col-sm-6 col-12">
                        <div class="ltn__gallery-item-inner">
                            <div class="ltn__gallery-item-img">
                                <a href="//player.vimeo.com/video/49583118?version=3" data-rel="lightcase:myCollection">
                                    <img src="img/gallery/4.jpg" alt="Image">
                                    <span class="ltn__gallery-action-icon">
                                        <i class="fab fa-vimeo-v"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="ltn__gallery-item-info">
                                <h4><a href="portfolio-details.html">Vimeo Video </a></h4>
                                <p>Web Design & Development, Branding</p>
                            </div>
                        </div>
                    </div> -->
                        <!-- gallery-item -->
                        <!-- <div class="ltn__gallery-item filter_category_2 col-md-4 col-sm-6 col-12">
                        <div class="ltn__gallery-item-inner">
                            <div class="ltn__gallery-item-img">
                                <a href="media/1.mp4" data-rel="lightcase:myCollection">
                                    <img src="img/gallery/5.jpg" alt="Image">
                                    <span class="ltn__gallery-action-icon">
                                        <i class="fas fa-video"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="ltn__gallery-item-info">
                                <h4><a href="portfolio-details.html">HTML5 Video </a></h4>
                                <p>Web Design & Development, Branding</p>
                            </div>
                        </div>
                    </div> -->
                        <!-- gallery-item -->
                        <!-- <div class="ltn__gallery-item filter_category_1 col-md-4 col-sm-6 col-12">
                        <div class="ltn__gallery-item-inner">
                            <div class="ltn__gallery-item-img">
                                <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1575.9076122223137!2d144.96590401578402!3d-37.81779982944919!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642b6af832249%3A0xe39e415e49a7c44e!2sFlinders%20Street%20Railway%20Station!5e0!3m2!1sen!2sbd!4v1598113544515!5m2!1sen!2sbd" data-rel="lightcase:myCollection">
                                    <img src="img/gallery/6.jpg" alt="Image">
                                    <span class="ltn__gallery-action-icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="ltn__gallery-item-info">
                                <h4><a href="portfolio-details.html">Google Map </a></h4>
                                <p>Web Design & Development, Branding</p>
                            </div>
                        </div>
                    </div> -->
                        <!-- gallery-item -->
                        <!-- <div class="ltn__gallery-item filter_category_3 col-md-4 col-sm-6 col-12">
                        <div class="ltn__gallery-item-inner">
                            <div class="ltn__gallery-item-img">
                                <a href="img/gallery/1.jpg" data-rel="lightcase:myCollection" data-lc-caption="Your caption Here">
                                    <img src="img/gallery/7.jpg" alt="Image">
                                    <span class="ltn__gallery-action-icon">
                                        <i class="fab fa-acquisitions-incorporated"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="ltn__gallery-item-info">
                                <h4><a href="portfolio-details.html">Image Caption </a></h4>
                                <p>Web Design & Development, Branding</p>
                            </div>
                        </div>
                    </div> -->
                        <!-- gallery-item -->
                        <!-- <div class="ltn__gallery-item filter_category_2 col-md-4 col-sm-6 col-12">
                        <div class="ltn__gallery-item-inner">
                            <div class="ltn__gallery-item-img">
                                <a href="img/gallery/no-image.jpg" data-rel="lightcase:myCollection">
                                    <img src="img/gallery/8.jpg" alt="Image">
                                    <span class="ltn__gallery-action-icon">
                                        <i class="fas fa-not-equal"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="ltn__gallery-item-info">
                                <h4><a href="portfolio-details.html">Not Found</a></h4>
                                <p>Web Design & Development, Branding</p>
                            </div>
                        </div>
                    </div> -->
                        <!-- gallery-item -->
                        <!-- <div class="ltn__gallery-item filter_category_1 col-md-4 col-sm-6 col-12">
                        <div class="ltn__gallery-item-inner">
                            <div class="ltn__gallery-item-img">
                                <a href="img/gallery/1.jpg" data-rel="lightcase:myCollection">
                                    <img src="img/gallery/9.jpg" alt="Image">
                                    <span class="ltn__gallery-action-icon">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="ltn__gallery-item-info">
                                <h4><a href="portfolio-details.html">Portfolio Link </a></h4>
                                <p>Web Design & Development, Branding</p>
                            </div>
                        </div>
                    </div> -->
                        <!-- gallery-item -->
                        <!-- <div class="ltn__gallery-item filter_category_3 col-md-4 col-sm-6 col-12">
                        <div class="ltn__gallery-item-inner">
                            <div class="ltn__gallery-item-img">
                                <a href="img/gallery/1.jpg" data-rel="lightcase:myCollection">
                                    <img src="img/gallery/10.jpg" alt="Image">
                                    <span class="ltn__gallery-action-icon">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="ltn__gallery-item-info">
                                <h4><a href="portfolio-details.html">Portfolio Link </a></h4>
                                <p>Web Design & Development, Branding</p>
                            </div>
                        </div>
                    </div> -->
                        <!-- gallery-item -->
                        <!-- <div class="ltn__gallery-item filter_category_2 col-md-4 col-sm-6 col-12">
                        <div class="ltn__gallery-item-inner">
                            <div class="ltn__gallery-item-img">
                                <a href="img/gallery/1.jpg" data-rel="lightcase:myCollection">
                                    <img src="img/gallery/1.jpg" alt="Image">
                                    <span class="ltn__gallery-action-icon">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="ltn__gallery-item-info">
                                <h4><a href="portfolio-details.html">Portfolio Link </a></h4>
                                <p>Web Design & Development, Branding</p>
                            </div>
                        </div>
                    </div> -->
                        <!-- gallery-item -->
                        <!-- <div class="ltn__gallery-item filter_category_1 col-md-4 col-sm-6 col-12">
                        <div class="ltn__gallery-item-inner">
                            <div class="ltn__gallery-item-img">
                                <a href="img/gallery/1.jpg" data-rel="lightcase:myCollection">
                                    <img src="img/gallery/2.jpg" alt="Image">
                                    <span class="ltn__gallery-action-icon">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="ltn__gallery-item-info">
                                <h4><a href="portfolio-details.html">Portfolio Link </a></h4>
                                <p>Web Design & Development, Branding</p>
                            </div>
                        </div>
                    </div>                 -->
                    </div>

                    <div id="ltn__inline_description_1" style="display: none;">
                        <h4 class="first">This content comes from a hidden element on that page</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis mi eu elit tempor
                            facilisis id et neque. Nulla sit amet sem sapien. Vestibulum imperdiet porta ante ac ornare.
                            Nulla et lorem eu nibh adipiscing ultricies nec at lacus. Cras laoreet ultricies sem, at
                            blandit mi eleifend aliquam. Nunc enim ipsum, vehicula non pretium varius, cursus ac tortor.
                        </p>
                        <p>Vivamus fringilla congue laoreet. Quisque ultrices sodales orci, quis rhoncus justo auctor
                            in. Phasellus dui eros, bibendum eu feugiat ornare, faucibus eu mi. Nunc aliquet tempus sem,
                            id aliquam diam varius ac. Maecenas nisl nunc, molestie vitae eleifend vel.</p>
                    </div>

                    <div class="btn-wrapper text-center">
                        <a href="#" class="btn btn-transparent btn-effect-1 btn-border">LOAD MORE +</a>
                    </div>

                    <!-- pagination start -->
                    <!-- 
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ltn__pagination text-center margin-top-50">
                            <ul>
                                <li class="arrow-icon"><a href="#"> &leftarrow; </a></li>
                                <li class="active"><a href="blog.html">1</a></li>
                                <li><a href="blog-2.html">2</a></li>
                                <li><a href="blog-2.html">3</a></li>
                                <li><a href="blog-2.html">...</a></li>
                                <li><a href="blog-2.html">10</a></li>
                                <li class="arrow-icon"><a href="#"> &rightarrow; </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                -->
                    <!-- pagination end -->

                </div>
            </div>

        </div>

        <!-- ABOUT US AREA START -->
        <!-- <div class="ltn__about-us-area pt-60 pb-90 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="about-us-info-wrap">
                        <div class="section-title-area ltn__section-title-2--- mb-30">
                            <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">About Us</h6>
                            <h1 class="section-title">Top Selling Projects in Chennai </h1>
                            <p>Houzez allow you to design unlimited panels and real estate custom
                                forms to capture leads and keep record of all information</p>
                        </div>
                        <ul class="ltn__list-item-1 ltn__list-item-1-before clearfix">
                            <li> Live Music Cocerts at Luviana</li>
                            <li>Our SecretIsland Boat Tour is Just for You</li>
                            <li>Live Music Cocerts at Luviana</li>
                            <li>Live Music Cocerts at Luviana</li>
                        </ul>
                        <ul class="ltn__list-item-2 ltn__list-item-2-before ltn__flat-info">
                            <li><span>3 <i class="flaticon-bed"></i></span>
                                Bedrooms
                            </li>
                            <li><span>2 <i class="flaticon-clean"></i></span>
                                Bathrooms
                            </li>
                            <li><span>2 <i class="flaticon-car"></i></span>
                                Car parking
                            </li>
                            <li><span>3450 <i class="flaticon-square-shape-design-interface-tool-symbol"></i></span>
                                square Ft
                            </li>
                        </ul>
                        <ul class="ltn__list-item-2 ltn__list-item-2-before--- ltn__list-item-2-img mb-50">
                            <li>
                                <a href="img/img-slide/11.jpg" data-rel="lightcase:myCollection">
                                    <img src="img/img-slide/11.jpg" alt="Image">
                                </a>
                            </li>
                            <li>
                                <a href="img/img-slide/12.jpg" data-rel="lightcase:myCollection">
                                    <img src="img/img-slide/12.jpg" alt="Image">
                                </a>
                            </li>
                            <li>
                                <a href="img/img-slide/13.jpg" data-rel="lightcase:myCollection">
                                    <img src="img/img-slide/13.jpg" alt="Image">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="about-us-img-wrap about-img-right">
                        <img src="img/others/9.png" alt="About Us Image">
                    </div>
                </div>
            </div>
        </div>
    </div> -->
        <!-- ABOUT US AREA END -->

        <!-- FEATURE AREA START ( Feature - 6) -->
        <div class="ltn__feature-area section-bg-1 pt-120 pb-90 mb-120---">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area ltn__section-title-2--- text-center">
                            <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">Our Services</h6>
                            <h1 class="section-title">Our Main Focus</h1>
                        </div>
                    </div>
                </div>
                <div class="row ltn__custom-gutter--- justify-content-center">
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="ltn__feature-item ltn__feature-item-6 text-center bg-white  box-shadow-1">
                            <div class="ltn__feature-icon">
                                <!-- <span><i class="flaticon-house"></i></span> -->
                                <img src="img/icons/icon-img/21.png" alt="#">
                            </div>
                            <div class="ltn__feature-info">
                                <h3><a href="service-details.html">Buy a home</a></h3>
                                <p>over 1 million+ homes for sale available on the website, we can match you with a
                                    house you will want to call home.</p>
                                <a class="ltn__service-btn" href="service-details.html">Find A Home <i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="ltn__feature-item ltn__feature-item-6 text-center bg-white  box-shadow-1 active">
                            <div class="ltn__feature-icon">
                                <!-- <span><i class="flaticon-house-3"></i></span> -->
                                <img src="img/icons/icon-img/22.png" alt="#">
                            </div>
                            <div class="ltn__feature-info">
                                <h3><a href="service-details.html">Rent a home</a></h3>
                                <p>over 1 million+ homes for sale available on the website, we can match you with a
                                    house you will want to call home.</p>
                                <a class="ltn__service-btn" href="service-details.html">Find A Home <i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="ltn__feature-item ltn__feature-item-6 text-center bg-white  box-shadow-1">
                            <div class="ltn__feature-icon">
                                <!-- <span><i class="flaticon-deal-1"></i></span> -->
                                <img src="img/icons/icon-img/23.png" alt="#">
                            </div>
                            <div class="ltn__feature-info">
                                <h3><a href="service-details.html">Sell a home</a></h3>
                                <p>over 1 million+ homes for sale available on the website, we can match you with a
                                    house you will want to call home.</p>
                                <a class="ltn__service-btn" href="service-details.html">Find A Home <i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FEATURE AREA END -->

        <!-- PRODUCT SLIDER AREA START -->
        <div class="ltn__product-slider-area ltn__product-gutter pt-115 pb-70">
            <div class="container">
                <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">Property</h6>
                        <h1 class="section-title">Latest Listings</h1>
                    </div>
                </div>
            </div> -->
                <div class="row ltn__product-slider-item-three-active slick-arrow-1">
                    <!-- ltn__product-item -->
                    <!-- <div class="col-xl-4 col-sm-6 col-12">
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
                                        <a href="locations.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
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
                                        <a href="product-details.html" title="Product Details">
                                            <i class="flaticon-add"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info-bottom">
                            <div class="product-price">
                                <span>$34,900<label>/Month</label></span>
                            </div>
                        </div>
                    </div>
                </div> -->
                    <!-- ltn__product-item -->
                    <!-- <div class="col-xl-4 col-sm-6 col-12">
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
                                        <a href="locations.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
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
                                        <a href="product-details.html" title="Product Details">
                                            <i class="flaticon-add"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info-bottom">
                            <div class="product-price">
                                <span>$34,900<label>/Month</label></span>
                            </div>
                        </div>
                    </div>
                </div> -->
                    <!-- ltn__product-item -->
                    <!-- <div class="col-xl-4 col-sm-6 col-12">
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
                                        <a href="locations.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
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
                                        <a href="product-details.html" title="Product Details">
                                            <i class="flaticon-add"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info-bottom">
                            <div class="product-price">
                                <span>$34,900<label>/Month</label></span>
                            </div>
                        </div>
                    </div>
                </div> -->
                    <!-- ltn__product-item -->
                    <!-- <div class="col-xl-4 col-sm-6 col-12">
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
                                        <a href="locations.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
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
                                        <a href="product-details.html" title="Product Details">
                                            <i class="flaticon-add"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info-bottom">
                            <div class="product-price">
                                <span>$34,900<label>/Month</label></span>
                            </div>
                        </div>
                    </div>
                </div> -->
                    <!-- ltn__product-item -->
                    <!-- <div class="col-xl-4 col-sm-6 col-12">
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
                                        <a href="locations.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
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
                                        <a href="product-details.html" title="Product Details">
                                            <i class="flaticon-add"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info-bottom">
                            <div class="product-price">
                                <span>$34,900<label>/Month</label></span>
                            </div>
                        </div>
                    </div>
                </div> -->
                    <!-- ltn__product-item -->
                    <!-- <div class="col-xl-4 col-sm-6 col-12">
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
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badg">For Rent</li>
                                </ul>
                            </div>
                            <h2 class="product-title"><a href="product-details.html">New Apartment Nice View</a></h2>
                            <div class="product-img-location">
                                <ul>
                                    <li>
                                        <a href="locations.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
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
                                        <a href="product-details.html" title="Product Details">
                                            <i class="flaticon-add"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info-bottom">
                            <div class="product-price">
                                <span>$34,900<label>/Month</label></span>
                            </div>
                        </div>
                    </div>
                </div> -->
                    <!--  -->
                </div>
            </div>
        </div>
        <!-- PRODUCT SLIDER AREA END -->

        <!-- IMAGE SLIDER AREA START (img-slider-3) -->
        <!-- <div class="ltn__img-slider-area">
        <div class="container-fluid">
            <div class="row ltn__image-slider-4-active slick-arrow-1 slick-arrow-1-inner ltn__no-gutter-all">
                <div class="col-lg-12">
                    <div class="ltn__img-slide-item-4">
                        <a href="img/img-slide/21.jpg" data-rel="lightcase:myCollection">
                            <img src="img/img-slide/21.jpg" alt="Image">
                        </a>
                        <div class="ltn__img-slide-info">
                            <div class="ltn__img-slide-info-brief">
                                <h6>Heart of NYC</h6>
                                <h1><a href="portfolio-details.html">Manhattan </a></h1>
                            </div>
                            <div class="btn-wrapper">
                                <a href="portfolio-details.html" class="btn theme-btn-1 btn-effect-1 text-uppercase">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__img-slide-item-4">
                        <a href="img/img-slide/22.jpg" data-rel="lightcase:myCollection">
                            <img src="img/img-slide/22.jpg" alt="Image">
                        </a>
                        <div class="ltn__img-slide-info">
                            <div class="ltn__img-slide-info-brief">
                                <h6>The luxury crib</h6>
                                <h1><a href="portfolio-details.html">Upper East Side</a></h1>
                            </div>
                            <div class="btn-wrapper">
                                <a href="portfolio-details.html" class="btn theme-btn-1 btn-effect-1 text-uppercase">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__img-slide-item-4">
                        <a href="img/img-slide/23.jpg" data-rel="lightcase:myCollection">
                            <img src="img/img-slide/23.jpg" alt="Image">
                        </a>
                        <div class="ltn__img-slide-info">
                            <div class="ltn__img-slide-info-brief">
                                <h6>The Best City</h6>
                                <h1><a href="portfolio-details.html">Jersey City</a></h1>
                            </div>
                            <div class="btn-wrapper">
                                <a href="portfolio-details.html" class="btn theme-btn-1 btn-effect-1 text-uppercase">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__img-slide-item-4">
                        <a href="img/img-slide/24.jpg" data-rel="lightcase:myCollection">
                            <img src="img/img-slide/24.jpg" alt="Image">
                        </a>
                        <div class="ltn__img-slide-info">
                            <div class="ltn__img-slide-info-brief">
                                <h6>Friendly neighborhood</h6>
                                <h1><a href="portfolio-details.html">Queens </a></h1>
                            </div>
                            <div class="btn-wrapper">
                                <a href="portfolio-details.html" class="btn theme-btn-1 btn-effect-1 text-uppercase">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__img-slide-item-4">
                        <a href="img/img-slide/22.jpg" data-rel="lightcase:myCollection">
                            <img src="img/img-slide/22.jpg" alt="Image">
                        </a>
                        <div class="ltn__img-slide-info">
                            <div class="ltn__img-slide-info-brief">
                                <h6>The perfect city</h6>
                                <h1><a href="portfolio-details.html">Greenville</a></h1>
                            </div>
                            <div class="btn-wrapper">
                                <a href="portfolio-details.html" class="btn theme-btn-1 btn-effect-1 text-uppercase">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
        <!-- IMAGE SLIDER AREA END -->

        <!-- BRAND LOGO AREA START -->
        <div class="ltn__brand-logo-area ltn__brand-logo-1 pt-50--- pb-110 plr--9">
            <div class="container-fluid">
                <div class="row ltn__brand-logo-active">
                    <div class="col-lg-12">
                        <div class="ltn__brand-logo-item">
                            <img src="img/brand-logo/1.png" alt="Brand Logo">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="ltn__brand-logo-item">
                            <img src="img/brand-logo/2.png" alt="Brand Logo">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="ltn__brand-logo-item">
                            <img src="img/brand-logo/3.png" alt="Brand Logo">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="ltn__brand-logo-item">
                            <img src="img/brand-logo/4.png" alt="Brand Logo">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="ltn__brand-logo-item">
                            <img src="img/brand-logo/5.png" alt="Brand Logo">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="ltn__brand-logo-item">
                            <img src="img/brand-logo/3.png" alt="Brand Logo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BRAND LOGO AREA END -->

        <!-- APARTMENTS PLAN AREA START -->
        <div class="ltn__apartments-plan-area pt-50 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area ltn__section-title-2--- text-center">
                            <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">Apartment Sketch</h6>
                            <h1 class="section-title">Apartments Plan</h1>
                        </div>
                        <div class="ltn__tab-menu ltn__tab-menu-3 ltn__tab-menu-top-right-- text-uppercase--- text-center">
                            <div class="nav">
                                <a data-toggle="tab" href="#liton_tab_3_1">The Studio</a>
                                <a class="active show" data-toggle="tab" href="#liton_tab_3_2">Deluxe Portion</a>
                                <a data-toggle="tab" href="#liton_tab_3_3" class="">Penthouse</a>
                                <a data-toggle="tab" href="#liton_tab_3_4" class="">Top Garden</a>
                                <a data-toggle="tab" href="#liton_tab_3_5" class="">Double Height</a>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade" id="liton_tab_3_1">
                                <div class="ltn__apartments-tab-content-inner">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="apartments-plan-info ltn__secondary-bg text-color-white">
                                                <h2>The Studio</h2>
                                                <p>Enimad minim veniam quis nostrud exercitation ullamco laboris.
                                                    Lorem ipsum dolor sit amet cons aetetur adipisicing elit sedo
                                                    eiusmod tempor.Incididunt labore et dolore magna aliqua.
                                                    sed ayd minim veniam.</p>
                                                <div class="apartments-info-list apartments-info-list-color mt-40">
                                                    <ul>
                                                        <li><label>Total Area</label> <span>2800 Sq. Ft</span></li>
                                                        <li><label>Bedroom</label> <span>150 Sq. Ft</span></li>
                                                        <li><label>Bathroom</label> <span>45 Sq. Ft</span></li>
                                                        <li><label>Belcony/Pets</label> <span>Allowed</span></li>
                                                        <li><label>Lounge</label> <span>650 Sq. Ft</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="apartments-plan-img">
                                                <img src="img/others/10.png" alt="#">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade active show" id="liton_tab_3_2">
                                <div class="ltn__product-tab-content-inner">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="apartments-plan-info ltn__secondary-bg text-color-white">
                                                <h2>Deluxe Portion</h2>
                                                <p>Enimad minim veniam quis nostrud exercitation ullamco laboris.
                                                    Lorem ipsum dolor sit amet cons aetetur adipisicing elit sedo
                                                    eiusmod tempor.Incididunt labore et dolore magna aliqua.
                                                    sed ayd minim veniam.</p>
                                                <div class="apartments-info-list apartments-info-list-color mt-40">
                                                    <ul>
                                                        <li><label>Total Area</label> <span>2800 Sq. Ft</span></li>
                                                        <li><label>Bedroom</label> <span>150 Sq. Ft</span></li>
                                                        <li><label>Bathroom</label> <span>45 Sq. Ft</span></li>
                                                        <li><label>Belcony/Pets</label> <span>Allowed</span></li>
                                                        <li><label>Lounge</label> <span>650 Sq. Ft</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="apartments-plan-img">
                                                <img src="img/others/10.png" alt="#">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="liton_tab_3_3">
                                <div class="ltn__product-tab-content-inner">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="apartments-plan-info ltn__secondary-bg text-color-white">
                                                <h2>Penthouse</h2>
                                                <p>Enimad minim veniam quis nostrud exercitation ullamco laboris.
                                                    Lorem ipsum dolor sit amet cons aetetur adipisicing elit sedo
                                                    eiusmod tempor.Incididunt labore et dolore magna aliqua.
                                                    sed ayd minim veniam.</p>
                                                <div class="apartments-info-list apartments-info-list-color mt-40">
                                                    <ul>
                                                        <li><label>Total Area</label> <span>2800 Sq. Ft</span></li>
                                                        <li><label>Bedroom</label> <span>150 Sq. Ft</span></li>
                                                        <li><label>Bathroom</label> <span>45 Sq. Ft</span></li>
                                                        <li><label>Belcony/Pets</label> <span>Allowed</span></li>
                                                        <li><label>Lounge</label> <span>650 Sq. Ft</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="apartments-plan-img">
                                                <img src="img/others/10.png" alt="#">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="liton_tab_3_4">
                                <div class="ltn__product-tab-content-inner">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="apartments-plan-info ltn__secondary-bg text-color-white">
                                                <h2>Top Garden</h2>
                                                <p>Enimad minim veniam quis nostrud exercitation ullamco laboris.
                                                    Lorem ipsum dolor sit amet cons aetetur adipisicing elit sedo
                                                    eiusmod tempor.Incididunt labore et dolore magna aliqua.
                                                    sed ayd minim veniam.</p>
                                                <div class="apartments-info-list apartments-info-list-color mt-40">
                                                    <ul>
                                                        <li><label>Total Area</label> <span>2800 Sq. Ft</span></li>
                                                        <li><label>Bedroom</label> <span>150 Sq. Ft</span></li>
                                                        <li><label>Bathroom</label> <span>45 Sq. Ft</span></li>
                                                        <li><label>Belcony/Pets</label> <span>Allowed</span></li>
                                                        <li><label>Lounge</label> <span>650 Sq. Ft</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="apartments-plan-img">
                                                <img src="img/others/10.png" alt="#">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="liton_tab_3_5">
                                <div class="ltn__product-tab-content-inner">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="apartments-plan-info ltn__secondary-bg text-color-white">
                                                <h2>Double Height</h2>
                                                <p>Enimad minim veniam quis nostrud exercitation ullamco laboris.
                                                    Lorem ipsum dolor sit amet cons aetetur adipisicing elit sedo
                                                    eiusmod tempor.Incididunt labore et dolore magna aliqua.
                                                    sed ayd minim veniam.</p>
                                                <div class="apartments-info-list apartments-info-list-color mt-40">
                                                    <ul>
                                                        <li><label>Total Area</label> <span>2800 Sq. Ft</span></li>
                                                        <li><label>Bedroom</label> <span>150 Sq. Ft</span></li>
                                                        <li><label>Bathroom</label> <span>45 Sq. Ft</span></li>
                                                        <li><label>Belcony/Pets</label> <span>Allowed</span></li>
                                                        <li><label>Lounge</label> <span>650 Sq. Ft</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="apartments-plan-img">
                                                <img src="img/others/10.png" alt="#">
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
        <!-- APARTMENTS PLAN AREA END -->

        <!-- TESTIMONIAL AREA START (testimonial-7) -->
        <div class="ltn__testimonial-area section-bg-1--- bg-image-top pt-115 pb-70" data-bg="img/bg/20.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area ltn__section-title-2--- text-center">
                            <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">Our Testimonial</h6>
                            <h1 class="section-title">Clients Feedback</h1>
                        </div>
                    </div>
                </div>
                <div class="row ltn__testimonial-slider-5-active slick-arrow-1">
                    <div class="col-lg-4">
                        <div class="ltn__testimonial-item ltn__testimonial-item-7">
                            <div class="ltn__testimoni-info">
                                <p><i class="flaticon-left-quote-1"></i>
                                    Precious ipsum dolor sit amet
                                    consectetur adipisicing elit, sed dos
                                    mod tempor incididunt ut labore et
                                    dolore magna aliqua. Ut enim ad min
                                    veniam, quis nostrud Precious ips
                                    um dolor sit amet, consecte</p>
                                <div class="ltn__testimoni-info-inner">
                                    <div class="ltn__testimoni-img">
                                        <img src="img/testimonial/1.jpg" alt="#">
                                    </div>
                                    <div class="ltn__testimoni-name-designation">
                                        <h5>Jacob William</h5>
                                        <label>Selling Agents</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ltn__testimonial-item ltn__testimonial-item-7">
                            <div class="ltn__testimoni-info">
                                <p><i class="flaticon-left-quote-1"></i>
                                    Precious ipsum dolor sit amet
                                    consectetur adipisicing elit, sed dos
                                    mod tempor incididunt ut labore et
                                    dolore magna aliqua. Ut enim ad min
                                    veniam, quis nostrud Precious ips
                                    um dolor sit amet, consecte</p>
                                <div class="ltn__testimoni-info-inner">
                                    <div class="ltn__testimoni-img">
                                        <img src="img/testimonial/1.jpg" alt="#">
                                    </div>
                                    <div class="ltn__testimoni-name-designation">
                                        <h5>Jacob William</h5>
                                        <label>Selling Agents</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ltn__testimonial-item ltn__testimonial-item-7">
                            <div class="ltn__testimoni-info">
                                <p><i class="flaticon-left-quote-1"></i>
                                    Precious ipsum dolor sit amet
                                    consectetur adipisicing elit, sed dos
                                    mod tempor incididunt ut labore et
                                    dolore magna aliqua. Ut enim ad min
                                    veniam, quis nostrud Precious ips
                                    um dolor sit amet, consecte</p>
                                <div class="ltn__testimoni-info-inner">
                                    <div class="ltn__testimoni-img">
                                        <img src="img/testimonial/1.jpg" alt="#">
                                    </div>
                                    <div class="ltn__testimoni-name-designation">
                                        <h5>Jacob William</h5>
                                        <label>Selling Agents</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ltn__testimonial-item ltn__testimonial-item-7">
                            <div class="ltn__testimoni-info">
                                <p><i class="flaticon-left-quote-1"></i>
                                    Precious ipsum dolor sit amet
                                    consectetur adipisicing elit, sed dos
                                    mod tempor incididunt ut labore et
                                    dolore magna aliqua. Ut enim ad min
                                    veniam, quis nostrud Precious ips
                                    um dolor sit amet, consecte</p>
                                <div class="ltn__testimoni-info-inner">
                                    <div class="ltn__testimoni-img">
                                        <img src="img/testimonial/1.jpg" alt="#">
                                    </div>
                                    <div class="ltn__testimoni-name-designation">
                                        <h5>Jacob William</h5>
                                        <label>Selling Agents</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                </div>
            </div>
        </div>
        <!-- TESTIMONIAL AREA END -->

        <!-- BLOG AREA START (blog-3) -->
        <div class="ltn__blog-area pt-115--- pb-70">
            <div class="container">
                <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">News & Blogs</h6>
                        <h1 class="section-title">Resell Property</h1>
                    </div>
                </div>
            </div> -->
                <div class="row  ltn__blog-slider-one-active slick-arrow-1 ltn__blog-item-3-normal">
                    <!-- Blog Item -->
                    <div class="col-lg-12">
                        <!-- <div class="ltn__blog-item ltn__blog-item-3">
                        <div class="ltn__blog-img">
                            <a href="blog-details.html"><img src="img/blog/1.jpg" alt="#"></a>
                        </div>
                        <div class="ltn__blog-brief">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-author">
                                        <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                    </li>
                                    <li class="ltn__blog-tags">
                                        <a href="#"><i class="fas fa-tags"></i>Decorate</a>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="ltn__blog-title"><a href="blog-details.html">10 Brilliant Ways To Decorate Your Home</a></h3>
                            <div class="ltn__blog-meta-btn">
                                <div class="ltn__blog-meta">
                                    <ul>
                                        <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>June 24, 2021</li>
                                    </ul>
                                </div>
                                <div class="ltn__blog-btn">
                                    <a href="blog-details.html">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    </div>
                    <!-- Blog Item -->
                    <div class="col-lg-12">
                        <!-- <div class="ltn__blog-item ltn__blog-item-3">
                        <div class="ltn__blog-img">
                            <a href="blog-details.html"><img src="img/blog/2.jpg" alt="#"></a>
                        </div>
                        <div class="ltn__blog-brief">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-author">
                                        <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                    </li>
                                    <li class="ltn__blog-tags">
                                        <a href="#"><i class="fas fa-tags"></i>Interior</a>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="ltn__blog-title"><a href="blog-details.html">The Most Inspiring Interior Design Of 2021</a></h3>
                            <div class="ltn__blog-meta-btn">
                                <div class="ltn__blog-meta">
                                    <ul>
                                        <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>July 23, 2021</li>
                                    </ul>
                                </div>
                                <div class="ltn__blog-btn">
                                    <a href="blog-details.html">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    </div>
                    <!-- Blog Item -->
                    <div class="col-lg-12">
                        <!-- <div class="ltn__blog-item ltn__blog-item-3">
                        <div class="ltn__blog-img">
                            <a href="blog-details.html"><img src="img/blog/3.jpg" alt="#"></a>
                        </div>
                        <div class="ltn__blog-brief">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-author">
                                        <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                    </li>
                                    <li class="ltn__blog-tags">
                                        <a href="#"><i class="fas fa-tags"></i>Estate</a>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="ltn__blog-title"><a href="blog-details.html">Recent Commercial Real Estate Transactions</a></h3>
                            <div class="ltn__blog-meta-btn">
                                <div class="ltn__blog-meta">
                                    <ul>
                                        <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>May 22, 2021</li>
                                    </ul>
                                </div>
                                <div class="ltn__blog-btn">
                                    <a href="blog-details.html">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    </div>
                    <!-- Blog Item -->
                    <div class="col-lg-12">
                        <!-- <div class="ltn__blog-item ltn__blog-item-3">
                        <div class="ltn__blog-img">
                            <a href="blog-details.html"><img src="img/blog/4.jpg" alt="#"></a>
                        </div>
                        <div class="ltn__blog-brief">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-author">
                                        <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                    </li>
                                    <li class="ltn__blog-tags">
                                        <a href="#"><i class="fas fa-tags"></i>Room</a>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="ltn__blog-title"><a href="blog-details.html">Renovating a Living Room? Experts Share Their Secrets</a></h3>
                            <div class="ltn__blog-meta-btn">
                                <div class="ltn__blog-meta">
                                    <ul>
                                        <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>June 24, 2021</li>
                                    </ul>
                                </div>
                                <div class="ltn__blog-btn">
                                    <a href="blog-details.html">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    </div>
                    <!-- Blog Item -->
                    <div class="col-lg-12">
                        <!-- <div class="ltn__blog-item ltn__blog-item-3">
                        <div class="ltn__blog-img">
                            <a href="blog-details.html"><img src="img/blog/5.jpg" alt="#"></a>
                        </div>
                        <div class="ltn__blog-brief">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-author">
                                        <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                    </li>
                                    <li class="ltn__blog-tags">
                                        <a href="#"><i class="fas fa-tags"></i>Trends</a>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="ltn__blog-title"><a href="blog-details.html">7 home trends that will shape your house in 2021</a></h3>
                            <div class="ltn__blog-meta-btn">
                                <div class="ltn__blog-meta">
                                    <ul>
                                        <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>June 24, 2021</li>
                                    </ul>
                                </div>
                                <div class="ltn__blog-btn">
                                    <a href="blog-details.html">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    </div>
                    <!--  -->
                </div>
            </div>
        </div>
        <!-- BLOG AREA END -->

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
                                <p>Lorem Ipsum is simply dummy text of the and typesetting industry. Lorem Ipsum is
                                    dummy text of the printing.</p>
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
                                                <h3><a href="product-details.html">3 Rooms Manhattan</a></h3>
                                                <div class="product-price">
                                                    <span>$34,900</span>
                                                    <del>$36,500</del>
                                                </div>
                                                <hr>
                                                <div class="modal-product-brief">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                        Dignissimos repellendus repudiandae incidunt quidem pariatur
                                                        expedita, quo quis modi tempore non.</p>
                                                </div>
                                                <div class="modal-product-meta ltn__product-details-menu-1 d-none">
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
                                                <div class="ltn__product-details-menu-2 d-none">
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
                                                <!-- <hr> -->
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
                                                <label class="float-right mb-0"><a class="text-decoration" href="product-details.html"><small>View
                                                            Details</small></a></label>
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
                                                <p class="added-cart"><i class="fa fa-check-circle"></i> Successfully
                                                    added to your Cart</p>
                                                <div class="btn-wrapper">
                                                    <a href="cart.html" class="theme-btn-1 btn btn-effect-1">View
                                                        Cart</a>
                                                    <a href="checkout.html" class="theme-btn-2 btn btn-effect-2">Checkout</a>
                                                </div>
                                            </div>
                                            <!-- additional-info -->
                                            <div class="additional-info d-none">
                                                <p>We want to give you <b>10% discount</b> for your first order, <br>
                                                    Use discount code at checkout</p>
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
                                                <p class="added-cart"><i class="fa fa-check-circle"></i> Successfully
                                                    added to your Wishlist</p>
                                                <div class="btn-wrapper">
                                                    <a href="wishlist.html" class="theme-btn-1 btn btn-effect-1">View
                                                        Wishlist</a>
                                                </div>
                                            </div>
                                            <!-- additional-info -->
                                            <div class="additional-info d-none">
                                                <p>We want to give you <b>10% discount</b> for your first order, <br>
                                                    Use discount code at checkout</p>
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

    <!-- preloader area start -->
    <div class="preloader d-none" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>
    <!-- preloader area end -->

    <!-- All JS Plugins -->
    <script src="js/plugins.js"></script>
    <!-- Main JS -->
    <script src="js/main.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <!-- Include jQuery library -->
    <!-- Include jQuery UI for autocomplete -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const buttons = document.querySelectorAll('.ltn__gallery-filter-menu button');
            const items = document.querySelectorAll('.ltn__gallery-item');

            buttons.forEach(button => {
                button.addEventListener('click', () => {
                    const filter = button.getAttribute('data-filter');

                    items.forEach(item => {
                        if (item.classList.contains(filter.slice(1)) || filter === '*') {
                            item.classList.remove('hidden');
                        } else {
                            item.classList.add('hidden');
                        }
                    });

                    buttons.forEach(btn => btn.classList.remove('active'));
                    button.classList.add('active');
                });
            });
        });
    </script>

    <!-- Auto Complete uI -->

    <script>
        $(document).ready(function() {
            // Initialize autocomplete

            $('#search-input').on('keydown', function() {
                $serval = $(this).val();
                if ($serval.length >= 0) {

                    $("#search-input").autocomplete({
                        source: function(request, response) {
                            // AJAX request to fetch autocomplete suggestions
                            $.ajax({
                                url: "ajax.php", // Replace with your backend endpoint
                                method: "POST",
                                dataType: "json",
                                data: {
                                    term: request.term
                                },
                                success: function(data) {
                                    response(data.slice(0, 6)); // Display suggestions
                                },
                                error: function(err) {
                                    console.error("Error fetching autocomplete data:", err);
                                }
                            });
                        },
                        minLength: 1, // Minimum characters before triggering autocomplete
                        select: function(event, ui) {
                            // When an option is selected from autocomplete, set hidden fields
                            $('#type').val(ui.item.type); // Set type value
                            $('#pro_id').val(ui.item.pro_id); // Set pro_id value
                        }
                    });

                }
            });


        });
    </script>
    <script>
        $("#search").on('click',function(){
            var pro_id = $('#pro_id').val();
            var type = $('#type').val();
            if(type=="project"){
                location.href = "http://localhost/newwebsite/product-details.php?product_id=" + pro_id;
            }else{
                
            }
        });
    </script>
    <!-- Show and hide the properties Cato Wise -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Show only the apartment items on document ready
            filterItems('.readytomove');
        });

        function filterItems(category) {
            // Hide all gallery items
            var items = document.querySelectorAll('.ltn__gallery-item');
            items.forEach(function(item) {
                item.classList.remove('show');
            });

            // Show items that have the selected category
            var selectedItems = document.querySelectorAll(category);
            selectedItems.forEach(function(item) {
                item.classList.add('show');
            });
        }
    </script>

</body>

</html>