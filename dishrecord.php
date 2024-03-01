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
    .record
    {
        margin-left:80px;
        width:80%;
        padding:20px 20px;
        margin-bottom:300px;
    }
    h4
    {
        font-size:50px;
        text-align:center;
        margin-bottom:20px;
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
          <h4 class="title">Dish  Record</h4>
      </div>
    </section><!-- End Services Section -->
  </main><!-- End #main -->
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


        if(isset($_POST["search"]))
        {
            
            $dishid=$_POST["id"];
            $sql = "SELECT * FROM dish WHERE Dish_Id=$dishid";

            try 
            {
                $rows = $conn->query( $sql );
            } 
            catch ( PDOException $e ) 
            {
                echo "Query failed: " . $e->getMessage();
            }
    
            $rowcount=0;
            
            foreach ($rows as $row) 
            {
               $rowcount++;
            }
            
            if($rowcount==0)
            {
                echo "<div class='title record'>No dish exist with this id</div>";
            }

            else
            {
                
                echo "<table border='2px' class='record' cell-padding='20px;'><tr><th>Dish Image</th><th>Dish ID</th><th>Dish Name</th><th>Dish Price</th><th>Dish Quantity</th><th>Dish Type</th></tr>";
                echo "<tr>";
                echo "<td><img src='" . $row['Dish_Img'] . "'></td>";
                echo "<td>" . $row['Dish_Id'] . "</td>";
                echo "<td>" . $row['Dish_Name'] . "</td>";
                echo "<td>" . $row['Dish_Price'] . "</td>";   
                echo "<td>" . $row['Dish_Quantity'] . "</td>";
                echo "<td>" . $row['Dish_Type'] . "</td>";
                echo "</tr>";
                echo "</table>";
            }
            
        }

        else if(isset($_POST["delete"]))
        {
           
            $rowcount=0;
            $dishid=$_POST["id"];
            $sql="Delete from dish where Dish_IdD=$dishid";
            try 
            {
                $rows = $conn->query( $sql );
            } 
            catch ( PDOException $e ) 
            {
                echo "Query failed: " . $e->getMessage();
            }

            foreach($rows as $row)
            {
                $rowcount++;
            }

            if($rowcount==0)
            {
                echo "<div class='title record'>No dish exist with this id</div>";
            }

            else
            {
                echo "<div class='title record'>Record Deleted</div>";
            }
        }

        else if(isset($_POST["add"]))
        {
           
            $name=$_POST["dish_name"];
            $id=$_POST["dish_id"];
            $price=(float)$_POST["dish_price"];
            $qty=(int)$_POST["dish_qty"];
            $type=$_POST["dish_type"];
            $img=$_POST["dish_img"];


            $sql = "INSERT INTO dish (Dish_Id,Dish_Name,Dish_Price,Dish_Quantity,Dish_Type,Dish_Img) VALUES('$id','$name',$price,$qty,'$type','$img')";
            try 
            {
                $rows = $conn->query($sql);
                echo "<h1 style='text-align:center'>Dish Successfully Added";
            } 
            catch (PDOException $e) 
            {
                echo "Query failed: " . $e->getMessage();
            }
        }

        else if(isset($_POST["update"]))
        {
           
            $id=$_POST["dish_id"];
            $price=(float)$_POST["dish_price"];

            $sql="UPDATE `dish` SET `Dish_Price`='$price' WHERE Dish_Id=$id";
            try 
            {
                $rows = $conn->query($sql);
                echo "<h1 style='text-align:center'>Dish Successfully Updated";
            } 
            catch (PDOException $e) 
            {
                echo "Cannot Update Dish";
            }
        }
        
    ?>
   


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