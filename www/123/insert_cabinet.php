<? session_start(); 
include("connect.php");
if($_POST['work']) 
{ $d1=$_POST['cabinet'];
mysql_query("INSERT INTO auditorium(cabinet) VALUES('$d1')") or die('�� ���� �������� �������:'.mysql_error());
}
?>

<html>
<head><title>���������� ��������</title>
<meta http-equiv="Content-Type" content="text/html; charset=cp-1251">
<link rel="stylesheet" href="css/style.css" type="text/css"></head>
<body>
<table class="formvv">
<FORM ACTION="insert_cabinet.php" METHOD="POST">
<tr><td><h4>�������� ����� �������</h4></td></tr>
<tr><td>�������</td>
<td><INPUT TYPE="text" NAME="cabinet" SIZE="30" MAXLENGTH="4"><p></td></tr>
<tr><td>&nbsp;</td>
<td><INPUT TYPE="submit" VALUE="��������"></td></tr>
<tr><td><a href="index.php">�����</a></td></tr><tr>
<td><INPUT name="work" type="hidden" value="1"></td></tr>
</FORM>
</table>

<?
$cabinet=mysql_query("SELECT * FROM auditorium ORDER BY cabinet");
?>

<table width="30%" border="1" cellspacing="0" cellpading="30" class="viv">
<tr>
<td>�������</td>
<td>�������</td>
</tr>
<?
while($mass=mysql_fetch_array($cabinet)){
echo "<tr>";
echo "<td>".$mass['cabinet']."</td>";
echo "<td align=center><a href=insert_cabinet.php?del=$mass[id] \"
onClick=\"return confirm('�� �������?');\">X</a></td>";
echo "</tr>";
}

if (isset($_GET[del]) ){
$del=$_GET[del];
$e=mysql_query("delete * from auditorium 
where id='$del'") or die (mysql_error() );
if ($del==true){
echo "�������";
}
else {
echo "�� �������";
};
echo "<META HTTP-EQUIV='REFRESH' CONTENT='0.3;URL=insert_cabinet.php'>";
};
 ?>
</table></body></html>