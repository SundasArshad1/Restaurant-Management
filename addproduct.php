<?php session_start();?>
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
  <link href="assets/css/style.css" rel="stylesheet">
<style>
.button
{
  background-color:#cfd1cf; /* Light grey */
  border: none;
  width:90%;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}

.place
{
  width:20%;
  margin-left:50px;
  font-size:25px;
  margin-bottom:170px;
  margin-top:50px;

}

.table
{
  width:90%;
  margin-bottom:50px;
}
.cart
{
  margin-top:100px;
  margin-left:50px;
}
</style></head>
<body>
<br>
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
          <li><a href="Cust.php">Customer</a></li>
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
<?php
if (!isset($_SESSION["count"]))
$_SESSION["count"]=0;

 //Reset
 //---------------------------
 //Add
 if ( isset($_GET["Dish_ID"]) )
   {

      $id= $_GET["Dish_ID"];
      $i=$_SESSION["count"]; 
      $price=$_GET["Dish_Price"];
      $img=$_GET["Img"];
      $name=$_GET["Dish_name"];
      $flag=false;
      for($i=0;$i<$_SESSION["count"];$i++)
        if ($_SESSION["Dish_ID"][$i]=== $id)
        { 
          $_SESSION["Dish_Quantity"][$i]++;
          echo "Quantity: ". $_SESSION["Dish_Quantity"][$i]."<br/>";
          $_SESSION["Dish_Price"][$i] = $_SESSION["Dish_Quantity"][$i]*$price;
          echo "Price".$_SESSION['Dish_Price'][$i]."<br/>";
          echo "The quantity of the product is increased";
          $flag=true;
    }
      if ($flag===false)
      {
        $_SESSION["Dish_Image"]=$img;
        $_SESSION["Dish_Name"][$i] = $name;
        $_SESSION["Dish_ID"] [$i]= $id;
        $_SESSION["Dish_Price"][$i] = $price;
        $_SESSION["Dish_Quantity"][$i]=1;
        $_SESSION["count"]++;
        echo "<br>Product added to Cart successfully<br>";
        echo "No of products in cart ".$_SESSION["count"];
  }
 }
?>
<div class="cart">
<?php
 echo "<table border='1' class='table'><tr><td> Product ID</td><td>Product name</td><td> Price</td><td>Quantity</td><td>Remove</td></tr>";
 $sum=0;
 
 for($i=0;$i<sizeof($_SESSION['Dish_ID']);$i++)
 {
 
    echo "<tr>";
    echo "<tr><td>".$_SESSION['Dish_ID'][$i]."</td>";
    echo  "<td>".$_SESSION["Dish_Name"][$i]."</td>";
    echo "<td>".$_SESSION["Dish_Price"][$i]."</td>";
    echo "<td>".$_SESSION["Dish_Quantity"][$i]."</td>";
    echo "<td><a href=Remove.php?PID=".$i.">Remove</a></td></tr>";
    $sum=$sum+$_SESSION["Dish_Price"][$i];
 
 }
 echo "</table>";
 echo " <b>Total amount  ".$sum;


 ?>

  </div>
  <div class="place">
    <button class="button"><a href="checkout.html">Place Order</a></button>
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
  </footer>
  <!-- End Footer -->

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


