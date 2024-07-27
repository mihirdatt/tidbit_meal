<!DOCTYPE html>
<html lang="en">
<?php

session_start(); 
error_reporting(0); 
include("connection/connect.php"); 
if(isset($_POST['submit'] )) 
{        
     if(empty($_POST['username']) ||
        empty($_POST['f_name']) ||   
		empty($_POST['email']) ||  
		empty($_POST['phone'])||
		empty($_POST['password'])||
      empty($_POST['a_name']) ||
      empty($_POST['address']))
		{
			$message = "All fields must be Required!";
		}
	   else
	   {
         $sql_0= "SELECT username, email FROM customer_tbl where username ='".$_POST['username']."'
                     OR email = '".$_POST['email']."' ";
       
         $result = mysqli_query($db,$sql_0);       
         $num = mysqli_num_rows($result);

         if($num==1)
         {
            $message2 = "Entry already exists !!";
         }
	      else{
       
	 
	         $sql_1 = "INSERT INTO customer_tbl(ar_id,username,f_name,email,phone,password,address) VALUES('".$_POST['a_name']."','".$_POST['username']."','".$_POST['f_name']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['password']."','".$_POST['address']."')";
	               mysqli_query($db, $sql_1);
		            $success = "Account Created successfully! <p>You will be redirected in <span id='counter'>5</span> second(s).</p>
														<script type='text/javascript'>
														function countdown() {
															var i = document.getElementById('counter');
															if (parseInt(i.innerHTML)<=0) {
																location.href = 'login_customer.php';
															}
															i.innerHTML = parseInt(i.innerHTML)-1;
														}
														setInterval(function(){ countdown(); },1000);
														</script>'";
		       header("refresh:5;url=login_customer.php");
         }
	}

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
    <title>Customer Registration</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet"> </head>
<body>
<script>
        function validate(){

            var a = document.getElementById("password").value;
            var b = document.getElementById("c_password").value;
            if (a!=b) {
               alert("Passwords do not match");
               return false;
            }
        }
</script>
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
                            <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Food Providers <span class="sr-only"></span></a> </li>
                            
							<?php
						if(empty($_SESSION["user_id"]))
							{
                        echo '<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Login
                        </a>
                         <div class="dropdown-menu dropdown-menu-right shadow-sm border-0">
                             <a class="dropdown-item" href="login_customer.php">Login As Customer</a>   
                             <a class="dropdown-item" href="foodprovider_panel">Login As FoodProvider</a>
                        </div>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Signup
                        </a>
                         <div class="dropdown-menu dropdown-menu-right shadow-sm border-0">
                             <a class="dropdown-item" href="registration_customer.php">Signup As Customer</a>   
                             <a class="dropdown-item" href="registration_fp.php">Signup As FoodProvider</a>
                        </div>
                        </li>';
							}
						else
						{
                        echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">your orders</a> </li>';
                        echo  '<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profile
                        </a>
                         <div class="dropdown-menu dropdown-menu-right shadow-sm border-0">
                             <a class="dropdown-item" href="edit_customer.php">Edit Profile</a>   
                             <a class="dropdown-item" href="logout.php">logout</a>
                        </div>
                        </li>';
						}

						?>
							 
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
                  <span style="color:red;"><?php echo $message2; ?></span>
								<?php echo $success; ?>
										</span>
					   
					</a></li>
                    
                  </ul>
               </div>
            </div>
            <section class="contact-page inner-page">
               <div class="container">
                  <div class="row">
                     <!-- REGISTER -->
                     <div class="col-md-8">
                        <div class="widget">
                           <div class="widget-body">
                              
							  <form onSubmit="return validate()" action="" method="post" autocomplete="off">
                                 <div class="row">
								  <div class="form-group col-sm-12">
                                       <label for="exampleInputEmail1">User-Name</label>
                                       <input class="form-control" type="text" name="username" id="example-text-input" placeholder="UserName"> 
                                    </div>
                                    <div class="form-group col-sm-12">
                                       <label for="exampleInputEmail1">Full Name</label>
                                       <input class="form-control" type="text" name="f_name" id="example-text-input" placeholder="Full Name"> 
                                    </div>
                                    
                              
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Email address</label>
                                       <input type="text" class="form-control" name="email" id="exampleInputEmail1" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" aria-describedby="emailHelp" placeholder="Enter email"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Phone number</label>
                                       <input class="form-control" type="text" name="phone" id="example-tel-input-3" pattern="[6789][0-9]{9}" placeholder="Phone"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1">Password</label>
                                       <input type="password" class="form-control" name="password" id="password" pattern=".{8,}" placeholder="Password"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1">Repeat password</label>
                                       <input type="password" class="form-control"  id="c_password" placeholder="Password"> 
                                    </div>


                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1">Select Area</label>
                                       <select name="a_name" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                                                        <option>--Select Area--</option>
                                                 <?php $ssql ="select * from area_tbl";
													$res=mysqli_query($db, $ssql); 
													while($row=mysqli_fetch_array($res))  
													{
                                                       echo' <option value="'.$row['ar_id'].'">'.$row['a_name'].'</option>';;
													}  
                                                 
													?> 
													 </select>
                                    </div>                           
									 <div class="form-group col-sm-12">
                                       <label for="exampleTextarea">Delivery Address</label>
                                       <textarea class="form-control" id="exampleTextarea"  name="address" rows="3"></textarea>
                                    </div>
                                   
                                 </div>
                                
                                 <div class="row">
                                    <div class="col-sm-4">
                                       <p> <input type="submit" value="Register" name="submit" class="btn theme-btn"> </p>
                                    </div>
                                 </div>
                              </form>
                           
						   </div>
                           <!-- end: Widget -->
                        </div>
                        <!-- /REGISTER -->
                     </div>
                     
                  </div>
               </div>
            </section>
            
            <!-- start: FOOTER -->
            
            <!-- end:Footer -->
         </div>
         <!-- end:page wrapper -->
      
    <!-- Bootstrap core JavaScript
    ================================================== -->
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