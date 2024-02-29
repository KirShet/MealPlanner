<div class="modal_dish_block">
                    <div class="dish">
                        <div class="graph">
                            <div class="dish_name">
                                <p><?= $eating['name'];?></p>
                            </div>
                            <div class="dish_img">
                                <img <?= href('img1/'.$eating['img'], '', 'src') ?> alt="" srcset="" style="">
                            </div>
                        </div>
                        <div class="techna">
                            <form <?= action('send_menu')?>>
                            <input type="submit" name="heart" class="heart" value="">
                            <input type="hidden" name="value" value="<?=$value?>">
                            </form>
                                <!-- <input type="submit" name="generate_descdiet" value="Создать"> -->
                                <!-- <img src="img/Heart.png" alt=""> -->
                            <div class="cheme">
                                <div style="height: <?= 1.5*substr($eating['PFC'], 6, 2);?>%" class="diagram carboh">У</div>
                                <div style="height: <?= 1.5*substr($eating['PFC'], 3, 2);?>%" class="diagram fat">Ж <?=$_SESSION['meal_time']['calintake']/$_SESSION['meal_time']['intake']/$eating['call_per_100_grams']*100?> гр</div>
                                <div style="height: <?= 1.5*substr($eating['PFC'], 0, 2);?>%" class="diagram protein">Б</div>
                                <!--  -->
                            </div>
                        </div>
                    </div>
                </div>