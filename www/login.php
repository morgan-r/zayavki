<?php
include("connect.php");

if (isset($_POST['work']))
{
$log=$_POST['login'];
$pass=md5(sha1($_POST['password']));

$query = "SELECT login FROM user WHERE login='$log' AND password='$pass'";
$auth_user=mysql_query($query);
if(mysql_num_rows($auth_user)== 0) {
include("index.inc");
print "<div class=\"newsItem\">Попытка авторизации неудачна! Вы должны ввести правильный логин и пароль. <br/></div>";}
else
{
session_start();
$_SESSION['login'] = $log;
header("Location:index.php");
include("index.inc");
}
}

include("footer.inc");
?>
