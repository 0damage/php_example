<?php
require_once 'function.php';
if(isset($_POST['submit'])) {
    $login_trim=trim($_POST['login']);
    $email_trim=trim($_POST['email']);
    $password_trim=trim($_POST['password']);
    $password2_trim=trim($_POST['password2']);
    
    $error_log=checkLogin($login_trim)===true ? '' : checkLogin($login_trim);
    $error_email=checkEmail($email_trim)===true ? '' : checkEmail($email_trim);
    $error_pass=checkPassword($password_trim)===true ? '' : checkPassword($password_trim);
    $error_pass2=checkPassword($password2_trim)===true ? '' : checkPassword($password2_trim);
    $password_trim==$password2_trim ? '' : $error_pass2="Пароли не совпадают";
    
        if($error_log=='' && $error_email=='' && $error_pass=='' && $error_pass2=='') {
    $reg=registration($login_trim,$email_trim,$password_trim,$password2_trim,$pdo);
        }
    
        if($reg===true) {
            header('Location:http://exx/direction_log_in.php');
        }
        else {
            $oshibka=$reg;
        }
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
                            <p>Зарегестрируйтесь</p>
                            <form action="" method="POST">
                                <input type="text" name="login" placeholder="Введите логин">
                                <div class="error" name ="error_log"><?php echo $error_log; ?><?php echo $oshibka; ?></div>
                                <input type="text" name="email" placeholder="Введите email">
                                <div class="error" name ="error_email"><?php echo $error_email; ?></div>
                                <input type="password" name="password" placeholder="Введите пароль">
                                <div class="error" name ="error_pass"><?php echo $error_pass; ?></div>
                                <input type="password" name="password2" placeholder="Повторите пароль">
                                <div class="error" name ="error_pass2"><?php echo $error_pass2; ?></div>
                                <input type="submit" class="submit_login" name="submit" value="Зарегестрироваться">
                            </form>
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
