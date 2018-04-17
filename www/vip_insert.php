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
mysql_query("INSERT INTO peremen(id_zayavka,id_teh,new_otdel,id_otv_n) VALUE('$d4','$d5','$d6','$d7')")or die(@mysql_error()) ;
}
if($_POST['isp']){
$d8=$_POST['isp'];
$date=date('Y-m-d H:i:s');
if($_POST['vip']){
$d9="1";
$d=$_POST['id_zayavka'];
mysql_query("UPDATE zayavka SET isp='$d8',date_isp='$date',vip='$d9' WHERE id='$d'")or die(@mysql_error());
}
}

$vip=mysql_query("SELECT  zayavka.id as id, date_z,CONCAT(who.F,' ',who.I,' ',who.O) as otv,problem,isp,date_isp,vip
FROM zayavka,who 
WHERE zayavka.id_who=who.id AND vip='1'
ORDER BY date_isp");
?>

<table width="30%" border="1" cellspacing="0" cellpading="30" class="viv">
<tr>
<td>Дата заявки</td>
<td>От кого</td>
<td>Проблемы</td>
<td>Исполнитель</td>
<td>Дата исполнения</td>
<td>Редактировать</td>
<td>Удалить</td>
</tr>
<?
while($mass=mysql_fetch_array($vip)){
echo "<tr>";
echo "<td>".$mass['date_z']."</td>";
echo "<td>".$mass['otv']."</td>";
echo "<td>".$mass['problem']."</td>";
echo "<td>".$mass['isp']."</td>";
echo "<td>".$mass['date_isp']."</td>";
echo "<td><FORM METHOD=POST ACTION=update_zayavki.php><input type=hidden name=id value=".$mass['id']." /><input type=submit value='X' /></FORM></td>";
echo "<td align=center><a href=vip_insert.php?del=$mass[id] \"
onClick=\"return confirm('Вы уверены?');\"><img src='images/close.png' /></a></td>";
echo "</tr>";
}

if (isset($_GET[del])){
$del=$_GET[del];
$e=mysql_query("delete from zayavka where id='$del'") or die (mysql_error());
$q=mysql_query("delete from peremen where id_zayavka='$del'")or die(mysql_error());
$r=mysql_query("delete from rashod where id_zayavka='$del'")or die(mysql_error());
if ($del==true){
echo "Удалили";
}
else {
echo "не удалили";
};
echo "<META HTTP-EQUIV='REFRESH' CONTENT='0.3;URL=vip_insert.php'>";
};
 ?>
</table>
<? include("footer.inc");?>