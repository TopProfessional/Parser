<?php include ROOT.'/views/site/header.php';?>

<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form class="parse__form" action="#" method="post">
        <div class="label__parse">Источник:</div>
        <select class="input__parse" name="source" >
            <option value="1">https://grandkulinar.ru/recepies/</option>
            <option value="2">https://www.povarenok.ru/recipes/</option>
            <option value="3">https://kuharka.ru/recipes/</option>
        </select>
        <div class="label__parse">Начальная страница:</div>
        <input class="input__parse parse__page" name="start" type="number" min="1" value="1" width="45">
        <div class="label__parse">Кол-во страниц:</div>
        <input class="input__parse parse__kol" name="kolOfPages" type="number" min="1" max="25" value="1">
        <div class="label__parse">Категория:</div>
        <select class="input__parse" name="cat" >
            <option value="0">Все</option>
            <option value="1">супы</option>
            <option value="2">Горячие блюда</option>
            <option value="3">салаты</option>
            <option value="4">Закуски</option>
            <option value="5">Выпечка</option>
            <option value="6">Десерты</option>
            <option value="7">Соусы</option>
            <option value="8">Напитки</option>
            
        </select>
        <div class="label__parse">Название:</div>
        <input class="input__parse" name="name" type="text" placeholder="название">
        <br>
        <button  type="submit" name="parse_post">Найти</button>
    </form>
    

    <?php 
    //$dishes = array();
        
    if(isset($parse_dishes))
    {
        $dishes = $parse_dishes;
    }
    if(isset($parse_dishes_all))
    {
        $dishes = $parse_dishes_all;
    }
    if(isset($parse_dishes) && isset($parse_dishes_all))
    {
        $dishes = array_merge($parse_dishes, $parse_dishes_all);
    }
    ?>



    <?php if(isset($dishes)):?>
        <form class="ll" name="myform" action="/parser/addDishes" method="post">
        <div class="parse__buttons">
            <p>Выбрать все<input class="parse__checkbox" id="elem" type="checkbox" checked="checked" onClick="CheckAll(document.myform)"></p>
            <button name="submit1" type = "submit">Добавить на сайт</button>
            <button name="submit2">Добавить на сайт + в книгу рецептов</button>
            
        </div>
    
    
    
    
        <?php foreach($dishes as $parse_dish):?>
        
            <div class="item">
                <!-- <img src="../template/img/1616447354_zapekanka-iz-makaron-s-zelenym-garnirom-small.jpg" alt=""> -->
                <img src="<?php echo $parse_dish['img'];?>" alt="" width='150px' height='150px'>
                <div class="item__info">
                    <div class="item__name"><?php echo $parse_dish['name'];?></div>
                    <div class="item__cat"><label>Категория:</label><?php echo $parse_dish['cat'];?></div>
                    
                    <a class="item__link" target="_blank" href="<?php echo $parse_dish['link']; ?>">Подробнее</a>
                    <div>
                       <p>Выбрать<input class="parse__checkbox" checked="checked" type="checkbox" name="check[]" value="<?php echo $parse_dish['id'];?>"></p> 
                    </div>
                    
                </div>
            </div>
            
            <div class="hide">
            <input  type="text" name="name[]" value="<?php echo $parse_dish['name'];?>">
            <input type="text" name="img[]" value="<?php echo $parse_dish['img'];?>">
            <input type="text" name="link[]" value="<?php echo $parse_dish['link'];?>">
            <input type="text" name="cat[]" value="<?php echo $parse_dish['cat'];?>">
            <input type="text" name="id[]" value="<?php echo $parse_dish['id'];?>">
            </div>


        <?php endforeach;?>
    </form>

    <?php endif;?>

</body>
<script>

function CheckAll(chk)
        {
            if(document.getElementById('elem').checked == true) 
            for (i = 0; i < chk.length; i++)
            {
                //if(chk[i].checked == false)
                chk[i].checked = true ;
            }
            if(document.getElementById('elem').checked == false) 
            for (i = 0; i < chk.length; i++)
            {
                //if(chk[i].checked == false)
                chk[i].checked = false ;
            }
            
        }
</script>
</html>

<?php include ROOT.'/views/site/footer.php';?>