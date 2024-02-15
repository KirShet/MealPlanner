<?php
session_start();
$config = (object)[
    "root" => "/MealPlanner",
    "siteName" => "Мой сайт",

    "dbHost" => "",
    "dbLogin" => "",
    "dbPassword" => "",
    "dbName" => "",
    "dbPort" => "",
];
$mysqli =  $dbh = new PDO("mysql:dbname=meal_planner;host=localhost:3306", "root", "");
// unset($_SESSION);
$root = $_SERVER['CONTEXT_DOCUMENT_ROOT'] . $config->root;
// if($mysqli->error) die("Error: ". $mysqli->connect_error)

function loadComponent($file, $number = false)
{
    // (&$file) - глобальная переменная;
    // ($file = 'header') - по умолчанию;
    // (...$file) - несколько аргументов, ... - упаковывает в массив;
    global $root;
    // путь к корневой папке сайта и настройки конфигурации соответственно.
    // $file = footer - меняем
    // for ($i = 0; $i < strlen($file); $i++){
    // }
    // foreach ($file as $value) {}
    // echo"$root/components/$file.php";
    if ($number !== false) {
        $_SESSION['descdiet'] = $number;
    }
    if (file_exists("$root/components/$file.php")) {
        // существует ли файл с именем “$root/components/$file.php”, где $root - путь к корневой папке
        include "$root/components/$file.php";
        // echo"$root/components/$file.php";
        // код из подключенного файла будет иметь доступ к тем же переменным, функциям и константам, что и код функции loadComponent
        // function square($number): int 
        // { потом return } потом echo square()
        // function sipply(): array 
        // if($number !== false){
        // }
    }
}
function href($url, $extension ='php')
{
    global $config;
    // if?config->root=="":
    // print_r($config);
    // echo $url;
    $url = ($config->root) ? "$config->root/$url.$extension" : "/$url.$extension";
    // 
    // свойство не пусто, то есть истинно, то переменная $url получит значение “/url.php”, то есть адрес страницы без подпапки. Если это свойство пусто, то есть ложно, то переменная $url получит значение “$config->root/$url.php”, то есть адрес страницы с подпапкой
    return "href = '$url' ";
}

function action($url = '#', $method = "POST")
{
    global $config;
    $url = ($config->root == '') ? "/action/$url.php" : "$config->root/action/$url.php";
    return " action = '$url' method = '$method' ";
    // if ($metod == "POST") {

    // }
}
// function eating(){
//     global $mysqli;
//     $meal_time = mysqli_query($mysqli, "SELECT * FROM `meal_time`");
//     $meal_time_results = mysqli_fetch_all($meal_time, MYSQLI_ASSOC);
//     // кнопка обновления
//     // $random_key = array_rand($meal_time_results); // получаем случайный ключ
//     if (isset($_SESSION['$random_key'])) {
//         $random_key = $_SESSION['$random_key'];
//         $eating = $meal_time_results[$random_key]; // получаем значение по ключу
//         // $grams_mult = $_SESSION['calories'] / $eating['call_per_100_grams'];
//         if(isset($_SESSION['meal_time'])) {
//             $_SESSION['$random_key'] = array_rand($meal_time_results); // получаем случайный ключ
//         }
//     }
//     return $eating;
// }
function eating()
{
    global $mysqli;
    $meal_time = $mysqli->prepare("SELECT * FROM `meal_time`");
    $meal_time->execute();
    $meal_time_results = $meal_time->fetchAll();

    // возвращает первый операнд, если он задан и не равен null, а в обратном случае возвращает второй операнд.
    // isset(1) ? 1 : 2;
    // $random_key = $_SESSION['$random_key'] ?? array_rand($meal_time_results);
    $random_key = array_rand($meal_time_results);

    $eating = $meal_time_results[$random_key];

    // Проверяем, есть ли уже сохраненное время приема пищи в сессии
    // if (isset($_SESSION['meal_time'])) {
    //     $random_key = array_rand($meal_time_results);
    //     $_SESSION['$random_key'] = $random_key;
    // }

    return $eating;
}
function redirect($url  = false)
{
    global $config;
    if ($url) {
        // header("". $url);
        $url = ($config->root == '') ? "/$url.php" : "$config->root/$url.php";
        header("Location: $url");
    } else {
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }
}
// if(isset($_GET["heart"])){
//     $_SESSION['eating'] = eating();
//     unset($_GET);
// }
function emptyValues($keyValue, $values)
{
    // есть ли пустые значения в массиве $values, который соответствует некоторым ключам из массива $keyValue
    // global $config;
    // echo "<br> values ";
    // print_r($values);

    $arrValues = [];
    foreach ($keyValue as $key => $value) {
        // echo "ключ $key => $value<br>";
        // 0 => login
        // 1 => name
        if (empty($values[$value])) {
            //  true, если значение не существует
            $_SESSION['errors'][$value] = 'Поле обязательно к заполнению';
            // echo "значения не сущ $value => $values[$value]<br>";
        } else {
            // $_SESSION['values'][$value] = $values[$value];
            // echo "существует $value => $values[$value]<br>";
            // login => 1
            // name => ff
        }
        $arrValues[$value] = $values[$value];
        // echo "hhhhh";
    }
    if (isset($_SESSION['errors'])) {
        redirect();
    }
    return $arrValues;
}
function insert($table, $arrVal, $values)
{
    global $mysqli;

    $set = '';
    foreach ($arrVal as $key => $value) {
        $set .= "`$value` = :$value, ";
    }
    $set = substr($set, 0, -2) . " ";
    echo "INSERT INTO `$table` SET $set";
    // INSERT INTO `meal_time` SET `name` = :name, `carb_per_100_grams` = :carb_per_100_grams, `fats_per_100_grams` = :fats_per_100_grams, `prot_per_100_grams` = :prot_per_100_grams, `img` = :img
    $query = $mysqli->prepare("INSERT INTO `$table` SET $set");
    $query->execute($values);
}
function update($table, $arrVal, $values, $id)
{
    global $mysqli;

    $set = '';
    foreach ($arrVal as $key => $value) {
        $set .= "`$value` = :$value, ";
    }
    $set = substr($set, 0, -2) . " ";
    $query = $mysqli->prepare("UPDATE `$table` SET $set WHERE `id` = '$id'");
    // WHERE `id` = '$value[]'
    $query->execute($values);
}
function exitUsers()
{
    // unset($_SESSION['values']);
    unset($_SESSION['user']);
    redirect('index');
}
function error($str)
{
    $_SESSION['errorForm'] = $str;
    exitUsers();
}
function getMeal($meals = 'break', $meal = false)
{
    global $mysqli;
    $templ_cond = 'SUBSTRING(PFC,';
    if ($meals == "snacks" || $meals == "second_break") {
        $cond = "$templ_cond 4, 2) <= 50 AND $templ_cond 7, 2) <= 50;";
    } else if ($meals == "lunch") {
        $cond = "$templ_cond 4, 2) <= 40 AND $templ_cond 7, 2) <= 50;";
    } else if ($meals == "dinner") {
        $cond = "$templ_cond 4, 2) <= 40 AND $templ_cond 7, 2) <= 40;";
    } else if ($meals == "dinner") {
        $cond = "$templ_cond 7, 2) >= 40 AND $templ_cond 7, 2) <= 65;";
    } else {
        $cond = '1';
    }
    $query = $mysqli->prepare("SELECT * FROM `meal_time` WHERE 
        $cond");
    // PFC, 1, 2 - первый столбец
    // PFC, 4, 2 - второй столбец
    // PFC, 7, 2 - второй столбец
    $query->execute();
    $meal_time_results  = $query->fetchAll();

    if ($meal == true) {
        $random_key = array_rand($meal_time_results); // получаем случайный ключ
        $_SESSION['$random_key'] = $random_key;

        // $_SESSION['eating'] = eating();
        if (isset($_POST["heart"])) {
            // $_SESSION['eating'] = eating();
        }
        // $eating = $meal_time_results[$random_key];
        $meal_time_results = $meal_time_results[$random_key];
        $_SESSION['meal'][$meals] = $meal_time_results;
    }

    return $meal_time_results;
}
function RuName($name)
{
    return ($name == 'break') ? '<h2>Завтрак</h2>' : (($name == 'snacks') ? '<h2>Перекус</h2>' : (($name == 'lunch') ? '<h2>Обед</h2>' : (($name == 'dinner') ? '<h2>Ужин</h2>' : (($name == 'second_break') ? '<h2>Второй завтрак</h2>' : null))));
}
function Access()
{
    if (isset($_SESSION['user']['id'])) {
        $id = $_SESSION['user']['id'];
        global $mysqli;
        $query = $mysqli->prepare("SELECT * FROM `users` WHERE `access`='admin'  AND `id`= $id");
        $query->execute();
        $admin = $query->fetch();
        return $admin ? true : false;
    }
    return false;
}
function PFC($post_data, &$fill_array)
{
    $carb = $post_data['carb_per_100_grams'];
    $fats = $post_data['fats_per_100_grams'];
    $prot = $post_data['prot_per_100_grams'];

    $call = $carb * 4 + $prot * 4 + $fats * 9;

    $carb = ($carb * 4 / $call) * 100;
    $fats = ($fats * 9 / $call) * 100;
    $prot = ($prot * 4 / $call) * 100;

    $fill_array['PFC'] = zero($prot) . ':' . zero($fats) . ':' . zero($carb);
    $fill_array['call_per_100_grams'] = $call;
    // echo "тут";
    // print_r($fill_array);
}
function delete($table, $id)
{
    global $mysqli;
    $query = $mysqli->prepare("DELETE FROM `$table` WHERE id = :id");
    $query->execute(['id' => $id]);
    return $query->fetch();
}
function zero($nutrient)
{
    return $nutrient > 10 ? round($nutrient) : '0' . round($nutrient);
}
function nutrWeight($eating, $nutr)
{
    $nutr =
        $nutr == 'carb' ? 'carb_per_100_grams' : ($nutr == 'fats' ? 'fats_per_100_grams' : ($nutr == 'prot' ? 'prot_per_100_grams' : false));

    return '<em>' . round($_SESSION['meal_time']['calintake'] / $_SESSION['meal_time']['intake'] / $eating['call_per_100_grams'] * $eating[$nutr]) . ' гр </em>';
}
