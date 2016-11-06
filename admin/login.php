<?php
/**
 * Created by PhpStorm.
 * User: evilkid
 * Date: 7/15/2016
 * Time: 3:52 AM
 */

session_start();

if (isset($_POST['action'])
    && $_POST['action'] == "login"
    && isset($_POST['username'])
    && isset($_POST['password'])
) {

    require_once "ManageAdmin.php";

    $manageAdmin = new ManageAdmin();
    if($manageAdmin->login($_POST['username'], $_POST['password'])){
        $_SESSION['user_admin'] = $_POST['username'];
        header('location: index.php');
    }else{
        $errorMessage = "Login failed. Incorrect credentials";
    }
}

?>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"/>
<link rel="stylesheet" href="../css/style.css"/>


<body>

<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="form-wrap">
                    <h1>S'authentifier</h1>
                    <h2>Accéder au tableau de board d'administrateur</h2>
                    <?php
                    if (isset($errorMessage)) {
                        ?>
                        <div class="alert alert-danger">
                            <?php echo $errorMessage; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <form role="form" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control"
                                   placeholder="Nom d'utilisateur">
                        </div>
                        <div class="form-group">
                            <label for="key" class="sr-only">Password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                   placeholder="Mot de passe">
                        </div>
                        <button class="btn btn-custom" name="action" value="login">Se Connecter</button>
                    </form>
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

