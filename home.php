<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <!-- font awesome icon kit -->
    <script src="https://kit.fontawesome.com/d6d9d9ca7e.js" crossorigin="anonymous"></script>
    <title>A.S.A</title>

</head>

<body onload="onload()">
    <?php include "connection.php"; ?> <!--connection -->
    <?php error_reporting(0); ?> <!-- for no report on undifined array or variable -->
    <nav>
        <ul>
            <li><a href="#" class="logo">
                    <img src="logo.png" alt="logo">
                </a></li>
            <li><a href="#" class="icon active"><i class="fa-solid fa-house"></i><span class="nav-item">Home</span></a></li>
            <li><a href="#" class="icon"><i class="fa-solid fa-clock-rotate-left"></i><span class="nav-item">History</span></a></li>
            <li><a href="#" class="icon"><i class="fa-solid fa-wallet"></i><span class="nav-item">Wallet</span></a></li>
            <li><a href="#" class="icon"><i class="fa-solid fa-eye"></i><span class="nav-item">Promo</span></a></li>
            <li><a href="settings.php" class="icon"><i class="fa-solid fa-gear"></i><span class="nav-item">Setting</span></a></li>
            <li><a href="index.html" class="logout"><i class="fa-solid fa-arrow-right-from-bracket"></i><span class="nav-item">Log out</span></a></li>
        </ul>
    </nav>

    <section>
        <div class="category">
            <h1>Choose Category</h1>
            <div class="bill">
                <span onclick="openBill()">
                    <i class="fa-sharp fa-solid fa-file-invoice-dollar"></i>
                </span>
            </div>
        </div>
        <div class="sideBilling" id="sideBill">
            <div class="billing">
                <div class="bill_content">
                    <div class="bill_header">
                        <p>Bills</p>
                        <a href="javascript:void(0)" class="closebtn" onclick="closeBill()">&times;</a>
                    </div>
                    <div class="bill_items">
                    <?php       
                             $sql = "SELECT * FROM orders"; 
                             $totalprice = 0;
                                $result = mysqli_query($connection, $sql);
                            if($result->num_rows > 0){
                              while($row = $result->fetch_assoc()){ 
                                        $pid = $row['p_id'];
                                        $quantity = $row['o_quantity'];
                                        $price = $row['o_price'];
                                        $sql1 = "SELECT * FROM product WHERE p_id = '$pid'"; 
                                        $result1 = mysqli_query($connection, $sql1);
                                        if($result1->num_rows > 0){
                                            $row1 = $result1->fetch_assoc()
                                    ?>

                        <div class="bill_item">
                        <form action="delete.php" method="post">
                            <div class="remove_item">
                                <input type="submit" name="delete"  id="delete" value="&times;">

                                <input type="hidden" name="o_name" id="o_name" value="<?php echo $row["o_name"] ?>">

                                
                            </div>
                        </form>

                                <div class="item_img">
                                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row1['p_photo']); ?>" name="p_photo" />
                                </div>
                            <div class="item_details">
                                <p>
                                    <?php echo $row['o_name'];?> 
                                    <input type="hidden" name="name" value="<?php echo $row['o_name']?>"> 
                                </p>
                                <strong>
                                <?php
                                    $total = $quantity * $price;
                                ?> 
                                <?php echo $row['o_price']. ' x '. $quantity; ?>
                                    <input type="hidden" name="price" value="<?php echo $row['o_price'] ?>">

                                </strong>
                                <?php 
                                        echo "Total: ". $total; 
                                    ?>
                            </div>

                                <?php $totalprice = $totalprice + $total; ?>
                        </div>
                        <?php  }   
                } 
            
               } ?>
                    </div>
                    <div class="bill_actions">
                        <div class="total">
                            <p>Total:</p>
                            <p>₱<span id="total_price"><?php echo $totalprice; ?></span></p> 
                        </div>
                      <input type="submit" value="Pay Order">
                    </div>
                </div>
            </div>
        </div>
    </section>    <section>
        <div class="scroll-container" id="scroll-container">
            <div class="scroll-item best active">
                <form action="home.php" method="post" class="form-category">
                    <input type="text" value="best" name="category" hidden>
                    <input type="submit" value="A.S.A Best" class="scroll-input">
                </form>
            </div>
            <div class="scroll-item seafood">
                <form action="home.php" method="post">
                    <input type="text" value="seafood" name="category" hidden>
                    <input type="submit" value="seafood" class="scroll-input">
                </form>
            </div>
            <div class="scroll-item chicken">
                <form action="home.php" method="post">
                    <input type="text" value="chicken" name="category" hidden>
                    <input type="submit" value="chicken">
                </form>
            </div>
            <div class="scroll-item merienda">
                <form action="home.php" method="post">
                    <input type="text" value="merienda" name="category" hidden>
                    <input type="submit" value="merienda">
                </form>
            </div>
            <div class="scroll-item silog">
                <form action="home.php" method="post">
                    <input type="text" value="silog" name="category" hidden>
                    <input type="submit" value="silog">
                </form>
            </div>
            <div class="scroll-item beef">
                <form action="home.php" method="post">
                    <input type="text" value="beef" name="category" hidden>
                    <input type="submit" value="beef">
                </form>
            </div>
            <div class="scroll-item drinks">
                <form action="home.php" method="post">
                    <input type="text" value="drinks" name="category" hidden>
                    <input type="submit" value="drinks">
                </form>
            </div>
            <div class="scroll-item rice">
                <form action="home.php" method="post">
                    <input type="text" value="rice" name="category" hidden>
                    <input type="submit" value="rice" class="scroll-input">
                </form>
            </div>
        </div>
    </section>

    <div class="category">
        <h1>A.S.A Best Seller</h1>
    </div>
    <!-- Display of menu -->
    <?php $category = $_POST['category'];

    $sql = "SELECT * FROM product WHERE p_category = '$category'";
    $result = mysqli_query($connection, $sql);

    ?>
    <section class="foods">
        <?php if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
                <div class="cart">
                    <div class="sub-cart">
                        <form action="billinginsert.php" method="post">
                            <div class="form-cart">
                                <input type="text" name="p_id" value="<?php echo $row['p_id'] ?>" hidden>
                                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['p_photo']); ?>" name="p_photo"/>
                                <p> </p>
                                <div class="counter">
                                    <h3><?php echo $row['p_name'] ?><input type="text" name="p_name" value="<?php echo $row ['p_name'] ?>" hidden></h3>
                                    <p><?php echo "P" . $row['p_price'] ?><input type="text" name="p_price" value="<?php echo $row['p_price'] ?>" hidden></p> 
                                    <div class="quantity">
                                        <span class="down" onClick='decreaseCount(event, this)'>-</span>
                                        <input type="text" value="1" name="quantity">
                                        <span class="up" onClick='increaseCount(event, this)'>+</span>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" value="Add to Billing" class="addtobilling">
                        </form>
                    </div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <p class="status error">Image(s) not found...</p>
        <?php } ?>
    </section>


    <!-- <section class="billing">
        <div>
            <div class="profile">
                <p>I'm the Manager</p>
                <h1>Alexis John Perez</h1>
            </div>
            <div class="bills">
                <h1>Bills</h1>
            </div>
            <div class="products">
                
            </div>
            <div>
                <p>Subtotal</p>
                <h1>Total</h1>
            </div>
        </div>
    </section> -->
    <!-- for increase and decrease quantity of order -->
    <script type="text/javascript">
        function update() {
            <?php
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
                ?>

        }
        function increaseCount1(a, b) {
            let input = b.previousElementSibling;
            let value = parseInt(input.value, 10);
            value = isNaN(value) ? 0 : value;
            value++;
            input.value = value;
        }

        function decreaseCount1(a, b) {
            let input = b.nextElementSibling;
            let value = parseInt(input.value, 10);
            if (value > 1) {
                value = isNaN(value) ? 0 : value;
                value--;
                input.value = value;
            }
        }

        function increaseCount(a, b) {
            let input = b.previousElementSibling;
            let value = parseInt(input.value, 10);
            value = isNaN(value) ? 0 : value;
            value++;
            input.value = value;
        }

        function decreaseCount(a, b) {
            let input = b.nextElementSibling;
            let value = parseInt(input.value, 10);
            if (value > 1) {
                value = isNaN(value) ? 0 : value;
                value--;
                input.value = value;
            }
        }
    </script>
    <script>
        const container = document.getElementById('scroll-container');
        let isDown = false;
        let startX;
        let scrollLeft;

        container.addEventListener('mousedown', e => {
            isDown = true;
            startX = e.pageX - container.offsetLeft;
            scrollLeft = container.scrollLeft;
            container.style.cursor = 'grabbing';
        });

        container.addEventListener('mouseup', () => {
            isDown = false;
            container.style.cursor = 'grab';
        });

        container.addEventListener('mouseleave', () => {
            isDown = false;
            container.style.cursor = 'grab';
        });

        container.addEventListener('mousemove', e => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - container.offsetLeft;
            const walk = (x - startX) * 3;
            container.scrollLeft = scrollLeft - walk;
        });
    </script>

    <script>
        function openBill() {
            document.getElementById("sideBill").style.width = "250px";
            document.getElementById("scroll-container").style.marginRight = "250px";
        }

        function closeBill() {
            document.getElementById("sideBill").style.width = "0";
            document.getElementById("scroll-container").style.marginRight = "0px";
        }

        window.addEventListener("resize", () => {
            const width = window.innerWidth;

            if (width >= 1000) {
                document.getElementById("sideBill").style.width = "250px";
                document.getElementById("scroll-container").style.marginRight = "250px";
            } else {
                document.getElementById("sideBill").style.width = "0";
                document.getElementById("scroll-container").style.marginRight = "0px";
            }
            if (width > 1300) {
                document.getElementById("sideBill").style.width = "400px";
                document.getElementById("scroll-container").style.marginRight = "400px";
            }
        });

        function onload() {
            const width = window.innerWidth;

            if (width >= 1000) {
                document.getElementById("sideBill").style.width = "250px";
                document.getElementById("scroll-container").style.marginRight = "250px";
            } else {
                document.getElementById("sideBill").style.width = "0";
                document.getElementById("scroll-container").style.marginRight = "0px";
            }
            if (width > 1300) {
                document.getElementById("sideBill").style.width = "400px";
                document.getElementById("scroll-container").style.marginRight = "400px";
            }
        }
    </script>
</body>

</html>