<?php
   ob_start();
   session_start();
?>

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
echo "Connected successfully";

$count_qry = "SELECT COUNT(itemid) AS count FROM scamazon.cart";
$count_exe = $conn->query($count_qry);
$count_record = $count_exe->fetch_array();
$count = $count_record['count'];
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
           <a class="nav-link active" href="login.php">Account</a>
         </li>
         <li class="nav-item">
           <a class="nav-link active" href="checkout.php">Cart (<?php echo $count; ?>)</a>
         </li>
       </ul>
     </div>


     <div class="loginform">
       <h3 style="text-align: center;">Enter Username and Password</h3>
       <div class = "container form-signin mt-4">

          <?php
             if (isset($_POST['login']) && !empty($_POST['username'])
                && !empty($_POST['password'])) {

                if ($_POST['username'] == 'user' &&
                   $_POST['password'] == 'pass') {
                   $_SESSION['valid'] = true;
                   $_SESSION['timeout'] = time();
                   $_SESSION['username'] = 'username';

                   echo 'Success! You are now logged in.';
                }else {
                   echo 'Error: wrong username or password.';
                }
             }
          ?>
       </div> <!-- /container -->

       <div class = "container">

          <form class = "form-signin" role = "form"
             action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
             ?>" method = "post">
             <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
             <input type = "text" class = "form-control"
                name = "username" placeholder = "Username: user"
                required autofocus></br>
             <input type = "password" class = "form-control"
                name = "password" placeholder = "Password: pass" required>
             <button class = "btn btn-lg btn-primary btn-block mt-4" type = "submit"
                name = "login">Login</button>
          </form>

          Click here to <a href = "logout.php" tite = "Logout">Logout.</a>

       </div>
   </div>

   </body>
</html>
