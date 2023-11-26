<?php
include '../components/core.php';

if(isset($_POST["generate_descdiet"]))
{
//     $diet_cart = $_POST["diet_cart"];
    $calintake = $_POST["calintake"]; 
    $intake = $_POST["intake"]; //сколько раз
// // Включение завтрака
// $meal_time = $mysqli->prepare("SELECT * FROM `meal_time`");
// $meal_time->execute();
// $meal_time_results = $meal_time->fetchAll(); 
// // кнопка обновления
// $random_key = array_rand($meal_time_results); // получаем случайный ключ
// $_SESSION['$random_key'] = $random_key;
    // 
    // $sql;
    // Название таблицы $diet_cart - какие продукты
    // $intake - сколько порций
        // если три то задействуются завтрак обед и ужин
        // 4 - один перекус
        // 5 - два
        // 6 -три
        // mysqli_query($mysqli, "INSERT INTO `meal_time`(`name`, `img`, `diet`, `PFC`, `prot_per_100_grams`, `fats_per_100_grams`, `carb_per_100_grams`, `call_per_100_grams`) VALUES ('Омлет с сыром и хлебом', '[2]', 'Балансированное','23:36:41', '6.9', '4.8', '12.4', '119')");
    // if ($intake == 3)
    // {

    // }else{

    // }
    // $calintake - какая порция в каждом приёме пищи
    // echo "табличка-".$diet_cart." каллории-".$calintake." сколько раз в день-".$intake;
    unset($_SESSION['meal']);
    $_SESSION['meal_time']['intake'] = $intake;
    $_SESSION['meal_time']['calintake'] = $calintake;
    // $_SESSION['calories'] = $calintake;

    // $_SESSION['eating'] = eating();
    // $eating = $_SESSION['eating'];

}

if(isset($_POST["heart"])){
    // $_SESSION['eating'] = eating();
    $value=$_POST["value"];
    $_SESSION['meal'][$value]=getMeal($value, true);
}
redirect();
//
// // Параметры подключения к базе данных
// $host = 'ваш_хост';
// $username = 'ваше_имя_пользователя';
// $password = 'ваш_пароль';
// $database = 'ваша_база_данных';

// // Подключение к базе данных
// $conn = mysqli_connect($host, $username, $password, $database);

// if (!$conn) {
//     die("Ошибка подключения: " . mysqli_connect_error());
// }

// // Количество калорий на день и количество приёмов пищи
// $калории_на_день = 2000;
// $приемы_пищи = 3;

// // Запрос к базе данных для выбора блюд
// $query = "SELECT * FROM блюда WHERE количество_калорий <= $калории_на_день ORDER BY RAND() LIMIT $приемы_пищи";

// $result = mysqli_query($conn, $query);

// if (mysqli_num_rows($result) > 0) {
//     while ($row = mysqli_fetch_assoc($result)) {
//         echo "Блюдо: " . $row["название_блюда"] . "<br>";
//         echo "Калории: " . $row["количество_калорий"] . "<br>";
//         echo "Углеводы: " . $row["количество_углеводов"] . "<br>";
//         echo "Белки: " . $row["количество_белков"] . "<br>";
//         echo "Жиры: " . $row["количество_жиров"] . "<br><br>";
//     }
// } else {
//     echo "Нет подходящих блюд.";
// }

// // Закрываем соединение с базой данных
// mysqli_close($conn);
//

?>