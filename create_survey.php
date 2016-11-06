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
                <div class="mdl-cell mdl-cell--8-col mdl-cell--2-offset">
                    <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col no_min_height">
                        <div class="mdl-card__supporting-text mdl-color-text--black custom_card"
                             id="question_survey_content">

                            <div class="mdl-card__supporting-text mdl-color-text--black"
                                 style="width: 96%; min-height: 500px ">
                                <span style="font-size: 30px; font-weight: bold;">Création d'enquête</span>


                                <form action="#">
                                    <div
                                        class="mdl-textfield mdl-js-textfield full-width mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" id="name">
                                        <label class="mdl-textfield__label" for="name">Nom de l'enquête</label>
                                    </div>

                                    <div id="categoryCombobox"
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
                                    </div>


                                    <div>
                                        <span style="font-size: 25px; float: left">Questions:</span>
                                        <button style="float: right" onclick="addQuestion()"
                                                class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect upper-case">
                                            Ajouter
                                        </button>
                                    </div>

                                    <div id="questions">

                                    </div>

                                    <div
                                        class="mdl-textfield mdl-js-textfield full-width mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" id="recommend" pattern="\w*\?$">
                                        <label class="mdl-textfield__label" for="recommend">Recommanderiez-vous</label>
                                    </div>

                                    <div
                                        class="mdl-textfield mdl-js-textfield full-width mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" id="recommend" pattern="\w*\?$">
                                        <label class="mdl-textfield__label" for="recommend">Question Ouverte</label>
                                    </div>

                                    <div
                                        class="mdl-textfield mdl-js-textfield full-width mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" id="recommend">
                                        <label class="mdl-textfield__label" for="recommend">Partagez votre expérience
                                            avec nous !</label>
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
            questionInput.setAttribute("pattern", "\\w*\\?$");
            questionInput.id = "question" + currId;
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

            questionDiv.append($.parseHTML(prefix)[0]);
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
    </script>

</body>
</html>