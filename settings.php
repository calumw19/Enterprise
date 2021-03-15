<?php
include('inc/head.php'); 
include('inc/nav.php'); 

?>



<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">EDIT Admin Profile </h6>
  </div>

  <div class="card-body">
  <form action="code.php" method="POST">
  
<?php 

require 'database/dbconfig.php';
$currentUser = $_SESSION["username"];
$query = "SELECT * FROM user WHERE username='$currentUser' ";
$query_run = mysqli_query($connection, $query);
if($query_run){

    if(mysqli_num_rows($query_run)>0){

        while($row = mysqli_fetch_array($query_run)){


            //print_r($row['username']);
            ?>
            <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
<div class="modal-body">



    <div class="form-group">
        <label>Colour mode</label></br>

        <input type="radio" name="edit_dark" value="0"> White<br />
        <input type="radio" name="edit_dark" value="1"> Dark<br />
    </div>
    
</div>
<div class="modal-footer">
    <button type="submit" name="update_dark" class="btn btn-primary" data-dismiss="modal">UPDATE</button>
    <a href="index.php" class="btn btn-danger">CANCEL</a>
</div>
            <?php

        }

    }

}



?>



 

</form>










</div>
</div>
</div>


<?php
include('inc/scripts.php');
include('inc/footer.php');
?>