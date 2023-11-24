<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>All Menu</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="fix-header fix-sidebar">

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

                $session = $_SESSION["adm_id"];
                $user = mysqli_query($db, "select * FROM restaurant where restaurant.rs_id=(select rs_id from admin where adm_id='$session');");
                $rows = mysqli_fetch_array($user);;
                ?>
                <div class="navbar-collapse">

                    <ul class="navbar-nav mr-auto mt-md-0">




                    </ul><?php echo $rows["title"]; ?>

                    <ul class="navbar-nav my-lg-0">



                        <li class="nav-item dropdown">

                            <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>

                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/bookingSystem/user-icn.png" alt="user" class="profile-pic" /></a>
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

                <div class="row">
                    <div class="col-12">
                        <div class="col-lg-12">
                            <div class="card card-outline-primary">
                                <div class="card-header">
                                    <h4 class="m-b-0 text-white">All Menu</h4>
                                </div>

                                <div class="table-responsive m-t-40">
                                <?php
            $categories = [];
            $query = "SELECT * FROM food_category";
            $result = mysqli_query($db, $query);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $categories[] = $row;
                }
            }

            // Fetch dishes from the database
            $session=$_SESSION["adm_id"];
            $dishes = [];
            $query = "SELECT * FROM dishes WHERE dishes.rs_id = (select rs_id from admin where adm_id='$session') ORDER by dishes.title";
            $result = mysqli_query($db, $query);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $dishes[] = $row;
                }
            }

            // Loop through the categories
            foreach ($categories as $category) {
                $categoryId = $category['fc_id'];
                $categoryTitle = $category['fc_name'];

                // Output the category title
                echo "<h2>$categoryTitle</h2>";

                // Filter dishes belonging to the current category
                $categoryDishes = array_filter($dishes, function ($dish) use ($categoryId) {
                    return $dish['fc_id'] == $categoryId;
                });
                if (count($categoryDishes) > 0) {
                    // Create a table for the dishes
                    echo '<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">';
                    echo "<th>Item</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Calories</th>
                    <th>Image</th>
                   <th>Action</th>";

                    // Loop through the dishes and display them in the table
                    foreach ($categoryDishes as $dish) {
                        $dishTitle = $dish['title'];
                        $dishPrice = $dish['price'];

                        // echo "<tr><td>$dishTitle</td><td>$dishPrice</td></tr>";
                        echo '<tr>
                                <td>' . $dishTitle . '</td>
                                <td>' . $dish['slogan'] . '</td>
                                <td>Rs ' . $dishPrice . '</td>
                                <td>' . $dish['calories'] ." kcal". '</td>
                                
                                
                                <td><div class="col-md-3 col-lg-8 m-b-10">
                                <img src="Res_img/dishes/' . $dish['img'] . '" class="img-responsive  radius" style="max-height:600px;max-width:600px;align:center;" />
                                </div></td>
                                
                            
                                        <td><a href="delete_menu.php?menu_del=' . $dish['d_id'] . '" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a> 
                                        <a href="update_menu.php?menu_upd=' . $dish['d_id'] . '" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="fa fa-edit"></i></a>
                                    </td></tr>';
                    }

                    echo "</table> <br>";
                } else {
                    // Display a message when there are no items in the category
                    echo "<p>No items found in this category.</p> <br>";
                }
            }
            ?>
                                  
                                    
                                                                        
                                </div>
                          </div>
                      </div>
                            
                    </div>
                </div>
            </div>

        </div>

        <footer class="footer"> © 2023 - Online Food Ordering System </footer>

    </div>
    </div>

    </div>

    <footer class="footer"> © 2023 - Online Food Ordering System </footer>

    </div>

    </div>

    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>
</body>

</html>