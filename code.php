<?php
include('security.php');
require('database/dbconfig.php');

if(isset($_POST['registerbtn'],$_POST['username'],$_POST['email'],$_POST['password'],$_POST['confirmpassword']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    $email_query = "SELECT * FROM heroku_1b4d8c3621f1afb.user WHERE email='$email' ";
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
            $query = "INSERT INTO heroku_1b4d8c3621f1afb.user (username,email,password) VALUES ('$email','$email','$password')";

            $query_run = mysqli_query($connection, $query);

            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "User Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: register.php');
            }
            else
            {
                $_SESSION['status'] = "User Profile Not Added";
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

} else {echo "error";}




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

    $query = "SELECT * FROM heroku_1b4d8c3621f1afb.user WHERE email='$email_login' AND password='$password_login' LIMIT 1";
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


if(isset($_POST['update_dark']))
{
    $id = $_POST['edit_id'];
    $dark = $_POST['edit_dark'];



    $query = "UPDATE heroku_1b4d8c3621f1afb.user SET dark='$dark' WHERE email='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: index.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: index.php');
    }
}

if(isset($_POST['update_food']))
{
    $id = $_POST['edit_id'];
    $food = $_POST['edit_food'];



    $query = "UPDATE heroku_1b4d8c3621f1afb.user SET food='$food' WHERE email='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: index.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: index.php');
    }
}
