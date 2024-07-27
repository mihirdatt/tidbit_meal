<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();

$custid = $_SESSION["user_id"];


$sql_3="SELECT * FROM customer_tbl where u_id='$custid'";
$res_3=mysqli_query($db,$sql_3);
while($row_3=mysqli_fetch_array($res_3))
{
    $b=$row_3['ar_id'];
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
    <title>TIDBIT MEAL</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet"> </head>

<body>
           <!--header starts-->
        <header id="header" class="header-scroll top-header headrom">
            <!-- .navbar -->
            <nav class="navbar navbar-dark">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <img class="img-rounded" src="images/FOOTER LOGO.png" alt=""> </a>
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
            <!-- top Links -->
            
            <div class="top-links">
                <div class="container">
                    <ul class="row links">
                    <li class="col-xs-12 col-sm-4 link-item active"><span>1</span><a href="restaurants.php">Choose food provider</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>2</span><a href="#">Pick your favorite tiffin</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Order and pay cash on delivery</a></li>
                    </ul>
                </div>
            </div>
            
            <!-- end:Top links -->
            <!-- start: Inner page hero -->
            <div class="inner-page-hero bg-image" data-image-src="images/img/res.jpeg">
                <div class="container"> </div>
                <!-- end:Container -->
            </div>
            <div class="result-show">
                <div class="container">
                    <div class="row">
                       
                       
                    </div>
                </div>
            </div>
            <!-- //results show -->
            <section class="restaurants-page">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-3">

                    <div class="banner-form">
                    <form method="post" action="restaurants.php">
                        <input type="text"placeholder="Search Dish"name="str" required/>
                        <input type="submit" name="submit" value="Search" class="btn theme-btn btn-lg"/>
                    </form>
                    </div>
                          
                          
                            <div class="widget clearfix">
                                <!-- /widget heading -->
                                
                            </div>
                            <!-- end:Widget -->
                        </div>
                        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-9">
                            <div class="bg-gray restaurant-entry">
                                <div class="row">
                            <?php

                                if(isset($custid))
                                {
                                    if(isset($_POST['submit'])){
                                        $str = mysqli_real_escape_string($db,$_POST['str']);
                                        $sql="SELECT * FROM fooditem_tbl where title like '%$str%'";
                                        $res=mysqli_query($db,$sql);
                                        if(mysqli_num_rows($res)>0){
                                            while($row=mysqli_fetch_array($res))
                                            {
                                                $a = $row['fp_id'];
                                                $sql_2 = "SELECT * FROM foodprovider_tbl where fp_id ='$a' and ar_id='$b' order by ar_id desc"; 
                                                $res_2 = mysqli_query($db,$sql_2);   
                                                while($rows=mysqli_fetch_array($res_2))
                                                {
                                                        echo' <div class="col-sm-12 col-md-12 col-lg-8 text-xs-center text-sm-left">
                                                        <div class="entry-logo">
                                                            <a class="img-fluid" href="dishes.php?fp_id='.$rows['fp_id'].'" > <img src="Fp_img/'.$rows['image'].'" alt="Food logo"></a>
                                                        </div>
                                                        <!-- end:Logo -->
                                                        <div class="entry-dscr">
                                                            <h5><a href="dishes.php?fp_id='.$rows['fp_id'].'" >'.$rows['t_name'].'</a></h5> <span>'.$rows['address'].' <a href="#">...</a></span>
                                                            
                                                        </div>
                                                        <!-- end:Entry description -->
                                                    </div>
                                                    
                                                    <div class="col-sm-12 col-md-12 col-lg-4 text-xs-center">
                                                            <div class="right-content bg-white">
                                                                <div class="right-review">
                                                                     <a href="dishes.php?fp_id='.$rows['fp_id'].'" class="btn theme-btn-dash">View Menu</a> </div>
                                                            </div>
                                                            <!-- end:right info -->
                                                        </div>';
                                                }  
                                            }  
                                            $X = $_POST['str'];
                                            echo "<a href='restaurants.php?str=$X'><h4>view all '$X' even outside of your area!</h4>";                                     
                                        } 
                                        else
                                        {
                                            echo "No data found";
                                        }
                                }
                                elseif(isset($_GET['str'])) 
                                {
                                    $str = mysqli_real_escape_string($db,$_REQUEST['str']);
                                        $sql="SELECT * FROM fooditem_tbl where title like '%$str%'";
                                        $res=mysqli_query($db,$sql);
                                        if(mysqli_num_rows($res)>0){
                                            while($row=mysqli_fetch_array($res))
                                            {
                                                $a = $row['fp_id'];
                                                $sql_2 = "SELECT * FROM foodprovider_tbl where fp_id ='$a'"; 
                                                $res_2 = mysqli_query($db,$sql_2);   
                                                while($rows=mysqli_fetch_array($res_2))
                                                {
                                                        echo' <div class="col-sm-12 col-md-12 col-lg-8 text-xs-center text-sm-left">
                                                        <div class="entry-logo">
                                                            <a class="img-fluid" href="dishes.php?fp_id='.$rows['fp_id'].'" > <img src="Fp_img/'.$rows['image'].'" alt="Food logo"></a>
                                                        </div>
                                                        <!-- end:Logo -->
                                                        <div class="entry-dscr">
                                                            <h5><a href="dishes.php?fp_id='.$rows['fp_id'].'" >'.$rows['t_name'].'</a></h5> <span>'.$rows['address'].' <a href="#">...</a></span>
                                                            
                                                        </div>
                                                        <!-- end:Entry description -->
                                                    </div>
                                                    
                                                    <div class="col-sm-12 col-md-12 col-lg-4 text-xs-center">
                                                            <div class="right-content bg-white">
                                                                <div class="right-review">
                                                                     <a href="dishes.php?fp_id='.$rows['fp_id'].'" class="btn theme-btn-dash">View Menu</a> </div>
                                                            </div>
                                                            <!-- end:right info -->
                                                        </div>';
                                                }  
                                            }  
                                         
                                        } 
                                        else
                                        {
                                            echo "No data found";
                                        }
                                }
                                else 
                                {
                                        $ress= mysqli_query($db,"select * from foodprovider_tbl ORDER BY ar_id='$b' DESC");
									    while($rows=mysqli_fetch_array($ress))
										{
													
						
													 echo' <div class="col-sm-12 col-md-12 col-lg-8 text-xs-center text-sm-left">
															<div class="entry-logo">
																<a class="img-fluid" href="dishes.php?fp_id='.$rows['fp_id'].'" > <img src="Fp_img/'.$rows['image'].'" alt="Food logo"></a>
															</div>
															<!-- end:Logo -->
															<div class="entry-dscr">
																<h5><a href="dishes.php?fp_id='.$rows['fp_id'].'" >'.$rows['t_name'].'</a></h5> <span>'.$rows['address'].' <a href="#">...</a></span>
																
															</div>
															<!-- end:Entry description -->
														</div>
														
														 <div class="col-sm-12 col-md-12 col-lg-4 text-xs-center">
																<div class="right-content bg-white">
																	<div class="right-review">
																		 <a href="dishes.php?fp_id='.$rows['fp_id'].'" class="btn theme-btn-dash">View Menu</a> </div>
																</div>
																<!-- end:right info -->
															</div>';
										  }
                                    }
                                }
                                else
                                {
                                    if(isset($_POST['submit'])){
                                        $str = mysqli_real_escape_string($db,$_POST['str']);
                                        $sql="SELECT * FROM fooditem_tbl where title like '%$str%'";
                                        $res=mysqli_query($db,$sql);
                                        if(mysqli_num_rows($res)>0){
                                            while($row=mysqli_fetch_array($res))
                                            {
                                                $a = $row['fp_id'];
                                                $sql_2 = "SELECT * FROM foodprovider_tbl where fp_id ='$a'"; 
                                                $res_2 = mysqli_query($db,$sql_2);   
                                                while($rows=mysqli_fetch_array($res_2))
                                                {
                                                        echo' <div class="col-sm-12 col-md-12 col-lg-8 text-xs-center text-sm-left">
                                                        <div class="entry-logo">
                                                            <a class="img-fluid" href="dishes.php?fp_id='.$rows['fp_id'].'" > <img src="Fp_img/'.$rows['image'].'" alt="Food logo"></a>
                                                        </div>
                                                        <!-- end:Logo -->
                                                        <div class="entry-dscr">
                                                            <h5><a href="dishes.php?fp_id='.$rows['fp_id'].'" >'.$rows['t_name'].'</a></h5> <span>'.$rows['address'].' <a href="#">...</a></span>
                                                            
                                                        </div>
                                                        <!-- end:Entry description -->
                                                    </div>
                                                    
                                                    <div class="col-sm-12 col-md-12 col-lg-4 text-xs-center">
                                                            <div class="right-content bg-white">
                                                                <div class="right-review">
                                                                     <a href="dishes.php?fp_id='.$rows['fp_id'].'" class="btn theme-btn-dash">View Menu</a> </div>
                                                            </div>
                                                            <!-- end:right info -->
                                                        </div>';
                                            }  
                                        }                                        
                                    } 
                                    else
                                    {
                                        echo "No data found";
                                    }
                                }
                                else
                                {
                                    $ress= mysqli_query($db,"select * from foodprovider_tbl");
									while($rows=mysqli_fetch_array($ress))
									{
											echo' <div class="col-sm-12 col-md-12 col-lg-8 text-xs-center text-sm-left">
													<div class="entry-logo">
														<a class="img-fluid" href="dishes.php?fp_id='.$rows['fp_id'].'" > <img src="Fp_img/'.$rows['image'].'" alt="Food logo"></a>
														</div>
														<!-- end:Logo -->
													<div class="entry-dscr">
														<h5><a href="dishes.php?fp_id='.$rows['fp_id'].'" >'.$rows['t_name'].'</a></h5> <span>'.$rows['address'].' <a href="#">...</a></span>
										
													</div>
															<!-- end:Entry description -->
													</div>
														
													<div class="col-sm-12 col-md-12 col-lg-4 text-xs-center">
													    <div class="right-content bg-white">
															<div class="right-review">
															<a href="dishes.php?fp_id='.$rows['fp_id'].'" class="btn theme-btn-dash">View Menu</a> </div>
														</div>
														<!-- end:right info -->
													</div>';
										  }
                                    }
                                } 
						    ?>
                                    
                                </div>
                                <!--end:row -->
                            </div>
                         
                            
                                
                            </div>
                          
                          
                           
                        </div>
                    </div>
                </div>
            </section>
           
            <!-- start: FOOTER -->
         
            <!-- end:Footer -->
        </div>
  
    
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