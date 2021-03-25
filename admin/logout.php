<?php
session_start();
// deletes the session and logs the user out
if(isset($_POST['logout_btn']))
{
    session_destroy();
    unset($_SESSION['username']);
    header('Location: login.php');
}?>