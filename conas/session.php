<?php
session_start();
include('../conn.php');


$user_check=$_SESSION['email'];

$sql = mysqli_query($conn,"SELECT * FROM signup WHERE email='$user_check' ");
//$sql2 = mysqli_query($conn,"SELECT * FROM newsupload WHERE uin='$user_check' ");

$row=mysqli_fetch_array($sql,MYSQLI_ASSOC);

$session_userId =$row['userId'];
$session_email = $row['email'];
$session_college = $row['college'];
$session_matricNumber = $row['matricnumber'];
$session_fullname = $row['fullname'];
$session_level = $row['level'];
$session_department = $row['department'];
$session_gender = $row['gender'];




if(!isset($user_check))
{
header("Location: ../");
}
?>