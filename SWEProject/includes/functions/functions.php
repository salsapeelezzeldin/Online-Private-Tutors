<?php

/*
**Get Title Function
*/
function getTitle ()
{
    global $title;
    if(isset($title))
    {
        echo $title; 
    }
    else
    {
        echo 'page';
    }
}


/*Redirect Function V.02
**[$msg , $seconds] 
**
*/
function redirect ($msg, $url=null, $seconds=3)
{
    if ($url===null)
    {
        $url='indexx.php';
        $link='Home Page';
    }
    elseif ($url==='Manage')
    {
        $url='page1.php?action=Manage';
        $link='Manage Page';
    }
    elseif ($url==='Subjects')
    {
        $x=$_SESSION['id'];
        $url="page6.php?action=Manage&id=".$_SESSION['id']."";
        $link='Manage Subjects Page';
    }
    else
    {
        $url = isset($_SERVER['HTTP_REFERER']) &&  $_SERVER['HTTP_REFERER'] !== '' ? $_SERVER['HTTP_REFERER']  :  'indexx.php';
        $link='Previous Page';
    }
    echo $msg;
    echo "<div class='container alert alert-info'>You will be directed
    to $link after $seconds seconds.</div>";
    header("refresh:$seconds; url=$url");
}


/*Check Items Function V1.0
**to check items in database 
**[$column , $table, $value]
**
*/
function checkItems ($column , $table, $value)
{
    global $con;
    $statement =  $con->prepare("SELECT $column FROM $table WHERE $column=$value");
    $statement->execute();
    $count = $statement->rowCount();
    return $count;
   
}
