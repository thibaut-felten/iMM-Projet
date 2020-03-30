<?php
require_once("src/head.php");
?>
<body>
    <!-- Comment test 2-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">iMM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="journal.html">Journal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="aliments.php">Aliments</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid mt-2">
        <div id="cardJournal" class="card">
            <div class="card-header">
                Journal
            </div>
            <div class="card-body">
                <table id="journal" class="table">
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
</body>

<script src="src/script.js"></script>
</html>