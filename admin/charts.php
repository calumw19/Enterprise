<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');

?>


<!-- Title -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Charts
            </h6>
        </div>
        <div class="card-body">

            <!-- Load charts from online -->
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load('current', {'packages': ['corechart']});
                google.charts.setOnLoadCallback(drawChart);

                <!--Getting all users choices and putting it into a single table-->
                <?php
                require 'database/dbconfig.php';
                $query = "SELECT * FROM user ";
                $query_run = mysqli_query($connection, $query);
                $sql = "SELECT 'no selection' AS SELECTION ,COUNT(food) AS food FROM `user` WHERE food=0
        UNION ALL
        SELECT 'meat',COUNT(food) FROM heroku_1b4d8c3621f1afb.user WHERE food=1
        UNION ALL
        SELECT 'vegetables',COUNT(food) FROM heroku_1b4d8c3621f1afb.user WHERE food=2 ";
                $query_run = mysqli_query($connection, $sql);

                //if the number of rows is more than 0
                if (mysqli_num_rows($query_run) > 0) {

                    //store into variables
                    $row = mysqli_fetch_array($query_run);
                    $NOSELECTION = $row['food'];
                    $row = mysqli_fetch_array($query_run);
                    $meat = $row['food'];
                    $row = mysqli_fetch_array($query_run);
                    $vegetables = $row['food'];

                }

                ?>

                //draw the first chart
                function drawChart() {

                    //pass in the number from each category and assign it to the label
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

                    // setting title to food selection
                    var options = {
                        title: 'Food selection'
                    };

                    //finding the chart and creating it using the details
                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                    chart.draw(data, options);
                }

            </script>
            <div id="piechart" style="width: 100%; height: 500px; margin:auto;"></div>


            <hr>


            <?php
            //select all data from user table from db
            require 'database/dbconfig.php';
            $query = "SELECT * FROM user ";
            $query_run = mysqli_query($connection, $query);

            //count number of each selection (white and dark)
            $sql = "SELECT 'white' AS SELECTION ,COUNT(dark) AS dark FROM `user` WHERE dark=0
        UNION ALL
        SELECT 'black',COUNT(dark) FROM heroku_1b4d8c3621f1afb.user WHERE dark=1";

            $query_run = mysqli_query($connection, $sql);

            //if more than 0 rows
            if (mysqli_num_rows($query_run) > 0) {

                //store numbers into variables
                $row = mysqli_fetch_array($query_run);
                $white = $row['dark'];
                $row = mysqli_fetch_array($query_run);
                $black = $row['dark'];


            }

            ?>

            <!-- setting chart type to bar -->
            <script type="text/javascript">
                google.charts.load('current', {'packages': ['bar']});
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

                    var options = {};

                    var chart = new google.charts.Bar(document.getElementById('bars'));

                    chart.draw(data, google.charts.Bar.convertOptions(options));
                }
            </script>
            <div id="bars" style="width: 60%; height: 500px; margin:auto;"></div>


        </div>
    </div>
</div>
<!-- /.container-fluid -->


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
