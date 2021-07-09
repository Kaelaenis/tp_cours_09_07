
<?php $TitrePage = "Liste des Commandes";?>
<?php include("header.php"); ?>
<?php require("class.php"); ?>

<?php

$sql = "SELECT * FROM commandes";
$RSCommandes = $pdo->query($sql);
if(!$RSCommandes){
    die("Echec de la requête :".$RSCommandes->errorInfo());
}

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table"><br>                
                <thead>
                    <tr>
                        <th scope="col">ID de la commande</th>
                        <th scope="col">Date de la commande</th>
                        <th scope="col">Nom du client</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($RSCommandes as $rowRSCommandes){

                        $client ="SELECT * FROM clients WHERE Client_ID =".$rowRSCommandes["Commande_Client_ID"];
                        $RSClients = $pdo->query($client);
                        if(!$RSClients){
                            die("Echec de la requête :".$RSClients->errorInfo());
                        }

                        $rowRSClients = $RSClients -> fetch(PDO::FETCH_ASSOC);

                    ?>
                        <tr>
                            <th scope="row"><?php echo $rowRSCommandes["Commande_ID"];?></th>
                            <td><a href="commandes_par_date.php?id=<?php echo $rowRSCommandes["Commande_ID"]; ?>"><?php echo $rowRSCommandes["Commande_Date"];?></a></td>
                            <td><?php echo $rowRSClients["Client_Nom"]." ".$rowRSClients["Client_Prenom"]?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("footer.php");?>