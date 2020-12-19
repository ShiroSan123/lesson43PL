<?php 
	session_start();
    $con = mysqli_connect('127.0.0.1', 'root', '', '43lessonPL');	
    mysqli_query($con,"INSERT INTO applications (id_universities, user_id) VALUES ('{$_POST['iduniver']}','{$_SESSION['student_id']}') ");

    header("Location: index.php")
?>