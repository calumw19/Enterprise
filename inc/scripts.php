  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

  <script>
const chk = document.getElementById('chk');

chk.addEventListener('click', () => {
  chk.checked?document.body.classList.add("dark"):document.body.classList.remove("dark");
  localStorage.setItem('darkModeStatus', chk.checked);
});

window.addEventListener('load', (event) => {
  if(localStorage.getItem('darkModeStatus')=="true"){
    document.body.classList.add("dark"); 
    document.getElementById('chk').checked = true;
  }
});
</script>  


  <?php



include('database/dbconfig.php');


//once register button is clicked
if(isset($_POST['registerbtn']))
{
    //stores details as variables
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirmpassword'];

    //checks if passwords are the same
    if($password === $confirm_password)
    {
        $query = "INSERT INTO register (username,email,password) VALUES ('$username','$email','$password')";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo "done";
            $_SESSION['success'] =  "Admin is Added Successfully";
            header('Location: register.php');
        }
        else 
        {
            echo "not done";
            $_SESSION['status'] =  "Admin is Not Added";
            header('Location: register.php');
        }
    }
    else 
    {
        echo "pass no match";
        $_SESSION['status'] =  "Password and Confirm Password Does not Match";
        header('Location: register.php');
    }

}



// get t

  $currentUser = $_SESSION["username"];
  $query = "SELECT * FROM user WHERE username='$currentUser' ";
  $query_run = mysqli_query($connection, $query);
  if($query_run){

      if(mysqli_num_rows($query_run)>0){


          while($row = mysqli_fetch_array($query_run)){
              if ($row['dark'] == 1){

                  echo '<script type="text/javascript">',
                  'document.body.style.backgroundColor = "black";',
                  'document.querySelector(".jbc").style.backgroundColor = "#000000";',
                  '</script>';
              }
              else{

                  echo '<script type="text/javascript">',
                  'document.body.style.backgroundColor = "white";',
                  '</script>';

              }


          }}}

?>