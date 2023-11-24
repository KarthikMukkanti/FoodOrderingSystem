
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();
if (strlen($_SESSION['user_id']) == 0) {
    header('location:../login.php');
  } else {
    if (isset($_POST['update'])) {
      $form_id = $_GET['user_upd'];
        // $form_id= $o_id;
      $status = $_POST['status'];
      $remark = $_POST['remark'];
      $query = mysqli_query($db, "insert into remark(frm_id,status,remark) values('$form_id','$status','$remark')");
      $sql = mysqli_query($db, "update users_orders set status='$status' where o_id='$form_id'");
  
      echo "<script>alert('Form Details Updated Successfully');</script>";
    }
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>View Order</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script language="javascript" type="text/javascript">
        var popUpWin = 0;

        function popUpWindow(URLStr, left, top, width, height) {
            if (popUpWin) {
                if (!popUpWin.closed) popUpWin.close();
            }
            popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 1000 + ',height=' + 1000 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
        }
    </script>
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
                        $session=$_SESSION["adm_id"]; 
                        $user= mysqli_query($db,"select * FROM restaurant where restaurant.rs_id=(select rs_id from admin where adm_id='$session');");
                        $rows=mysqli_fetch_array($user);
;                        
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
                                    <h4 class="m-b-0 text-white">View Order</h4>
                                </div>

                                <div class="table-responsive m-t-20">
                                    <table id="myTable" class="table table-bordered table-striped">

                                        <tbody>
                                            <?php
                                            $sql = "SELECT users.*, users_orders.* FROM users INNER JOIN users_orders ON users.u_id=users_orders.u_id where o_id='" . $_GET['user_upd'] . "'";
                                            $query = mysqli_query($db, $sql);
                                            $rows = mysqli_fetch_array($query);



                                            ?>

                                            <tr>
                                                <td><strong>Username:</strong></td>
                                                <td>
                                                    <center><?php echo $rows['username']; ?></center>
                                                </td>
                                                <td>
                                                    <center>
                                                        <!-- <a href="javascript:void(0);" onClick="popUpWindow('order_update.php?form_id=<?php echo htmlentities($rows['o_id']); ?>');" title="Update order">
                                                            <button type="button" class="btn btn-primary">Update Order Status</button></a> -->
                                                        <form name="updateticket" id="updatecomplaint" method="post">
                                                            <b>Status: </b>
                                                            <?php         $form_id= $rows['o_id']; ?>
                                                            <select name="status" required="required">
                                                                <option value="">Select Status</option>
                                                                <option value="in process">Preparing</option>
                                                                <option value="closed">Delivered</option>
                                                                <option value="rejected">Cancelled</option>
                                                            </select>

                                                            <!-- <textarea name="remark" cols="50" rows="10"></textarea> -->
                                    
                                                            <input type="submit" name="update" class="btn btn-primary" value="Submit">
                                                        </form>

                                                    </center>
                                                </td>


                                            </tr>
                                            <tr>
                                                <td><strong>Title:</strong></td>
                                                <td>
                                                    <center><?php echo $rows['title']; ?></center>
                                                </td>
                                                <td>
                                                    <center>
                                                        <a href="javascript:void(0);" onClick="popUpWindow('userprofile.php?newform_id=<?php echo htmlentities($rows['o_id']); ?>');" title="Update order">
                                                            <button type="button" class="btn btn-primary">View User Detials</button></a>

                                                    </center>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td><strong>Quantity:</strong></td>
                                                <td>
                                                    <center><?php echo $rows['quantity']; ?></center>
                                                </td>


                                            </tr>
                                            <tr>
                                                <td><strong>Price:</strong></td>
                                                <td>
                                                    <center>Rs <?php echo $rows['price']; ?></center>
                                                </td>


                                            </tr>
                                           
                                            <tr>
                                                <td><strong>Date:</strong></td>
                                                <td>
                                                    <center><?php echo $rows['date']; ?></center>
                                                </td>


                                            </tr>
                                            <tr>
                                                <td><strong>Status:</strong></td>
                                                <?php
                                                $status = $rows['status'];
                                                
                                                if ($status == "in process" or $status == "" or $status == "NULL") { ?>
                                                    <td>
                                                        <center><button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin" aria-hidden="true"></span>Prepared</button></center>
                                                    </td>
                                                <?php
                                                }
                                                if ($status == "closed") {
                                                ?>
                                                    <td>
                                                        <center><button type="button" class="btn btn-primary"><span class="fa fa-check-circle" aria-hidden="true"></span> Delivered</button></center>
                                                    </td>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if ($status == "rejected") {
                                                ?>
                                                    <td>
                                                        <center><button type="button" class="btn btn-danger"> <i class="fa fa-close"></i> Cancelled</button> </center>
                                                    </td>
                                                <?php
                                                }
                                                ?>


                                            </tr>







                                        </tbody>
                                    </table>
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
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>
</body>

</html>
<?php } ?>