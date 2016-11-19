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
    <link rel="stylesheet" href="css/dropdown.css">
    <link rel="stylesheet" href="css/bootstrap-material-datetimepicker.css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body class="">
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header " style="min-width: 0;">
    <header class="mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
            <span class="mdl-layout-title">
                <a href="index.php">
                    <img src="img/logo.png" style="width: 40%; height: 40%"/>
                </a>
                Nom de l'appareil: <b>Navigateur</b>
                <button type="button"
                        class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect upper-case">
                  Changer
                </button>
            </span>
            <div class="mdl-layout-spacer"></div>
            <span>
                <a href="survey.php"
                   class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect upper-case">
                  Liste des enquêtes
                </a>
                    <a href="logout.php"
                       class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect upper-case">
                      Déconnexion
                    </a>
            </span>
        </div>
    </header>

    <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--2-offset-desktop mdl-cell--12-col-tablet">
                <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col no_min_height">
                    <div class="mdl-card__supporting-text mdl-color-text--black custom_card"
                         id="question_survey_content">

                        <div class="mdl-card__supporting-text mdl-color-text--black"
                             style="width: 96%; min-height: 500px ">
                            <span style="font-size: 30px; font-weight: bold;">Création d'enquête</span>


                            <form action="#" method="post" id="newSurveyForm" name="newSurveyForm">
                                <input type="hidden" value="<?php echo $user->id; ?>;" name="id_user">
                                <div
                                    class="mdl-textfield mdl-js-textfield full-width mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" id="name" name="nom">
                                    <label class="mdl-textfield__label" for="name">Nom de l'enquête</label>
                                </div>

                                <!-- <div id="categoryCombobox"
                                     class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select full-width">
                                    <input class="mdl-textfield__input" type="text" id="category"
                                           value="Cliquer pour choisir une catégorie" readonly tabIndex="-1">
                                    <label for="category">
                                        <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                    </label>
                                    <label for="category" class="mdl-textfield__label">Catégorie</label>
                                    <ul for="category" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                        <li class="mdl-menu__item" value="0">Cliquer pour choisir une catégorie</li>
                                        <li class="mdl-menu__item">Restaurant</li>
                                        <li class="mdl-menu__item">Formation</li>
                                        <li class="mdl-menu__item">E-Learning</li>
                                        <li class="mdl-menu__item">Hotel</li>
                                        <li class="mdl-menu__item">E-commerce</li>
                                        <li class="mdl-menu__item">Evènement</li>
                                    </ul>
                                </div> -->


                                <div>
                                    <span style="font-size: 25px; float: left">Questions:</span>
                                    <button style="float: right" onclick="addQuestion()" type="button"
                                            class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect upper-case">
                                        Ajouter
                                    </button>
                                </div>

                                <div id="questions">

                                </div>

                                <div
                                    class="mdl-textfield mdl-js-textfield full-width mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" id="recommend"
                                           name="expressionQuestion"
                                           pattern=".*\?$">
                                    <label class="mdl-textfield__label" for="recommend">Recommanderiez-vous</label>
                                </div>

                                <div
                                    class="mdl-textfield mdl-js-textfield full-width mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" id="openQuestion"
                                           name="expression" pattern=".*\?$">
                                    <label class="mdl-textfield__label" for="openQuestion">Question Ouverte</label>
                                </div>

                                <div
                                    class="mdl-textfield mdl-js-textfield full-width mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" id="shareExperience"
                                           name="shareExperience">
                                    <label class="mdl-textfield__label" for="shareExperience">Partagez votre
                                        expérience
                                        avec nous !</label>
                                </div>

                                <label class="mdl-typography--display-1">Choisir le logo et le background</label>

                                <div class="mdl-grid">
                                    <div class="mdl-cell--5-col">
                                        <div style="margin-left: 15%">
                                            <label class=" mdl-typography--subhead"
                                                   style="margin-left: 11%;display: block;margin-top: 25px;">
                                                Logo par default
                                                <input id="logoImage-file" name="logo" type="file" accept="image/*"
                                                       style="display: none"/>

                                            </label>
                                            <br/>
                                            <button style="margin-left: 8%;margin-bottom: 25px" id="logoImageButton"
                                                    type="button"
                                                    class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect upper-case">
                                                Choisir un Logo
                                            </button>
                                            <label class=" mdl-typography--subhead"
                                                   style="display: block;margin-top: 25px;">
                                                Image de fond par default
                                                <input id="backgroundImage-file" name="background" type="file"
                                                       accept="image/*"
                                                       style="display: none"/>
                                            </label>
                                            <br/>
                                            <button style="margin-bottom: 25px" id="backgroundImageButton"
                                                    type="button"
                                                    class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect upper-case">
                                                Choisir l'image de fond
                                            </button>

                                        </div>
                                    </div>
                                    <div class="mdl-cell--7-col" style="min-height: 420px">
                                        <img id="backgroundImage" src="img/default_background.jpg" alt="Default"
                                        />
                                        <div id="backgroundImageBox"></div>
                                        <img id="logoImage" src="img/default_logo.png" alt="Default"/>
                                        <span id="imageTextQuestion1">Question 1</span>
                                        <span id="imageTextQuestion2">Etes-vous satisfait?</span>
                                    </div>

                                    <button style="margin-bottom: 25px" type="submit" id="surveySubmitButton"
                                            class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-js-ripple-effect upper-case">
                                        Ajotuer
                                    </button>
                                </div>
                            </form>
                        </div>
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
<script type="text/javascript" src="js/getmdl-select.js"></script>


<script>
    questionCount = 0;
    currId = 0;
    function addQuestion() {
        if (questionCount >= 10) {
            alert("Nombre de questions limité.\nVous ne pouvez pas ajouter plus que 10 questions par enquête.");
            return;
        }

        questionCount++;
        currId++;
        //outer div
        questionDiv = document.createElement('div');
        questionDiv.id = "question" + currId + "Div";
        questionDiv.style = "clear: right";

        //prefix
        prefix = '<div id="prefixCombobox' + currId + '" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select clearLeft" style="width: 175px;float: left;"> <input class="mdl-textfield__input" type="text" id="prefix' + currId + '" value="---Vide---" readonly tabIndex="-1"> <label for="prefix' + currId + '"> <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i> </label> <label for="prefix' + currId + '" class="mdl-textfield__label">Prefix</label> <ul for="prefix' + currId + '" class="mdl-menu mdl-menu--bottom-left mdl-js-menu"> <li class="mdl-menu__item" value="0">---Vide---</li><li class="mdl-menu__item">Est-ce que</li><li class="mdl-menu__item">Aimez-vous</li><li class="mdl-menu__item">Que pensez-vous de</li><li class="mdl-menu__item">Comment vous</li><li class="mdl-menu__item">Êtes-vous</li></ul> </div>';


        //text field
        questionTextField = document.createElement('div');
        questionTextField.className = "mdl-textfield mdl-js-textfield questionTextField";
        //input
        questionInput = document.createElement("input");
        questionInput.className = "mdl-textfield__input";
        questionInput.setAttribute("type", "text");
        questionInput.setAttribute("pattern", ".*\\?$");
        questionInput.id = "question" + currId;
        questionInput.name = "questions[]";

        //label
        questionLabel = document.createElement("label");
        questionLabel.className = "mdl-textfield__label";
        questionLabel.setAttribute("for", questionInput.id);
        questionLabel.innerText = "Question?";

        questionTextField.appendChild(questionInput);
        questionTextField.appendChild(questionLabel);

        //button
        questionDeleteButton = document.createElement("button");
        questionDeleteButton.className = "mdl-button mdl-js-button mdl-button--raised mdl-color--red-200 mdl-js-ripple-effect upper-case questionButton";
        questionDeleteButton.innerText = "Supprimer";
        $(questionDeleteButton).on("click", currId, removeQuestion);

        //questionDiv.append($.parseHTML(prefix)[0]);
        questionDiv.appendChild(questionTextField);
        questionDiv.appendChild(questionDeleteButton);

        componentHandler.upgradeElement(questionTextField);
        componentHandler.upgradeElement(questionInput);
        componentHandler.upgradeElement(questionLabel);
        componentHandler.upgradeElement(questionDeleteButton);

        $("#questions").append(questionDiv);
        getmdlSelect.init('.getmdl-select');
    }

    function removeQuestion(event) {
        id = "#question" + event.data + "Div";
        $("#question" + event.data).hide("10", function () {
            $(id).hide('20', function () {
                $(id).remove();
            });
        });
        questionCount--;
    }

    function readURL(input, imageInput) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#' + imageInput).attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).ready(function () {
        $("#logoImageButton").click(function () {
            $("#logoImage-file").click();
        });

        $("#backgroundImageButton").click(function () {
            $("#backgroundImage-file").click();
        });

        $("#backgroundImage-file").change(function () {
            readURL(this, 'backgroundImage');
        });

        $("#logoImage-file").change(function () {
            readURL(this, 'logoImage');
        });

        $("#newSurveyForm").on('submit', (function (e) {
            e.preventDefault();
            $("#message").empty();
            $('#loading').show();
            console.log(new FormData(this));
            $.ajax({
                url: SURVEY_URL, // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData: false,        // To send DOMDocument or non processed data file it is set to false
                success: function (data)   // A function to be called if request succeeds
                {
                    if (data.error == false) {
                        alert("L'enquête est inséré avec succès!");
                        window.location = "index.php"
                    } else {
                        alert(data.message);
                    }
                }
            });
        }));
    });


    const SURVEY_URL = window.location.origin + "/myfeel_api/v1/enquetes";


</script>

</body>
</html>