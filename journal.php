<?php
session_start();
if(!(isset($_SESSION['pseudo']))){
    $_SESSION['pseudo'] = "Invité";
}
if(!(isset($_SESSION['masse']))){
    $_SESSION['masse'] = "60";
}
if(!(isset($_SESSION['actiPhysique']))){
    $_SESSION['actiPhysique'] = "Normal";
}
// Modifier l'id de l'utilisateur en fonction de la session si on veut gérer le multi-utilisateur
$json = file_get_contents("https://eden.imt-lille-douai.fr/~romain.reinert/api/consommations.php?id_utilisateur=1");
$parse = json_decode($json,true);
require_once("src/head.php");
?>
<body>
    <!-- Comment test 2-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">iMM</a>
        <div class="navbar" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="journal.php">Journal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profil.php">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="aliments.php">Aliments</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid mt-2">
        <div class="row">
            <div id="cardJournal" class="card">
                <div class="card-header">
                    Journal
                </div>
                <div class="card-body">
                    <table id="journal" class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Consommation</th>
                                <th>Date</th>
                                <th>Quantité (g)</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  $nbRow = 0;
                            foreach($parse['result']['consommation'] as $conso){
                                $nbRow++;
                                echo "<tr>";
                                echo "<td>$nbRow</td>";
                                echo "<td>$conso[product_name]</td>";
                                echo "<td>$conso[dateConso]</td>";
                                echo "<td>".$conso['quantite']."</td>";
                                echo "<td>";
                                echo "<form action='addConso.php' method='POST'>";
                                echo "<button type='submit' name='id_edit' value=$conso[id_conso] class='btn btn-info'>Modifier</button>";
                                echo '</form>';
                                echo '</td>';
                                echo "<td>";
                                echo "<form action='src/processConso.php' method='POST'>";
                                echo "<button type='submit' name='id_delete' value=$conso[id_conso] class='btn btn-danger'>Supprimer</button>";
                                echo '</form>';
                                echo '</td>';
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row mt-2 mb-2 ml-2">
            <a href="addConso.php" class="btn btn-primary" role="button">Ajouter un aliment au journal</a>
        </div>
    </div>
</body>

<script>
$(document).ready( function () {
    $('#journal').DataTable();
} );
</script>
</html>