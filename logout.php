<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);

   echo 'Logging out. Please wait a moment...';
   header('Refresh: 1; URL = login.php');
?>
