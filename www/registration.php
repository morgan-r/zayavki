<?session_start();
include("index.inc");
include ("connect.php");

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

if($_POST['work']) {
$surname = $_POST['surname'];
$name = $_POST['name'];
$login = $_POST['login'];
$pass = $_POST['password'];
$hash = md5(sha1($pass);
$dep = $_POST['department'];
$post = $_POST['post'];
if (empty($surname)){
error_message("������� ���������� ���� �������!");
}
if (empty($rname)){
error_message("������� ���������� ���� ���!");
}
if (empty($login)){
error_message("������� ���������� ��� �����!");
}
if (in_use($login)){
error_message("����� $login ��� ������������! ���������� �������� ������ �����!");
}
if ((strlen($login)<3)||(strlen($login)>15)){
error_message("����� ������ ������ ���� �� ������ 3 � �� ������ 15 ��������!");
}
if (empty($password)){
error_message("������� ���������� ��� ������!");
}
if ((strlen($password)<6)||(strlen($login)>15)){
error_message("����� ������ ������ ���� �� ������ 3 � �� ������ 15 ��������!");
}
}
?>
<div class="txt">
<p>��������������� �����</p>
<table>
<form method="post" action="registration.php">
<tr><td>�������</td><td><input type="text" name="surname" size="30" maxlength="15" /></td></tr>
<tr><td>���</td><td><input type="text" name="name" size="30" maxlength="10" /></td></tr>
<tr><td>�����</td><td><input type="text" name="login" size="30" maxlength="15" /></td></tr>
<tr><td>������</td><td><input type="password" name="password" size="30" maxlength="15" /></td></tr>
<tr><td>��������� ������</td><td><input input type="password" name="password_2" size="30" maxlength="15" /></td></tr>
<tr><td>�����</td><td><input type="text" name="department" size="30" maxlength="15" /></td></tr>
<tr><td>���������</td><td><input type="text" name="post" size="30" maxlength="15"  /></td></tr>
<tr><td>&nbsp;</td>
<td><INPUT TYPE="submit" VALUE="�����������"></td></tr>
<tr><td><a href="index.php">�����</a></td></tr><tr>
<td><INPUT name="work" type="hidden" value="1"></td></tr>
</form>
</table>
</div>
<? include("footer.inc");?>