<?php

session_start();
unset($_SESSION['id_user']);
session_write_close();
header("location: index.php");
?>