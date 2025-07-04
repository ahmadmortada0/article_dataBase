<?php
require(__dir__."/BaseController.php");
require(__dir__."/../models/Catogry.php");
require(__dir__."/../services/CatogryService.php");
require(__dir__."/../seeders/CatogrySeeder.php");
class CatogryController{
    function seed(){
            global $mysqli;
            $catogry=CatogrySeeder::seed($mysqli);}
    function getcatogry(){
        try{
           global  $mysqli;
           if(!isset($_GET["id"])){
           $catgory= Catogry::all($mysqli);
           $catgoryarray=CatogryService::catogryToArray($catgory);
           echo ResponseService::success_response($articles_array);
           return;
           }
           $getten = $_GET["id"];
           $catgory=Catogry::find($mysqli,$getten)->toArray();
           echo ResponseService::success_response($catgory);
           return;
        }
    catch(Exception $e){
        echo "caption error :"->e.getMessage(),"\n";
    }}

}