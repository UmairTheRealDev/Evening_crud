<?php 
   include('./db_con.php');

if(isset($_GET['delid']))
{
    $id = $_GET['delid'];

    $sq = "SELECT * FROM `users_tbl` WHERE  `id` = $id";
    $res = mysqli_query($con,$sq);
  $result =   mysqli_fetch_assoc($res);
   



    $sql = "DELETE FROM `users_tbl` WHERE $id = `id`";
    
    

    if(mysqli_query($con,$sql))
    {
        unlink($result['image']);
        header('location: table.php');
    }
}


