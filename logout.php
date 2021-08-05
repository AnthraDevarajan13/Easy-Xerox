<?php
   session_start();
   unset($_SESSION["regno"]);
   unset($_SESSION["pass"]);

   header('Refresh: 1; URL = projectlogin.php');
?>