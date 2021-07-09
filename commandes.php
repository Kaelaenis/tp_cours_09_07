<?php include("header.php") ?>
<?php include("class.php") ?>
<?php $TitrePage="Commandes"; ?>
<?php 
            $sql = "SELECT produits.Produit_ID, produits.Produit_Nom, produits.Produit_Image, produits.Produit_Prix
            FROM commandes, cmd_pdt, produits 
            WHERE commandes.Commande_ID =".$_GET["id"]." 
            AND cmd_pdt.Cmd_Pdt_Commande_ID = commandes.Commande_ID 
            AND produits.Produit_ID = cmd_pdt.Cmd_Pdt_Produit_ID";
            $commandes = $pdo->query($sql);
            if (!$commandes){
                die("Echec de la requête !".$commandes->errorInfo());
            }
            
    ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Image</th>
                        <th scope="col">Prix</th>
                    </tr>
                </thead>
                <tbody>
            <?php 
            foreach($commandes as $donnees){
            ?>
                    <tr>
                        <th scope="row">
                            <?php echo $donnees['Produit_ID']; ?>
                        </th>
                        <td>
                            <?php echo $donnees['Produit_Nom']; ?>
                        </td>
                        <td>
                            <img src="img/<?php echo $donnees['Produit_Image']; ?>" width="100">
                        </td>
                        <td>
                            <?php echo $donnees['Produit_Prix']; ?>
                        </td>
                    </tr>
            <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include("footer.php") ?>