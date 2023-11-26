<?php
include '../components/core.php';

$uploaddir = '../img/';  
 
if(isset($_POST['add_meal'])) {  
    $arr = ['name','carb_per_100_grams','fats_per_100_grams','prot_per_100_grams','img'];  
 
    $fill_array = $_POST;  
    if($_FILES['img']['name']) {  
        print_r($_FILES);  
        $name_img = uniqid().'.'.substr($_FILES['img']['type'], 6);  
        $fill_array['img'] = $name_img;  
        echo '<br><br>работает';  
    }  
 
    $values = emptyValues($arr, $fill_array);  
    if($values){ 
        $tmp_name = $_FILES['img']['tmp_name'];  
        $uploadfile = $uploaddir . $name_img;  
 
        $fill_array['diet'] = 'Балансированное';  
        PFC($_POST, $fill_array);  
        echo "тут2";  
        print_r($fill_array);  
 
        array_push($arr, 'diet', 'PFC', 'call_per_100_grams');  
        echo '<br>тут5';  
        print_r($arr);  
 
        $values = emptyValues($arr, $fill_array);  
        echo "<br><br>тут3";  
        print_r($values);  
 
        if('image' == substr($_FILES['img']['type'], 0, 5)) {  
            if(move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {  
                echo 'Z ecnfk';  
                insert('meal_time', $arr, $values);  
            }  
        }  
    } else {  
        // echo 'gg';  
    }  
}
redirect();
?>