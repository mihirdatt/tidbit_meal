<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");  //include connection file
error_reporting(0);  // using to hide undefine undex errors
session_start(); //start temp session until logout/browser closed

$uid = $_SESSION['user_id'];

$result = mysqli_query($db, "SELECT * FROM customer_tbl where u_id ='$uid'");
while($row = mysqli_fetch_array($result)){
$a_old = $row['username'];   
$b_old= $row['f_name'];
$c_old = $row['email'];
$d_old= $row['phone'];
$e_old = $row['password'];
$f_old = $row['address'];
$g_old = $row['ar_id'];


$result_2 = mysqli_query($db,"SELECT * FROM area_tbl where ar_id = '$g_old'");
while($row_2 = mysqli_fetch_array($result_2)){
      $abc = $row_2['a_name'];
}


}
    

if(isset($_POST['submit'] )) {
    $a = $_POST['username'];
    $b = $_POST['f_name'];
    $c = $_POST['email'];
    $d = $_POST['phone'];
    $e = $_POST['password'];
    $f = $_POST['address'];
    $g = $_POST['ar_id'];


  
   if($e == '')
   {
      $e = $e_old;

   }
   if($g == '')
   {
      $g = $g_old;
   }
        $sql_2 = "UPDATE `customer_tbl` SET `ar_id`='$g',`username`= '$a',`f_name`= '$b',`email`='$c',`phone`='$d',`password`='$e',`address`='$f' WHERE u_id ='$uid'";
        
        $res_2 = mysqli_query($db,$sql_2);
        if($res){

           // echo "Done";
            
        }
        else{
            echo mysqli_error();
        }
        header('location: index.php');
 }
   

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Customer Edit</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet"> </head>

<body class="home">
    
        <!--header starts-->
        <header id="header" class="header-scroll top-header headrom">
            <!-- .navbar -->
            <nav class="navbar navbar-dark">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/FOOTER LOGO.png" alt=""> </a>
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Food Providers<span class="sr-only"></span></a> </li>
                            
                            <li class="nav-item"><a href="your_orders.php" class="nav-link active">your orders</a> </li>';
									
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Profile
                            </a>
                             <div class="dropdown-menu dropdown-menu-right shadow-sm border-0">
                                 <a class="dropdown-item" href="edit_customer.php">Edit Profile</a>   
                                 <a class="dropdown-item" href="logout.php">logout</a>
                            </div>
                            </li>
                                    

						
							 
                        </ul>
						 
                    </div>
                </div>
            </nav>
            <!-- /.navbar -->
        </header>
        <div class="page-wrapper">
            <div class="breadcrumb">
               <div class="container">
                  <ul>
                     <li><a href="#" class="active">
                      <span style="color:red;"><?php echo $message; ?></span>
                       <span style="color:green;">
                                <?php //echo $success; ?>
                                        </span>
                       
                    </a></li>
                    
                  </ul>
            </div>
        </div>
        <section class="contact-page inner-page">
               <div class="container">
                  <div class="row">
                     <div class="col-md-8">
                        <div class="widget">
                           <div class="widget-body">
                             
                                
                              <form action="" method="post" autocomplete="off">
                                 <div class="row">
                                  <div class="form-group col-sm-12">
                                       <label for="exampleInputEmail1">User-Name</label>
                                       <input type="text" name="username" class="form-control" value="<?php echo $a_old;?>"placeholder="username" required> 
                                    </div>
                                    <div class="form-group col-sm-12">
                                       <label for="exampleInputEmail1">Full Name</label>
                                    <input type="text" name="f_name" class="form-control" value="<?php echo $b_old;?>" placeholder="Full Name" required> 
                                    </div>
                                 
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Email address</label>
                                       <input type="text" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="<?php echo $c_old; ?>"placeholder="Enter email" required> 
                                       <small id="emailHelp" class="form-text text-muted">We"ll never share your email with anyone else.</small> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Phone number</label>
                                       <input type="text" name="phone" class="form-control" pattern="[6789][0-9]{9}" value="<?php echo $d_old;?>" placeholder="phone" required> 
                                       <small class="form-text text-muted">We"ll never share your email with anyone else.</small> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1">Password</label>
                                       <input type="password" class="form-control" name="password" pattern=".{8,}" id="exampleInputPassword1" placeholder="Password" > 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1">Repeat password</label>
                                       <input type="password" class="form-control" name="cpassword" id="exampleInputPassword2" placeholder="Password" > 
                                    </div>
                                    <div class="form-group col-sm-6">
                                          <label for="exampleInputPassword1">Select Area</label>
                                          <select name="ar_id" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" required>
                                                        <option value=""><?php echo $abc; ?> </option>
                                                 <?php $ssql ="select * from area_tbl";
													   $res=mysqli_query($db, $ssql); 
													   while($row=mysqli_fetch_array($res))  
													   {
                                             if($row['a_name'] == $abc){

                                             }
                                             else{
                                                 echo' <option value="'.$row['ar_id'].'">'.$row['a_name'].'</option>';
                                             }
                                          }    
													?> 
													 </select>
                                    </div>
                                     <div class="form-group col-sm-12">
                                       <label for="exampleTextarea">Delivery Address</label>
                                       <textarea class="form-control" id="exampleTextarea"  name="address" rows="3" data-error=".errorTxt6"><?php echo $f_old;?></textarea>
                                    </div>
                                   
                                 </div>
                                
                                 <div class="row">
                                    <div class="col-sm-4">
                                       <p> <input type="submit" value="Edit profile" name="submit" class="btn theme-btn"> </p>
                                    </div>
                                 </div>
                              </form>
                           
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