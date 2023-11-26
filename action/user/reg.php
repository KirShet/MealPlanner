<?php
include "../../components/core.php";

if(isset($_POST['reg'])){
    $arr=['nickname','email','password'];
    $values = emptyValues($arr, $_POST);
    print_r($values);
    echo'<br><br>';
    if($_POST['password']===$_POST['repeat_password'] && $values){
        $values['password'] = md5($values['password']);
        $add = $mysqli->prepare("SELECT * FROM users WHERE `nickname` = :nickname OR `email` = :email ");
        $add->execute(['nickname' => $_POST['nickname'],'email' => $_POST['email']]);
        $users = $add->fetch();
        if($users){
            error('Никнейм или email заняты');
        }else{
            insert("users", $arr, $values);
            redirect();
        }
    }
}
redirect();
?>