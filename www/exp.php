<? session_start();
include("connect.php");
include("index.inc");
if ($_SESSION[login]=='admin'){
?>
<h1>Экспорт в Excel</h1>
<form method="POST" action="export.php">
 <table border="0" cellpadding="3" cellspacing="1">
            <tr><th align="left">Экспорт</th></tr>
            <tr><td bgcolor="#E5E5E5"><div align="center"><select name="export" size="6" multiple="multiple">
            <option value="nakl">Покупка материалов</option>
            <option value="peremen">Перемещение</option>
            <option value="rashod">Расход</option>
            <option value="soft">Софт</option>
            <option value="tehnika">Техника</option>
            <option value="who">Пользователи</option>
            </select></td><td><input type="submit" value="OK"></td></tr></table></form>
<?
echo "";
} else { echo "У вас нет прав для просмотра данной страницы";}
include("footer.inc");
?>