<?php include("../components/Navbar.php");  ?>
<div class="header">
  <?php include('../components/Nav.php') ?>;

  <div class="content_box">

    <div class="container flex">
      <div class="col">
        <p class="title">
          Find your Nearest
          Electric Vehicle
          Charging Station
        </p>
        <p class="description">
          Charging Station Locator is the Ultimate Web
          Application and USSD Service for Electric Vehicle
          Drivers who Need to Find a charging Station Near their Location.Our Locator System ensures that you Will Never be Stuck With an Empty Battery Again.
        </p>
        <div class="custom_btn" style="margin-top:2rem;">
          <a href="../StationsDisplay/./StationsDisplay.php" class="hero-btn">VIEW LOCATIONS</a>
        </div>
      </div>
      <div class="col">
        <img src="../images/scr7.png" alt="" class="banner__displayer">
      </div>
    </div>
  </div>

</div>

<div class="get__identity" style="margin-top:2rem">
  <p class="subTitle" style="margin-right:2rem;">Are you a driver ?</p>
  <div class="custom_btn">
    <a href="../CSowner/./CSownerLogin.php" class="hero-btn" style="background: #de9157; color:#fff;">ADD STATION</a>
  </div>
</div>
<main class="main container" id="main">

  <section class="services" id="services">
    <p class="section-title">
      OUR SERVICES
    </p>


    <div class="row flex" style="margin-top:2rem">
      <div class="col">
        <div class="image__wrapper">
          <img src="../Homepage/scr3.png" alt="" class="wrapper">
        </div>
        <p class="cards_title">
          Nearby Charging Finder
        </p>
        <div class="cards_description">
          Quick and easy access to nearby charging stations complete with accurate information.
        </div>
      </div>
      <div class="col">
        <div class="image__wrapper">
          <img src="../Homepage/scr4.png" alt="" class="wrapper">
        </div>
        <p class="cards_title">
          Google maps
        </p>
        <div class="cards_description">
        Access google maps to help you navigate to the nearest charging station in your vicinity.
        </div>
      </div>
      <div class="col">
        <div class="image__wrapper">
          <img src="../Homepage/scr5.png" alt="" class="wrapper">
        </div>
        <p class="cards_title">
          USSD Service
        </p>
        <div class="cards_description">
        Access to charging stations data even without internet access.Dial *233#
        </div>
      </div>
    </div>

  </section>

  <section class="features">
    <div class="row">
      <div class="flex">
        <div class="col">
          <p class="section-title">
            Features
          </p>
          <p>Hassle-free</p>
          <p>No range anxiety</p>
          <p>Real-time information</p>
          <p>complete information</p>
        </div>
        <div class="col">
          <img src="../Homepage/scr6.png" alt="">
        </div>
      </div>
    </div>
  </section>
  <section class="testimonials">
  <h2>Testimonials</h2>
  <div class="testimonial">
    <p>This is a great App ! It has helped me manage my time while looking for charging stations.</p>
    <img src="../Homepage/scr7.png" alt="Client Name">
    <p class="author"> - Alex Mwangi, Developer</p>
  </div>

  </section>
</main>
<?php include("../components/Footer.php");  ?>