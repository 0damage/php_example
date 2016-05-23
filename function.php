<?php

require_once 'PDOconnect.php';

function checkLogin ($str) {
    
    if(!$str) {
        return "Вы не ввели имя";
    }
    if(!preg_match('/^[-_.a-z\d]{4,16}$/i',$str)) {
        return "Недопустимые символы в логине или логин слишком короткий (длинный)";
    }
    return true;    
}

function checkEmail ($str) {
    if(!$str) {
        return "Вы не ввели email";
    }
    if(!preg_match('/^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/',$str)) {
        return "Недопустимые символы в email";
    }
    return true;
}

function checkPassword ($str) {
    if(!$str) {
        return "Вы не ввели пароль";
    }
    if(!preg_match('/^[_!)(.a-z\d]{6,16}$/i',$str)){
        return "Недопустимые символы в пароле или пароль слишком короткий (длинный)";
    }
    return true;
}


function registration ($login_trim,$email_trim,$password_trim,$password2_trim,$pdo) {
    $select=$pdo->prepare("SELECT `id` FROM `users_php_example_reg` WHERE `login`='".$login_trim."'");
    $select->execute();
    // если такой пользователь уже есть
    if($select->rowCount()>0) {
        return "Пользователь с таким логином уже зарегестрирован";
    }
    //если нет регестрируем его заносим в бд
    else {
        $insert=$pdo->prepare("INSERT INTO `users_php_example_reg`(`id`,`login`,`email`,`pass`,`pass2`) values ('','".$login_trim."','".$email_trim."','".$password_trim."','".$password2_trim."')");
        $insert->execute(); 
        return true;
    }
}

function authorization($login_trim,$password_trim,$pdo) {

    // Проверяем есть ли такой пользователь в бд
    $select=$pdo->prepare("SELECT `id` FROM `users_php_example_reg` WHERE `login`='".$login_trim."' AND `pass`='".$password_trim."'");
    $select->execute();
    
    // Если пользователя с такими данными нет, возвращаем сообщение об ошибке
    if($select->rowCount()<1) {
        return "Пользователя с указанным логином не существует";
    }
    
    // Если пользователь существует, запускаем сессию
    session_start;
    
    $_SESSION['login'] = $login;
    $_SESSION['password'] = $password;
    
    return true;    
}