<? session_start();
include("connect.php");
if (isset($_POST['update_id'])){
$d1=$_POST['update_id'];
$d2=$_POST['id_who'];
$d3=$_POST['problem'];
$d4=$_POST['isp'];
$d5=$_POST['date_isp'];
if($_POST['vip']){
$d6='1';}
mysql_query("UPDATE  zayavka SET id_who='$d2',problem='$d3',isp='$d4',date_isp='$d5',vip='$d6' WHERE id='$d1'") or die(mysql_error());

if($_POST['id_mat']){
$d7=$_POST['id_mat'];
$d8=$_POST['kol_vo'];
mysql_query("UPDATE rashod SET id_mat='$d7',kol_vo='$d8' WHERE id_zayavka='$d1'")or die(mysql_error());
}
if($_POST['id_teh']){
$d9=$_POST['id_teh'];
$d10=$_POST['new_otdel'];
$d11=$_POST['id_otv_n'];
$q=0;
if($_POST['zamena']){
$q=1;}
mysql_query("UPDATE peremen SET id_teh='$d9',new_otdel='$d10', id_otv_n='$d11', zamena='$q' WHERE id_zayavka='$d1'")or die(mysql_error());
}
header("location:zayavki.php");}

include("index.inc");
?>
<?
if($_POST['id']){
$z=$_POST['id'];
$result=mysql_query("SELECT * FROM zayavka WHERE id='$z'");
$mass=mysql_fetch_array($result);
?>
<form method="POST" action="update_zayavki.php">
<table>
<INPUT TYPE="hidden" NAME="update_id" value="<? echo $z?>">
<?php
$o=$mass['id_who'];
$otv = mysql_query("SELECT * FROM who WHERE id=$o");
$res = mysql_fetch_array($otv);
?>
<tr><td>От кого</td>
<td><select name="id_who"><?
echo "<option value='$res[id]'>".$res['F']." ".$res['I']." ".$res['O']."</option>";
$otv1 = mysql_query("SELECT * FROM who ORDER BY F");
while($zap=mysql_fetch_array($otv1)){
echo "<option value='$zap[id]'>".$zap['F']." ".$zap['I']." ".$zap['O']."</option>";
}?> </select><a href="insert_who.php">Пользователь</a></td></tr>
<tr><td>Проблемы</td>
<td><input type="textarea" name="problem" size="40" value="<? echo $mass['problem'];?>"></td></tr>
<tr><td>Комментарии</td>
<td><input type="textarea" name="comments" size="40" value="<? echo $mass['comments'];?>"></td></tr>
<tr><td>Исполнитель</td>
<td><input type="text" name="isp" value="<? echo $mass['isp'];?>"></td></tr>
<tr><td>Дата/время исполнения</td>
<td><input type="textarea" name="date_isp" value="<? echo $mass['date_isp'];?>"></td></tr>
<tr><td>Выполнение</td>
<td><input type="checkbox" name="vip" <?  if($mass['vip']){echo "checked";}}?>></td></tr>
</table>
<hr>
<? $rashod=mysql_query("SELECT * FROM zayavka, rashod WHERE rashod.id_zayavka=$z")or die(@mysql_error());
$ras=mysql_fetch_array($rashod);
if($ras){?>
<table>
<?php
$m=$ras['id_mat'];
$mat = mysql_query("SELECT * FROM mat WHERE id='$m'")or die(mysql_error());
$r = mysql_fetch_array($mat);
?>
<tr><td>Материал</td>
<td><select name="id_mat"><?
echo "<option value='$r[id]'>".$r['name']."</option>";
$mat1 = mysql_query("SELECT * FROM mat ORDER BY name");
while($zap1=mysql_fetch_array($mat1)){
echo "<option value='$zap1[id]'>".$zap1['name']."</option>";
}?> </select><a href="insert_mat.php">Материалы</a></td></tr>
<tr><td>Количество</td>
<td><input type="text" name="kol_vo" value="<? echo $ras['kol_vo'];?>"></td></tr>
</table>
<? echo "<hr>";}?>
<? $peremen=mysql_query("SELECT * FROM zayavka, peremen WHERE peremen.id_zayavka=$z")or die(@mysql_error());
$per=mysql_fetch_array($peremen);
if($per){
?>
<table>
<?php
$t=$per['id_teh'];
$teh = mysql_query("SELECT * FROM tehnika WHERE id='$t'")or die(mysql_error());
$r1 = mysql_fetch_array($teh);
?>
<tr><td>Техника</td>
<td><select name="id_teh"><?
echo "<option value='$r1[id]'>".$r1['teh']." ".$r1['model']." ".$r1['inv_number']."</option>";
$per1 = mysql_query("SELECT * FROM tehnika ORDER BY teh");
while($zap2=mysql_fetch_array($per1)){
echo "<option value='$zap2[id]'>".$zap2['teh']." ".$zap2['model']." ".$zap2['inv_number']."</option>";
}?> </select><a href="insert_tehnika.php">Техника</a></td></tr>
<tr><td>Замещение</td><td><input type="checkbox" name="zamena" <?  if($per['zamena']==1){echo "checked"; 
echo"></td></tr>";}else {?>
<tr><td>Отдел</td>
<td><input type="text" name="new_otdel" value="<? echo $per['new_otdel'];?>"></td></tr>
<?php
$otv=$mass['id_otv_n'];
$who= mysql_query("SELECT * FROM who WHERE id=$o");
$w = mysql_fetch_array($who);
?>
<tr><td>Ответственный</td>
<td><select name="id_otv_n"><?
echo "<option value='$w[id]'>".$w['F']." ".$w['I']." ".$w['O']."</option>";
$who1 = mysql_query("SELECT * FROM who ORDER BY F");
while($w1=mysql_fetch_array($who1)){
echo "<option value='$w1[id]'>".$w1['F']." ".$w1['I']." ".$w1['O']."</option>";
}?> </select><a href="insert_who.php">Пользователь</a></td></tr><?}?>

</table>
<?}?>
<table>
<? $s=mysql_query("SELECT * FROM zayavka, soft WHERE soft.id_zayavka=$z")or die(@mysql_error());
$soft=mysql_fetch_array($s);
if($soft){?>
<tr><td>Софт</td>
<td><input type="text" value="<? echo $soft['software'];?>"></td></tr>
</table><?}?>
<table><tr><td><?if ($_SESSION[login]=='admin'){?><input type="submit" value="ОК"><?}?></td><td><a href="zayavki.php">Назад</a></td></tr></table>
</form>

<? include("footer.inc");?>