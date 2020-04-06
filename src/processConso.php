<?php
    session_start();
    $idUser=1;
    if(isset($_POST['id_delete'])){
        $response = file_get_contents("https://eden.imt-lille-douai.fr/~romain.reinert/api/delete_consommation.php?id_conso=".$_POST['id_delete']);
        $parse = json_decode($response,true);
        header("location : ../journal.php");
    }

    if(isset($_POST['addConso'])){
        if(isset($_POST['dateConso']) and isset($_POST['quantiteConso']) and isset($_POST['nomAliment'])){
            $response = file_get_contents("https://eden.imt-lille-douai.fr/~romain.reinert/api/create_consommation.php?id_utilisateur=$idUser&id_aliment=$_POST[nomAliment]&date_conso=$_POST[dateConso]&quantite=$_POST[quantiteConso]");
            $parse = json_decode($response,true);
            echo $parse["success"];
            header("location : ../journal.php");
        }
        // On pourrait rajouter une alerte si on a le temps qui avertirait lorsqu'une donnée est manquante.
        // On devrait aussi vérifier que les données envoyées sont conformes à celles attendues
        // Pour l'instant on se dit que l'utilisateur ne rentre que des données conformes à celles attendues
    }
    if(isset($_POST['editConso'])){
        echo $_POST['editConso'];
        echo $_POST['dateConso'];
        echo $_POST['quantiteConso'];
        echo $_POST['nomAliment'];
        if(isset($_POST['dateConso']) and isset($_POST['quantiteConso']) and isset($_POST['nomAliment'])){
            echo "yes";
            $response = file_get_contents("https://eden.imt-lille-douai.fr/~romain.reinert/api/update_consommation.php?id_utilisateur=$idUser&id_aliment=$_POST[nomAliment]&date_conso=$_POST[dateConso]&quantite=$_POST[quantiteConso]&id_conso=$_POST[editConso]");
            $parse = json_decode($response,true);
            header("location : ../journal.php");
        }
    }

    header("location: ../journal.php");
?>