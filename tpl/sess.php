<?php
session_start();
if(!isset($_SESSION["rand"])){
	header("location:login.php");
}
?>