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
    <h5>Official Receipt</h5>
    
  <table>
    <tr>
        <td> Item Name </td>
        <td> Quantity </td>
        <td> Price </td>
        <td> Total </td>
</tr>
   <?php
   
   $date = date("Y/m/d");
    $sql = "SELECT * FROM orders";
    $result = mysqli_query($connection, $sql);
   
    if($result->num_rows > 0)
    {
      while($row = $result->fetch_assoc())
      { 
        $p_id = $row['p_id'];
          echo "<tr>";
               echo "<td>", $name = $row['o_name'], "</td>";
               echo "<td>", $quantity = $row['o_quantity'], "</td>";
               echo "<td>", $price = $row['o_price'], "</td>";
               $total = $quantity * $price;
               echo "<td>", $total , "</td>";
          echo "</tr>";
          $totalprice = $totalprice + $total;
         $sql1 = "INSERT INTO sales (p_id , quantity , price , salesdate) VALUES ('$p_id' , '$quantity' , '$price' , '$date')";
         $result1 = mysqli_query($connection , $sql1);
            if ($result1 == "TRUE")
            {
                $sql2 = "SELECT * FROM inventory WHERE p_id ='$p_id'";
                $result2 = mysqli_query($connection , $sql2);          
                  if($result2->num_rows > 0)
                  {
                    $row1 = $result2->fetch_assoc();
                    $updatequant =   $row1['quantity'] - $quantity;
                    $sql3 = "UPDATE inventory SET quantity='$updatequant' WHERE p_id = '$p_id'";
                    $result3 = mysqli_query($connection , $sql3);
                    if ($result3 = "TRUE")
                    {
                      $sql4 = "DELETE FROM orders where p_id = '$p_id'";
                     $result4 = mysqli_query($connection , $sql4);
                    }
                    else
                    {
                      echo "error update";
                    }

                  }
                  else
                  {
                      echo "error inserting into sales";
                  }
            }
            else
            {
                echo "error insert";
            }
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