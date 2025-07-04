<?php
    $apis = [
    '/articles'         => ['controller' => 'ArticleController', 'method' => 'getAllArticles'],
    '/delete_articles'         => ['controller' => 'ArticleController', 'method' => 'deleteAllArticles'],
    '/update_article'          => ['controller'=>"ArticleController" , 'method' =>'updateArticle'],
    '/insert_article'          => ['controller'=>"ArticleController" , 'method' =>'insertArticle'],
    '/login'         => ['controller' => 'AuthController', 'method' => 'login'],
    '/register'         => ['controller' => 'AuthController', 'method' => 'register'],
    '/seedCatogry'      =>['controller'=>'CatogryController','method' =>'seed'],
    '/Catogry'      =>['controller'=>'CatogryController','method' =>'getCatogry'],
    '/deleteCatogry'      =>['controller'=>'CatogryController','method' =>'delete'],
    '/updateCatogry'      =>['controller'=>'CatogryController','method' =>'updateCatogry'],
    '/insertCatogry'      =>['controller'=>'CatogryController','method' =>'insertCatogry'],
];