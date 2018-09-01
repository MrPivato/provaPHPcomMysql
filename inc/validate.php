<?php
session_start();
if(!isset($_SESSION['login']) == true){
        header("Location: login.php");
}
?>
