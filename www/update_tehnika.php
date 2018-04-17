<? session_start();
include("connect.php");
if (isset($_POST['update_id'])){
$d1=$_POST['update_id'];
$d2=$_POST['teh'];
$d3=$_POST['model'];
$d7=$_POST['stoimost'];
$d4=$_POST['inv_number'];
$d5=$_POST['id_otv'];
$d6=$_POST['id_otdel'];
mysql_query("UPDATE tehnika SET teh='$d2',model='$d3', stoimost='$d7',inv_number='$d4',id_otv='$d5',id_otdel='$d6' WHERE id='$d1'");
header("location:insert_tehnika.php");
}
include("index.inc");
?>

<?
if (isset($_POST['id'])){
$tehid=$_POST['id'];
$result=mysql_query("SELECT * FROM tehnika WHERE id='$tehid'");
$mass=mysql_fetch_array($result);
?>
<table>
<FORM ACTION="update_tehnika.php" METHOD="POST">
<INPUT TYPE="hidden" NAME="update_id" value="<? echo $tehid?>">
<tr><td>Группа техники</td>
<td><input type="text" name="teh" value="<? echo $mass['teh'];?>"></td></tr>
<tr><td>Модель</td>
<td><input type="text" name="model" value="<? echo $mass['model'];?>"></td></tr>
<tr><td>Стоимость</td>
<td><input type="text" name="stoimost" value="<? echo $mass['stoimost'];?>"></td></tr>
<tr><td>Инвентарный номер</td>
<td><input type="text" name="inv_number" value="<? echo $mass['inv_number'];?>"></td></tr>
<?php
$o=$mass['id_otv'];
$otv = mysql_query("SELECT * FROM who WHERE id=$o");
$res = mysql_fetch_array($otv);
?>
<tr><td>Ответственное лицо</td>
<td><select name="id_otv"><?
echo "<option value='$res[id]'>".$res['F']." ".$res['I']." ".$res['O']."</option>";
$otv1 = mysql_query("SELECT * FROM who ORDER BY F");
while($zap=mysql_fetch_array($otv1)){
echo "<option value='$zap[id]'>".$zap['F']." ".$zap['I']." ".$zap['O']."</option>";
}?> </select><a href="insert_who.php">Пользователь</a></td></tr>
<tr><td>Отдел</td>
<td><input type="text" name="id_otdel" value="<? echo $mass['id_otdel'];}?>"></td></tr>
<tr><td><INPUT TYPE="submit" VALUE="ОК"></td></tr>
<tr><td><button onclick='history.back()'>Назад</button></td></tr>
</FORM>
</table>
<? include("footer.inc");?>