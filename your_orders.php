<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();

if(empty($_SESSION['user_id']))  //if usser is not login redirected baack to login page
{
	header('location:login.php');
}
else
{
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
    <link href="css/style.css" rel="stylesheet">
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
  /* Old browsers */
  background: -moz-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  /* FF3.6+ */
  background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, #e5e5e5), color-stop(100%, #ffffff));
  /* Chrome,Safari4+ */
  background: -webkit-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  /* Chrome10+,Safari5.1+ */
  background: -o-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  /* Opera 12+ */
  background: -ms-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  /* IE10+ */
  background: radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);
  /* W3C */
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e5e5e5', endColorstr='#ffffff', GradientType=1);
  /* IE6-9 fallback on horizontal gradient */
  font: 600 15px "Open Sans", Arial, sans-serif;
}
label.control-label {
  font-weight: 600;
  color: #777;
}


table { 
	width: 750px; 
	border-collapse: collapse; 
	margin: auto;
	
	}

/* Zebra striping */
tr:nth-of-type(odd) { 
	background: #eee; 
	}

th { 
	background: #ff3300; 
	color: white; 
	font-weight: bold; 
	
	}

td, th { 
	padding: 10px; 
	border: 1px solid #ccc; 
	text-align: left; 
	font-size: 14px;
	
	}

/* 
Max width before this PARTICULAR table gets nasty
This query will take effect for any screen smaller than 760px
and also iPads specifically.
*/
@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

	table { 
	  	width: 100%; 
	}

	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; }
	
	td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}

	td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
		/* Label the data */
		content: attr(data-column);

		color: #000;
		font-weight: bold;
	}

}







	</style>

	</head>

<body>
    
        <!--header starts-->
        <header id="header" class="header-scroll top-header headrom">
            <!-- .navbar -->
            <nav class="navbar navbar-dark">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <a class="navbar-brand" href="index.html"> <img class="img-rounded" src="images/FOOTER LOGO.png" alt=""> </a>
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
                          
                          
                            <div class="widget clearfix">
                        </div>
                        <div class="col-xs-12 col-sm-7 col-md-7 ">
                            <div class="bg-gray restaurant-entry">
                                <div class="row">
								
							<table >
						  <thead>
							<tr>
							
							  <th>Item</th>
							  <th>Quantity</th>
							  <th>price</th>
							   <th>status</th>
							     <th>Date</th>
								   <th>Action</th>
							  
							</tr>
						  </thead>
						  <tbody>
						  
						  
							<?php 
						// displaying current session user login orders 
						$query_res= mysqli_query($db,"select * from users_orders where u_id='".$_SESSION['user_id']."'");
												if(!mysqli_num_rows($query_res) > 0 )
											    {
													echo '<td colspan="6"><center>You have No orders Placed yet. </center></td>';
												}
												else
												{			      
										  
										             while($row=mysqli_fetch_array($query_res))
										            {
                                                          
							?>
												<tr>	
														 <td data-column="Item"> <?php echo $row['title']; ?></td>
														  <td data-column="Quantity"> <?php echo $row['quantity']; ?></td>
														  <td data-column="price">Rs.<?php echo $row['price']; ?></td>
														   <td data-column="status"> 
														   <?php 
																			$status=$row['status'];
																			if($status=="" or $status=="NULL")
																			{
																			?>
																			<button type="button" class="btn btn-info" style="font-weight:bold;">Dispatch</button>
																		   <?php 
																			  }
																			   if($status=="in process")
																			 { ?>
																				<button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin"  aria-hidden="true" ></span>On a Way!</button>
																			<?php
																				}
																			if($status=="closed")
																				{
																			?>
																			 <button type="button" class="btn btn-success" ><span  class="fa fa-check-circle" aria-hidden="true">Delivered</button> 
																			<?php 
																			} 
																			?>
																			<?php
																			if($status=="rejected")
																				{
																			?>
																			 <button type="button" class="btn btn-danger"> <i class="fa fa-close"></i>cancelled</button>
																			<?php 
																			} 
																			?>
														   </td>
														  <td data-column="Date"> <?php echo $row['date']; ?></td>
														   <td data-column="Action"> <a href="delete_orders.php?order_del=<?php echo $row['o_id'];?>" onclick="return confirm('Are you sure you want to cancel your order?');" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a> 
															</td>
														 
												</tr>
												
											
														<?php }} ?>					
							
							
										
						
						  </tbody>
					</table>
						
					
                                    
                                </div>
                                <!--end:row -->
                            </div>
                         
                            
                                
                            </div>
                          
                          
                           
                        </div>
                    </div>
                </div>
            </section>
            <section class="app-section">
                <div class="app-wrap">
                    <div class="container">
                        <div class="row text-img-block text-xs-left">
                            <div class="container">
                                <div class="col-xs-12 col-sm-6 hidden-xs-down right-image text-center">
                                    <figure> <img src="images/app.png" alt="Right Image"> </figure>
                                </div>
                                <div class="col-xs-12 col-sm-6 left-text">
                                    <h3>The Best Tiffin Service</h3>
                                    <p>Now you can make food happen pretty much wherever you are thanks to the free easy-to-use Tiffin Delivery &amp; Takeout Web.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
<?php
}
?>