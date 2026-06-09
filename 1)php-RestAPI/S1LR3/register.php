<?php 
     session_start();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">
</head>
<body>


<?php include "header.php"; ?>



<br> <br> <div style=" margin-left: 2%;">

    <!-- Форма регистрации-->

<form  action="vendor/signup.php" method="post" >

  <label>ФИО</label>
    <input type="text" class="form-control" id="exampleFormControlInput0" name="full_name" placeholder="Иванов Иван Иванович" value="<?php
                            if (isset($_POST['full_name'])) echo $_POST['full_name']; ?>">
   <br>
  
  
  <label for="exampleFormControlInput1">Email (Логин)</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="email" placeholder="example@example.com" value="<?php
                            if (isset($_POST['email'])) echo $_POST['email']; ?>">
   <br> 
   


  <label for="exampleFormControlSelect1">Группа крови</label>
    <select class="form-control" id="exampleFormControlSelect1" name="krov"> 
    <option value="I" <?php if (isset($_POST['krov']) && $_POST['krov'] == "I") echo 'selected'; ?>>I (0)</option> <!--проверяем, существуют ли переменные в массиве POST-->
                        <option value="II" <?php if (isset($_POST['krov']) && $_POST['krov'] == "II") echo 'selected'; ?>>II (А)</option>
                        <option value="III" <?php if (isset($_POST['krov']) && $_POST['krov'] == "III") echo 'selected'; ?>>III (В)</option>
                        <option value="IV" <?php if (isset($_POST['krov']) && $_POST['krov'] == "IV") echo 'selected'; ?>>IV (АВ)</option>
    </select>
   <br>
  
  <label for="exampleFormControlSelect2">Резус-фактор</label>
    <select class="form-control" id="exampleFormControlSelect2" name="rezus">
      <option <?php if (isset($_POST['rezus']) && $_POST['rezus'] == "+") echo 'selected'; ?>>+</option>
      <option <?php if (isset($_POST['rezus']) && $_POST['rezus'] == "-") echo 'selected'; ?>>-</option>
    </select>
  <br>

 

  <label for="exampleFormControlInput2"> Ссылка на профиль Вконтакте</label>
    <input  class="form-control" id="exampleFormControlInput2" name="vk" placeholder="https://vk.com/idx"  value="<?php
                            if (isset($_POST['vk'])) echo $_POST['vk']; ?>">   
   <br>

 
  <label for="exampleInputPassword1">Пароль</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="********"> 
    <small id="emailHelp" class="form-text text-muted">Требования к паролю: длиннее 6 символов, обязательно содержит большие латинские буквы, маленькие латинские буквы, спецсимволы (знаки препинания, арифметические действия и тп), пробел, дефис, подчеркивание и цифры. 
Русские буквы запрещены.</small>
 <br> <br>

 
  <label for="exampleInputPassword1">Повторите пароль</label>
    <input type="password" class="form-control" id="exampleInputPassword2" name="password_confirm" placeholder="********">  </div>
    <button type="submit" class="btn btn-primary" style="margin-left: 30%;">Зарегистрироваться</button>   
    <div style="margin-left: 40%;"> Уже есть аккаунт?  <a href="avtoriz.php">Войти в аккаунт</a>    </div>   

   
<?php
if (isset($_SESSION["message"])) 
 {
  echo  '<p class="msg">' . $_SESSION["message"]. '</p>' ;
}
 unset ($_SESSION["message"]) ;
?>
   
</form>
<body>
  </html>

