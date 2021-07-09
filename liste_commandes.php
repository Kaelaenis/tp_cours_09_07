
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
                    <table class="table">
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
                                    <td><?php echo $rowRSCommandes["Commande_Date"];?></td>
                                    <td><?php echo $rowRSClients["Client_Nom"]." ".$rowRSClients["Client_Prenom"]?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>




        
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>