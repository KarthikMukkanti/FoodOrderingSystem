<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

mysqli_query($db,"DELETE FROM food_category WHERE fc_id = '".$_GET['cat_del']."'");
header("location:add_foodCat.php");  

?>
