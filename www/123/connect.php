<? $link = @mysql_connect('localhost','root','')or die('Не могу соединиться с mysql-сервером:'.mysql_error());
@mysql_select_db('zayavki')or die('Не могу подключиться к базе:'.mysql_error());?>