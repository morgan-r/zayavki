<? 
session_start();
include ("connect.php");
include("index.inc");
if ($_SESSION[login]=='admin'){
function error_message($msg) {
 echo "<html>";
 echo "<script>alert(\"Error: $msg\");history.go(-1)</script>";
 echo "</html>";
 exit;
 }
 function in_use($log)
{
$query = "SELECT login FROM user WHERE login='$log'";
$result = mysql_query($query);
if(!mysql_num_rows($result)){
return 0;
}else{
return 1;
}
}
if($_POST['work']) {
$d1="admin";
$d2=$_POST['surname'];
$d3=$_POST['name'];
$d4=$_POST['login'];
$p=$_POST['password'];
$d5=md5(sha1($p));
$d6=$_POST['dolgnost'];
switch ($d6){
case 1 : $d7="��������� ���";
	break;
case 2 : $d7="��������";
	break;
case 3 : $d7="�������������";
	break;
case 4 : $d7="���������";
	break;
	default : $d7="������������";
}
if(empty($d2)){
error_message("������� �������!");
}
if(empty($d3)){
error_message("������� ���!");
}
if(empty($d4)){
error_message("������� �����! ����� ������������ ����.");
}
if(in_use($d4)){
error_message("����� $d4 ��� ������������. ����������, �������� ������ �����.");
}
if(empty($d5)){
error_message("������� ������! ������ ������������ ����.");
}
mysql_query("INSERT INTO user(surname, name, dolg, login, password, status) 
VALUES('$d2','$d3','$d7','$d4','$d5','$d6')") or die('�� ���� �������� ������������:'.mysql_error());
echo '<center><h3>������� ������� ������ ��� ������������ <?php echo $d6 ?></h3></center>';
?>
<div align="center"><center><table border="1" width="90%">
<tr>
<th width="30%" nowrap>�����</th>
<td width="70%"><?php echo $d4 ?></td>
</tr>
<tr>
<th width="30%" nowrap>�������</TH>
<td width="70%"><?php echo $d2 ?></td>
</tr>
<tr>
<th width="30%" nowrap>���</th>
<td width="70%"><?php echo $d3 ?></td>
</tr>
<tr>
<th width="30%" nowrap>���������</th>
<td width="70%"><?php echo $d7 ?></td>
</tr>
<tr>
<th width="30%" nowrap>������</th>
<td width="70%"><?php echo $d1 ?></td>
</tr>
</table>
</center></div>
<center><a href="login.php">�����������</a></center>
<? 
exit;
}
?>

<center><H3>�������� ������� ������</H3></center>
<table>
<FORM method="post" action="register.php">
<tr><td>�������<sup>*</sup></td>
<td><INPUT TYPE="text" NAME="surname" SIZE="30" MAXLENGTH="25"><p></td></tr>
<tr><td>���<sup>*</sup></td>
<td><INPUT TYPE="text" NAME="name" SIZE="30" MAXLENGTH="15"><p></td></tr>
<tr><td>���������</td>
<td><select name="dolgnost">
<option value="1">��������� ���</option>
<option value="2">��������</option>
<option value="3">�������������</option>
<option value="4">���������</option>
</select></td></tr>
<tr><td>�����<sup>*</sup></td>
<td><INPUT TYPE="text" NAME="login" SIZE="30" MAXLENGTH="15"><p></td></tr>
<tr><td>������<sup>*</sup></td>
<td><INPUT TYPE="password" NAME="password" SIZE="30" MAXLENGTH="15"><p></td></tr>
<tr><td>&nbsp;</td>
<td><INPUT TYPE="submit" VALUE="�����������"></td></tr>
<tr><td><a href="index.php">�����</a></td></tr><tr>
<td><INPUT name="work" type="hidden" value="1"></td></tr>
</FORM>
</table>
<sup>*</sup>-������������ ����
<?
} else{ echo "� ��� ��� ���� ��� ��������� ������ ��������";}
include("footer.inc");?>