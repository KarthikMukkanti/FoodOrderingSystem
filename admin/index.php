<!DOCTYPE html>
<html lang="en" >
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();
if(isset($_POST['submit']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if(!empty($_POST["submit"])) 
     {
	// $loginquery ="SELECT * FROM admin WHERE username='$username' && password='".md5($password)."'";
  $loginquery ="SELECT * FROM admin WHERE username='$username' && password='$password'";

	$result=mysqli_query($db, $loginquery);
	$row=mysqli_fetch_array($result);
	
	                        if(is_array($row))
								{
                                    	$_SESSION["adm_id"] = $row['adm_id'];
										header("refresh:1;url=dashboard.php");
	                            } 
							else
							    {
										echo "<script>alert('Invalid Username or Password!');</script>"; 
                                }
	 }
	
	
}

?>

<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/login.css">

<style>

.popover { 
  position: absolute;
  top: 0;
  left: 0;
  z-index: 1060;
  display: block;
  max-width: 500px;
  font-size: 14px;
  font-weight: 400;
  line-height: 1.42857143;
  text-align: left;
  white-space: normal;
  background-color: #fff;
  -webkit-background-clip: padding-box;
  background-clip: padding-box;
  border: 1px solid #ccc;
  border: 1px solid rgba(0,0,0,.2);
  border-radius: 60px;
  -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
  box-shadow: 0 5px 10px rgba(0,0,0,.2);
  height: 57px;
}

.popover .arrow {
  margin-left: 1px;
  position: absolute;
  display: block;
  width: 0;
  height: 0;
  border-color: transparent;
  border-style: solid;
}

.popover.top .arrow {
  bottom: -10px;
  left: 50%;
  margin-left: -10px;
  border-top-color: #999;
  border-width: 10px 10px 0;
}

.popover.bottom .arrow {
  top: -10px;
  left: 50%;
  margin-left: -10px;
  border-bottom-color: #999;
  border-width: 0 10px 10px;
}

.popover.left .arrow {
  right: -10px;
  top: 50%;
  margin-top: -10px;
  border-left-color: #999;
  border-width: 10px 0 10px 10px;
}

.popover.right .arrow {
  left: -10px;
  top: 50%;
  margin-top: -10px;
  border-right-color: #999;
  border-width: 10px 10px 10px 0;
}

.popover-title {
  padding: 8px 14px;
  margin: 0;
  font-size: 14px;
  background-color: #f7f7f7;
  border-bottom: 1px solid #ebebeb;
  border-radius: 5px 5px 0 0;
  /* opacity: 0.3 !important; */
}

.popover-content {
  padding: 9px 14px;
  /* opacity: 1 !important; */
}

.my-class{
    font-size: 14px;
}

</style>
</head>

<body>

  
<div class="container">
  <div class="info">
    <h1>Admin Panel </h1>
  </div>
</div>
<div class="form">
  <div class="thumbnail"><img src="images/manager.png"/></div>
  <span style="color:red;"><?php echo $message; ?></span>
   <span style="color:green;"><?php echo $success; ?></span>
  <form class="login-form" action="index.php" method="post">
    <input type="text" placeholder="Username" name="username" class="btn1 btn1-lg btn1-danger" data-container = "body" data-toggle="popover" data-placement="right" data-html="true" data-template='<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>' data-content="<p class = 'my-class'>Your Complete Amrita email ID, <br> <strong> Example: </strong> firstname_lastname@cb.amrita.edu </p>" data-trigger = "hover" style = "max-width: 400px opacity: 1;" />
    <input type="password" placeholder="Password" name="password" class="btn1 btn1-lg btn1-danger" data-container = "body" data-toggle="popover" data-placement="right" data-html="true" data-template='<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>' data-content="<p class = 'my-class'> Your domain password (or) your Amrita Wi-Fi password </p>" data-trigger = "hover" style = "max-width: 400px opacity: 1;"/>
    <input type="submit"  name="submit" value="Login" />

  </form>
  
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='js/index.js'></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
        <script>
            $(document).ready(function(){
            $('[data-toggle="popover"]').popover({
                trigger: 'hover'
            });
            });
        </script>

</body>

</html>
