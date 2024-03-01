<html>

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
  <link href="assets/css/customer.css" rel="stylesheet">

</head>
<body>

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
        <li><a href="dishproducts.php">Dish</a></li>
      </ul>
    </nav>
    <!-- .navbar -->

  </div>
</header>
<!-- End Header -->
<?php
class Customer
{
    function addCustomerInfo()
    {
      ?>
      <form method="post" action="cusdb.php">
      <table border="1">
          <tr><td>Customer Name</td><td><input name="c_name"><br></td></tr>
          <tr><td>Customer CNIC</td><td><input name="c_cnic"><br></td></tr>
          <tr><td>Customer Address</td><td><input name="c_add"><br></td></tr>
          <tr><td>Phone Number</td><td><input name="c_no"><br></td></tr>
      </table>
      <input type="submit" value="Add">
      </form>
    <?php
    }
}
    $cus= new Customer();

    ?>

    <form method="post">
    <input type="submit" value="Customer Info" name="Add" class="button">
  </form>
  <?php
  $count=0; 
  $count++;
  if(isset($_POST['Add']))
  {
    $cus->addCustomerInfo();
  }
?>

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

</body>
</html>