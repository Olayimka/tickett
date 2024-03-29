<!-- HTML Form -->
<?php
include('../../conn.php');
include('../../session.php');

$eventName = $_SESSION['eventName'];
$ticket = $_SESSION['ticketType'];
$quantity = $_SESSION['quantity'];
$college = $_SESSION['college'];
$ticketNo = $_SESSION['ticketNo'];
$amount= $_SESSION['amount'];
$unit= $_SESSION['unit'];

$currentDateTime = date('m/d/Y h:i:s a', time());
?>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Invoice</title>

    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="../../css/animate.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">

</head>

<body>

<form id="paymentForm">
<div class="row">
          <div class="col-lg-12">
            <div class="wrapper wrapper-content animated fadeInRight">
              <div class="ibox-content p-xl">
                <div class="row">
                  <div class="col-sm-6">
                    <h5>From:</h5>
                    <address>
                      <strong>TB Ticket Master</strong><br>
                      Achievers University<br>
                      Owo<br>
                      <abbr title="Phone">Tel:</abbr> (234) 913-5288-979
                    </address>
                  </div>
                  <div class="col-sm-6 text-right">
                    <h4>Invoice No.</h4>
                    <h4 class="text-navy">${invId}</h4>
                    <span>To:</span>
                    <address>
                      <strong><?php echo $session_fullname; ?></strong><br>
                      <?php echo $session_college ?><br>
                      <?php echo $session_department; ?><br>
                      <?php echo $session_level; ?><br>
                      <?php echo $session_email; ?>
                    </address>
                    <p>
                      <span><strong>Invoice Date:</strong><?php echo $currentDateTime; ?></span><br />
                      
                    </p>
                  </div>
                </div>
                <div class="eventName" style="
    font-size: 15px;
    font-family: sans-serif;
    font-weight: 900;
    text-align: center;"> <?php echo $eventName;  ?></div>
                <div class="table-responsive m-t">
                  <table class="table invoice-table">
                    <thead>
                      <tr>
                        <th>Ticket Type</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total Price</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <div><strong><?php echo $ticket; ?></strong></div>
                        </td>
                       
                        <td><?php echo $quantity; ?></td>
                        <td><?php echo $unit; ?></td>
                        <td><?php echo $amount; ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
               
                <div class="text-right">
                <div class="form-submit">
    <button type="submit"  class="btn btn-primary" onclick="payWithPaystack()"> Make Payment</button>
  </div>
                </div>
               
              </div>
            </div>
          </div>
        </div>
</form>

<script src="../../js/jquery-2.1.1.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../../js/inspinia.js"></script>
    <script src="../../js/plugins/pace/pace.min.js"></script>


    <script src="https://js.paystack.co/v1/inline.js"></script>
  <script>
 const paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener("submit", payWithPaystack, false);

function payWithPaystack(e) {
  e.preventDefault();

  let handler = PaystackPop.setup({
    key: 'pk_test_dc052d24d8530e63f53f80495f6dc8250cf15703', // Replace with your public key
    email: '<?php echo $session_email; ?>',
    amount: '<?php echo $amount; ?>' * 100,
    ref: 'TB'+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function(){
      window.location = "https://freemanstandardschoolikare.sch.ng/pwork/Ticket-main/conas/";
      alert('Transaction cancelled.');
    },
    callback: function(response){
      let message = 'Payment complete! Reference: ' + response.reference;
      alert(message);
      window.location ="https://freemanstandardschoolikare.sch.ng/pwork/Ticket-main/conas/verify/?reference=" + response.reference;
    }
  });

  handler.openIframe();
}
</script>

</body>
</html>
