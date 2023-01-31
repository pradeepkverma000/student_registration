<?php
session_start();
include_once('config.php');
if(!isset($_SESSION['LOGIN']))
{
    header('Location: login.php');
    die();
}



$id=$_GET['id'];
$delete="DELETE FROM registration_tab WHERE id='$id'";
$result=mysqli_query($conn,$delete);

    header('Location: display.php');
    die();
?>