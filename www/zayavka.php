<? session_start();
include("connect.php");
include("index.inc");
if($_POST['work']) 
{ $d1=$_POST['id_who'];
$d2=$_POST['problem'];
$date=date('Y-m-d H:i:s');
@mysql_query("INSERT INTO zayavka(date_z,id_who,problem,vip) VALUES('$date','$d1','$d2','0')") or die('Не могу отправить заявку:'.@mysql_error());
echo"<center><h2>Ваша заявка принята.</h2></center><br>";
echo "<center><img src='images/spinner.gif'></center>";
echo "<META HTTP-EQUIV='REFRESH' CONTENT='1;URL=zayavki.php'>";
include("footer.inc");
}
?>