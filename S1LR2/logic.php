<?php
    $host = 'localhost';  // подключение к бд 1-14
    $db   = 'best_sushi';
    $user = 'root';
    $pass = '';
    $charset = 'utf8';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $user, $pass, $opt);     

    $cond = array(false, false, false, false, false); //массивы для соединения строки. от усл могут стать тру
    $indexes = array('cost1', 'cost2', 'type', 'description', 'name'); //название ключей для гет

    for ($i = 0; $i < sizeof($cond); $i++) {     // заполняет аррей тру. гет если объявлен и не пустой
        if (isset($_GET[$indexes[$i]]) && $_GET[$indexes[$i]] != "") 
            $cond[$i] = true;
    }

    function condIncludesTrue($index) {    //проверяет был ли изменен запрос. стандартная часть+ условие
        $condit = $GLOBALS['cond'];
        for ($i = 0; $i < $index; $i++) {
            if ($condit[$i]) return true;
        }
        return false;
    }

    $queryCond = "WHERE ";                  // условие

    if ($cond[0]) $queryCond = $queryCond . "cost > :cost1GET"; //массив с тру фолс. к сторке добавляется значение

    if ($cond[1]) {
        
        if (condIncludesTrue(1)) $queryCond = $queryCond . " AND ";// проверка было ли добавлено что-то
        $queryCond = $queryCond . "cost < :cost2GET";
    }

    if ($cond[2]) {
        if (condIncludesTrue(2)) $queryCond = $queryCond . " AND ";
        $queryCond = $queryCond . "ID_point LIKE :typeGET";
    }

    if ($cond[3]) {
        if (condIncludesTrue(3)) $queryCond = $queryCond . " AND ";
        $queryCond = $queryCond . "description LIKE :descGET";
    }

    if ($cond[4]) {
        if (condIncludesTrue(4)) $queryCond = $queryCond . " AND ";
        $queryCond = $queryCond . "name_Client LIKE :nameGET";
    }
//56-стандартный запрос
    $query = "SELECT img_path, name_Client, pointsales.point_Sales, description, cost FROM orders INNER JOIN pointsales on orders.ID_point = pointsales.ID ";
    if (condIncludesTrue(5)) $query = $query . $queryCond; //проверка был ли добавлен хоть один запрос. если да то добавляет часть условия

 
    $stmt = $pdo->prepare($query); //загрузитть запрос.  защита от sql инъекций
    if ($cond[0]) $stmt->bindValue('cost1GET', $_GET['cost1'], PDO::PARAM_INT); //добавляются значения. либо строка либо числа
    if ($cond[1]) $stmt->bindValue('cost2GET', $_GET['cost2'], PDO::PARAM_INT);
    if ($cond[2]) $stmt->bindValue('typeGET', $_GET['type'], PDO::PARAM_STR);
    if ($cond[3]) $stmt->bindValue('descGET', '%' . $_GET['description'] . '%', PDO::PARAM_STR);
    if ($cond[4]) $stmt->bindValue('nameGET', '%' . $_GET['name_Client'] . '%', PDO::PARAM_STR);
    $stmt->execute(); //выполнить запрос
    $data = array(); //объявление массива
    
    while ($row = $stmt->fetch()) { //проходит по запросу и вводит данные из запроса 68-70
        array_push($data, $row);
    }

   

    $selectA = array();  //объявляет массив, проходит по нему, заполняет данные из второй таблицы 72-78

    $stmt = $pdo->query("SELECT * FROM pointsales");
    while ($row = $stmt->fetch()) {
        array_push($selectA, $row);
    }
?>