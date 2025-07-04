<?php
    $apis = [
    '/articles'         => ['controller' => 'ArticleController', 'method' => 'getAllArticles'],
    '/delete_articles'         => ['controller' => 'ArticleController', 'method' => 'deleteAllArticles'],
    '/update_article'          => ['controller'=>"ArticleController" , 'method' =>'updateArticle'],
    '/insert_article'          => ['controller'=>"ArticleController" , 'method' =>'insertArticle'],
    '/login'         => ['controller' => 'AuthController', 'method' => 'login'],
    '/register'         => ['controller' => 'AuthController', 'method' => 'register'],
    '/seedCatogry'      =>['controller'=>'CatogryController','method' =>'seed'],
];