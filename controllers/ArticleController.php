<?php 
require(__DIR__."/BaseController.php");
require(__DIR__ . "/../models/Article.php");
require(__DIR__ . "/../services/ArticleService.php");
// require(__DIR__ . "/../services/ResponseService.php");

class ArticleController{
    public function getAllArticles(){
    try{

        global $mysqli;

        if(!isset($_GET["id"])){
            $articles = Article::all($mysqli);
            $articles_array = ArticleService::articlesToArray($articles); 
            echo ResponseService::success_response($articles_array);
            return;
        }

        $id = $_GET["id"];
        $article = Article::find($mysqli, $id)->toArray();
        echo ResponseService::success_response($article);
        return;
    } catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
}
    public function allArticles(){
    try{

        global $mysqli;

      
            $articles = Article::allArticles($mysqli);
            $articles_array = ArticleService::articlesToArray($articles); 
            return;
        }

     catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
    }
public function findcatogry(){
$id = $_GET["id"];
$article = Article::findcatogry($mysqli, $id);
echo ResponseService::success_response($article);
// return;
}
    public function deleteAllArticles(){
        global $mysqli;
        try{
        if (!isset($_GET["id"])){
            $article=Article::deleteAllArticles($mysqli);
            echo "all articles deleted";
            return;
        }
        $id=$_GET["id"];
        $article=Article::delete($mysqli,$id);
        echo ($article);
        }catch(Exception $e){
            echo "caught exception :",$e->getMessage();
        }
    }


    public function updateArticle(){
        global $mysqli;
        try{
        $data=json_decode(file_get_contents("php://input"),true);
        $article=new Article([
            "id"=>$data["id"],
            "name" => $data["name"],
            "author" =>$data["author"],
            "description" =>$data["description"]
        ]);
            $article->updateArticle($mysqli,$data["id"],$article->getName(),$article->getAuthor(),$article->getDescription());
        return;
        }catch(Exception $e){
            echo "caught exception :",$e->getMessage();
        }
    }
    public function insertArticle(){
        global $mysqli ;
        try{
            $data=json_decode(file_get_contents("PHP://input"),true);
            echo($data["name"]);
            $article=new Article([
                "id"=>0,
                'name'=>$data["name"],
                'author'=>$data["author"],
                'description'=>$data["description"]
            ]);
            $article->insertArticle($mysqli,$article->getName(),$article->getAuthor(),$article->getDescription());
            echo "the new article inserted";
            return;
    }catch(Exception $e){
        echo "caught exception :" ,$e->getMessage();
    }
    }
}
//To-Do:

//1- Try/Catch in controllers ONLY!!! 
//2- Find a way to remove the hard coded response code (from ResponseService.php)
//3- Include the routes file (api.php) in the (index.php) -- In other words, seperate the routing from the index (which is the engine)
//4- Create a BaseController and clean some imports 