<?php
session_start();
include('inc/head.php'); 
include('inc/nav.php');
require_once('database/dbconfig.php');


?>

<form action="code.php" method="POST">

<input type="hidden" name="edit_id" value="<?php echo $_SESSION['id'] ?>">





<div class="modal-body">



<div class="container">
  <div class="row form-group">
    <div class="col-sm">
    <input 
  type="radio" name="edit_food" value="1" 
  id="sad" class="input-hidden" />
<label for="sad" class="label-pos-set">
  <img 
    src="https://themeatmerchant.com/wp-content/uploads/2020/08/the-meat-merchant-variety-box-600x600.jpg" 
    alt="I'm sad" class="choose-image" />
</label>
    </div>
    <div class="col-sm">

        <input type="hidden" name="edit_id" value="<?php echo $_SESSION["username"] ?>">


    <input 
  type="radio" name="edit_food" value="2" 
  id="happy" class="input-hidden" />
<label for="happy">
  <img class="choose-image"
    src="https://cameoglassuk.co.uk/wp-content/uploads/2016/06/MIXED-TROPICAL-FRUITS-AND-VEGETABLES-1-600x600.jpg" 
    alt="I'm sad" />
</label>
    </div>
  </div>
    
</div>
<div class="modal-footer" style="justify-content: center;">
    <button type="submit" name="update_food" class="btn btn-primary btn-lg" data-dismiss="modal">VOTE!</button>

</div>



<div class="panel panel-default">
    <div class="panel-body">A Basic Panel</div>
</div>


</form>

    <?php
include('inc/footer.php'); 
?>