<?
session_start();
include ("connect.php");
if (isset($_SESSION['login'])) {
   unset($_SESSION['login']);
   header("Location:index.php");
   }  
 ?>