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
require_once("src/head.php");
?>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">iMM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
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
            <div class="col-4-md">
                <div class="card">
                    <div class="card-header">
                        Ajouter un aliment à la base
                    </div>
                    <div class="card-body">
                    <form>
                        <div class="form-group row">
                            <label for="nomAliment" class="col col-form-label-sm">Nom</label>
                            <div class="col">
                                <input type="text" class="form-control form-control-sm" name="nomAliment" id="nomAliment" placeholder="Aliment">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="selAliment" class="col col-form-label">Teneur en sel</label>
                            <div class="col">
                                <input type="text" class="form-control form-control-sm" name="selAliment" id="selAliment" placeholder="Teneur en sel">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sucreAliment" class="col col-form-label">Teneur en sucre</label>
                            <div class="col">
                                <input type="text" class="form-control form-control-sm" name="sucreAliment" id="sucreAliment" placeholder="Teneur en sucre">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="calorieAliment" class="col col-form-label">Calories</label>
                            <div class="col">
                                <input type="text" class="form-control form-control-sm" name="calorieAliment" id="calorieAliment" placeholder="Calories">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
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
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>La raclette du sale</td>
                                    <td><button class="btn btn-info">Edit</button></td>
                                    <td><button class="btn btn-danger">Delete</button></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>La goutte du Papy</td>
                                    <td><button class="btn btn-info">Edit</button></td>
                                    <td><button class="btn btn-danger">Delete</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    $(document).ready( function () {
    $('#alimentTableau').DataTable();
} );
</script>
</html>