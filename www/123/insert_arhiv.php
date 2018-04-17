<? session_start();
include("connect.php");
if($_POST['work']) 
{ $d1=$_POST['id_zayavka'];
$d2=$_POST['id_actions'];
$d3=$_POST['id_inv'];
$d4=$_POST['id_cabinet'];
$d5=$_POST['stoimost'];
$date=date();
$time=time();
mysql_query("INSERT INTO arhiv(id_zayavka,id_action,id_inv,id_cabinet,stoimost,date,time) VALUES('$d1','$d2','$d3','$d4','$d5','$date','$time')") or die('Не могу добавить запись:'.mysql_error());
}
?>

<html>
<head><title>Выполненные заявки</title>
<meta http-equiv="Content-Type" content="text/html; charset=cp-1251">
<link rel="stylesheet" href="css/style.css" type="text/css"></head>
<body>
<table class="formvv">
<FORM ACTION="insert_arhiv.php" METHOD="POST">
<tr><td><h4>Выполненная заявка</h4></td></tr>
<tr><td>Заявка</td>
<td><INPUT TYPE="text" NAME="zayavka" SIZE="30" MAXLENGTH="50"><p></td></tr>
<?php
$act = mysql_query("SELECT * FROM actions ORDER BY action");
?>
<tr><td>Выполненная работа</td>
<td><select name="id_actions"><?
do {echo "<option value='$zap[id]'>".$zap['action']."</option>";}
while($zap=mysql_fetch_array($act));
?> </select> <a href="insert_actions.php">Выполняемые работы</a></td></tr>
<?php
$teh = mysql_query("SELECT inv_number.id as id, number, tehnika.name as name, tehnika.price as price, auditorium.cabinet as cab
FROM inv_number, tehnika, auditorium
WHERE inv_number.id_cabinet=auditorium.id AND inv_number.id_tehnika=tehnika.id 
ORDER BY name");
?>
<tr><td>Техника</td>
<td><select name="id_inv"><?
do {echo "<option value='$zap1[id]'>".$zap1['name']." ".$zap1['cab']." ".$zap1['price']." ".$zap1['number']."</option>";}
while($zap1=mysql_fetch_array($teh));
?> </select> <a href="insert_inv.php">Новая техника</a></td></tr>
<?php
$cab = mysql_query("SELECT * FROM auditorium ORDER BY cabinet");
?>
<tr><td>Кабинет</td>
<td><select name="id_cabinet"><?
do {echo "<option value='$zap2[id]'>".$zap2['cabinet']."</option>";}
while($zap2=mysql_fetch_array($cab));
?> </select> <a href="insert_cabinet.php">Добавить кабинет</a></td></tr>
<tr><td>Стоимость техники на сегодня</td>
<td><INPUT TYPE="text" NAME="stoimost" SIZE="30" MAXLENGTH="30"><p></td></tr>
<tr><td>&nbsp;</td>
<td><INPUT TYPE="submit" VALUE="Добавить"></td></tr>
<tr><td><a href="index.php">Назад</a></td></tr><tr>
<td><INPUT name="work" type="hidden" value="1"></td></tr>
</FORM>
</table>

<?
$arh=mysql_query("SELECT who.fio, vid.vid,CONCAT(zayavka.date_z,'  ',zayavka.time_z) as z_time, actions.action as act, tehnika.name, inv_number.number, auditorium.cabinet as cab, arhiv.stoimost, CONCAT(arhiv.date,' ',arhiv.time) as a_time
FROM arhiv, tehnika, auditorium, inv_number,zayavka, actions, who, vid
WHERE arhiv.id_zayavka=zayavka.id
AND arhiv.id_inv=inv_number.id 
AND arhiv.id_cabinet=auditorium.id 
AND arhiv.id_actions=actions.id
AND inv_number.id_tehnika=tehnika.id 
AND zayavka.id_vid=vid.id
AND zayavka.id_who=who.id
ORDER BY a_time")or die(mysql_error());
?>

<table width="80%" border="1" cellspacing="0" cellpading="30" class="viv">
<tr>
<td>От кого</td>
<td>Вид заявки</td>
<td>Время заявки</td>
<td>Выполненная работа</td>
<td>Техника</td>
<td>Инв. Номер</td>
<td>Кабинет</td>
<td>Стоимость</td>
<td>Время выполнения</td>
<td>Удалить</td>
</tr>
<?
while($mass=mysql_fetch_array($arh)){
echo "<tr>";
echo "<td>".$mass['fio']."</td>";
echo "<td>".$mass['vid']."</td>";
echo "<td>".$mass['z_time']."</td>";
echo "<td>".$mass['act']."</td>";
echo "<td>".$mass['name']."</td>";
echo "<td>".$mass['number']."</td>";
echo "<td>".$mass['cab']."</td>";
echo "<td>".$mass['stoimost']."</td>";
echo "<td>".$mass['a_time']."</td>";
echo "<td align=center><a href=insert_arhiv.php?del=$mass[id] \"
onClick=\"return confirm('Вы уверены?');\">X</a></td>";
echo "</tr>";
}

if (isset($_GET[del]) ){
$del=$_GET[del];
$e=mysql_query("delete * from arhiv 
where id='$del'") or die (mysql_error() );
if ($del==true){
echo "Удалили";
}
else {
echo "не удалили";
};
echo "<META HTTP-EQUIV='REFRESH' CONTENT='0.3;URL=insert_arhiv.php'>";
};
 ?>
</table></body></html>