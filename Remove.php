<html>
<head>
<style>
*{ font-size:16pt;
color:#331155;}
</style></head>
<body>

<?php
    session_start();
    $a = (int)$_GET["PID"];
    echo "Entered";
    array_splice($_SESSION["Dish_Name"],$a,1);
    array_splice($_SESSION["Dish_ID"],$a,1);
    array_splice($_SESSION["Dish_Price"],$a,1);
    array_splice($_SESSION["Dish_Quantity"],$a,1);
    $_SESSION["count"]--;
    header("Location:addproduct.php");
?>
</body>
</html>