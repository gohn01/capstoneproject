<?php 
    require "connection.php";
    $column = "o_id";
    $sort = "ASC";

    if(isset($_GET['column']) && isset($_GET['sort'])){
        $column = $_GET['column'];
        $sort = $_GET['sort'];
        $sort == "ASC" ? $sort = "DESC" : $sort = "ASC";
    }
    $sql = "SELECT * FROM orders ORDER BY $column $sort";
    // $newsql = $sql . "ORDER BY" . $column . $sort;
    $result = mysqli_query($connection,$sql) or 
    trigger_error("Failed SQL". mysqli_error($connection),E_USER_ERROR);

?>