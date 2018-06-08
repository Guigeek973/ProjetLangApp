<?php

include_once ('gestion_BD.php');

function start_page_basic($title)
{
    echo '
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/login.css"/>
    <title>' . $title . '</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="/controller/controllerAuthentification.php" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="email-login" id="username-login" tabindex="1" class="form-control" placeholder="Username" required>
									</div>
									<div class="form-group">
										<input type="password" name="password-login" id="password-login" tabindex="2" class="form-control" placeholder="Password" required>
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login btn-success" value="Login">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="/controller/controllerOubliMdp.php" id="forgot-password-link" tabindex="5" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div>
								</form>
								<form id="register-form" action="/controller/controllerAuthentification.php" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="firstname" id="firstname" tabindex="2" class="form-control" placeholder="Firstname" value="" required>
									</div>
									<div class="form-group">
										<input type="text" name="lastname" id="lastname" tabindex="3" class="form-control" placeholder="Lastname" value="" required>
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="4" class="form-control" placeholder="Email Address" value="" required>
									</div>
									<div class="form-group">
										<input type="password" name="password-register" id="password-register" tabindex="5" class="form-control" placeholder="Password" required>
									</div>
									<div class="form-group">
										<input type="password" name="confirm-password" id="confirm-password" tabindex="6" class="form-control" placeholder="Confirm Password" required>
									</div>
									<div class="form-group">
									    <label>Veuillez séléctionner les langues que vous maitrisez deja, vos langues natales :</label>
									    <select name="natal">';
                                            echo getAllLanguagesHTML();
									    echo '</select>
									</div>
									<div class="form-group">
									    <label>Veuillez séléctionner les langues que vous désirez apprendre et votre niveau actuel : </label>
									    <div id="selectLanguesRegister">
									        <div id="singleSelectOption">
                                                <select name="langSouhait1">';
                                                    echo getAllLanguagesHTML();
									            echo '</select>
                                                <select name="nivSouhait1">';
                                                    echo getAllLevelHTML();
                                                echo '</select>
									        </div>
									        <div id="singleSelectOption">
                                                <select name="langSouhait2">';
                                                    echo getAllLanguagesHTML();
                                                echo '</select>
                                                <select name="nivSouhait2">';
                                                    echo getAllLevelHTML();
                                                echo '</select>
									        </div>
									        <div id="singleSelectOption">
                                                <select name="langSouhait3">';
                                                    echo getAllLanguagesHTML();
									            echo '</select>
                                                <select name="nivSouhait3">';
                                                    echo getAllLevelHTML();
                                                echo '</select>
									        </div>
									    </div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register btn-success" value="Register">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> 
';
};

function start_page_secured($title)
{
    echo '
 <!DOCTYPE html>
 <html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
    <title>' . $title . '</title>
    <link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet"  href="../css/app.css"/>
    <link rel="icon" type="image/png" href="../avatar.png" />
  </head>
  <body><br/>
    <div class="container-fluid">
        <form name="form-hidden" id="form-hidden" action="../models/handlerHIDDEN.php" method="post">
            <input type="hidden" name="sessionValue" id="sessionValue" value="'; echo (isset($_SESSION['idUser'])) ? $_SESSION['idUser'] : ''; echo '"/>
            <input type="hidden" name="idContactSelected" id="idContactSelected" value=""/>
        </form>
      <div class="row">
            <!-- COLONNE PROFIL+ derniere Conversation active-->
            <div class="col-md-3">
               <!-- PROFIL-->
               <div class="panel panel-default">
                  <div class="panel-body">
                     <div class="panel panel-default">
                        <div class="panel-body">
                           <div class="row">
                              <div class="col-md-5">
                                 <img src="../avatar.png" class="img-responsive" alt="Responsive image">
                                 <label>joseph alain</label>
                              </div>
                              <div class="col-md-7">
                                 <div>
                                    <form id="formDeconnection" method="get" action="../controller/controllerIndex.php" role="form">
                                        <button type="submit" class="btn btn-default btn-lg" name="action" value="Deconnection" style="width:52px;">
                                          <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                                        </button>
                                    </form>
                                    <form id="formAction" method="post" action="../controller/controllerIndex.php" role="form" style="display: block;">
                                        <div class="row">
                                            <button type="submit" class="btn btn-default btn-lg" name="action" value="Recherche" style="width:52px;">
                                            <span class="glyphicon glyphicon-search" aria-hidden="true" </span>
                                            </button>
                                            <button type="submit" class="btn btn-default btn-lg" name="action" value="Messagerie" style="width:52px;">
                                            <span class="glyphicon glyphicon-envelope" aria-hidden="true" ></span>
                                            </button>
                                        </div>
                                        <div class="row">
                                            <button type="submit" class="btn btn-default btn-lg" name="action" value="Profil" style="width:52px;">
                                            <span class="glyphicon glyphicon-user" aria-hidden="true" ></span>
                                            </button>
                                            <button type="submit" class="btn btn-default btn-lg" name="action" value="Parametres" style="width:52px;">
                                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                                            </button>
                                        </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <br>
                        <div class="conversation-scroll">';
                        if ($_SESSION["idUser"] != "") {
                            echo getLastConversationsHTML();
                        }
                echo '</div>
                  </div>
               </div>
            </div>
            <!-- COLONNE RECHERCHE ET TCHAT -->
            <div class="col-md-6">
               <div class="panel panel-default">
                  <div class="panel-body">
                    <!--Tchat-->
                     <section class="chat">
                        <div id="messages">
                        
                        </div>
                        <div class="user-inputs">
                           <form id="form-chat" action="../models/handlerAJAX.php?task=write" method="POST">
                              <input type="text" name="content" id="content"  placeholder="Type in your message right here bro !">
                              <button id="sendMsg" type="submit">Send !</button>
                           </form>
                        </div>
                     </section>
                  </div>
               </div>
               <div class="panel panel-default">
                  <div class="panel-body">
                     <div class="row">
                        <div id="recherche">
                            <input type="search" id="" name="">
                            <button>Rechercher</button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="panel panel-default">
                  <div class="panel-body">
                     <div class="row">
                        <div id="recherche">
                           <div class="col-md-2">
                              <img src="../avatar.png" class="img-responsive" alt="Responsive image">
                           </div>
                           <div class="col-md-4">
                              <div class="panel panel-default">
                                 <div class="panel-body">
                                    <div class="row">
                                       <div>
                                          pseudo/langue parler/niveaux/langue rechercher
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="panel panel-default">
                                 <div class="panel-body">
                                    <div class="row">
                                       <div>
                                          affichage description du profil utilisateur
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#profil">voir profil </button>
                              <button type="button" class="btn btn-default btn-lg">add to contact</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- COLONNE CONTACT -->
            <div class="col-md-3">
               <div class="panel panel-default">
                  <div class="panel-body">
                     <div class="panel panel-default">
                        <div class="panel-body">
                           <div class="row">
                              <div id="contact">
                                 <label>CONTACT</label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <br>
                     <div class="conversation-scroll-contact">';
                        if ($_SESSION["idUser"] != "") {
                            echo getAllContactHTML();
                        }
                echo '</div>
                  </div>
               </div>
            </div>
         </div>
      </div>
    </div>
    ';
};

function start_page_min($title)
{
    echo '
 <!DOCTYPE html>
 <html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
    <title>' . $title . '</title>
    <link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet"  href="../css/login.css"/>
    <link rel="icon" type="image/png" href="../avatar.png" />
  </head>
  <body><br/>
  ';
}

function end_page()
{
    echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script src="../js/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="../js/Option.js"></script>
    <script src="../js/main.js"></script>

</body>
</html>';
};


/**
 * renvoie true si une session est demarré
 * @return bool
 */
function test_session(){
    session_start();
    if(ISSET($_SESSION["session"])) return true;
    else return false;
}

/**
 * Affiche le menu correspondant à la session
 * @param $title
 */
function start_page($title){
    if(test_session())
        start_page_secured($title);
    else
        start_page_basic($title);
}

function getAllLanguagesHTML() {
    $connect = connection();
    $query1 = 'SELECT id, name from langages';
    $prep1 = $connect->prepare($query1);
    $prep1->execute();
    $tabLang = $prep1->fetchAll();
    $html = "";
    for($i = 0; $i < sizeof($tabLang); $i++) {
        $html .= "<option value='". $tabLang[$i]['id'] ."'>". $tabLang[$i]['name'] ."</option>";
    }

    return $html;
}

function getAllLevelHTML() {
    $connect = connection();
    $query1 = 'SELECT id, niveau from level';
    $prep1 = $connect->prepare($query1);
    $prep1->execute();
    $tabLevel = $prep1->fetchAll();
    $html = "";
    for($i = 0; $i < sizeof($tabLevel); $i++) {
        $html .= "<option value='". $tabLevel[$i]['id'] ."'>". $tabLevel[$i]['niveau'] ."</option>";
    }
    return $html;
}

function getAllContactHTML() {
    $connect = connection();
    $query1 = 'SELECT id_user from avoir WHERE id='. $_SESSION['idUser'];
    $prep1 = $connect->prepare($query1);
    $prep1->execute();
    $html = "";
    while($row = $prep1->fetch()) {
        $query = 'SELECT firstname, name from user WHERE id = '. $row['id_user']; //to
        $prep = $connect->prepare($query);
        $prep->execute();
        while($names = $prep->fetch()) {
            $html .= "<div>
                    <button type='submit' name='contact_button' class='contact_button' id='" . $row['id_user'] . "'>
                        <div class='col-md-3'>
                            <img src='../avatar.png' class='img-responsive' alt='Responsive image'>
                        </div>
                        <div class='col-md-9'>"
                    . $names['firstname'] . "-" . $names['name'] .
                    "</div></button></div>";
        }
    }
    return $html;
}

function getLastConversationsHTML() {
    $connect = connection();
    //les gens a qui j'ai parler 1 et 2
    $query = 'SELECT DISTINCT to_id FROM messages WHERE from_id='. $_SESSION['idUser'];
    $prep = $connect->prepare($query);
    $prep->execute();
    $html = "";
    while($x = $prep->fetch(PDO::FETCH_ASSOC)) { //x = 1 puis x = 2
        $query2 = "SELECT content, user.name, user.firstname FROM messages JOIN user ON to_id = user.id WHERE creat_at IN
              (SELECT MAX(creat_at) FROM messages WHERE from_id = :x AND to_id = :me OR from_id = :me AND to_id = :x)";
        $prep2 = $connect->prepare($query2);
        $prep2->bindParam(":x", $x['to_id'], PDO::PARAM_STR);
        $prep2->bindParam(":me", $_SESSION['idUser'], PDO::PARAM_STR);
        $prep2->execute();
        while($lastConversationMsg = $prep2->fetch()) {
            $html .= "<button type=\"button\" name=\"button\">
                        <div class='row'>
                           <div class=\"col-md-3\">
                              <img src=\"../avatar.png\" class=\"img-responsive\" alt=\"Pas de photo\">
                           </div>
                           <div class=\"col-md-9\">
                            <div class='row'>". $lastConversationMsg['name'] . " " . $lastConversationMsg['firstname'] . "</div>
                           <div class='row'>" .
                            $lastConversationMsg['content'] .
                          "</div></div></div>
                        </button>";
        }
    }
    return $html;
}


function getInfosProfil() {
    $connect = connection();
    $query1 = 'SELECT name,firstname,email,natal FROM user WHERE email=:mail';
    $prep1 = $connect->prepare($query1);
    $prep1->bindParam(':mail', $_SESSION["session"],  PDO::PARAM_STR);
    $prep1->execute();
    $tabInfos = $prep1->fetch(PDO::FETCH_ASSOC);

    return $tabInfos;
}

function getInfosLanguages() {
    $connect = connection();
    $query1 = 'SELECT langages.name FROM parler JOIN langages ON parler.id_langue = langages.id WHERE parler.id_user=:idUser';
    $prep1 = $connect->prepare($query1);
    $prep1->bindParam(':idUser', $_SESSION["idUser"],  PDO::PARAM_STR);
    $prep1->execute();
    $tabLang = $prep1->fetch(PDO::FETCH_ASSOC);

    $query0 = 'SELECT langages.name FROM parler JOIN user ON parler.id_langue = user.natal JOIN langages ON parler.id_langue = langages.id WHERE parler.id_user=:idUser';
    $prep0 = $connect->prepare($query0);
    $prep0->bindParam(':idUser', $_SESSION["idUser"],  PDO::PARAM_STR);
    $prep0->execute();
    $tabNatal = $prep0->fetch(PDO::FETCH_ASSOC);

    $query = 'SELECT level.niveau FROM parler JOIN level ON parler.id_level = level.id WHERE parler.id_user=:idUser';
    $prep = $connect->prepare($query);
    $prep->bindParam(':idUser', $_SESSION["idUser"],  PDO::PARAM_STR);
    $prep->execute();
    $tabLevel = $prep->fetch(PDO::FETCH_ASSOC);

    $tab = [$tabLang, $tabLevel, $tabNatal];
    return $tab;
}

function getAllLanguages() {
    $connect = connection();
    $query1 = 'SELECT id, name from langages';
    $prep1 = $connect->prepare($query1);
    $prep1->execute();
    $tabLang = $prep1->fetchAll();

    return $tabLang;
}

function getAllLevel() {
    $connect = connection();
    $query1 = 'SELECT id, niveau from level';
    $prep1 = $connect->prepare($query1);
    $prep1->execute();
    $tabLevel = $prep1->fetchAll();

    return $tabLevel;
}

function checkPhoto(){
    //répertoire de déstination
    $target_dir = "Storage/";
    $_FILES["fileselect"]["name"]=$_SESSION['idUser'];
    $name=basename($_FILES["fileselect"]["name"]);
    $target_file = $target_dir . $name ;
    //on initialise la variable update ok
    $uploadOk = 1;
    //on recup l'extention du fichier
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    //on a cliqué sur le bouton qui s'appel submit
    if(isset($_POST["submit"])) {
        //fichier image?
        $check = getimagesize($_FILES["fileselect"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $message = "Le fichier n'est pas une image valide.";
            echo $message;
            $uploadOk = 0;
        }
    }
    // le fichier existe déjà?
    if (file_exists($target_file)) {
        $message = "Erreur! le fichier image existe déjà.";
        echo $message;
        $uploadOk = 0;
    }
    // le poid de l'image
    if ($_FILES["fileselect"]["size"] > 500000) {
        $message = "Le fichier selectionné est trop volumineux.";
        echo $message;
        $uploadOk = 0;
    }
    // les formats autorisés
    if($imageFileType != "jpg" &&$imageFileType != "JPG"&& $imageFileType != "png" && $imageFileType != "PNG" && $imageFileType != "jpeg" && $imageFileType != "JPEG" && $imageFileType != "gif" && $imageFileType != "GIF") {

        $message = "Les images doivent etre au format: JPG, JPEG, PNG ou GIF.";
        echo $message;
        $uploadOk = 0;
    }
    // erreur
    if ($uploadOk == 0) {
        $message = "Erreur! impossible d'ajouter l'image.";
        echo $message;

        // pas d'erreur, on procède à l'enregistrement de la photo
    } else {
        //supprime la photo existante
        if(is_file($target_dir . $name)){
            unlink($target_dir . $name);
        }
        // enregiste la photo
        if (move_uploaded_file($_FILES["fileselect"]["tmp_name"], $target_file)) {

            $connect=connection();

            $query1 = 'DELETE all FROM Users WHERE Stockage=:chemin ';
            $prep1 = $connect->prepare($query1);
            $prep1->bindParam(':chemin', $target_file,  PDO::PARAM_STR);
            $prep1->execute();

            $query2 = 'INSERT INTO photo (NomFichier, Stockage, Taille) VALUES (:nom,:chemin,:taille)  ';
            $prep2 = $connect->prepare($query2);
            $prep2->bindParam(':nom',$_FILES["fileselect"]["name"], PDO::PARAM_STR);
            $prep2->bindParam(':chemin', $target_file, PDO::PARAM_STR);
            $prep2->bindParam(':taille', $_FILES["fileselect"]["size"], PDO::PARAM_STR);
            $prep2->execute();
            $message = "Image ajoutée avec succès.";

            echo $message;

        } else {
            $message = "Erreur inconnue! Merci de retenter l'ajout plus tard ou de contacter l'administrateur.";
            echo $message;
        }

    }

}

function addToBD() {
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false) {
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $mail = $_POST['email'];
        $password = $_POST['password-register'];
        $passwordV = $_POST['confirm-password'];
        $select1 = $_POST['natal'];
        $select2 = $_POST['langSouhait1'];
        $select3 = $_POST['langSouhait2'];
        $select4 = $_POST['langSouhait3'];
        $select5 = $_POST['nivSouhait1'];
        $select6 = $_POST['nivSouhait2'];
        $select7 = $_POST['nivSouhait3'];
        $connect = connection();
        try {
            if (isset($lastname) && isset($firstname) && isset($mail) && isset($password) && isset($passwordV) && $password == $passwordV) {
                $query0 = 'SELECT email FROM user WHERE email=:mail';
                $prep0 = $connect->prepare($query0);
                $prep0->bindParam(':mail', $mail);
                $prep0->execute();
                $mailBD = $prep0->fetchColumn();
                if ($mailBD != $mail) {
                    $query = 'INSERT INTO user(name,firstname,email,password,natal) VALUES (:lastname,:firstname,:mail,:password,:natal)';
                    $prep = $connect->prepare($query);
                    $prep->bindParam(':firstname', $firstname);
                    $prep->bindParam(':lastname', $lastname);
                    $prep->bindParam(':mail', $mail);
                    $passwordCoded = md5($password);
                    $prep->bindParam(':password', $passwordCoded);//$passwordCoded);
                    $prep->bindParam(':natal', $select1);
                    $prep->execute();
                    $prep->closeCursor();
                    $prep = NULL;
                    $query0 = 'SELECT id FROM user WHERE email=:mail';
                    $prep0 = $connect->prepare($query0);
                    $prep0->bindParam(':mail', $mail);
                    $prep0->execute();
                    $idUser = $prep0->fetchColumn();
                    $prep0->execute();
                    $prep0->closeCursor();
                    $prep0 = NULL;
                    $query1 = 'INSERT INTO parler(id_langue, id_level, id_user) VALUES (:souhait1,:nivSouhait1,:idUser)';
                    $prep1 = $connect->prepare($query1);
                    $prep1->bindParam(':idUser', $idUser);
                    $prep1->bindParam(':souhait1', $select2);
                    $prep1->bindParam(':nivSouhait1', $select5);
                    $prep1->execute();
                    $prep1->closeCursor();
                    $prep1 = NULL;
                    $query2 = 'INSERT INTO parler(id_langue, id_level, id_user) VALUES (:souhait2,:nivSouhait2,:idUser)';
                    $prep2 = $connect->prepare($query2);
                    $prep2->bindParam(':idUser', $idUser);
                    $prep2->bindParam(':souhait2', $select3);
                    $prep2->bindParam(':nivSouhait2', $select6);
                    $prep2->execute();
                    $prep2->closeCursor();
                    $prep2 = NULL;
                    $query3 = 'INSERT INTO parler(id_langue, id_level, id_user) VALUES (:souhait3,:nivSouhait3,:idUser)';
                    $prep3 = $connect->prepare($query3);
                    $prep3->bindParam(':idUser', $idUser);
                    $prep3->bindParam(':souhait3', $select4);
                    $prep3->bindParam(':nivSouhait3', $select7);
                    $prep3->execute();
                    $prep3->closeCursor();
                    $prep3 = NULL;

                }
            } else throw new Exception();
        } catch (Exception $e) {
            echo $e->getMessage();?>
            <script>alert("Resgistering error");</script>
            <?php
        }
    }

}

function authentificate()
{
    try {
        $mail = ($_POST['email-login']);
        if (isset($_POST['email-login']) && isset($_POST['password-login'])) {
            $connect = connection();
            $password = $_POST['password-login'];
            $passwordCoded = md5($password);
            $query1 = 'SELECT email FROM user WHERE email=:mail';
            $prep1 = $connect->prepare($query1);
            $prep1->bindParam(':mail', $mail,  PDO::PARAM_STR);
            $prep1->execute();
            $mailSql = $prep1->fetchColumn();
            if ($mailSql == $mail) {
                $prep1->closeCursor();
                $prep1 = NULL;
                $query2 = 'SELECT password FROM user WHERE email=:mail';
                $prep2 = $connect->prepare($query2);
                $prep2->bindParam(':mail', $mail, PDO::PARAM_STR);
                $prep2->execute();
                $MdpSql = $prep2->fetchColumn();
                if ($MdpSql == $passwordCoded) {//$passwordCoded) {
                    $prep2->closeCursor();
                    $prep2 = NULL;
                    session_start();
                    $_SESSION["session"] = $mail;
                    $query3 = 'SELECT id FROM user WHERE email=:mail';
                    $prep3 = $connect->prepare($query3);
                    $prep3->bindParam(':mail', $mail,  PDO::PARAM_STR);
                    $prep3->execute();
                    $idUser = $prep3->fetchColumn();
                    $_SESSION["idUser"] = $idUser;
                }
            }
        } else throw new Exception();
    } catch (Exception $e) {
        echo $e->getMessage();?>
        <script>alert("Authentication error");</script>
        <?php
    }

}

?>
 