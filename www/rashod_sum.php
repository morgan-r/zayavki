<? session_start();
include "connect.php";
include "index.inc";
if ($_SESSION[login]=='admin'){
$sql = "SELECT mat.name as mat, SUM(naklr.kol_vo-rashod.kol_vo) as rashod 
FROM rashod, mat, naklr 
WHERE mat.id=naklr.id_mat AND mat.id=rashod.id_mat 
GROUP BY mat.name";
$res=mysql_query($sql);
?>
<table border="1" cellspacing="0">
<tr>
<td>Материал</td>
<td>Количество</td>
<td>Необходимость покупки</td>
</tr>
<?
while($mass=mysql_fetch_array($res)){
echo "<tr>";
echo "<td>".$mass['mat']."</td>";
echo "<td>".$mass['rashod']."</td>";
if ($mass['rashod']<=3){
echo "<td>Да</td>";
} else{echo "<td>Нет</td>";}
echo "</tr>";
}?>
</table><a href="index.php">На главную</a>
<? 
} else{ echo "У вас нет прав для просмотра данной страницы";}
include("footer.inc");?>