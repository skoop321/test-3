<?php
$servername = "localhost";
$username = "username";
$password = "";
$dbname = "scamazon";

// Create connection
$conn = new mysqli($servername, $username, $password, $scamazon);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
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
        if(isset($_POST['pc1'])) {
            echo "This is pc1 that is selected";
        }
        if(isset($_POST['pc2'])) {
            echo "This is pc2 that is selected";
        }
        if(isset($_POST['pc3'])) {
            echo "This is pc3 that is selected";
        }
        if(isset($_POST['pc4'])) {
            echo "This is pc4 that is selected";
        }
    ?>


  </head>

  <body>

    <div class="jumbotron jumbotron-fluid px-5 bg-dark pt-3 pb-3 menu">

      <ul class="nav justify-content-end">
        <li class="nav-item mr-auto">
          <img src="scamazon-logo.png" style="height:50px;" >
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="checkout.php">Cart</a>
        </li>
      </ul>
    </div>


    <div class="promobanner jumbotron jumbotron-fluid"></div>

    <h2>New Desktop Deals!</h2>

    <div class="productcol">
      <div class="row align-items-start">
        <div class="col">
          <img src="pc1.jpeg" class="productimg"></img>
          <div class="productdesc">
            <h4>Gaming Desktop RGB360</h4>
            <h5>Specifications:</h5>
            <ul>
              <li>CPU: AMD Ryzen 5 3600x</li>
              <li>GPU: nVidia GeForce RTX 3060TI</li>
              <li>RAM: 32gb DDR4 3200mHz</li>
              <li>Price: $1800</li>
            </ul>
          </div>
          <form method="post">
            <input type="submit" class="btn btn-warning" name="pc1" value="Add to Cart"/>
          </form>
        </div>

        <div class="col">
          <img src="pc2.jpeg" class="productimg"></img>
          <div class="productdesc">
            <h4>Gaming Desktop RED220i</h4>
            <h5>Specifications:</h5>
            <ul>
              <li>CPU: Intel i5 8375</li>
              <li>GPU: nVidia GeForce RTX 3080</li>
              <li>RAM: 32gb DDR4 3200mHz</li>
              <li>Price: $2300</li>
            </ul>
          </div>
          <form method="post">
            <input type="submit" class="btn btn-warning" name="pc2" value="Add to Cart"/>
          </form>
        </div>

        <div class="col">
          <img src="pc3.png" class="productimg"></img>
          <div class="productdesc">
            <h4>Gaming Desktop REDxA9</h4>
            <h5>Specifications:</h5>
            <ul>
              <li>CPU: AMD Ryzen 7 5900x</li>
              <li>GPU: nVidia GeForce RTX 3090</li>
              <li>RAM: 64gb DDR4 3200mHz</li>
              <li>Price: $3500</li>
            </ul>
          </div>
          <form method="post">
            <input type="submit" class="btn btn-warning" name="pc3" value="Add to Cart"/>
          </form>
        </div>

        <div class="col">
          <img src="pc4.png" class="productimg"></img>
          <div class="productdesc">
            <h4>Gaming Desktop RGB720</h4>
            <h5>Specifications:</h5>
            <ul>
              <li>CPU: AMD Ryzen 5 5600x</li>
              <li>GPU: AMD Radeon 6800x</li>
              <li>RAM: 32gb DDR4 3200mHz</li>
              <li>Price: $2400</li>
            </ul>
          </div>
          <form method="post">
            <input type="submit" class="btn btn-warning" name="pc4" value="Add to Cart"/>
          </form>
        </div>
      </div>
    </div>

    <div class="productcol">
      <div class="row align-items-start">
        <div class="col">
          <img src="pc1.jpeg" class="productimg"></img>
          <div class="productdesc">
            <h4>Gaming Desktop RGB360</h4>
            <h5>Specifications:</h5>
            <ul>
              <li>CPU: AMD Ryzen 5 3600x</li>
              <li>GPU: nVidia GeForce RTX 3060TI</li>
              <li>RAM: 32gb DDR4 3200mHz</li>
              <li>Price: $1800</li>
            </ul>
          </div>
          <button type="button" class="btn btn-warning" onclick="addCart(1800)">Add to Cart</button>
        </div>

        <div class="col">
          <img src="pc4.png" class="productimg"></img>
          <div class="productdesc">
            <h4>Gaming Desktop RGB720</h4>
            <h5>Specifications:</h5>
            <ul>
              <li>CPU: AMD Ryzen 5 5600x</li>
              <li>GPU: AMD Radeon 6800x</li>
              <li>RAM: 32gb DDR4 3200mHz</li>
              <li>Price: $2400</li>
            </ul>
          </div>
          <button type="button" class="btn btn-warning" onclick="addCart(2400)">Add to Cart</button>
        </div>

        <div class="col">
          <img src="pc2.jpeg" class="productimg"></img>
          <div class="productdesc">
            <h4>Gaming Desktop RED220i</h4>
            <h5>Specifications:</h5>
            <ul>
              <li>CPU: Intel i5 8375</li>
              <li>GPU: nVidia GeForce RTX 3080</li>
              <li>RAM: 32gb DDR4 3200mHz</li>
              <li>Price: $2300</li>
            </ul>
          </div>
          <button type="button" class="btn btn-warning" onclick="addCart(2300)">Add to Cart</button>
        </div>

        <div class="col">
          <img src="pc3.png" class="productimg"></img>
          <div class="productdesc">
            <h4>Gaming Desktop REDxA9</h4>
            <h5>Specifications:</h5>
            <ul>
              <li>CPU: AMD Ryzen 7 5900x</li>
              <li>GPU: nVidia GeForce RTX 3090</li>
              <li>RAM: 64gb DDR4 3200mHz</li>
              <li>Price: $3500</li>
            </ul>
          </div>
          <button type="button" class="btn btn-warning" onclick="addCart(3500)">Add to Cart</button>
        </div>

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

  </body>
</html>
