<?php
require('../conn.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['email'])){

    $email = stripslashes($_REQUEST['email']); // removes backslashes
    $email   = mysqli_real_escape_string($conn,$email); //escapes special characters in a string
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn,$password);
    $college = stripslashes($_REQUEST['college']); // removes backslashes
    $college   = mysqli_real_escape_string($conn,$college); //escapes special characters in a string


	



//Checking is user existing in the database or not
    $query = "SELECT * FROM `admin` WHERE  email ='$email' AND college ='$college' AND password=PASSWORD('$password')";
    $result = mysqli_query($conn,$query) or die(mysqli_error());
    $rows = mysqli_num_rows($result);
    if($rows==1){
        $_SESSION['email'] = $email;
        $_SESSION['college'] = $college;
        
        echo '<script type="text/javascript"> window.open("../dashboard","_self");</script>'; // Redirect user to index.php
        }{
echo "<script>alert('Invalid Login Credential')
location.href='../signin'</script>";
}
}
?>