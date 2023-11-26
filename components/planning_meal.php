<?php
    if(isset($_SESSION['eating'])){
        $eating = $_SESSION['eating'];
    }
            // unset($_SESSION['meal_time']);
              if (isset($_SESSION['meal_time'])){
             ?>
            <div class="meal">
                <h2>Завтрак</h2>
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
                        <form <?= action('send_menu')?>>
                        <input type="submit" name="heart" class="heart" value="">
                        </form>
                            <!-- <input type="submit" name="generate_descdiet" value="Создать"> -->
                            <!-- <img src="img/Heart.png" alt=""> -->
                        <div class="cheme">
                            <div style="height: <?= 1.6*substr($eating['PFC'], 6, 2);?>%" class="diagram carboh"></div>
                            <div style="height: <?= 1.6*substr($eating['PFC'], 3, 2);?>%" class="diagram fat"></div>
                            <div style="height: <?= 1.6*substr($eating['PFC'], 0, 2);?>%" class="diagram protein"></div>
                            <!--  -->
                        </div>
                    </div>
                </div>
            </div>
            <?php
              }else{
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