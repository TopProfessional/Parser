-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 09 2021 г., 15:01
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testa`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `dish_id` varchar(10) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `dish_id`, `comment`) VALUES
(1, '1', '1', 'Комент про боршь админа'),
(2, '1', '2', 'commentarrrrrrr'),
(3, '1', '3', 'КОмент Харчо Админ'),
(4, '2', '12', 'comment'),
(5, '11', '11', 'comment'),
(6, '4', '17', 'comment'),
(9, '2', '1', 'прок'),
(10, '2', '3', 'цацаца'),
(11, '25', '1', ''),
(12, '25', '3', 'tuiyu'),
(13, '9', '1', 'прокl'),
(14, '9', '35', 'k'),
(17, '9', '55', 'g');

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` text NOT NULL,
  `image` text NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `name`, `category`, `image`, `link`) VALUES
(1, 'борщь', 'суп, овощи, диета', 'https://www.povarenok.ru/data/cache/2021mar/25/17/2847360_10239-710x550x.jpg', 'https://www.povarenok.ru/recipes/show/170904/'),
(3, 'Харчо', 'egeg,egeg,egeg', 'https://www.povarenok.ru/data/cache/2021apr/16/11/2859161_98284-330x220x.jpg', 'ацацац'),
(4, 'окрошка', 'колбаса, мазик, рп', 'https://www.povarenok.ru/data/cache/2021apr/16/01/2859008_97941-330x220x.jpg', 'fwfwfwfwfwff.com'),
(5, 'пюре', 'колбаса, мазик, рп', 'https://www.povarenok.ru/data/cache/2021apr/08/56/2854844_60608-330x220x.jpg', 'fwfwfwfwfwff.com'),
(6, 'салат', 'колбаса, мазик, рп', 'https://www.povarenok.ru/data/cache/2021apr/16/48/2858766_80952-330x220x.jpg', 'fwfwfwfwfwff.com'),
(7, 'Картошка', 'колбаса, мазик, рп', 'https://www.povarenok.ru/data/cache/2021apr/15/26/2858540_59756-330x220x.jpg', 'fwfwfwfwfwff.com'),
(8, 'Окорочок', 'колбаса, мазик, рп', 'https://www.povarenok.ru/data/cache/2021apr/15/44/2858755_96567-330x220x.jpg', 'fwfwfwfwfwff.com'),
(9, 'Бублик', 'колбаса, мазик, рп', 'https://www.povarenok.ru/data/cache/2021apr/15/54/2858721_20923-330x220x.jpg', 'fwfwfwfwfwff.com'),
(10, 'Булочка', 'колбаса, мазик, рп', 'https://www.povarenok.ru/data/cache/2021apr/15/38/2858566_75301-330x220x.jpg', 'fwfwfwfwfwff.com'),
(11, 'колбаса', 'колбаса, мазик, рп', 'https://www.povarenok.ru/data/cache/2021apr/15/32/2858429_80608-330x220x.jpg', 'fwfwfwfwfwff.com'),
(17, 'Постная пицца', 'Выпечка,Пицца,', 'https://www.povarenok.ru/data/cache/2021apr/29/38/2864695_34655-330x220x.jpg', 'https://www.povarenok.ru/recipes/show/171752/'),
(18, 'Отрывной пирог с ябл', 'Выпечка,Изделия из теста,Пироги,', 'https://www.povarenok.ru/data/cache/2021apr/29/04/2864768_28913-330x220x.jpg', 'https://www.povarenok.ru/recipes/show/171750/'),
(20, 'Киноа с овощами', 'Горячие блюда,Блюда из круп,', 'https://www.povarenok.ru/data/cache/2021apr/29/05/2864709_11229-330x220x.jpg', 'https://www.povarenok.ru/recipes/show/171751/'),
(24, 'Буррито с фрикадельк', 'Фаст-фуд,Тортильи,Закуски,Бутерброды,С соусами,Мясные,', 'https://grandkulinar.ru/uploads/posts/2021-04/1619668693_burrito-s-frikadelkami-i-sousom-chipotle-small.jpg', 'https://grandkulinar.ru/14748-burrito-s-frikadelka'),
(25, 'Канапе с маслом из кильки', 'Закуски,Бутерброды,Канапе,', 'https://www.povarenok.ru/data/cache/2021apr/29/49/2864874_17299-330x220x.jpg', 'https://www.povarenok.ru/recipes/show/171790/'),
(26, 'Тунец с картофелем и маринованными огурцами', 'Салаты,Салаты из рыбы и морепродуктов,Рыбные салаты,', 'https://www.povarenok.ru/data/cache/2021apr/30/43/2865357_83387-330x220x.jpg', 'https://www.povarenok.ru/recipes/show/171789/'),
(27, 'Салат \"Черепашка\"', 'Салаты,Салаты из рыбы и морепродуктов,Салаты из морепродуктов,', 'https://www.povarenok.ru/data/cache/2021may/01/31/2865775_35536-330x220x.jpg', 'https://www.povarenok.ru/recipes/show/171814/'),
(28, 'Пасха \"Карамельная\" с шоколадными каплями', 'Десерты,Другие десерты,Творожные десерты,', 'https://www.povarenok.ru/data/cache/2021may/01/02/2865858_91550-330x220x.jpg', 'https://www.povarenok.ru/recipes/show/171817/'),
(29, 'Картофельный салат с копченым лососем', 'Балканская кухня,Салаты из рыбы и морепродуктов,', 'https://kuharka.ru/images/users/gallery/2021/04/29/436308_360x0_center.jpg', 'https://kuharka.ru/recipes/salad/fish_salad/25500.html'),
(30, 'Сэндвич «Слоппи-Джо» с быстрыми маринованными огур', 'Фаст-фуд,Сэндвичи,Закуски,Бутерброды,', 'https://grandkulinar.ru/uploads/posts/2021-04/1619662843_sehndvich-sloppi-dzho-s-bystrymi-marinovannymi-ogurcami-v-korejskom-stile-small.jpg', 'https://grandkulinar.ru/14740-sendvich-sloppi-dzho-s-bystrymi-marinovannymi-ogurcami-v-koreyskom-sti'),
(31, 'Простое сырное фондю «Скажи сыр»', 'Закуски,Сырные,Соусы,Дип-соусы,', 'https://grandkulinar.ru/uploads/posts/2021-04/1619675844_prostoe-syrnoe-fondyu-skazhi-syr-small.jpg', 'https://grandkulinar.ru/14761-prostoe-syrnoe-fondyu-skazhi-syr.html'),
(34, 'Креветки темпура с заправкой «Баффало»', 'Закуски,С соусами,Рыбные,', 'https://grandkulinar.ru/uploads/posts/2021-04/1619675297_krevetki-tempura-s-zapravkoj-baffalo-small.jpg', 'https://grandkulinar.ru/14760-krevetki-tempura-s-zapravkoy-baffalo.html'),
(35, 'Пицца с креветками скампи', 'Выпечка,Пироги,Закуски,Бутерброды,Рыбные,', 'https://grandkulinar.ru/uploads/posts/2021-04/1619675024_picca-s-krevetkami-skampi-small.jpg', 'https://grandkulinar.ru/14759-picca-s-krevetkami-skampi.html'),
(38, 'Эгг-роллы с начинкой из чёрной фасоли и мексиканских специй с томатным дипом', 'Закуски,Бутерброды,С соусами,Овощные,', 'https://grandkulinar.ru/uploads/posts/2021-04/1619674655_ehgg-rolly-s-nachinkoj-iz-chernoj-fasoli-i-meksikanskih-specij-s-tomatnym-dipom-small.jpg', 'https://grandkulinar.ru/14758-egg-rolly-s-nachinkoy-iz-chernoy-fasoli-i-meksikanskih-speciy-s-tomatnym-dipom.html'),
(41, 'Пицца «Пронто»', 'Закуски,Бутерброды,', 'https://grandkulinar.ru/uploads/posts/2021-04/1619647181_picca-pronto-small.jpg', 'https://grandkulinar.ru/14729-picca-pronto.html'),
(42, 'Корзиночки с вишней «Зазноба»', 'Десерты,Печенье,Пирожные,', 'https://grandkulinar.ru/uploads/posts/2021-02/1613239246_korzinochki-s-vishnej-zaznoba-small.jpg', 'https://grandkulinar.ru/14582-korzinochki-s-vishney-zaznoba.html'),
(43, 'Палочки из слоёного теста с чеддером', 'Выпечка,Пирожки, булки,Закуски,Снеки,С соусами,', 'https://grandkulinar.ru/uploads/posts/2021-01/1610811701_palochki-iz-sloenogo-testa-s-chedderom-small.jpg', 'https://grandkulinar.ru/14501-palochki-iz-sloenogo-testa-s-chedderom.html'),
(44, 'Новогодняя пицца «Карамельная трость»', 'Основные блюда,Выпечка,Пирожки, булки,', 'https://grandkulinar.ru/uploads/posts/2020-12/1608810153_novogodnyaya-picca-karamelnaya-trost-small.jpg', 'https://grandkulinar.ru/14414-novogodnyaya-picca-karamelnaya-trost.html'),
(45, 'Круассаны с миндальной и шоколадной начинками', 'Выпечка,Десерты,Пончики, пирожки, булки,', 'https://grandkulinar.ru/uploads/posts/2020-12/1607533284_kruassany-s-mindalnoj-i-shokoladnoj-nachinkami-small.jpg', 'https://grandkulinar.ru/14233-kruassany-s-mindalnoy-i-shokoladnoy-nachinkami.html'),
(46, 'Быстрый хлеб с ветчиной и сыром', 'Выпечка,Хлеб,', 'https://grandkulinar.ru/uploads/posts/2020-12/1607189641_bystryj-hleb-s-vetchinoj-i-syrom-small.jpg', 'https://grandkulinar.ru/14188-bystryy-hleb-s-vetchinoy-i-syrom.html'),
(47, 'Простые банановые панкейки из двух ингредиентов', 'Десерты,Блины, оладьи, вафли,', 'https://grandkulinar.ru/uploads/posts/2020-11/1605530920_prostye-bananovye-pankejki-iz-dvuh-ingredientov-small.jpg', 'https://grandkulinar.ru/14086-prostye-bananovye-pankeyki-iz-dvuh-ingredientov.html'),
(48, 'Шоколадное печенье с арахисовой пастой без выпечки', 'Десерты,Печенье,Сухие завтраки,', 'https://grandkulinar.ru/uploads/posts/2020-11/1605529385_shokoladnoe-pechene-s-arahisovoj-pastoj-bez-vypechki-small.jpg', 'https://grandkulinar.ru/14082-shokoladnoe-pechene-s-arahisovoy-pastoy-bez-vypechki.html'),
(49, 'Сухая смесь для быстрых панкейков', 'Выпечка,Драники, блины,Десерты,Блины, оладьи, вафли,', 'https://grandkulinar.ru/uploads/posts/2020-06/1591814966_suhaya-smes-dlya-bystryh-pankejkov-small.jpg', 'https://grandkulinar.ru/13731-suhaya-smes-dlya-bystryh-pankeykov.html'),
(50, 'Базовое тесто для панкейков', 'Десерты,Блины, оладьи, вафли,', 'https://grandkulinar.ru/uploads/posts/2020-06/1591381185_bazovoe-testo-dlya-pankejkov-small.jpg', 'https://grandkulinar.ru/13684-bazovoe-testo-dlya-pankeykov.html'),
(51, 'Тесто для пиццы из двух ингредиентов', 'Выпечка,Пироги,Закуски,Бутерброды,', 'https://grandkulinar.ru/uploads/posts/2020-05/1590922723_testo-dlya-piccy-iz-dvuh-ingredientov-small.jpg', 'https://grandkulinar.ru/13626-testo-dlya-piccy-iz-dvuh-ingredientov.html'),
(52, 'Печенье «Ушки» с корицей', 'Десерты,Печенье,', 'https://grandkulinar.ru/uploads/posts/2020-05/1590918277_pechene-ushki-s-koricej-small.jpg', 'https://grandkulinar.ru/13616-pechene-ushki-s-koricey.html'),
(53, 'Оладьи на молоке с кукурузной мукой', 'Выпечка,Драники, блины,Закуски,С соусами,', 'https://grandkulinar.ru/uploads/posts/2020-05/1589568405_oladi-na-moloke-s-kukuruznoj-mukoj-small.jpg', 'https://grandkulinar.ru/13482-oladi-na-moloke-s-kukuruznoy-mukoy.html'),
(54, 'Песочный корж для американского пирога', 'Десерты,Пироги, тарты, запеканки,', 'https://grandkulinar.ru/uploads/posts/2020-05/1589216232_pesochnyj-korzh-dlya-amerikanskogo-piroga-small.jpg', 'https://grandkulinar.ru/13422-pesochnyy-korzh-dlya-amerikanskogo-piroga.html'),
(55, 'Самое быстрое слоёное тесто', 'Выпечка,Пироги,Пирожки, булки,Десерты,Печенье,Пирожные,Фрукты,Пироги, тарты, запеканки,Пончики, пирожки, булки,Закуски,Канапе,', 'https://grandkulinar.ru/uploads/posts/2020-05/1589207970_samoe-bystroe-sloenoe-testo-small.jpg', 'https://grandkulinar.ru/13415-samoe-bystroe-sloenoe-testo.html'),
(56, 'Простые датские слойки с сырным кремом', 'Выпечка,Пирожки, булки,Десерты,Пончики, пирожки, булки,', 'https://grandkulinar.ru/uploads/posts/2020-04/1586199657_prostye-datskie-slojki-s-syrnym-kremom-small.jpg', 'https://grandkulinar.ru/12922-prostye-datskie-sloyki-s-syrnym-kremom.html');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `login` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `chosen_dish` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `login`, `password`, `chosen_dish`) VALUES
(1, 'Vik@gmail.com', 'admin', 'admin', ',8,3,7,1,18'),
(2, 'fgfhjf@ukr.net', 'user1', 'user1', ',1,4,3,3,10'),
(3, 'd.od@ukr.net', 'fff', 'fff', ',1,3,7,9'),
(9, 'ema@il', 'login', 'password', ',34,34,56,55,54,28,27'),
(14, 'regre@gregre', 'ergergerg', 'ergregergreg', ''),
(15, 'erg@ergerg', 'egegerg', 'ergregerger', ''),
(20, 'd.od@ukfr.net', 'adminu', 'admin', ''),
(21, 'd.od@ukr.netfefeff', 'adminefef', 'feffefefef', ''),
(22, 'dfwfw.odfwf@ukwfwfr.net', 'igor345', '3424251f', ''),
(23, 'd4545.odfefef@ukr.net', 'igor', 'fefefefef', ''),
(24, 'd.od@ukr.netefefefefef', 'igor23', 'effefeef', ''),
(25, 'gvvvv@gmail.com', 'Magic', 'magicargg1', ',1,3'),
(26, 'kertik@f.vp', 'kertik', 'kertikkertik', ',38');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
