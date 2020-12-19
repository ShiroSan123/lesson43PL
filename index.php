<!DOCTYPE html>
<?php 	
	$con = mysqli_connect('127.0.0.1', 'root', '', '43lessonPL');
	$query = mysqli_query($con, "SELECT * FROM universities ");
	$num = mysqli_num_rows($query)
 ?>
<html>
<head>
	<title>Проект</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
	
	
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	 <a class="navbar-brand" href="index.php">Поступай легко!</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item ml-3">
	         <button class="btn btn-light"><a href="accountStudent.php" class="text-secondary">Аккаунт студента</a></button>
	         <button class="btn btn-light"><a href="accountAdmin.php" class="text-secondary ml-2">Аккаунт админа университета</a></button>
	      </li>
	      
	    </ul>
	  </div>
	</nav>
	<div class="col-12 mx-auto" style="padding-left: 120px;">
		<div class="row">	
			<?php 
				for ($i=0; $i < $num; $i++) { 
				$stroka = $query->fetch_assoc();
			 ?>
			<!--карточка одного университета-->
			<div class="border ml-5 shadow text-center pb-1 pl-1 pr-1 bg-light" style="width: 350px;">
				<img class="w-100" src="<?php echo $stroka['photo'] ?>">
				<h4><?php echo $stroka['name'] ?></h4>
				<p><?php echo $stroka['description'] ?></p>
				<form action="AddApplication.php" method="POST">
					<input type="" name="iduniver" value="<?php echo $stroka['id'] ?>" style="display: none">
					<button class="btn btn-info">Подать заявку</button>	
				</form>
							
			</div>	
			<?php 
				}
			 ?>
		</div>
	</div>
</body>
</html>