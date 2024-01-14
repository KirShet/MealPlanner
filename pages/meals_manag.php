<?php 
include '../components/core.php';
    // require "../components/header.php";
    loadComponent('header');
    // $meal = getMeal($meal_name);
    loadComponent('printHTML');
    if(!Access()){
        redirect('index');
    }
?>
    <main>
        <form class = "central" enctype="multipart/form-data" <?= action('meals_performer')?>>
        <input class="add_meal" type="submit" value="Создайвай!" name="add_meal">
            <section class="limit_table">
                <div class="table">
                    <table>
                        <thead>
                        <tr>
                            <td>Изображение</td>
                            <td>Название</td>
                            <td>Углеводы</td>
                            <td>Жиры</td>
                            <td>Белки</td>
                        </tr>
                        </thead>
                        <tbody class="manag">
                            <tr>
                            <td>
                                <!-- <img src="../img/'img'" alt> -->
                                <label class="custom-file-upload">
                                <?=сreatInput('img','png/jpg','file', 'jj');?>
                            </label>
                            </td>
                            <td><?=сreatInput('name','(50 символов)','text', 'jj');?></td>
                            <td><?=сreatInput('carb_per_100_grams','на 100 грамм','number', 'jj');?></td>
                            <td><?=сreatInput('fats_per_100_grams','на 100 грамм','number', 'jj');?></td>
                            <td><?=сreatInput('prot_per_100_grams','на 100 грамм','number', 'jj');?></td>
                        </tr>
                        </tbody>
                    </table>
                    <p class="podnad">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eveniet pariatur reiciendis eligendi fugiat nesciunt culpa, animi accusamus recusandae hic iusto eaque id laborum excepturi consectetur ab impedit maxime, tempore veritatis!</p>
                </div>
            </section>
        </form>
            <section class="limit_table">
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
                            <td>Удалить/Обновить</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $a = 'all';
                        foreach (getMeal($a) as $eating) {?>
                            <form enctype="multipart/form-data" <?= action('destroyer_meals')?>>
                                <tr>
                                    <td>
                                        <label class="custom-file-upload">
                                        <?=сreatInput('img','png/jpg','file', 'DelUp');?>
                                        <div class="img_tbl">
                                            <img src="../img/<?=$eating['img']?>" alt>
                                        </div>
                                    </td>
                                    <td>
                                    <?=сreatInput('name','(250 символов)','text', 'DelUp', $eating['name'], 'textarea');?></td>
                                    <td><?=сreatInput('call_per_100_grams','(11 символов)','text', 'DelUp inputDelUp', $eating['call_per_100_grams']);?> ккал</td>
                                    <td><?=сreatInput('carb_per_100_grams','(11 символов)','text', 'DelUp inputDelUp', $eating['carb_per_100_grams']);?> гр</td>
                                    <td><?=сreatInput('fats_per_100_grams','(11 символов)','text', 'DelUp inputDelUp', $eating['fats_per_100_grams']);?> гр</td>
                                    <td><?=сreatInput('prot_per_100_grams','(11 символов)','text', 'DelUp inputDelUp', $eating['prot_per_100_grams']);?> гр</td>
                                    <td>
                                            <?=сreatInput('id','id','hidden', 'id', $eating['id']);?>
                                            <?=сreatInput('del_meal','del_meal','submit', 'del_meal', '');?>
                                            <?=сreatInput('update_meal','update_meal','submit', 'update_meal', '');?>
                                            <!-- <input class="add_meal" type="submit" value="Удаляй!" name="del_meal"> -->
                                    </td>
                                </tr>
                            </form>
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
