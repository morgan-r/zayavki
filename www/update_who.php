<? session_start();
include("connect.php");
if (isset($_POST['update_id'])){
$d1=$_POST['update_id'];
$d2=$_POST['F'];
$d3=$_POST['I'];
$d4=$_POST['O'];
$d5=$_POST['otdel'];
mysql_query("UPDATE who SET F='$d2',I='$d3',O='$d4',otdel='$d5' WHERE id='$d1'");
header("location:insert_who.php");
}
include("index.inc");
?>
<?
if (isset($_POST['id'])){
$whoid=$_POST['id'];
$result=mysql_query("SELECT * FROM who WHERE id=$whoid;");
$mass=mysql_fetch_array($result);
?>
<table>
<FORM ACTION="update_who.php" METHOD="POST">
<INPUT TYPE="hidden" NAME="update_id" SIZE="20"  value="<? echo $whoid?>">
<tr><td>Фамилия</td>
<td><input type="text" name="F" value="<? echo $mass['F'];?>"></td></tr>
<tr><td>Имя</td>
<td><input type="text" name="I" value="<? echo $mass['I'];?>"></td></tr>
<tr><td>Отчество</td>
<td><input type="text" name="O" value="<? echo $mass['O'];?>"></td></tr>
<tr><td>Отдел</td>
<td><input type="text" name="otdel" value="<? echo $mass['otdel'];}?>"></td></tr>
<tr><td><INPUT TYPE="submit" VALUE="ОК"></td></tr>
<tr><td><button onclick='history.back()'>Назад</button></td></tr>
</FORM>
</table>
<? include("footer.inc");?>