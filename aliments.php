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

$json = file_get_contents("https://eden.imt-lille-douai.fr/~romain.reinert/api/aliments.php");
$parse = json_decode($json,true);
require_once("src/head.php");
?>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">iMM</a>
        <div class="navbar" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="journal.php">Journal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profil.php">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="aliments.php">Aliments</a>
                </li>
            </ul>
        </div>
    </nav>
    
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col">
                <div id="" class="card">
                    <div class="card-header">
                        Aliments
                    </div>
                    <div class="card-body">
                        <table id="alimentTableau" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Aliment</th>
                                    <th>Modifier</th>
                                    <th>Supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $nbRow=1;
                                    foreach($parse["result"]["aliments"] as $alim){
                                        echo "<tr>";
                                        echo "<td>".$alim['id_aliment']."</td>";
                                        echo "<td>".$alim['product_name']."</td>";
                                        echo "<td>";
                                        echo '<form action="addAliment.php" method="POST">';
                                        echo '<button type="submit" name="id_edit" value='.$alim["id_aliment"].' class="btn btn-info">Modifier</button>';
                                        echo '</form>';
                                        echo "</td>";
                                        echo "<td>";
                                        echo '<form action="src/processAliment.php" method="POST">';
                                        echo '<button type="submit" name="id_delete" value='.$alim["id_aliment"].' class="btn btn-danger">Supprimer</button>';
                                        echo '</form>';
                                        echo "</td>";
                                        echo "</tr>";
                                        $nbRow++;
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2 mb-2 ml-2">
            <a href="addAliment.php" class="btn btn-primary" role="button">Ajouter un aliment</a>
        </div>
    </div>
</body>

<script>
    $(document).ready( function () {
    $('#alimentTableau').DataTable();
});

</script>
</html>