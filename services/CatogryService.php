<?php
    class CatogryService{
        public static function catogryToArray($catogry_db){
            $results=[];
            foreach ($catogry_db as $a ){
            $results[]=$a->toArray();
            }
            return $results;
        }
    }