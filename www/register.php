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
case 1 : $d7="Начальник ИКТ";
	break;
case 2 : $d7="Лаборант";
	break;
case 3 : $d7="Преподаватель";
	break;
case 4 : $d7="Бухгалтер";
	break;
	default : $d7="Пользователь";
}
if(empty($d2)){
error_message("Введите фамилию!");
}
if(empty($d3)){
error_message("Введите имя!");
}
if(empty($d4)){
error_message("Введите логин! Логин обязательное поле.");
}
if(in_use($d4)){
error_message("Логин $d4 уже используется. Пожалуйста, выберите другой логин.");
}
if(empty($d5)){
error_message("Введите пароль! Пароль обязательное поле.");
}
mysql_query("INSERT INTO user(surname, name, dolg, login, password, status) 
VALUES('$d2','$d3','$d7','$d4','$d5','$d6')") or die('Не могу добавить пользователя:'.mysql_error());
echo '<center><h3>Создана учетная запись для пользователя <?php echo $d6 ?></h3></center>';
?>
<div align="center"><center><table border="1" width="90%">
<tr>
<th width="30%" nowrap>Логин</th>
<td width="70%"><?php echo $d4 ?></td>
</tr>
<tr>
<th width="30%" nowrap>Фамилия</TH>
<td width="70%"><?php echo $d2 ?></td>
</tr>
<tr>
<th width="30%" nowrap>Имя</th>
<td width="70%"><?php echo $d3 ?></td>
</tr>
<tr>
<th width="30%" nowrap>Должность</th>
<td width="70%"><?php echo $d7 ?></td>
</tr>
<tr>
<th width="30%" nowrap>Статус</th>
<td width="70%"><?php echo $d1 ?></td>
</tr>
</table>
</center></div>
<center><a href="login.php">Авторизация</a></center>
<? 
exit;
}
?>

<center><H3>Создание учетной записи</H3></center>
<table>
<FORM method="post" action="register.php">
<tr><td>Фамилия<sup>*</sup></td>
<td><INPUT TYPE="text" NAME="surname" SIZE="30" MAXLENGTH="25"><p></td></tr>
<tr><td>Имя<sup>*</sup></td>
<td><INPUT TYPE="text" NAME="name" SIZE="30" MAXLENGTH="15"><p></td></tr>
<tr><td>Должность</td>
<td><select name="dolgnost">
<option value="1">Начальник ИКТ</option>
<option value="2">Лаборант</option>
<option value="3">Преподаватель</option>
<option value="4">Бухгалтер</option>
</select></td></tr>
<tr><td>Логин<sup>*</sup></td>
<td><INPUT TYPE="text" NAME="login" SIZE="30" MAXLENGTH="15"><p></td></tr>
<tr><td>Пароль<sup>*</sup></td>
<td><INPUT TYPE="password" NAME="password" SIZE="30" MAXLENGTH="15"><p></td></tr>
<tr><td>&nbsp;</td>
<td><INPUT TYPE="submit" VALUE="Регистрация"></td></tr>
<tr><td><a href="index.php">Назад</a></td></tr><tr>
<td><INPUT name="work" type="hidden" value="1"></td></tr>
</FORM>
</table>
<sup>*</sup>-Обязательные поля
<?
} else{ echo "У вас нет прав для просмотра данной страницы";}
include("footer.inc");?>