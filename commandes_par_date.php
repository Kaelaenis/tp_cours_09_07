<?php $TitrePage = "Liste des Commandes par date";?>
<?php include("header.php"); ?>
<?php require("class.php"); ?>

<?php

$sql = "SELECT * FROM cmd_pdt WHERE Cmd_Pdt_Commande_ID=".$_GET["id"];

$Donnees = $pdo->query($sql);
$RSDonnees = $Donnees -> fetch(PDO::FETCH_ASSOC);


$produits ="SELECT * FROM produits WHERE Produit_ID =".$RSDonnees["Cmd_Pdt_Produit_ID"];

$RSProduits = $pdo->query($produits);
if(!$RSProduits){
    die("Echec de la requête :".$RSProduits->errorInfo());
}


foreach($RSProduits as $rowRSProduits){
    echo $rowRSProduits["Produit_Nom"];
}




?>