<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);

   echo 'Logged out. Please wait a few seconds.';
   header('Refresh: 2; URL = login.php');
?>
