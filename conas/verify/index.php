<?php
include('../../conn.php');
include('../../session.php');
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



$ref = $_GET['reference'];

if ($ref == "") {
    header("Location:javascript://history.go(-1)");
    exit;
}






$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($ref),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer sk_test_aff689f87ad98ddb4a698b277cb416893843e770",
        "Cache-Control: no-cache",
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $result = json_decode($response);

    if ($result->data->status == 'success') {
        $status = $result->data->status;
        $reference = $result->data->reference;
        $lname = $result->data->customer->last_name;
        $fname = $result->data->customer->first_name;
        $fullname = $fname . ' ' . $lname;
        $cusEmail = $result->data->customer->email;
        $amount = $result->data->amount/100;
        $Date_time = date('m/d/Y h:i:s a', time());

        $sql = "INSERT INTO  paid (status, reference, fullname, date_purchased, amount, email) VALUES('$status','$reference','$fullname','$Date_time','$amount','$cusEmail')";


mysqli_query($conn,$sql) or die(mysqli_error($conn)); 
$num = mysqli_insert_id($conn);
if(mysqli_affected_rows($conn)!=1){
   $message="Error";
}else{
    
    
            $eventName = $_SESSION['eventName'];
            $ticket = $_SESSION['ticketType'];
            $quantity = $_SESSION['quantity'];
            $college = $_SESSION['college'];
            $ticketNo = $_SESSION['ticketNo'];
    
   $receiptContent = "
    <div style='max-width: 400px; margin: 0 auto; padding: 20px; border: 2px solid #00796b; border-radius: 10px; background-color: #f1f8e9; font-family: Arial, sans-serif;'>
        <div style='text-align: center; margin-bottom: 20px;'>
            <h2 style='color: #00796b; margin: 0;'>TB Ticket Master</h2>
            <p style='margin: 5px 0;'>$college</p>
            <p style='margin: 5px 0;'>Achievers University, Owo</p>
        </div>
        <hr style='border-top: 2px dashed #00796b; margin-bottom: 20px;'>
        <div style='margin-bottom: 20px;'>
            <p style='margin: 5px 0;'><strong>Name:</strong> $session_fullname</p>
            <p style='margin: 5px 0;'><strong>Department:</strong> $session_department</p>
            <p style='margin: 5px 0;'><strong>Level:</strong> $session_level</p>
        </div>
        <hr style='border-top: 2px dashed #00796b; margin-bottom: 20px;'>
        <div style='margin-bottom: 20px;'>
            <h3 style='margin: 0;'>Ticket Details:</h3>
            <div style='display: flex; justify-content: space-between; margin-top: 10px;'>
                <div style='flex-grow: 1;'>
                <p style='margin: 5px 0;'><strong>Ticket Number:</strong></p>
                    <p style='margin: 5px 0;'><strong>Event Name:</strong></p>
                    <p style='margin: 5px 0;'><strong>Ticket Type:</strong></p>
                    <p style='margin: 5px 0;'><strong>Quantity:</strong></p>
                    <p style='margin: 5px 0;'><strong>Amount:</strong></p>
                    <p style='margin: 5px 0;'><strong>Reference:</strong></p>
                    <p style='margin: 5px 0;'><strong>Date:</strong></p>
                </div>
                <div style='flex-grow: 2;'>
                    <p style='margin: 5px 0;'>$ticketNo</p>
                    <p style='margin: 5px 0;'>$eventName</p>
                    <p style='margin: 5px 0;'>$ticket</p>
                    <p style='margin: 5px 0;'>$quantity</p>
                    <p style='margin: 5px 0;'>$amount</p>
                    <p style='margin: 5px 0;'>$reference</p>
                    <p style='margin: 5px 0;'>$Date_time</p>
                </div>
            </div>
        </div>
    </div>
";
    


 $sql2 = "INSERT INTO payment(userId, status, eventName, ticket, quantity, amount, ticketNo, reference, college, fullname, email, level, department) VALUES('$session_userId','$status','$eventName','$ticket','$quantity','$amount','$ticketNo','$reference','$college', '$session_fullname','$session_email','$session_level','$session_department')";

 mysqli_query($conn,$sql2) or die(mysqli_error($conn)); 
$num = mysqli_insert_id($conn);
if(mysqli_affected_rows($conn)!=1){
   $message="Error inserting payment";
}else{

  
  //Create instance of PHPMailer
     $mail = new PHPMailer();
 //Set mailer to use smtp
     $mail->isSMTP();
 //Define smtp host
     $mail->Host = "mail.freemanstandardschoolikare.sch.ng";
 //Enable smtp authentication
     $mail->SMTPAuth = true;
 //Set smtp encryption type (ssl/tls)
     $mail->SMTPSecure = "tls";
 //Port to connect smtp
     $mail->Port = "587";
 //Set gmail username
     $mail->Username = "ticket@freemanstandardschoolikare.sch.ng";
 //Set gmail password
     $mail->Password = "Techbeast@20";
 //Email subject
     $mail->Subject = "$ticketNo YOUR TICKET ORDER WAS SUCCESSFUL";
 //Set sender email
     $mail->setFrom('ticket@freemanstandardschoolikare.sch.ng');
 //Enable HTML
     $mail->isHTML(true);
 //Attachment

 //Email body
     $mail->Body ="$receiptContent";
 //Add recipient
     $mail->addAddress("$session_email");
 //Finally send email
     if ($mail->send() ) {
		    echo "<script>alert('PAYMENT SUCCESSFUL, check your mail'); location.href = '../../conas/';</script>";
 
	}  
 }

    } 
}else {
        header("Location: error.html");
        exit;
    }
}
?>
