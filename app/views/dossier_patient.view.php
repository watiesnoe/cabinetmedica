<!DOCTYPE html>
<html lang="zxx" class="js">

<?php  require_once ('partials/header.php')?>

<body class="nk-body bg-lighter npc-default has-sidebar ">
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        <!-- sidebar @s -->
        <?php  require_once ('partials/sidebare.php')?>
        <!-- sidebar @e -->
        <!-- wrap @s -->
        <div class="nk-wrap ">
            <!-- main header @s -->
            <?php require_once ('partials/nav_head.php') ?>
            <!-- main header @e -->
            <!-- content @s -->

            <!-- content @e -->
            <!-- footer @s -->
            <div class="nk-content ">
                <div class="container-fluid">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            <div class="nk-block">
                                <div class="card">
                                    <div class="card-aside-wrap">
                                        <?php require_once ('partials/consultation_info_patient.view.php')   ?>
                                        <div class="card-inner card-inner-lg">

                                            <div class="card">
                                                <div class="card-inner">
                                                    <form action="#" class="form-validate is-alter">
                                                        <div class="row g-gs">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="fva-message">Pathologie</label>
                                                                    <div class="form-control-wrap">
                                                                        <textarea class="form-control form-control-sm" id="fva-message" name="fva-message" placeholder="Write your message" required></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="fva-message">Traitement</label>
                                                                    <div class="form-control-wrap">
                                                                        <textarea class="form-control form-control-sm" id="fva-message" name="fva-message" placeholder="Write your message" required></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="fva-full-name">Date de debut</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="date" class="form-control" id="fva-full-name" name="fva-full-name" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="fva-email">Durée</label>
                                                                    <div class="form-control-wrap">

                                                                        <input type="text" class="form-control" id="fva-email" name="fva-email" required>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group"  align="right">
                                                                    <button type="submit" class="btn btn-lg btn-primary ">Save Informations</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .card-aside-wrap -->
                                </div><!-- .card -->
                            </div><!-- .nk-block -->
                        </div>
                    </div>
                </div>
            </div>
            <?php require_once ('partials/contente_foot.php') ?>
            <!-- footer @e -->
        </div>

        <!-- wrap @e -->
    </div>
    <!-- main @e -->
</div>
<!-- app-root @e -->
<!-- select region modal -->

<!-- JavaScript -->
<?php require_once ('partials/footer.php') ?>
</body>

</html>