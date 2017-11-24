<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="inSource is a solution for bridging the communication gap between front-line workers and management by providing a platform to gather workplace issues and a tested Sprint process for rapidly developing solutions.">
  <meta name="author" content="Seul, Jessica, Dhara, Jeff, Seyitan">
  <title>inSource</title>

  <!-- css -->
  <link rel="stylesheet" href="http://localhost:8080/inSource/css/master.css">

  <!-- font -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600" rel="stylesheet">

  <!-- font awesome -->
  <script src="https://use.fontawesome.com/e5bc08cd73.js"></script>

  <!-- jqery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.2.3/jquery.min.js"></script>
</head>

<body>
  <header id="split-nav">
    <div class="branding">
      <a href="http://localhost:8080/inSource/index.php">
      <img class="logo" src="http://localhost:8080/inSource/assets/logo_inSource.png" alt="inSource logo" /></a>
    </div>
    <nav>
      <ul>
        <li><a href="?page=dashboard">Dashboard</a></li>
        <li><a href="?page=myAccount">My Account</a></li>
        <li><button href="?page=logout">Log out</button></li>
      </ul>
    </nav>
  </header>

  <?php
    if (isset($_GET['page'])){
      $page = $_GET["page"];
      $filename = "php/" . $page . '.php';

      if (file_exists($filename)) {
        include $filename;
      } else {
        include 'php/dashboard.php';
      }
    } else {
      include 'php/dashboard.php';
    }
  ?>

  <footer>
    <div class="footer-content">
      <p><i class="fa fa-copyright" aria-hidden="true"></i> 2017
      <img class="footer-logo" src="http://localhost:8080/inSource/assets/logo_inSource.png" alt="inSource logo"></p>
    </div>
  </footer>
</body>

</html>
