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
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Items Report</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
      .chart-container {
        display: flex;
        justify-content: space-around;
        margin: 50px;
      }
    </style></head>

<body class="fix-header fix-sidebar">

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
                            <a class="nav-link dropdown-toggle text-muted " style="padding: 0.5rem 0.5rem" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/bookingSystem/user-icn.png" alt="user" class="profile-pic" /></a>
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
     
        <div class="page-wrapper">
          
            
          
            <div class="container-fluid">
         
                <div class="row">
                    <div class="col-12">
                        
                       
                      
                       
						
						
						    
                             <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Reports</h4>
                            </div>
                            <button onClick="window.print()">Print Report</button>
                                
								
                                <div class="table-responsive m-t-40">
                                <?php

                            // Query 1
                            $query1 = $db->query("
                            SELECT u.title, SUM(u.quantity) AS total_quantity
                            FROM users_orders u
                            JOIN restaurant r ON u.rs_id = r.rs_id
                            WHERE r.title = 'Main Canteen' AND u.status = 'closed'
                            GROUP BY u.title;
                            ");

                            $title1 = [];
                            $quantity1 = [];

                            foreach ($query1 as $data) {
                            $title1[] = $data['title'];
                            $quantity1[] = $data['total_quantity'];
                            }



                            // Query 3
                            $query3 = $db->query("
                            SELECT u.title, SUM(u.quantity) AS total_quantity
                            FROM users_orders u
                            JOIN restaurant r ON u.rs_id = r.rs_id
                            WHERE r.title = 'IT Canteen' AND u.status = 'closed'
                            GROUP BY u.title;
                            ");

                            $title3 = [];
                            $quantity3 = [];

                            foreach ($query3 as $data) {
                            $title3[] = $data['title'];
                            $quantity3[] = $data['total_quantity'];
                            }

                            // Query 4
                            $query4 = $db->query("
                            SELECT u.title, SUM(u.quantity) AS total_quantity
                            FROM users_orders u
                            JOIN restaurant r ON u.rs_id = r.rs_id
                            WHERE r.title = 'MBA Canteen'  AND u.status = 'closed'
                            GROUP BY u.title;
                            ");

                            $title4 = [];
                            $quantity4 = [];

                            foreach ($query4 as $data) {
                            $title4[] = $data['title'];
                            $quantity4[] = $data['total_quantity'];
                            }



                            $db->close();
                            ?>
        
                            <div class="chart-container">
                                <div>
                                    <canvas id="myChart1" style="height: 300px; width: 600px;"></canvas>
                                </div>
                            </div>
                            
                            
                            <div class="chart-container">
                                <div>
                                    <canvas id="myChart4" style="height: 300px; width: 600px;"></canvas>
                                </div>
                            </div>
                            
                            <div class="chart-container">
                                <div>
                                    <canvas id="myChart3" style="height: 300px; width: 600px;"></canvas>
                                </div>
                            </div>


                                                <script>
                                                    // Chart 1
                                                    const labels1 = <?php echo json_encode($title1) ?>;
                                                    const data1 = {
                                                        labels: labels1,
                                                        datasets: [
                                                        {
                                                            label: 'Item vs Quantity (Main Canteen)',
                                                            data: <?php echo json_encode($quantity1) ?>,
                                                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                                            borderColor: 'rgb(255, 99, 132)',
                                                            borderWidth: 1
                                                        }
                                                        ]
                                                    };

                                                    const config1 = {
                                                        type: 'bar',
                                                        data: data1,
                                                        options: {
                                                        scales: {
                                                            y: {
                                                            beginAtZero: true
                                                            }
                                                        }
                                                        }
                                                    };

                                                    var myChart1 = new Chart(
                                                        document.getElementById('myChart1'),
                                                        config1
                                                    );

                                                    

                                                    // Chart 3
                                                    const labels3 = <?php echo json_encode($title3) ?>;
                                                    const data3 = {
                                                        labels: labels3,
                                                        datasets: [
                                                        {
                                                            label: 'Item vs Quantity (IT Canteen)',
                                                            data: <?php echo json_encode($quantity3) ?>,
                                                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                                            borderColor: 'rgb(54, 162, 235)',
                                                            borderWidth: 1
                                                        }
                                                        ]
                                                    };

                                                    const config3 = {
                                                        type: 'bar',
                                                        data: data3,
                                                        options: {
                                                        scales: {
                                                            y: {
                                                            beginAtZero: true
                                                            }
                                                        }
                                                        }
                                                    };

                                                    var myChart3 = new Chart(
                                                        document.getElementById('myChart3'),
                                                        config3
                                                    );

                                                    // Chart 4
                                                    const labels4 = <?php echo json_encode($title4) ?>;
                                                    const data4 = {
                                                        labels: labels4,
                                                        datasets: [
                                                        {
                                                            label: 'Item vs Quantity (MBA Canteen)',
                                                            data: <?php echo json_encode($quantity4) ?>,
                                                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                                            borderColor: 'rgb(75, 192, 192)',
                                                            borderWidth: 1
                                                        }
                                                        ]
                                                    };

                                                    const config4 = {
                                                        type: 'bar',
                                                        data: data4,
                                                        options: {
                                                        scales: {
                                                            y: {
                                                            beginAtZero: true
                                                            }
                                                        }
                                                        }
                                                    };

                                                    var myChart4 = new Chart(
                                                        document.getElementById('myChart4'),
                                                        config4
                                                    );

                                                    
                                                    </script>
                                </div>
                            </div>
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