<?php
session_start();
include('conn.php');


$user_check=$_SESSION['email'];

$sql = mysqli_query($conn,"SELECT * FROM admin WHERE email='$user_check' ");
//$sql2 = mysqli_query($conn,"SELECT * FROM newsupload WHERE uin='$user_check' ");

$row=mysqli_fetch_array($sql,MYSQLI_ASSOC);

$session_userId =$row['adminId'];
$session_email = $row['email'];
$session_username = $row['username'];
$session_college = $row['college'];






if(!isset($user_check))
{
header("Location: ../");
}
?>