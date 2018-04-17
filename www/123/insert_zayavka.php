<? session_start();
include("connect.php");
?>

<html>
<head><title>Заявка</title>
<meta http-equiv="Content-Type" content="text/html; charset=cp-1251">
<link rel="stylesheet" href="css/style.css" type="text/css"></head>
<body><center>
<table class="formvv">
<FORM ACTION="zayavki.php" METHOD="POST">
<tr><td><h4>Отправить заявку</h4></td></tr>
<?php
$fio = mysql_query("SELECT * FROM who ORDER BY fio");
?>
<tr><td>От кого</td>
<td><select name="id_who"><?
do {echo "<option value='$zap[id]'>".$zap['fio']."</option>";}
while($zap=mysql_fetch_array($fio));
?> </select> <a href="insert_who.php"></a></td></tr>
<?php
$vid = mysql_query("SELECT * FROM vid ORDER BY vid");
?>
<tr><td>Вид заявки</td>
<td><select name="id_vid"><?
do {echo "<option value='$zap1[id]'>".$zap1['vid']."</option>";}
while($zap1=mysql_fetch_array($vid));
?> </select> <a href="insert_vid.php"></a></td></tr>
<tr><td>&nbsp;</td>
<td><INPUT TYPE="submit" VALUE="Отправить"></td></tr>
<tr><td><a href="index.php">Назад</a></td></tr><tr>
<td><INPUT name="work" type="hidden" value="1"></td></tr>
</FORM>
</table></center>
</body></html>