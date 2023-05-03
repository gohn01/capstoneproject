<?php 
    include "connection.php";
    // include "retrieveorder.php";
    include "filtersearch.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Reports</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <div>Filter Data From</div>
                    </div>
                    <div class="card-body">
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">From Date</label>
                                        <input type="date" name="from_date" class="form-control" value="<?php if(isset($_GET['from_date'])){echo $_GET['from_date'];}?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">To Date</label>
                                        <input type="date" name="to_date" class="form-control" value="<?php if(isset($_GET['to_date'])){echo $_GET['to_date'];}?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Click to filter</label><br>
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <table class="table table-borderd">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Order Name</th>
                        <th>Product ID</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Date Created</th>
                        <th>Date Updated</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
 
                <?php 
                if(isset($_GET['from_date']) && isset($_GET['to_date'])){
                    $from_date = $_GET['from_date'];
                    $to_date = $_GET['to_date'];

                    $sql = "SELECT * FROM orders WHERE date_created BETWEEN '$from_date' AND '$to_date' ";
                    $result = mysqli_query($connection,$sql) or 
                    trigger_error("Failed SQL". mysqli_error($connection),E_USER_ERROR);

                    if(mysqli_num_rows($result) > 0){
                        foreach($result as $row){
                            // echo $row('o_name');
                                ?>
                                <tr>
                                    <td><?php echo $row['o_id']?></td>
                                    <td><?php echo $row['o_name']?></td>
                                    <td><?php echo $row['p_id']?></td>
                                    <td><?php echo $row['o_price']?></td>
                                    <td><?php echo $row['o_quantity']?></td>
                                    <td><?php echo $row['date_created']?></td>
                                    <td><?php echo $row['date_updated']?></td>
                                    <td></td>
                                </tr>

                            <?php 
                        }
                    }else{
                        echo "<p style='color:red;'>" . "No Record Found" . "</p>";
                    }
                }
            ?>
               <?php 
            ?>




                <!-- <?php 
                if(isset($_GET['from_date']) && isset($_GET['to_date'])){
                    $from_date = $_GET['from_date'];
                    $to_date = $_GET['to_date'];

                    $sql = "SELECT * FROM orders WHERE date_created BETWEEN '$from_date' AND '$to_date' ";
                    $result = mysqli_query($connection,$sql) or 
                    trigger_error("Failed SQL". mysqli_error($connection),E_USER_ERROR);

                    if(mysqli_num_rows($result) > 0){
                        foreach($result as $row){
                            // echo $row('o_name');
                                ?>
                                <tr>
                                    <td><?php echo $row['o_id']?></td>
                                    <td><?php echo $row['o_name']?></td>
                                    <td><?php echo $row['p_id']?></td>
                                    <td><?php echo $row['o_price']?></td>
                                    <td><?php echo $row['o_quantity']?></td>
                                    <td><?php echo $row['date_created']?></td>
                                    <td><?php echo $row['date_updated']?></td>
                                    <td></td>
                                </tr>
                            <?php 
                        }
                    }else{
                        echo "No Record Found";
                    }
                }
            ?> -->
                </tbody>
            </table>
        </div>
    </div>


    <!-- <div class="card">
        <div class="card-body">

        </div>
    </div> -->


        <!-- <div>
            <h1>Reports</h1>
            <form action="retrieveorder.php" method="POST">
                <label for="">FILTER BY DATE(FROM-TO)</label>
                <input type="date" name="date_from" id="date_from" value="<?php echo $row['date_created']?>">
                <input type="date" name="date_to" id="date_to" value="<?php echo $row['date_updated']?>">
                <input type="submit" name="filter" value="filter">
            </form>

            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Order Name</th>
                        <th>Product ID</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Date Created</th>
                        <th>Date Updated</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                while ($row = mysqli_fetch_array($result)) 
                {  ?> 
                    <tr>
                        <td><?php echo $row['o_id']?></td>
                        <td><?php echo $row['o_name']?></td>
                        <td><?php echo $row['p_id']?></td>
                        <td><?php echo $row['o_price']?></td>
                        <td><?php echo $row['o_quantity']?></td>
                        <td><?php echo $row['date_created']?></td>
                        <td><?php echo $row['date_updated']?></td>
                        <td></td>
                        <td class="d-flex gap-2">
                            <form action="update.php" method="POST">
                                    <input type="submit" name="update" id="update" value="Update" class="btn btn-primary">
                                    <input type="hidden" name="o_id" id="o_id" value="<?php echo $row['o_id']?>">
                            </form>
                  
                            <form action="delete.php" method="POST">
                                <input type="hidden" name="p_id" id="p_id" value="<?php echo $row['p_id']?>">
                                <input type="submit" name="delete" id="delete" value="Delete" onclick="return confirm('DELETE?')" class="btn btn-danger">
                            </form>            
                        </td>
                    
                    </tr>
               <?php };
            ?>
                </tbody>
            </table>
        </div> -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>