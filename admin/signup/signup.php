<?php
session_start();
include('../conn.php');


$randomNumber = rand(100,100000);
$otpGen = rand(1000,99999);

$d = date("y");
$ID="#AUO".$d."-".$randomNumber;




if(isset($_REQUEST['submit'])){


$username = trim(addslashes($_REQUEST['name']));
$email = trim(addslashes($_REQUEST['email']));
$password = trim(addslashes($_REQUEST['password']));
$college = trim(addslashes($_REQUEST['college']));
$adminId = $ID;

$_SESSION['email']=$email;
$_SESSION['college']=$college;


$check=mysqli_query($conn, "SELECT * FROM `admin` WHERE adminId ='$adminId' OR email = '$email'");
		$checkrows = mysqli_num_rows($check);
		if($checkrows>0){
	 
		 echo "<script>alert('User already exist')
			 location.href = '../signin'</script>";

}else{

$sql = "INSERT INTO admin(adminId,username,college,email,`password`) VALUES('$adminId','$username','$college','$email',PASSWORD('$password'))";

mysqli_query($conn,$sql) or die(mysqli_error($conn)); 
$num = mysqli_insert_id($conn);
if(mysqli_affected_rows($conn)!=1){
   $message="Error inserting record into DB";
}else{
   echo "<script>alert('ACCOUNT CREATED')
   location.href = '../signin/'</script>";


}
}
}
?>