<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();

include_once 'product-action.php';

?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Dishes</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/input-spinner/dist/input-spinner.min.css">
    <script src="https://cdn.jsdelivr.net/npm/input-spinner/dist/input-spinner.min.js"></script>
    <style>
        .collapsible {
            background-color: #FAFAF8;
            color: white;
            cursor: pointer;
            padding: 10px;
            width: 100%;
            text-align: left;
            outline: none;
            font-size: 15px;
            color: #25282B;
        }

        /* .collapsible .row {
    background-color: #777;
} */
        .collapsible:hover {
            background-color: #F1F1F1;
        }

        .content {
            padding: 0 18px;
            /* display: none; */
            overflow: hidden;
            background-color: #f1f1f1;
        }

        .menu-btn {
            background-color: #040008;
            background-color: white;
            color: black;
            padding: 12px;
            font-size: 20px;
            font-weight: bolder;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            border: none;
        }

        .dropdown-menu {
            position: relative;
            display: inline-block;
        }

        .menu-content {
            display: none;
            position: absolute;
            background-color: #F1F1F1;
            min-width: 160px;
            z-index: 1;
        }

        .links-hidden {
            display: inline-block;
            color: BLACK;
            padding: 12px 16px;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
        }

        .links-hidden {
            display: block;
        }

        .links-hidden:hover,
        /* .links:hover {
            background-color: black;
            color: white;
        } */

        .dropdown-menu:hover .menu-content {
            display: block;
        }

        /* .dropdown-menu:hover .menu-btn {
            background-color: #669999;
        } */

        #men {
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
        }
    </style>

</head>

<body>

    <header id="header" class="header-scroll top-header headrom">
        <nav class="navbar navbar-dark">
            <div class="container">
                <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/icn.png" alt=""> </a>
                <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                        <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Canteens <span class="sr-only"></span></a> </li>
                        <?php
                        if (empty($_SESSION["user_id"])) {
                            echo '<li class="nav-item"><a href="login.php" class="nav-link active">Login</a> </li>';
                        } else {

                            echo '<li class="nav-item"><a href="edit_profile.php" class="nav-link active">Profile</a> </li>';
                            echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">My Orders</a> </li>';
                            echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">Logout</a> </li>';
                        }

                        ?>

                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="page-wrapper">
        <div class="top-links">
            <div class="container">
                <ul class="row links">

                    <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="restaurants.php">Choose Canteen</a></li>
                    <li class="col-xs-12 col-sm-4 link-item active"><span>2</span><a href="dishes_sortby_calories.php?res_id=<?php echo $_GET['res_id']; ?>">Pick Your favorite food</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Order and Pay</a></li>

                </ul>
            </div>
        </div>
        <?php $ress = mysqli_query($db, "select * from restaurant where rs_id='$_GET[res_id]'");
        $rows = mysqli_fetch_array($ress);

        ?>
        <section class="inner-page-hero bg-image" data-image-src="images/img/restrrr.png">
            <div class="profile">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12  col-md-4 col-lg-4 profile-img">
                            <div class="image-wrap">
                                <figure><?php echo '<img src="admin/Res_img/' . $rows['image'] . '"alt="Restaurant logo">'; ?></figure>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 profile-desc">
                            <div class="pull-left right-text white-txt">
                                <h6><a href="#"><?php echo $rows['title']; ?></a></h6>
                                <p><?php echo $rows['address']; ?></p>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>
        <div class="breadcrumb">
            <div class="container">

            </div>
        </div>
        <div class="container m-t-30">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">

                    <div class="widget widget-cart">
                        <div class="widget-heading">
                            <h3 class="widget-title text-dark">
                                Your Cart
                            </h3>


                            <div class="clearfix"></div>
                        </div>
                        <div class="order-row bg-white">
                            <div class="widget-body">


                                <?php

                                $item_total = 0;
                                $total_cal = 0;

                                foreach ($_SESSION["cart_item"] as $item) {
                                    $user = mysqli_query($db, " select * from dishes where title='$item[title]' ");
                                    $rows = mysqli_fetch_array($user);
                                ?>

                                    <div class="title-row">
                                        <?php echo $item["title"]; ?><a href="dishes_sortby_calories.php?res_id=<?php echo $_GET['res_id']; ?>&action=remove&id=<?php echo $item["d_id"]; ?>">
                                            <i class="fa fa-trash pull-right"></i></a>

                                    </div>

                                    <div class="form-group row no-gutter">
                                        <div class="col-xs-8">
                                            <input type="text" class="form-control b-r-0" value=<?php echo "Rs" . $item["price"]; ?> readonly id="exampleSelect1">
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="form-control" type="text" readonly value='<?php echo $item["quantity"]; ?>' id="example-number-input">
                                        </div>

                                        <a href="dishes_sortby_calories.php?res_id=<?php echo $_GET['res_id']; ?>&action=decrement&id=<?php echo $item["d_id"]; ?>">
                                            <i class="fa fa-minus pull-right"></i></a>

                                    </div>

                                <?php
                                    $item_total += ($item["price"] * $item["quantity"]);
                                    $total_cal += ($rows["calories"] * $item["quantity"]);
                                }
                                ?>

                            </div>
                        </div>



                        <div class="widget-body">
                            <div class="price-wrap text-xs-center">
                                <p style="margin-bottom: 0px;">TOTAL CALORIES <br>of items in this cart</p>
                                <h3 class="value"><strong><?php echo $total_cal . " kcal"; ?></strong></h3>
                                <br>
                                <p style="margin-bottom: 0px;">TOTAL BILL</p>
                                <h3 class="value"><strong><?php echo "Rs " . $item_total; ?></strong></h3>


                                <?php
                                if ($item_total == 0) {
                                ?>


                                    <a href="checkout.php?res_id=<?php echo $_GET['res_id']; ?>&action=check" class="btn btn-danger btn-lg disabled">Checkout</a>

                                <?php
                                } else {
                                ?>
                                    <a href="checkout.php?res_id=<?php echo $_GET['res_id']; ?>&action=check" class="btn btn-success btn-lg active">Checkout</a>
                                <?php
                                }
                                ?>

                            </div>
                        </div>




                    </div>
                </div>

                <div class="col-md-8">

                    <div class="row" id="men">
                        <h1>Menu</h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <div class="dropdown-menu">
                            <button class="menu-btn">Sort by</button>
                            <div class="menu-content">
                                <?php echo '<a class="links-hidden" href="dishes.php?res_id=' . $rows['rs_id'] . '">Dish Name</a>'; ?>
                                <?php echo '<a class="links-hidden" href="dishes_sortby_price.php?res_id=' . $rows['rs_id'] . '">Price</a>'; ?>
                                <!-- <a class="links-hidden" href="#">Visit Us</a>
                                        <a class="links-hidden" href="#">About Us</a> -->
                            </div>
                        </div>
                    </div><br><br><br><br>




                    <?php
                    $qur = $db->prepare("select * from food_category");
                    $qur->execute();
                    $categorys = $qur->get_result();
                    if ($categorys->num_rows > 0) {
                        foreach ($categorys as $category) {

                    ?>
                            <button type="button" class="collapsible" style="text-align: center;"><?php echo $category['fc_name']; ?></button>

                            <div class="content">
                                <div class="collapse in" id="popular2">
                                    <?php
                                    $stmt = $db->prepare("select * from dishes where rs_id='$_GET[res_id]' and fc_id='$category[fc_id]' ORDER BY calories");
                                    $stmt->execute();
                                    $products = $stmt->get_result();
                                    // echo $products;
                                    if ($products->num_rows > 0) {
                                        foreach ($products as $product) {

                                    ?> <div class="menu-widget">
                                                <div class="food-item">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12 col-lg-8">
                                                            <form method="post" action='dishes_sortby_calories.php?res_id=<?php echo $_GET['res_id']; ?>&action=add&id=<?php echo $product['d_id']; ?>'>
                                                                <div class="rest-logo pull-left">
                                                                    <a class="restaurant-logo pull-left" href="#"><?php echo '<img src="admin/Res_img/dishes/' . $product['img'] . '" alt="Food logo" >'; ?></a>
                                                                </div>

                                                                <div class="rest-descr">
                                                                    <h6><a href="#"><?php echo $product['title']; ?> </a> (<span><?php echo $product['calories']; ?>Kcal)</span></h6>
                                                                    <p> <?php echo $product['slogan']; ?></p>
                                                                </div>

                                                        </div>

                                                        <div class="col-xs-12 col-sm-12 col-lg-3  item-cart-info">
                                                            <span class="price ">Rs <?php echo $product['price']; ?></span>
                                                            <input class="b-r-0" type="number" name="quantity" style="margin-left:20px;width:40%; padding: 2px 0 2px 4px ;display: inline-block;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;" value="0" size="1" min="0" />

                                                            <input type="submit" class="btn theme-btn" style="margin-left:40px;margin-top:10px;" value="Add To Cart" />
                                                        </div>



                                                        </form>
                                                    </div>

                                                </div>
                                            </div>

                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <div style="margin:5px">
                                            <h6>Currently Items are not available in this Category</h6>
                                        </div>
                                    <?php
                                    }

                                    ?>



                                </div>

                            </div>

                            <br>

                        <?php
                        }
                    } else {
                        ?>
                        <div style="margin:5px">
                            <h6>NO Categories</h6>
                        </div>
                    <?php
                    }

                    ?>

                </div>
            </div>

        </div>
        <script>
            var coll = document.getElementsByClassName("collapsible");
            var i;

            for (i = 0; i < coll.length; i++) {
                coll[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var content = this.nextElementSibling;
                    if (content.style.display === "block") {
                        content.style.display = "none";
                    } else {
                        content.style.display = "block";
                    }
                });
            }
        </script>
        <footer class="footer">
            <div class="container">

                <div class="row bottom-footer">
                    <div class="container">
                        <div class="row">
                            <!-- <div class="col-xs-12 col-sm-3 payment-options color-gray">
                                    <h5>Payment Options</h5>
                                    <ul>
                                        <li>
                                            <a href="#"> <img src="images/paypal.png" alt="Paypal"> </a>
                                        </li>
                                        <li>
                                            <a href="#"> <img src="images/mastercard.png" alt="Mastercard"> </a>
                                        </li>
                                        <li>
                                            <a href="#"> <img src="images/maestro.png" alt="Maestro"> </a>
                                        </li>
                                        <li>
                                        <li>
                                            <a href="#"> <img src="images/stripe.png" alt="Stripe"> </a>
                                        </li>
                                        <li>
                                            <a href="#"> <img src="images/bitcoin.png" alt="Bitcoin"> </a>
                                        </li>
                                    </ul>
                                </div> -->
                            <a href="https://www.amrita.edu/" target="_blank"><img src="images/amrita.jpg" class="col-xs-12 col-sm-3 payment-options color-gray"></a>

                            <div class="col-xs-12 col-sm-4 address color-gray">
                                <h5>Address</h5>
                                <p>Amrita Vishwa Vidyapeetham, Ettimadai, Coimbatore, Tamil Nadu, PIN: 641112 </p>
                            </div>
                            <div class="col-xs-12 col-sm-5 additional-info color-gray">
                                <h5>Addition informations</h5>
                                <!-- <p>Join thousands of other restaurants who benefit from having partnered with us.</p> -->
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat aliquam quam consequuntur quasi deserunt debitis, similique maiores repudiandae laborum id nulla, veritatis magni incidunt mollitia voluptatum? Perspiciatis pariatur molestiae sunt.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </footer>

    </div>

    </div>


    <div class="modal fade" id="order-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                <div class="modal-body cart-addon">
                    <div class="food-item white">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-lg-6">
                                <div class="item-img pull-left">
                                    <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/70x70" alt="Food logo"></a>
                                </div>

                                <div class="rest-descr">
                                    <h6><a href="#">Sandwich de Alegranza Grande Menü (28 - 30 cm.)</a></h6>
                                </div>

                            </div>

                            <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"> <span class="price pull-left">$ 2.99</span></div>
                            <div class="col-xs-6 col-sm-4 col-lg-4">
                                <div class="row no-gutter">
                                    <div class="col-xs-7">
                                        <select class="form-control b-r-0" id="exampleSelect2">
                                            <option>Size SM</option>
                                            <option>Size LG</option>
                                            <option>Size XL</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-5">
                                        <input class="form-control" type="number" value="0" id="quant-input-2">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="food-item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-lg-6">
                                <div class="item-img pull-left">
                                    <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/70x70" alt="Food logo"></a>
                                </div>

                                <div class="rest-descr">
                                    <h6><a href="#">Sandwich de Alegranza Grande Menü (28 - 30 cm.)</a></h6>
                                </div>

                            </div>

                            <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"> <span class="price pull-left">$ 2.49</span></div>
                            <div class="col-xs-6 col-sm-4 col-lg-4">
                                <div class="row no-gutter">
                                    <div class="col-xs-7">
                                        <select class="form-control b-r-0" id="exampleSelect3">
                                            <option>Size SM</option>
                                            <option>Size LG</option>
                                            <option>Size XL</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-5">
                                        <input class="form-control" type="number" value="0" id="quant-input-3">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="food-item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-lg-6">
                                <div class="item-img pull-left">
                                    <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/70x70" alt="Food logo"></a>
                                </div>

                                <div class="rest-descr">
                                    <h6><a href="#">Sandwich de Alegranza Grande Menü (28 - 30 cm.)</a></h6>
                                </div>

                            </div>

                            <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"> <span class="price pull-left">$ 1.99</span></div>
                            <div class="col-xs-6 col-sm-4 col-lg-4">
                                <div class="row no-gutter">
                                    <div class="col-xs-7">
                                        <select class="form-control b-r-0" id="exampleSelect5">
                                            <option>Size SM</option>
                                            <option>Size LG</option>
                                            <option>Size XL</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-5">
                                        <input class="form-control" type="number" value="0" id="quant-input-4">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="food-item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-lg-6">
                                <div class="item-img pull-left">
                                    <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/70x70" alt="Food logo"></a>
                                </div>

                                <div class="rest-descr">
                                    <h6><a href="#">Sandwich de Alegranza Grande Menü (28 - 30 cm.)</a></h6>
                                </div>

                            </div>

                            <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"> <span class="price pull-left">$ 3.15</span></div>
                            <div class="col-xs-6 col-sm-4 col-lg-4">
                                <div class="row no-gutter">
                                    <div class="col-xs-7">
                                        <select class="form-control b-r-0" id="exampleSelect6">
                                            <option>Size SM</option>
                                            <option>Size LG</option>
                                            <option>Size XL</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-5">
                                        <input class="form-control" type="number" value="0" id="quant-input-5">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn theme-btn">Add To Cart</button>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>

</html>