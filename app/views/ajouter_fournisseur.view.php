
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
            <!-- main header @e -->
            <!-- footer @s -->
            <div class="nk-content ">
                <div class="container-fluid">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            <div class="nk-block-head nk-block-head-sm">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h3 class="nk-block-title page-title">Nouveau Fournisseur</h3>

                                    </div><!-- .nk-block-head-content -->
                                </div><!-- .nk-block-between -->
                            </div><!-- .nk-block-head -->
                            <div class="nk-block">
                                <div class="card card-bordered">
                                    <div class="card-inner">

                                        <form action="" method="post" id="fornisseurForme">
                                            <?php if(isset($id)) :?>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <fieldset class="form-group">
                                                            <label for="dci">Nom fournisseur </label>
                                                            <input type="text" class="form-control" id="nomfourni"  name="nomfourni" value="<?=$fournisseur->nom_fournisseur?>">
                                                            <input type="hidden" class="form-control" id="idFournisseur"  name="idFournisseur" value="<?=$fournisseur->id_fournisseur ?>">
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-6">
                                                        <fieldset class="form-group">
                                                            <label for="adresseFourni">Adresse fournisseur</label>
                                                            <input type="text" class="form-control" id="adresseFourni" name="adresseFourni" value="<?=$fournisseur->adresse_fournisseur?>">
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <fieldset class="form-group">
                                                            <label for="telFourni">Telephone</label>
                                                            <input type="text" class="form-control" id="telFourni"  NAME="telFourni" value="<?=$fournisseur->telephone_fournisseur?>">
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <input type="submit" name="modifier" class="btn btn-primary pull-right" value="Modifier">
                                                </div>
                                            <?php else:?>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <fieldset class="form-group">
                                                            <label for="dci">Nom fournisseur </label>
                                                            <input type="text" class="form-control" id="nomfourni"  name="nomfourni" value="">

                                                        </fieldset>
                                                    </div>
                                                    <div class="col-6">
                                                        <fieldset class="form-group">
                                                            <label for="adresseFourni">Adresse fournisseur</label>
                                                            <input type="text" class="form-control" id="adresseFourni" name="adresseFourni" value="">
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <fieldset class="form-group">
                                                            <label for="telFourni">Telephone</label>
                                                            <input type="text" class="form-control" id="telFourni"  NAME="telFourni" value="">
                                                        </fieldset>
                                                    </div>
                                                    <!--                                            <div class="col-6">-->
                                                    <!--                                                <fieldset class="form-group">-->
                                                    <!--                                                    <label for="telFourni">Email fournisseur</label>-->
                                                    <!--                                                    <input type="text" class="form-control" id="emailFourni"  NAME="emailFourni" value="">-->
                                                    <!--                                                </fieldset>-->
                                                    <!--                                            </div>-->
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <input type="submit" name="submit" class="btn btn-primary pull-right" value="Enregistrer">
                                                </div>
                                            <?php endif;?>
                                        </form>
                                    </div><!-- .card-inner-group -->
                                </div><!-- .card -->
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

