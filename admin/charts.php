<?php
include('security.php')
include('includes/header.php'); 
include('includes/navbar.php');
include('includes/scripts.php');
include('includes/footer.php');
?>




<div class="container-fluid">
   <div class="card shadow mb-4">
      <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Charts 
         </h6>
      </div>
      <div class="card-body">




      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      <?php 
        require 'database/dbconfig.php';
        $query = "SELECT * FROM user ";
        $query_run = mysqli_query($connection, $query);
        $sql = "SELECT 'no selection' AS SELECTION ,COUNT(food) AS food FROM `user` WHERE food=0
        UNION ALL
        SELECT 'meat',COUNT(food) FROM `user` WHERE food=1
        UNION ALL
        SELECT 'vegetables',COUNT(food) FROM `user` WHERE food=2 ";
        $query_run = mysqli_query($connection, $sql);
        



      if(mysqli_num_rows($query_run)>0){

        $row = mysqli_fetch_array($query_run);
        $NOSELECTION = $row['food'];
        $row = mysqli_fetch_array($query_run);
        $meat = $row['food'];
        $row = mysqli_fetch_array($query_run);
        $vegetables = $row['food'];
 
      }
        
        ?>



      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['NO SELECTION', 'MEAT'],
          ['NO SELECTION',     <?php
 echo $NOSELECTION;
?>],
          ['MEAT',      <?php
 echo $meat;
?>],
          ['VEGETABLES',    <?php
 echo $vegetables;
?>]
        ]);

        var options = {
          title: 'Food selection'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      } 
    </script>
    <div id="piechart" style="width: 100%; height: 500px; margin:auto;"></div>


    

    <hr>



    <?php 
        require 'database/dbconfig.php';
        $query = "SELECT * FROM user ";
        $query_run = mysqli_query($connection, $query);
        $sql = "SELECT 'white' AS SELECTION ,COUNT(dark) AS dark FROM `user` WHERE dark=0
        UNION ALL
        SELECT 'black',COUNT(dark) FROM `user` WHERE dark=1";

        $query_run = mysqli_query($connection, $sql);
        



      if(mysqli_num_rows($query_run)>0){

        $row = mysqli_fetch_array($query_run);
        $white = $row['dark'];
        $row = mysqli_fetch_array($query_run);
        $black = $row['dark'];

 
      }
        
        ?>

    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);







      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Chosen theme colour', 'White', 'Black'],
          [' ', <?php
 echo $white;
?>, <?php
echo $black;
?>]
        ]);

        var options = {

        };

        var chart = new google.charts.Bar(document.getElementById('bars'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
<div id="bars" style="width: 60%; height: 500px; margin:auto;"></div>



      </div>
   </div>
</div>
<!-- /.container-fluid -->



