<?php
    session_start();
    require_once "connect.php" ; 
    
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $krov = $_POST['krov'];
    $rezus = $_POST['rezus'];
    $vk = $_POST['vk'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];


    $space_in_password = false;
    $end = false;
    for ($i = 0; $i < strlen($password); $i++) {
        if ($password[$i] == ' ') $space_in_password = true;
    }//
    if (!preg_match("/(?=^.{7,}$)(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).*$/", $password) 
        || preg_match("/(?=.[а-я])(?=.[А-Я])(?=.[ё-ё])(?=.[Ё-Ё])/", $password) || !$space_in_password) {
        $_SESSION['message'] = "Недопустимый формат пароля";
        $end = true;
    } else if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email)) {
        $_SESSION['message'] = "Недопустимый формат email";
        $end = true;
    } else {
        if ($password === $password_confirm) {
            
            $password = md5($password);
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :em");
            $stmt->bindValue("em", $email, PDO::PARAM_STR);
            $stmt->execute();
            $check_user = $stmt -> fetchAll();
            if (!empty($check_user)) {
                $_SESSION['message'] = "Такой пользователь уже существует";
                $end = true;
            } else {
                $stmt = $pdo->prepare("INSERT INTO users (full_name, krov, rezus, vk, password, email) VALUES (:fn, :krov, :rezus, :vk, :password, :email)");
                $stmt->bindValue('fn', $full_name, PDO::PARAM_STR);
                $stmt->bindValue('krov', $krov, PDO::PARAM_STR);
                $stmt->bindValue('rezus', $rezus, PDO::PARAM_STR);
                $stmt->bindValue('vk', $vk, PDO::PARAM_STR);
                $stmt->bindValue('password', $password, PDO::PARAM_STR);
                $stmt->bindValue('email', $email, PDO::PARAM_STR);
                $stmt->execute();
                $_SESSION['message'] = "Регистрация прошла успешно";
                header("Location: ../avtoriz.php");
                exit;
            }
        } else {
            $_SESSION['message'] = "Пароли не совпадают";
            $end = true;
        }
    }

    if (empty($password) && !$end) $_SESSION['message'] = "Заполните пароль";
    if (empty($email) && !$end) $_SESSION['message'] = "Заполните логин";
    header("Location: ../register.php");



      ?>


