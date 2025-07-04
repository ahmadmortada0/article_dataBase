<?php 
abstract class Model{

    protected static string $table;
    protected static string $primary_key = "id";

    public static function find(mysqli $mysqli, int $id){
        $sql = sprintf("Select * from %s WHERE %s = ?", 
                        static::$table, 
                        static::$primary_key);
        
        $query = $mysqli->prepare($sql);
        $query->bind_param("i", $id);
        $query->execute();

        $data = $query->get_result()->fetch_assoc();

        return $data ? new static($data) : null;
    }

    public static function all(mysqli $mysqli){
        $sql = sprintf("Select * from %s", static::$table);
        
        $query = $mysqli->prepare($sql);
        $query->execute();

        $data = $query->get_result();

        $objects = [];
        while($row = $data->fetch_assoc()){
            $objects[] = new static($row); //creating an object of type "static" / "parent" and adding the object to the array
        }

        return $objects; //we are returning an array of objects!!!!!!!!
    }
    public static function deleteAllArticles(mysqli $mysqli){
        $sql =sprintf("DELETE  FROM %s",static::$table);
        $query=$mysqli->prepare($sql);
        $query->execute();
    }
    public static function delete(mysqli $mysqli,int $id){
        $found=static::find($mysqli,$id);
        if ($found!==null){
        $sql =sprintf("DELETE  FROM %s where id = ?",static ::$table);
        $query=$mysqli->prepare($sql);
        $query->bind_Param("i",$id);
        echo ($id);
        $query->execute();
            return " deleted";
        }
        return " not found";

    }
public static function findcatogry(mysqli $mysqli, int $id){
        $sql =("Select category_id from articles WHERE id = ?");
        
        $query = $mysqli->prepare($sql);
        $query->bind_param("i", $id);
        $query->execute();

        $data = $query->get_result()->fetch_assoc();

        return $data ;
    }
/////////////////////////////////////////////////////////////////////////////////
    // public static function allArticles(mysqli $mysqli, int $catogryId){
    //     $sql = sprintf("Select * from articles where category_id=?");
        
    //     $query = $mysqli->prepare($sql);
    //     $query->bind_param("i", $catogryId);
    //     $query->execute();

    //     $data = $query->get_result();

    //     $objects = [];
    //     while($row = $data->fetch_assoc()){
    //         $objects[] = new static($row);
    //     }
        
    //     return $objects; 
    // }
    //you have to continue with the same mindset
    //Find a solution for sending the $mysqli everytime... 
    //Implement the following: 
    //1- update() -> non-static function 
    //2- create() -> static function
    //3- delete() -> static function 
}



