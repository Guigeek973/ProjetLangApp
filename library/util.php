<?php
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
    <link rel="stylesheet" href="../css/style.css"/>
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
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="/controller/controllerAuthentification.php" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="email-login" id="username-login" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password-login" id="password-login" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Login">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="/controller/controllerOubliMdp.php" tabindex="5" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div>
								</form>
								<form id="register-form" action="/controller/controllerAuthentification.php" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="" required>
									</div>
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
									    <select name="natal">
									        <option value="fr" selected>Français</option>
									        <option value="en">Anglais</option>
									        <option>Autres langues</option>
									        <option>A récupérer depuis la bd langue</option>
									    </select>
									</div>
									<div class="form-group">
									    <label>Veuillez séléctionner les langues que vous désirez apprendre et votre niveau actuel : </label>
									    <div id="selectLanguesRegister">
									        <div id="singleSelectOption">
                                                <select name="langSouhait1">
                                                    <option value="fr" selected>Français</option>
                                                    <option value="en">Anglais</option>
                                                    <option>Autres langues</option>
                                                    <option>A récupérer depuis la bd langue</option>
                                                </select>
                                                <select name="nivSouhait1">
                                                    <option value="1" selected>Niveau 1</option>
                                                    <option value="2">Niveau 2</option>
                                                    <option value="3">Niveau 3</option>
                                                    <option value="4">Niveau 4</option>
                                                    <option value="5">Niveau 5</option>
                                                </select>
									        </div>
									        <div id="singleSelectOption">
                                                <select name="langSouhait2">
                                                    <option value="fr" selected>Français</option>
                                                    <option value="en">Anglais</option>
                                                    <option>Autres langues</option>
                                                    <option>A récupérer depuis la bd langue</option>
                                                </select>
                                                <select name="nivSouhait2">
                                                    <option value="1" selected>Niveau 1</option>
                                                    <option value="2">Niveau 2</option>
                                                    <option value="3">Niveau 3</option>
                                                    <option value="4">Niveau 4</option>
                                                    <option value="5">Niveau 5</option>
                                                </select>
									        </div>
									        <div id="singleSelectOption">
                                                <select name="langSouhait3">
                                                    <option value="fr" selected>Français</option>
                                                    <option value="en">Anglais</option>
                                                    <option>Autres langues</option>
                                                    <option>A récupérer depuis la bd langue</option>
                                                </select>
                                                <select name="nivSouhait3">
                                                    <option value="1" selected>Niveau 1</option>
                                                    <option value="2">Niveau 2</option>
                                                    <option value="3">Niveau 3</option>
                                                    <option value="4">Niveau 4</option>
                                                    <option value="5">Niveau 5</option>
                                                </select>
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
    <link rel="stylesheet"  href="../css/style.css"/>
    <link rel="icon" type="image/png" href="../img/favicon.png" />
  </head>
  <body><br/>
    <div class="container-fluid">
      <div class="row">
          <!-- COLONNE PROFIL+ derniere Conversation active-->
        <div class="col-md-3">
          <!-- PROFIL-->
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-3">
                      <img src="avatar.png" class="img-responsive" alt="Responsive image">
                    </div>
                    <div class="col-md-9">
                      <div class="text-center">
                        joseph alain
                      </div>
                      <br>
                      <div class="row" id="optionMenu">
                        <form id="formDeconnection" method="get" action="/controller/controllerIndex.php" role="form">
                            <div class="col-md-3">
                                <button class="btn btn-default btn-lg" name="action" value="Deconnection">
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                                </button>
                            </div>
                        </form>
                        <form id="formOptions" method="post" action="/controller/controllerIndex.php" role="form">
                            <div class="col-md-3 form-group">
                                <input type="submit" class="btn btn-default btn-lg" name="action" value="Profil">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            </div>
                            <div class="col-md-3">
                                <button type="button" class="btn btn-default btn-lg">
                                <span class="glyphicon glyphicon-search" aria-hidden="true" </span>
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
              <div class=" conversation-scroll">
                <!-- CONVERSATION 1-->
                <button type="button" name="button">
                    <div class="col-md-3">
                      <img src="avatar.png" class="img-responsive" alt="Responsive image">
                    </div>
                    <div class="col-md-6">
                      DERNIER MESSAGE DE LA CONVERSATION
                    </div>
                    <div class="col-md-3">
                      <img src="avatar.png" class="img-responsive" alt="Responsive image">
                      <img src="avatar.png" class="img-responsive" alt="Responsive image">
                    </div>
                </button>
                <!-- CONVERSATION 2-->
                <button type="button" name="button">
                    <div class="col-md-3">
                      <img src="avatar.png" class="img-responsive" alt="Responsive image">
                    </div>
                    <div class="col-md-6">
                      DERNIER MESSAGE DE LA CONVERSATION
                    </div>
                    <div class="col-md-3">
                      <img src="avatar.png" class="img-responsive" alt="Responsive image">
                      <img src="avatar.png" class="img-responsive" alt="Responsive image">
                    </div>
                </button>
                <!-- CONVERSATION 3-->
                <button type="button" name="button">
                    <div class="col-md-3">
                      <img src="avatar.png" class="img-responsive" alt="Responsive image">
                    </div>
                    <div class="col-md-6">
                      DERNIER MESSAGE DE LA CONVERSATION
                    </div>
                    <div class="col-md-3">
                      <img src="avatar.png" class="img-responsive" alt="Responsive image">
                      <img src="avatar.png" class="img-responsive" alt="Responsive image">
                    </div>
                </button>
                <!-- CONVERSATION 4-->
                <button type="button" name="button">
                    <div class="col-md-3">
                      <img src="avatar.png" class="img-responsive" alt="Responsive image">
                    </div>
                    <div class="col-md-6">
                      DERNIER MESSAGE DE LA CONVERSATION
                    </div>
                    <div class="col-md-3">
                      <img src="avatar.png" class="img-responsive" alt="Responsive image">
                      <img src="avatar.png" class="img-responsive" alt="Responsive image">
                    </div>
                </button>
                <!-- CONVERSATION 5-->
                <button type="button" name="button">
                    <div class="col-md-3">
                      <img src="avatar.png" class="img-responsive" alt="Responsive image">
                    </div>
                    <div class="col-md-6">
                      DERNIER MESSAGE DE LA CONVERSATION
                    </div>
                    <div class="col-md-3">
                      <img src="avatar.png" class="img-responsive" alt="Responsive image">
                      <img src="avatar.png" class="img-responsive" alt="Responsive image">
                    </div>
                </button>
                <!-- CONVERSATION 6-->
                <button type="button" name="button">
                    <div class="col-md-3">
                      <img src="avatar.png" class="img-responsive" alt="Responsive image">
                    </div>
                    <div class="col-md-6">
                      DERNIER MESSAGE DE LA CONVERSATION
                    </div>
                    <div class="col-md-3">
                      <img src="avatar.png" class="img-responsive" alt="Responsive image">
                      <img src="avatar.png" class="img-responsive" alt="Responsive image">
                    </div>
                </button>
                <!-- CONVERSATION 7-->
                <button type="button" name="button">
                    <div class="col-md-3">
                      <img src="avatar.png" class="img-responsive" alt="Responsive image">
                    </div>
                    <div class="col-md-6">
                      DERNIER MESSAGE DE LA CONVERSATION
                    </div>
                    <div class="col-md-3">
                      <img src="avatar.png" class="img-responsive" alt="Responsive image">
                      <img src="avatar.png" class="img-responsive" alt="Responsive image">
                    </div>
                </button>
                <!-- CONVERSATION 8-->
                <button type="button" name="button">
                    <div class="col-md-3">
                      <img src="avatar.png" class="img-responsive" alt="Responsive image">
                    </div>
                    <div class="col-md-6">
                      DERNIER MESSAGE DE LA CONVERSATION
                    </div>
                    <div class="col-md-3">
                      <img src="avatar.png" class="img-responsive" alt="Responsive image">
                      <img src="avatar.png" class="img-responsive" alt="Responsive image">
                    </div>
                </button>
                <!-- CONVERSATION 9-->
                <button type="button" name="button">
                    <div class="col-md-3">
                      <img src="avatar.png" class="img-responsive" alt="Responsive image">
                    </div>
                    <div class="col-md-6">
                      DERNIER MESSAGE DE LA CONVERSATION
                    </div>
                    <div class="col-md-3">
                      <img src="avatar.png" class="img-responsive" alt="Responsive image">
                      <img src="avatar.png" class="img-responsive" alt="Responsive image">
                    </div>
                </button>
                <!-- CONVERSATION 10-->
                <button type="button" name="button">
                    <div class="col-md-3">
                      <img src="avatar.png" class="img-responsive" alt="Responsive image">
                    </div>
                    <div class="col-md-6">
                      DERNIER MESSAGE DE LA CONVERSATION
                    </div>
                    <div class="col-md-3">
                      <img src="avatar.png" class="img-responsive" alt="Responsive image">
                      <img src="avatar.png" class="img-responsive" alt="Responsive image">
                    </div>
                </button>
              </div>
            </div>
          </div>
        </div>
 
 
 
        <!-- COLONNE RECHERCHE ET TCHAT -->
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-body">
              <div id="conteneur">
                <h1>Mon chat, connectez en tant que <?php echo $_SESSION["pseudo"];  ?> </h1>
              </div>
              <div class="tchatForm" style="width:100%;">
                <form method="post" action="#" >
                    <textarea name="message" style="width:100%;"></textarea>
                    <input type="submit" value="Envoyer">
                </form>
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
                      CONTACT
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <br>
            <div class=" conversation-scroll-contact">
              <!-- CONTACT 1-->
              <button type="button" name="button">
                  <div class="col-md-3">
                    <img src="avatar.png" class="img-responsive" alt="Responsive image">
                  </div>
                  <div class="col-md-9">
                    NOM DU CONTACT
                  </div>
              </button>
              <!-- CONTACT 2-->
              <button type="button" name="button">
                  <div class="col-md-3">
                    <img src="avatar.png" class="img-responsive" alt="Responsive image">
                  </div>
                  <div class="col-md-9">
                    NOM DU CONTACT
                  </div>
              </button>
              <!-- CONTACT 3-->
              <button type="button" name="button">
                  <div class="col-md-3">
                    <img src="avatar.png" class="img-responsive" alt="Responsive image">
                  </div>
                  <div class="col-md-9">
                    NOM DU CONTACT
                  </div>
              </button>
              <!-- CONTACT 4-->
              <button type="button" name="button">
                  <div class="col-md-3">
                    <img src="avatar.png" class="img-responsive" alt="Responsive image">
                  </div>
                  <div class="col-md-9">
                    NOM DU CONTACT
                  </div>
              </button>
              <!-- CONTACT 5-->
              <button type="button" name="button">
                  <div class="col-md-3">
                    <img src="avatar.png" class="img-responsive" alt="Responsive image">
                  </div>
                  <div class="col-md-9">
                    NOM DU CONTACT
                  </div>
              </button>
              <!-- CONTACT 6-->
              <button type="button" name="button">
                  <div class="col-md-3">
                    <img src="avatar.png" class="img-responsive" alt="Responsive image">
                  </div>
                  <div class="col-md-9">
                    NOM DU CONTACT
                  </div>
              </button>
              <!-- CONTACT 7-->
              <button type="button" name="button">
                  <div class="col-md-3">
                    <img src="avatar.png" class="img-responsive" alt="Responsive image">
                  </div>
                  <div class="col-md-9">
                    NOM DU CONTACT
                  </div>
              </button>
              <!-- CONTACT 8-->
              <button type="button" name="button">
                  <div class="col-md-3">
                    <img src="avatar.png" class="img-responsive" alt="Responsive image">
                  </div>
                  <div class="col-md-9">
                    NOM DU CONTACT
                  </div>
              </button>
              <!-- CONTACT 9-->
              <button type="button" name="button">
                  <div class="col-md-3">
                    <img src="avatar.png" class="img-responsive" alt="Responsive image">
                  </div>
                  <div class="col-md-9">
                    NOM DU CONTACT
                  </div>
              </button>
              <!-- CONTACT 10-->
              <button type="button" name="button">
                  <div class="col-md-3">
                    <img src="avatar.png" class="img-responsive" alt="Responsive image">
                  </div>
                  <div class="col-md-9">
                    NOM DU CONTACT
                  </div>
                </button>
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
    <link rel="stylesheet"  href="../css/style.css"/>
    <link rel="icon" type="image/png" href="../img/favicon.png" />
  </head>
  <body><br/>
  ';
}

function end_page()
{
    echo '
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
?>
 