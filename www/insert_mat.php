<? session_start();
include("connect.php");
include("index.inc");
if ($_SESSION[login]=='admin'){
if($_POST['work']) 
{ $d1=$_POST['name'];
$d2=$_POST['price'];
mysql_query("INSERT INTO mat(name, price) VALUES('$d1','$d2')") or die('�� ���� �������� ��������:'.mysql_error());
}
?>

<table class="formvv">
<FORM ACTION="insert_mat.php" METHOD="POST">
<tr><td><h4>�������� ��������� ��������</h4></td></tr>
<tr><td>������������</td>
<td><INPUT TYPE="text" NAME="name" SIZE="30" MAXLENGTH="30"><p></td></tr>
<tr><td>����</td>
<td><INPUT TYPE="text" NAME="price" SIZE="30" MAXLENGTH="5"><p></td></tr>
<tr><td>&nbsp;</td>
<td><INPUT TYPE="submit" VALUE="��������"></td></tr>
<tr><td><a href="index.php">�����</a></td></tr><tr>
<td><INPUT name="work" type="hidden" value="1"></td></tr>
</FORM>
</table>

<?
$mat=mysql_query("SELECT * FROM mat ORDER BY name");
?>

<table width="30%" border="1" cellspacing="0" cellpading="30" class="zay">
<tr>
<td>������������</td>
<td>����</td>
<td>�������������</td>
<td>�������</td>
</tr>
<?
while($mass=mysql_fetch_array($mat)){
echo "<tr>";
echo "<td>".$mass['name']."</td>";
echo"<td>".$mass['price']."</td>";
echo "<td><FORM METHOD=POST ACTION=update_mat.php><input type=hidden name=id value=".$mass['id']." /><center><button type='submit'><img src='images/note.png' /></button></center></FORM></td>";
echo "<td align=center><a href=insert_mat.php?del=$mass[id] \"
onClick=\"return confirm('�� �������?');\"><img src='images/close.png' /></a></td>";
echo "</tr>";
}

if (isset($_GET[del]) ){
$del=$_GET[del];
$e=mysql_query("delete from mat 
where id='$del'") or die (mysql_error() );
if ($del==true){
echo "�������";
}
else {
echo "�� �������";
};
echo "<META HTTP-EQUIV='REFRESH' CONTENT='0.3;URL=insert_mat.php'>";
};
 ?>
</table><? 
} else{ echo "� ��� ��� ���� ��� ��������� ������ ��������";}
include("footer.inc");?>