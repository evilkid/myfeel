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


    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.getmdl.io/1.1.3/material.min.js"></script>
    <script type="text/javascript" src="js/loader.js"></script>
    <script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-material-datetimepicker.js"></script>
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
            <div class="mdl-cell mdl-cell--2-col">
                <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col">
                    <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                        DATE: <br/>

                        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect MarginTop5px" for="general">
                            <input type="radio" id="general" class="mdl-radio__button" name="date" value="general"
                                   checked>
                            <span class="mdl-radio__label mdl-color-text--black ">Général</span>
                        </label> <br/>

                        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="today">
                            <input type="radio" id="today" class="mdl-radio__button" name="date" value="today">
                            <span class="mdl-radio__label mdl-color-text--black ">Aujourd'hui</span>
                        </label> <br/>

                        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="week">
                            <input type="radio" id="week" class="mdl-radio__button" name="date"
                                   value="week">
                            <span class="mdl-radio__label mdl-color-text--black ">7 derniers jours</span>
                        </label> <br/>

                        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="fromto">
                            <input type="radio" id="fromto" class="mdl-radio__button" name="date"
                                   value="fromto">
                            <span class="mdl-radio__label mdl-color-text--black">
                                    Du <input type="text" id="from" placeholder="Du" class="mdl-textfield__input"
                                              disabled>
                                    au <input type="text" id="to" placeholder="Au" class="mdl-textfield__input"
                                              disabled>
                            </span>
                        </label> <br/>

                        <hr/>

                        TYPE DE CLIENT: <br/>

                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect MarginTop5px MarginBot5px"
                               for="type-5">
                            <input type="checkbox" name="client" id="type-5" class="mdl-checkbox__input" value="5">
                            <span class="mdl-checkbox__label mdl-color-text--black"> <img src="img/smiley_5_min.png"> Très satisfait</span>
                        </label> <br/>

                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect MarginBot5px" for="type-4">
                            <input type="checkbox" name="client" id="type-4" class="mdl-checkbox__input" value="4">
                            <span class="mdl-checkbox__label mdl-color-text--black"> <img src="img/smiley_4_min.png"> satisfait</span>
                        </label>

                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect MarginBot5px" for="type-3">
                            <input type="checkbox" name="client" id="type-3" class="mdl-checkbox__input" value="3">
                            <span class="mdl-checkbox__label mdl-color-text--black"> <img src="img/smiley_3_min.png"> Neutre</span>
                        </label> <br/>

                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect MarginBot5px" for="type-2">
                            <input type="checkbox" name="client" id="type-2" class="mdl-checkbox__input" value="2">
                            <span class="mdl-checkbox__label mdl-color-text--black"> <img src="img/smiley_2_min.png"> Peu satisfait</span>
                        </label> <br/>

                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect MarginBot5px" for="type-1">
                            <input type="checkbox" name="client" id="type-1" class="mdl-checkbox__input" value="1">
                            <span class="mdl-checkbox__label mdl-color-text--black"> <img src="img/smiley_1_min.png"> Insatisfait</span>
                        </label> <br/>

                        <hr/>

                        RETOURS: <br/>

                        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect MarginTop5px" for="all">
                            <input type="radio" id="all" class="mdl-radio__button" name="back" value="all" checked>
                            <span class="mdl-radio__label mdl-color-text--black ">Tous</span>
                        </label> <br/>

                        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect " for="comment">
                            <input type="radio" id="comment" class="mdl-radio__button" name="back" value="comments">
                            <span class="mdl-radio__label mdl-color-text--black ">Commentaires seulement</span>
                        </label> <br/>


                        <?php
                        if (isset($user->enquetes)) {
                            echo "<hr/>";
                            echo "ENQUETES: <br class='MarginBot5px'/>";

                            foreach ($user->enquetes as $enquete) {
                                ?>
                                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect tableDisplay"
                                       for="survey-<?php echo $enquete->id; ?>">
                                    <input type="checkbox" id="survey-<?php echo $enquete->id; ?>"
                                           value="<?php echo $enquete->id; ?>" name="enquete"
                                           class="mdl-checkbox__input">
                                    <span
                                        class="mdl-checkbox__label mdl-color-text--black"><?php echo $enquete->nom; ?></span>
                                </label>
                                <?php
                            }
                        }
                        ?>

                        <?php
                        if (isset($user->devices)) {
                            echo "<hr/>";
                            echo "APPAREILS: <br class='MarginBot5px'/>";

                            foreach ($user->devices as $device) {
                                if ($device->devicename != "computer") {
                                    ?>
                                    <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect tableDisplay"
                                           for="survey-<?php echo $device->id; ?>">
                                        <input type="checkbox" id="survey-<?php echo $device->id; ?>" name="device"
                                               value="<?php echo $device->id; ?>"
                                               class="mdl-checkbox__input">
                                        <span
                                            class="mdl-checkbox__label mdl-color-text--black"><?php echo $device->devicename; ?></span>
                                    </label>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </div>
                </div>

            </div>
            <div class="mdl-cell mdl-cell--10-col">
                <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col no_min_height">
                    <div class="mdl-card__supporting-text mdl-color-text--grey-600 custom_card">
                        <div class="mdl-grid MarginTop5px">
                            <div class="mdl-cell mdl-cell--4-col " style="border-right: gray 1px solid">
                                <div class=frame>
                                    <span class="helper"></span><img src="img/icon_date.png" style="width: 75px;"/>
                                    <span class="helper" style="height: auto">
                                        <span style="font-size: 18px" id="fromspan">Du 08/07/2016</span><br/>
                                        <span style="font-size: 18px" id="tospan">Au 08/07/2016</span>
                                    </span>
                                </div>

                            </div>
                            <div class="mdl-cell mdl-cell--4-col" style="border-right: gray 1px solid">
                                <center>
                                    <span style="font-size: 25px">Nombre de retours</span>
                                    <h3 id="retours">0</h3>
                                </center>
                            </div>
                            <div class="mdl-cell mdl-cell--4-col">

                                <div id="container" style="float: left">
                                    <img id="image" src="img/progress_1.png"/>
                                    <p id="satisfaction">0</p>
                                </div>

                                <span id="indice_satisfaction" style="text-align: center">
                                    Indice de satisfaction
                                    note sur 10
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col no_min_height">
                    <div class="mdl-card__supporting-text mdl-color-text--grey-600 custom_card">
                        <div class="mdl-grid MarginTop5px">
                            <div id="chart_div" style="width: 100%; height: 300px;"></div>
                        </div>
                    </div>
                </div>

                <div class="mdl-grid no_padding">
                    <div style="padding: 10px 10px"
                         class="mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--4-col mdl-grid--no-spacing no_min_height">
                        <h6 class="Margin5Px" style="font-family: 'Open Sans', sans-serif">Points Forts</h6>
                        <div id="pointsForts">
                        </div>
                        <hr/>
                        <h6 class="Margin5Px" style="font-family: 'Open Sans', sans-serif">Points à améliorer</h6>
                        <div id="pointsFaibles">
                        </div>
                    </div>
                    <div
                        class="mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col mdl-grid--no-spacing no_min_height">
                        <h6 class="Margin5Px" style="font-family: 'Open Sans', sans-serif">Retours (<span
                                id="retours2"></span>)</h6>
                        <div class="mdl-grid">
                            <div id="piechart" style="height: 300px;" class="mdl-cell--6-col"></div>
                            <div class="mdl-cell--5-col-desktop mdl-cell--12-col-tablet mdl-color-text--grey-600"
                                 style="margin-top: 40px;">
                                <center>
                                    <span id="client_satisfaits" class="mdl-color-text--black"
                                          style="font-size: 25px; font-weight: bold">0 %</span>
                                    <h3 style="font-size: 20px; margin-top: 5px;">de clients satisfaits</h3>

                                    <span id="client_insatisfaits" class="mdl-color-text--black"
                                          style="font-size: 25px; font-weight: bold">0 %</span>
                                    <h3 style="font-size: 20px; margin-top: 5px;">de clients insatisfaits</h3>
                                </center>
                            </div>
                        </div>

                        <hr/>
                        <span>
                            <h6 class="Margin5Px" id="comment_count"
                                style="float: left; font-family: 'Open Sans', sans-serif">Commentaires (0)</h6>

                            <button style="float: right"
                                    class="Margin5Px mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect upper-case"
                                    onclick="post('comments.php', global)">
                                VOIR
                            </button>
                        </span>

                        <br/>
                        <div id="comments" style="clear:left"></div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<script type="text/javascript">
    const STATS_URL = window.location.origin + "/myfeel_api/v1/stats";

    //piechart
    //google.charts.setOnLoadCallback(drawChart);
    function drawChart(pData = [['Taux', 'Satisfaction'], ["0", 0]]) {

        var pieData = google.visualization.arrayToDataTable(pData);

        var pieOptions = {
            animation: {
                duration: 10000,
                easing: 'in',
                startup: true
            },
            legend: {position: "bottom"},
            chartArea: {left: 0, top: 10, width: '100%', height: '80%'},
            colors: ["#EC4B32", "#F7AA9F", "#D0D0D0", "#7DC2E9", "#5DA2C9"]

        };

        try {
            var pieChart = new google.visualization.PieChart(document.getElementById('piechart'));
            pieChart.draw(pieData, pieOptions);
        } catch (e) {

            setTimeout(function () {
                var pieChart = new google.visualization.PieChart(document.getElementById('piechart'));
                pieChart.draw(pieData, pieOptions);
            }, 2000);

        }

    }

    //barchart
    //google.charts.load('current', {packages: ['corechart', 'bar']});
    //google.charts.setOnLoadCallback(drawMultSeries);

    var options, chart, chartData;

    function drawMultSeries() {
        options = {
            title: 'Taux de satisfaction',
            legend: {position: "none"},
            animation: {
                duration: 1000,
                easing: 'inAndOut',
                startup: true
            },
            hAxis: {
                title: 'Si > 5 rouge, <=5 bleu',
                viewWindow: {
                    min: 0
                },
                minValue: 0
            },
            vAxis: {
                title: 'Rating (scale of 1-10)',
                viewWindowMode: 'pretty',
                viewWindow: {
                    min: 0,
                    max: 10
                },
                gridlines: {color: '#333', count: 4},
                minValue: 0,
                maxValue: 10
            },
            explorer: {
                keepInBounds: true
            }
        };

        try {
            chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));

        } catch (err) {
            console.log(err);
        }

        //chart.draw(google.visualization.arrayToDataTable(), options);
    }

    function updateChart(barchart) {
        var chartD = {};
        barchart.entries.forEach(
            function (item) {
                if (!chartD[item.name]) {
                    chartD[item.name] = item.value;
                } else {
                    chartD[item.name] += item.value;
                }
            }
        );

        d = [['Element', '', {role: 'style'}]];
        for (var key in chartD) {
            if (chartD.hasOwnProperty(key)) {
                color = "color: " + (chartD[key] > 5 ? "rgb(93, 162, 201)" : "rgb(236, 75, 50)");
                d.push([key, chartD[key], color]);
            }
        }

        if (chart == null || chart == undefined) {
            try {
                chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));

            } catch (err) {
                setTimeout(function () {
                    console.log("waiting...");
                    chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
                    chart.draw(google.visualization.arrayToDataTable(d), options);
                }, 2000);
            }
        }
        try {
            chart.draw(google.visualization.arrayToDataTable(d), options);
        } catch (err) {
            console.log(err);
        }
    }

    function updatePieChart(piechart) {
        pData = [['Taux', 'Satisfaction']];

        piechart.forEach(function (item) {
            pData.push([item.value.toFixed(2) + "%", item.value.toFixed(2) / 1]);
        });

        try {
            drawChart(pData);
        } catch (e) {
            setTimeout(function () {
                drawChart(pData);
            }, 3000);
        }
    }

    function updateDashboard() {
        var stats = new Object();

        stats.id_user = <?php echo $user->id; ?>;
        stats.date = new Object();
        stats.date.type = $("input[type='radio'][name='date']:checked").val();
        stats.date.from = $("#from").val();
        stats.date.to = $("#to").val();

        stats.returns = $("input[type='radio'][name='back']:checked").val();

        stats.client = $('input[name="client"]:checked').map(function () {
            return this.value;
        }).get();


        stats.clients = [];

        $('input[name="client"]:checked').map(function () {
            return this.value;
        }).get().forEach(function (item) {
            client = new Object();
            client.number = item;
            stats.clients.push(client);
        });

        stats.enquetes = [];

        $('input[name="enquete"]:checked').map(function () {
            return this.value;
        }).get().forEach(function (item) {
            enquete = new Object();
            enquete.id_enquete = item;
            stats.enquetes.push(enquete);
        });

        stats.devices = [];

        $('input[name="device"]:checked').map(function () {
            return this.value;
        }).get().forEach(function (item) {
            device = new Object();
            device.id_device = item;
            stats.devices.push(device);
        });


        data = {stats: JSON.stringify(stats)};

        global = data;

        $.post(STATS_URL, data)
            .done(function (data) {
                console.log(data);

                $("#retours").text(data.retours);
                $("#retours2").text(data.retours);
                $("#satisfaction").text(data.satisfaction.toFixed(1));

                $("#client_satisfaits").text(data.satisfaits.toFixed(2) + " %");
                $("#client_insatisfaits").text(data.insatisfaits.toFixed(2) + " %");

                $("#fromspan").text("Au " + moment(data.date.from, "DD-MM-YYYY").format("DD/MM/YYYY"));
                $("#tospan").text("Du " + moment(data.date.to, "DD-MM-YYYY").format("DD/MM/YYYY"));

                updateChart(data.barchart);
                updatePointFortFaible(data.all_enquetes, data.all_retours);
                updatePieChart(data.piechart);
                updateComments(data.comments);

            })
            .error(function (data) {
                alert("Could not connect to sever")
            });
    }


    function updateComments(comments) {
        $("#comment_count").text("Commentaires (" + comments.count + ")");

        $("#comments").empty();

        for (i = 0; i < 2; i++) {
            if (i < comments.list.length) {
                comment = comments.list[i];

                commentDiv = document.createElement('div');
                commentDiv.classList = "Margin5Px clearLeft";

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

                console.log(comment);
                $(commentDiv).append("<img src='img/" + imageName + "' class='commentImage'/>");
                $(commentDiv).append("<span class='commentText'><b>" + comment.expressionquestion + "</b> " + comment.created_at + "</span>");
                $("#comments").append(commentDiv);
                $("#comments").append("<hr width='98%' style='margin: 0 auto'/>");
            }
        }

        $("#comments").children().last().remove()
    }

    function updatePointFortFaible(enquetes, retours) {

        enquetes.forEach(
            function (item) {
                item.questions.forEach(function (question) {
                    question.sum = 0;
                    question.count = 0;
                });
            }
        );

        retours.forEach(
            function (item) {

                result = $.grep(enquetes, function (e) {
                    return e.id === item.id_enquete
                });

                if (result.length == 1) {
                    result = result[0];

                    reponses = item.reponses.split('');
                    for (i = 0; i < reponses.length; i++) {

                        switch (reponses[i]) {
                            case "1":
                                newTmp = 0;
                                break;
                            case "2":
                                newTmp = 2.5;
                                break;
                            case "3":
                                newTmp = 5;
                                break;
                            case "4":
                                newTmp = 7.5;
                                break;
                            case "5":
                                newTmp = 10;
                                break;
                            default:
                                newTmp = 0;
                                break;
                        }
                        result.questions[i].sum += newTmp;
                        result.questions[i].count += 1;
                    }
                }
            }
        );

        pointsForts = [];
        pointsFaibles = [];

        $("#pointsForts").empty();
        $("#pointsFaibles").empty();

        enquetes.forEach(
            function (enquete) {
                enquete.questions.forEach(function (question, index) {
                    percentage = Math.round(question.sum / question.count);


                    progressBar = document.createElement('div');
                    progressBar.id = "progress" + enquete.id + "" + index;
                    progressBar.classList = "mdl-progress mdl-js-progress";

                    progressBar.addEventListener('mdl-componentupgraded', function () {
                        this.MaterialProgress.setProgress(percentage * 10);
                    });


                    divId = "#pointsForts";
                    if (percentage <= 5) {
                        progressBar.classList = progressBar.classList + " mdl-progress-red";
                        divId = "#pointsFaibles";
                    }
                    componentHandler.upgradeElement(progressBar);

                    $(divId).append("<span><b>" + percentage + "/10</b> - " + question.question + "</span><br/>").append(progressBar);
                });
            }
        );
    }

    var global;
    function dateOptionUpdated() {

        if ($("input[type='radio'][name='date']:checked").val() !== "fromto") {
            $('#from').attr('disabled', 'disabled');
            $('#to').attr('disabled', 'disabled');

            $("#from").css("color", "gray");
            $("#to").css("color", "gray");
        } else {

            $("#from").removeAttr("disabled");
            $("#to").removeAttr("disabled");

            $("#from").css("color", "black");
            $("#to").css("color", "black");
        }
    }

    $(document).on('ready', function () {
        google.charts.load('current', {packages: ['corechart', 'bar']});

        //piechart
        google.charts.setOnLoadCallback(drawChart);

        //barchart
        google.charts.setOnLoadCallback(drawMultSeries);


        $('#from').bootstrapMaterialDatePicker({
            time: false,
            clearButton: true,
            nowButton: true,
            switchOnClick: true,
            clearText: "Vider",
            nowText: "Maintenant",
            currentDate: moment()
        }).on("change", function () {
            var to = moment($("#to").val());
            var from = moment($("#from").val());
            if (from.isAfter(to)) {
                alert("Verifier vos dates!");
                $('#to').val($("#from").val());
            }
        });

        $('#to').bootstrapMaterialDatePicker({
            time: false,
            clearButton: true,
            nowButton: true,
            switchOnClick: true,
            clearText: "Vider",
            nowText: "Maintenant",
            currentDate: moment()
        }).on("change", function () {
            var to = moment($("#to").val());
            var from = moment($("#from").val());
            if (from.isAfter(to)) {
                alert("Verifier vos dates!");
                $('#to').val($("#from").val());
            }
        });

        $("input[type='radio'][name='date']").on("click", dateOptionUpdated);
        dateOptionUpdated();


        updateDashboard();

        $("input").on("change", updateDashboard);
        //.text("Au " + moment().format("DD/MM/YYYY"));
        //$("#tospan").text("Du " + moment().add(1, 'days').format("DD/MM/YYYY"));
    });


    function post(path, params) {
        var form = document.createElement("form");
        form.setAttribute("method", "post");
        form.setAttribute("action", path);

        for (var key in params) {
            if (params.hasOwnProperty(key)) {
                var hiddenField = document.createElement("input");
                hiddenField.setAttribute("type", "hidden");
                hiddenField.setAttribute("name", key);
                hiddenField.setAttribute("value", params[key]);

                form.appendChild(hiddenField);
            }
        }

        document.body.appendChild(form);
        form.submit();
    }

    /*$(document).on({
     ajaxStart: function () {
     $("body").addClass("loading");
     },
     ajaxStop: function () {
     $("body").removeClass("loading");
     }
     });*/
</script>

<div class="modal">
    <div class="mdl-spinner mdl-js-spinner is-active"></div>
</div>

</body>
</html>
