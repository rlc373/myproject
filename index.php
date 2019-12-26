<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/tools/db_process.php');

$name = "";
$surname ="";
$email = "";
$ph_number = "";
$errors = [];

if (isset($_POST['submit']))
{
	$name = (!empty($_POST['name'])) ? $_POST['name'] : "";
	$surname = (!empty($_POST['surname'])) ? $_POST['surname'] : "";
	$email = (!empty($_POST['email'])) ? $_POST['email'] : "";
	$ph_number = (!empty($_POST['ph_number'])) ? $_POST['ph_number'] : "";
	
	$name = mysqli_real_escape_string($link, $name);
	$surname = mysqli_real_escape_string($link, $surname);
	$email = mysqli_real_escape_string($link, $email);
	$ph_number = mysqli_real_escape_string($link, $ph_number);
	
	$name = htmlspecialchars($name);
	$surname = htmlspecialchars($surname);
	$email = htmlspecialchars($email);
	$ph_number = htmlspecialchars($ph_number);
	
  $name = trim($name);
  $surname = trim($surname);
  $email = trim($email);
  $ph_number = trim($ph_number);

  if (!strlen($name))
  {
    $errors[] = "Поле Имя не должно быть пустым!";
  }
  
  if (!strlen($surname))
  {
    $errors[] = "Поле Фамилия не должно быть пустым!";
  }
 
  if (!strlen($email))
  {
    $errors[] = "Поле Email не должно быть пустым!";
  }
  
   if (!strlen($ph_number))
  {
    $errors[] = "Поле Телефон не должно быть пустым!";
  }
  
  if (strpos($email, "@") === false)
  {
    $errors[] = "Поле Email должно быть валидным Email адресом!";
  }

  if (empty($errors))
  {
    $query = sprintf("INSERT INTO clients (`name`, `surname`, `ph_number`, `email`) VALUES ('%s', '%s', '%s','%s')", $name, $surname, $ph_number, $email);
    $dbResult = mysqli_query($link, $query);
    
    header('Location: /');
    die();
  }

}

?>


<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>24 Tyres for your wheels!</title>

	<!-- Favicon -->
	<link href="data:image/x-icon;base64,AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD//wAA/b8AAIZhAAD+fwAAhaEAAP//AAD//wAAz/MAAM/zAADP8wAA//8AAPgfAAB37gAAr/UAAN/7AAD//wAA" rel="icon" type="image/x-icon" />

	<!-- Bootstrap 4 CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="/css/style.css">

	<!-- JQuery 3.4.1 -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<!-- Custom JS -->
	<script src="/js/script.js" type="text/javascript"></script>
</head>
<body>
	<header></header>
	<section class="main">
		<div class="container mt-3">
			<div class="row">
				<div class="col-md-12 text-center">
					<h1>ООО "Шины 24"</h1>
				</div>
				<div class="col-md-3 image-wrapper">
					<img src="images/wheel-1.jpg" class="img-fluid">
				</div>
				<div class="col-md-3 image-wrapper">
					<img src="images/wheel-2.jpg" class="img-fluid">
				</div>
				<div class="col-md-3 image-wrapper">
					<img src="images/wheel-3.jpg" class="img-fluid">
				</div>
				<div class="col-md-3 image-wrapper">
					<img src="images/wheel-4.jpg" class="img-fluid">
				</div>
				<div class="col-md-12 text-center mt-4">
					<h3>Почувствуй себя Молнией Макуинном на Пит-Стопе у гвидо!</h3>
				</div>
				<div class="col-md-12 text-center mt-4">
					<h3>Быстро! Качественно! Без лишних слов!</h3>
				</div>
				<div class="col-md-12 text-center mt-4">
					<h3></h3>
				</div>
				<div class="col-md-12 text-center mt-4">
					<h3>Оставляйте свои данные и мы свяжемся с вами в ближайшее время!</h3>
				</div>
				<div class="col-md-6 offset-md-3 mt-4">

          <?if(!empty($errors)){?>
            <div class="alert alert-danger" role="alert">
              <ul>
              <?foreach($errors as $key => $value){?>
                <li><?=$value?></li>
              <?}?>
              </ul>
            </div>
          <?}?>
        
					<form action="" method="post">
						<div class="form-group">
						    <label for="user-name">Имя</label>
						    <input type="text" name="name" class="form-control" id="user-name" placeholder="Введите ваше имя" value="<?=$name?>">
						</div>
						<div class="form-group">
						    <label for="user-surname">Фамилия</label>
						    <input type="text" name="surname" class="form-control" id="user-surname" placeholder="Введите вашу фамилию" value="<?=$surname?>">
						</div>
						<div class="form-group">
						    <label for="user-ph_number">Телефон</label>
						    <input type="text" name="ph_number" class="form-control" id="user-ph_number" placeholder="Введите ваш телефон" value="<?=$ph_number?>">
						</div>
						<div class="form-group">
						    <label for="user-email">Email</label>
						    <input type="email" name="email" class="form-control" id="user-email" placeholder="Введите email" value="<?=$email?>">
						</div>
						<button type="submit" name="submit" class="btn btn-primary">Получить лучший сервис!</button>
					</form>
				</div>
				
			</div>
		</div>

	</section>
	<footer>
		
	</footer>
</body>
</html>