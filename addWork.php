<?php 
	session_start();
	$con = mysqli_connect('127.0.0.1', 'root', '', '43lessonPL');
	$uploadfile = 'img/' . basename($_FILES['file']['name']);
	move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
	mysqli_query($con,"INSERT INTO works (description, files, student_id) VALUES ('{$_POST['desc']}','{$uploadfile}','{$_SESSION['student_id']}') ");

	header('Location: accountStudent.php ')
 ?>