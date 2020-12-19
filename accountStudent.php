<?php 
	session_start();
	$con = mysqli_connect('127.0.0.1', 'root', '', '43lessonPL');
	$students = mysqli_query($con, "SELECT * FROM students WHERE id = '{$_SESSION['student_id']}' ");
	$works = mysqli_query($con, "SELECT * FROM works WHERE student_id = '{$_SESSION['student_id']}' ");
	$applications = mysqli_query($con, "SELECT * FROM universities INNER JOIN applications ON universities.id = applications.id_universities WHERE applications.user_id = '{$_SESSION['student_id']}' ");
	$stroka = $students->fetch_assoc();
	$num = mysqli_num_rows($works);
	$num_application = mysqli_num_rows($applications);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Профиль поступающего</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
	<?php if ($_SESSION['student_id'] == null) { ?>
	<!--если студент НЕ авторизовался, то показывается эта часть, в том числе ссылка на страницу  логина-->
	<div class="col-10 mx-auto">
		<h3>Войдите как абитуриент</h3>
		<p>Вы не авторизованы</p>
		<a href="loginStudent.php">Авторизация абитуриента</a>
	</div>
	<?php } else {

	?>
	
	<!--если студент авторизовался, то показываются nav (меню) и контент всего сайта-->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="#">Привет,<?php echo $stroka['fio'] ?> </a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item">
	        <button class="btn btn-light"><a href="signOutStudent.php" class="text-secondary">Выйти</a></button>
	      </li>
	      <li class="nav-item">
	        <button class="btn btn-light"><a class="text-secondary" href="index.php">Главная</a></button>
	      </li>
	      
	    </ul>
	  </div>
	</nav>
	<div class="col-12 mx-auto mt-5">
		<div class="row">
			<div class="col-3 border-right">
				<div class="col-12 border py-3 rounded">
					<h5>Добавить работу</h5>
					<form action="addWork.php" method="POST" enctype="multipart/form-data">
						<input class="mt-3 form-control" type="" placeholder="Описание" name="desc">
						<input placeholder="Выбрать файл" class="mt-3" type="file" name="file">
						<button class="btn btn-success mt-3">Загрузить работу в портфолио</button>
					</form>
				</div>
				<div class="col-12">
					<h3>Мои заявки в университеты</h3>		
					<?php for ($i=0; $i < $num_application; $i++) { 
						$application1 = $applications->fetch_assoc();
						echo "<h6 class='text-secondary mt-3'>".$i.') '.$application1['name']."</h6>";
					} ?>
				</div>
			</div>
			<div class="col-9">
				<!--Вывод работ-->
				<div class="row">
					<?php 
						for ($i=0; $i < $num; $i++) { 
						$works1 = $works->fetch_assoc();
					?>
					<div class="col-3">
						<img class='w-100' src='<?php echo $works1['files'] ?>'>
						<p><?php echo $works1['description'] ?></p>
					</div>	
					<?php 
						}
					?>
				</div>
			</div>
		</div>
	</div>


	<?php }?>


</body>
</html>
