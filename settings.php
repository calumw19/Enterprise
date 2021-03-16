<?php
include('inc/head.php'); 
include('inc/nav.php');
session_start();

?>



<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">EDIT Admin Profile </h6>
  </div>

  <div class="card-body">
  <form action="code.php" method="POST">
  

            <input type="hidden" name="edit_id" value="<?php echo $_SESSION['username'] ?>">
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



 

</form>










</div>
</div>
</div>


<?php
include('inc/scripts.php');
include('inc/footer.php');
?>