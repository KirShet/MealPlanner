<?php
    if(isset($_SESSION['eating'])){
        // $eating = $_SESSION['eating'];
    }
            // unset($_SESSION['meal_time']);
              if (isset($_SESSION['meal_time'])){

                if($_SESSION['meal_time']['intake'] == '5'){
                    $_SESSION['meals']=['break','second_break','lunch','snacks','dinner'];
                }else if($_SESSION['meal_time']['intake'] == '4'){
                    $_SESSION['meals']=['break','snacks','lunch','dinner'];
                }else if($_SESSION['meal_time']['intake'] == '3'){
                    $_SESSION['meals']=['break','lunch','dinner'];
                }else if($_SESSION['meal_time']['intake'] == '2'){
                    $_SESSION['meals']=['break','dinner'];
                }
                // print_r($_SESSION['meals']);
                $a = 0;
                foreach ($_SESSION['meals'] as $key => $value){
                    // echo'<br>'.$key.'/'.$value.'<br>';
                    // foreach (getMeal($value, true) as $eating) {
                    //     echo '<br>'.$eating.'<br><br><br>';
                    // }
                    if (isset($_SESSION['meal'][$value])){
                        $eating = $_SESSION['meal'][$value];
                        // echo'<br> есть '.$eating['name'].'<br>';
                    }else{
                        $eating = getMeal($value, true);
                        // echo'<br> нету '.$eating['name'].'<br>';
                    }
             ?>
            <div class="meal">
            <?($a++)?>
                <h2><?= RuName($value)?></h2>
                <input type="checkbox" name="modal_dish" id="modal_dish<?=($a)?>" class="dish_input">
                <!--  -->


                <div class="modal_dish_block">
                    <div class="dish">
                        <div class="graph">
                            <div class="dish_name">
                                <p><?= $eating['name'];?></p>
                            </div>
                            <div class="dish_img">
                                <img src="/img/<?= $eating['img'];?>" alt="" srcset="" style="">
                            </div>
                        </div>
                        <div class="techna">
                            <label for="modal_dish<?=($a)?>">
                                <div class="delete_modal"></div>
                            </label>
                                <!-- <input type="submit" name="generate_descdiet" value="Создать"> -->
                                <!-- <img src="img/Heart.png" alt=""> -->
                            <div class="cheme chemeModal">
                                <div class = "chart_line">
                                    <span>Масса: <?=round($_SESSION['meal_time']['calintake']/$_SESSION['meal_time']['intake']/$eating['call_per_100_grams']*100)?> гр</span>
                                    <div class="chart_line flex_chart">
                                        <div style="width: <?= substr($eating['PFC'], 6, 2);?>%" class="diagram carboh"></div>
                                        <div style="width: <?= substr($eating['PFC'], 3, 2);?>%" class="diagram fat"></div>
                                        <div style="width: <?= substr($eating['PFC'], 0, 2);?>%" class="diagram protein"></div>
                                    </div>
                                </div>
                                <div class = "chart_line">
                                    <!-- round($_SESSION['meal_time']['calintake']/$_SESSION['meal_time']['intake']/$eating['call_per_100_grams']*$eating['carb_per_100_grams']) -->
                                <span>Углеводы <?=nutrWeight($eating, 'carb').' ('.substr($eating['PFC'], 6, 2).'%)'?></span>
                                <div style="width: <?= 1.5*substr($eating['PFC'], 6, 2);?>%" class="diagram carboh"></div>
                                </div>
                                <div class = "chart_line">
                                <span>Жиры <?=nutrWeight($eating, 'fats').' ('.substr($eating['PFC'], 3, 2).'%)'?></span>
                                <div style="width: <?= 1.5*substr($eating['PFC'], 3, 2);?>%" class="diagram fat"></div>
                                </div>
                                <div class = "chart_line">
                                <span>Белки <?=nutrWeight($eating, 'prot').' ('.substr($eating['PFC'], 0, 2).'%)'?></span>
                                <div style="width: <?= 1.5*substr($eating['PFC'], 0, 2);?>%" class="diagram protein"></div>
                                </div>


                                <!--  -->
                            </div>
                        </div>
                    </div>
                </div>


                <!--  -->
                <label class="modal_dish" for="modal_dish<?=($a)?>">
                    <div class="dish">
                        <div class="graph">
                            <div class="dish_name">
                                <p><?= $eating['name'];?></p>
                            </div>
                            <div class="dish_img">
                                <img src="/img/<?= $eating['img'];?>" alt="" srcset="" style="">
                            </div>
                        </div>
                        <div class="techna">
                            <form id="heart_form" class = "heart_form" action = "#heart_form">
                            <input type="submit" name="heart" class="heart" value="">
                            <input type="hidden" name="value" value="<?=$value?>">
                            </form>
                                <!-- <input type="submit" name="generate_descdiet" value="Создать"> -->
                                <!-- <img src="img/Heart.png" alt=""> -->
                            <div class="cheme">
                                <div style="height: <?= 1.5*substr($eating['PFC'], 6, 2);?>%" class="diagram carboh">У</div>
                                <div style="height: <?= 1.5*substr($eating['PFC'], 3, 2);?>%" class="diagram fat">Ж</div>
                                <div style="height: <?= 1.5*substr($eating['PFC'], 0, 2);?>%" class="diagram protein">Б</div>
                                <!--  -->
                            </div>
                        </div>
                    </div>
                </label>
            </div>
            <?php
              }}else{
             ?>
            <div class="planning">
                <div class="positive">
                    <img src="img/Group.png" alt="позитив">
                    <p>Создайте или выберите рацион</p>
                    <p>Выбирайте свой идеальный рацион или адаптируйте готовые под свои цели и вкусы.</p>
                </div>
                <div class="positive">
                    <img src="img/Group(1).png" alt="позитив">
                    <p>Забудьте о заботах при выборе еды.</p>
                    <p>Заранее определите свой рацион и следуйте графику. Тогда вы достигнете нирваны и с удовольствием есть.</p>
                </div>
            </div>
            <!--  -->
            <?php
              }
             ?>