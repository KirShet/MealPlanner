<?php 
    include '../components/core.php';
    loadComponent('header');
    loadComponent('printHTML');
?>

 <main class="auto">
        <h1 class="foodvscal" style="width: 350px;">Авторизуйтесь!<br> <a <?= href('pages/user_reg')?>>Нет аккаунта?</a></h1>
        <!--  -->
        <form class="creat_block creat_block_user_reg" <?= action('user/log')?>>
                <div class="calintake calintake_users">
<!--  -->
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
                    <?=сreatInput('password','Пароль ','password');?>
                </div>
                <div class="create create_user_reg">
                    <input type="submit" name="log" value="Создать аккаунт">
                </div>
                <div class="logo_div logo_user_reg">
                    <img src="/img/Безымянный-2.png" alt="">
                </div>
        </form>
</main>

<?php 
    loadComponent('footer');
?>
