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
  <link href="css/customer.css" rel="stylesheet">
  <style>
  input 
    {
        width: 50%;
        margin:20px;
        padding:10px 10px;
    }

    label
    {
        font-size:20px;
        font-weight:bold;
        margin-left:150px;
    }
    h1
    {
        text-align:center;
        font-size:50px;
        font-weight:bold;
    }

   .bottom
    {
      margin-bottom:200px;
      margin-left:200px;
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

   <!-- ======= Services Section ======= -->
   <section id="services" class="services">
      <div style="margin-bottom:-500px">
          <h1 class="title">Item  Record</h1>
      </div>
    </section><!-- End Services Section -->
  </main><!-- End #main -->
    <?php
      class POSItem
      {
            function establishConnection()
            {
                $dsn = "mysql:dbname=pos_db";
                $username = "root";
                $password = "";
                try 
                {
                    $conn = new PDO($dsn, $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } 
                catch (PDOException $e) 
                {
                    echo "Connection failed: " . $e->getMessage();
                }
                return $conn;
            }
       
            function addItem()
            {
                ?>
                <form method="post" action="itemrecord.php">
                    <table width="100%">
                        <tr><td><label>Item ID</label></td>
                        <td><input name="item_id"></td></tr>
                        <tr><td><label>Item Name</label></td>
                        <td><input name="item_name"></td></tr>
                        <tr><td><label>Item Price</label></td>
                        <td><input name="item_price"></td></tr>
                        <tr><td><label>Item Quantity</label></td>
                        <td><input name="item_qty"></td></tr>
                        <tr><td><label>Item Expiry</label></td>
                        <td><input name="item_expiry"></td></tr>
                        <tr><td colspan="2"><input type="submit" value="Add Item" name="add" class="bottom" style="margin-left:200px"></td></tr>
            </table>
                </form>
                <?php
               
            }
        
            function deleteItem()
            {
                ?>
                <form method="post" action="itemrecord.php">
                    <label>Item ID</label>
                    <input name="item_id"><br></td></tr>
                    <input type="submit" value="Delete Item" name="delete" class="bottom" style='margin-left:245px;'>
                </form>
                <?php
            }

            function searchItem()
            {
                ?>
                <form method="post" action="itemrecord.php">
                <label>Item ID</label>
                <input name="item_id">
                <input type="submit" value="Search" name="search" class="bottom" style='margin-left:245px;'>
                </form>
            <?php
            }
        
            function updateItem()
            {
                ?>
                <form method="post" action="itemrecord.php">
                    <table width="100%">
                        <tr><td><label>Item ID</label></td>
                        <td><input name="item_id"><br></td></tr>
                        <tr><td><label>Item Price</label></td>
                        <td><input name="item_price"><br></td></tr>
                        <tr><td colspan="2"><input type="submit" value="Update Item" name="deupdatelete" class="bottom" style="margin-left:200px"></td></tr>
                </table>
                </form>
            <?php
            }
      }
        $item= new POSItem();
      
        if(isset($_POST['Add']))
        {
          $item->addItem();
        }
        else if(isset($_POST['Delete']))
        {
          $item->deleteItem();
        }
        else if(isset($_POST['Search']))
        {
          $item->searchItem();
        }
        else if(isset($_POST['Update']))
        {
          $item->updateItem();
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