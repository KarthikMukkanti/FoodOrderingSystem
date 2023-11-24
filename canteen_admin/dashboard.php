<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();
if (empty($_SESSION["adm_id"])) {
    header('location:index.php');
} else {
?>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Admin Panel</title>
        <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
        <link href="css/helper.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body class="fix-header">

        <div class="preloader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
            </svg>
        </div>

        <div id="main-wrapper">

            <div class="header">
                <nav class="navbar top-navbar navbar-expand-md navbar-light">

                    <div class="navbar-header">
                        <a class="navbar-brand" href="dashboard.php">

                            <span><img src="images/icn.png" alt="homepage" class="dark-logo" /></span>

                        </a>
                    </div>
                    <?php
                        $session=$_SESSION["adm_id"]; 
                        $user= mysqli_query($db,"select * FROM restaurant where restaurant.rs_id=(select rs_id from admin where adm_id='$session');");
                        $rows=mysqli_fetch_array($user);
;                        
                    ?>
                     
                    <div class="navbar-collapse">
                        <ul class="navbar-nav mr-auto mt-md-0">
                        </ul><?php echo $rows["title"]; ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted" style="padding:0.5rem 0.5rem;" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/bookingSystem/user-icn.png" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                        </ul>
                    </div>
                </nav>
            </div>

            <div class="left-sidebar">

                <div class="scroll-sidebar">

                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            <li class="nav-devider"></li>
                            <li class="nav-label">Home  </li>
                            <li> <a href="dashboard.php"><i class="fa fa-tachometer"></i><span>Dashboard</span></a>
                            </li>
                            <li class="nav-label">Log</li>
                            <!-- <li> <a href="all_users.php">  <span><i class="fa fa-user f-s-20 "></i></span><span>Users</span></a></li> -->
                            <!-- <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Restaurant</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="all_restaurant.php">All Restaurant</a></li>
								<li><a href="add_category.php">Add Category</a></li>
                                <li><a href="add_restaurant.php">Add Restaurant</a></li>
                                
                            </ul>
                        </li> -->

                            <!-- <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Menu</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="all_menu.php">All Menues</a></li>
								<li><a href="add_menu.php">Add Menu</a></li>
                              
                                
                            </ul>
                        </li> -->
                            <li> <a href="all_menu.php"><i class="fa fa-cutlery" aria-hidden="true"></i><span>All Menues</span></a></li>
                            <li> <a href="add_menu.php"><i class="fa fa-plus" aria-hidden="true"></i><span>Add Menu</span></a></li>
                            <li> <a href="all_orders.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Orders</span></a></li>
                            <li> <a href="reports.php"><i class="fa fa-file-text-o" aria-hidden="true"></i><span>Reports</span></a></li>
                            <li> <a href="item_reports.php"><i class="fa fa-bar-chart" aria-hidden="true"></i><span>Items report</span></a></li>
                        </ul>
                    </nav>

                </div>

            </div>

            <div class="page-wrapper">



                <div class="container-fluid">
                    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Canteen Admin Dashboard</h4>
                            </div>
                            <div class="row">

                                <!-- <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-home f-s-40 "></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2>
                                        //<?php $sql = "select * from restaurant";
                                            //		$result=mysqli_query($db,$sql); 
                                            //			$rws=mysqli_num_rows($result);
                                            //			
                                            //			echo $rws;
                                            ?>
                                                    </h2>
                                    <p class="m-b-0">Restaurants</p>
                                </div>
                            </div>
                        </div>
                    </div> -->



                                <!-- <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-users f-s-40"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php $sql = "select * from users";
                                        $result = mysqli_query($db, $sql);
                                        $rws = mysqli_num_rows($result);

                                        echo $rws; ?></h2>
                                    <p class="m-b-0">Users</p>
                                </div>
                            </div>
                        </div>
                    </div> -->

                                <div class="col-md-4">
                                    <div class="card p-30">
                                        <div class="media">
                                            <div class="media-left meida media-middle">
                                                <span><i class="fa fa-th-large f-s-40" aria-hidden="true"></i></span>
                                            </div>
                                            <div class="media-body media-text-right">
                                                <h2><?php 
                                                $session=$_SESSION["adm_id"]; 
                                                $sql = "SELECT COUNT(DISTINCT fc_id) AS category_count FROM dishes JOIN restaurant ON dishes.rs_id = restaurant.rs_id WHERE restaurant.rs_id = (select rs_id from admin where adm_id='$session');";
                                                $result = mysqli_query($db, $sql);
                                                $rows=mysqli_fetch_array($result);

                                                    echo $rows["category_count"]; ?></h2>
                                                <p class="m-b-0">Food Categories</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card p-30">
                                        <div class="media">
                                            <div class="media-left meida media-middle">
                                                <span><i class="fa fa-cutlery f-s-40" aria-hidden="true"></i></span>
                                            </div>
                                            <div class="media-body media-text-right">
                                                <h2><?php 
                                                $session=$_SESSION["adm_id"]; 
                                                $sql = "SELECT COUNT(*) AS dish_count FROM dishes JOIN restaurant ON dishes.rs_id = restaurant.rs_id WHERE restaurant.rs_id = (select rs_id from admin where adm_id='$session');";
                                                $result = mysqli_query($db, $sql);
                                                $rows=mysqli_fetch_array($result);
                                                
                                                    echo $rows["dish_count"];
                                                ?></h2>
                                                <p class="m-b-0">Dishes</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card p-30">
                                        <div class="media">
                                            <div class="media-left meida media-middle">
                                                <span><i class="fa fa-inr f-s-40" aria-hidden="true"></i></span>
                                            </div>
                                            <div class="media-body media-text-right">
                                                <h2><?php
                                                    $session=$_SESSION["adm_id"]; 
                                                    $sql = "SELECT SUM(quantity * price) AS total_earnings FROM users_orders JOIN restaurant ON users_orders.rs_id = restaurant.rs_id WHERE restaurant.rs_id = (select rs_id from admin where adm_id='$session') AND users_orders.status = 'closed';";
                                                    $result = mysqli_query($db, $sql);
                                                    $rows=mysqli_fetch_array($result);
                                                    
                                                    if ( $rows["total_earnings"]>0){
                                                        echo $rows["total_earnings"];
                                                    }else{
                                                        echo "0";
                                                    }    
                                                    
                                                    ?></h2>
                                                <p class="m-b-0">Total Earnings</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-3">
                                    <div class="card p-30">
                                        <div class="media">
                                            <div class="media-left meida media-middle">
                                                <span><i class="fa fa-shopping-cart f-s-40" aria-hidden="true"></i></span>
                                            </div>
                                            <div class="media-body media-text-right">
                                                <h2><?php
                                                $session=$_SESSION["adm_id"]; 
                                                $sql = "SELECT COUNT(*) AS total_orders FROM users_orders JOIN restaurant ON users_orders.rs_id = restaurant.rs_id WHERE restaurant.rs_id = (select rs_id from admin where adm_id='$session');";
                                                $result = mysqli_query($db, $sql);
                                                $rows=mysqli_fetch_array($result);
                                                
                                                if ( $rows["total_earnings"]>0){
                                                    echo $rows["total_earnings"];
                                                }else{
                                                    echo "0";
                                                }   
                                                ?></h2>
                                                <p class="m-b-0">Total Orders</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card p-30">
                                        <div class="media">
                                            <div class="media-left meida media-middle">
                                                <span><i class="fa fa-spinner f-s-40" aria-hidden="true"></i></span>
                                            </div>
                                            <div class="media-body media-text-right">
                                                <h2><?php
                                                 $session=$_SESSION["adm_id"]; 
                                                 $sql = "SELECT COUNT(*) AS total_orders_processing FROM users_orders JOIN restaurant ON users_orders.rs_id = restaurant.rs_id WHERE restaurant.rs_id = (select rs_id from admin where adm_id='$session') AND users_orders.status NOT IN ('closed', 'rejected');";
                                                 $result = mysqli_query($db, $sql);
                                                 $rows=mysqli_fetch_array($result);
                                                 
                                                     echo $rows["total_orders_processing"]; 
                                                    ?></h2>
                                                <p class="m-b-0">Processing Orders</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card p-30">
                                        <div class="media">
                                            <div class="media-left meida media-middle">
                                                <span><i class="fa fa-check f-s-40" aria-hidden="true"></i></span>
                                            </div>
                                            <div class="media-body media-text-right">
                                                <h2><?php 
                                                $session=$_SESSION["adm_id"]; 
                                                $sql = "SELECT COUNT(*) AS total_orders_delivered FROM users_orders JOIN restaurant ON users_orders.rs_id = restaurant.rs_id WHERE restaurant.rs_id = (select rs_id from admin where adm_id='$session') AND users_orders.status = 'closed';";
                                                $result = mysqli_query($db, $sql);
                                                $rows=mysqli_fetch_array($result);
                                                
                                                    echo $rows["total_orders_delivered"]; 
                                                    ?></h2>
                                                <p class="m-b-0">Delivered Orders</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- <div class="col-md-4">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle"> 
                                    <span><i class="fa fa-times f-s-40" aria-hidden="true"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php $sql = "select * from users_orders WHERE status = 'rejected' ";
                                        $result = mysqli_query($db, $sql);
                                        $rws = mysqli_num_rows($result);

                                        echo $rws; ?></h2>
                                    <p class="m-b-0">Cancelled Orders</p>
                                </div>
                            </div>
                        </div>
                    </div> -->


                            </div>
                        </div>
                    </div>
                </div>

                <script src="js/lib/jquery/jquery.min.js"></script>
                <script src="js/lib/bootstrap/js/popper.min.js"></script>
                <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
                <script src="js/jquery.slimscroll.js"></script>
                <script src="js/sidebarmenu.js"></script>
                <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
                <script src="js/custom.min.js"></script>

    </body>

</html>
<?php
}
?>