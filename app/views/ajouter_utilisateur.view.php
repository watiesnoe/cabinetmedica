
<!DOCTYPE html>
<html lang="zxx" class="js">

<?php  $this->view('common/header')?>

<body class="nk-body bg-lighter npc-default has-sidebar ">
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        <!-- sidebar @s -->
        <?php  $this->view('common/sidebare')?>
        <!-- sidebar @e -->
        <!-- wrap @s -->
        <div class="nk-wrap ">
            <!-- main header @s -->
            <?php $this->view('common/navbare') ?>

            <div class="nk-content ">
                <div class="container-fluid">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            <div class="nk-block-between">
                                <div class="nk-block-head-content">
                                    <h3 class="nk-block-title page-title">Dashboard</h3>
                                </div><!-- .nk-block-head-content -->
                                <div class="nk-block-head-content">
                                    <div class="toggle-wrap nk-block-tools-toggle">
                                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                        <div class="toggle-expand-content" data-content="pageMenu">
                                            <ul class="nk-block-tools g-3">

                                                <li class="nk-block-tools-opt"><a href="<?=ROOT?>/Utilisateurs/liste" class="btn btn-primary"><em class="icon ni ni-eye-alt"></em><span>Voir la liste</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head-content -->
                            </div><!-- .nk-block-between -->
                            <br>
                            <div class="nk-block">
                                <div class="row g-gs">
                                    
                                    <div class="col-lg-12 col-xl-12 col-xxl-12">
                                        <div class="card">
                                            <?php $this->view('common/_flash')?>
                                            <div class="card-inner">

                                                <!-- Modal ajout de stucture -->
                                                <form method="post" action="" enctype="multipart/form-data" >
                                                    <?php if (isset($utilisateur)) : ?>
                                                        <div class="row">
                                                            <div class="col-md-6 col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="structure">Nom </label>
                                                                    <input type="text" class="form-control" id="nom" name="nom" value="<?=$utilisateur->nom_medecin ?>">
                                                                    <input type="hidden" class="form-control" id="numAgent" name="numAgent" value="<?=$id?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="codestructure">Prenom </label>
                                                                    <input type="text" class="form-control" id="prenom"  name="prenom" value="<?=$utilisateur->prenom_medecin ?>">
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label>Genre </label>
                                                                    <select class="form-control" id="genre" name="genre">
                                                                        <option value="F"<?php echo $utilisateur->genre==='F'?"selected":""?>>Feminin</option>
                                                                        <option value="M"<?php echo $utilisateur->genre==='M'?"selected":""?>>Masculin</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="codestructure">Telephone</label>
                                                                    <input type="text" class="form-control" id="telephone"  name="telephone" placeholder="telephone" value="<?=$utilisateur->numero_tele?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="structure">Role</label>
                                                                    <select class="form-control" id="" name="role">
                                                                        <?php if (isset($_SESSION['role']) && $_SESSION['role']==="supAdmin"||$_SESSION['role']==="") : ?>
                                                                            <option value="supAdmin" <?= $utilisateur->specialite==='admin'?"selected":"" ?>>SupAdministrateur</option>
                                                                        <?php endif; ?>
                                                                        <?php if (isset($_SESSION['role']) && $_SESSION['role']==="supAdmin"||$_SESSION['role']==="admin") : ?>
                                                                            <option value="admin" <?= $utilisateur->specialite ==='admin'?"selected":"" ?>>Administrateur</option>
                                                                        <?php endif; ?>
                                                                        <option value="medecin"<?= $utilisateur->specialite==='medecin'?"selected":"" ?>>Medecin</option>
                                                                        <option value="analyste"<?= $utilisateur->specialite==='analyste'?"selected":"" ?>>Analyste</option>
                                                                        <option value="docteur"<?= $utilisateur->specialite==='docteur'?"selected":"" ?>>Docteur</option>
                                                                        <option value="secretaire"<?= $utilisateur->specialite==='secretaire'?"selected":"" ?>>Secretaire</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="codestructure">Adresse email</label>
                                                                    <input type="email" class="form-control" id="email" name="email" value="<?= $utilisateur->adresse_email ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-lg-4">
                                                                <div class="form-group ">
                                                                    <label for="formGroupDefaultSelect">Structure</label>
                                                                    <select class="form-control" id="formGroupDefaultSelect" name="codeStructure">
                                                                        <option value="<?= $utilisateur->num_structure?>" selected><?=$utilisateur->nom_structure?></option>
                                                                        <?php  foreach ($structures as $structure) :  ?>
                                                                            <?php if($utilisateur->num_structure!=$structure->num_structure) :?>
                                                                                <option value="<?=$structure->num_structure?>"><?=$structure->nom_structure?></option>
                                                                            <?php endif;?>
                                                                        <?php  endforeach;?>
                                                                    </select>
                                                                </div>

                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="codestructure">Pseudo</label>
                                                                    <input type="text" class="form-control" id="pseudo" name="pseudo"  value="<?=$utilisateur->pseudo ?>">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4 col-lg-4">
                                                                <div class="form-group">
                                                                    <label for="structure">Mot de passe</label>
                                                                    <input type="password" class="form-control" id="mot_de_passe"  name="motdepasse" placeholder="mot de passe">
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <button type="submit" class="btn btn-info pull-right  btn-round" name="envoyer">Enregistrer</button>
                                                    <?php else :?>
                                                        <div class="row">
                                                            <div class="col-md-6 col-lg-6 mt-2">
                                                                <div class="form-group">
                                                                    <label for="structure">Nom </label>
                                                                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrer le nom de structure">

                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="codestructure">Prenom </label>
                                                                    <input type="text" class="form-control" id="prenom"  name="prenom" placeholder="codestructure">
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label>Genre </label>
                                                                    <select class="form-control" id="genre" name="genre">
                                                                        <option value="F">Féminin</option>
                                                                        <option VALUE="M">Masculin</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-6 mt-2">
                                                                <div class="form-group">
                                                                    <label for="codestructure">Telephone</label>
                                                                    <input type="text" class="form-control" id="telephone"  name="telephone" placeholder="telephone">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="structure">Role</label>
                                                                    <select class="form-control" id="" name="role">
                                                                        <option value="supAdmin">Supper  Administrateur</option>
                                                                        <option value="admin">Administrateur</option>
                                                                        <option value="secretaire">Sécretaire</option>
                                                                        <option value="analyste">Laboratin</option>
                                                                        <option value="medecin">Medecin</option>
                                                                        <option value="Docteur">Docteur</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="codestructure">Adresse email</label>
                                                                    <input type="email" class="form-control" id="email" name="email" placeholder="email ">
                                                                </div>
                                                            </div>
                                                            <div class="col-4 mt-2">
                                                                <div class="form-group ">
                                                                    <label for="formGroupDefaultSelect">Structure</label>
                                                                    <select class="form-control" id="formGroupDefaultSelect" name="codeStructure">
                                                                        <?php  foreach ($structures as $structure) :  ?>
                                                                            <option value="<?=$structure->num_structure?>"><?=$structure->nom_structure?></option>
                                                                        <?php  endforeach;?>
                                                                    </select>
                                                                </div>

                                                            </div>
                                                            <div class="col-4  mt-2">
                                                                <div class="form-group">
                                                                    <label for="codestructure">Pseudo</label>
                                                                    <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="pseudonyme">
                                                                </div>
                                                            </div>
                                                            <div class="col-4 mt-2">
                                                                <div class="form-group ">
                                                                    <label for="structure">Profile</label>
                                                                    <input type="file" class="form-control" id="profile"  name="profile" placeholder="photho de profile">
                                                                </div>
                                                            </div>
                                                            <div class="col-6 mt-2">
                                                                <div class="form-group">
                                                                    <label for="structure">Mot de passe</label>
                                                                    <input type="password" class="form-control" id="mot_de_passe"  name="motdepasse" placeholder="mot de passe">
                                                                </div>
                                                            </div>
                                                            <div class="col-6 mt-2">
                                                                <div class="form-group">
                                                                    <label for="codestructure">Mode passe confirme</label>
                                                                    <input type="password" class="form-control" id="mot_de_passe_confirme" name="mot_de_passe_confirme" placeholder="confirmation du mot de passe">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group" align="">
                                                            <button type="submit" class="btn btn-info pull-right  btn-round" name="envoyer">Enregistrer</button>
                                                        </div>

                                                    <?php endif;?>
                                                </form>

                                            </div>
                                            <!-- .card inner -->
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                </div><!-- .row -->
                            </div><!-- .nk-block -->
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->view('common/foot') ?>
            <!-- footer @e -->
        </div>

        <!-- wrap @e -->
    </div>
    <!-- main @e -->
</div>
<!-- app-root @e -->
<!-- select region modal -->

<!-- JavaScript -->
<?php $this->view('common/footer') ?>
</body>

</html>
