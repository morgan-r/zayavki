<? session_start();
include("connect.php");
include("index.inc");
?>

<center>
<table class="formvv">
<FORM ACTION="zayavka.php" METHOD="POST">
<tr><td><h4>��������� ������</h4></td></tr>
<?php
$otv = mysql_query("SELECT * FROM who ORDER BY F");
?>
<tr><td>�����������</td>
<td><select name="id_who"><?
do {echo "<option value='$zap[id]'>".$zap['F']." ".$zap['I']." ".$zap['O']."</option>";}
while($zap=mysql_fetch_array($otv));
?> </select><a href="insert_who.php">��������</a></td></tr>
<tr><td>�������� ��������</td>
<td><INPUT TYPE="text" NAME="problem" SIZE="30" MAXLENGTH="100"><p></td></tr>
<tr><td>&nbsp;</td>
<td><INPUT TYPE="submit" VALUE="���������"></td></tr>
<tr><td><a href="index.php">�����</a></td></tr><tr>
<td><INPUT name="work" type="hidden" value="1"></td></tr>
</FORM>
</table></center>
<? include("footer.inc");?>