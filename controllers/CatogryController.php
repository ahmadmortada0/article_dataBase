<?php
require(__dir__."/BaseController.php");
require(__dir__."/../models/Catogry.php");
require(__dir__."/../services/CatogryService.php");
require(__dir__."/../seeders/CatogrySeeder.php");
class CatogryController{
    function seed(){
            global $mysqli;
            $catogry=CatogrySeeder::seed($mysqli);}
    function getCatogry(){
        try{
           global  $mysqli;
           if(!isset($_GET["id"])){
           $catgory= Catogry::all($mysqli);
           $catgoryarray=CatogryService::catogryToArray($catgory);
           echo ResponseService::success_response($catgoryarray);
           return;
           }
           $getten = $_GET["id"];
           $catgory=Catogry::find($mysqli,$getten)->toArray();
           echo ResponseService::success_response($catgory);
           return;
        }
    catch(Exception $e){
        echo "caption error :" , $e->getMessage(),"\n";
    }}
    function delete(){
        try{
            global $mysqli;
            if(!isset($_GET["id"])){
            $catgory= Catogry::deleteAllArticles($mysqli);
            return;
            }
           $id= $_GET["id"];
            $catgory= Catogry::delete($mysqli,$id);
        } catch(Exception $e){
        echo "caption error :" , $e->getMessage(),"\n";
    }
    }
    function updateCatogry(){
        try{
             global $mysqli;
             $data=json_decode(file_get_contents("php://input"),true);
                $catgory=new Catogry([
                    "id"=>$data["id"],
                    "title" => $data["title"],
                    "description" =>$data["description"],
                    "price" =>$data["price"]
                ]);
            $catgory->updateCatogry($mysqli ,$data["id"],$catgory->getTitle(),$catgory->getDescription(),$catgory->getprice());
        }catch(Exception $e){
        echo "caption error :" , $e->getMessage(),"\n";
    }
}
    Function insertCatogry(){
        try{
        
        global $mysqli;
        $data=json_decode(file_get_contents("php://input"),true);
                $catgory=new Catogry([
                    "id"=>0,
                    "title" => $data["title"],
                    "description" =>$data["description"],
                    "price" =>$data["price"]
                ]);
                $catgory->insertCatogry($mysqli ,$catgory->getTitle(),$catgory->getDescription(),$catgory->getprice());

    }   catch(Exception $e){
            echo "caption error :" , $e->getMessage(),"\n";
    }
}
}