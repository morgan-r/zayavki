<? session_start();
include("connect.php");
if($_POST['work']) 
{ $d1=$_POST['fio'];
mysql_query("INSERT INTO who(fio) VALUES('$d1')") or die('�� ���� �������� ������������:'.mysql_error());
}
?>

<html>
<head><title>�� ����</title>
<meta http-equiv="Content-Type" content="text/html; charset=cp-1251">
<link rel="stylesheet" href="css/style.css" type="text/css"></head>
<body>
<table class="formvv">
<FORM ACTION="insert_who.php" METHOD="POST">
<tr><td><h4>�������� ������ ������������</h4></td></tr>
<tr><td>������������</td>
<td><INPUT TYPE="text" NAME="fio" SIZE="30" MAXLENGTH="40"><p></td></tr>
<tr><td>&nbsp;</td>
<td><INPUT TYPE="submit" VALUE="��������"></td></tr>
<tr><td><a href="index.php">�����</a></td></tr><tr>
<td><INPUT name="work" type="hidden" value="1"></td></tr>
</FORM>
</table>

<?
$who=mysql_query("SELECT * FROM who ORDER BY fio");
?>

<table width="30%" border="1" cellspacing="0" cellpading="30" class="viv">
<tr>
<td>������������</td>
<td>�������������</td>
<td>�������</td>
</tr>
<?
while($mass=mysql_fetch_array($who)){
echo "<tr>";
echo "<td>".$mass['fio']."</td>";
echo "<td><FORM METHOD=POST ACTION=update_who.php><input type=hidden name=id value=".$mass['id']." /><input type=submit value=X /></FORM></td>";
echo "<td align=center><a href=insert_who.php?del=$mass[id] \"
onClick=\"return confirm('�� �������?');\">X</a></td>";
echo "</tr>";
}

if (isset($_GET[del]) ){
$del=$_GET[del];
$e=mysql_query("delete * from who 
where id='$del'") or die (mysql_error() );
if ($del==true){
echo "�������";
}
else {
echo "�� �������";
};
echo "<META HTTP-EQUIV='REFRESH' CONTENT='0.3;URL=insert_who.php'>";
};
 ?>
</table></body></html>