<?php 

    define("SERVER", "localhost"); //Définition de l'adresse du serveur
    define("DBNAME", "aden_bdd7"); //Définition de la base de données
    define("USER", "root"); //Défintion du nom d'utilisateur
    define("PASSWORD", "root"); // Définition du mot de passe user

    try{
        // Connexion à la base de données
        $pdo = new PDO("mysql:host=".SERVER?"; dbname=".DBNAME."; charset=utf8", USER, PASSWORD);
    }catch(PDOException $e){
        // Gestion des erreurs si erreur
        print("Erreur ! ".$e->getMessage());
        die();
    }