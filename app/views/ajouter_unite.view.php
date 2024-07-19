
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
            <!-- content @s -->

            <!-- content @e -->
            <!-- footer @s -->
            <div class="nk-content ">
                <div class="container-fluid">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            <div class="nk-block-between">
                                <div class="nk-block-head-content">
                                    <h3 class="nk-block-title page-title">Espace des unités</h3>
                                </div><!-- .nk-block-head-content -->
                                <div class="nk-block-head-content">
                                    <div class="toggle-wrap nk-block-tools-toggle">
                                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                        <div class="toggle-expand-content" data-content="pageMenu">
                                            <ul class="nk-block-tools g-3">
                                                
                                                <li class="nk-block-tools-opt"><a href="<?=ROOT?>/Unites/liste" class="btn btn-primary">
                                                        <em class="icon ni ni-eye-alt"></em><span>Voir la liste</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head-content -->
                            </div><!-- .nk-block-between -->
                            <br>
                            <div class="nk-block">
                                <div class="row g-gs">
                                    <div class="col-lg-12 col-xl-12 col-xxl-12">
                                        <!-- Modal ajout de salle -->
                                        <?php $this->view('common/_flash')?>
                                        <br>
                                        <div class="card card-bordered card-preview">
                                            <div class="card-inner">
                                                <form action="" method="post" id="maladieForm">
                                                    <?php if (isset($id)) : ?>
                                                        <div class="row">
                                                            <div  class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="code_paiement">Type unité</label>
                                                                    <input type="text"  class="form-control code_nom" name="code_nom" required  value="<?=$gestion->code_nom ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="">Code unité</label>
                                                                    <input type="hidden"  class="form-control id_unite" name="id_unite" required value="<?=$gestion->id_unit ?>">
                                                                    <input type="text"  class="form-control code_unite" name="code_unite" required value="<?=$gestion->code_unite ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <input type="submit" name="submit" class="btn btn-info fa-pull-right btn-sm " VALUE="Modifier"/>
                                                        </div>

                                                    <?php else: ?>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="code_nom">Type unité</label>
                                                                    <input type="text"  class="form-control code_nom" name="code_nom" required value="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="code_paiement">Code unité</label>
                                                                    <input type="text"  class="form-control code_unite" name="code_unite" id="code_unite" required value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <br>
                                                    <div class="form-group">
                                                        <input type="submit" name="submit" class="btn btn-info fa-pull-right btn-sm " VALUE="Enregistrer"/>
                                                    </div>
                                                    <?php endif ?>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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


