<?php 

    $TitrePage = "Clients";

    include ("header.php");
    require ("class.php");

    // Création de mon tableau représentant les clients
    // Requête SQL
    
    $sql = "SELECT * FROM clients";
    $RSClients = $pdo -> query($sql);
        
    if(!$RSClients){
        die("Échec de la requête : ".$RSClients->errorInfo());
    }

?>
    <!-- Début du tableau -->

    <div class = "container">
        <div class = "row">
            <div class = "col-md-12">
                <br>
                    <table class = "table">
                        <thead>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Localisation</th>
                        </thead>

<?php

    // Boucle ForEach

                    foreach($RSClients as $rowClients) {
?>

                    <tr>
                        <th><?php echo $rowClients["Client_ID"]; ?></th>
                        <td><a href = "liste_commandes.php?id=<?php echo $rowClients["Client_ID"]; ?>"><?php echo $rowClients["Client_Nom"]; ?></a></td> <!--?id correspond au paramètre id-->
                        <td><?php echo $rowClients["Client_Prenom"]; ?></td>
                        <td><?php echo $rowClients["Client_Adresse"]; ?></td>
                    </tr>

<?php
                    }
?>

                    </table>   

            </div>
        </div>
    </div>

    
<?php
include ("footer.php");
?>

