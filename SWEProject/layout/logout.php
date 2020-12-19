<?php
$action = isset($_GET['action'])? $_GET['action'] :'Admin'; 

if ($action == 'Admin')
{ 
    session_start();   //start the session

    session_unset();     //unset the data

    session_destroy();     //destroy the session

    header('Location: admin.php');

    exit();
    

}

elseif ($action == 'Tutor')
{
    session_start();   //start the session

    session_unset();     //unset the data

    session_destroy();     //destroy the session

    header('Location: login.php');

    exit();

}

elseif ($action == 'Parent')
{
    session_start();   //start the session

    session_unset();     //unset the data

    session_destroy();     //destroy the session

    header('Location: Parent  Login.php');

    exit();

}






   