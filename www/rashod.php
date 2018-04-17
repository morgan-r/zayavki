<? session_start();
include("connect.php");
include("index.inc");
if ($_SESSION[login]=='admin'){
$res="SELECT zayavka.date_isp as d, mat.name as mat, rashod.kol_vo
FROM zayavka, mat, rashod
WHERE rashod.id_zayavka=zayavka.id AND rashod.id_mat=mat.id";
if(isset($_POST['date_1'])||isset($_POST['date_2'])){
$date_1=$_POST['date_1']." 00:00:00";
$date_2=$_POST['date_2']." 23:59:59";
$res.=" AND zayavka.date_isp BETWEEN '$date_1' AND '$date_2'
order by date_isp DESC";}else{
$res.=" order by date_isp DESC LIMIT 0, 40";
}
$result=mysql_query($res)or die(@mysql_error());
?>
<a href="rashod_sum.php">Общая сумма оставшегося расходного материала</a>
<form method="post" action="rashod.php">
<table>
<tr><td>C:</td>
<td><input type="text" name="date_1" maxlength="10" id="startDate" <? if(isset($_POST['date_1'])){
 echo "value=".$_POST['date_1']; }?>></td></tr>
<tr><td>По:</td>
<td><input type="text" name="date_2" maxlength="10" id="endDate" <? if(isset($_POST['date_2'])){
 echo "value=".$_POST['date_2']; }?>></td></tr>
<tr><td>&nbsp;</td>
<td><input type="submit" value="Поиск"></td></tr>
</table></form>
<table border="1" cellspacing="0">
<tr>
<td>Дата исполнения</td>
<td>Материал</td>
<td>Количество</td>
</tr>
<?
while($mass=mysql_fetch_array($result)){
echo "<tr>";
echo "<td>".$mass['d']."</td>";
echo "<td>".$mass['mat']."</td>";
echo "<td>".$mass['kol_vo']."</td>";
echo "</tr>";
}?>
</table><a href="index.php">На главную</a>
<? 
} else{ echo "У вас нет прав для просмотра данной страницы";}
include("footer.inc");?>