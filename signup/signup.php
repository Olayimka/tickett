<?php
session_start();
include('../conn.php');


$randomNumber = rand(100,100000);
$otpGen = rand(1000,99999);

$d = date("y");
$ID="AUO".$d."-".$randomNumber;




if(isset($_REQUEST['submit'])){


$fullname = trim(addslashes($_REQUEST['name']));
$matricNumber = trim(addslashes($_REQUEST['matricnumber']));
$email = trim(addslashes($_REQUEST['email']));
$level = trim(addslashes($_REQUEST['level']));
$department = trim(addslashes($_REQUEST['department']));
$password = trim(addslashes($_REQUEST['password']));
$gender = trim(addslashes($_REQUEST['gender']));
$college = trim(addslashes($_REQUEST['college']));
$userId = $ID;

$_SESSION['email']=$email;


$check=mysqli_query($conn, "SELECT * FROM signup WHERE userId ='$userId' AND matricnumber ='$matricNumber' OR email = '$email'");
		$checkrows = mysqli_num_rows($check);
		if($checkrows>0){
	 
		 echo "<script>alert('User already exist')
			 location.href = '../signin'</script>";

}else{

$sql = "INSERT INTO signup(userId,fullname,email,matricnumber,`level`,department,college,gender,`password`) VALUES('$userId','$fullname','$email','$matricNumber','$level','$department','$college','$gender',PASSWORD('$password'))";

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