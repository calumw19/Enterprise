<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php');
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">A/B Dashboard</h1>


  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- admin accounts -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">TOTAL ADMIN ACCOUNTS</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php
                require 'database/dbconfig.php';
                $query = "SELECT id FROM heroku_1b4d8c3621f1afb.register ORDER BY id";
                $query_run = mysqli_query($connection, $query);
                $row = mysqli_num_rows($query_run);

                echo '<h1>'.$row.'</h1>';

              ?>        

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">TOTAL BASIC USERS</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">


              <?php
                require 'database/dbconfig.php';
                $query = "SELECT id FROM heroku_1b4d8c3621f1afb.user ORDER BY id";
                $query_run = mysqli_query($connection, $query);
                $row = mysqli_num_rows($query_run);

                echo '<h1>'.$row.'</h1>';

              ?>


              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>


<div class="col-auto">
    <form class="user" action="code.php" method="POST"><button type="submit" name="reset_btn" class="btn btn-primary btn-user btn-block"style="backgrcolor:lightslategray"> Reset User Meat or Vegatable Selections </button>
    </form>

    <form class="user" action="code.php" method="POST"><button type="submit" name="reset2_btn" class="btn btn-primary btn-user btn-block"style="backgrcolor:lightslategray"> Reset User Dark Mode Selections</button>
    </form>

    <i class="fas fa-comments fa-2x text-gray-300"></i>

  <!-- Content Row -->

    <?php
    include('includes/scripts.php');
    include('includes/footer.php');
    ?>







