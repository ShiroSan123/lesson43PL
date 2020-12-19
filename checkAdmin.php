<?php
	session_start();
	$con = mysqli_connect('127.0.0.1', 'root', '', '43lessonPL');
	$query = mysqli_query($con, "SELECT * FROM university_admin WHERE login ='{$_POST['login']}' AND passwors='{$_POST['password']}' ");
	$stroka = $query->fetch_assoc();

	$_SESSION['admin_id'] = $stroka['id'];

	$num = mysqli_num_rows($query);

	if($num>0){
		header("Location: accountAdmin.php");
	} else{
		header("Location: accountAdmin.php?error='нет такого пользователя' ");
	}
	?>
	<meta charset="utf-8">
 ?>