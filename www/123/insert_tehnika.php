<? session_start();
include("connect.php");
if($_POST['work']) 
{ $d1=$_POST['name'];
$d2=$_POST['price'];
mysql_query("INSERT INTO tehnika(name,price) VALUES('$d1','$d2')") or die('�� ���� �������� ����� �������:'.mysql_error());
}
?>

<html>
<head><title>�������</title>
<meta http-equiv="Content-Type" content="text/html; charset=cp-1251">
<link rel="stylesheet" href="css/style.css" type="text/css"></head>
<body>
<table class="formvv">
<FORM ACTION="insert_tehnika.php" METHOD="POST">
<tr><td><h4>�������� ����� �������</h4></td></tr>
<tr><td>������������</td>
<td><INPUT TYPE="text" NAME="name" SIZE="30" MAXLENGTH="50"><p></td></tr>
<tr><td>��������� ��� �������</td>
<td><INPUT TYPE="text" NAME="price" SIZE="30" MAXLENGTH="5"><p></td></tr>
<tr><td>&nbsp;</td>
<td><INPUT TYPE="submit" VALUE="��������"></td></tr>
<tr><td><a href="index.php">�����</a></td></tr><tr>
<td><INPUT name="work" type="hidden" value="1"></td></tr>
</FORM>
</table>

<?
$tehnika=mysql_query("SELECT name,price FROM tehnika ORDER BY name");
?>

<table width="30%" border="1" cellspacing="0" cellpading="30" class="viv">
<tr>
<td>������������</td>
<td>��������� ��� �������</td>
<td>�������</td>
</tr>
<?
while($mass=mysql_fetch_array($tehnika)){
echo "<tr>";
echo "<td>".$mass['name']."</td>";
echo "<td>".$mass['price']."</td>";
echo "<td align=center><a href=insert_tehnika.php?del=$mass[id] \"
onClick=\"return confirm('�� �������?');\">X</a></td>";
echo "</tr>";
}

if (isset($_GET[del]) ){
$del=$_GET[del];
$e=mysql_query("delete * from tehnika 
where id='$del'") or die (mysql_error() );
if ($del==true){
echo "�������";
}
else {
echo "�� �������";
};
echo "<META HTTP-EQUIV='REFRESH' CONTENT='0.3;URL=insert_tehnika.php'>";
};
 ?>
</table></body></html>