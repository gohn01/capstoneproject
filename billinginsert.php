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
          $row ['o_quantity'];
          $updatequant = $o_quant + $row['o_quantity'];
          $sql2 ="UPDATE orders SET o_quantity = '$updatequant'";
          $result2 = mysqli_query($connection, $sql2);
          if ($result2 == "TRUE")
          {
            echo header("location:home.php");
            echo "
                <script>
                    Swal.fire({
                        title: 'Hello!',
                        text: 'This is a Sweet Alert message!',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                </script>
                ";
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
      $sql1 = "INSERT into orders (o_name , p_id , o_price, o_quantity  ) VALUES ( '$name' , '$p_id' , '$price' , '$o_quant' )";
      $result1 = mysqli_query($connection , $sql1);
      if ($result1 == "TRUE")
      {
        echo header("location:home.php");
        echo "
          <script>
            Swal.fire({
                title: 'Hello!',
                text: 'This is a Sweet Alert message!',
                icon: 'success',
                confirmButtonText: 'OK'
            });
          </script>
          ";
}
      else
      {
        echo "insert error";
      }
    }
          
        