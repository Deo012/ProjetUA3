<?php

require "config.php";

function connect(){
    $dbConnection = new mysqli("SERVER","USERNAME","PASSWORD","DATABASE");
    if($dbConnection->connect_errno != 0){
        $error = $dbConnection->connect_error;
        $error_date = date("F j, Y, g:i a");
        $message = "{$error} | {$error_date} \r\n";
        file_put_contents("db-log.txt", $message, FILE_APPEND);

        return false;
    }
    else{
        return $dbConnection;
    }
}

function registerUser($username, $password, $confirm_password){
    $dbConnection = connect();

    $args = func_get_args();
    $args = array_map(function($value){
        return trim($value);
    }, $args);

    foreach($args as $value){
        if(empty($value) == true) {
            return "All fields are required";
        }
    }
    foreach($args as $value){
        if(preg_match('/([<|>])/',$value) == true) {
            return "<> characters are not allowed";
        }
    }

    $stnt = $dbConnection->prepare("SELECT username FROM client WHERE username = ?");
    $stnt->bind_param("s", $username);
    $stnt->execute();
    $result = $stnt->get_result();
    $data = $result->fetch_assoc();
    if($data != null){
        return "Email existe deja";
    }
}