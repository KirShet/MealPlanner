<?php
include "../components/core.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["del_meal"])) {
        // echo 'del';
        $arr =['id'];
        $values = emptyValues($arr, $_POST);
        $id = $_POST['id'];
        if($values){
            delete('meal_time', $id);
            // echo '<br><br>del';
            redirect();
        }
    }
    if (isset($_POST["update_meal"])) {
        echo 'update';
        $arr=['name','call_per_100_grams','carb_per_100_grams','fats_per_100_grams','prot_per_100_grams','diet','PFC'];

        $fill_array = $_POST;
        $id = $_POST['id'];
        // 
        if(isset($_POST["img"])){
            $uploaddir = '../img/';
            $name_img = uniqid().'.'.substr($_FILES['img']['type'], 6);
            $tmp_name = $_FILES['img']['tmp_name'];
            $uploadfile = $uploaddir . $name_img;

            $fill_array ['img']= $name_img;
            $arr['img'];
            //  
            if('image' == substr($_FILES['img']['type'], 0, 5)) {
                if(move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
                    $fill_array ['diet']= 'Балансированное';
                    PFC($_POST,$fill_array);
                    $values = emptyValues($arr, $fill_array);
                    echo'Z ecnfk';
                    update('meal_time', $arr, $values, $id);
                    // move_uploaded_file($tmp_name, $uploadfile);
                }
            }else{
                $_SESSION['errors']['img'] = 'Поле обязательно к заполнению';
                echo'работает';
            }
        }else{
            $fill_array ['diet']= 'Балансированное';
            PFC($_POST,$fill_array);
            $values = emptyValues($arr, $fill_array);
            echo'Z ecnfk';
            update('meal_time', $arr, $values, $id);
        }
    }
    redirect();
}