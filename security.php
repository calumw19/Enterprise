<?php
session_start();
include('database/dbconfig.php');

//checks if connection has been made
if($connection)
{
    // echo "Database Connected";
}
else
{
    header("Location: database/dbconfig.php");
}
if(!$_SESSION['username']) 
{
    header('Location: login.php');
}

