<? session_start();
include("connect.php");
include("index.inc");
if ($_SESSION[login]=='admin'){
$res="SELECT zayavka.date_isp as d, soft.software as s, zayavka.comments as c, CONCAT(who.F,' ',who.I,' ',who.O) as who
FROM zayavka, soft, who
WHERE soft.id_zayavka=zayavka.id AND who.id=zayavka.id_who ";
if(!empty($_POST['who'])){
$who=$_POST['who'];
$res.=" AND who.id='$who' ";
}
if(!empty($_POST['date_1'])||!empty($_POST['date_2'])){
$date_1=$_POST['date_1']." 00:00:00";
$date_2=$_POST['date_2']." 23:59:59";
$res.=" AND zayavka.date_isp BETWEEN '$date_1' AND '$date_2'
order by date_isp";}else{
$res.=" order by date_isp DESC LIMIT 0, 20";
}
$s=mysql_query($res)or die(@mysql_error());
?>
<form method="post" action="soft.php">
<table>
 <?php
$wh= mysql_query("SELECT * FROM who order by F");
?>
<tr><td>����</td>
<td><select name="who"><?
do {echo "<option value='$w[id]'>".$w['F']." ".$w['I']." ".$w['O']."</option>";} 
while($w=mysql_fetch_array($wh))?> </select></td></tr>
<tr><td>C:</td>
<td><input type="text" name="date_1" maxlength="10" id="startDate" <? if(isset($_POST['date_1'])){
 echo "value=".$_POST['date_1']; }?>></td></tr>
<tr><td>��:</td>
<td><input type="text" name="date_2" maxlength="10" id="endDate" <? if(isset($_POST['date_2'])){
 echo "value=".$_POST['date_2']; }?>></td></tr>
<tr><td>&nbsp;</td>
<td><input type="submit" value="�����"></td></tr>
</table></form>
<table border="1" cellspacing="0">
<tr>
<td>���� ����������</td>
<td>���� (���������, ���������, ��������,)</td>
<td>�����������</td>
<td>����</td>
</tr>
<?
while($mass=mysql_fetch_array($s)){
echo "<tr>";
echo "<td>".$mass['d']."</td>";
echo "<td>".$mass['s']."</td>";
echo "<td>".$mass['c']."</td>";
echo "<td>".$mass['who']."</td>";
echo "</tr>";
}?>
</table>
<a href="index.php">�� �������</a>
<? 
} else{ echo "� ��� ��� ���� ��� ��������� ������ ��������";}
include("footer.inc");?>