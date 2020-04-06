<?php
session_start();

// On pourrait discuter des données par défaut, elles n'existeraient pas en cas d'appli multi-utilisateurs.
// Le multi-utilisateur était la prochaine fonctionnalité que nous voulions implémenter

if(!(isset($_SESSION['pseudo']))){
    $_SESSION['pseudo'] = "Invité";
}
if(!(isset($_SESSION['masse']))){
    $_SESSION['masse'] = "60";
}
if(!(isset($_SESSION['sexe']))){
    $_SESSION['sexe'] = "Homme";
}
if(!(isset($_SESSION['actiPhysique']))){
    $_SESSION['actiPhysique'] = "Normal";
}

require_once("src/head.php");
?>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">iMM</a>
        <div class="navbar" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="journal.php">Journal</a>
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
    <div class="container mt-2">
        <div class="row">
            <h1>Bienvenue <?php echo $_SESSION['pseudo'];?></h1>
        </div>
    </div>

    <div class="container-fluid mt-2">
        <div class="row">           
            <div class="col" id="cardChartCalorie">
                <div class="card cardChart">
                    <div class="card-header">
                        Quantité de calories ingérées
                    </div>
                    <div class="card-body">
                        <canvas id="chartCal"></canvas>
                    </div>
                </div>
                <p>Recommandé pour vous: <span id="calReco"></span>kcal</p>
            </div>
            <div class="col" id="cardChartSucre">
                <div class="card cardChart">
                    <div class="card-header">
                        Quantité de sucre consommée
                    </div>
                    <div class="card-body">
                        <canvas id="chartSucre"></canvas>
                    </div>
                </div>
                <p>Recommandé pour vous: <span id="SucreReco"></span>g</p>
            </div>
        </div>
        <div class="row">
            <div class="col" id="cardChartSel">
                <div class="card cardChart">
                    <div class="card-header">
                        Quantité de sel ingérée
                    </div>
                    <div class="card-body">
                        <canvas id="chartSel"></canvas>
                    </div>
                </div>
                <p>Recommandé pour vous: 5g</p>
            </div>
            <div class="col" id="cardChartProteines">
                <div class="card cardChart">
                    <div class="card-header">
                        Quantité de protéines consommées
                    </div>
                    <div class="card-body">
                        <canvas id="chartProteines"></canvas>
                    </div>
                </div>
                <p>Recommandé pour vous: <span id="protReco"></span>g</p>
            </div>
        </div>
        <div class="row">
            <div class="col" id="cardChartFat">
                <div class="card cardChart">
                    <div class="card-header">
                        Quantité de matière grasse ingérée
                    </div>
                    <div class="card-body">
                        <canvas id="chartFat"></canvas>
                    </div>
                </div>
                <p>Recommandé pour vous: <span id="fatReco"></span>g</p>
            </div>
            <div class="col" id="cardTableApport">
                <div class="card cardChart">
                    <div class="card-header">
                        Apports recomandés journaliers
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sexe</th>
                                    <th>Femme</th>
                                    <th>Homme</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">Activité physique faible</td>
                                    <td>1800 kcal</td>
                                    <td>2100 kcal</td>
                                </tr>
                                <tr>
                                    <td scope="row">Activité physique normale</td>
                                    <td>2000 kcal</td>
                                    <td>2600 kcal</td>
                                </tr>
                                <tr>
                                    <td scope="row">Activité physique intense</td>
                                    <td>2600 kcal</td>
                                    <td>3300 kcal</td>
                                </tr>
                                <tr>
                                    <td scope="row">Protéines</td>
                                    <td colspan=2>1g par kg de masse corporelle</td>
                                </tr>
                                <tr>
                                    <td scope="row">Sel</td>
                                    <td colspan=2>5g </td>
                                </tr>
                                <tr>
                                    <td scope="row">Matières grasses</td>
                                    <td colspan=2>30% de l'apport en calories (1g -> 9kcal)</td>
                                </tr>
                                <tr>
                                    <td scope="row">Sucre (glucides)</td>
                                    <td colspan=2>5% de l'apport en calories (1g -> 4kcal)</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<!-- Script pour afficher les graphiques -->

<script>
let date = new Date();
let annee = date.getFullYear();
let mois = ('0'+(date.getMonth()+1)).slice(-2);
let jour = ('0'+date.getDate()).slice(-2);
console.log(annee);
console.log(mois);
console.log(jour);

let retireJour = function(date, jours) {
    let result = new Date();
    result.setDate(date.getDate() - jours);
    result.setHours(0);
    result.setMinutes(0);
    result.setSeconds(0);
    return result;
};

<?php echo "let masse=$_SESSION[masse];";
    echo "let sexe='$_SESSION[sexe]';";
    echo "let acti='$_SESSION[actiPhysique]';";
?>

$("#protReco").html(masse)


$.ajax({
    url: 'https://eden.imt-lille-douai.fr/~romain.reinert/api/consommations.php?id_utilisateur=1&date1='+annee+'-'+mois+'-'+jour,
    dataType: 'json',
    type: 'GET',
}).done(function(response) {  
    console.log(response);
    const consos = response['result']['consommation'];
    //Itérer sur les 7 derniers jours et créer le tableau
    let apportSemaineCourante = {};
    apportSemaineCourante.dates = [];
    for(let i=0; i<7; i++){
        apportSemaineCourante.dates.push(retireJour(date, i));
        apportSemaineCourante.dates[i].fat=0;
        apportSemaineCourante.dates[i].proteins=0;
        apportSemaineCourante.dates[i].sugar=0;
        apportSemaineCourante.dates[i].kcal=0;
        apportSemaineCourante.dates[i].salt=0;
    }
    for(let conso of consos){
        let dateConsoArray = conso['dateConso'].split("-");
        let dateConso = new Date(dateConsoArray[0], dateConsoArray[1]-1, dateConsoArray[2]);
        for(i in apportSemaineCourante.dates){
            dateTab = apportSemaineCourante.dates[i];
            if(dateTab.getYear() == dateConso.getYear() && dateTab.getMonth() == dateConso.getMonth() && dateTab.getDate() == dateConso.getDate()){
                apportSemaineCourante.dates[i].fat+=(conso['fat_100g']*conso['quantite']/100);
                apportSemaineCourante.dates[i].sugar+=(conso['sugars_100g']*conso['quantite']/100);
                apportSemaineCourante.dates[i].salt+=(conso['salt_100g']*conso['quantite']/100);
                apportSemaineCourante.dates[i].proteins+=(conso['proteins_100g']*conso['quantite']/100);
                apportSemaineCourante.dates[i].kcal+=(conso['energy-kcal_100g']*conso['quantite']/100);
            }
        }
    }

    // jQuery pour afficher les apports recommandés
    switch (sexe) {
        case "Femme":
            switch (acti) {
                case "Faible":
                    $("#calReco").html(1800);
                    $("#SucreReco").html(23);
                    $("#fatReco").html(60);
                    break;
                case "Normal":
                    $("#calReco").html(2000);
                    $("#SucreReco").html(25);
                    $("#fatReco").html(67);
                    break;
                case "Intense":
                    $("#calReco").html(2600);
                    $("#SucreReco").html(33);
                    $("#fatReco").html(87);
                    break;
            }
            break;
        case "Homme":
            switch (acti) {
                case "Faible":
                    $("#calReco").html(2100);
                    $("#SucreReco").html(27);
                    $("#fatReco").html(70);
                    break;
                case "Normal":
                    $("#calReco").html(2600);
                    $("#SucreReco").html(33);
                    $("#fatReco").html(87);
                    break;
                case "Intense":
                    $("#calReco").html(3300);
                    $("#SucreReco").html(42);
                    $("#fatReco").html(110);
                    break;
                default:
                    break;
            }
        default:
            break;
    }
    

    // Graphique Energie
    let chartEnergy = new Chart(document.getElementById("chartCal"), {
    type: 'line',
    data: {
        labels: [retireJour(date,6),retireJour(date,5),retireJour(date,4),retireJour(date,3),retireJour(date,2),retireJour(date,1),retireJour(date,0)],
        datasets: [{
        label: 'Energie (kcal)',
        data: [{
            t: retireJour(date,6),
            y: apportSemaineCourante.dates[6].kcal
            },
            {
            t: retireJour(date,5),
            y: apportSemaineCourante.dates[5].kcal
            },
            {
            t: retireJour(date,4),
            y: apportSemaineCourante.dates[4].kcal
            },
            {
            t: retireJour(date,3),
            y: apportSemaineCourante.dates[3].kcal
            },
            {
            t: retireJour(date,2),
            y: apportSemaineCourante.dates[2].kcal
            },
            {
            t: retireJour(date,1),
            y: apportSemaineCourante.dates[1].kcal
            },
            {
            t: retireJour(date,0),
            y: apportSemaineCourante.dates[0].kcal
            }
        ],
        backgroundColor: [
            'rgba(255, 242, 117, 0.3)',
            'rgba(255, 242, 117, 0.3)',
            'rgba(255, 242, 117, 0.3)',
            'rgba(255, 242, 117, 0.3)',
            'rgba(255, 242, 117, 0.3)',
            'rgba(255, 242, 117, 0.3)'
        ],
        borderColor: [
            'rgba(255, 242, 117, 1)',
            'rgba(255, 242, 117, 1)',
            'rgba(255, 242, 117, 1)',
            'rgba(255, 242, 117, 1)',
            'rgba(255, 242, 117, 1)',
            'rgba(255, 242, 117, 1)',
        ],
        borderWidth: 1
        }]
    },
    options: {
        scales: {
        xAxes: [{
            type: 'time'
        }]
        }
    }
    });

    // Graphique Proteines
    let chartProteins = new Chart(document.getElementById("chartProteines"), {
    type: 'line',
    data: {
        labels: [retireJour(date,6),retireJour(date,5),retireJour(date,4),retireJour(date,3),retireJour(date,2),retireJour(date,1),retireJour(date,0)],
        datasets: [{
        label: 'Proteines (g)',
        data: [{
            t: retireJour(date,6),
            y: apportSemaineCourante.dates[6].proteins
            },
            {
            t: retireJour(date,5),
            y: apportSemaineCourante.dates[5].proteins
            },
            {
            t: retireJour(date,4),
            y: apportSemaineCourante.dates[4].proteins
            },
            {
            t: retireJour(date,3),
            y: apportSemaineCourante.dates[3].proteins
            },
            {
            t: retireJour(date,2),
            y: apportSemaineCourante.dates[2].proteins
            },
            {
            t: retireJour(date,1),
            y: apportSemaineCourante.dates[1].proteins
            },
            {
            t: retireJour(date,0),
            y: apportSemaineCourante.dates[0].proteins
            }
        ],
        backgroundColor: [
            'rgba(255, 140, 66, 0.2)',
            'rgba(255, 140, 66, 0.2)',
            'rgba(255, 140, 66, 0.2)',
            'rgba(255, 140, 66, 0.2)',
            'rgba(255, 140, 66, 0.2)',
            'rgba(255, 140, 66, 0.2)'
        ],
        borderColor: [
            'rgba(255, 140, 66, 1)',
            'rgba(255, 140, 66, 1)',
            'rgba(255, 140, 66, 1)',
            'rgba(255, 140, 66, 1)',
            'rgba(255, 140, 66, 1)',
            'rgba(255, 140, 66, 1)',
        ],
        borderWidth: 1
        }]
    },
    options: {
        scales: {
        xAxes: [{
            type: 'time'
        }]
        }
    }
    });

        // Graphique Matieres Grasses
        let chartFat = new Chart(document.getElementById("chartFat"), {
    type: 'line',
    data: {
        labels: [retireJour(date,6),retireJour(date,5),retireJour(date,4),retireJour(date,3),retireJour(date,2),retireJour(date,1),retireJour(date,0)],
        datasets: [{
        label: 'Matière grasse (g)',
        data: [{
            t: retireJour(date,6),
            y: apportSemaineCourante.dates[6].fat
            },
            {
            t: retireJour(date,5),
            y: apportSemaineCourante.dates[5].fat
            },
            {
            t: retireJour(date,4),
            y: apportSemaineCourante.dates[4].fat
            },
            {
            t: retireJour(date,3),
            y: apportSemaineCourante.dates[3].fat
            },
            {
            t: retireJour(date,2),
            y: apportSemaineCourante.dates[2].fat
            },
            {
            t: retireJour(date,1),
            y: apportSemaineCourante.dates[1].fat
            },
            {
            t: retireJour(date,0),
            y: apportSemaineCourante.dates[0].fat
            }
        ],
        backgroundColor: [
            'rgba(255, 60, 56, 0.3)',
            'rgba(255, 60, 56, 0.3)',
            'rgba(255, 60, 56, 0.3)',
            'rgba(255, 60, 56, 0.3)',
            'rgba(255, 60, 56, 0.3)',
            'rgba(255, 60, 56, 0.3)'
        ],
        borderColor: [
            'rgba(255, 60, 56, 1)',
            'rgba(255, 60, 56, 1)',
            'rgba(255, 60, 56, 1)',
            'rgba(255, 60, 56, 1)',
            'rgba(255, 60, 56, 1)',
            'rgba(255, 60, 56, 1)',
        ],
        borderWidth: 1
        }]
    },
    options: {
        scales: {
        xAxes: [{
            type: 'time'
        }]
        }
    }
    });

    // Graphique Sel
    var chartSel = new Chart(document.getElementById("chartSel"), {
    type: 'line',
    data: {
        labels: [retireJour(date,6),retireJour(date,5),retireJour(date,4),retireJour(date,3),retireJour(date,2),retireJour(date,1),retireJour(date,0)],
        datasets: [{
        label: 'Sel (g)',
        data: [{
            t: retireJour(date,6),
            y: apportSemaineCourante.dates[6].salt
            },
            {
            t: retireJour(date,5),
            y: apportSemaineCourante.dates[5].salt
            },
            {
            t: retireJour(date,4),
            y: apportSemaineCourante.dates[4].salt
            },
            {
            t: retireJour(date,3),
            y: apportSemaineCourante.dates[3].salt
            },
            {
            t: retireJour(date,2),
            y: apportSemaineCourante.dates[2].salt
            },
            {
            t: retireJour(date,1),
            y: apportSemaineCourante.dates[1].salt
            },
            {
            t: retireJour(date,0),
            y: apportSemaineCourante.dates[0].salt
            }
        ],
        backgroundColor: [
            'rgba(102, 153, 204, 0.4)',
            'rgba(102, 153, 204, 0.4)',
            'rgba(102, 153, 204, 0.4)',
            'rgba(102, 153, 204, 0.4)',
            'rgba(102, 153, 204, 0.4)',
            'rgba(102, 153, 204, 0.4)'
        ],
        borderColor: [
            'rgba(102, 153, 204, 1)',
            'rgba(102, 153, 204, 1)',
            'rgba(102, 153, 204, 1)',
            'rgba(102, 153, 204, 1)',
            'rgba(102, 153, 204, 1)',
            'rgba(102, 153, 204, 1)',
        ],
        borderWidth: 1
        }]
    },
    options: {
        scales: {
        xAxes: [{
            type: 'time'
        }]
        }
    }
    });

        // Graphique Sucre
        var chartSucre = new Chart(document.getElementById("chartSucre"), {
    type: 'line',
    data: {
        labels: [retireJour(date,6),retireJour(date,5),retireJour(date,4),retireJour(date,3),retireJour(date,2),retireJour(date,1),retireJour(date,0)],
        datasets: [{
        label: 'Sucre (g)',
        data: [{
            t: retireJour(date,6),
            y: apportSemaineCourante.dates[6].sugar
            },
            {
            t: retireJour(date,5),
            y: apportSemaineCourante.dates[5].sugar
            },
            {
            t: retireJour(date,4),
            y: apportSemaineCourante.dates[4].sugar
            },
            {
            t: retireJour(date,3),
            y: apportSemaineCourante.dates[3].sugar
            },
            {
            t: retireJour(date,2),
            y: apportSemaineCourante.dates[2].sugar
            },
            {
            t: retireJour(date,1),
            y: apportSemaineCourante.dates[1].sugar
            },
            {
            t: retireJour(date,0),
            y: apportSemaineCourante.dates[0].sugar
            }
        ],
        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(255, 99, 132, 1)',
            'rgba(255, 99, 132, 1)',
            'rgba(255, 99, 132, 1)',
            'rgba(255, 99, 132, 1)',
            'rgba(255, 99, 132, 1)',
        ],
        borderWidth: 1
        }]
    },
    options: {
        scales: {
        xAxes: [{
            type: 'time'
        }]
        }
    }
    });


});

</script>

</html>