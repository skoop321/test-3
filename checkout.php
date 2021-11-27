<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully. ";
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Scamazon Checkout</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="checkout.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="checkout.css" media="screen"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
      $(document).ready(function(){
        $("#promocode").toggle();

        $("#promobtn").click(function (e) {
          e.preventDefault();
        });

        $("#promobtn").click(function(){
          $("#promocode").toggle();
        });
      });
    </script>

    <?php
        if(isset($_POST['clearcart'])) {
          $sql = "DELETE FROM scamazon.cart WHERE userid = 1";

          if ($conn->query($sql) === TRUE) {
          echo "All items removed from cart.";
          } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
          }
          header('Location:http://localhost/Scamazon/checkout.php');
        }
        if(isset($_POST['checkout'])) {
          $sql = "DELETE FROM scamazon.cart WHERE userid = 1";

          if ($conn->query($sql) === TRUE) {
          echo "Thank you for your purchase.";
          } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
          }
          header('Location:http://localhost/Scamazon/checkout.php');
        }

        $sql = "SELECT * FROM scamazon.cart";
        $minid_qry = "SELECT MIN(itemid) AS minid FROM scamazon.cart";
        $sum_qry = "SELECT SUM(price) AS total FROM scamazon.cart";
        $count_qry = "SELECT COUNT(itemid) AS count FROM scamazon.cart";

        $sum_exe = $conn->query($sum_qry);
        $sum_record = $sum_exe->fetch_array();
        $sum = $sum_record['total'];

        $pcid = mysqli_query($conn, $sql);

        $minid_exe = $conn->query($minid_qry);
        $minid_record = $minid_exe->fetch_array();
        $minid = $minid_record['minid'];

        $count_exe = $conn->query($count_qry);
        $count_record = $count_exe->fetch_array();
        $count = $count_record['count'];

        $gst = ($sum/100) * 12.5;
    ?>

  </head>

  <body>

    <div class="jumbotron jumbotron-fluid px-5 bg-dark pt-3 pb-3" style="margin">

      <ul class="nav justify-content-end">
        <li class="nav-item mr-auto">
          <img src="scamazon-logo.png" style="height:50px;">
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="checkout.php">Cart (<?php echo $count; ?>)</a>
        </li>
      </ul>
    </div>

      <div class="row mx-5 px-5">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">
              <?php echo $count; ?>
            </span>
          </h4>




          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Product name</h6>
              </div>
              <span class="text-muted">$12</span>
            </li>

            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Second product</h6>
              </div>
              <span class="text-muted">$8</span>
            </li>

            <li class="list-group-item d-flex justify-content-between">
              <span>GST (12.5%)</span>
              <strong>
                <?php
                /*if($pcid->num_rows > 0) {
                  while($row = $pcid->fetch_assoc()) {
                    echo $row["itemid"];
                  }
                } else {
                  echo "$0.00";
                }*/
                echo "$" .number_format($gst, 2);
                 ?>
              </strong>
            </li>

            <li class="list-group-item d-flex justify-content-between">
              <span><strong>Total</strong></span>
              <strong>
                <?php
                  $sumgst = ($sum+$gst);
                  echo "$" .number_format($sumgst, 2);
                 ?>
              </strong>
            </li>

            <li class="list-group-item d-flex justify-content-between">
              <form method="post">
                <input type="submit" class="btn btn-danger" name="clearcart" value="Clear Cart"/>
              </form>
            </li>
          </ul>



        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Billing address</h4>
          <form class="needs-validation" novalidate="" method="post">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="username">Username</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
                </div>
                <input type="text" class="form-control" id="username" placeholder="Username" required="">
                <div class="invalid-feedback" style="width: 100%;">
                  Your username is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="mb-3">
              <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
            </div>

            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">Country</label>
                <select class="custom-select d-block w-100" id="country" required="">
                  <option value="">Choose...</option>
                  <option>United States</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">State</label>
                <select class="custom-select d-block w-100" id="state" required="">
                  <option value="">Choose...</option>
                  <option>California</option>
                </select>
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" id="zip" placeholder="" required="">
                <div class="invalid-feedback">
                  Zip code required.
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="same-address">
              <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="save-info">
              <label class="custom-control-label" for="save-info">Save this information for next time</label>
            </div>
            <hr class="mb-4">

            <h4 class="mb-3">Payment</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
                <label class="custom-control-label" for="credit">Credit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
                <label class="custom-control-label" for="debit">Debit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
                <label class="custom-control-label" for="paypal">Paypal</label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name">Name on card</label>
                <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback">
                  Name on card is required
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Credit card number</label>
                <input type="text" class="form-control" id="cc-number" placeholder="" required="">
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">Expiration</label>
                <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
                <div class="invalid-feedback">
                  Expiration date required
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                <div class="invalid-feedback">
                  Security code required
                </div>
              </div>
            </div>
            <hr class="mb-4">
              <input type="submit" class="btn btn-primary btn-lg btn-block" name="checkout" value="Continue to Checkout"/>
          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <div class="jumbotron jumbotron-fluid bg-dark">
        <p class="mb-1">© 2020-2021 Scamazon</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </div>
      </footer>
    </div>


    <script>
          // Example starter JavaScript for disabling form submissions if there are invalid fields
          (function() {
            'use strict';

            window.addEventListener('load', function() {
              // Fetch all the forms we want to apply custom Bootstrap validation styles to
              var forms = document.getElementsByClassName('needs-validation');

              // Loop over them and prevent submission
              var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                  if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                  }
                  form.classList.add('was-validated');
                }, false);
              });
            }, false);
          })();
        </script>

</body>
</html>
