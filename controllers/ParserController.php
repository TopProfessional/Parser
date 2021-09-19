<?php
class ParserController{



    
    public function actionIndex()
    {
        if (isset($_POST['parse_post'])) 
        {            
            $source = $_POST['source'];

            $kolOfPages = $_POST['kolOfPages'];
            $start = $_POST['start'];
            $cat = $_POST['cat'];
            $nameOfDish = $_POST['name'];
         
            if($source == 1)self::actionParse1($kolOfPages,$start,$cat,$nameOfDish);
            if($source == 2)self::actionParse2($kolOfPages,$start,$cat,$nameOfDish);
            if($source == 3)self::actionParse3($kolOfPages,$start,$cat,$nameOfDish);
        } 
        
        require_once(ROOT . '/views/parse/index.php');

        return true;
    }



























    public function actionParse1($kolOfPages,$start,$cat,$nameOfDish){
        include ROOT.'/components/Simple_html_dom.php';
            
        $kulinar = "https://grandkulinar.ru/recepies/";

        if($cat == 1)
        {
            $kulinar = "https://grandkulinar.ru/recepies/soups/";
        }
        if($cat == 2)
        {
            $kulinar = "https://grandkulinar.ru/recepies/osnovnye-blyuda/";
        }
        if($cat == 3)
        {
            $kulinar = "https://grandkulinar.ru/recepies/salads/";
        }
        if($cat == 4)
        {
            $kulinar = "https://grandkulinar.ru/recepies/prostye-i-bystrye-recepty/bystrye-zakuski/";
        }
        if($cat == 5)
        {
            $kulinar = "https://grandkulinar.ru/recepies/prostye-i-bystrye-recepty/bystraya-vypechka/";
        }
        if($cat == 6)
        {
            $kulinar = "https://grandkulinar.ru/recepies/prostye-i-bystrye-recepty/bystrye-deserty/";
        }
        if($cat == 7)
        {
            $kulinar = "https://grandkulinar.ru/recepies/sauces/";
        }
        if($cat == 8)
        {
            $kulinar = "https://grandkulinar.ru/recepies/bezalkogolnye-napitki/";
        }
        

        if($start == 1 && $kolOfPages == 1)
        {
            $k = 0;
            $ch = curl_init();
            $referer= 'https://www.google.com';
            curl_setopt($ch, CURLOPT_URL, $kulinar);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0");
            curl_setopt($ch, CURLOPT_REFERER, $referer);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $train = curl_exec($ch);
            $html = str_get_html($train);

            $name = $html->find("div[class=shortstory] h3");
            $link = $html->find("div[class=title_shortstory border-bottom] a"); 
            $cat = $html->find("div[class=short_category]"); 
            $picture = $html->find("div[class=recepiesimg] a img"); 

            $pages = $html->find("div[class=navigation] "); 
            $lustpage = $pages[0]->last_child()->plaintext;

            // echo $lustpage;

            // echo "<br>";
            // echo "<br>";
            // $count =0;
            // for($page=0;$page<$lustpage;$page++){
            // $count++;
            // }
            // echo $count;
            // echo "<br>";
            // echo "<br>";
            $parse_dishes = array();

            $i = 0;
            foreach($html->find('div[class=shortstory]') as $article) {

                    $cat_str[$i]="";
                    
                    foreach($article->find("div span a") as $item){
                        //echo $item->plaintext."<br><br>";
                        $cat_str[$i]=$cat_str[$i].$item->plaintext.",";
                    }
                // echo $name[$i]->plaintext;echo "<br>";
                // echo $link[$i]->href;echo "<br>";
                // echo $cat_str[$i];echo "<br>";
                // echo $picture[$i]->src;echo "<br>";

                ///////////////
                if($nameOfDish != ""){
                    if(strstr(mb_strtolower($name[$i]->plaintext), mb_strtolower($nameOfDish)))
                    {
                         $parse_dishes[$i]['name'] = $name[$i]->plaintext;
                         $parse_dishes[$i]['link'] = $link[$i]->href;
                         $parse_dishes[$i]['cat'] = $cat_str[$i];
                         $parse_dishes[$i]['img'] = $picture[$i]->src;
                         $parse_dishes[$i]['id'] = $k;
                         
                    }//echo "ЛЯЯЯЯЯЯЯЯЯЯЯЯЯ ";
                 } 
                
                if($nameOfDish == ""){
                 
                    $parse_dishes[$i]['name'] = $name[$i]->plaintext;
                    $parse_dishes[$i]['link'] = $link[$i]->href;
                    $parse_dishes[$i]['cat'] = $cat_str[$i];
                    $parse_dishes[$i]['img'] = $picture[$i]->src;
                    $parse_dishes[$i]['id'] = $k;
                 //echo "ЛЯЯЯЯЯЯЯЯЯЯЯЯЯ ";
                 } 
                ////////////////

                // echo "<br>";
                // echo "<br>";
                $i++;
                $k++;
            }
            // echo $i;

            curl_close($ch);

            require_once(ROOT . '/views/parse/index.php');

            return true;
        }

        if($start == 1 && $kolOfPages != 1 )
        {
            $k = 0;
            $ch = curl_init();
            $referer= 'https://www.google.com';
            curl_setopt($ch, CURLOPT_URL, $kulinar);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0");
            curl_setopt($ch, CURLOPT_REFERER, $referer);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $train = curl_exec($ch);
            $html = str_get_html($train);

            $name = $html->find("div[class=shortstory] h3");
            $link = $html->find("div[class=title_shortstory border-bottom] a"); 
            $cat = $html->find("div[class=short_category]"); 
            $picture = $html->find("div[class=recepiesimg] a img"); 

            $pages = $html->find("div[class=navigation] "); 
            $lustpage = $pages[0]->last_child()->plaintext;

            // echo $lustpage;

            // echo "<br>";
            // echo "<br>";
            // $count =0;
            // for($page=0;$page<$lustpage;$page++){
            // $count++;
            // }
            // echo $count;
            // echo "<br>";
            // echo "<br>";
            $parse_dishes = array();

            $i = 0;
            foreach($html->find('div[class=shortstory]') as $article) {

                    $cat_str[$i]="";
                    
                    foreach($article->find("div span a") as $item){
                        //echo $item->plaintext."<br><br>";
                        $cat_str[$i]=$cat_str[$i].$item->plaintext.",";
                    }
                // echo $name[$i]->plaintext;echo "<br>";
                // echo $link[$i]->href;echo "<br>";
                // echo $cat_str[$i];echo "<br>";
                // echo $picture[$i]->src;echo "<br>";

                ///////////////
                if($nameOfDish != ""){
                    if(strstr(mb_strtolower($name[$i]->plaintext), mb_strtolower($nameOfDish)))
                    {
                         $parse_dishes[$i]['name'] = $name[$i]->plaintext;
                         $parse_dishes[$i]['link'] = $link[$i]->href;
                         $parse_dishes[$i]['cat'] = $cat_str[$i];
                         $parse_dishes[$i]['img'] = $picture[$i]->src;
                         $parse_dishes[$i]['id'] = $k;
                         
                    }//echo "ЛЯЯЯЯЯЯЯЯЯЯЯЯЯ ";
                 } 
                
                if($nameOfDish == ""){
                 
                    $parse_dishes[$i]['name'] = $name[$i]->plaintext;
                    $parse_dishes[$i]['link'] = $link[$i]->href;
                    $parse_dishes[$i]['cat'] = $cat_str[$i];
                    $parse_dishes[$i]['img'] = $picture[$i]->src;
                    $parse_dishes[$i]['id'] = $k;
                 //echo "ЛЯЯЯЯЯЯЯЯЯЯЯЯЯ ";
                 } 
                ////////////////

                // echo "<br>";
                // echo "<br>";
                $i++;
                $k++;
            }
            // echo $i;

            curl_close($ch);

            $parse_dishes_all = array();

            for($g=2;$g<=$kolOfPages;$g++)
            {
                $ch = curl_init();
                $referer= 'https://www.google.com';
                curl_setopt($ch, CURLOPT_URL, $kulinar."page/".$g."/");
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0");
                curl_setopt($ch, CURLOPT_REFERER, $referer);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $train = curl_exec($ch);
                $html = str_get_html($train);

                $name = $html->find("div[class=shortstory] h3");
                $link = $html->find("div[class=title_shortstory border-bottom] a"); 
                $cat = $html->find("div[class=short_category]"); 
                $picture = $html->find("div[class=recepiesimg] a img"); 

                // echo "<br>";
                // echo "<br>";

                $i = 0;
                foreach($html->find('div[class=shortstory]') as $article) {

                    $cat_str[$i]="";
                    
                    foreach($article->find("div span a") as $item){
                        //echo $item->plaintext."<br><br>";
                        $cat_str[$i]=$cat_str[$i].$item->plaintext.",";
                    }
                    // echo $name[$i]->plaintext;echo "<br>";
                    // echo $link[$i]->href;echo "<br>";
                    // echo $cat_str[$i];echo "<br>";
                    // echo $picture[$i]->src;echo "<br>";

                    
                    if($nameOfDish != ""){
                        if(strstr(mb_strtolower($name[$i]->plaintext), mb_strtolower($nameOfDish)))
                        {
                            $parse_dishes_other[$i]['name'] = $name[$i]->plaintext;
                            $parse_dishes_other[$i]['link'] = $link[$i]->href;
                            $parse_dishes_other[$i]['cat'] = $cat_str[$i];
                            $parse_dishes_other[$i]['img'] = $picture[$i]->src;
                            $parse_dishes_other[$i]['id'] = $k;
                             
                        }//echo "ЛЯЯЯЯЯЯЯЯЯЯЯЯЯ ";
                     } 
                    
                    if($nameOfDish == ""){
                     
                        $parse_dishes_other[$i]['name'] = $name[$i]->plaintext;
                        $parse_dishes_other[$i]['link'] = $link[$i]->href;
                        $parse_dishes_other[$i]['cat'] = $cat_str[$i];
                        $parse_dishes_other[$i]['img'] = $picture[$i]->src;
                        $parse_dishes_other[$i]['id'] = $k;
                     //echo "ЛЯЯЯЯЯЯЯЯЯЯЯЯЯ ";
                     } 


                // echo "<br>";
                // echo "<br>";
                $i++;
                $k++;
            }
                // echo "<br>";
                // echo "<br>";
                // echo "page ".$g;
                // echo "<br>";
                // echo "<br>";
            $parse_dishes_all = array_merge($parse_dishes_all, $parse_dishes_other);
            curl_close($ch);
            }
            require_once(ROOT . '/views/parse/index.php');

            return true;
        }

        if($start != 1 )
        {
            $k = 0;
            $parse_dishes_all = array();

            for($g=$start;$g<=($start + $kolOfPages-1);$g++)
            {
                $ch = curl_init();
                $referer= 'https://www.google.com';
                curl_setopt($ch, CURLOPT_URL, $kulinar."page/".$g."/");
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0");
                curl_setopt($ch, CURLOPT_REFERER, $referer);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $train = curl_exec($ch);
                $html = str_get_html($train);

                $name = $html->find("div[class=shortstory] h3");
                $link = $html->find("div[class=title_shortstory border-bottom] a"); 
                $cat = $html->find("div[class=short_category]"); 
                $picture = $html->find("div[class=recepiesimg] a img"); 

                // echo "<br>";
                // echo "<br>";

                $i = 0;
                foreach($html->find('div[class=shortstory]') as $article) {

                    $cat_str[$i]="";
                    
                    foreach($article->find("div span a") as $item){
                        //echo $item->plaintext."<br><br>";
                        $cat_str[$i]=$cat_str[$i].$item->plaintext.",";
                    }
                    // echo $name[$i]->plaintext;echo "<br>";
                    // echo $link[$i]->href;echo "<br>";
                    // echo $cat_str[$i];echo "<br>";
                    // echo $picture[$i]->src;echo "<br>";

                    
                    if($nameOfDish != ""){
                        if(strstr(mb_strtolower($name[$i]->plaintext), mb_strtolower($nameOfDish)))
                        {
                            $parse_dishes_other[$i]['name'] = $name[$i]->plaintext;
                            $parse_dishes_other[$i]['link'] = $link[$i]->href;
                            $parse_dishes_other[$i]['cat'] = $cat_str[$i];
                            $parse_dishes_other[$i]['img'] = $picture[$i]->src;
                            $parse_dishes_other[$i]['id'] = $k;
                             
                        }//echo "ЛЯЯЯЯЯЯЯЯЯЯЯЯЯ ";
                     } 
                    
                    if($nameOfDish == ""){
                     
                        $parse_dishes_other[$i]['name'] = $name[$i]->plaintext;
                        $parse_dishes_other[$i]['link'] = $link[$i]->href;
                        $parse_dishes_other[$i]['cat'] = $cat_str[$i];
                        $parse_dishes_other[$i]['img'] = $picture[$i]->src;
                        $parse_dishes_other[$i]['id'] = $k;
                     //echo "ЛЯЯЯЯЯЯЯЯЯЯЯЯЯ ";
                     } 


                // echo "<br>";
                // echo "<br>";
                $i++;
                $k++;
            }
                // echo "<br>";
                // echo "<br>";
                // echo "page ".$g;
                // echo "<br>";
                // echo "<br>";
            $parse_dishes_all = array_merge($parse_dishes_all, $parse_dishes_other);
            curl_close($ch);
            }
            require_once(ROOT . '/views/parse/index.php');

            return true;
        }
        
        
    }



















///////////////////////// povarenok - готово ///////////////////////////////////

    public function actionParse2($kolOfPages,$start,$cat,$nameOfDish)
    {
        include ROOT.'/components/Simple_html_dom.php';

        $povarenok = "https://www.povarenok.ru/recipes/";
        if($cat == 1)
        {
            $povarenok = "https://www.povarenok.ru/recipes/category/2/";
        }
        if($cat == 2)
        {
            $povarenok = "https://www.povarenok.ru/recipes/category/6/";
        }
        if($cat == 3)
        {
            $povarenok = "https://www.povarenok.ru/recipes/category/12/";
        }
        if($cat == 4)
        {
            $povarenok = "https://www.povarenok.ru/recipes/category/15/";
        }
        if($cat == 5)
        {
            $povarenok = "https://www.povarenok.ru/recipes/category/25/";
        }
        if($cat == 6)
        {
            $povarenok = "https://www.povarenok.ru/recipes/category/30/";
        }
        if($cat == 7)
        {
            $povarenok = "https://www.povarenok.ru/recipes/category/23/";
        }
        if($cat == 8)
        {
            $povarenok = "https://www.povarenok.ru/recipes/category/19/";
        }
        

        if($start == 1 && $kolOfPages == 1)
        {
            $k = 0;
            $ch = curl_init();
            $referer= 'https://www.google.com';
            curl_setopt($ch, CURLOPT_URL, $povarenok);     //"https://www.povarenok.ru/recipes/~2/"
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0");
            curl_setopt($ch, CURLOPT_REFERER, $referer);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    

            $train = (curl_exec($ch));
            $html = str_get_html($train);
            $name = $html->find("article[class=item-bl] h2 a");
            $link = $html->find("div[class=m-img conima] a img"); 
            $parse_dishes = array();
            $i = 0;
            foreach($html->find('div[class=article-breadcrumbs]') as $article) 
            {
                    $cat_str[$i]="";
                    
                    foreach($article->find("p span a") as $item){
                        //echo $item->plaintext."<br><br>";
                        $cat_str[$i]=$cat_str[$i].$item->plaintext.",";
                    }
                    
                   if($nameOfDish != ""){
                       if(strstr(mb_strtolower($name[$i]->plaintext), mb_strtolower($nameOfDish)))
                       {
                            $parse_dishes[$i]['name'] = $name[$i]->plaintext;
                            $parse_dishes[$i]['img'] = $link[$i]->src;
                            $parse_dishes[$i]['link'] = $name[$i]->href;
                            $parse_dishes[$i]['cat'] = $cat_str[$i];
                            $parse_dishes[$i]['id'] = $k;
                       }//echo "ЛЯЯЯЯЯЯЯЯЯЯЯЯЯ ";
                    } 
                   
                   if($nameOfDish == ""){
                    
                         $parse_dishes[$i]['name'] = $name[$i]->plaintext;
                         $parse_dishes[$i]['img'] = $link[$i]->src;
                         $parse_dishes[$i]['link'] = $name[$i]->href;
                         $parse_dishes[$i]['cat'] = $cat_str[$i];
                         $parse_dishes[$i]['id'] = $k;
                    //echo "ЛЯЯЯЯЯЯЯЯЯЯЯЯЯ ";
                    } 
                    

                    $i++;
                    $k++;
                    
            }

            curl_close($ch); 

            require_once(ROOT . '/views/parse/index.php');

        return true;
        }

        if($start == 1 && $kolOfPages != 1 )
        {
            $k = 0;
            $ch = curl_init();
            $referer= 'https://www.google.com';
            curl_setopt($ch, CURLOPT_URL, $povarenok);     //"https://www.povarenok.ru/recipes/~2/"
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0");
            curl_setopt($ch, CURLOPT_REFERER, $referer);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    

            $train = (curl_exec($ch));
            $html = str_get_html($train);
            $name = $html->find("article[class=item-bl] h2 a");
            $link = $html->find("div[class=m-img conima] a img"); 
            $parse_dishes = array();
            $i = 0;
            foreach($html->find('div[class=article-breadcrumbs]') as $article) 
            {
                    $cat_str[$i]="";
                    
                    foreach($article->find("p span a") as $item){
                        //echo $item->plaintext."<br><br>";
                        $cat_str[$i]=$cat_str[$i].$item->plaintext.",";
                    }
                    

                    
                    if($nameOfDish != ""){
                        if(strstr(mb_strtolower($name[$i]->plaintext), mb_strtolower($nameOfDish)))
                        {
                             $parse_dishes[$i]['name'] = $name[$i]->plaintext;
                             $parse_dishes[$i]['img'] = $link[$i]->src;
                             $parse_dishes[$i]['link'] = $name[$i]->href;
                             $parse_dishes[$i]['cat'] = $cat_str[$i];
                             $parse_dishes[$i]['id'] = $k;
                        }//echo "ЛЯЯЯЯЯЯЯЯЯЯЯЯЯ ";
                     } 
                    
                    if($nameOfDish == ""){
                     
                          $parse_dishes[$i]['name'] = $name[$i]->plaintext;
                          $parse_dishes[$i]['img'] = $link[$i]->src;
                          $parse_dishes[$i]['link'] = $name[$i]->href;
                          $parse_dishes[$i]['cat'] = $cat_str[$i];
                          $parse_dishes[$i]['id'] = $k;
                     //echo "ЛЯЯЯЯЯЯЯЯЯЯЯЯЯ ";
                     } 

                     
                    $i++;
                    $k++;
                    
                    
            }

            curl_close($ch);    

            
            $parse_dishes_all = array();
            
            for($g=2;$g<=$kolOfPages;$g++)
            {
            $ch = curl_init();
            $referer= 'https://www.google.com';
            curl_setopt($ch, CURLOPT_URL, $povarenok."~".$g."/");
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0");
            curl_setopt($ch, CURLOPT_REFERER, $referer);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


            $train = (curl_exec($ch));
            $html = str_get_html($train);
            $name = $html->find("article[class=item-bl] h2 a");
            $link = $html->find("div[class=m-img conima] a img"); 
            
            $parse_dishes_other = array();
            $i = 0; 
            foreach($html->find('div[class=article-breadcrumbs]') as $article) 
            {
                    $cat_str[$i]="";
                    
                    foreach($article->find("p span a") as $item){
                        //echo $item->plaintext."<br><br>";
                        $cat_str[$i]=$cat_str[$i].$item->plaintext.",";
                    }
                    
                   

                    if($nameOfDish != ""){
                        if(strstr(mb_strtolower($name[$i]->plaintext), mb_strtolower($nameOfDish)))
                        {
                            $parse_dishes_other[$i]['name'] = $name[$i]->plaintext;
                            $parse_dishes_other[$i]['img'] = $link[$i]->src;
                            $parse_dishes_other[$i]['link'] = $name[$i]->href;
                            $parse_dishes_other[$i]['cat'] = $cat_str[$i];
                            $parse_dishes_other[$i]['id'] = $k;
                        }//echo "ЛЯЯЯЯЯЯЯЯЯЯЯЯЯ ";
                     } 
                    
                    if($nameOfDish == ""){
                     
                        $parse_dishes_other[$i]['name'] = $name[$i]->plaintext;
                        $parse_dishes_other[$i]['img'] = $link[$i]->src;
                        $parse_dishes_other[$i]['link'] = $name[$i]->href;
                        $parse_dishes_other[$i]['cat'] = $cat_str[$i];
                        $parse_dishes_other[$i]['id'] = $k;
                     //echo "ЛЯЯЯЯЯЯЯЯЯЯЯЯЯ ";
                     } 
                    $i++;
                    $k++;
                    
            }
            

            $parse_dishes_all = array_merge($parse_dishes_all, $parse_dishes_other);
            
            curl_close($ch);      
            }
            
            require_once(ROOT . '/views/parse/index.php');

            return true;
        
        }
        if($start != 1 )
        {
            $k = 0;

            $parse_dishes_all = array();
            
            for($g=$start;$g<=($start + $kolOfPages-1);$g++)
            {
            $ch = curl_init();
            $referer= 'https://www.google.com';
            curl_setopt($ch, CURLOPT_URL, $povarenok."~".$g."/");
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0");
            curl_setopt($ch, CURLOPT_REFERER, $referer);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


            $train = (curl_exec($ch));
            $html = str_get_html($train);
            $name = $html->find("article[class=item-bl] h2 a");
            $link = $html->find("div[class=m-img conima] a img"); 
            
            $parse_dishes_other = array();
            $i = 0; 
            foreach($html->find('div[class=article-breadcrumbs]') as $article) 
            {
                    $cat_str[$i]="";
                    
                    foreach($article->find("p span a") as $item){
                        //echo $item->plaintext."<br><br>";
                        $cat_str[$i]=$cat_str[$i].$item->plaintext.",";
                    }
                    
                    

                    if($nameOfDish != ""){
                        if(strstr(mb_strtolower($name[$i]->plaintext), mb_strtolower($nameOfDish)))
                        {
                            $parse_dishes_other[$i]['name'] = $name[$i]->plaintext;
                            $parse_dishes_other[$i]['img'] = $link[$i]->src;
                            $parse_dishes_other[$i]['link'] = $name[$i]->href;
                            $parse_dishes_other[$i]['cat'] = $cat_str[$i];
                            $parse_dishes_other[$i]['id'] = $k;
                        }//echo "ЛЯЯЯЯЯЯЯЯЯЯЯЯЯ ";
                     } 
                    
                    if($nameOfDish == ""){
                     
                        $parse_dishes_other[$i]['name'] = $name[$i]->plaintext;
                        $parse_dishes_other[$i]['img'] = $link[$i]->src;
                        $parse_dishes_other[$i]['link'] = $name[$i]->href;
                        $parse_dishes_other[$i]['cat'] = $cat_str[$i];
                        $parse_dishes_other[$i]['id'] = $k;
                     //echo "ЛЯЯЯЯЯЯЯЯЯЯЯЯЯ ";
                     } 
                    $i++;
                    $k++;
                    
            }
            

            $parse_dishes_all = array_merge($parse_dishes_all, $parse_dishes_other);
           
            curl_close($ch);      
            }
            
            require_once(ROOT . '/views/parse/index.php');

            return true;
        }
        

           
    }

////////////////////////////////////////////////////////////















    public function actionParse3($kolOfPages,$start,$cat,$nameOfDish)
    {
        //echo "actionParse3";

        include ROOT.'/components/Simple_html_dom.php';

        $kuharka = "https://kuharka.ru/recipes/";
        if($cat == 1)
        {
            $kuharka = "https://kuharka.ru/recipes/soup/";
        }
        if($cat == 2)
        {
            $kuharka = "https://kuharka.ru/recipes/multya/";
        }
        if($cat == 3)
        {
            $kuharka = "https://kuharka.ru/recipes/salad/";
        }
        if($cat == 4)
        {
            $kuharka = "https://kuharka.ru/recipes/snack/";
        }
        if($cat == 5)
        {
            $kuharka = "https://kuharka.ru/recipes/hlebopechka/";
        }
        if($cat == 6)
        {
            $kuharka = "https://kuharka.ru/recipes/dessert/";
        }
        if($cat == 7)
        {
            $kuharka = "https://kuharka.ru/recipes/sauce/";
        }
        if($cat == 8)
        {
            $kuharka = "https://kuharka.ru/recipes/drink/";
        }

        if($start == 1 && $kolOfPages == 1)
        {
            $k = 0;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $kuharka);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
            $train = curl_exec($ch);
            $html = str_get_html($train);
        
            $img = $html->find("div[class=embed scaleble] a img");
            $link = $html->find("div[class=content-inner] p a"); 
            $name = $html->find("div[class=content-inner] p a");  
            $cat = $html->find("div[class=content-inner] ul"); 
        
            $pages = $html->find("div[class=paginate] "); 
            $lustpage = $pages[0]->last_child()->plaintext;
            
            $i = 0;
            $ebanina = "Раздел";

            $parse_dishes = array();

                    foreach($html->find(" div[class=col-md-9 center] sape_index  .content-box") as $article) 
                    {
                
            
                        if(!strstr($article->plaintext, $ebanina))
                        {
                            $cat_str[$i]="";
                            foreach($article->find("div[class=col-md-7 col-sm-7] div[class=content-inner] ul li a") as $item)
                            {
                                $cat_str[$i]=$cat_str[$i].$item->plaintext.",";
                            }
                
                            if($nameOfDish != ""){
                                if(strstr(mb_strtolower($name[$i]->plaintext), mb_strtolower($nameOfDish)))
                                {
                                    $parse_dishes[$i]['img'] = "https://kuharka.ru".$img[$i]->src; 
                                    $parse_dishes[$i]['link'] = "https://kuharka.ru".$link[$i]->href;
                                    $parse_dishes[$i]['name'] = $name[$i]->plaintext;
                                    $parse_dishes[$i]['cat'] = $cat_str[$i];
                                    $parse_dishes[$i]['id'] = $k;
                                }
                            } 
                            
                            if($nameOfDish == ""){
                            
                                $parse_dishes[$i]['img'] = "https://kuharka.ru".$img[$i]->src; 
                                $parse_dishes[$i]['link'] = "https://kuharka.ru".$link[$i]->href;
                                $parse_dishes[$i]['name'] = $name[$i]->plaintext;
                                $parse_dishes[$i]['cat'] = $cat_str[$i];
                                $parse_dishes[$i]['id'] = $k;
                            
                            } 
                            $i++;
                            $k++;
                        }
            
                    
                    }
                    
                    
                    curl_close($ch);
                    require_once(ROOT . '/views/parse/index.php');

                    return true;
        }

        if($start == 1 && $kolOfPages != 1 )
        {
            $k = 0;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $kuharka);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
            $train = curl_exec($ch);
            $html = str_get_html($train);
        
            $img = $html->find("div[class=embed scaleble] a img");
            $link = $html->find("div[class=content-inner] p a"); 
            $name = $html->find("div[class=content-inner] p a");  
            $cat = $html->find("div[class=content-inner] ul"); 
        
            $pages = $html->find("div[class=paginate] "); 
            $lustpage = $pages[0]->last_child()->plaintext;
            
            $i = 0;
            $ebanina = "Раздел";

            $parse_dishes = array();

                    foreach($html->find(" div[class=col-md-9 center] sape_index  .content-box") as $article) 
                    {
                
            
                        if(!strstr($article->plaintext, $ebanina))
                        {
                            $cat_str[$i]="";
                            foreach($article->find("div[class=col-md-7 col-sm-7] div[class=content-inner] ul li a") as $item)
                            {
                                $cat_str[$i]=$cat_str[$i].$item->plaintext.",";
                            }
                
                            if($nameOfDish != ""){
                                if(strstr(mb_strtolower($name[$i]->plaintext), mb_strtolower($nameOfDish)))
                                {
                                    $parse_dishes[$i]['img'] = "https://kuharka.ru".$img[$i]->src; 
                                    $parse_dishes[$i]['link'] = "https://kuharka.ru".$link[$i]->href;
                                    $parse_dishes[$i]['name'] = $name[$i]->plaintext;
                                    $parse_dishes[$i]['cat'] = $cat_str[$i];
                                    $parse_dishes[$i]['id'] = $k;
                                }
                            } 
                            
                            if($nameOfDish == ""){
                            
                                $parse_dishes[$i]['img'] = "https://kuharka.ru".$img[$i]->src; 
                                $parse_dishes[$i]['link'] = "https://kuharka.ru".$link[$i]->href;
                                $parse_dishes[$i]['name'] = $name[$i]->plaintext;
                                $parse_dishes[$i]['cat'] = $cat_str[$i];
                                $parse_dishes[$i]['id'] = $k;
                            
                            } 
                            $i++;
                            $k++;
                        }
            
                    
                    }
                    
                    
                    curl_close($ch);
                        
                    $parse_dishes_all = array();

                    for($g=2;$g<=$kolOfPages;$g++)
                    {
                        $ch = curl_init();
                        $referer= 'https://www.google.com';
                        curl_setopt($ch, CURLOPT_URL, $kuharka."?p=".$g."/");            //https://kuharka.ru/recipes/?p=5
                        curl_setopt($ch, CURLOPT_HEADER, 0);
                        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0");
                        curl_setopt($ch, CURLOPT_REFERER, $referer);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $train = curl_exec($ch);
                        $html = str_get_html($train);
                    
                        $img = $html->find("div[class=embed scaleble] a img");
                        $link = $html->find("div[class=content-inner] p a"); 
                        $name = $html->find("div[class=content-inner] p a");  
                        $cat = $html->find("div[class=content-inner] ul"); 
                    
                        $pages = $html->find("div[class=paginate] "); 
                        $lustpage = $pages[0]->last_child()->plaintext;
                    
                        $i = 0;
                        $ebanina = "Раздел";
                        $parse_dishes_other = array();
                        foreach($html->find(" div[class=col-md-9 center] sape_index  .content-box") as $article) 
                        {
                            
                        
                            if(!strstr(($article->plaintext), ($ebanina)))
                            {
                                $cat_str[$i]="";
                                foreach($article->find("div[class=col-md-7 col-sm-7] div[class=content-inner] ul li a") as $item)
                                {                
                                    $cat_str[$i]=$cat_str[$i].$item->plaintext.",";
                                }
                    

                                if($nameOfDish != ""){
                                    if(strstr(mb_strtolower($name[$i]->plaintext), mb_strtolower($nameOfDish)))
                                    {
                                        $parse_dishes_other[$i]['img'] = "https://kuharka.ru".$img[$i]->src; 
                                        $parse_dishes_other[$i]['link'] = "https://kuharka.ru".$link[$i]->href;
                                        $parse_dishes_other[$i]['name'] = $name[$i]->plaintext;
                                        $parse_dishes_other[$i]['cat'] = $cat_str[$i];
                                        $parse_dishes_other[$i]['id'] = $k;
                                    }//echo "ЛЯЯЯЯЯЯЯЯЯЯЯЯЯ ";
                                } 
                                
                                if($nameOfDish == ""){
                                
                                    $parse_dishes_other[$i]['img'] = "https://kuharka.ru".$img[$i]->src; 
                                    $parse_dishes_other[$i]['link'] = "https://kuharka.ru".$link[$i]->href;
                                    $parse_dishes_other[$i]['name'] = $name[$i]->plaintext;
                                    $parse_dishes_other[$i]['cat'] = $cat_str[$i];
                                    $parse_dishes_other[$i]['id'] = $k;
                                //echo "ЛЯЯЯЯЯЯЯЯЯЯЯЯЯ ";
                                } 
                                $i++;
                                $k++;
                            }
                        
                    
                        }
                    $parse_dishes_all = array_merge($parse_dishes_all, $parse_dishes_other);
                    }
                    
                    
                    curl_close($ch);

                    require_once(ROOT . '/views/parse/index.php');

                    return true;

        }

        if($start != 1)
        {
            $k = 0;
            $parse_dishes_all = array();

                    for($g=$start;$g<=($start + $kolOfPages-1);$g++)
                    {
                        $ch = curl_init();
                        $referer= 'https://www.google.com';
                        curl_setopt($ch, CURLOPT_URL, $kuharka."?p=".$g."/");            //https://kuharka.ru/recipes/?p=5
                        curl_setopt($ch, CURLOPT_HEADER, 0);
                        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0");
                        curl_setopt($ch, CURLOPT_REFERER, $referer);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $train = curl_exec($ch);
                        $html = str_get_html($train);
                    
                        $img = $html->find("div[class=embed scaleble] a img");
                        $link = $html->find("div[class=content-inner] p a"); 
                        $name = $html->find("div[class=content-inner] p a");  
                        $cat = $html->find("div[class=content-inner] ul"); 
                    
                        $pages = $html->find("div[class=paginate] "); 
                        $lustpage = $pages[0]->last_child()->plaintext;
                    
                        $i = 0;
                        $ebanina = "Раздел";
                        //$parse_dishes_other = array();
                        foreach($html->find(" div[class=col-md-9 center] sape_index  .content-box") as $article) 
                        {
                            
                        
                            if(!strstr(($article->plaintext), ($ebanina)))
                            {
                                $cat_str[$i]="";
                                foreach($article->find("div[class=col-md-7 col-sm-7] div[class=content-inner] ul li a") as $item)
                                {                
                                    $cat_str[$i]=$cat_str[$i].$item->plaintext.",";
                                }
                    

                                if($nameOfDish != ""){
                                    if(strstr(mb_strtolower($name[$i]->plaintext), mb_strtolower($nameOfDish)))
                                    {
                                        $parse_dishes_other[$i]['img'] = "https://kuharka.ru".$img[$i]->src; 
                                        $parse_dishes_other[$i]['link'] = "https://kuharka.ru".$link[$i]->href;
                                        $parse_dishes_other[$i]['name'] = $name[$i]->plaintext;
                                        $parse_dishes_other[$i]['cat'] = $cat_str[$i];
                                        $parse_dishes_other[$i]['id'] = $k;
                                    }//echo "ЛЯЯЯЯЯЯЯЯЯЯЯЯЯ ";
                                } 
                                
                                if($nameOfDish == ""){
                                
                                    $parse_dishes_other[$i]['img'] = "https://kuharka.ru".$img[$i]->src; 
                                    $parse_dishes_other[$i]['link'] = "https://kuharka.ru".$link[$i]->href;
                                    $parse_dishes_other[$i]['name'] = $name[$i]->plaintext;
                                    $parse_dishes_other[$i]['cat'] = $cat_str[$i];
                                    $parse_dishes_other[$i]['id'] = $k;
                                //echo "ЛЯЯЯЯЯЯЯЯЯЯЯЯЯ ";
                                } 
                                $i++;
                                $k++;
                            }
                        
                    
                        }
                    $parse_dishes_all = array_merge($parse_dishes_all, $parse_dishes_other);
                    }
                    
                    
                    curl_close($ch);

                    require_once(ROOT . '/views/parse/index.php');

                    return true;
        }
                        
    }



    public function actionPost(){

        require_once(ROOT . '/views/parse/post.php');

        return true;
    }


    public function actionAddDishes()
    {
        if(isset($_POST['submit1']))
        {
            $submit1=$_POST['submit1'];
        }
        if(isset($_POST['submit2']))
        {
            $submit2=$_POST['submit2'];
        }
        if(isset($_POST['check']))
        {
            $aDoor = $_POST['check'];
        }
        
        $name = $_POST['name'];
        $img = $_POST['img'];
        $link = $_POST['link'];
        $cat = $_POST['cat'];
        $id = $_POST['id'];
    
        if(isset($submit1))
        {
            if(!isset($aDoor)) 
            {
                require_once(ROOT . '/views/parse/post.php');

                return true;
            } 
        
            else
            {
                $N = count($aDoor);
                $M = count($id);
                for($i=0; $i < $M; $i++)
                {
                    for($j=0; $j < $N; $j++)
                    {
                        if($id[$i] == $aDoor[$j])
                        {
                            //echo($name[$i] . " <br>");
                            $insertname = $name[$i];
                            //echo($img[$i] . " <br>");
                            $insertimg = $img[$i];
                            //echo($link[$i] . " <br>");
                            $insertlink = $link[$i];
                            //echo($cat[$i] . " <br>");
                            $insertcat = $cat[$i];
                            $Add = Parser::addDishes($insertname, $insertcat, $insertimg, $insertlink) ;
                        }            
                    }
                }
                header("Location: /"); 
            }
        }

        $user_id =$_SESSION["user"] ;

        if(isset($submit2))
        {
            if(!isset($aDoor))  
            {
                require_once(ROOT . '/views/parse/post.php');

                return true;
            } 
        
            else
            {
                $N = count($aDoor);
                $M = count($id);
                for($i=0; $i < $M; $i++)
                {
                    for($j=0; $j < $N; $j++)
                    {
                        if($id[$i] == $aDoor[$j])
                        {
                            //echo($name[$i] . " <br>");
                            $insertname = $name[$i];
                            //echo($img[$i] . " <br>");
                            $insertimg = $img[$i];
                            //echo($link[$i] . " <br>");
                            $insertlink = $link[$i];
                            //echo($cat[$i] . " <br>");
                            $insertcat = $cat[$i];
                            $Add = Parser::addDishes($insertname, $insertcat, $insertimg, $insertlink) ;
                            $correctIds = Menu::getIdByName($insertname);
                            foreach($correctIds as $correctId)
                            {
                                //echo $correctId['id']." ";
                                User::addToChosenList($correctId['id'], $user_id);
                            }
                            
                        }            
                    }
                }
                header("Location: /"); 
            }
        }
        
        
    }





}