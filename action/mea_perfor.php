<?php

$uploaddir = '../img/';

function handleAddMealRequest() {
    $arr = ['name','carb_per_100_grams','fats_per_100_grams','prot_per_100_grams','img'];
    $fill_array = $_POST;

    if($_FILES['img']['name']) {
        $name_img = generateUniqueImageName();
        $fill_array['img'] = $name_img;
        echo '<br><br>работает';
    }

    $values = emptyValues($arr, $fill_array);

    if($values){
        $tmp_name = $_FILES['img']['tmp_name'];
        $uploadfile = $GLOBALS['uploaddir'] . $name_img;

        $fill_array['diet'] = 'Балансированное';
        calculatePFC($_POST, $fill_array);
        echo "тут2";
        print_r($fill_array);

        $arr = addExtraFields($arr);
        echo '<br>тут5';
        print_r($arr);

        $values = emptyValues($arr, $fill_array);
        echo "<br><br>тут3";
        print_r($values);

        if(isImageFile($_FILES['img']['type'])) {
            if(move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
                echo 'Z ecnfk';
                insertData('meal_time', $arr, $values);
            }
        }
    } else {
        echo 'gg';
    }
}

function generateUniqueImageName() {
    $name_img = uniqid() . '.' . substr($_FILES['img']['type'], 6);
    return $name_img;
}

function emptyValues($arr, $fill_array) {
    $values = array();
    foreach ($arr as $key) {
        if (empty($fill_array[$key])) {
            return false;
        }
        $values[] = $fill_array[$key];
    }
    return $values;
}

function calculatePFC($post, &$fill_array) {
    // рассчет диетических показателей
    $fill_array['PFC'] = ... ;  // рассчитанные значения
}

function addExtraFields($arr) {
    $extra_fields = ['diet', 'PFC', 'call_per_100_grams'];
    return array_merge($arr, $extra_fields);
}

function isImageFile($file_type) {
    return 'image' === substr(
$file_type, 0, 5);
}

function insertData($table, $columns, $values) {
    $columns_str = implode(',', $columns);
    $values_str = implode(',', $values);
    $query = "INSERT INTO $table ($columns_str) VALUES ($values_str)";
    // выполнение запроса к базе данных
    // ...
}

if(isset($_POST['add_meal'])) {
    handleAddMealRequest();
}
?>