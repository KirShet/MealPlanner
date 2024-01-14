<?php
include 'components/core.php';
?>

<?php 
    loadComponent('header');

    // $meal_time = mysqli_query($mysqli, "SELECT * FROM `meal_time`");
    // $meal_time_results = mysqli_fetch_all($meal_time, MYSQLI_ASSOC);
    // // кнопка обновления
    // // $random_key = array_rand($meal_time_results); // получаем случайный ключ
    // if (isset($_SESSION['$random_key'])) {
    //     $random_key = $_SESSION['$random_key'];
    //     $eating = $meal_time_results[$random_key]; // получаем значение по ключу
    //     // $grams_mult = $_SESSION['calories'] / $eating['call_per_100_grams'];
    //     $_SESSION['$random_key'] = array_rand($meal_time_results); // получаем случайный ключ
    // }

    // $eating = eating();
?>
    <main>
        <section>
            <h1  style="width: 530px;">Сделайте свою диету легкой и удобной</h1>
            <p>Meal Planner поможет вам составить индивидуальный план питания, учитывающий ваши вкусы. Вы сможете достичь своих диетических и питательных целей с помощью нашего калькулятора калорий и ежедневных меню.
                <?php echo '<pre>';
                print_r($_SESSION);
                echo '</pre>';?>
                </p>
            <p>Присоединяйтесь, или проиграете!</p>
            <p style="font-size: 20px;">Готовы? Сообщите нам о своём рационе.</p>

            <form class="creat_block" <?= action('send_menu')?>>
                <!-- <div> -->
                <?loadComponent('descdiet', '1');?>
                <!-- </div> -->
                <!-- <div> -->
                <?loadComponent('descdiet', '2');?>
                <!-- </div> -->

                <?loadComponent('descdiet', '3');?>
                <?loadComponent('descdiet', '4');?>
                <?loadComponent('descdiet', '5');?>
                <div class="calintake">
                    <div class="calintakestring1">
                        <p>Сколько я хочу есть </p>
                    </div>
                    <!-- <div class="call">  -->
                        <input type="number" step="100" class="call" id="quantity" name="calintake" min="1500" max="5000">
                    <br><!-- </div> -->
                    <div class="calintakestring2">
                        <p>Сколько раз я хочу </p>
                    </div>
                        <select name = "intake" class="intake">
                            <option value="2">Завтрак и Ужин</option>
                            <option value="3">Завтрак, обед и ужин</option>
                            <option value="4">Четыре приёма пищи</option>
                            <option value="5">Пять приёмов пищи</option>
                          </select>
                </div>
                <?loadComponent('descdiet', '6');?>
                <div class="create">
                    <input type="submit" name="generate_descdiet" value="Создать">
                </div>
            </form>

            <h1 style="width: 700px;" >Питайтесь просто и правильно</h1>
            <!--  -->
            <?php loadComponent('planning_meals');?>

            <!--  -->
            <!--  -->
        </section>
    </main>
    <main style="background-color: #2d303cf2;">
        <section class="black_section">
            <h1>Измени рацион</h1>
            <div class="change">
                <div class="name_change">
                    <h2>1. Создавай</h2>
                </div>
                <div>
                    <div class="img">
                        <img src="./img/Rectangle4.png" alt="">
                    </div>
                </div>
                <div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto distinctio beatae ab cumque illo magni aliquid, molestias reprehenderit eum dolor quae officiis cum ipsum reiciendis quia nobis, quisquam excepturi tempore!</p>
                </div>
            </div>
            
            <div class="change">
                <div class="name_change">
                    <h2>1. Создавай</h2>
                </div>
                <div>
                    <div class="img">
                        <img src="./img/Rectangle4.png" alt="">
                    </div>
                </div>
                <div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto distinctio beatae ab cumque illo magni aliquid, molestias reprehenderit eum dolor quae officiis cum ipsum reiciendis quia nobis, quisquam excepturi tempore!</p>
                </div>
            </div>

            <div class="change">
                <div class="name_change">
                    <h2>1. Создавай</h2>
                </div>
                <div>
                    <div class="img">
                        <img src="./img/Rectangle4.png" alt="">
                    </div>
                </div>
                <div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto distinctio beatae ab cumque illo magni aliquid, molestias reprehenderit eum dolor quae officiis cum ipsum reiciendis quia nobis, quisquam excepturi tempore!</p>
                </div>
            </div>

            <div class="change">
                <div class="name_change">
                    <h2>1. Создавай</h2>
                </div>
                <div>
                    <div class="img">
                        <img src="./img/Rectangle4.png" alt="">
                    </div>
                </div>
                <div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto distinctio beatae ab cumque illo magni aliquid, molestias reprehenderit eum dolor quae officiis cum ipsum reiciendis quia nobis, quisquam excepturi tempore!</p>
                </div>
            </div>
        </section>
    </main>
<?php 
    // require "components/footer.php";
    loadComponent('footer');
?>
