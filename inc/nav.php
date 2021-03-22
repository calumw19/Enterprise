<?php
include('security.php');
require 'database/dbconfig.php';



?>

    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a href="index.php"><img src="https://upload.wikimedia.org/wikipedia/commons/3/3b/Food-and-restaurant.svg" style="width: 100px; border-radius: 100px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button> 
      
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin/index.php">Admin</a>
            </li>  
          </ul>
          <span class="navbar-text">

        <a href="settings.php"><button type="submit" name="logout_btn" class="btn btn-secondary">Preferences</button></a></br>
        <form action="logout.php" method="POST" style="margin-top:6px;"> 
          
          <button type="submit" name="logout_btn" class="btn btn-danger">Logout</button>

        </form>



          </span>

        </div>
      </nav>