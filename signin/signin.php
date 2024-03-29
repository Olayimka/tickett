<?php
require('../conn.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['email'])){

    $email = stripslashes($_REQUEST['email']); // removes backslashes
    $email   = mysqli_real_escape_string($conn,$email); //escapes special characters in a string
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn,$password);
	



//Checking is user existing in the database or not
    $query = "SELECT * FROM `signup` WHERE  email ='$email' AND password=PASSWORD('$password')";
    $result = mysqli_query($conn,$query) or die(mysqli_error());
    $rows = mysqli_num_rows($result);
    if($rows==1){
        $_SESSION['email'] = $email;
        
        echo '<script type="text/javascript"> window.open("../main-page.php","_self");</script>'; // Redirect user to index.php
        }{
echo "<script>alert('Invalid Login Credential')
location.href='signin'</script>";
}
}
?>