<br><br>
</div>
<div id="news">
			<div class="newsItem">
			<? if($_SESSION['login']){
			echo "�� ����� ��� ".$_SESSION['login']."<br>";
			echo "<a href='logout.php'><b>�����</b></a>";
			}else{ ?>
			<h1>����������� ������������</h1>
<table class="formvv">
<FORM ACTION="login.php" METHOD="POST">
<tr><td>�����:</td>
<td><INPUT TYPE="text" NAME="login" SIZE="15 px" MAXLENGTH="15"><p></td></tr>
<tr><td>������:</td>
<td><INPUT TYPE="password" NAME="password" SIZE="15 px" MAXLENGTH="15">
<p></td></tr>
<td><INPUT TYPE="submit" VALUE="�����"></td></tr>
<td><INPUT name="work" type="hidden" value="1"></td></tr>
</FORM>
<tr><td><a href="registration.php">�����������</a></td></tr>
</table><? } ?>
			</div>
	</div>
	<div id="footer">
		<span id="copyright">������� ����� &copy; 2011
</span>
		<ul>
				<li><a href="index.php">�������</a></li>
				<li><a href="insert_zayavka.php">��������� ������</a></li>
				<li><a href="zayavki.php">������</a></li>
				<?if ($_SESSION[login]=='admin'){?>
				<li><a href="insert_tehnika.php">�������</a></li>
				<li><a href="insert_mat.php">��������� ��������</a></li>
				<li><a href="peremen.php">����������� �������</a></li>
				<li><a href="rashod.php">������</a></li>
				<li><a href="soft.php">����</a></li><?}?>
				<li><a href="help.php">�������</a></li>
		</ul>
	</div>
</div>
</body>
</html>