<?php
/**
 * Created by PhpStorm.
 * User: evilkid
 * Date: 7/14/2016
 * Time: 4:48 AM
 */

$user = null;
session_start();
if (!isset($_SESSION['user'])) {
    header('location: login.php');
} else {
    $user = $_SESSION['user'];
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <title>My Feel Dashboard</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="images/favicon.png">

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/material.blue-light_blue.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap-material-datetimepicker.css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body class="MinWidth1200">
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header ">
    <header class="mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
            <span class="mdl-layout-title">
                <a href="index.php">
                    <img src="img/logo.png" style="width: 40%; height: 40%"/>
                </a>
                Nom de l'appareil: <b>Navigateur</b>
                <button
                    class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect upper-case">
                  Changer
                </button>
            </span>
            <div class="mdl-layout-spacer"></div>
            <span class="Margin5Px">

                    <a href="create_survey.php"
                       class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect upper-case">
                      Créer une enquête
                    </a>
            </span>

            <span>

                    <a href="logout.php"
                       class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect upper-case">
                      Déconnexion
                    </a>
            </span>
        </div>
    </header>

    <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--2-col">
                <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col">
                    <div class="mdl-card__supporting-text mdl-color-text--black" id="survey_nav">
                    </div>
                </div>

            </div>
            <div class="mdl-cell mdl-cell--10-col">
                <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col no_min_height">
                    <div class="mdl-card__supporting-text mdl-color-text--black custom_card" id="survey_content">

                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
<script type="text/javascript" src="js/bootstrap-material-datetimepicker.js"></script>

<script>
    const SURVEY_URL = window.location.origin + "/myfeel_api/v1/enquetes/all";

    function updateDashboard() {
        var data = new Object();

        $.post(SURVEY_URL, {"id_user": <?php echo $user->id; ?>})
            .done(function (data) {
                //console.log(data);
                updateList(data.enquetes);
            })
            .error(function (data) {
                alert("Could not connect to sever")
                console.log(data);
            });
    }


    function updateList(surveys) {
        console.log(surveys);

        surveys.forEach(function (survey) {
            surveyDiv = document.createElement('div');
            surveyDiv.classList = "Margin5Px clearLeftComment";

            $(surveyDiv).append("<span class='commentText'><b>" + survey.nom + "</b>");
            $(surveyDiv).on("click", survey, fillContent);
            $("#survey_nav").append(surveyDiv);
        });
    }

    function fillContent(event) {
        survey = event.data;

        console.log(survey)
        surveyDiv = document.createElement('div');
        surveyDiv.classList = "Margin10Px";

        $(surveyDiv).append("<h4><b>Nom: </b>" + survey.nom + "</h4>");
        $(surveyDiv).append("<h4><b>Catégorie: </b>" + survey.categorie + "</h4>");
        $(surveyDiv).append("<h4><b>Questions: </b></h4>");

        survey.questions.forEach(function (question) {
            console.log(question);
            $(surveyDiv).append("<h4>" + question.question + "</h4>");
        });

        $(surveyDiv).append("<h4><b>Recommandation: </b> Recommanderiez-vous " + survey.recommandation + " </h4>");

        $("#survey_content").empty();
        $("#survey_content").append(surveyDiv);
    }

    var test = null;
    $(document).ready(function () {
        updateDashboard();
    });
</script>
</body>
</html>