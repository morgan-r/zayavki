<? session_start();
include("connect.php");
include("index.inc");
if ($_SESSION[login]=='admin'){
/*-----------Поиск-----------*/
$select="SELECT zayavka.date_isp as d, tehnika.teh as teh, tehnika.model as model, new_otdel, CONCAT(who.F,' ',who.I,' ',who.O) as otv, peremen.zamena as zam
FROM zayavka, tehnika, who RIGHT JOIN peremen ON peremen.id_otv_n=who.id
WHERE peremen.id_zayavka=zayavka.id AND peremen.id_teh=tehnika.id ";
/*-----Сортировка по замене или по перемещению-----*/
if(isset($_GET['zam'])){
$q=$_GET['zam'];
$select.=" AND zamena='$q' ";
}
/*----Поиск за период-----*/
if((!empty($_POST['date_1']))||(!empty($_POST['date_2']))){
$date_1=$_POST['date_1']." 00:00:00";
$date_2=$_POST['date_2']." 23:59:59";
$select.=" AND zayavka.date_isp BETWEEN '$date_1' AND '$date_2'";
}
/*-----По ответсвенному за технику-----*/
if(!empty($_POST['who'])){
$who=$_POST['who'];
$select.=" AND who.id='$who' ";
}
/*-----Поиск по инвентарному номеру-----*/
if(!empty($_POST['inv'])){
$inv=$_POST['inv'];
$select.=" AND tehnika.id='$inv' ";
}
/*-----Поиск по кабинету-----*/
if (!empty($_POST['cab'])){
$otd=$_POST['cab'];
$select.=" AND new_otdel='$otd' ";
}
$select.=" order by date_isp DESC";
$res=mysql_query($select)or die(@mysql_error());
/*
$res=mysql_query("SELECT zayavka.date_isp as d, tehnika.teh as teh, tehnika.model as model, new_otdel, CONCAT(who.F,' ',who.I,' ',who.O) as otv, peremen.zamena as zam
FROM zayavka, tehnika, who RIGHT JOIN peremen ON peremen.id_otv_n=who.id
WHERE peremen.id_zayavka=zayavka.id AND peremen.id_teh=tehnika.id
order by date_isp
LIMIT 0, 15;")or die(@mysql_error());*/
?>
<form method="post" action="peremen.php">
<table><tr><td>Поиск</td></tr>
<tr><td>C:</td>
<td><input type="text" name="date_1" maxlength="10" id="startDate" <? if(isset($_POST['date_1'])){
 echo "value=".$_POST['date_1']; }?>></td></tr>
<tr><td>По:</td>
<td><input type="text" name="date_2" maxlength="10" id="endDate" <? if(isset($_POST['date_2'])){
 echo "value=".$_POST['date_2']; }?>></td></tr>
 <?php
$wh= mysql_query("SELECT * FROM who order by F");
?>
<tr><td>Ответственный</td>
<td><select name="who"><?
do {echo "<option value='$w[id]'>".$w['F']." ".$w['I']." ".$w['O']."</option>";} 
while($w=mysql_fetch_array($wh))?> </select></td></tr>
<?php
$teh = mysql_query("SELECT * FROM tehnika order by teh")or die(mysql_error());
?>
<tr><td>Техника</td>
<td><select name="inv"><?
do {echo "<option value='$zap[id]'>".$zap['teh']." ".$zap['model']." ".$zap['inv_number']."</option>";} 
while($zap=mysql_fetch_array($teh))?> </select></td></tr>
<tr><td>Кабинет</td><td><input type="text" name="cab" maxlength="3" <? if(isset($_POST['cab'])){
 echo "value=".$_POST['cab']; }?>></td></tr>
<tr><td>&nbsp;</td>
<td><input type="submit" value="Поиск"></td></tr>
</table></form>
<table border="1" cellspacing="0">
<tr>
<td>Дата исполнения</td>
<td>Группа техники</td>
<td>Модель</td>
<td>Отдел</td>
<td>Ответственный</td>
<td>Перемещение/Замена</td>
</tr>
<?
while($mass=mysql_fetch_array($res)){
echo "<tr>";
echo "<td>".$mass['d']."</td>";
echo "<td>".$mass['teh']."</td>";
echo "<td>".$mass['model']."</td>";
echo "<td>".$mass['new_otdel']."</td>";
echo "<td>".$mass['otv']."</td>";
if($mass['zam']==1){
echo "<td><a href='peremen.php?zam=1'>Замена</a></td>";}else{echo "<td><a href='peremen.php?zam=0'>Перемещение</a></td>";}
echo "</tr>";
} ?>
</table>
<a href="index.php">На главную</a>
<? 
} else{ echo "У вас нет прав для просмотра данной страницы";}
include("footer.inc");?>