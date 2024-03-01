<?php session_start();?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>The Savour Spot</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="dish.css" rel="stylesheet">

  <style>
  .box
{
   border:1px solid rgb(223, 219, 219);
   margin-bottom: 15px;
   margin-top: 15px;
   margin-left:-4px;
}

.contain
{
  margin-left:50px;
  margin-bottom:20px;
  width:20%;
  text-align:center;
}

h1
{
  font-size:20px;

}
    </style>
</head>
<body>

    <?php 
       $dsn = "mysql:dbname=pos_db";
       $username = "root";
       $password = "";
       try {
           $conn = new PDO( $dsn, $username, $password );
           $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
         } catch ( PDOException $e ) {
           echo "Connection failed: " . $e->getMessage();
         }
         $sql="SELECT* from dish";
         try {
           $rows = $conn->query( $sql );
           } catch ( PDOException $e ) {
           echo "Query failed: " . $e->getMessage();
         }
    ?>

      <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between">

      <div class="logo">
        <h1 class="text-light"><a href="index.html">Thr Savour Spot</a></h1>
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="active" href="index.html">Home</a></li>
          </li>
          <li><a href="Customer.php">Customer</a></li>
          <li><a href="Inventory.php">Inventory</a></li>
          <li><a href="Order.php">Order</a></li>
          <li><a href="dishes.php">Dish</a></li>
        </ul>
      </nav>
      <!-- .navbar -->

    </div>
  </header>
  <!-- End Header -->
  
<br>
<h1>E-SHOP</h2>
<br>

  <?php  
  $num = 0;
  echo "<div class='row'>"; 
    foreach ( $rows as $row ) 
    {
      echo "<div class='col-md-3 contain' data-aos='fade-up'>";
      echo "<img src='" . $row['Dish_Img'] . "' width='90%' height='200px' class='box'>";
      echo "<h1>".$row['Dish_Name']."</h1>";
      echo "<p>Price: ".$row['Dish_Price']."</p>";
      $data = array("Img"=>$row["Dish_Img"],"Dish_name" => $row["Dish_Name"],"Dish_Price" => $row['Dish_Price'],"Dish_ID" => $row['Dish_Id']);
      echo "<br/><a href='addproduct.php?" . htmlspecialchars(http_build_query($data)) . "'>Add Product</a>";
      echo "</div>";

      $num++;
      if ($num % 4 === 0) 
      {
          echo "</div>"; 
          echo "<div class='row'>";
      }
    }
?>  
</div>


<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>The Savour Spot</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          Serving since <a href="https://bootstrapmade.com/">2015</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>
