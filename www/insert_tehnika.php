<? session_start();
include("connect.php");
include("index.inc");
if ($_SESSION[login]=='admin'){
if($_POST['work']) 
{ $d1=$_POST['teh'];
$d2=$_POST['model'];
$d3=$_POST['stoimost'];
$d4=$_POST['inv_number'];
$d5=$_POST['id_otv'];
$d6=$_POST['id_otdel'];
mysql_query("INSERT INTO tehnika(teh,model,stoimost,inv_number,id_otv,id_otdel) VALUES('$d1','$d2','$d3','$d4','$d5','$d6')") or die('�� ���� �������� �������:'.@mysql_error());
}
?>

<table class="formvv">
<FORM ACTION="insert_tehnika.php" METHOD="POST">
<tr><td><h4>�������� �������</h4></td></tr>
<tr><td>������</td>
<td><INPUT TYPE="text" NAME="teh" SIZE="30" MAXLENGTH="25"><p></td></tr>
<tr><td>������</td>
<td><INPUT TYPE="text" NAME="model" SIZE="30" MAXLENGTH="40"><p></td></tr>
<tr><td>���������</td>
<td><INPUT TYPE="text" NAME="stoimost" SIZE="30" MAXLENGTH="6"><p></td></tr>
<tr><td>����������� �����</td>
<td><INPUT TYPE="text" NAME="inv_number" SIZE="30" MAXLENGTH="15"><p></td></tr>
<?php
$otv = mysql_query("SELECT * FROM who ORDER BY F");
?>
<tr><td>������������� ����</td>
<td><select name="id_otv"><?
do {echo "<option value='$zap[id]'>".$zap['F']." ".$zap['I']." ".$zap['O']."</option>";}
while($zap=mysql_fetch_array($otv));
?> </select><a href="insert_who.php">������������</a></td></tr>
<tr><td>�������</td>
<td><INPUT TYPE="text" NAME="id_otdel" SIZE="30" MAXLENGTH="3"><p></td></tr>
<tr><td>&nbsp;</td>
<td><INPUT TYPE="submit" VALUE="��������"></td></tr>
<tr><td><a href="index.php">�����</a></td></tr><tr>
<td><INPUT name="work" type="hidden" value="1"></td></tr>
</FORM>
</table>

<?
$teh=mysql_query("SELECT  tehnika.id as id,teh, model, stoimost, inv_number,CONCAT(who.F,' ',who.I,' ',who.O) as otv, id_otdel
FROM tehnika,who 
WHERE tehnika.id_otv=who.id
ORDER BY teh");
?>

<table width="100%" border="1" cellspacing="0" cellpading="30" class="zay">
<tr>
<td>������ �������</td>
<td>������</td>
<td>���������</td>
<td>����������� �����</td>
<td>�������������</td>
<td>�������</td>
<td>�������������</td>
<td>�������</td>
</tr>
<?
while($mass=mysql_fetch_array($teh)){
echo "<tr>";
echo "<td>".$mass['teh']."</td>";
echo "<td>".$mass['model']."</td>";
echo "<td>".$mass['stoimost']."</td>";
echo "<td>".$mass['inv_number']."</td>";
echo "<td>".$mass['otv']."</td>";
echo "<td>".$mass['id_otdel']."</td>";
echo "<td><FORM METHOD=POST ACTION=update_tehnika.php><input type=hidden name=id value=".$mass['id']." /><center><button type='submit'><img src='images/note.png' /></button></center></FORM></td>";
echo "<td align=center><a href=insert_tehnika.php?del=$mass[id] \"
onClick=\"return confirm('�� �������?');\"><img src='images/close.png' /></a></td>";
echo "</tr>";
}

if (isset($_GET[del]) ){
$del=$_GET[del];
$e=mysql_query("delete from tehnika 
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
</table><? 
} else{ echo "� ��� ��� ���� ��� ��������� ������ ��������";}
include("footer.inc");?>