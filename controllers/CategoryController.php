<?php

//include_once ROOT.'/models/Category.php';
//include_once ROOT.'/models/Product.php';

class CategoryController {

	public function actionIndex($cat, $page = 1)
	{

                // $categories = array();
                // $categories = Category::getCategoriesList();
            
                // $latestProducts=array();
                // $latestProducts= Product::getLatestProducts(6);
				
				
					$dishes = Menu::getDishesByCategory($cat, $page);

					$countOfDishes = Menu::getCountOfDishesByCategory($cat);
					
				
				

				

				// Создаем объект Pagination - постраничная навигация
				$pagination = new Pagination($countOfDishes, $page, Menu::SHOW_BY_DEFAULT, 'page-');
    			
				$emails =User::GetEmails();
				$i=0;
				$h= "";
				foreach($emails as $email){
				$h = $h.",".$emails[$i]['email'];
					$i++;
				}

				$logins =User::GetLogins();			
				$i=0;
				$t= "";
				foreach($logins as $login){
				$t = $t.",".$logins[$i]['login'];
					$i++;
				}

				$passwords =User::GetPasswords();			
				$i=0;
				$p= "";
				foreach($passwords as $password){
				$p = $p.",".$passwords[$i]['password'];
					$i++;
				}


		require_once(ROOT . '/views/site/helo.php');

		return true;
		// echo"hello Site";
	}
        
       
        
	public function actionGetCategoryByChosen($cat, $page = 1)
	{
		$id = $_SESSION['user'];

        $comments = User::getCommentsById($id);

		$dishes = Menu::getListDishesByChosenUser($cat);
		
		require_once(ROOT . '/views/cabinet/index.php');

		return true;
	}

	
}
       

