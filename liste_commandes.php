
<?php $TitrePage = "Liste des Commandes";?>
<?php include("header.php"); ?>
<?php require("class.php"); ?>

<?php

$sql = "SELECT * FROM commandes WHERE Commande_Client_ID=".$_GET["id"];
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
                        <th scope='col'>Prix HT</th>
                        <th scope='col'>Prix TTC (TVA 20%)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($RSCommandes as $rowRSCommandes){
                        $RSPrix = "SELECT produits.Produit_Prix
                                FROM commandes, cmd_pdt, produits 
                                WHERE commandes.Commande_ID =".$rowRSCommandes["Commande_ID"]."
                                AND cmd_pdt.Cmd_Pdt_Commande_ID = commandes.Commande_ID 
                                AND produits.Produit_ID = cmd_pdt.Cmd_Pdt_Produit_ID";
                        $RSPrix1 = $pdo->query($RSPrix);
                        
                        foreach($RSPrix1 as $value){
                            $total += $value['Produit_Prix'];
                        }
                        
                    ?>
                        <tr>
                            <th scope="row">
                                <?php echo $rowRSCommandes["Commande_ID"];?>
                            </th>
                            <td>
                                <a href="commandes.php?id=<?php echo $rowRSCommandes["Commande_ID"]; ?>">
                                    <?php echo $rowRSCommandes["Commande_Date"];?>
                                </a>
                            </td>
                            <td>
                                <?php echo $total*0.80; ?>€
                            </td>
                            <td>
                                <?php 
                                    echo $total; 
                                    $total = 0; 
                                ?>€
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("footer.php");?>