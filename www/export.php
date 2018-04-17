<?php
@session_start();
include ("connect.php");

header('Content-Type: text/html; charset=windows-1251');
header('P3P: CP="NOI ADM DEV PSAi COM NAV OUR OTRo STP IND DEM"');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
header('Content-transfer-encoding: binary');
header('Content-Disposition: attachment; filename=table.xls');
header('Content-Type: application/x-unknown');
?>

<?
if(isset($_POST['export'])){
$export=$_POST['export'];
switch($export) {
####################### who ##############################
	case 'who':
		$z1=mysql_query("SELECT * FROM who");
		echo "<table width=300 border=1 bordercolor=black><tr>
		<td bordercolor=black>Фамилия</td>
		<td>Имя</td>
		<td>Отчество</td>
		<td>Отдел</td>
		</tr></table>
		<table><tr><td></td><td></td><td></td><td></td></tr></table>";
		while ($res=mysql_fetch_array($z1, MYSQL_ASSOC))
		{
		echo "<table width=300 border=1 bordercolor=black>
		</td><td>{$res[F]}</td>
		<td>{$res[I]}</td>
		<td>{$res[O]}</td>
		<td>{$res[otdel]}</td></tr>
		</table>";
	}
	break;
###################### peremen ############################
	case 'peremen':
		$z2=mysql_query("SELECT zayavka.date_isp as d, tehnika.teh as teh, tehnika.model as model, new_otdel, CONCAT(who.F,' ',who.I,' ',who.O) as otv, peremen.zamena as zam
		FROM zayavka, tehnika, who RIGHT JOIN peremen ON peremen.id_otv_n=who.id
		WHERE peremen.id_zayavka=zayavka.id AND peremen.id_teh=tehnika.id 
		order by date_isp DESC");
		echo "<table border=1 width=780 bordercolor=black><tr>
		<td>Дата</td>
		<td>Teхника</td>
		<td>Модель</td>
		<td>Отдел</td>
		<td>Ответсвенный</td>
		<td>Перемещение/замена</td></tr></table>
		<table><tr><td></td><td></td><td></td><td></td><td></td><td></td></tr></table>";
		while ($res=mysql_fetch_array($z2)){
		echo "<table width=780 border=1 bordercolor=black>
		<tr>
		<td>{$res['d']}</td>
		<td>{$res['teh']}</td>
		<td>{$res['model']}</td>
		<td>{$res['new_otdel']}</td>
		<td>{$res['otv']}</td>
		<td>{$res['zam']}</td>
		</tr></table>";
		}
		break;
######################### rashod ##########################
		case 'rashod':
		$z3=mysql_query("SELECT zayavka.date_isp as d, mat.name as mat, rashod.kol_vo, CONCAT(who.F,' ',who.I,' ',who.O) as who
		FROM zayavka, mat, rashod, who
		WHERE rashod.id_zayavka=zayavka.id AND rashod.id_mat=mat.id AND who.id=zayavka.id_who
		order by date_isp DESC;");
		echo "<table border=1 width=780 bordercolor=black><tr>
		<td>Дата</td>
		<td>Материал</td>
		<td>Количество</td>
		<td>Кому</td>
		</tr></table>
		<table><tr><td></td><td></td><td></td><td></td></tr></table>";
		while($res=mysql_fetch_array($z3)){
		echo "<table width=780 border=1 bordercolor=black>
		<tr>
		<td>{$res['d']}</td>
		<td>{$res['mat']}</td>
		<td>{$res['kol_vo']}</td>
		<td>{$res['who']}</td>
		</tr></table>";
		}
		break;
########################### soft ###############################
		case 'soft':
		$z4=mysql_query("SELECT zayavka.date_isp as d, soft.software as s, zayavka.comments as c, CONCAT(who.F,' ',who.I,' ',who.O) as who
		FROM zayavka, soft, who
		WHERE soft.id_zayavka=zayavka.id AND who.id=zayavka.id_who 
		order by date_isp DESC");
		echo "<table border=1 width=780 bordercolor=black><tr>
		<td>Дата</td>
		<td>Софт</td>
		<td>Комментарии</td>
		<td>Кому</td>
		</tr></table>
		<table><tr><td></td><td></td><td></td><td></td></tr></table>";
		while($res=mysql_fetch_array($z4)){
		echo "<table width=780 border=1 bordercolor=black>
		<tr>
		<td>{$res['d']}</td>
		<td>{$res['s']}</td>
		<td>{$res['c']}</td>
		<td>{$res['who']}</td>
		</tr></table>";
		}
		break;
########################### nakl ###############################
		case 'nakl':
		$z5=mysql_query("SELECT nakl, mat.name as mat, naklr.kol_vo as kol_vo FROM naklr, mat 
		WHERE mat.id=naklr.id_mat
		ORDER BY name");
		echo "<table border=1 width=780 bordercolor=black><tr>
		<td>Накладная</td>
		<td>Материал</td>
		<td>Количество</td>
		</tr></table>
		<table><tr><td></td><td></td><td></td></tr></table>";
		while($res=mysql_fetch_array($z5)){
		echo "<table width=780 border=1 bordercolor=black>
		<tr>
		<td>{$res['nakl']}</td>
		<td>{$res['mat']}</td>
		<td>{$res['kol_vo']}</td>
		</tr></table>";
		}
		break;
########################### tehnika #########################3
		case 'tehnika':
		$z6=mysql_query("SELECT teh, model, stoimost, inv_number,CONCAT(who.F,' ',who.I,' ',who.O) as otv, id_otdel
		FROM tehnika,who 
		WHERE tehnika.id_otv=who.id
		ORDER BY teh");
		echo "<table width=900 border=1 bordercolor=black>
		<tr>
		<td>Группа техники</td>
		<td>Модель</td>
		<td>Стоимость</td>
		<td>Инвентарный номер</td>
		<td>Ответственный</td>
		<td>Кабинет</td>
		</tr></table>
		<table><tr><td></td><td></td><td></td><td></td><td></td><td></td></tr></table>";
		while($res=mysql_fetch_array($z6)){
		echo "<table width=780 border=1 bordercolor=black>
		<tr>
		<td>{$res['teh']}</td>
		<td>{$res['model']}</td>
		<td>{$res['stoimost']}</td>
		<td>{$res['inv_number']}</td>
		<td>{$res['otv']}</td>
		<td>{$res['id_otdel']}</td>
		</tr></table>";
		}
		break;
}
/*
header('Content-Type: text/html; charset=windows-1251');
header('P3P: CP="NOI ADM DEV PSAi COM NAV OUR OTRo STP IND DEM"');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
header('Content-transfer-encoding: binary');
header('Content-Disposition: attachment; filename=table.xls');
header('Content-Type: application/x-unknown');*/
}
?>