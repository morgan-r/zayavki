<? session_start();
include("connect.php");
include("index.inc");
if($_POST['id']){
$z=$_POST['id'];
?>
<center>
<? $data=mysql_query("SELECT zayavka.id as id, zayavka.date_z as d_z, CONCAT(who.F,' ',who.I,' ',who.O) as who, problem
FROM zayavka, who
WHERE zayavka.id_who=who.id AND zayavka.id=$z");
$res=mysql_fetch_array($data);
echo "<div id='pol'>";
echo "<div style='text-align:right;'>".$res['d_z']."<br /></div>";
echo "<b>Отправитель : </b>".$res['who']."<br />";
echo "<b>Проблема : </b>".$res['problem']."<br /></div>";?>
</center>
<hr>
<table>
<form method="POST" action="zayavki.php">
<tr><td><input type="checkbox" name="rashod" value="Расходный материал">Расходный материал</td></tr>
<?php
$mat = mysql_query("SELECT * FROM mat ORDER BY name");
?>
<tr><td>Расходный материал</td>
<td><select name="id_mat"><?
do {echo "<option value='$zap[id]'>".$zap['name']."</option>";}
while($zap=mysql_fetch_array($mat));
?> </select><a href="insert_mat.php"> Расходные материалы</a></td></tr>
<tr><td>Количество</td>
<td><input type="text" name="kol_vo" size="30" maxlength="5"></td></tr>
</table><hr>
<table>
<tr><td><input type="checkbox" name="tehnika" value="Техника">Техника</td></tr>
<?php
$teh = mysql_query("SELECT * FROM tehnika ORDER BY teh");
?>
<tr><td>Техника</td>
<td><select name="id_teh"><?
do {echo "<option value='$zap1[id]'>".$zap1['teh']." ".$zap1['model']." ".$zap1['inv_number']."</option>";}
while($zap1=mysql_fetch_array($teh));
?> </select><a href="insert_tehnika.php">Техника</a></td></tr>
<tr><td>Перемещение в кабинет №</td>
<td><input type="text" name="new_otdel" size="30" maxlength="3" /></td></tr>
<?php
$otv = mysql_query("SELECT * FROM who ORDER BY F");
?>
<tr><td>Ответственное лицо</td>
<td><select name="id_otv_n"><?
do {echo "<option value='$zap[id]'>".$zap['F']." ".$zap['I']." ".$zap['O']."</option>";}
while($zap=mysql_fetch_array($otv));
?> </select><a href="insert_who.php">Пользователь</a></td></tr>
<tr><td><input type="checkbox" name="zamena" value="Замена">Замена техники</td></td></tr>
</table>
<hr>
<table>
<tr><td><input type="checkbox" name="soft" value="Софт">Софт (программы)</td></tr>
<tr><td>Софт(устновка, настройка, удаление)</td><td><input type="textarea" name="software" size="60" maxlength="150" /></td></tr>
</table>
<hr>
<table>
<tr><td>Комментарии</td><td><input type="textarea" name="comments" size="40" maxlength="150" /></td></tr>
<tr><td>Исполнитель</td>
<td><input type="text" name="isp" size="30" maxlength="25"></td></tr>
<input type="hidden" name="id_zayavka" value="<? echo "$z";?>">
<tr><td><INPUT TYPE="submit" VALUE="ОК"></td></tr>
<tr><td><a href='zayavki.php'>Назад</a></td></tr>
</form>
</table>
<?
}
include("footer.inc");
?>