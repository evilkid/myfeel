<?php
session_start();


if (isset($_POST['action'])
    && $_POST['action'] == "login"
    && isset($_POST['username'])
    && isset($_POST['password'])
) {
    define("BASE_URL", 'http://'.$_SERVER['HTTP_HOST']."/myfeel_api/v1");

    require_once "webservice/Functions.php";

    $data = array(
        "username" => $_POST['username'],
        "password" => $_POST['password'],
        "deviceid" => "computer",
    );

    $res = CallAPI("POST", BASE_URL."/login", $data);
    $res = json_decode($res);


    if ($res->error == false) {
        echo "<pre>";
        print_r($res);
        $_SESSION['user'] = $res;

        header('location: index.php');
    } else {
        $errorMessage = $res->message;
    }

}

?>

<!DOCTYPE html>
<html>

<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyFeel - Connexion</title>
    <link rel="stylesheet" href="css/login.css" type="text/css">
</head>

<body>
    <div class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="#"><img src="img/logo.png" alt="logo-uvf" width="100%"></a>
            </div>
            <ul class="nav navbar-nav navbar-right hidden-xs"></ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="li-carre"><a href="#" style="color:#5ec0e7;">Connexion</a></li>
            </ul>
        </div>
    </div>
    <div id="msg"></div>
    <div class="main-container  ">
        <div id="alert-messages"></div>
        <section>
            <div class="row ">
                <div class="col-md-4 col-sm-6 col-sm-offset-3 col-md-offset-4">
                    <div class="form-group top2 well bottom2 ">
                        <h4 style="margin-top:0px">Connexion </h4>
                        
						<?php if (isset($errorMessage)) { ?>
							<div class="row">
								<div class="span4 col-md-offset-1 col-md-10 alert alert-warning">
									<p></p>
									<center> Mot de passe ou Nom d'utilisateur incorrect</center>
								</div>
							</div>
						<?php } ?>
                        <form method="post">
                            <div class="form-group"><label for="username">Adresse mail</label>
                                <p><input type="text" id="username" name="username" value="" required="required" class="form-control"></p>
                            </div>
                            <div class="form-goup"><label for="password">Mot de passe</label>
                                <p><input type="password" id="password" name="password" required="required" class="form-control"></p>
                            </div>
							<br/>
                            <div class="row">
                                <div class="col-sm-12">
									<button class="btn btn-blue"" name="action" value="login" style="width:100%" >Se connecter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
   
</body>

</html>