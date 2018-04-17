<? session_start();
include("connect.php");
if($_POST['work']) 
{ $d1=$_POST['action'];
mysql_query("INSERT INTO actions(action) VALUES('$d1')") or die('Не могу добавить работу:'.mysql_error());
}
?>

<html>
<head><title>Выполняемые работы</title>
<meta http-equiv="Content-Type" content="text/html; charset=cp-1251">
<link rel="stylesheet" href="css/style.css" type="text/css"></head>
<body>
<table class="formvv">
<FORM ACTION="insert_actions.php" METHOD="POST">
<tr><td><h4>Добавить выполняемую работу</h4></td></tr>
<tr><td>Работа</td>
<td><INPUT TYPE="text" NAME="action" SIZE="30" MAXLENGTH="15"><p></td></tr>
<tr><td>&nbsp;</td>
<td><INPUT TYPE="submit" VALUE="Добавить"></td></tr>
<tr><td><a href="index.php">Назад</a></td></tr><tr>
<td><INPUT name="work" type="hidden" value="1"></td></tr>
</FORM>
</table>

<?
$actions=mysql_query("SELECT * FROM actions ORDER BY action");
?>

<table width="30%" border="1" cellspacing="0" cellpading="30" class="viv">
<tr>
<td>Работы</td>
<td>Удалить</td>
</tr>
<?
while($mass=mysql_fetch_array($actions)){
echo "<tr>";
echo "<td>".$mass['action']."</td>";
echo "<td align=center><a href=insert_actions.php?del=$mass[id] \"
onClick=\"return confirm('Вы уверены?');\">X</a></td>";
echo "</tr>";
}

if (isset($_GET[del]) ){
$del=$_GET[del];
$e=mysql_query("delete * from actions 
where id='$del'") or die (mysql_error() );
if ($del==true){
echo "Удалили";
}
else {
echo "не удалили";
};
echo "<META HTTP-EQUIV='REFRESH' CONTENT='0.3;URL=insert_actions.php'>";
};
 ?>
</table></body></html>