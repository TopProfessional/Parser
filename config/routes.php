<?php
return array(

    // 'product/([0-9]+)' => 'product/view/$1',
    
    // 'catalog'=>'catalog/index',
    
    // 'category/([0-9]+)/page-([0-9]+)'=>'catalog/category/$1/$2',
    // 'category/([0-9]+)'=>'catalog/category/$1',
    
     'user/register'=>'user/register',
    // 'user/login'=>'user/login',
    
    
    // 'user/logout'=>'user/logout',
    
    // 'cart/checkout' => 'cart/checkout',
    // 'cart/add/([0-9]+)'=>'cart/add/$1',
    // 'cart/addAjax/([0-9]+)'=>'cart/addAjax/$1',
    // 'cart/delete/([0-9]+)' => 'cart/delete/$1',
    // 'cart'=>'cart/index',
    // 'cabinet/edit'=>'cabinet/edit',
    // 'cabinet'=>'cabinet/index',
    
    // // Управление товарами:    
    // 'admin/product/create' => 'adminProduct/create',
    // 'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
    // 'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
    
    // 'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
    
    // 'admin/product' => 'adminProduct/index',
    // // Управление категориями:    
    // 'admin/category/create' => 'adminCategory/create',
    // 'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
    // 'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    // 'admin/category' => 'adminCategory/index',
    // // Управление заказами:    
    // 'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
    // 'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
    // 'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
    // 'admin/order' => 'adminOrder/index',
    
    // 'admin'=>'admin/index',

    'category/getCategoryByChosen/([0-9]+)'=>'category/getCategoryByChosen/$1',
    

    'category/([0-9]+)/page-([0-9]+)'=>'category/index/$1/$2',
    'category/([0-9]+)'=>'category/index/$1',
    
    'user/deleteDishOfUser/([0-9]+)' => 'user/deleteDishOfUser/$1',

    'user/addChosen/([0-9]+)' => 'user/addChosen/$1',
    'cabinet/addComment' => 'cabinet/addComment',
    'parser/index' =>'parser/index',
    'parser/post' =>'parser/post',
    'parser/addDishes' =>'parser/addDishes',
    'cabinet/showUserData' => 'cabinet/showUserData',
    'cabinet/changeUserData' => 'cabinet/changeUserData',


    'page-([0-9]+)' => 'site/index/$1', 

    'cabinet' => 'cabinet/index',
    'exit' => 'user/logout',
    'countries/([0-9]+)' => 'site/countries/$1', 
    '' => 'site/index', 
    


	);