<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<!-- Форма авторизации-->

<?php include "header.php"; ?>


   
    <br> <br> <div style=" margin-left: 2%;">

    <?php 
        if (empty($_SESSION['email'])) {
            ?>



    <form method="post" action="vendor/signin.php" >
  
    <label for="exampleInputEmail1">Email </label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="example.example.com">
    
    <label for="exampleInputPassword1">Пароль</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="********"> 
    
  <button type="submit" class="btn btn-primary">Войти</button>

  <div style="margin-left: 40%;"> Ещё нет аккаунта?   <a href="register.php">Зарегистрируйтесь</a>    </div>  
  <?php
if (isset($_SESSION["message"])) 
 {
  echo  '<p class="msg">' . $_SESSION["message"]. '</p>' ;
}
 unset ($_SESSION["message"]) ;
?>

<?php
        } else {
            ?>
                <div>Вы вошли как &ensp;<?php echo $_SESSION['email'] ?>.</div>
            <?php
        }
    ?> 


</form>


</body>
</html>


