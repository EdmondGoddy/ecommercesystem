<?php


session_start();

unset ($_SESSION["admin_email"]);
unset ($_SESSION["admin_pass"]);
session_destroy();


echo "<script>window.open('index.php', '_self')</script>";

?>

