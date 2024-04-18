<!DOCTYPE html>
<html lang="en">
<?php require_once("./config.php"); 
?>
<?php
if (isset($_GET['sms'])) {

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2?authorization=iDJzjYUGRuHISxKycq2sEbZ1lM4X53FrBNdfkmAe768nCwLV0OrHLSRpWfCZa053xnchTvI8tJlzEGYb&sender_id=TXTIND&message=" . urlencode('This is a test message') . "&route=v3&numbers=" . urlencode('7404880600,8570996916'),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "cache-control: no-cache"
    ),
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    echo $response;
  }
}
?>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title><?php echo $SITE_NAME ?></title>
  <meta name="description" content="Place the meta description text here.">
  <meta property="og:title" content="Best Billing Software for Small &amp; Medium Businesses - Get Free Trail Now | Cloud Rasoi" />
  <meta property="og:site_name" content="Cloud Rasoi" />
  <meta property="article:tag" content="Accounting Software" />
  <meta property="article:tag" content="Billing Software" />
  <meta property="article:tag" content="GST Software" />
  <meta property="og:description" content="Billing software is an integral part of an accounting software package designed to handle time and billing tracking. Get a Free Cloud Rasoi Billing Software Trail Now" />
  <meta property="og:image" content="./assets/images/cloud-rasoi-logo.png">

  <link rel="shortcut icon" href="assets/images/fav.png" type="image/x-icon" />
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet" />
  <link rel="shortcut icon" href="assets/images/fav.jpg" />
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/fontawsom-all.min.css" />
  <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
  <link rel="apple-touch-icon" sizes="57x57" href="assets/images/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="assets/images/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="assets/images/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/images/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="assets/images/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="assets/images/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="assets/images/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="assets/images/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="assets/images/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="assets/images/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon/favicon-16x16.png">
  <link rel="manifest" href="assets/images/favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="assets/images/favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
</head>

<body>
  <!--########################### Header Starts Here ###################### -->
  <div class="home-screen container-fluid">
    <div class="home-cover">
      <div id="menu-jk" class="header">
        <div class="container">
          <div class="row">
            <div class="col-md-3 logo">
              <h1 style="padding: 1rem; color:red">Cloud Rasoi</h1>
              <!-- <img class="logo-wt" src="assets/images/logo.png" alt="" />
                <img
                  class="logo-gry"
                  src="assets/images/logo-gray.png"
                  alt=""
                /> -->

              <a data-toggle="collapse" data-target="#menu" href="#menu"><i class="fas d-block d-md-none small-menu fa-bars"></i></a>
            </div>
            <div id="menu" class="col-md-9 d-none d-md-block">
              <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#features">Features</a></li>
                <li><a href="#outlet">Outlet Type</a></li>
                <li><a href="#team">Team</a></li>
                <li><a href="#gallery">Gallery</a></li>
                <!-- <li><a href="#pricing">Pricing</a></li> -->
                <!-- <li><a href="#earn">Earn With Us</a></li> -->
                <li><a href="#cntact_us">Contact</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row home-detail">
          <div class="col-md-7 homexp">
            <h5>Welcome to</h5>
            <h2>Cloud Rasoi</h2>
            <span>Reasonable Pricing <a>(1 Month Trial Free)</a>
            </span>
            <p>We will make easy Billing, Montring and Fast Service.</p>
            <p>Professional Easy and Advance.</p>
            <a href="https://wa.me/918570996916?text=Welcome to Cloud Raosi. ">
              <button class="btn btn-success">Talk To Us</button>
            </a>
          </div>

          <div class="col-md-5 hom-form">
            <div class="registration-form row no-margin">
              <h5>Login to Cloud Rasoi</h5>

              <!-- <input placeholder="Enter Full Name" type="text" class="form-control "> -->
              <input placeholder="Enter UserID" id="mobile" type="text" class="form-control" />
              <input placeholder="Enter Password" id="password" type="password" class="form-control" />
              <!-- <textarea placeholder="Enter Message" name=""  rows="4" class="form-control form-control-sm"></textarea> -->
              <button type="submit" id="btnLogin" class="btn w-100 btn-success">Login</button>
              <button style="margin-top: 14px" class="btn w-100 btn-primary">
                Register with Us
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ################# Why Choos US Starts Here #######################--->

  <div class="why-choos-us container-fluid">
    <div class="container">
      <div class="session-title">
        <h2>Why Choos Us ?</h2>
        <p>More difference, less cost.</p>
      </div>
      <div class="why-ro row">
        <div class="col-lg-4 col-md-6">
          <div class="col-card">
            <div class="icon">
              <i class="far fa-calendar-plus"></i>
            </div>
            <div class="detail">
              <h4>Direct Digital World</h4>
              <p>
                Turpis accumsan. Proin id ligula suspendisse. Aliquet
                fringilla, aptent eu dignissim.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="col-card">
            <div class="icon">
              <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="detail">
              <h4>Value for Money</h4>
              <p>
                Turpis accumsan. Proin id ligula suspendisse. Aliquet
                fringilla, aptent eu dignissim.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="col-card">
            <div class="icon">
              <i class="far fa-heart"></i>
            </div>
            <div class="detail">
              <h4>Software with Trust</h4>
              <p>
                Turpis accumsan. Proin id ligula suspendisse. Aliquet
                fringilla, aptent eu dignissim.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="col-card">
            <div class="icon">
              <i class="fas fa-map-marked-alt"></i>
            </div>
            <div class="detail">
              <h4>Awesome Environment</h4>
              <p>
                Turpis accumsan. Proin id ligula suspendisse. Aliquet
                fringilla, aptent eu dignissim.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="col-card">
            <div class="icon">
              <i class="fa fa-microchip"></i>
            </div>
            <div class="detail">
              <h4>Technology You Need</h4>
              <p>
                Turpis accumsan. Proin id ligula suspendisse. Aliquet
                fringilla, aptent eu dignissim.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="col-card">
            <div class="icon">
              <i class="far fa-comments"></i>
            </div>
            <div class="detail">
              <h4>24 x 7 Support</h4>
              <p>
                Turpis accumsan. Proin id ligula suspendisse. Aliquet
                fringilla, aptent eu dignissim.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--################### Cources Starts Here #######################--->

  <div id="features" class="cources container-fluid">
    <div class="container">
      <div class="session-title row">
        <h2>Featrues</h2>
        <p>The software of your thoughts.</p>
      </div>
      <div class="cours-ro row">
        <div class="col-md-3 col-sm-6 cord-div">
          <div class="cours-card">
            <img src="assets/images/cour/pos-4.jpeg" alt="" />

            <div class="course-detail">
              <h5>Smart Billing</h5>
              <p>
                You Can Send the WhatsApp SMS of Bill to the Customer.
                Customer can see final amount on his Mobile Phone.
              </p>
            </div>
            <!-- <div class="footvb row no-margin">
                             <ul>
                                 <li>
                                     <i class="fa fa-user"></i> (23)
                                 </li>
                                 <li>
                                     <i class="far fa-comments"></i> (12)
                                 </li>
                                 <li class="orf">
                                     <i class="fas fa-dollar-sign"></i> 349
                                 </li>
                             </ul>
                         </div> -->
          </div>
        </div>

        <div class="col-md-3 col-sm-6 cord-div">
          <div class="cours-card">
            <img src="assets/images/cour/secure.jpeg" alt="" />

            <div class="course-detail">
              <h5>100% Secure</h5>
              <p>
                Your Data is 100% Secure. Without Your Permission No one can
                access your Data. Only you can access it and make any
                Transaction or Billing.
              </p>
            </div>
            <!-- <div class="footvb row no-margin">
                             <ul>
                                 <li>
                                     <i class="fa fa-user"></i> (23)
                                 </li>
                                 <li>
                                     <i class="far fa-comments"></i> (12)
                                 </li>
                                 <li class="orf">
                                     <i class="fas fa-dollar-sign"></i> 349
                                 </li>
                             </ul>
                         </div> -->
          </div>
        </div>

        <div class="col-md-3 col-sm-6 cord-div">
          <div class="cours-card">
            <img src="assets/images/cour/dr-5.jpeg" alt="" />

            <div class="course-detail">
              <h5>Best User Interface</h5>
              <p>
                Smooth and Easy user Interface. It's very easy to understand
                and Operate. i.e. Clear Communication Between you and your
                device.
              </p>
            </div>
            <!-- <div class="footvb row no-margin">
                             <ul>
                                 <li>
                                     <i class="fa fa-user"></i> (23)
                                 </li>
                                 <li>
                                     <i class="far fa-comments"></i> (12)
                                 </li>
                                 <li class="orf">
                                     <i class="fas fa-dollar-sign"></i> 349
                                 </li>
                             </ul>
                         </div> -->
          </div>
        </div>

        <div class="col-md-3 col-sm-6 cord-div">
          <div class="cours-card">
            <img src="assets/images/cour/dr-6.jpeg" alt="" />

            <div class="course-detail">
              <h5>Device Friendly</h5>
              <p>
                You can use it in any device (Laptop, Computer and Mobile
                Phone). View of portal is change accoding to your device.
              </p>
            </div>
            <!-- <div class="footvb row no-margin">
                             <ul>
                                 <li>
                                     <i class="fa fa-user"></i> (23)
                                 </li>
                                 <li>
                                     <i class="far fa-comments"></i> (12)
                                 </li>
                                 <li class="orf">
                                     <i class="fas fa-dollar-sign"></i> 349
                                 </li>
                             </ul>
                         </div> -->
          </div>
        </div>
      </div>
      <div class="cours-ro row">
        <div class="col-md-3 col-sm-6 cord-div">
          <div class="cours-card">
            <img src="assets/images/cour/pos-2.jpeg" alt="" />

            <div class="course-detail">
              <h5>Table & Roomwise Billing</h5>
              <p>
                Get orders separately form each table. <br />
                Unlimited No of Table & Rooms
              </p>
            </div>
            <!-- <div class="footvb row no-margin">
                             <ul>
                                 <li>
                                     <i class="fa fa-user"></i> (23)
                                 </li>
                                 <li>
                                     <i class="far fa-comments"></i> (12)
                                 </li>
                                 <li class="orf">
                                     <i class="fas fa-dollar-sign"></i> 349
                                 </li>
                             </ul>
                         </div> -->
          </div>
        </div>

        <div class="col-md-3 col-sm-6 cord-div">
          <div class="cours-card">
            <img src="assets/images/cour/pos.jpeg" alt="" />

            <div class="course-detail">
              <h5>Easy Admin Panel</h5>
              <p>
                Admin Can Monitor form Anywhere. <br />
                Form Mobile or Laptop Only Internet is Required
              </p>
            </div>
            <!-- <div class="footvb row no-margin">
                             <ul>
                                 <li>
                                     <i class="fa fa-user"></i> (23)
                                 </li>
                                 <li>
                                     <i class="far fa-comments"></i> (12)
                                 </li>
                                 <li class="orf">
                                     <i class="fas fa-dollar-sign"></i> 349
                                 </li>
                             </ul>
                         </div> -->
          </div>
        </div>

        <div class="col-md-3 col-sm-6 cord-div">
          <div class="cours-card">
            <img src="assets/images/cour/dr-3.webp" alt="" />

            <div class="course-detail">
              <h5>Customer Account</h5>
              <p>
                Customer Account Managment <br />
                All Payments History Record &<br />
                Keep Track Balance also.
              </p>
            </div>
            <!-- <div class="footvb row no-margin">
                             <ul>
                                 <li>
                                     <i class="fa fa-user"></i> (23)
                                 </li>
                                 <li>
                                     <i class="far fa-comments"></i> (12)
                                 </li>
                                 <li class="orf">
                                     <i class="fas fa-dollar-sign"></i> 349
                                 </li>
                             </ul>
                         </div> -->
          </div>
        </div>

        <div class="col-md-3 col-sm-6 cord-div">
          <div class="cours-card">
            <img src="assets/images/cour/pos-5.png" alt="" />

            <div class="course-detail">
              <h5>Diffrent Reports</h5>
              <p>
                Diffrent type of reports are Avilable. <br />
                Daily, Monthly, Weekly Reports
              </p>
            </div>
            <!-- <div class="footvb row no-margin">
                             <ul>
                                 <li>
                                     <i class="fa fa-user"></i> (23)
                                 </li>
                                 <li>
                                     <i class="far fa-comments"></i> (12)
                                 </li>
                                 <li class="orf">
                                     <i class="fas fa-dollar-sign"></i> 349
                                 </li>
                             </ul>
                         </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--################### Team Member Start Here #######################--->

  <section id="team" class="team-member contaienr-fluid">
    <div class="container">
      <div class="session-title">
        <h2>Our Team</h2>
        <p>
          None of us, including me, ever do great things. But we can all do
          small things, with great love, and together we can do something
          wonderful.
        </p>
      </div>
      <div class="row teamro">
        <div class="col-md-3 col-sm-6">
          <div class="our-team">
            <div class="pic">
              <img src="assets/images/team/dhull_cr.jpeg" />
            </div>
            <h3 class="title">ABHISHEK SINGH DHULL</h3>
            <span class="post">Web Developer</span>
          </div>
        </div>

        <div class="col-md-3 col-sm-6">
          <div class="our-team">
            <div class="pic">
              <img src="assets/images/team/sheokand_cr.jpeg" />
            </div>
            <h3 class="title">AJAY SHEOKAND</h3>
            <span class="post">Web Designer</span>
          </div>
        </div>

        <div class="col-md-3 col-sm-6">
          <div class="our-team">
            <div class="pic">
              <img src="assets/images/team/team-memb3.jpg" />
            </div>
            <h3 class="title">MONU NAIN</h3>
            <span class="post">Graphic Designer</span>
          </div>
        </div>

        <div class="col-md-3 col-sm-6">
          <div class="our-team">
            <div class="pic">
              <img src="assets/images/team/team-memb4.jpg" />
            </div>
            <h3 class="title">Deitry Georg</h3>
            <span class="post">Marketing Head</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--  ************************* Gallery Starts Here ************************** -->
  <div id="gallery" class="gallery">
    <div class="session-title">
      <h2>Our Gallery</h2>
      <p>
        Lorem ipsum dolor sit amet, consetetur sadipscing elitr sed diam
        nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam.
      </p>
    </div>
    <div class="container">
      <div class="row">
        <div class="gallery-filter d-none d-sm-block">
          <button class="btn btn-default btn-sm filter-button" data-filter="all">
            All
          </button>
          <button class="btn btn-default btn-sm filter-button" data-filter="hdpe">
            Finance
          </button>
          <button class="btn btn-default btn-sm filter-button" data-filter="sprinkle">
            Digital Marketing
          </button>
          <button class="btn btn-default btn-sm filter-button" data-filter="spray">
            Money
          </button>
          <button class="btn btn-default btn-sm filter-button" data-filter="irrigation">
            Business Alaysis
          </button>
        </div>
        <br />
        <div class="gallery_product col-lg-3 col-md-3 col-sm-4 col-xs-6 filter hdpe">
          <img src="assets/images/gallery/Digital-hotel.png" class="img-responsive" />
        </div>

        <div class="gallery_product col-lg-3 col-md-3 col-sm-4 col-xs-6 filter sprinkle">
          <img src="assets/images/gallery/smart_invoice.jpeg" class="img-responsive" />
        </div>

        <div class="gallery_product col-lg-3 col-md-3 col-sm-4 col-xs-6 filter hdpe">
          <img src="assets/images/gallery/dr-6.jpeg" class="img-responsive" />
        </div>

        <div class="gallery_product col-lg-3 col-md-3 col-sm-4 col-xs-6 filter irrigation">
          <img src="assets/images/gallery/dr-4.jpeg" class="img-responsive" />
        </div>

        <div class="gallery_product col-lg-3 col-md-3 col-sm-4 col-xs-6 filter spray">
          <img src="assets/images/gallery/contactless-menu.jpeg" class="img-responsive" />
        </div>

        <div class="gallery_product col-lg-3 col-md-3 col-sm-4 col-xs-6 filter spray">
          <img src="assets/images/gallery/dr-3.webp" class="img-responsive" />
        </div>

        <div class="gallery_product col-lg-3 col-md-3 col-sm-4 col-xs-6 filter irrigation">
          <img src="assets/images/gallery/dr-2.jpeg" class="img-responsive" />
        </div>

        <div class="gallery_product col-lg-3 col-md-4 col-sm-3 col-xs-6 filter irrigation">
          <img src="assets/images/gallery/pos-3.jpeg" class="img-responsive" />
        </div>
      </div>
    </div>
  </div>

  <!--  ************************* Outlet Starts Here ************************** -->
  <div id="outlet" class="gallery">
    <div class="session-title">
      <h2>Outlet Type</h2>
      <p>We make digitilization of your Business.</p>
    </div>
    <div class="container">
      <div class="row">
        <div class="gallery-filter d-none d-sm-block">
          <button class="btn btn-default btn-sm filter-button" data-filter="all">
            Hotel
          </button>
          <button class="btn btn-default btn-sm filter-button" data-filter="hdpe">
            Cloud Kitchen
          </button>
          <button class="btn btn-default btn-sm filter-button" data-filter="sprinkle">
            Resturant
          </button>
          <button class="btn btn-default btn-sm filter-button" data-filter="spray">
            Cafe
          </button>
          <button class="btn btn-default btn-sm filter-button" data-filter="irrigation">
            Pizza Hubs
          </button>
          <button class="btn btn-default btn-sm filter-button" data-filter="irrigation">
            Food-Courts & Canteens
          </button>
          <button class="btn btn-default btn-sm filter-button" data-filter="irrigation">
            Ice - Cream and Dessert Shop
          </button>
          <button class="btn btn-default btn-sm filter-button" data-filter="irrigation">
            Bakery
          </button>
          <button class="btn btn-default btn-sm filter-button" data-filter="irrigation">
            Bar & Brewery
          </button>
          <button class="btn btn-default btn-sm filter-button" data-filter="irrigation">
            College and University Mess
          </button>
        </div>
      </div>
    </div>
  </div>

  <!--*************** Blog Starts Here ***************-->

  <!-- <div id="blog" class="container-fluid blog">
      <div class="container">
        <div class="session-title">
          <h2>Our Blog</h2>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi
            sollicitudin nisi id consequat bibendum. Phasellus at convallis
            elit. In purus enim, scelerisque id arcu vitae
          </p>
        </div>
        <div class="blog-row row">
          <div class="col-lg-4 col-md-6">
            <div class="blog-col">
              <img src="assets/images/destination/d1.jpg" alt="" />
              <span>August 9, 2019</span>
              <h4>Orci varius consectetur adipiscing natoque penatibus</h4>
              <p>
                Orci varius natoque penatibus et magnis dis parturient montes,
                nascetur ridiculus mus. Praesent accumsan, leo in venenatis
                dictum,
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="blog-col">
              <img src="assets/images/destination/d2.jpg" alt="" />
              <span>August 9, 2019</span>
              <h4>Orci varius consectetur adipiscing natoque penatibus</h4>
              <p>
                Orci varius natoque penatibus et magnis dis parturient montes,
                nascetur ridiculus mus. Praesent accumsan, leo in venenatis
                dictum,
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="blog-col">
              <img src="assets/images/destination/d3.jpg" alt="" />
              <span>August 9, 2019</span>
              <h4>Orci varius consectetur adipiscing natoque penatibus</h4>
              <p>
                Orci varius natoque penatibus et magnis dis parturient montes,
                nascetur ridiculus mus. Praesent accumsan, leo in venenatis
                dictum,
              </p>
            </div>
          </div>
        </div>
      </div>
    </div> -->

  <!--*************** Footer  Starts Here *************** -->
  <footer id="cntact_us" class="container-fluid">
    <div class="container">
      <div class="row logo-row">
        <h1 style="color: white; padding:1rem">Cloud Rasoi</h1>
        <!-- <img src="assets/images/logo.png" alt="" /> -->
      </div>
      <div class="row content-ro">
        <div class="col-lg-4 col-md-12 footer-contact">
          <h2>Contact Informatins</h2>
          <div class="address-row">
            <div class="icon">
              <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="detail">
              <p>
                Guru Jambheshwar University of Science and Technology Hisar
              </p>
            </div>
          </div>
          <div class="address-row">
            <div class="icon">
              <i class="far fa-envelope"></i>
            </div>
            <div class="detail">
              <p>
                helpdesk@cloudrasoi.com
                <br />
                ajaysheokand.as@gmail.com
              </p>
            </div>
          </div>
          <div class="address-row">
            <div class="icon">
              <i class="fas fa-phone"></i>
            </div>
            <div class="detail">
              <p>
                +91 85709 - 96916 <br />
                +91 72062 - 01800
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12 footer-links">
          <div class="row no-margin mt-2">
            <h2>Outlet Types</h2>
            <ul>
              <li>Hotel</li>
              <li>Cloud Kitchen</li>
              <li>Resturant</li>
              <li>Cafe</li>
              <li>Pizza Hubs</li>
              <li>Food-Courts & Canteens</li>
              <li>Ice - Cream and Dessert Shop</li>
              <li>Bakery</li>
              <li>Bar & Brewery</li>
              <li>College and University Mess</li>
            </ul>
          </div>
          <!-- <div class="row no-margin mt-1">
              <h2 class="m-t-2">More Products</h2>
              <ul>
                <li>Edu Smart</li>
                <li>Smart Event</li>
                <li>Smart School</li>
              </ul>
            </div> -->
        </div>
        <div class="col-lg-4 col-md-12 footer-form">
          <div class="form-card">
            <div class="form-title">
              <h4>Contact US</h4>
            </div>
            <div class="form-body">
              <input type="text" id="name" name="name" placeholder="Enter Name" class="form-control" />
              <input type="number" id="mobile_no" name="mobile_no" placeholder="Enter Mobile no" class="form-control" />
              <input type="email" id="email_address" name="email_address" placeholder="Enter Email Address" class="form-control" />
              <input type="text" id="message" name="message" placeholder="Your Message" class="form-control" />
              <button type="submit" id="send_request" onclick="sendEmail()" class="btn btn-sm btn-success w-100" name="sendRequest">
                Send Request
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-copy">
        <div class="row">
          <div class="col-lg-8 col-md-6">
            <p>
              Copyright ©
              <a href="https://www.cloudrasoi.com">cloudrasoi.com</a> | All
              right reserved.
            </p>
          </div>
          <div class="col-lg-4 col-md-6 socila-link">
            <ul>
              <li>
                <a href="./terms_and_condition.html" target="_blank">Terms & Condition</a>
                <!-- <a><i class="fab fa-github"></i></a> -->
              </li>
              <li>
                <a href="./privacy_policy.html" target="_blank">Privacy Policy</i></a>
              </li>
              <li>
                <a href="./aboutus.html" target="_blank">About Us</i></a>
                <!-- <a><i class="fab fa-pinterest-p"></i></a> -->
              </li>
              <!-- <li> -->
              <!-- <a href="./" target="_blank">Terms and Condition</i></a> -->
              <!-- <a><i class="fab fa-twitter"></i></a> -->
              <!-- </li> -->
              <li>
                <a href="./cancellation_refund.html" target="_blank">Cancellation & Refund Policy</i></a>
                <!-- <a><i class="fab fa-facebook-f"></i></a> -->
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <div class="footer-bot-image d-none d-lg-block">
    <img src="assets/images/slider_wav.png" alt="" />
  </div>
</body>

<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
<script src="assets/js/script.js"></script>
<script src="./rasoi/scripts/request.js"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<!-- Sweetalert2 -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script>
  function sendEmail() {

    const name = $("#name").val();
    const mobile_no = $("#mobile_no").val();
    const email_address = $("#email_address").val();
    const message = $("#message").val();
    if (mobile == "" || mobile_no == "" || email_address == "" || message == "") {
      alert("Please fill all field");
    }
    $(document).ajaxSend(() => {
      $("#send_request").prop("disabled", true);
      $("#send_request").html("Sending...");
    });
    $.ajax({
      url: "./rasoi/utility/emails.php",
      method: "POST",
      data: JSON.stringify({
        name: name,
        mobile_no: mobile_no,
        email_address: email_address,
        message: message,
      }),
      contentType: "application/json",
      success: function(result) {
        console.log("Result=>",result);

        const json = result;
        if (json.success) {
          swal({
            title: "Send Successfull",
            icon: "success"
          });
        } else
          swal({
            title: "Error Occured",
            text: json.error,
            icon: "error"
          });

        $("#send_request").prop("disabled", false);

        $("#send_request").html("Send Request");
      },
    });
    $(document).ajaxError((res) => {
      console.log("Error =>",res);

      $("#send_request").attr("disabled", false);
      $("#send_request").html("Send Request");
    });
    $(document).ajaxComplete((res) => {
      $("#send_request").attr("disabled", false);
      $("#send_request").html("Send Request");
    });
  }
</script>

</html>