<nav class="py-2 bg-light border-bottom">
  <div class="container d-flex flex-wrap">
    <ul class="nav me-auto">
      <li class="nav-item"><h3 href="#" class="nav-link link-dark px-2 active" aria-current="page">Дело в рыбе</h3></li>
      <li class="nav-item"><a href="#" class="nav-link link-dark px-2"><u>Волгоград</u></a></li>
      <li class="nav-item"><a href="#" class="nav-link link-dark px-2"><u>RU</u></a></li>
      <li class="nav-item"><a href="#" class="nav-link link-dark px-2"><u>Настройки</u></a></li>
    </ul>
    <ul class="nav">
      <li class="nav-item"><a href="#" class="nav-link link-dark px-2">+7 (961) 079-39-19</a></li>
      <li class="nav-item"><a href="#" class="nav-link link-dark px-2"><u>Войти</u></a></li>
    </ul>
  </div>
</nav>

<header class="py-3 mb-4 border-bottom">
  <div class="container d-flex flex-wrap justify-content-center">
    <ul class="nav me-auto">
      <li class="nav-item"><h3 href="#" class="nav-link link-dark px-2 active" aria-current="page">Выберите район</h3></li>
    </ul>
    <ul class="nav">
      <li class="nav-item"><a href="#" class="nav-link link-dark px-2"><u>Изменить</u></a></li>
      <li class="nav-item"><a href="sushi.php" class="nav-link link-dark px-2">Доставка</a></li>
      <li class="nav-item"><a href="#" class="nav-link link-dark px-2">Самовывоз</a></li>
      </ul>
  </div>
</header>  

<header class="py-3 mb-4 border-bottom">
  <ul class="container d-flex flex-wrap">
    <li>
      <?php 
        if (!empty($_SESSION['email'])) {
      ?>
        <div class="d-flex" style="margin-left: auto;">
        <div>Вы вошли как &ensp;<?php echo $_SESSION['email'] ?>.</div>
         &ensp;
        <div><a href="logout.php">Выйти</a></div>
        </div>
        <?php
          } else {
        ?>
        <div style="margin-left: auto;">
        <div>Вы неавторизированы</div>
        <div><a href="avtoriz.php">Ввести логин и пароль</a> или <a href="register.php">Зарегистрироваться</a></div>
        </div>
      <?php
        }
      ?>
    </li> 
  </ul>
</header>

<div class="l"></div>