<?php 
include "connection.php";
$name = $_POST['p_name'];
$price = $_POST['p_price'];
$p_id = $_POST['p_id'];
$o_quant = $_POST['quantity'];
  
  $sql = "INSERT into orders (o_name , p_id , o_price, o_quantity  ) VALUES ( '$name' , '$p_id' , '$price' , '$o_quant' )";

    $result = mysqli_query($connection, $sql);
          
        if($result == "TRUE"){
           echo "<script> 
                      alert('Order Entered');
                      window.location.href='home.php'
                </script>"; 
        }  
        else{  
            echo "<script> 
                    alert('Login Failed');
                    window.location.href='index.html'
                </script>";
        }      ?>