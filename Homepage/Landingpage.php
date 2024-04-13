
  <?php include('../Homepage/Landingpagenav.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LANDING PAGE</title>
</head>
<body>
  <style>
    body {
  color: black;
}

.content_box {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
}

.container {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.col {
  flex: 1;
}

.title {
  font-size: 2rem;
  font-weight: bold;
  margin-bottom: 1rem;
}

.description {
  font-size: 1.2rem;
  line-height: 1.5;
}

.custom_btn {
  margin-top: 2rem;
}

.hero-btn {
  display: inline-block;
  padding: 10px 20px;
  background-color: #007bff;
  color: white;
  text-decoration: none;
  border-radius: 5px;
}

.hero-btn:hover {
  background-color: #0056b3;
}

  </style>
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
      <a href="../User/./UserLogin.php" class="hero-btn">GET STARTED</a>
    </div>
  </div>
  <div class="col">
    <img src="../Homepage/scr3.png" alt="" class="banner__displayer">
  </div>
</div>
</div>

</div>
</body>
</html>

  