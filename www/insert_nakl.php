<? session_start();
include("connect.php");
include("index.inc");
if ($_SESSION[login]=='admin'){
if($_POST['work']) 
{ $d1=$_POST['nakl'];
$d2=$_POST['id_mat'];
$d3=$_POST['kol_vo'];
mysql_query("INSERT INTO naklr(nakl,id_mat,kol_vo) VALUES('$d1','$d2','$d3')") or die('�� ���� �������� ��������:'.mysql_error());
}
?>
<table class="formvv">
<FORM ACTION="insert_nakl.php" METHOD="POST">
<tr><td><h4>������� ���������� ���������</h4></td></tr>
<tr><td>����� ���������</td>
<td><INPUT TYPE="text" NAME="nakl" SIZE="30" MAXLENGTH="7"><p></td></tr>
<?php
$mat = mysql_query("SELECT * FROM mat ORDER BY name");
?>
<tr><td>��������� ��������</td>
<td><select name="id_mat"><?
do {echo "<option value='$zap[id]'>".$zap['name']."</option>";}
while($zap=mysql_fetch_array($mat));
?> </select><a href="insert_mat.php"> ��������� ���������</a></td></tr>
<tr><td>���-��</td>
<td><INPUT TYPE="text" NAME="kol_vo" SIZE="30" MAXLENGTH="5"><p></td></tr>
<tr><td>&nbsp;</td>
<td><INPUT TYPE="submit" VALUE="��������"></td></tr>
<tr><td><a href="index.php">�����</a></td></tr><tr>
<td><INPUT name="work" type="hidden" value="1"></td></tr>
</FORM>
</table>

<?
$mat=mysql_query("SELECT naklr.id as id, nakl, mat.name as mat, naklr.kol_vo as kol_vo FROM naklr, mat 
WHERE mat.id=naklr.id_mat
ORDER BY name");
?>

<table width="50%" border="1" cellspacing="0" cellpading="30" class="zay">
<tr>
<td>����� ���������</td>
<td>��������</td>
<td>���-��</td><!--
<td>�������������</td>-->
<td>�������</td>
</tr>
<?
while($mass=mysql_fetch_array($mat)){
echo "<tr>";
echo "<td>".$mass['nakl']."</td>";
echo"<td>".$mass['mat']."</td>";
echo"<td>".$mass['kol_vo']."</td>";
/*echo "<td><FORM METHOD=POST ACTION=update_nakl.php><input type=hidden name=id value=".$mass['id']." /><center><button type='submit'><img src='images/note.png' /></button></center></FORM></td>";*/
echo "<td align=center><a href=insert_nakl.php?del=$mass[id] \"
onClick=\"return confirm('�� �������?');\"><img src='images/close.png' /></a></td>";
echo "</tr>";
}

if (isset($_GET[del]) ){
$del=$_GET[del];
$e=mysql_query("delete from naklr 
where id='$del'") or die (mysql_error() );
if ($del==true){
echo "�������";
}
else {
echo "�� �������";
};
echo "<META HTTP-EQUIV='REFRESH' CONTENT='0.3;URL=insert_nakl.php'>";
};
 ?>
</table>
<?} else { echo "� ��� ��� ���� ��� ��������� ������ ��������";}?>
<? include("footer.inc");?>