<?php 
include "connection.php";
$name = $_POST['p_name'];
$price = $_POST['p_price'];
$p_id = $_POST['p_id'];
$o_quant = $_POST['quantity'];
  $sql = "SELECT * FROM orders where p_id = '$p_id'";
 
    $result = mysqli_query($connection, $sql);
    if ($result -> num_rows >0){
      while ($row = $result ->fetch_assoc())
      {
        if($row['p_id'] == $p_id){
          echo "already have the product";
          $row ['o_quantity'];
          $updatequant = $o_quant + $row['o_quantity'];
          $sql2 ="UPDATE orders SET o_quantity = '$updatequant'";
          $result2 = mysqli_query($connection, $sql2);
          if ($result2 == "TRUE")
          {
            echo "update Successfully";
          }
          else
          {
            echo "error update";
          }
        }
        else
        {
          echo "error";
        }
      }
    }
    else{
      echo "you still dont have the product";
      $sql1 = "INSERT into orders (o_name , p_id , o_price, o_quantity  ) VALUES ( '$name' , '$p_id' , '$price' , '$o_quant' )";
      $result1 = mysqli_query($connection , $sql1);
      if ($result1 == "TRUE")
      {
        echo "insert Success";
      }
      else
      {
        echo "insert error";
      }
    }
          
        
        if($result == "TRUE"){
           echo "<script> 
                      alert('Order Entered');
                      window.location.href='home.php'
                </script>"; 
        }  
        else{  
            echo "<script> 
                    alert('Something went wrong!');
                    window.location.href='home.html'
                </script>";
        }      
?>
