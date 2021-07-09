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

    <br>
    <h1> Clients de la société </h1>
    <table class = "table">
        <thead>
            <td>ID</td>
            <td>Nom</td>
            <td>Prénom</td>
            <td>Localisation</td>
        </thead>

<?php




?>





    </table>

