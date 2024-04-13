<?php

require 'config.php';

function connect(){
    $dbConnection = new mysqli(SERVER,USERNAME,PASSWORD,DATABASE);
    if($dbConnection->connect_errno != 0){
        $error = $dbConnection->connect_error;
        $succesMsg = $dbConnection->thread_safe();
        $error_date = date("F j, Y, g:i a");
        $message = "{$error} | {$error_date} \r\n";
        file_put_contents('C:\xampp\htdocs\ProjetUA3\db-log.txt', $message, FILE_APPEND);
        file_put_contents('C:\xampp\htdocs\ProjetUA3\db-log.txt', $succesMsg, FILE_APPEND);
        var_dump("Connection failed");

        return false;
    }
    else{
        var_dump("Connection reussi");
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
            return "All fields are required!!";
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

    if(strlen($password) > 50){
        return "Mots de passe trop long";
    }
    
    if($password != $confirm_password){
        return "Passwords are not the same";
    }
    

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stnt = $dbConnection->prepare("INSERT INTO client(username, password) VALUES (?,?)");
    $stnt->bind_param("ss", $username, $hashed_password);
    $stnt->execute();
    if($stnt->affected_rows != 1){
        return "Une erreur est survenue. Essaye encore";
    }else{
        return "Succes";
    }
}
function getProduit(){
    echo"getProduit in use";
    $dbConnection = connect();
    $stmt = $dbConnection->prepare("SELECT * FROM produit");
    $stmt->execute();
    $result = $stmt->get_result();
    
    return $result;
    
}

function addProduit($idProduit, $nomProduit, $urlImage, $description){
    echo"addProduit en utilisation";
    $dbConnection = connect();
    $stmt = $dbConnection->prepare("INSERT INTO produit(idProduit, nomProduit, urlImage, description) VALUES(?,?,?,?)");
    if ($stmt === false) {
        die('Error in SQL statement: ' . $dbConnection->error);
    }
    $stmt->bind_param("isss", $idProduit, $nomProduit, $urlImage, $description);
    $stmt->execute();
    if ($stmt->errno) {
        die('Error executing SQL statement: ' . $stmt->error);
    }
    $stmt->close();
    $dbConnection->close();
}
