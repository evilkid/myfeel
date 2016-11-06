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

//default
$stats = '{"id_user":3,"date":{"type":"general","from":"2016-08-19","to":"2016-08-20"},"returns":"all","client":[],"clients":[],"enquetes":[],"devices":[]}';
if (isset($_POST['stats'])) {
    $stats = $_POST['stats'];
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
            <div class="mdl-cell mdl-cell--3-col">
                <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col">
                    <div class="mdl-card__supporting-text mdl-color-text--black" id="comment_nav">
                    </div>
                </div>

            </div>
            <div class="mdl-cell mdl-cell--9-col">
                <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col no_min_height">
                    <div class="mdl-card__supporting-text mdl-color-text--black custom_card" id="comment_content">

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
    const COMMENT_URL = window.location.origin + "/myfeel_api/v1/comments";

    function updateDashboard() {
        var data = new Object();

        data.stats = '<?php echo $stats;?>';

        $.post(COMMENT_URL, data)
            .done(function (data) {
                console.log(data);
                updateList(data.list);
            })
            .error(function (data) {
                alert("Could not connect to sever")
                console.log(data);
            });
    }


    function updateList(comments) {
        comments.forEach(function (comment) {
            commentDiv = document.createElement('div');
            commentDiv.classList = "Margin5Px clearLeftComment";

            imageName = "";
            if (comment.moyenne == 10) {
                imageName = "smiley_5";
            } else if (comment.moyenne > 7.5) {
                imageName = "smiley_4";
            } else if (comment.moyenne > 5) {
                imageName = "smiley_3";
            } else if (comment.moyenne > 2.5) {
                imageName = "smiley_2";
            } else if (comment.moyenne > 0) {
                imageName = "smiley_1";
            }
            imageName += ".png";

            $(commentDiv).append("<img src='img/" + imageName + "' class='commentPageImage'/>");
            $(commentDiv).append("<span class='commentText'><b>" + comment.expressionquestion + "</b> " + comment.created_at + "</span>");
            $(commentDiv).on("click", comment, fillContent);
            $("#comment_nav").append(commentDiv);
        });
    }

    function fillContent(event) {
        comment = event.data;

        commentDiv = document.createElement('div');
        commentDiv.classList = "Margin10Px";

        imageName = "";
        if (comment.moyenne == 10) {
            imageName = "smiley_5";
        } else if (comment.moyenne > 7.5) {
            imageName = "smiley_4";
        } else if (comment.moyenne > 5) {
            imageName = "smiley_3";
        } else if (comment.moyenne > 2.5) {
            imageName = "smiley_2";
        } else if (comment.moyenne > 0) {
            imageName = "smiley_1";
        }
        imageName += ".png";

        $(commentDiv).append("<img src='img/" + imageName + "' class='commentPageImageMain'/>");
        $(commentDiv).append("<span class='commentTextMain'><b>" + comment.expressionquestion + "</b> " + comment.created_at + "</span>");
        $(commentDiv).append("<br/>");
        $(commentDiv).append("<br/>");
        $(commentDiv).append("<h5><b>Utilisateur: </b>" + comment.expressionquestion + "</h5>");
        $(commentDiv).append("<h5><b>Commentaire: </b>" + comment.expression + "</h5>");
        $(commentDiv).append("<h5><b>Questions: </b></h5>");

        reponses = comment.reponses.split('');
        for (i = 0; i < reponses.length; i++) {

            imageName = "smiley_";
            imageName += reponses[i];
            imageName += ".png";

            responseComment = document.createElement('div');
            responseComment.classList = "Margin5Px";
            $(responseComment).append("<img src='img/" + imageName + "' class='responseCommentImage'/>");
            $(responseComment).append("<span style='font-size: 16px;'>" + comment.questions[i].question + "</span>");

            $(commentDiv).append(responseComment);
        }

        imageName = "smiley_";
        imageName += comment.recommandationReponse;
        imageName += ".png";

        recommend = document.createElement('div');
        recommend.classList = "Margin5Px";
        $(recommend).append("<img src='img/" + imageName + "' class='responseCommentImage'/>");
        $(recommend).append("<span style='font-size: 16px;'>Recommanderiez-vous " + comment.recommandation + "</span>");

        $(commentDiv).append(recommend);

        $("#comment_content").empty();
        $("#comment_content").append(commentDiv);
    }

    var test = null;
    $(document).ready(function () {
        updateDashboard();
    });
</script>
</body>
</html>