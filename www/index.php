<?session_start();
include("index.inc");
?>
<ul><? if($_SESSION[login]=='admin'){
	echo "<li><a href=\"insert_mat.php\">��������� ��������</a></li>
	<li><a href=\"insert_tehnika.php\">�������</a></li>
	<li><a href=\"../sxd/\">������� � ����� ������</a></li>
	<li><a href=\"peremen.php\">����������� �������</a></li>
	<li><a href=\"rashod.php\">������ ���������</a></li>
	<li><a href=\"register.php\">���������������� �����������</a></li>
	<li><a href=\"exp.php\">������� � Excel</a></li>";}?>
	<li><a href="insert_zayavka.php">��������� ������</a></li>
	<li><a href="zayavki.php">�������� ������</a></li>
	<li><a href="insert_who.php">������������</a></li>
</ul>

<? include("footer.inc");?>