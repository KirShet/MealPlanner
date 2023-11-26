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
    // require "../components/header.php";
    loadComponent('header');
    // $meal = getMeal($meal_name);
?>
    <main>
        <h1 class="foodvscal" style="width: 530px;">Продукты и их каллории!</h1>
        <section class="limit_table">
            <div class="limiter">
                <input type="text" name="src_dish" id="src_dish" placeholder="Поиск блюда">
                <h3>Блюда приёма пищи</h3>

                <form class="meals_table" id="myForm" <?= action('pita_nick')?>>
                    <div class="form_radio_btn">
                        <input id="break" type="radio" name="radio" value="break" onchange="submitForm()">
                        <label for="break">Завтрак</label>
                    </div>     
                    <div class="form_radio_btn">
                        <input id="snacks" type="radio" name="radio" value="snacks" onchange="submitForm()">
                        <label for="snacks">Перекусы</label>
                    </div>     
                    <div class="form_radio_btn">
                        <input id="lunch" type="radio" name="radio" value="lunch" onchange="submitForm()">
                        <label for="lunch">Обед</label>
                    </div>     
                    <div class="form_radio_btn">
                        <input id="dinner" type="radio" name="radio" value="dinner" onchange="submitForm()">
                        <label for="dinner">Ужин</label>
                    </div>                
                </form>

            </div>
            <div class="table">
                <table>
                    <thead>
                      <tr>
                        <td>Изображение</td>
                        <td>Название</td>
                        <td>Каллории</td>
                        <td>Углеводы</td>
                        <td>Жиры</td>
                        <td>Белки</td>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $a = '';
                    if(isset($_SESSION['meal']['name'])){
                        $a = $_SESSION['meal']['name'];
                    }
                    foreach (getMeal($a) as $eating) {?>
                        <tr>
                        <td><div class="img_tbl">
                            <img src="../img/<?=$eating['img']?>" alt>
                        </div></td>
                        <td><?=$eating['name']?></td>
                        <td><?=$eating['call_per_100_grams']?> ккал</td>
                        <td><?=$eating['carb_per_100_grams']?> гр</td>
                        <td><?=$eating['fats_per_100_grams']?> гр</td>
                        <td><?=$eating['prot_per_100_grams']?> гр</td>
                      </tr>
                    <?php }?>
                    </tbody>
                  </table>
                  <p class="podnad">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eveniet pariatur reiciendis eligendi fugiat nesciunt culpa, animi accusamus recusandae hic iusto eaque id laborum excepturi consectetur ab impedit maxime, tempore veritatis!</p>
            </div>
        </section>
    </main>
<?php 
    loadComponent('footer');
?>
