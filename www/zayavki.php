<? session_start();
include("connect.php");
include("index.inc");
if($_POST['rashod']){
$d1=$_POST['id_mat'];
$d2=$_POST['kol_vo'];
$d3=$_POST['id_zayavka'];
mysql_query("INSERT INTO rashod(id_mat,kol_vo,id_zayavka) VALUE('$d1','$d2','$d3')")or die(@mysql_error());
}
if($_POST['tehnika']){
$d4=$_POST['id_zayavka'];
$d5=$_POST['id_teh'];
$d6=$_POST['new_otdel'];
$d7=$_POST['id_otv_n'];
$e=0;
if($_POST['zamena']){
$e=1;}
mysql_query("INSERT INTO peremen(id_zayavka,id_teh,new_otdel,id_otv_n,zamena) VALUE('$d4','$d5','$d6','$d7','$e')")or die(@mysql_error()) ;
}
if($_POST['soft']){
$s=$_POST['id_zayavka'];
$s1=$_POST['software'];
mysql_query("INSERT INTO soft(id_zayavka, software) VALUE('$s','$s1')")or die(@mysql_error());
}
if($_POST['isp']){
$d8=$_POST['isp'];
$d9=$_POST['comments'];
$date=date('Y-m-d H:i:s');
$d=$_POST['id_zayavka'];
mysql_query("UPDATE zayavka SET isp='$d8',date_isp='$date', comments='$d9' WHERE id='$d'")or die(@mysql_error());
}
/*
$res=mysql_query("SELECT zayavka.id as id, zayavka.date_z as d_z, CONCAT(who.F,' ',who.I,' ',who.O) as who, problem, vip
FROM zayavka, who 
WHERE zayavka.id_who=who.id
ORDER BY d_z DESC
LIMIT 0, 20");*/

/*-----------Поиск-----------*/
$sel="SELECT zayavka.id as id, zayavka.date_z as d_z, CONCAT(who.F,' ',who.I,' ',who.O) as who, problem, vip
FROM zayavka, who 
WHERE zayavka.id_who=who.id";
/*-----По заявщику-----*/
if(!empty($_POST['f'])){
$f=$_POST['f'];
$sel.=" AND who.id='$f' ";
}
/*-----По датам-----*/
if((!empty($_POST['dz_1']))||(!empty($_POST['dz_2']))){
$dz_1=$_POST['dz_1']." 00:00:00";
$dz_2=$_POST['dz_2']." 23:59:59";
$sel.=" AND date_z>='$dz_1' AND date_z<='$dz_2'";
}
if(!empty($_POST['ispolnitel'])){
$isp=$_POST['ispolnitel'];
$sel.=" AND isp REGEXP '$isp' ";
}
$sel.=" order by date_z DESC";
if(empty($_POST['f']) && empty($_POST['dz_1']) && empty($_POST['dz_2'])&& empty($_POST['ispolnitel'])){
$sel.=" LIMIT 0, 20";
}
$res=mysql_query($sel);
?>
<form method="post" action="zayavki.php">
<table>
<tr><td>Исполнитель</td>
<td><input type="text" name="ispolnitel" <? if(isset($_POST['ispolnitel'])){
 echo "value=".$_POST['ispolnitel']; }?>></td></tr>
<?php
$otv = mysql_query("SELECT * FROM who ORDER BY F");
?>
<tr><td>Отправитель</td>
<td><select name="f"><?
do {echo "<option value='$zap[id]'>".$zap['F']." ".$zap['I']." ".$zap['O']."</option>";}
while($zap=mysql_fetch_array($otv));
?> </select></td></tr>
<tr><td>C:</td>
<td><input type="text" name="dz_1" maxlength="10" id="startDate" <? if(isset($_POST['dz_1'])){
 echo "value=".$_POST['dz_1']; }?>></td></tr>
<tr><td>По:</td>
<td><input type="text" name="dz_2" maxlength="10" id="endDate" <? if(isset($_POST['dz_2'])){
 echo "value=".$_POST['dz_2']; }?>></td></tr>
<tr><td>&nbsp;</td>
<td><input type="submit" value="Поиск"></td></tr>
</table></form>
По запросу найдено <? echo mysql_num_rows($res);?> записей.
<table>
<tr><td></td></tr>
</table>
<table border="1" cellspacing="0" width="100%" class="zay">
<tr><td>Дата заявки</td>
<td>От кого</td>
<td>Описание проблемы</td>
<td>Подтвердить выполнение</td>
<?if ($_SESSION[login]=='admin'){?>
<td>Записать</td><?}?>
<td>Просмотр</td><?if ($_SESSION[login]=='admin'){?>
<td>Удалить</td><?}?>
</tr>
<? while($mass=mysql_fetch_array($res)){
echo "<tr><FORM method='POST' action='vip.php'>";
echo "<input type='hidden' name='id' value='".$mass['id']."'/>";
echo "<td>".$mass['d_z']."</td>";
echo "<td>".$mass['who']."</td>";
echo "<td>".$mass['problem']."</td>";
if ($mass['vip']==1){
echo "<td><center><img src='images/ok.png'></center></td>";}else{
echo "<td><center><a href='zayavki.php?vip=$mass[id]' onClick=\"return confirm('Заявка точно выполнена?');\"><img src='images/vip.png'></a></center</td>";}
if ($_SESSION[login]=='admin'){
echo "<td><center><button type='submit'><img src='images/note.png' /></button></center></td>";}
echo "</form><FORM METHOD=POST ACTION=update_zayavki.php>";
echo "<td><input type=hidden name=id value=".$mass['id']." /><center><button type='submit'><img src='images/pro.png'></button></center></FORM></td>";
if ($_SESSION[login]=='admin'){
echo "<td align=center><a href=zayavki.php?del=$mass[id] \"
onClick=\"return confirm('Вы уверены?');\"><img src='images/close.png' /></a></td>";}
echo "</tr>";
}
if (isset($_GET['del'])){
$del=$_GET['del'];
$e=mysql_query("delete from zayavka where id='$del'") or die (@mysql_error());
$q=mysql_query("delete from peremen where id_zayavka='$del'")or die(@mysql_error());
$r=mysql_query("delete from rashod where id_zayavka='$del'")or die(@mysql_error());
$soft=mysql_query("delete from soft where id_zayavka='$del'")or die(@mysql_error());
if ($del==true){
echo "Удалили";
}
else {
echo "не удалили";
};
echo "<META HTTP-EQUIV='REFRESH' CONTENT='0.3;URL=zayavki.php'>";
};
if (isset($_GET['vip'])){
$vip=$_GET['vip'];
$query=mysql_query("UPDATE zayavka SET vip='1' WHERE id='$vip'")or die(mysql_error());
if($query){
echo "<META HTTP-EQUIV='REFRESH' CONTENT='0.3;URL=zayavki.php'>";
}else{
echo "Что то не так!";
}
}
?>
</table>
<? include("footer.inc");?>