<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Online ������</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" href="datepicker/smoothness/ui.datepicker.css" type="text/css" media="screen" />
    <!-- ���������� jQuery -->
    <script type="text/javascript" src="datepicker/jquery-1.2.6.min.js"></script>
    <!-- ���������� jQuery UI (� ��� ��� ������ datepicker) -->
    <script type="text/javascript" src="datepicker/jquery-ui-personalized-1.5.3.packed.js"></script>
    <!-- ���������� ����������� datepicker`a -->
    <script type="text/javascript" src="datepicker/ui.datepicker-ru.js"></script>
    <script type="text/javascript" src="datepicker/pick1_2.js"></script>
</head>

<body>
<div id="container">
	<div id="holder" class="clearfix">
		<div id="logo">
			<h1><a href="index.php">Online ������</a></h1>
	  </div>
		<div id="navigation">
			<ul>
				<li><a href="index.php">�������</a></li>
				<li><a href="insert_zayavka.php">��������� ������</a></li>
				<li><a href="zayavki.php">������</a></li>
				<?if ($_SESSION[login]=='admin'){?>
				<li><a href="insert_tehnika.php">�������</a></li>
				<li><a href="insert_nakl.php">��������� ��������</a></li>
				<li><a href="peremen.php">����������� �������</a></li>
				<li><a href="rashod.php">������</a></li>
				<li><a href="soft.php">����</a></li><?}?>
				<li><a href="help.php">�������</a></li>
			</ul>
	    </div>
		<div id="content">