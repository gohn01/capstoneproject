<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php include "connection.php"; ?> <!--connection -->
<?php         error_reporting(0); ?> <!-- for no report on undifined array or variable -->
<body>
   <?php
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $total = $_POST['total']; 

    echo "Item Name: ";  $name;
    echo "Item Price: ",$price;
    echo "Item Quantity: ",$quantity;
    echo "TOTAL: ",$total;
   ?>
</body>
</html>