<?session_start();
include("index.inc");
?>
<ul><? if($_SESSION[login]=='admin'){
	echo "<li><a href=\"insert_mat.php\">Расходный материал</a></li>
	<li><a href=\"insert_tehnika.php\">Техника</a></li>
	<li><a href=\"../sxd/\">Дествия с Базой Данных</a></li>
	<li><a href=\"peremen.php\">Перемещение техники</a></li>
	<li><a href=\"rashod.php\">Расход материала</a></li>
	<li><a href=\"register.php\">Зарегистрировать исполнителя</a></li>
	<li><a href=\"exp.php\">Экспорт в Excel</a></li>";}?>
	<li><a href="insert_zayavka.php">Отправить заявку</a></li>
	<li><a href="zayavki.php">Просмотр заявок</a></li>
	<li><a href="insert_who.php">Пользователи</a></li>
</ul>

<? include("footer.inc");?>