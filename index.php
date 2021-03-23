<?php
session_start();
include('inc/head.php'); 
include('inc/nav.php');
require_once('database/dbconfig.php');


?>

<form action="code.php" method="POST">

<input type="hidden" name="edit_id" value="<?php echo $_SESSION['id'] ?>">





<div class="modal-body">

    <div class="jumbotron jumbotron-fluid jbc">
        <div class="container">
            <h1 class="display-4" style="color:lightslategray">Meat or Vegetables?</h1>
            <p class="lead"style="color:lightslategrey">If you could only eat either meat or vegetables for the rest of your life, what would YOU choose?</p>
        </div>
    </div>

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
    

    <div class="card text-center">
        <div class="card-body">
            <p class="card-text">Click on either picture, and cast your vote. MEAT OR VEGETABLES?</p>
            <button type="submit" name="update_food" class="btn btn-primary btn-lg" data-dismiss="modal">VOTE!</button>
        </div>
    </div>


</form>

<div class="container" style="padding-top: 69px;">
    <div class="row">
        <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="https://upload.wikimedia.org/wikipedia/commons/8/8c/Cow_%28Fleckvieh_breed%29_Oeschinensee_Slaunger_2009-07-07.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Thinking of meat?</h5>
                    <p class="card-text">Tasty and premium, it would be a no brainer to go with meat, wouldn't it?</p>
                    <a href="#" class="btn btn-primary">Lets find out</a>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="https://upload.wikimedia.org/wikipedia/commons/f/f4/Fruit_and_vegetable_stand_inside_%E2%80%9CCoyoac%C3%A1n%E2%80%9D_Market.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">What about vegetables?</h5>
                    <p class="card-text">Healthy. Less Expensive. What other benefits do vegetables have?</p>
                    <a href="#" class="btn btn-primary">Learn more</a>
                </div>
            </div>
        </div>
    </div>
</div>



    <?php
include('inc/footer.php'); 
?>


