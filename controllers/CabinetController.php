<?php

class CabinetController{
    public function actionIndex(){

        $id = $_SESSION['user'];

        $user = User::getUserById($id);

        $str = substr($user['chosen_dish'], 1);


        $comments = User::getCommentsById($id);


        //var_dump($str);

        if($str){
            $massOfIds = explode(',',$str);

            $dishes = Menu::getDishesByIds($massOfIds);
        }
        

        require_once(ROOT . '/views/cabinet/index.php');

        return true;
    }



    // public function actionAddComment(){
    //     if (isset($_POST['saveComment'])) 
    //     {
    //         $comment = $_POST['comment'];
    //         $dish_id = $_POST['dish_id'];
    //     } 
    //     $user_id = $_SESSION['user'];
    //     $addComment = User::AddComment($comment,$user_id,$dish_id);
    //     header("Location: /cabinet");
    // }






    public function actionAddComment(){
        if (isset($_POST['saveComment'])) 
        {
            $comment = $_POST['comment'];
            $dish_id = $_POST['dish_id'];
        } 
        $user_id = $_SESSION['user'];

        $checkComment = User::CheckComment($user_id,$dish_id);
        //echo "Result is ".var_dump($checkComment)." like this";
        if($checkComment == false)
        {
            //echo"Новый коментарий";
            $addComment = User::AddComment($comment,$user_id,$dish_id);
        }
        else 
        {
            //echo "Старый коментарий";
            $updateComment = User::UpdateComment($comment,$user_id,$dish_id);
        }

        
        
        header("Location: /cabinet");
    }



    // public function actionEdit(){
    //     if (isset($_POST['saveComment'])) 
    //     {
    //         $comment = $_POST['comment'];
    //         $dish_id = $_POST['dish_id'];
    //     } 
    //     $user_id = $_SESSION['user'];
    //     $addComment = User::AddComment($comment,$user_id,$dish_id);
    //     header("Location: /cabinet");
    // }

    public function actionShowUserData()
    {
        $user_id = $_SESSION['user'];
        $user = User::getUserById($user_id);

        require_once(ROOT . '/views/cabinet/user.php');

        return true;
        
    }

    public function actionChangeUserData()
    {
        if (isset($_POST['submit'])) 
        {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $email = $_POST['email'];
        } 
        //echo $login." ".$password." ".$email;

        $user_id = $_SESSION['user'];
        
        $updateUser = User::updateUser($user_id,$login,$password,$email);

        
        // $user = User::getUserById($user_id);

        
        header("Location: /cabinet");
        
    }


}