<?php 

    require ("header.php");
    require ("class.php");

    // Création de mon tableau représentant les clients
    // Requête SQL
    
    $sql = "SELECT * FROM clients";
    $RSClients = $pdo -> query($sql);
        
    if(!$RSClients){
        die("Échec de la requête : ".$RSClients->errorInfo());
    }

?>