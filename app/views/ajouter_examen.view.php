
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

                                                <li class="nk-block-tools-opt"><a href="<?=ROOT?>/Examens/liste" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Ajoiuter</span></a></li>
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
                                                <form action="" method="post" id="examenForme">
                                                    <?php if(isset($id)) :?>
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label for="">Nom generique</label>
                                                                <input  type="hidden" class="form-control" id="" name="codeExamen" value="<?=$examen->num_examen ?>" >
                                                                <input  type="text" class="form-control" id="" name="nom_examen" value="<?=$examen->nom_examen ?>">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="">Nom generique</label>
                                                                <input class="form-control" name="code_examen" value="<?=$examen->code_examen ?>">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="">Prix d'analyse</label>
                                                                <input  class="form-control" name="prix_axamen" value="<?=$examen->prix_axamen ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" name="submit"   class="btn btn-info btn-sm fa-pull-left" value="Modifier" />
                                                            </div>

                                                        </div>
                                                    <?php else:?>
                                                       <!--    nom_examen 	code_examen 	prix_axamen-->
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label for="">Nom generique</label>
                                                            <input  type="text" class="form-control" id="" name="nom_examen">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="">Nom generique</label>
                                                            <input class="form-control" name="code_examen">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="">Prix d'analyse</label>
                                                            <input  class="form-control" name="prix_axamen">
                                                        </div>
                                                        <div class="m-3" align="right">
                                                            <input type="submit" name="enregistrer"  align="right"  class="btn btn-info btn-sm fa-pull-right" value="Enregistrer" />
                                                        </div>
                                                    </div>
                                                    <?php endif;?>
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

