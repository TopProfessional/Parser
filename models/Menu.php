<?php

class Menu
{

    const SHOW_BY_DEFAULT = 5;

    public static function getDishesList($page = 1)
    {
        $db = Db::getConnection();
        $count = self::SHOW_BY_DEFAULT;

        $page= intval($page);

        $offset=($page - 1) * self::SHOW_BY_DEFAULT;
            
        $result = $db->query('SELECT * FROM menu   ORDER BY id DESC    limit '.$count. ' OFFSET '.$offset);

        $dishesList = array();
        $i = 0;

        while ($row = $result->fetch()) {
        
            $dishesList[$i]['id'] = $row['id'];
            $dishesList[$i]['name'] = $row['name'];
            $dishesList[$i]['image'] = $row['image'];
            $dishesList[$i]['category'] = $row['category'];
            //$dishesList[$i]['author'] = $row['author'];
            $dishesList[$i]['link'] = $row['link'];
            $i++;
        }
        return $dishesList;
    }

    public static function getCountOfDishes()
    {
        $db = Db::getConnection();
            
        $result = $db->query('SELECT * FROM menu');

        $countOfDishes = 0;

        while ($row = $result->fetch()) {
        
            $countOfDishes++;
        }
        return $countOfDishes;
    }

    // public static function getDisheByIds($massOfIds)
    // {
    //         $db = Db::getConnection();
    //         $sql = 'SELECT * FROM menu WHERE id = :id';

    //         $result = $db->prepare($sql);

            
    //             //echo $massOfIds[$i].' ';
    //             $result->bindParam(':id', $massOfIds[$i], PDO::PARAM_INT);

    //             // Указываем, что хотим получить данные в виде массива
    //         $result->setFetchMode(PDO::FETCH_ASSOC);
    //         $result->execute();
    //         }


    //         return $result->fetch();
    // }


    public static function getDishesByIds($massOfIds)
    {
            $db = Db::getConnection();
            $strOfIds = implode(',', $massOfIds);

            $sql = "SELECT * FROM menu WHERE id IN ($strOfIds)  ORDER BY id DESC";

            
            $dishes = array();
            $result = $db->query($sql);        
            $result->setFetchMode(PDO::FETCH_ASSOC);
        
            $i = 0;
            while ($row = $result->fetch()) {
                $dishes[$i]['id'] = $row['id'];
                $dishes[$i]['name'] = $row['name'];
                $dishes[$i]['image'] = $row['image'];
                $dishes[$i]['category'] = $row['category'];
                //$dishes[$i]['author'] = $row['author'];
                $dishes[$i]['link'] = $row['link'];
                $i++;
            }

         return $dishes;

         

            
    }


    public static function getIdByName($name)
    {
        
            $db = Db::getConnection();
            $insert= "'".$name."'";
            $sql = "SELECT * FROM menu WHERE name =".$insert;

            $id = array();

            $result = $db->query($sql);        
            $result->setFetchMode(PDO::FETCH_ASSOC);
            
            $i = 0;
            while ($row = $result->fetch()) {
                $id[$i]['id'] = $row['id'];
                $i++;
            }

            return $id;
        
    }

    public static function searchDishByName($name, $page=1)
    {
        
            $db = Db::getConnection();

            $insert= "'".$name."%'";
            $insert1= "'%".$name."%'";
            $insert2= "'%".$name."'";
            $count = self::SHOW_BY_DEFAULT;
            $offset=($page - 1) * self::SHOW_BY_DEFAULT;

            $sql = "SELECT * FROM menu WHERE name like ".$insert." or name like ".$insert1." or name like ".$insert2." ORDER BY id DESC ";


            
            $dish = array();

            $result = $db->query($sql);        
            $result->setFetchMode(PDO::FETCH_ASSOC);
            
            $i = 0;
            while ($row = $result->fetch()) {
                $dish[$i]['id'] = $row['id'];
                $dish[$i]['name'] = $row['name'];
                $dish[$i]['image'] = $row['image'];
                $dish[$i]['category'] = $row['category'];
                $dish[$i]['link'] = $row['link'];
                $i++;
            }

         return $dish;
        
    }

    public static function getDishesByCategory($cat, $page=1)
    {
        $db = Db::getConnection();
        
        if($cat == 1) $category ="супы";
        if($cat == 2) $category ="Горячие блюда";
        if($cat == 3) $category ="салаты";
        if($cat == 4) $category ="Закуски";
        if($cat == 5) $category ="Выпечка";
        if($cat == 6) $category ="Десерты";
        if($cat == 7) $category ="Соусы";
        if($cat == 8) $category ="Напитки";
        
        $insert= "'".$category."%'";
        $insert1= "'%".$category."%'";
        $insert2= "'%".$category."'";
        
        $count = self::SHOW_BY_DEFAULT;

        $offset=($page - 1) * self::SHOW_BY_DEFAULT;

        $result = $db->query("SELECT * FROM menu WHERE category like ".$insert." or category like ".$insert1." or category like ".$insert2." ORDER BY id DESC limit ".$count. " OFFSET ".$offset);

        $dishesList = array();

        $i = 0;

        while ($row = $result->fetch()) {
        
            $dishesList[$i]['id'] = $row['id'];
            $dishesList[$i]['name'] = $row['name'];
            $dishesList[$i]['image'] = $row['image'];
            $dishesList[$i]['category'] = $row['category'];
            //$dishesList[$i]['author'] = $row['author'];
            $dishesList[$i]['link'] = $row['link'];
            $i++;
        }
        return $dishesList;
    }

    public static function getCountOfDishesByCategory($cat)
    {
        $db = Db::getConnection();

        if($cat == 1) $category ="Супы";
        if($cat == 2) $category ="Горячие блюда";
        if($cat == 3) $category ="салаты";
        if($cat == 4) $category ="Закуски";
        if($cat == 5) $category ="Выпечка";
        if($cat == 6) $category ="Десерты";
        if($cat == 7) $category ="Соусы";
        if($cat == 8) $category ="Напитки";
        
        $insert= "'".$category."%'";
        $insert1= "'%".$category."%'";
        $insert2= "'%".$category."'";
        $result = $db->query("SELECT * FROM menu WHERE category like ".$insert." or category like ".$insert1." or category like ".$insert2." ORDER BY id DESC");

        $countOfDishes = 0;

        while ($row = $result->fetch()) {
        
            $countOfDishes++;
        }
        return $countOfDishes;
    }


    //////////////////////////////
    //////////////////////////////












































    public static function getDishesByCategorySpecial($cat)
    {
        $db = Db::getConnection();
        
        if($cat == 1) $category ="супы";
        if($cat == 2) $category ="Горячие блюда";
        if($cat == 3) $category ="салаты";
        if($cat == 4) $category ="Закуски";
        if($cat == 5) $category ="Выпечка";
        if($cat == 6) $category ="Десерты";
        if($cat == 7) $category ="Соусы";
        if($cat == 8) $category ="Напитки";
        
        $insert= "'".$category."%'";
        $insert1= "'%".$category."%'";
        $insert2= "'%".$category."'";
        

        $result = $db->query("SELECT * FROM menu WHERE category like ".$insert." or category like ".$insert1." or category like ".$insert2." ORDER BY id DESC");

        $dishesList = array();

        $i = 0;

        while ($row = $result->fetch()) {
        
            $dishesList[$i]['id'] = $row['id'];
            $dishesList[$i]['name'] = $row['name'];
            $dishesList[$i]['image'] = $row['image'];
            $dishesList[$i]['category'] = $row['category'];
            //$dishesList[$i]['author'] = $row['author'];
            $dishesList[$i]['link'] = $row['link'];
            $i++;
        }
        return $dishesList;
    }









    public static function getListDishesByChosenUser($cat)
    {
        $user_id = $_SESSION['user'];
		
		$getDishesByCategory = self::getDishesByCategorySpecial($cat);
		
		$userDishIdis = self::getChosenByUser($user_id);
		
		$countOfCatDish = count($getDishesByCategory);
		
		$ChosenByUser = $userDishIdis[0]['chosen_dish'];
		
		$ChosenByUserTrue = explode(',',substr($ChosenByUser,1));
		
		$countChosenByUserTrue = count($ChosenByUserTrue);
		
		
		$topList = array();

		for($i = 0; $i < $countOfCatDish; $i++)
		{
			//echo $getDishesByCategory[11]['id']; echo "<br>";


			for($j = 0; $j < $countChosenByUserTrue; $j++)
			{
				//echo $ChosenByUserTrue[$j];echo "<br>";

				if($getDishesByCategory[$i]['id'] == $ChosenByUserTrue[$j])
				{
					//echo "Они ровны<br>";
					$topList[$i]['id'] = $getDishesByCategory[$i]['id'];
					$topList[$i]['image'] = $getDishesByCategory[$i]['image'];
					$topList[$i]['name'] = $getDishesByCategory[$i]['name'];
					$topList[$i]['category'] = $getDishesByCategory[$i]['category'];
					$topList[$i]['link'] = $getDishesByCategory[$i]['link'];
				}
				
				
			}
		}
		
		

		return $topList;
    }







    // public static function getCountOfDishesByCategoryChosen($cat)
    // {
    //     $db = Db::getConnection();

    //     if($cat == 1) $category ="Супы";
    //     if($cat == 2) $category ="Горячие блюда";
    //     if($cat == 3) $category ="салаты";
    //     if($cat == 4) $category ="Закуски";
    //     if($cat == 5) $category ="Выпечка";
    //     if($cat == 6) $category ="Десерты";
    //     if($cat == 7) $category ="Соусы";
    //     if($cat == 8) $category ="Напитки";
        
    //     $insert= "'".$category."%'";
    //     $insert1= "'%".$category."%'";
    //     $insert2= "'%".$category."'";
    //     $result = $db->query("SELECT * FROM menu WHERE category like ".$insert." or category like ".$insert1." or category like ".$insert2." ORDER BY id DESC");

    //     $countOfDishes = 0;

    //     while ($row = $result->fetch()) {
        
    //         $countOfDishes++;
    //     }
    //     return $countOfDishes;
    // }

















































    //////////////////////////////
    //////////////////////////////

    public static function getChosenByUser($user_id)
    {
        
            $db = Db::getConnection();

            
            $sql = "SELECT chosen_dish FROM users WHERE id = ".$user_id;

            $chosen_dish = array();

            $result = $db->query($sql);        
            $result->setFetchMode(PDO::FETCH_ASSOC);
            
            $i = 0;
            while ($row = $result->fetch()) {
                $chosen_dish[$i]['chosen_dish'] = $row['chosen_dish'];
                $i++;
            }

            return $chosen_dish;
        
    }

    public static function updateCategoryByUser($user_id, $dish_id)
    {
        
        //and dish_id = :dish_id
        
        //1 получить строку
        //2 Вычесть id
        //3 Обновить строку
        

        $k = self::getChosenByUser($user_id);
        
        $chosen_dish_old = $k[0]['chosen_dish'];

        $chosen_dish_old;

        $chosen_dish_new = str_replace(",".$dish_id, "", $chosen_dish_old);
        // return $chosen_dish_new;

        $db = Db::getConnection();

        $sql = "UPDATE users SET chosen_dish = :chosen_dish WHERE id = :user_id";
        
        $result = $db->prepare($sql);                                  
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);       
        $result->bindParam(':chosen_dish', $chosen_dish_new, PDO::PARAM_STR);    
               
        return $result->execute();
        // Запрос на апдейт и очищение комента
    }

   
}



        