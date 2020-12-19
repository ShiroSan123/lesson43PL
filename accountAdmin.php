<?php 
	session_start();
	$con = mysqli_connect('127.0.0.1', 'root', '', '43lessonPL');
	$admin = mysqli_query($con, "SELECT * FROM universities INNER JOIN university_admin ON universities.id = university_admin.university_id WHERE university_admin.id = '{$_SESSION['admin_id']}' ");
	$stroka = $admin->fetch_assoc();
	$applications = mysqli_query($con, "SELECT * FROM students INNER JOIN applications ON students.id = applications.user_id WHERE applications.id_universities = '{$stroka['university_id']}' ");
	$num_application = mysqli_num_rows($applications);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
	<?php if ($_SESSION['admin_id'] == null) { ?>
	<div class="col-10 mx-auto">
		<h3>Войдите как админ</h3>
		<p>Вы не авторизованы</p>
		<a href="loginAdmin.php">Авторизация админа</a>
	</div>
	<?php } else {

	?>
	
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	 <a class="navbar-brand" href="index.php">Поступай легко!</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item ml-3">
	         <button class="btn btn-light"><a href="index.php" class="text-secondary">Главная</a></button>
	         <button class="btn btn-light"><a href="signOutAdmin.php" class="text-secondary">Выйти</a></button>
	      </li>
	    </ul>
	  </div>
	</nav>
	<div class="col-8 mx-auto mt-5">
		<div class="row">
			
		</div>
		<div class=" mt-5">
			<h3>Добро пожаловать, <?php echo $stroka['login'] ?></h3>	
			<h4>Ваш университет: <?php echo $stroka['name'] ?></h4>	
			<h4>Заявки от абитуриентов:</h4>
			<?php for ($i=0; $i < $num_application; $i++) { 
				$application1 = $applications->fetch_assoc();
			?>
			<div>
				<h4>ФИО от абитуриентов: <?php echo $application1['fio'] ?></h4>
				<p>Возраст: <?php echo $application1['age'] ?></p>
				<p>Школа: <?php echo $application1['school'] ?></p>
			</div>
			<?php } ?>
		</div>
	</div>
	<?php }?>


</body>
</html>
