<?php

class User{

    //регистрация
    public static function register($login, $email, $password) {
        $db = Db::getConnection();
        $chosen_dish="";
        $sql = "INSERT INTO users (login, email, password,chosen_dish) "
                . "VALUES (:login, :email, :password, :chosen_dish)";
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':chosen_dish', $chosen_dish, PDO::PARAM_STR);
    return $result->execute();      
    }

    // Проверяет имя: не меньше, чем 2 символа
    public static function checkLogin($login) {
        if (strlen($login) >= 2) {
            return true;
        }
        return false;
    }

    //Проверяет пароль: не меньше, чем 6 символов
    public static function checkPassword($password) {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }
   
    //Проверяет email
    public static function checkEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    //Проверяет email на оригинальность
    public static function checkEmailExists($email) {
        
        $db = Db::getConnection();
        
        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';
        
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if($result->fetchColumn())
            return true;
        return false;
    }























    public static function checkUserData($login, $password)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM users WHERE login = :login AND password = :password';

        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();
        if ($user) {
            return $user['id'];
        }

        return false;
    }












    
    
    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }
    
    public static function checkLogged()
    {
        // Если сессия есть, вернем идентификатор пользователя
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header("Location: /user/login");
    }
    
    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    public static function getUserById($id)
    {
        if ($id) {
            $db = Db::getConnection();
            $sql = 'SELECT * FROM users WHERE id = :id';

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);

            // Указываем, что хотим получить данные в виде массива
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();


            return $result->fetch();
        }
    }

    public static function addToChosenList($dish_id, $user_id){
        $db = Db::getConnection();
        $sql = "UPDATE users SET chosen_dish = concat(chosen_dish,:chosen_dish) wHERE id = :id";
        
        

        $result = $db->prepare($sql);                                  
        $var = ','.$dish_id;
        $result->bindParam(':chosen_dish', $var, PDO::PARAM_STR); 
        $result->bindParam(':id', $user_id, PDO::PARAM_INT);  
         
        return $result->execute();
        
    }

    public static function addComment($comment,$user_id,$dish_id){
        
        $db = Db::getConnection();
        $sql = "INSERT INTO comments (user_id, dish_id, comment) "
                . "VALUES (:user_id, :dish_id, :comment)";
        $result = $db->prepare($sql);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $result->bindParam(':dish_id', $dish_id, PDO::PARAM_INT);
        $result->bindParam(':comment', $comment, PDO::PARAM_STR);
    return $result->execute();   
    }

    public static function CheckComment($user_id,$dish_id){
        $db = Db::getConnection();
        $sql = "SELECT user_id, dish_id FROM comments where user_id=:user_id and dish_id=:dish_id";

        $result = $db->prepare($sql);  
        $test1=$user_id;
        $test2=$dish_id;
        // Указываем, что хотим получить данные в виде массива
        $result->bindParam(':user_id', $test1, PDO::PARAM_INT); 
        $result->bindParam(':dish_id', $test2, PDO::PARAM_INT);  
         
        
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();


        return $result->fetch();
        
    }

    public static function getCommentsById($id)
    {
        if ($id) {
            $db = Db::getConnection();
            $sql = "SELECT * FROM comments WHERE user_id = ".$id;

            $result = $db->query($sql);
            //$result->bindParam(':id', $id, PDO::PARAM_INT);

            // Указываем, что хотим получить данные в виде массива
            //$result->setFetchMode(PDO::FETCH_ASSOC);
            //$result->execute();


            //return $result->fetch();




            $Comments = array();
            $i = 0;
    
            while ($row = $result->fetch()) {
            
                $Comments[$i]['user_id'] = $row['user_id'];
                $Comments[$i]['dish_id'] = $row['dish_id'];
                $Comments[$i]['comment'] = $row['comment'];
                $i++;
            }
            return $Comments;






        }
    }

    public static function deleteCommentIfExist($user_id, $dish_id)
    {
        $db = Db::getConnection();
        
        $sql = "DELETE from comments WHERE user_id = :user_id and dish_id = :dish_id";
        
        $result = $db->prepare($sql);                                  
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);       
        $result->bindParam(':dish_id', $dish_id, PDO::PARAM_INT);    
         
        
        return $result->execute();
    }

    public static function UpdateComment($comment,$user_id,$dish_id)
    {
        $db = Db::getConnection();
        
        $sql = "UPDATE comments SET comment = :comment WHERE user_id = :user_id and dish_id = :dish_id";
        
        $result = $db->prepare($sql);                                  
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);       
        $result->bindParam(':dish_id', $dish_id, PDO::PARAM_INT);    
        $result->bindParam(':comment', $comment, PDO::PARAM_STR); 
        
        return $result->execute();
    }


    public static function GetEmails(){
        $db = Db::getConnection();
        $sql = 'SELECT email FROM users';

        $result = $db->query($sql);  
        
        $emails = array();
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
            while ($row = $result->fetch()) {
                
                $emails[$i] = $row;
                $i++;
            }

         return $emails;
        
    }

    public static function GetLogins(){
        $db = Db::getConnection();
        $sql = 'SELECT login FROM users';

        $result = $db->query($sql);  
        
        $logins = array();
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
            while ($row = $result->fetch()) {
                
                $logins[$i] = $row;
                $i++;
            }

         return $logins;
        
    }

    public static function GetPasswords(){
        $db = Db::getConnection();
        $sql = 'SELECT password FROM users';

        $result = $db->query($sql);  
        
        $passwords = array();
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
            while ($row = $result->fetch()) {
                
                $passwords[$i] = $row;
                $i++;
            }

         return $passwords;
        
    }

    public static function updateUser($id, $login, $password, $email)
    {
        $db = Db::getConnection();
        
        $sql = "UPDATE users 
            SET login = :login, password = :password, email = :email 
            WHERE id = :id";
        
        $result = $db->prepare($sql);                                  
        $result->bindParam(':id', $id, PDO::PARAM_INT);       
        $result->bindParam(':login', $login, PDO::PARAM_STR);    
        $result->bindParam(':password', $password, PDO::PARAM_STR); 
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        return $result->execute();
    }
}


           
           