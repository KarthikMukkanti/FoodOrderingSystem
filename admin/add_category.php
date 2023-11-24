<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();


if(isset($_POST['submit'] ))
{
    if(empty($_POST['c_name']))
		{
			$error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>field Required!</strong>
															</div>';
		}
	else
	{
		
	$check_cat= mysqli_query($db, "SELECT c_name FROM res_category where c_name = '".$_POST['c_name']."' ");

	
	
	if(mysqli_num_rows($check_cat) > 0)
     {
    	$error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Category already exist!</strong>
															</div>';
     }
	else{
       
	
	$mql = "INSERT INTO res_category(c_name) VALUES('".$_POST['c_name']."')";
	mysqli_query($db, $mql);
			$success = 	'<div class="alert alert-success alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																New Canteen Category Added Successfully.</br></div>';
	
    }
	}

}


?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">   
    <title>Add Canteen Category</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
</head>

<body class="fix-header">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <div id="main-wrapper">

        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <div class="navbar-header">
                    <a class="navbar-brand" href="dashboard.php">
                        
                        <span><img src="images/icn.png" alt="homepage" class="dark-logo" /></span>
                    </a>
                </div>
                <div class="navbar-collapse">
      
                    <ul class="navbar-nav mr-auto mt-md-0">

                    </ul>Admin
           
                    <ul class="navbar-nav my-lg-0">

        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted" style="padding: 0.5rem 0.5rem" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/bookingSystem/user-icn.png" alt="user" class="profile-pic" /></a>
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
                <li class="nav-label">Home</li>
                <li> <a href="dashboard.php"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
                <li class="nav-label">Log</li>
                <li> <a href="all_users.php">  <span><i class="fa fa-user f-s-20 "></i></span><span>Users</span></a></li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Canteen</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="all_restaurant.php">All Canteens</a></li>
                        <li><a href="add_category.php">Add Canteen Category</a></li>
                        <li><a href="add_restaurant.php">Add Canteen</a></li>
                        
                    </ul>
                </li>
             <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Menu</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="all_menu.php">All Menues</a></li>
                        <li><a href="add_foodCat.php">Add food Category</a></li>
                        <li><a href="add_menu.php">Add Menu</a></li>
                      
                        
                    </ul>
                </li>
                 <li> <a href="all_orders.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Orders</span></a></li>
                 <li> <a href="reports.php"><i class="fa fa-file-text-o" aria-hidden="true"></i><span>Reports</span></a></li>
                 
                 <li> <a href="item_reports.php"><i class="fa fa-bar-chart" aria-hidden="true"></i><span>Items report</span></a></li>

            </ul>
        </nav>

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