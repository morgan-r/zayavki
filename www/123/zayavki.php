<? session_start();
include("connect.php");
if($_POST['work']) 
{ $d1=$_POST['id_who'];
$d2=$_POST['id_vid'];
$date=date();
$time=time();
mysql_query("INSERT INTO zayavka(who,id_vid,date,time) VALUES('$d1','$d2','$date','$time')") or die('Не могу добавить Заявку:'.mysql_error());
}
?>
<html>
<head><title>Заявки</title></head>
<body><center>
<h2>Ваша заявка принята. </h2></center>
</body>
</html>