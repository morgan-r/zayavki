<? session_start();
include("connect.php");
if($_POST['work']) 
{ $d1=$_POST['number'];
$d2=$_POST['id_tehnika'];
$d3=$_POST['id_cabinet'];
mysql_query("INSERT INTO inv_number(number,id_tehnika,id_cabinet) VALUES('$d1','$d2','$d3')") or die('Не могу добавить новую технику:'.mysql_error());
}
?>

<html>
<head><title>Техника</title>
<meta http-equiv="Content-Type" content="text/html; charset=cp-1251">
<link rel="stylesheet" href="css/style.css" type="text/css"></head>
<body>
<table class="formvv">
<FORM ACTION="insert_inv.php" METHOD="POST">
<tr><td><h4>Добавить новую технику</h4></td></tr>
<tr><td>Инвентарный номер</td>
<td><INPUT TYPE="text" NAME="number" SIZE="30" MAXLENGTH="30"><p></td></tr>
<?php
$teh = mysql_query("SELECT * FROM tehnika ORDER BY name");
?>
<tr><td>Техника</td>
<td><select name="id_tehnika"><?
do {echo "<option value='$zap[id]'>".$zap['name']."</option>";}
while($zap=mysql_fetch_array($teh));
?> </select> <a href="insert_tehnika.php">Новая техника</a></td></tr>
<?php
$cab = mysql_query("SELECT * FROM auditorium ORDER BY cabinet");
?>
<tr><td>Кабинет</td>
<td><select name="id_cabinet"><?
do {echo "<option value='$zap1[id]'>".$zap1['cabinet']."</option>";}
while($zap1=mysql_fetch_array($cab));
?> </select> <a href="insert_cabinet.php">Добавить кабинет</a></td></tr>
<tr><td>&nbsp;</td>
<td><INPUT TYPE="submit" VALUE="Добавить"></td></tr>
<tr><td><a href="index.php">Назад</a></td></tr><tr>
<td><INPUT name="work" type="hidden" value="1"></td></tr>
</FORM>
</table>

<?
$inv=mysql_query("SELECT number, tehnika.name as name, auditorium.cabinet as cab 
FROM tehnika, auditorium, inv_number
WHERE inv_number.id_cabinet=auditorium.id AND inv_number.id_tehnika=tehnika.id
ORDER BY name");
?>

<table width="30%" border="1" cellspacing="0" cellpading="30" class="viv">
<tr>
<td>Инв. Номер</td>
<td>Наименование</td>
<td>Месторасположение</td>
<td>Удалить</td>
</tr>
<?
while($mass=mysql_fetch_array($inv)){
echo "<tr>";
echo "<td>".$mass['number']."</td>";
echo "<td>".$mass['name']."</td>";
echo "<td>".$mass['cab']."</td>";
echo "<td align=center><a href=insert_inv.php?del=$mass[id] \"
onClick=\"return confirm('Вы уверены?');\">X</a></td>";
echo "</tr>";
}

if (isset($_GET[del]) ){
$del=$_GET[del];
$e=mysql_query("delete * from inv_number 
where id='$del'") or die (mysql_error() );
if ($del==true){
echo "Удалили";
}
else {
echo "не удалили";
};
echo "<META HTTP-EQUIV='REFRESH' CONTENT='0.3;URL=insert_inv.php'>";
};
 ?>
</table></body></html>