<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();
$fpid = $_SESSION["fp_id"];

$sqll = "select t_name from foodprovider_tbl where fp_id='$fpid'";
$re = mysqli_query($db,$sqll);
while($ro = mysqli_fetch_array($re))
{
    $a = $ro['t_name'];
}

if(empty($_SESSION["fp_id"]))
{
	header('location:index.php');
}
else
{
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
     <link rel="icon" type="image/png" sizes="16x16" href="images/logo1">
    <title>Food Provider Panel</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="dashboard.php">
                    <h2 style=" color: black;">FP PANEL</h2>
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">

                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                    </ul>

                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">
                    <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/profile_button.jpg" alt="" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    
                                    <li><a href="edit_foodprovider.php"><i class="fa fa-user-o"></i> Edit Profile</a></li>
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li> <a href="dashboard.php" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">DASHBOARD</span></a>
                            
                        </li>
                        
                       <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">MENU</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="all_menu.php">All MENUS</a></li>
								<li><a href="add_menu.php">ADD MENU</a></li>
                              
                                
                            </ul>
                        </li>
						 <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="hide-menu">ORDERS</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="all_orders.php">ALL ORDERS</a></li>
								  
                            </ul>
                        </li>
                         
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper" style="height:1200px;">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h5 class="text-primary">WELCOME TO THE DASHBOARD,</h5><h4><b><i><?php echo $a; ?>!!</i></b></h4> </div>
               
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
            <div class="row">
            <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-cutlery f-s-40" aria-hidden="true"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php $sql="select * from fooditem_tbl where fp_id='$fpid'";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													
													echo $rws;?></h2>
                                    <p class="m-b-0">Your Total Dishes</p>
                                </div>
                            </div>
                        </div>
                    </div>
					
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php   $sql="select distinct u_id from users_orders where fp_id='$fpid'";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													
													echo $rws;?></h2>
                                    <p class="m-b-0">Your Total Customers</p>
                                </div>
                            </div>
                        </div>
                    </div>
					
					<div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle"> 
                                    <span><i class="fa fa-shopping-cart f-s-40" aria-hidden="true"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php $sql="select * from users_orders where fp_id='$fpid'";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													
													echo $rws;?></h2>
                                    <p class="m-b-0">Your Total Orders</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>

</body>

</html>
<?php
}
?>