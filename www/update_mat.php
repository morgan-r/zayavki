<? session_start();
include("connect.php");
if (isset($_POST['update_id'])){
$d1=$_POST['update_id'];
$d2=$_POST['name'];
$d3=$_POST['price'];
mysql_query("UPDATE mat SET name='$d2',price='$d3' WHERE id='$d1'");
header("location:insert_mat.php");
}
include("index.inc");
?>

<?
if (isset($_POST['id'])){
$matid=$_POST['id'];
$result=mysql_query("SELECT * FROM mat WHERE id=$matid;");
$mass=mysql_fetch_array($result);
?>
<table>
<FORM ACTION="update_mat.php" METHOD="POST">
<INPUT TYPE="hidden" NAME="update_id" SIZE="20"  value="<? echo $matid?>">
<tr><td>Наименование</td>
<td><input type="text" name="name" value="<? echo $mass['name'];?>"></td></tr>
<tr><td>Цена</td>
<td><input type="text" name="price" value="<? echo $mass['price'];}?>"></td></tr>
<tr><td><INPUT TYPE="submit" VALUE="ОК"></td></tr>
<tr><td><button onclick='history.back()'>Назад</button></td></tr>
</FORM>
</table>
<? include("footer.inc");?>