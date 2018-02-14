<?php 
session_start();
session_destroy();
//unset(session_id());
header("location:main_login.php");
?>