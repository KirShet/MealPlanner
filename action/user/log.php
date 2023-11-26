<?php
include "../../components/core.php";
if(isset($_POST["log"])){
    $arr=['nickname','password'];
    $values = emptyValues($arr, $_POST);
    // print_r($values);
    $values['password'] = md5($values['password']);

    $query = $mysqli->prepare("SELECT * FROM `users` WHERE `nickname` = :nickname AND `password` = :password");
    $query->execute($values);
    $user = $query->fetch();

    if($user){
        $_SESSION['user'] = [
            'id'=> $user['id'],
        ];
        redirect('index');
    }else{
        error('Не верный логин или пароль');
    }
}
redirect();
?>