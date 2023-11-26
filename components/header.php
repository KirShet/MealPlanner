<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/test.css">
    <title>Document</title>
</head>
<body>
    <header>
            <nav>
                <div class="logo_div">
                    <img src="/img/Безымянный-2.png" alt="">
                </div>
                <div class="links">
                    <ul>
                        <li><a <?= href('index')?>>Первый параграф</a></li>
                        <li><a <?= href('pages/pita_nick')?> >Питательность продуктов</a></li>
                        <li><a href="">Приёмы пищи</a></li>
                        <? if(Access()){?>
                            <li><a <?= href('pages/meals_manag')?> >Прибавить приём пищи</a></li>
                        <?}?>
                    </ul>
                </div>
                <div class="subs">
                    <?if(isset($_SESSION['user']['id'])){?>
                    <a <?= href('action/user/exit')?>>
                    <input type="button" value="Выйти">
                    </a>
                    
                    <p>Пока! Приходите позже.</p>
                    <?}else{?>
                    <a <?= href('pages/user_reg')?>>
                    <input type="button" value="Подписаться">
                    </a>
                    
                    <p>Проигнорируете, потеряете прекрасное. Подпишитесь!</p>
                    <?}?>
                </div>
            </nav>
            <div class="calcul_open">
                <input type="checkbox" name="calcul" id="calcul">
                <div class="calculatorblock">
                    <p>Формула Миффлина — Сан-Жеора выглядит так:
                    <ul>
                        <li>Для женщин: (10 × вес в килограммах) + (6,25 × рост в сантиметрах) − (5 × возраст в годах) − 161</li>
                        <li>Для мужчин: (10 × вес в килограммах) + (6,25 × рост в сантиметрах) − (5 × возраст в годах) + 5</li>
                    </ul>
                    </p>
                    <label for="l1">Женщина</label>
                    <input type="radio" name="l" id="l1" value="female">
                    <label for="l2">Мужчина</label>
                    <input type="radio" name="l" id="l2" value="male">
                    <br>
                    <input type="number" step="1" min="162" max="200" class="call" id="height" name="height" placeholder="Рост(см)">
                    <input type="number" step="0.1" min="48" max="120" class="call" id="weight" name="weight" placeholder="Вес(кг)">
                    <input type="number" step="1" min="17" max="80" class="call" id="age" name="age" placeholder="Возраст(лет)">
                    <label for="intake">Уровень физической активности:
                    </label>
                    <select class="intake" id="intake">
                    <option value="">Выберите пункт</option>
                    <option value="1">xxx</option>
                    <option value="2">xxx</option>
                    <option value="3">xxx</option>
                    <option value="4">xxx</option>
                    </select>
                </div>
                <label class="hui" for="calcul"><img src="/img/calc.png" alt="" srcset=""></label>
            </div>
        </header>

    