<?php
/**
 * Created by PhpStorm.
 * User: zekil_000
 * Date: 19/01/2017
 * Time: 17:06
 */
$title = 'Oubli de mot de passe';
start_page($title);
?>

<div class="container">
    <div class="row">
        <div class="col-md-7 col-md-offset-2">
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="controllerOubliMdp" method="post">
                                <div class="form-group">
                                    <label>Entrez votre email : </label>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="mail" tabindex="1" class="form-control" placeholder="Votre email" required>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="submitForgotPassword" tabindex="2" class="form-control btn btn-login btn-success" value="Valider">
                                        </div>
                                    </div>
                                </div>
                                <?php echo $_SESSION['nouvMdp']?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
end_page();
?>