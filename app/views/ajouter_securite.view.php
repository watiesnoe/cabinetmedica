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
                                    <h3 class="nk-block-title page-title">Dashboard</h3>
                                </div><!-- .nk-block-head-content -->
                                <div class="nk-block-head-content">
                                    <div class="toggle-wrap nk-block-tools-toggle">
                                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                        <div class="toggle-expand-content" data-content="pageMenu">
                                            <ul class="nk-block-tools g-3">

                                                <li class="nk-block-tools-opt"><a href="<?=ROOT?>/Structures" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Ajoiuter</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head-content -->
                            </div><!-- .nk-block-between -->
                            <br>
                            <div class="nk-block">
                                <?php $this->view('common/_flash')?>
                                <br>
                                <div class="row g-gs">

                                    <div class="col-lg-4 col-xl-4 col-xxl-3">
                                        <?php $this->view('common/cardParametre') ?>
                                    </div><!-- .col -->
                                    <div class="col-lg-8 col-xl-8 col-xxl-9">

                                        <?php
                                        if (isset($errors) && count($errors) !== 0) {
                                            echo '<div class="alert alert  alert-pro alert-danger alert-dismissible" >
                                                    <button class="close" data-bs-dismiss="alert"></button>';
                                            foreach ($errors as $error) {
                                                echo $error.'</br>';
                                            }
                                            echo '</div>';
                                        }
                                        ?>
                                        <div class="card">
                                           <div class="card-header">

                                           </div>
                                            <div class="card-inner">

                                                <form action="" method="post">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="sociale">Nom de la Socurité sociale </label>
                                                                <input type="text" class="form-control" id="sociale" name="sociale" placeholder="Entrer le nom de structure" value="">
                                                            </div>

                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="code">Code d'Identification </label>
                                                                <input type="text" class="form-control" id="code" name="code" placeholder="Code d'Identification" value="">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="pourcentage">Charge en pourcentage % </label>
                                                                <input type="number" class="form-control" id="pourcentage" name="pourcentage" placeholder="" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="pull-right pt-4" align="right">
                                                        <button class="btn btn-success pull-right" name="submit" type="submit">Prendre le ticket</button>
                                                    </div>
                                                </form>
                                            </div><!-- .card-inner -->
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
