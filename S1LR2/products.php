<?php require_once('logic.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laba2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">
    
</head>
<body>

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



<div class="l"></div>


   
    <br>


    <form action="" id="form" method="GET">   <!-- данные отправляются.  метод GET, вы увидите адрес появится в адресной строке браузера при отправке формы -->

    




        <div class="container gap10down">
            <div class="center w-100">Фильтрация результата поиска</div>

            <div class="center w-100">По цене:</div>  <br>

            <input type="text" name="cost1" placeholder="Цена от" class="w-100">     
            <input type="text" name="cost2" placeholder="Цена до" class="w-100"> <br>

            <div class="center w-100">Фильтрация по адресу:</div> <br>

            <select name="type" type="text" class="w-100"> <br>

                <option value="">Любой</option>   <!-- Тегом <option> размечается каждый элемент выпадающего списка <select>-->


                <?php  
                    foreach($selectA as $items) {
                        ?>
                            <option value="<?php echo $items['ID']; ?>"><?php echo $items['point_Sales']; ?></option>
                        <?php
                    }
                ?>


            </select>



            
            <div class="center w-100">Фильтрация по описанию</div> <br>
            <input type="text" name="description" placeholder="Введите описание товара" class="w-100" > <br>
            <div class="center w-100">Фильтрация по наименованию</div> <br>
            <input type="text" name="name" placeholder="Введите наименование товара" class="w-100"> <br>
            <div class="center gap10">

                <button type="submit" class="bBtn">Применить фильтр</button>

                <button type="submit" class="rBtn" onclick="document.getElementById("form").reset();">Очистить фильтр</input> <!--Метод reset() сбрасывает значения всех элементов формы -->
            </div>
            <div></div>
        </div>
    </form>

    <br> <br>
    <table class="table table-bordered container">
        <thead>
            <tr>
                <th>Изображение</th>
                <th>Название</th>
                <th>Адрес</th>
                <th>Описание</th>
                <th>Цена</th>
            </tr>
        </thead>
        <tbody>   <!--для хранения одной или нескольких строк таблицы -->


            <?php
                foreach($data as $items) {            //Имя переменной всегда начинается с символа $
                    ?>
                    <tr>
                        <td><img src="catalog_images/<?= $items['img_path']; ?>" width="100px"></td>
                        <td><?= $items['name_Client']; ?></td>                   
                        <td><?= $items['point_Sales']; ?></td>
                        <td><?= $items['description']; ?></td>
                        <td><?= $items['cost']; ?></td>
                    </tr>
                    <?php
                }
            ?>

        </tbody> 
    </table>

<footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom border-top pb-3 mb-3">
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted"><u>Пользовательское соглашение</u></a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted"><u>Лицензионное соглашение</u></a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted"><u>Условия акций сервиса</u></a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted"><u>Политика конфиденциальности</u></a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted"><u>Правила оплаты</u></a></li>
    </ul>
</footer>


</body>
</html>