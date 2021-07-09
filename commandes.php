<?php include("header.php") ?>
<?php include("class.php") ?>
<?php 
            $sql = "SELECT * FROM cmd_pdt WHERE Cmd_Pdt_Commande_ID=".$_GET['id'];
            $commandes = $pdo->query($sql);
            if (!$commandes){
                die("Echec de la requête !".$commandes->errorInfo());
            }
            
    ?>
<div class="container">
    <h2>Commande N°
        <?php echo $commandes['Cmd_Pdt_ID'] ?>
    </h2>
</div>
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
                $sql = "SELECT Cmd_Pdt_Commande_ID FROM cmd_pdt ORDER BY DESC";
                $ordre = $pdo->query($sql);
            ?>
                    <tr>
                        <th scope="row">
                            <?php echo $donnees['Cmd_Pdt_Commande_ID']; ?>
                        </th>
                        <td>
                            <?php echo $donnees['Commande_Date']; ?>
                        </td>
                        <td>
                            <?php echo $donnees['Commande_Client_ID']; ?>
                        </td>
                        <td>
                            <?php echo $RSNom['Produit_Nom']; ?>
                        </td>
                    </tr>
            <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include("footer.php") ?>