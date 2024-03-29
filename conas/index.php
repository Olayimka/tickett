


<?php
include('session.php');
include('../conn.php');

$randomNumber = rand(100,100000);

$d = date("y");
$ID="AUO".$d."-".$randomNumber."TB";

// Process form submission and save data to session
if (isset($_REQUEST['submit'])) {
  $eventName = trim(addslashes($_REQUEST['eventName']));
  $ticketType = trim(addslashes($_REQUEST['ticketType']));
  $quantity = trim(addslashes($_REQUEST['quantity']));
  $amount = trim(addslashes($_REQUEST['amount']));
  $college = trim(addslashes($_REQUEST['college']));
  $unit = trim(addslashes($_REQUEST['unit']));
  
  // Save form data to session
  $_SESSION['eventName'] = $eventName;
  $_SESSION['ticketType'] = $ticketType;
  $_SESSION['quantity'] = $quantity;
  $_SESSION['amount'] = $amount;
  $_SESSION['college'] = $college;
  $_SESSION['unit'] = $unit;
  $_SESSION['ticketNo']=$ID;


    // Redirect to invoice page
    header("Location: invoice/");
    exit();
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title> Ticket</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="./style.css">

</head>

<body>


  
  <div class="container">
    <div class="cardWrap">
      <div class="card cardLeft">
        <h1>Dinner <span>Ticket</span></h1>
        <div class="title">
          <h2>"Dinner name"</h2>
          <span>Theme</span>
        </div>
        <div class="name">
          <h2>"Fill in the name"</h2>
          <span>Name</span>
        </div>
      </div>
      <div class="card cardRight">
        <div class="eye"></div>
        <div class="number">
          <h3>----</h3>
          <span>Seat</span>
        </div>
        <div class="barcode"></div>
      </div>
      <div class="ibox">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2">
          Buy Ticket
        </button>
      </div>
    </div>
  </div>
  <form id="paymentForm" method="post">




  <div class="modal" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content animated flipInY">
        
          <div class="modal-header">
            <h4 class="modal-title">Event Name</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label class="col-sm-2 control-label">EVENT NAME</label>
              <input type="text" name="eventName" class="form-control" id="eventName"
                value="SAPPHIRE DE FIESTA">
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Email</label>
              <input class="form-control" type="email"  id="email" name="email"
                >
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Ticket Type</label>
              <select class="form-control m-b" id="ticket" name="ticketType" onchange="calculate()">
                <option>---Select Ticket Type----</option>
                <option value="Single">Single</option>
                <option value="Table For Two">Table For Two</option>
                <option value="Couples Table">Couples Table</option>
                <option value="Table For Four">Table For Four</option>
              </select>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Quantity</label>
              <input class="form-control" type="number" min="1" id="quantity" name="quantity"
                onchange="calculate()">
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Amount</label>
              <div class="input-group m-b">
                <span class="input-group-addon">$</span>
                <input type="number" class="form-control" id="amount" value="" name="amount" readonly>
                <span class="input-group-addon">.00</span>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">College</label>
              <select class="form-control m-b" id="college" name="college">
                <option> -----College Dinner----- </option>
                <option value="CONAS">CONAS</option>
                <option value="COBHS">COBHS</option>
                <option value="COET">COET</option>
                <option value="COLAW">COLAW</option>
                <option value="FOHS">FOHS</option>
                <option value="COSMAS">COSMAS</option>
              </select>
            </div>
            <div class="form-group" hidden>
              <label class="col-sm-2 control-label">Unit Amount</label>
              <input class="form-control" hidden type="number" id="unit" name="unit"
                >
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" id="proceedBtn" value="submit" class="btn btn-primary">Proceed</button>
          </div>

      </div>
    </div>
  </div>

</form>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://js.paystack.co/v1/inline.js"></script>
  <script>





    function calculate() {
      var quantity = parseFloat(document.getElementById('quantity').value);
      var ticket = document.getElementById('ticket').value;

      if (ticket === "Single") {
        var newAmount = 3000;
      } else if (ticket === "Table For Two") {
        var newAmount = 15000;
      } else if (ticket === "Couples Table") {
        var newAmount = 30000;
      } else if (ticket === "Table For Four") {
        var newAmount = 60000;
      } else {
        var newAmount = 0;
      }
     
      var totalAmount = quantity * newAmount;
      document.getElementById('amount').value = totalAmount.toFixed(2);
      var unitAmount = totalAmount / quantity;

      document.getElementById('unit').value = unitAmount;
    }
</script>
</body>

</html>