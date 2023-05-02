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
  <center>
    <h3>A.S.A Restaurant</h3>
    <h5>Official Reciept</h5>
    
  <table>
    <tr>
        <td> Item Name </td>
        <td> Quantity </td>
        <td> Price </td>
        <td> Total </td>
</tr>
   <?php
   
   
    $sql = "SELECT * FROM orders";
    $result = mysqli_query($connection, $sql);
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){ 
        
          echo "<tr>";
               echo "<td>", $name = $row['o_name'], "</td>";
               echo "<td>", $quantity = $row['o_quantity'], "</td>";
               echo "<td>", $price = $row['o_price'], "</td>";
               $total = $quantity * $price;
               echo "<td>", $total , "</td>";
          echo "</tr>";
         
          $totalprice = $totalprice + $total;
      }
      
    }
    else
    {
        echo "error";
    }
       ?>
       <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
       </tr>
       <tr>
        <td>TOTAL</td>
        <td></td>
        <td></td>
        <td><?php echo $totalprice; ?></td>
      </tr>
       </table>
  </center>
       
</body>
</html>