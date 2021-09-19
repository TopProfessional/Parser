<?php

class UserController
{

    public function actionAddChosen($dish_id)
    {

       
       $user_id =$_SESSION["user"] ;
       //echo $user_id." ";
       //echo $dish_id;
       $v = User::addToChosenList($dish_id, $user_id);
       header("Location: /");
       
    }
    public function actionLogout()
    {
        //session_start();
        unset($_SESSION["user"]);
        header("Location: /");
        
    }

    public function actionRegister()
    {
       
        if (isset($_POST['submit_enter'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];   
               
               
           //return ID 
           $userId = User::checkUserData($login, $password);
           if($userId){
                User::auth($userId);
                header("Location: /cabinet/"); 
           }else header("Location: /");
           

           //
                
           // Перенаправляем пользователя в закрытую часть - кабинет 
          






        }







        if (isset($_POST['submit_register'])) {
            $login = $_POST['login'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            
            
            $result = User::register($login, $email, $password);  
            header("Location: /"); 
        }

        

        return true;
        
    }

    public function actionDeleteDishOfUser($dish_id)
    {
        
        $user_id = $_SESSION['user'];
        
        $updateCategoryByUser = Menu::updateCategoryByUser($user_id, $dish_id);
        $deleteCommentIfExist = User::deleteCommentIfExist($user_id, $dish_id);
        //print_r($updateCategoryByUser);
        //echo $updateCategoryByUser;
        header("Location: /cabinet");
        
    }
}
