<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");  //include connection file
error_reporting(0);  // using to hide undefine undex errors
session_start(); //start temp session until logout/browser closed

$fpid = $_SESSION['fp_id'];

$result = mysqli_query($db, "SELECT * FROM foodprovider_tbl where fp_id ='$fpid';");
while($row = mysqli_fetch_array($result)){
$a_old = $row['username'];   
$b_old = $row['t_name'];
$c_old = $row['email'];
$d_old = $row['phone'];
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
    $b = $_POST['t_name'];
    $c = $_POST['email'];
    $d = $_POST['phone'];
    $e = $_POST['password'];
    $f = $_POST['address'];
    $g = $_POST['ar_id'];

    if($e == '')
    {
        $e = $e_old;
    } 
    if($g == ''){

        $g = $g_old;
    }

       
        $sql = "UPDATE `foodprovider_tbl` SET `ar_id`='$g',`username`= '$a',`t_name`= '$b',`email`='$c',`phone`='$d',`password`='$e',`address`='$f' WHERE  fp_id='$fpid'";
        
        $res = mysqli_query($db,$sql);
        if($res){

           // echo "Done";
            
        }
        else{
            echo mysqli_error();
        }
        header('location: dashboard.php');
 }
   

?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/logo1.png">
    <title>foodprovider panel</title>
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

<body class="fix-header fix-sidebar">
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
								<li><a href="all_menu.php">ALL MENUS</a></li>
								<li><a href="add_menu.php">ADD MENU</a></li>
                              
                                
                            </ul>
                        </li>
						 <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="hide-menu">ORDERS</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="all_orders.php">All ORDERS</a></li>
								  
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
                    <h3 class="text-primary">Dashboard</h3> </div>
               
            </div>
            <!-- End Bread crumb -->
          <!-- Container fluid  -->
          <div class="container-fluid">
                <!-- Start Page Content -->
                  
									
									<?php  echo $error;
									        echo $success; ?>
									
									
								
								
					    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            
                                <h4 class="m-b-0 ">Edit Profile</h4>
                            
                            <div class="card-body">
                                <form onSubmit="return validate()" action='' method='post'  enctype="multipart/form-data">
                                    <div class="form-body">
                                        
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">User Name</label>
                                                    <input type="text" name="username" value="<?php echo $a_old;  ?>" class="form-control" placeholder="username" required>
                                                   </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Title Name</label>
                                                    <input type="text" name="t_name" value="<?php echo $b_old;  ?>"class="form-control form-control-danger" placeholder="Title name" required>
                                                    </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Email </label>
                                                    <input type="text" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="<?php echo $c_old;  ?>" placeholder="enter email" required>
                                                   </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">phone</label>
                                                    <input type="text" name="phone" class="form-control form-control-danger" pattern="[6789][0-9]{9}" value="<?php echo $d_old;  ?>" placeholder="" required>
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">password</label>
                                                    <input type="text" name="password" class="form-control form-control-danger" id="password" pattern=".{8,}" value=""  placeholder="">
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Reapet password</label>
                                                    <input type="text"  class="form-control form-control-danger" id="c_password" value=""  placeholder="">
                                                    </div>
                                            </div>
                                            
                                            
                                            
                                        </div>
                                            <div class="form-group col-sm-6">
                                            <label for="exampleInputPassword1">Select Area</label>
                                            <select name="ar_id" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" >
                                                <option value=""><?php echo $abc; ?></option>
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
                                        
                                        <h3 class="box-title m-t-40">Address</h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    
                                                    <textarea name="address" type="text" style="height:100px;" class="form-control" required> <?php echo $f_old; ?> </textarea>
                                                </div>
                                            </div>
                                        </div>
                                      
                                            <!--/span-->
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="submit" name="submit" class="btn btn-success" value="save"> 
                                        <a href="dashboard.php" class="btn btn-inverse">Cancel</a>
                                    </div>
                                </form>
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
