<?php
    session_start();
    require_once "connect.php" ; 
    
    $email = $_POST['email'];    
    $password= md5($_POST['password']);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE password = :pass AND email = :em");
    $stmt->bindValue('pass', $password, PDO::PARAM_STR);
    $stmt->bindValue('em', $email, PDO::PARAM_STR);
    $stmt->execute();
    $userz = $stmt->fetchAll();

    if (!empty($userz)) {
        $user = $userz[0];
        $_SESSION['email'] = $user['email'];
        header("Location: ../products.php");
    } else {
        $_SESSION["message"] = "Неверный email или пароль";
        header ("Location: ../index.php");
    }
?>