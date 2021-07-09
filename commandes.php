<?php include("header.php") ?>
    <?php 
            $sql = "SELECT * FROM cmd_pdt";
            $commandes = $pdo->query($sql);
            if (!$commandes){
                die("Echec de la requête !".$commandes->errorInfo());
            }
            
    ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach($commandes as $donnees){ 
            ?>
            <tr>
                <th scope="row"><?php echo $donnees['Cmd_Pdt_Produit_ID'] ?></th>
                <td><?php echo $donnees['Commande_Date']; ?></td>
                <td><?php echo $donnees['Commande_Client_ID']; ?></td>
                <td><?php echo $RSNom['Produit_Nom']; ?></td>
            </tr>
           <?php } ?>
        </tbody>
    </table>
<?php include("footer.php") ?>