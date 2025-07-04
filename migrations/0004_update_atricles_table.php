<?php
 require ("../connection/connection.php");

    $query="ALTER TABLE articles ADD category_id INT;
           
    ";
    $excute = $mysqli->prepare($query);
    $excute = $mysql->excute();
