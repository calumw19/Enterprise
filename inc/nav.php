
<?php 
include('security.php');
require 'database/dbconfig.php';
$currentUser = $_SESSION["username"];
$query = "SELECT * FROM user WHERE username='$currentUser' ";
$query_run = mysqli_query($connection, $query);
if($query_run){

    if(mysqli_num_rows($query_run)>0){


        while($row = mysqli_fetch_array($query_run)){
          if ($row['dark'] == 1){

            echo '<script type="text/javascript">',
            'document.body.style.backgroundColor = "black";',
            '</script>';
          }
          else{

            echo '<script type="text/javascript">',
            'document.body.style.backgroundColor = "white";',
            '</script>';

          }


}}}


?>

    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a href="index.php"><img src="https://upload.wikimedia.org/wikipedia/commons/6/63/Logo_La_Linea_100x100.png" style="width: 100px; border-radius: 100px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button> 
      
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../../../Users/Calum/Desktop/admin/index.php">Admin Login</a>
            </li>  
          </ul>
          <span class="navbar-text">
           
            



        <a href="settings.php"><button type="submit" name="logout_btn" class="btn btn-secondary">Sttings</button></a></br>
        <form action="logout.php" method="POST" style="margin-top:6px;"> 
          
          <button type="submit" name="logout_btn" class="btn btn-danger">Logout</button>

        </form>



          </span>

        </div>
      </nav>