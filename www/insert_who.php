<? session_start();
include("connect.php");
include("index.inc");
if($_POST['work']){
$d1=$_POST['F'];
$d2=$_POST['I'];
$d3=$_POST['O'];
$d4=$_POST['otdel'];
mysql_query("INSERT INTO who(F,I,O,otdel) VALUES('$d1','$d2','$d3','$d4')") or die('Не могу добавить пользователя:'.mysql_error());
}
?>

<table class="formvv">
<FORM ACTION="insert_who.php" METHOD="POST">
<tr><td><h4>Добавить нового пользователя</h4></td></tr>
<tr><td>Фамилия</td>
<td><INPUT TYPE="text" NAME="F" SIZE="30" MAXLENGTH="25"><p></td></tr>
<tr><td>Имя</td>
<td><INPUT TYPE="text" NAME="I" SIZE="30" MAXLENGTH="15"><p></td></tr>
<tr><td>Отчество</td>
<td><INPUT TYPE="text" NAME="O" SIZE="30" MAXLENGTH="25"><p></td></tr>
<tr><td>Кабинет</td>
<td><INPUT TYPE="text" NAME="otdel" SIZE="30" MAXLENGTH="3"><p></td></tr>
<tr><td>&nbsp;</td>
<td><INPUT TYPE="submit" VALUE="Добавить"></td></tr>
<tr><td><a href="index.php">Назад</a></td></tr><tr>
<td><INPUT name="work" type="hidden" value="1"></td></tr>
</FORM>
</table>

<?
$who=mysql_query("SELECT * FROM who ORDER BY F");
?>

<table width="70%" border="1" cellspacing="0" cellpading="30" class="viv">
<tr>
<td>Пользователь</td>
<td>Кабинет</td>
<?if ($_SESSION[login]=='admin'){?>
<td>Редактировать</td>
<td>Удалить</td><?}?>
</tr>
<?
while($mass=mysql_fetch_array($who)){
echo "<tr>";
echo "<td>".$mass['F']." ".$mass['I']." ".$mass['O']."</td>";
echo"<td>".$mass['otdel']."</td>";
if ($_SESSION[login]=='admin'){
echo "<td><FORM METHOD=POST ACTION=update_who.php><input type=hidden name=id value=".$mass['id']." /><button type='submit'><img src='images/note.png' /></button></FORM></td>";
echo "<td align=center><a href=insert_who.php?del=$mass[id] \"
onClick=\"return confirm('Вы уверены?');\"><img src='images/close.png' /></a></td>";}
echo "</tr>";
}

if (isset($_GET[del]) ){
$del=$_GET[del];
$e=mysql_query("delete from who 
where id='$del'") or die (mysql_error() );
if ($del==true){
echo "Удалили";
}
else {
echo "не удалили";
};
echo "<META HTTP-EQUIV='REFRESH' CONTENT='0.3;URL=insert_who.php'>";
};
 ?>
</table>
<? include("footer.inc");?>