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
        if(isset($_POST['pc1'])) {
          $sql = "INSERT INTO scamazon.cart (userid, name, price)
          VALUES ('1', 'RGB360', '1800.00')";

          if ($conn->query($sql) === TRUE) {
          echo "Item added to cart.";
          } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
          }
          header('Location:http://localhost/Scamazon/index.php');
        }

        if(isset($_POST['pc2'])) {
          $sql = "INSERT INTO scamazon.cart (userid, name, price)
          VALUES ('1', 'RED220i', '2300.00')";

          if ($conn->query($sql) === TRUE) {
          echo "Item added to cart.";
          } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
          }
          header('Location:http://localhost/Scamazon/index.php');
        }

        if(isset($_POST['pc3'])) {
          $sql = "INSERT INTO scamazon.cart (userid, name, price)
          VALUES ('1', 'REDxA9', '3500.00')";

          if ($conn->query($sql) === TRUE) {
          echo "Item added to cart.";
          } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
          }
          header('Location:http://localhost/Scamazon/index.php');
        }

        if(isset($_POST['pc4'])) {
          $sql = "INSERT INTO scamazon.cart (userid, name, price)
          VALUES ('1', 'RGB720', '2400.00')";

          if ($conn->query($sql) === TRUE) {
          echo "Item added to cart.";
          } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
          }
          header('Location:http://localhost/Scamazon/index.php');
        }

        $count_qry = "SELECT COUNT(itemid) AS count FROM scamazon.cart";
        $count_exe = $conn->query($count_qry);
        $count_record = $count_exe->fetch_array();
        $count = $count_record['count'];
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
          <a class="nav-link active" href="checkout.php">Cart (<?php echo $count; ?>)</a>
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
