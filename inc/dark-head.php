<!--

<form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Username </label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>


<div class="container-fluid">

DataTales Example
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Admin Profile
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
        Add Admin Profile
    </h6>
  </div>

  <div class="card-body">

    <?php

      if(isset($_SESSION['success']) && $_SESSION['success'] !='' ){

        echo '<h2 class="bg-primary text-white">'.$_SESSION['success'].'</h2>';
        unset($_SESSION['success']);

      }
      if(isset($_SESSION['status']) && $_SESSION['status'] !='' ){

        echo '<h2 class="bg-danger text-white">'.$_SESSION['status'].'</h2>';
        unset($_SESSION['status']);

      }
    ?>








    <div class="table-responsive">
      <?php
        require 'database/dbconfig.php';
        $query = "SELECT * FROM register";
        $query_run = mysqli_query($connection, $query);

      ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Username </th>
            <th>Email </th>
            <th>Password</th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
     <?php

      if(mysqli_num_rows($query_run) > 0){

        while($row = mysqli_fetch_assoc($query_run)){
          ?>
              <tr>

            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["username"]; ?></td>
            <td><?php echo $row["email"] ?></td>
            <td><?php echo $row["password"]; ?></td>
            <td>

                <form action="register_edit.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row["id"]; ?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>

                <form action="code.php" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $row['id']  ?>">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
          </tr>
          <?php
        }

      }

     else {

      echo "no record found";

     }
     ?>
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('inc/scripts.php');
include('inc/footer.php');
?>