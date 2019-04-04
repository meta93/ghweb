<?php 
//index.php
$connect = mysqli_connect("localhost", "root", "", "ghana-db-prototype");
$query = "SELECT * FROM casualties";
$result = mysqli_query($connect, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ YEAR:'".$row["YEAR"]."', PED:".$row["PED"].", CAR:".$row["CAR"].", HGV:".$row["HGV"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);
?>


<!DOCTYPE html>
<html>
 <head>
  <title>DATA ANALYSIS OF Casualties</title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 align="center">Casualties</h2>
   <h3 align="center">PED/ CAR AND HGV STATISTICS</h3>  
   <h3 align="center"><marquee behavoiur ="alternative ">Click Here To Access Details</marquee></h3> 
   <br /><br />
   <div id="chart"></div>
  </div>

 </body>
</html>

<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'YEAR',
 ykeys:['PED', 'CAR', 'HGV'],
 labels:['PED', 'CAR', 'HGV'],
 hideHover:'auto',
 stacked:true
});
</script>