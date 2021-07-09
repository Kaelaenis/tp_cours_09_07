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

    // Début du tableau

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

    foreach($RSClients as $rowClients) {
        $rowClients["Client_ID"];
        $rowClients["Client_Nom"];
        $rowClients["Client_Prénom"];
        $rowClients["Client_Adresse"];

?>

    <tr>
        <td><?php echo $rowClients["Client_ID"]; ?></td>
        <td><?php echo $rowClients["Client_Nom"]; ?></td>
        <td><?php echo $rowClients["Client_Prénom"]; ?></td>
        <td><?php echo $rowClients["Client_Adresse"]; ?></td>
    </tr>

<?php
    }
?>

    </table>   

