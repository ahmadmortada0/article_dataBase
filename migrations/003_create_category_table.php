<?php
    require ("../connection/connection.php");

    $query="CREATE TABLE category(
             id int(11) AUTO_INCREMENT PRIMARY KEY,
             title VARCHAR(255) NOT NULL,
             description  TEXT NOT NULL , 
             price int(11) NOT NULL)
    ";
    $excute = $mysqli->prepare($query);
    $excute = $mysql->excute();
