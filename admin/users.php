<?php
/**
 * Created by PhpStorm.
 * User: evilkid
 * Date: 7/15/2016
 * Time: 3:48 AM
 */


session_start();
if (!isset($_SESSION['user_admin'])) {
    header('location: login.php');
}

require_once "ManageAdmin.php";
$ma = new ManageAdmin();


$users = $ma->findAllUsers();

if (isset($_GET['ajax'])) {

    $res = $ma->updateUser($_GET['userId'], $_GET['enabled']);

    echo $res ? "success" : "fail";

    die;
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    define("BASE_URL", 'http://'.$_SERVER['HTTP_HOST']."/myfeel_api/v1");

    require_once "../webservice/Functions.php";

    $data = array(
        "username" => $_POST['username'],
        "password" => $_POST['password'],
    );

    echo CallAPI("POST", BASE_URL."/users/create", $data);

    die;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>My Feel Dashboard</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="images/favicon.png">

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../css/material.blue-light_blue.min.css">
    <link rel="stylesheet" href="css/styles.css">

</head>
<body>
<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
    <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
            <span class="mdl-layout-title">Users</span>
            <div class="mdl-layout-spacer"></div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
                    <i class="material-icons">search</i>
                </label>
                <div class="mdl-textfield__expandable-holder">
                    <input class="mdl-textfield__input" type="text" id="search">
                    <label class="mdl-textfield__label" for="search">Enter your query...</label>
                </div>
            </div>
            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
                <i class="material-icons">more_vert</i>
            </button>
            <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
                <li class="mdl-menu__item">Logout</li>
            </ul>
        </div>
    </header>
    <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
            <img src="images/user.jpg" class="demo-avatar">
            <div class="demo-avatar-dropdown">
                <span>Welcome <?php echo $_SESSION['user_admin'] ?></span>

            </div>
        </header>
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
            <a class="mdl-navigation__link" href="index.php"><i class="mdl-color-text--blue-grey-400 material-icons"
                                                                role="presentation">home</i>Home</a>
            <a class="mdl-navigation__link" href="users.php"><i class="mdl-color-text--blue-grey-400 material-icons"
                                                                role="presentation">group</i>Users</a>
            <div class="mdl-layout-spacer"></div>
            <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-500 material-icons"
                                                       role="presentation">help_outline</i><span class="visuallyhidden">Help</span></a>
        </nav>
    </div>
    <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
            <div class="demo-cards mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
                <div
                    class="users-card mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                    <div class="mdl-card__title mdl-card--expand mdl-color--blue-A200">
                        <h2 class="mdl-card__title-text">Manage Users</h2>
                    </div>
                    <div class="mdl-color-text--grey-600">
                        <table class="mdl-data-table mdl-js-data-table  mdl-shadow--2dp full-width">
                            <thead>
                            <tr>
                                <th class="mdl-data-table__cell--non-numeric full-width">Username</th>
                                <th>Created date</th>
                                <th>Enabled</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($users as $user) {
                                ?>
                                <tr>
                                    <td class="mdl-data-table__cell--non-numeric"><?php echo $user['user'] ?></td>
                                    <td><?php echo $user['created_at'] ?></td>
                                    <td>
                                        <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                               for="switch-<?php echo $user['id'] ?>">
                                            <input type="checkbox" id="switch-<?php echo $user['id'] ?>"
                                                   class="mdl-switch__input" <?php echo $user['enabled'] ? "checked" : "" ?>
                                                   onchange="updateUser(<?php echo $user['id'] ?>)"
                                            >
                                            <span class="mdl-switch__label"></span>
                                        </label>
                                    </td>
                                </tr>

                                <?php
                            }
                            ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="mdl-card__menu">
                        <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect show-modal">
                            <i class="material-icons mdl-color-text--white">person_add</i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <dialog class="mdl-dialog">
            <div class="mdl-dialog__title">
                Add a user
            </div>
            <div class="mdl-dialog__content">
                <label class="mdl-textfield__label error_label mdl-textfield__error" id="error_label">test</label>
                <div class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="text" id="username" name="username" required autocomplete="off">
                    <label class="mdl-textfield__label" for="username">Username</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="password" id="password" name="password" required>
                    <label class="mdl-textfield__label" for="password">Password</label>
                </div>
            </div>
            <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
                <button type="button" class="mdl-button" onclick="submitForm()">Add</button>
                <button type="button" class="mdl-button close">Cancel</button>
            </div>
        </dialog>
    </main>
</div>

<div class="mdl-snackbar mdl-js-snackbar">
    <div class="mdl-snackbar__text"></div>
    <button type="button" class="mdl-snackbar__action"></button>
</div>

<script>
    function submitForm() {
        username = document.getElementById("username");
        password = document.getElementById("password");
        errorLabel = document.getElementById("error_label");


        errorLabel.style.visibility = "hidden";
        username.disabled = true;
        password.disabled = true;

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == XMLHttpRequest.DONE) {
                json = JSON.parse(xhr.response);
                if (json.error) {
                    errorLabel.style.visibility = "visible";
                    errorLabel.innerText = json.message;

                    username.disabled = false;
                    password.disabled = false;
                } else {
                    window.location = window.location;
                }
                console.log(json);
                document.body.style.cursor = 'auto';
            }
        };

        xhr.open("POST", "users.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("username=" + username.value + "&password=" + password.value);
        document.body.style.cursor = 'progress';
    }
    function updateUser(userId) {
        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function () {
            if (xhr.readyState == XMLHttpRequest.DONE) {
                var notification = document.querySelector('.mdl-js-snackbar');

                msg = "Error while updating user";
                if (xhr.response == 'success') {
                    msg = "User updated!"
                }
                notification.MaterialSnackbar.showSnackbar(
                    {
                        message: msg
                    }
                );
                document.body.style.cursor = 'auto';
            }
        };

        enabled = document.getElementById("switch-" + userId).checked;

        xhr.open("GET", "users.php?ajax=true&userId=" + userId + "&enabled=" + (enabled ? '1' : '0'), true);
        xhr.send();
        document.body.style.cursor = 'progress';
    }

    var dialog = document.querySelector('dialog');
    var showModalButton = document.querySelector('.show-modal');
    if (!dialog.showModal) {
        dialogPolyfill.registerDialog(dialog);
    }
    showModalButton.addEventListener('click', function () {
        dialog.showModal();
    });
    dialog.querySelector('.close').addEventListener('click', function () {
        dialog.close();
    });
</script>
<script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
</body>
</html>
