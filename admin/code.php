<?php
include('security.php');

if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    $email_query = "SELECT * FROM heroku_1b4d8c3621f1afb.register WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);
    if(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');  
    }
    else
    {
        if($password === $cpassword)
        {
            $query = "INSERT INTO heroku_1b4d8c3621f1afb.register (username,email,password) VALUES ('$email','$email','$password')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: register.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: register.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: register.php');  
        }
    }

}




include('security.php');

if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];

    $query = "UPDATE heroku_1b4d8c3621f1afb.user SET username='$username', email='$email', password='$password' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: register.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: register.php'); 
    }
}


if(isset($_POST['delete_btn'])){

    $id = $_POST['delete_id'];
    $query = "DELETE FROM heroku_1b4d8c3621f1afb.user WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run){

        $_SESSION['success'] = "Your Data is DELETED";
        header('Location: register.php');

    }
    else{

        $_SESSION['status'] = "Your Data is NOT DELETED";
        header('Location: register.php'); 

    }

}
 

include('security.php');

if(isset($_POST['login_btn']))
{
    $email_login = $_POST['emaill']; 
    $password_login = $_POST['passwordd']; 

    $query = "SELECT * FROM heroku_1b4d8c3621f1afb.register WHERE email='$email_login' AND password='$password_login' LIMIT 1";
    $query_run = mysqli_query($connection, $query);

   if(mysqli_fetch_array($query_run))
   {
        $_SESSION['username'] = $email_login;
        header('Location: index.php');
   } 
   else
   {
        $_SESSION['status'] = "Email or Password is Invalid";
        header('Location: login.php');
   }
    
}

if(isset($_POST['login_btn']))
{
    $email_login = $_POST['emaill'];
    $password_login = $_POST['passwordd'];

    $query = "SELECT * FROM heroku_1b4d8c3621f1afb.register WHERE email='$email_login' AND password='$password_login' LIMIT 1";
    $query_run = mysqli_query($connection, $query);

    if(mysqli_fetch_array($query_run))
    {
        $_SESSION['username'] = $email_login;
        header('Location: index.php');
    }
    else
    {
        $_SESSION['status'] = "Email or Password is Invalid";
        header('Location: login.php');
    }



}
if(isset($_POST['reset_btn'])){
    require 'database/dbconfig.php';
    $sql_query = "UPDATE heroku_1b4d8c3621f1afb.user SET food = 0";
    if (mysqli_query($connection, $sql_query)) {
        header('Location: index.php');
    } else {
        echo "No Connection";
    }

}
if(isset($_POST['reset2_btn'])){
    require 'database/dbconfig.php';
    $sql_query = "UPDATE heroku_1b4d8c3621f1afb.user SET dark = 0";
    if (mysqli_query($connection, $sql_query)) {
        header('Location: index.php');
    } else {
        echo "No Connection";
    }

}



?>