<?php
session_start();
error_reporting(0);


/* Include the `fusioncharts.php` file that contains functions  to embed the charts. */

   include("includes/fusioncharts.php");


/* The following 4 code lines contain the database connection information. Alternatively, you can move these code lines to a separate file and include the file here. You can also modify this code based on your database connection. */

   $hostdb = "localhost";  // MySQl host
   $userdb = "root";  // MySQL username
   $passdb = "";  // MySQL password
   $namedb = "ghana-db-prototype";  // MySQL database name

   // Establish a connection to the database
   $dbhandle = new mysqli($hostdb, $userdb, $passdb, $namedb);

   /*Render an error message, to avoid abrupt failure, if the database connection parameters are incorrect */
   if ($dbhandle->connect_error) {
    exit("There was an error with your connection: ".$dbhandle->connect_error);
   }
?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>New Citizen</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="../css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="../css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="../css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="../css/prism/prism.css" media="screen" >
        <link rel="stylesheet" href="../css/select2/select2.min.css" >
        <link rel="stylesheet" href="../css/main.css" media="screen" >
        <script src="../js/modernizr/modernizr.min.js"></script>
        // Include FusionCharts core file
<script type="text/javascript" src="path/to/local/fusioncharts.js"></script>

// Include FusionCharts Theme file
<script type="text/javascript" src="path/to/local/themes/fusioncharts.theme.fusion.js"></script>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
  <?php include('includes/topbar.php');?> 
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

                    <!-- ========== LEFT SIDEBAR ========== -->
                   <?php include('includes/leftbar.php');?>  
                    <!-- /.left-sidebar -->

                    <div class="main-page">

                     <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">New Citizen</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                
                                        <li class="active">New Citizen</li>
                                    </ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <div class="container-fluid">
                           
                        <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Fill the Ctizen info</h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">
    <?php
      // Form the SQL query that returns the top 10 most populous countries
      $strQuery = "SELECT PED, OTHERS FROM casualties ORDER BY id DESC LIMIT 10";

      // Execute the query, or else return the error message.
      $result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");

      // If the query returns a valid response, prepare the JSON string
      if ($result) {
          // The `$arrData` array holds the chart attributes and data
          $arrData = array(
              "chart" => array(
                  "caption" => "Casu [2018-2019]",
                  "showValues" => "0",
                  "theme" => "fusion"
                )
            );

          $arrData["data"] = array();

  // Push the data into the array
          while($row = mysqli_fetch_array($result)) {
            array_push($arrData["data"], array(
                "label" => $row["PED"],
                "value" => $row["OTHERS"]
                )
            );
          }

          /*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

          $jsonEncodedData = json_encode($arrData);

  /*Create an object for the column chart using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.*/

          $columnChart = new FusionCharts("column2D", "myFirstChart" , 700, 400, "chart-1", "json", $jsonEncodedData);

          // Render the chart
          $columnChart->render();

          // Close the database connection
          $dbhandle->close();
      }
    ?>
    <div id="chart-1"><!-- Fusion Charts will render here--></div>
   </body>
</html>