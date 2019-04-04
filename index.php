<?php
session_start();
include('includes/config.php');

if(isset($_POST['login']))
{
$uname=$_POST['username'];
$password=($_POST['password']);
$sql = "SELECT UserName and Password FROM `admin` WHERE `UserName` = '$uname' and  `Password` = '$password'";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname);
$query-> bindParam(':password', $password);
$query-> execute();
$results=$query->fetchAll();                   
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
} else{
    
    echo "<script>alert('Invalid Details');</script>";

}

}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Ghana Data</title>
    
    
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
    <body>
    
  <div class="se-pre-con"></div>


<!--Navigation Bar-->
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               
            </div>

  
        </div>
    </nav>
<!--Navigation Bar-->

<!--Banner Section-->
 <section id="about-section" class="bg-color sectionP30">
        <div class="container">
            <div class="row">
                
        <div class="row mt-40">
                                <div class="col-md-10 col-md-offset-1 pt-50">

                                    <div class="row mt-30 ">
                                        <div class="col-md-11">
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <div class="panel-title text-center">
                                                        <h2>  Login Portal </h2>
                                                    </div>
                                                </div>
                                                <div class="panel-body p-20">

                                                   

                                                    <center><form class="form-horizontal" method="post">
                                                        <div class="form-group">
                                                            <label for="inputEmail3" class="col-sm-2 control-label">Email:</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="UserName"required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputPassword3" class="col-sm-2 control-label">Password:</label>
                                                            <div class="col-sm-10">
                                                                <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password"required>
                                                            </div>
                                                        </div>
                                                          <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Login Type:</label>
 <select name="class" class="form-control" id="default" required="Select you class">
<option value="">Login Type</option>
<?php $sql = "SELECT * from admin";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>
<option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->account_type); ?></option>
<?php }} ?>
 </select>
</div>
                                                    
                                                        <div class="form-group mt-20">
                                                            <div class="col-sm-offset-2 col-sm-10">
                                                           
                                                                <button type="submit" name="login" class="btn btn-success btn-labeled pull-right">Access<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                            </div>
                                                        </div>
                                                    </form>

                                            

                                                 
                                                </div>
                                            </div>
    

                
                <!--Copyright Text-->
                <div class="col-md-12 col-sm-12 col-xs-12 sectionP40">
                    <div class="copyright animated fadeup">
                        <p class="white"> <marquee behavior ="alternate">&copy;Valley View University: Department of Computing Sciences and Engineering.</marquee></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
   

<script type="text/javascript" src="assets/js/jquery-2.1.1.js"></script>

<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

<!--Animae Js-->
<script type="text/javascript" src="assets/js/anime.min.js"></script>

<!--Custom | Nice Scroll Js-->
<script type="text/javascript" src="assets/plugins/niceScroll/niceScroll.min.js"></script>

<!--Youtube Video Popup Js-->
<script type="text/javascript" src="assets/plugins/videoPopup/videoPopup.jquery.js"></script>

<!--Counter | NumbScroller Js-->
<script type="text/javascript" src="assets/plugins/numScroll/numscroller-1.0.js"></script>

<!--Convert Svg Image to Inline Svg Js-->
<script type="text/javascript" src="assets/plugins/svgtoinline/jquery-svg-to-inline.js"></script>
<!--Animate | Draw Svg-->
<script type="text/javascript" src="assets/plugins/drawSvg/jquery.drawsvg.js"></script>







<!--Main | Common Js-->
<script type="text/javascript" src="assets/js/main.js"></script>
    <body class="">
       
                                            

                                                 
                                                </div>
                                            </div>
                                           
                                      
                                        </div>
                                      
                                    </div>
                                    
                                </div>
                               
                            </div>
                       
                        </section>
                    </div>
                                           
                                          
                                        </div>
                                     
                                    </div>
                                   
                                </div>
                              
                            </div>
                          
                        </section>

                    </div>
                
                </div>
             
            </div>
           

        </div>
        

       
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/jquery-ui/jquery-ui.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

 
        <script src="js/main.js"></script>
        <script>
            $(function(){

            });
        </script>

      
 
    </body>
</html>
