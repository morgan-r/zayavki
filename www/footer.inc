<br><br>
</div>
<div id="news">
			<div class="newsItem">
			<? if($_SESSION['login']){
			echo "Вы вошли как ".$_SESSION['login']."<br>";
			echo "<a href='logout.php'><b>Выход</b></a>";
			}else{ ?>
			<h1>Авторизация пользователя</h1>
<table class="formvv">
<FORM ACTION="login.php" METHOD="POST">
<tr><td>Логин:</td>
<td><INPUT TYPE="text" NAME="login" SIZE="15 px" MAXLENGTH="15"><p></td></tr>
<tr><td>Пароль:</td>
<td><INPUT TYPE="password" NAME="password" SIZE="15 px" MAXLENGTH="15">
<p></td></tr>
<td><INPUT TYPE="submit" VALUE="Войти"></td></tr>
<td><INPUT name="work" type="hidden" value="1"></td></tr>
</FORM>
<tr><td><a href="registration.php">Регистрация</a></td></tr>
</table><? } ?>
			</div>
	</div>
	<div id="footer">
		<span id="copyright">Рафиков Алмаз &copy; 2011
</span>
		<ul>
				<li><a href="index.php">Главная</a></li>
				<li><a href="insert_zayavka.php">Отправить заявку</a></li>
				<li><a href="zayavki.php">Заявки</a></li>
				<?if ($_SESSION[login]=='admin'){?>
				<li><a href="insert_tehnika.php">Техника</a></li>
				<li><a href="insert_mat.php">Расходный материал</a></li>
				<li><a href="peremen.php">Перемещение техники</a></li>
				<li><a href="rashod.php">Расход</a></li>
				<li><a href="soft.php">Софт</a></li><?}?>
				<li><a href="help.php">Справка</a></li>
		</ul>
	</div>
</div>
</body>
</html>