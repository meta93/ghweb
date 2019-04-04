<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
        ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Casualties Dashboard</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/toastr/toastr.min.css" media="screen" >
        <link rel="stylesheet" href="css/icheck/skins/line/blue.css" >
        <link rel="stylesheet" href="css/icheck/skins/line/red.css" >
        <link rel="stylesheet" href="css/icheck/skins/line/green.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <!--Bootstrap-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!--Animate Svg-->
    <link rel="stylesheet" href="assets/plugins/animateImg/demo.css">
    <link rel="stylesheet" href="assets/plugins/animateImg/demo-grid.css">
    <!--Main Css-->
    <link rel="stylesheet" href="assets/css/custom.min.css">
     <!--Mobile Responsive-->
    <link rel="stylesheet" href="assets/css/responsive.css">
        <script src="js/modernizr/modernizr.min.js"></script>
         <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Login</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body class="top-navbar-fixed">

        <div class="main-wrapper">
              <?php include('includes/topbar.php');?>
            <div class="content-wrapper">
                <div class="content-container">

                    <?php include('includes/leftbar.php');?>  

                    <div class="main-page">

                    
                        <div class="container-fluid">

                            <div class="row page-title-div">
                             <nav class="navbar top-navbardashboard-stat bg-success">
                                <div class="col-sm-6">
                                    <h2 class="title"><strong>Casualties Dashboard </h2>
                                  
                                </div>
                                <!-- /.col-sm-6 -->
                            </div>
                            <!-- /.row -->
                      
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-info" href="diagram.php">
<?php 
$sql1 ="SELECT id from age_group ";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totalcitizen=$query1->rowCount();
?>

                                            <span class="number counter"><?php echo htmlentities($totalcitizen);?></span>
                                            <span class="name">Severity by City</span>
                                            <span class="bg-icon"><i class="fa fa-users"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->
                                     <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-primary" href="age.php">
<?php 
//$sql ="SELECT id from  age_group ";

$sql= "SELECT id from age_group";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totalenergy=$query->rowCount();
?>
                                            <span class="number counter"><?php echo htmlentities($totalenergy);?></span>
                                            <span class="name">Age Group </span>
                                            <span class="bg-icon"><i class="fa fa-user"></i></span>
                                        </a>
                                        
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->
 <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->
                                     <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-warning" href="Casualties_by_Road_User_Class.php">
<?php 
$sql ="SELECT id from  road_user_class ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totalfinance=$query->rowCount();
?>
                                            <span class="number counter"><?php echo htmlentities($totalfinance);?></span>
                                            <span class="name">Road Class Users</span>
                                            <span class="bg-icon"><i class="fa fa-car"></i></span>
                                        </a>
                                        
                                        <!-- /.dashboard-stat -->
                                    </div>
                                   
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->
     <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-danger" href="#">
<?php 
//$sql ="SELECT Female from  sex ";
//$sql ="SELECT Female from  Sex ";
$sql="SELECT Female from Sex";
$sql1 = "SELECT Female, SUM(Female) from Sex";
$query = $dbh -> prepare($sql1);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totallocalgov=$query->rowCount();
?>
                                            <span class="number counter"><?php echo htmlentities($sql);?></span>
                                            <span class="name">Sex </span>
                                            <span class="bg-icon"><i class="fa fa-user"></i></span>
                                        </a>
                                        
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->
</div>

                                </div>
                                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-warning" href="#">
<?php 
$sql ="SELECT id from  tblagric ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totalagric=$query->rowCount();
?>
                                            <span class="number counter"><?php echo htmlentities($totalagric);?></span>
                                            <span class="name">Age Group   </span>
                                            <span class="bg-icon"><i class="fa fa-book"></i></span>
                                        </a>
                                        
                                        <!-- /.dashboard-stat -->
                                    </div>
                                <!-- /.ro

                                w -->
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-success" href="#">
<?php 
$sql ="SELECT id from road_environment ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totalagric=$query->rowCount();
?>
                                            <span class="number counter"><?php echo htmlentities($totalagric);?></span>
                                            <span class="name">Road Environment </span>
                                            <span class="bg-icon"><i class="fa fa-area-chart"></i></span>
                                        </a>
                                        
                                        <!-- /.dashboard-stat -->
                                    </div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-info" href="#">
<?php 
$sql ="SELECT id from  fatalities ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totalagric=$query->rowCount();
?>
                                            <span class="number counter"><?php echo htmlentities($totalagric);?></span>
                                            <span class="name">Fatalities</span>
                                            <span class="bg-icon"><i class="fa fa-bed"></i></span>
                                        </a>
                                        
                                        <!-- /.dashboard-stat -->
                                    </div>

                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

                    </div>
                    <!-- /.main-page -->

                    
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/jquery-ui/jquery-ui.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>
        <script src="js/waypoint/waypoints.min.js"></script>
        <script src="js/counterUp/jquery.counterup.min.js"></script>
        <script src="js/amcharts/amcharts.js"></script>
        <script src="js/amcharts/serial.js"></script>
        <script src="js/amcharts/plugins/export/export.min.js"></script>
        <link rel="stylesheet" href="js/amcharts/plugins/export/export.css" type="text/css" media="all" />
        <script src="js/amcharts/themes/light.js"></script>
        <script src="js/toastr/toastr.min.js"></script>
        <script src="js/icheck/icheck.min.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script src="js/production-chart.js"></script>
        <script src="js/traffic-chart.js"></script>
        <script src="js/task-list.js"></script>
        <script>
            $(function(){

                // Counter for dashboard stats
                $('.counter').counterUp({
                    delay: 10,
                    time: 1000
                });

                // Welcome notification
                toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "newestOnTop": false,
                  "progressBar": false,
                  "positionClass": "toast-top-right",
                  "preventDuplicates": false,
                  "onclick": null,
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }
                toastr["success"]( "Login Successfuly Made ");

            });
        </script>
    </body>
</html>
<?php } ?>
