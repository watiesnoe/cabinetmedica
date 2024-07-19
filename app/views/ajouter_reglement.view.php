
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

                                                <li class="nk-block-tools-opt"><a href="<?=ROOT?>/Examens" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Ajoiuter</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head-content -->
                            </div><!-- .nk-block-between -->
                            <br>
                            <div class="nk-block">
                                <div class="row g-gs">
                                    <div class="col-lg-4 col-xl-4 col-xxl-3">
                                        <?php $this->view('common/cardParametre') ?>
                                    </div><!-- .col -->
                                    <div class="col-lg-8 col-xl-8 col-xxl-9">
                                        <div class="card">
                                            <?php $this->view('common/_flash')?>
                                            <div class="card-inner">
                                                <form action="" method="post" id="maladieForm">
                                                    <?php if (isset($id)) : ?>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="">Type de règlement</label>
                                                                    <input type="hidden"  class="form-control idReglement" name="idReglement" required value="<?=$reglement->idReglement ?>">
                                                                    <input type="text"  class="form-control typereglement" name="typereglement" required value="<?=$reglement->nom ?>">
                                                                </div>
                                                            </div>
                                                            <div  class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="code_paiement">Code paiement</label>
                                                                    <input type="text"  class="form-control code_paiement" name="code_paiement" required  value="<?=$reglement->code_paiement ?>">
                                                                </div>
                                                            </div>


                                                        </div>
                                                        <div class="form-group">
                                                            <input type="submit" name="submit" class="btn btn-info fa-pull-right btn-sm " VALUE="Modifier"/>
                                                        </div>

                                                    <?php else: ?>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="typereglement">Type de règlement</label>
                                                                    <input type="text"  class="form-control typereglement" name="typereglement" required value="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="code_paiement">Code paiement</label>
                                                                    <input type="text"  class="form-control code_paiement" name="code_paiement" id="code_paiement" required value="">
                                                                </div>
                                                            </div>


                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <input type="submit" name="submit" class="btn btn-info fa-pull-right btn-sm " VALUE="Enregistrer"/>
                                                        </div>
                                                    <?php endif ?>
                                                </form>
                                            </div><!-- .card inner -->
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
