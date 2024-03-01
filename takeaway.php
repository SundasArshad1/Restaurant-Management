<!DOCTYPE html>
<html lang="en">

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
    input 
    {
        width: 50%;
        margin:20px;
        margin-left:250px;
        padding:10px 10px;
    }

    label
    {
        font-size:20px;
        font-weight:bold;
        margin-left:250px;
    }
    h2
    {
        margin-left:250px;
    }
  </style>
  
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
          <li><a href="Cust.php">Customer</a></li>
          <li><a href="Inventory.php">Inventory</a></li>
          <li><a href="Order.php">Order</a></li>
          <li><a href="dishproducts.php">Dish</a></li>
        </ul>
      </nav>
      <!-- .navbar -->

    </div>
  </header>

    <form name="checkoutForm" action="thankyou.html" method="post" class="form">
        <h2>Your Details:</h2>
        <label>Email Address:</label><br>
        <input type="email" name="email" required><br>

        <label>Full Name:</label><br>
        <input type="text" name="fullName" required><br>

        <label>Mobile Number:</label><br>
        <input type="tel" name="mobileNumber" required><br>

        <input type="submit" value="Submit" name="submit">
    </form>
    <?php

    if(isset($_POST["submit"]))
    {

        function establishConnection()
        {
            $dsn = "mysql:dbname=pos_db";
            $username = "root";
            $password = "";
            try {
                $conn = new PDO($dsn, $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            return $conn;
        }
       
        $order_id = 0;
        $cust_id = 0;

    function getCustomerId()
    {
        $conn=establishConnection();
        $sql = "SELECT `Customer_ID` FROM `customer`";
        try {
            $rows = $conn->query($sql);
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
        }
    
        foreach ($rows as $row) {
            $cust_id = $row["Customer_ID"];
        }
        $cust_id += 1;
      
        return $cust_id;
    }

    function getOrderId()
    {
        $conn=establishConnection();
        
        $sql = "SELECT `Order_ID` FROM `food_order`";
        try {
            $rows = $conn->query($sql);
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
        }
    
        foreach ($rows as $row) 
        {
            $order_id = $row["Order_ID"];
        }
        $order_id += 1;
    
        $order_id += 1;
        return $order_id;
    }
        function saveCustomerInfo()
        {
            $conn=establishConnection();
            $cust_id=getCustomerId();
            $order_id=getOrderId();
            $email = $_POST["email"];
            $fullName = $_POST["fullName"];
            $mobileNumber = $_POST["mobileNumber"];
            $sql = "INSERT INTO customer (Customer_ID,Customer_Name,Email_ID,Customer_Phone_no,Order_ID) VALUES($cust_id,'$fullName','$streetAddress','$email',$mobileNumber,$order_id)";
            try {
                $rows = $conn->query($sql);
            } catch (PDOException $e) {
                echo "Query failed: " . $e->getMessage();
            }
        
        }
        
        function saveOrderInfo()
        {
            $conn=establishConnection();
            $cust_id=getCustomerId();
            $order_id=getOrderId();
            $date = date("d/m/y");
            $type="takeaway";
            $status="Active";
            $amount = $_SESSION["Sum"];
        
            $sql = "INSERT INTO food_order (Order_ID, Order_Type, Order_Time, Order_Status, Customer_ID) VALUES ($order_id, '$type', '$date', '$status', $cust_id)";
            try {
                $rows = $conn->query($sql);
            } catch (PDOException $e) {
                echo "Query failed: " . $e->getMessage();
            }    
        }
    
    saveCustomerInfo();
    saveOrderInfo();
    $conn = null;
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

</html> 