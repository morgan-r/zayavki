<? session_start();
include("connect.php");
include("index.inc");
if ($_SESSION[login]=='admin'){
?>
<h1>������� � Excel</h1>
<form method="POST" action="export.php">
 <table border="0" cellpadding="3" cellspacing="1">
            <tr><th align="left">�������</th></tr>
            <tr><td bgcolor="#E5E5E5"><div align="center"><select name="export" size="6" multiple="multiple">
            <option value="nakl">������� ����������</option>
            <option value="peremen">�����������</option>
            <option value="rashod">������</option>
            <option value="soft">����</option>
            <option value="tehnika">�������</option>
            <option value="who">������������</option>
            </select></td><td><input type="submit" value="OK"></td></tr></table></form>
<?
echo "";
} else { echo "� ��� ��� ���� ��� ��������� ������ ��������";}
include("footer.inc");
?>