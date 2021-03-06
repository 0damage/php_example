<?php
require_once 'function.php';

// Если нажали кнопку Войти
if($_POST['submit']) {
    //Убираем лишние пробелы с введенным пользователем логина и пароля
    $login_trim=trim($_POST['login']);
    $password_trim=trim($_POST['password']);
    //Выполняем проверку ввел ли пользователь лог и пароль и ввел ли правильно
    $error_login=$error_password='';
    $error_login=checkLogin($login_trim)===true ? '' : checkLogin($login_trim);
    $error_password=checkPassword($password_trim)===true ? '' : checkPassword($password_trim);
    //Если предыдущие условие возвращает true,то выполняем ф-цию авторизации
    if($error_login=='' && $error_password=='') {
    $auth=authorization($login_trim,$password_trim,$pdo);
    }
    
    if($auth===true) {
        header('Location:http://exx/final_direction.php');
    }
    $oshibka=$auth;
}
?><!DOCTYPE html>
<!--[if lt IE 7]><html lang="ru" class="lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html lang="ru" class="lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html lang="ru" class="lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html>
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>PHP</title>
        <meta name="description" content="" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!--Подключение совместимости с edge -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" /> <!-- Нужно для создания адаптивного дизайна -->
        <link rel="shortcut icon" href="favicon.png" /> <!-- фавиконка -->
        <link rel="stylesheet" href="libs/bootstrap/bootstrap-grid-3.3.1.min.css" /> <!-- подключение бутстрап сетки -->
        <link rel="stylesheet" href="libs/font-awesome-4.2.0/css/font-awesome.min.css" /> <!-- подключение иконок http://fontawesome.io/icons/ -->
        <link rel="stylesheet" href="libs/fancybox/jquery.fancybox.css" /> <!-- менеджер попап кнопок fancybox (вспылающая форма,изображения и тд) -->
	<link rel="stylesheet" href="css/fonts.css" /> <!-- шрифты по умолч для текста-->
	<link rel="stylesheet" href="css/main.css" /> 
	<link rel="stylesheet" href="css/media.css" />
        <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Anonymous+Pro' rel='stylesheet' type='text/css'>        
</head>
<body>
    <section class="main_registration">
        <div class="container">
            <div class="col-md-12">
                <div class="registration">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Добро пожаловать</h3>
                            <p>Авторизируйтесь</p>
                            <form action="" method="POST">
                                <input type="text" name="login" placeholder="Введите логин">
                                <div class="error" name ="error_login"><?php echo $error_login; ?><?php echo $oshibka; ?></div>
                                <input type="password" name="password" placeholder="Введите пароль">
                                <div class="error" name ="error_password"><?php echo $error_password; ?></div>
                                <input type ="submit" class="submit_login" name="submit" value="Войти">
                            </form>
                            <p>Если вы не зарегистрированы, <a href="registration.php">зарегистрируйтесь.</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--[if lt IE 9]>
    <script src="libs/html5shiv/es5-shim.min.js"></script>
    <script src="libs/html5shiv/html5shiv.min.js"></script>
    <script src="libs/html5shiv/html5shiv-printshiv.min.js"></script>
    <script src="libs/respond/respond.min.js"></script>
    <![endif]-->
    <script src="libs/jquery/jquery-1.11.1.min.js"></script> <!-- подключение jquery -->
    <script src="libs/fancybox/jquery.fancybox.pack.js"></script>
</body>
</html>
