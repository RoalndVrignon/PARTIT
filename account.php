<?php
require ('inc/header.php');
$errors = array();
require_once ('inc\db.php');
require ('inc/functions.php');

if(!isset($_SESSION['auth'])){
    $_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette page. Veuillez vous connecter d'abord";
    header('Location: login.php');
    exit();
}

?>
<div id="main content" xmlns="http://www.w3.org/1999/html">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Profile de <?= $_SESSION['auth']->prenom." ".$_SESSION['auth']->nom; ?></h3>
                        </div>
                        <div class="panel-body">
                            Image <br>
                            Adresse mail <br>

                            Panel content
                        </div>
                    </div>
            </div>

            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Compléter mon profil</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" autocomplete="off">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Prénom<span class="text-danger">*</span></label>
                                        <input type="text" name="prenom" id="prenom" class="form-control" placeholder="Julien" required="required"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Nom<span class="text-danger">*</span></label>
                                        <input type="text" name="nom" id="nom" class="form-control" placeholder="Dupont" required="required"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Ville<span class="text-danger">*</span></label>
                                        <input type="text" name="city" id="city" class="form-control" placeholder="Paris" required="required"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Pays<span class="text-danger">*</span></label>
                                        <input type="text" name="country" id="country" class="form-control" placeholder="France" required="required"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Facebook<span class="text-danger">*</span></label>
                                        <input type="text" name="fb" id="fb" class="form-control" placeholder="Paris" required="required"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Twitter<span class="text-danger">*</span></label>
                                        <input type="text" name="twitter" id="twitter" class="form-control" placeholder="France" required="required"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="bio">
                                            Biographie<span class="text-danger">*</span>
                                        </label>
                                        <textarea name="bio"rows="4" class="form-control" placeholder="Julien Dupont, 24 ans, fan des marseillais c'est les plus beau, les anges c'est nul">
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="submit" class="btn btn-primary text-center" value="Valider" name="Update"/>
</div>





<?php require ('inc/footer.php'); ?>


