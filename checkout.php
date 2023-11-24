<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
include_once 'product-action.php';
error_reporting(0);
session_start();


function function_alert() { 
      

    echo "<script>alert('Thank you. Your Order has been placed!');</script>"; 
    echo "<script>window.location.replace('your_orders.php');</script>"; 
} 

if(empty($_SESSION["user_id"]))
{
	header('location:login.php');
}
else{

										  
												foreach ($_SESSION["cart_item"] as $item)
												{
											
												$item_total += ($item["price"]*$item["quantity"]);
												
													if($_POST['submit'])
													{
                                                        $session=$_SESSION["user_id"]; 
                                                        $user= mysqli_query($db,"select balance,pin from users where u_id='$session' ");
                                                        $rows=mysqli_fetch_array($user); 
                                                        if((($rows["balance"] - $item_total)>=0) && ($rows["pin"]==$_POST['pin']) ) {  
                                                            $bal=$rows["balance"]-$item_total;
                                                            $SQL= "UPDATE users SET balance=$bal WHERE u_id='".$_SESSION["user_id"]."'";
                                                            mysqli_query($db,$SQL);

                                                            $SQL="insert into users_orders(u_id,title,quantity,price) values('".$_SESSION["user_id"]."','".$item["title"]."','".$item["quantity"]."','".$item["price"]."')";
                                                            mysqli_query($db,$SQL);
                                                            unset($_SESSION["cart_item"]);
                                                            unset($item["title"]);
                                                            unset($item["quantity"]);
                                                            unset($item["price"]);
                                                            $success = "Thank you. Your order has been placed!";
                                                            function_alert();
                                                        }else if($rows["pin"] != $_POST['pin']){
                                                            echo "<script>alert('wrong pin');</script>";
                                                        }
                                                        else {
                                                            echo "<script>alert('Insufficient Balance');</script>";
                                                        }	
													}
												}
?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Checkout</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"> 
        
    <!-- <script type="text/javascript">

        function check()
        {
            var rd1 = document.getElementById("radioStacked1");

            if(rd1.checked == false)
            {
                alert("Please Select Valid Payment Method");
            }else if (rd1.checked == true)
            {
                <p class="text-xs-center"> <input type="submit" onclick="return confirm('Do you want to confirm the order?');" name="submit"  class="btn btn-success btn-block" value="Order Now"> </p>
            }
        }

    </script> -->

    <!-- <style>
        .btn{
            display: none;
        }

        #radioStacked1:checked + .btn{
            display: block;
        }

    </style> -->
</head>
<body>
    
    <div class="site-wrapper">
        <header id="header" class="header-scroll top-header headrom">
            <nav class="navbar navbar-dark">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/icn.png" alt=""> </a>
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Canteens <span class="sr-only"></span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="edit_profile.php">Profile <span class="sr-only"></span></a> </li>

							<?php
						if(empty($_SESSION["user_id"]))
							{
								echo '<li class="nav-item"><a href="edit.php" class="nav-link active">Profile</a> </li>
                                <li class="nav-item"><a href="login.php" class="nav-link active">Login</a> </li>';
							}
						else
							{
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
                        <li class="col-xs-12 col-sm-4 link-item "><span>2</span><a href="#">Pick Your favorite food</a></li>
                        <li class="col-xs-12 col-sm-4 link-item active" ><span>3</span><a href="checkout.php">Order and Pay</a></li>
                    </ul>
                </div>
            </div>
			
                <div class="container">
                 
					   <span style="color:green;">
								<?php echo $success; ?>
										</span>
					
                </div>
            
			
			
				  
            <div class="container m-t-30">
			<form action="" method="post">
                <div class="widget clearfix">
                    
                    <div class="widget-body">
                        <form method="post" action="#">
                            <div class="row">
                                
                                <div class="col-sm-12">
                                    <div class="cart-totals margin-b-20">
                                        <div class="cart-totals-title">
                                            <h4>Cart Summary</h4> </div>
                                        <div class="cart-totals-fields">
                                            <table class="table">
											<tbody>
                                                    <tr>
                                                        <td>Cart Subtotal</td>
                                                        <td> <?php echo "Rs ".$item_total; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-color"><strong>Total</strong></td>
                                                        <td class="text-color"><strong> <?php echo "Rs ".$item_total; ?></strong></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <?php
                                        $session=$_SESSION["user_id"]; 
                                        $user= mysqli_query($db,"select balance from users where u_id='$session' ");
                                        $rows=mysqli_fetch_array($user);
                                    ?> 
                                    <div class="payment-option">
                                        <ul class=" list-unstyled">
                                        <div class="cart-totals-title">
                                            <h4>Payment Methods</h4> </div>
                                            <hr style="width:100%;text-align:left;margin-left:0">
                                            <li>
                                                <label for="radioStacked1" class="custom-control custom-radio  m-b-20">
                                                    <input name="Amrita wallet" id="radioStacked1" checked value="Amrita wallet" type="radio" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Amrita E-Wallet</span>
                                                </label>
                                            </li>
                                            <div class="cart-totals-fields">
                                            <table class="table">
											<tbody>
                                                    <tr>
                                                        <td>Current Balance</td>
                                                        <td> <?php echo "Rs ".$rows["balance"]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-color">Bill amount</td>
                                                        <td class="text-color"><?php echo "- Rs ".$item_total; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-color"><strong>After detection</strong></td>
                                                        <td class="text-color"><strong> <?php echo "Rs ".($rows["balance"]-$item_total); ?></strong></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                            <!-- <li>
                                                <label class="custom-control custom-radio  m-b-10">
                                                    <input name="mod"  type="radio" value="paypal" disabled class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Paypal <img src="images/paypal.jpg" alt="" width="90"></span> </label>
                                            </li> -->
                                        </ul>
                                        
                                        <form class="form-horizontal" role="form" action="" method="post" id="myForm"> 
                                            <div class="col-md-4">
                                            <label class="control-label">Amrita E-Wallet PIN:</label>
                                            <input class="form-control" type="password" value="****" max=4 name="pin" required>
                                            </div>
                                        </form>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                         <p class="text-xs-center"> <input type="submit" onclick="return confirm('Do you want to confirm the order?');" name="submit"  class="btn btn-success btn-block" value="Order Now"> </p>
                                    </div>
									</form>
                                </div>
                            </div>
                       
                    </div>
                </div>
				 </form>
            </div>
            
            <footer class="footer">
                    <div class="row bottom-footer">
                        <div class="container">
                            <div class="row">
                                
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

<?php
}
?>
