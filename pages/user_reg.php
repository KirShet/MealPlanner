<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/test.css">
    <title>Document</title>
</head> -->
<?php 
    include '../components/core.php';
    loadComponent('header');
    loadComponent('printHTML');
?>

 <main class="auto">
        <h1 class="foodvscal" style="width: 350px;">Зарегистрируйтесь! <a <?= href('pages/user_log')?>>Уже есть аккаунт?</a></h1>
        <!--  -->
        <form class="creat_block creat_block_user_reg" <?= action('user/reg')?>>
                <div class="calintake calintake_users">
                <?printError()?>
                    <!-- <div class="calintakestring1">
                        <p>Никнейм </p>
                    </div>
                        <input type="text" class="call" id="quantity" name="nickname">

                    <div class="calintakestring1">
                        <p>Email </p>
                    </div>
                        <input type="text" class="call" id="quantity" name="email">

                    <div class="calintakestring1">
                        <p>Пароль </p>
                    </div>
                        <input type="text" class="call" id="quantity" name="password">

                    <div class="calintakestring1">
                        <p>Повторите пароль </p>
                    </div>
                        <input type="text" class="call" id="quantity" name="repeat_password"> -->

                    <?=сreatInput('nickname','Никнейм ','text');?>
                    <?=сreatInput('email','Email ','email');?>
                    <?=сreatInput('password','Пароль ','password');?>
                    <?=сreatInput('repeat_password','Повторите пароль ','password');?>
                </div>
                <div class="create create_user_reg">
                    <input type="submit" name="reg" value="Создать аккаунт">
                </div>
                <div class="logo_div logo_user_reg">
                    <img src="/img/Безымянный-2.png" alt="">
                </div>
        </form>
</main>

<?php 
    loadComponent('footer');
?>
