<?php

class Parser
{

    public static function addDishes($name, $category, $image, $link) 
    {
        $db = Db::getConnection();
        $sql = "INSERT IGNORE INTO menu (name, category, image, link) "
                . "VALUES (:name, :category, :image, :link)";
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':category', $category, PDO::PARAM_STR);
        $result->bindParam(':image', $image, PDO::PARAM_STR);
        $result->bindParam(':link', $link, PDO::PARAM_STR);
    return $result->execute();      
    }

}
