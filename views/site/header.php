
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/template/css/normalize.css">
    <link rel="stylesheet" href="/template/css/fonts.css">
    <link rel="stylesheet" href="/template/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="/template/css/style.css">
    <link rel="shortcut icon" href="/template/img/simbol.png" type="image/png">
    <title>Рецепт.тут</title>

</head>

<body>
    <div class="container">

        <header class="header">

            <div class="header__main-menu">
                <ul class="header__list">
                    <div class="header__menu">
                        
                        <a href="/"><img class="logo" src="/template/img/logo.png" alt=""></a>
                        <!-- <a class="header__recipes" href="/">Рецепты</a>  -->
                        <!-- <li>Категории блюд</li> -->
                        <div class="search">
                            <form action="/" method="post">
                                <input class="search__input" type="text" name="header__search" placeholder="Кто ищет, тот всегда найдет!...">
                                <button type="submit"></button>
                            </form>
                        </div>
                        <?php if(User::isGuest() == false):?>
                        <a class="header__parse" href="/parser/index">Парсинг</a>
                        <?php endif;?>

                         <?php if (isset($_SESSION['user'])) {
                               $user = User::getUserById($_SESSION['user']);
                               echo '<a class="header__reg" href="/cabinet">Пользователь '.$user['login'].'</a> ';  
                               
                               
                               
                            }
                            
                            else echo '<a class="header__reg" data-fancybox data-src="#modal" href="javascript:;">Вход | Регистрация</a> ';
                        ?>
                    </div>

                    
                </ul>
            </div>

           

        </header>