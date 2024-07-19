
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

                            <div class="nk-content ">
                                <div class="container-fluid">
                                    <div class="nk-content-inner">
                                        <div class="nk-content-body">
                                            <div class="nk-block-head nk-block-head-sm">
                                                <div class="nk-block-between">
                                                    <div class="nk-block-head-content">
                                                        <BR>
                                                        <h3 class="nk-block-title page-title">Nouveau produit</h3>

                                                    </div><!-- .nk-block-head-content -->
                                                    <div class="nk-block-head-content">
                                                        <div class="toggle-wrap nk-block-tools-toggle">
                                                            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                                            <div class="toggle-expand-content" data-content="pageMenu">
                                                                <ul class="nk-block-tools g-3">
                                                                    <li class="nk-block-tools-opt"><a href="<?=ROOT?>/Medicaments/liste" class="btn btn-primary"><em class="icon ni ni-eye-alt"></em><span>Voir liste</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div><!-- .nk-block-head-content -->
                                                </div><!-- .nk-block-between -->
                                            </div><!-- .nk-block-head -->
                                            <div class="nk-block">
                                                <div class="col-12 pb-5">
                                                    <?php $this->view('common/_flash')?>

                                                </div>
                                                <div class="card card-bordered">

                                                    <br><br>
                                                    <div class="card-inner">
                                                        <form action="" method="POST">
                                                            <?php if(isset($id)) :?>
                                                                <div class="row gy-4">
                                                                    <div class="col-xxl-3 col-md-4">
                                                                        <fieldset class="form-group">
                                                                            <label for="dci">Le DCI </label>
                                                                            <input type="text" class="form-control" id="dci"  name="dci" value="<?=$medicament->dci?>">
                                                                            <input type="hidden" class="form-control" id="idMedicament"  name="idMedicament" value="<?=$medicament->idMedicament?>">
                                                                        </fieldset>
                                                                    </div><!--col-->
                                                                    <div class="col-xxl-3 col-md-4">
                                                                        <fieldset class="form-group">
                                                                            <label for="famille">Famille d'attachement</label>
                                                                            <select class="form-control" id="famille" name="famille">
                                                                                <option value="<?= $medicament->id_fami?>" selected><?=$medicament->nom_famille?></option>
                                                                                <?php  foreach ($familles as $conditionnement) :  ?>
                                                                                    <?php if($medicament->id_fami!=$conditionnement->id_fami) :?>
                                                                                        <option value="<?=$conditionnement->id_fami?>"><?=$conditionnement->nom_famille?></option>
                                                                                    <?php endif;?>
                                                                                <?php  endforeach;?>
                                                                            </select>
                                                                        </fieldset>
                                                                    </div><!--col-->
                                                                    <div class="col-xxl-3 col-md-4">
                                                                        <fieldset class="form-group">
                                                                            <label for="Dosage">Dosage</label>
                                                                            <input type="text" class="form-control" id="Dosage" name="dosage" value="<?=$medicament->dosage?>">
                                                                        </fieldset>
                                                                    </div><!--col-->
                                                                    <div class="col-xxl-3 col-md-4">
                                                                        <fieldset class="form-group">
                                                                            <label for="forme">Forme</label>
                                                                            <input type="text" class="form-control" id="forme"  NAME="forme" value="<?=$medicament->forme?>">
                                                                        </fieldset>
                                                                    </div><!--col-->
                                                                    <div class="col-xxl-3 col-md-4">
                                                                        <fieldset class="form-group">
                                                                            <label for="codebare">Numero de code barre</label>
                                                                            <input type="text" class="form-control" id="codebare" name="code_bare" placeholder="Numero de code barre">
                                                                        </fieldset>
                                                                    </div><!--col-->
                                                                    <div class="col-xxl-3 col-md-4">
                                                                        <fieldset class="form-group">
                                                                            <label for="stock_alert">Unité de vente</label>
                                                                            <select class="form-control" id="" name="unite">
                                                                                <option value="<?= $medicament->id_unit?>" selected><?=$medicament->code_nom?></option>
                                                                                <?php  foreach ($unites as $unite) :  ?>
                                                                                    <?php if($medicament->id_unit!=$unite->id_unit) :?>
                                                                                        <option value="<?=$unite->id_unit?>"><?=$unite->code_nom?></option>
                                                                                    <?php endif;?>
                                                                                <?php  endforeach;?>
                                                                            </select>
                                                                        </fieldset>
                                                                    </div><!--col-->
                                                                    <div class="col-xxl-3 col-md-4">
                                                                        <fieldset class="form-group">
                                                                            <label for="prix_achat">Prix d'achat</label>
                                                                            <input type="number" class="form-control" id="prix_achat"  name="prix_achat" value="<?=$medicament->prix_achat?>" >
                                                                        </fieldset>
                                                                    </div><!--col-->
                                                                    <div class="col-xxl-4 col-md-4">
                                                                        <fieldset class="form-group">
                                                                            <label for="prix_vente">Prix de vente</label>
                                                                            <input type="number" class="form-control" id="prix_vente" name="prix_vente"  value="<?=$medicament->prix_vente ?>" >
                                                                        </fieldset>
                                                                    </div><!--col-->
                                                                    <div class="col-xxl-4 col-md-4">
                                                                        <fieldset class="form-group">
                                                                            <label for="stock_alert">Stock de sécurité</label>
                                                                            <input type="text" class="form-control" id="stock_alert" name="stock_alert" placeholder="Stock de securité" value="<?=$medicament->stock_min?>">
                                                                        </fieldset>
                                                                    </div><!--col-->
                                                                    <div class="col-12" align="right">
                                                                        <div class="form-group">
                                                                            <input type="submit" name="modifier" class="btn btn-primary btn-bg pull-right" value="Modifier">
                                                                        </div>
                                                                    </div><!--col-->
                                                                </div><!--row-->
                                                            <?php else:?>
                                                                <div class="row gy-4">
                                                                    <div class="col-xxl-3 col-md-4">
                                                                        <fieldset class="form-group">
                                                                            <label for="dci">Le DCI </label>
                                                                            <input type="text" class="form-control" id="dci"  name="dci" placeholder="nom de medicament">
                                                                        </fieldset>
                                                                    </div><!--col-->
                                                                    <div class="col-xxl-3 col-md-4">
                                                                        <fieldset class="form-group">
                                                                            <label for="famille">Famille d'attachement</label>
                                                                            <select class="form-control" id="" name="famille">
                                                                                <option value="">Famille de médicale</option>
                                                                                <?=$contionnements ?>
                                                                            </select>
                                                                        </fieldset>
                                                                    </div><!--col-->
                                                                    <div class="col-xxl-3 col-md-4">
                                                                        <fieldset class="form-group">
                                                                            <label for="Dosage">Dosage</label>
                                                                            <input type="text" class="form-control" id="Dosage" name="dosage" placeholder="Dosage">
                                                                        </fieldset>
                                                                    </div><!--col-->
                                                                    <div class="col-xxl-3 col-md-4">
                                                                        <fieldset class="form-group">
                                                                            <label for="forme">Forme</label>
                                                                            <input type="text" class="form-control" id="forme"  NAME="forme" placeholder="Forme">
                                                                        </fieldset>
                                                                    </div><!--col-->
                                                                    <div class="col-xxl-3 col-md-4">
                                                                        <fieldset class="form-group">
                                                                            <label for="codebare">Numero de code barre</label>
                                                                            <input type="text" class="form-control" id="codebare" name="code_bare" placeholder="Numero de code barre">
                                                                        </fieldset>
                                                                    </div><!--col-->
                                                                    <div class="col-xxl-3 col-md-4">
                                                                        <fieldset class="form-group">
                                                                            <label for="stock_alert">Unité de vente</label>
                                                                            <select class="form-control" id="" name="unite">
                                                                                <?php  foreach ($unites as $unite) :  ?>
                                                                                    <option value="<?=$unite->id_unit?>"><?=$unite->code_nom?></option>
                                                                                <?php  endforeach;?>
                                                                            </select>
                                                                        </fieldset>
                                                                    </div><!--col-->
                                                                    <div class="col-xxl-3 col-md-4">
                                                                        <fieldset class="form-group">
                                                                            <label for="prix_achat">Prix d'achat</label>
                                                                            <input type="number" class="form-control" id="prix_achat"  name="prix_achat" placeholder="Prix d'achat">
                                                                        </fieldset>
                                                                    </div><!--col-->
                                                                    <div class="col-xxl-4 col-md-4">
                                                                        <fieldset class="form-group">
                                                                            <label for="prix_vente">Prix de vente</label>
                                                                            <input type="number" class="form-control" id="prix_vente" name="prix_vente" placeholder="Prix de vente">
                                                                        </fieldset>
                                                                    </div><!--col-->
                                                                    <div class="col-xxl-4 col-md-4">
                                                                        <fieldset class="form-group">
                                                                            <label for="stock_alert">Stock de sécurité</label>
                                                                            <input type="number" class="form-control" id="stock_alert" name="stock_alert" placeholder="Stock de securité">
                                                                        </fieldset>
                                                                    </div><!--col-->
                                                                    <div class="col-12" align="right">
                                                                        <div class="form-group">
                                                                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Enregistrer">
                                                                        </div>
                                                                    </div><!--col-->
                                                                </div><!--row-->
                                                            <?php endif;?>
                                                        </form>

                                                    </div><!-- .card-inner-group -->
                                                </div><!-- .card -->
                                            </div><!-- .nk-block -->
                                        </div>
                                    </div>
                                </div>
                            </div>
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

