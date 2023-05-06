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
<style>
    table {
    border-collapse: collapse;
    width: 100%;

    }

    th, td {

    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #DDD;
    }

    tr:hover { background-color: rgb(247, 201, 209);}
</style>
<body>

    <div class="container">
        <a href="home.php" class="btn btn-dark mt-2" >Back</a>
       <h1 class="text-center py-lg-3" >Inventory</h1>
    <div class="table-responsive col-sm-12">
        <table class="table text-center">
            <thead style=" background-color: rgb(247, 201, 209); color:black; font-size:large border">
                <tr>
                    <th>
                        <a href="?column=p_name&sort=<?php echo $sort ?>" style="text-decoration:none; color:black; font-size:large" data-toggle="tooltip" title="Click to ASC/DESC">
                            Product Name
                        </a>
                    </th>
                    <th>
                        <a href="?column=p_category&sort=<?php echo $sort ?>" style="text-decoration:none; color:black; font-size:large" class="sort" data-toggle="tooltip" title="Click to ASC/DESC">
                        Category Name
                        </a>
                    </th>
                    <th>
                        <a href="?column=quantity&sort=<?php echo $sort ?>" style="text-decoration:none; color:black; font-size:large" class="sort" data-toggle="tooltip" title="Click to ASC/DESC">
                        Quantity
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php   while ($row = mysqli_fetch_array($result)) 
                {?>
                <tr>    
                    <td><?php echo $row['p_name']?></td>
                    <td><?php echo $row['p_category']?></td>
                    <td><?php echo $row['quantity']?></td>
                </tr>  
                    <?php };?>
            </tbody>
        </table>

    </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>