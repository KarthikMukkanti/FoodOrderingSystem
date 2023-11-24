<?php

include("../connection/connect.php");
error_reporting(0);
session_start();
?>

<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}ser
function f3()
{
window.print(); 
}
</script>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Order Update</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
<style type="text/css" rel="stylesheet">


.indent-small {
  margin-left: 5px;
}
.form-group.internal {
  margin-bottom: 0;
}
.dialog-panel {
  margin: 10px;
}
.datepicker-dropdown {
  z-index: 200 !important;
}
.panel-body {
  background: #e5e5e5;
  background: -moz-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, #e5e5e5), color-stop(100%, #ffffff));
  background: -webkit-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  background: -o-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  background: -ms-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  background: radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e5e5e5', endColorstr='#ffffff', GradientType=1);
  font: 600 15px "Open Sans", Arial, sans-serif;
}
label.control-label {
  font-weight: 600;
  color: #777;
}








table { 
	width: 650px; 
	border-collapse: collapse; 
	margin: auto;
	margin-top:50px;
	}


tr:nth-of-type(odd) { 
	background: #eee; 
	}

th { 
	background: #004684; 
	color: white; 
	font-weight: bold; 
	}

td, th { 
	padding: 10px; 
	border: 1px solid #ccc; 
	text-align: left; 
	font-size: 14px;
	}

  .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.6);
        }

        .modal-content {
        background-color: #f9f9f9;
        margin: 10% auto;
        padding: 20px;
        border: 1px solid #ccc;
        width: 80%;
        max-width: 400px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        }

        .close {
        color: #aaa;
        float: right;
        font-size: 24px;
        font-weight: bold;
        cursor: pointer;
        transition: color 0.3s ease;
        }

        .close:hover,
        .close:focus {
        color: #333;
        }

        .modal-content p {
        margin: 0;
        font-size: 18px;
        line-height: 1.5;
        color: #333;
        }

        .modal-content p:first-of-type {
        margin-bottom: 20px;
        }

        .modal-content p:last-of-type {
        text-align: center;
        }

        .modal-content p:last-of-type a {
        color: #007bff;
        text-decoration: none;
        }

        .modal-content p:last-of-type a:hover {
        text-decoration: underline;
        }

        #canbtn {
            margin-left: -140px;
        }


	</style>
</head>

<body>

<div style="margin-left:50px;">
 <form name="updateticket" id="updatecomplaint" method="post"> 
 
 
 
 
<table  border="0" cellspacing="0" cellpadding="0">
     <tr >
      <td><b>Form Number</b></td>
      <td><?php echo htmlentities($_GET['form_id']); ?></td>
    </tr>
	<tr>
      <td  >&nbsp;</td>

      <td >&nbsp;</td>
    </tr>
   
    <tr >
      <td><b>Status</b></td>
      <td><select name="status" required="required" >
      <option value="">Select Status</option>
      <option value="in process">Preparing</option>
    <option value="closed">Delivered</option>
	 <option value="rejected">Cancelled</option>
        
      </select></td>
    </tr>


      <tr >
      <td><b>Message</b></td>
      <td><textarea name="remark" cols="50" rows="10" required="required"></textarea></td>
    </tr>
    


        <tr>
      <td><b>Action</b></td>
      <td><input type="submit" name="update"  class="btn btn-primary" value="Submit">
	   
      <input name="Submit2" type="submit"  class="btn btn-danger"  value="Close this window " onClick="return f2();" style="cursor: pointer;"  /></td>
    </tr>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <!-- <span class="close" onclick="hideModal();">&times;</span> -->
            <!-- <div class="modal-icon modal-success"><i class="fa-solid fa-badge-check fa-2xs"></i></div> -->

            <p id="modalContent">Modal Content</p>
        </div>

        </div>



     
   
   

 
</table>
 </form>
</div>

<script>

function showModal(content) {
            // console.log("Showing modal with message:", content);
            document.getElementById("modalContent").textContent = content;
            document.getElementById("myModal").style.display = "block";
        }

        // function hideModal() {
        //     // console.log("Closing modal");
        //     document.getElementById("myModal").style.display = "none";
        //     // window.location.href = "edit_profile.php";
        // }

        // setTimeout(showModal, delayInMilliseconds);


            // Function to redirect to a specific page
            function redirectToPage(delayInMilliseconds) {
                settime(delayInMilliseconds);
            }

            // Set the timer to redirect after the delay
            function settime(delayInMilliseconds){
                setTimeout(page, delayInMilliseconds);
            }

            function page(){
                window.location.href = "order_update.php";
            }

</script>

<?php
if(strlen($_SESSION['user_id'])==0)
  { 
header('location:../login.php');
}
else
{
  if(isset($_POST['update']))
  {
$form_id=$_GET['form_id'];
$status=$_POST['status'];
$remark=$_POST['remark'];
$query=mysqli_query($db,"insert into remark(frm_id,status,remark) values('$form_id','$status','$remark')");
$sql=mysqli_query($db,"update users_orders set status='$status' where o_id='$form_id'");

echo '<script>showModal("User Status Updated Successfully"); redirectToPage(1000);</script>';
}

 ?>

</body>
</html>

     <?php } ?>