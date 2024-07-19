
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
                                    <h3 class="nk-block-title page-title">Liste des fournisseurs</h3>
                                </div><!-- .nk-block-head-content -->
                                <div class="nk-block-head-content">
                                    <div class="toggle-wrap nk-block-tools-toggle">
                                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                        <div class="toggle-expand-content" data-content="pageMenu">
                                            <ul class="nk-block-tools g-3">

                                                <li class="nk-block-tools-opt"><a href="<?=ROOT?>/Fournisseurs" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Ajoiuter</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head-content -->
                            </div><!-- .nk-block-between -->
                            <br>
                            <div class="nk-block nk-block-lg">
                                <div class="card card-bordered card-preview">
                                    <div class="card-inner">
                                        <table class="datatable-init-export nowrap table" data-export-title="Export">
                                            <thead>
                                                <tr>
                                                    <th>N°</th>
                                                    <th>Nom fournisseur</th>
                                                    <th>Adresse fournisseur</th>
                                                    <th>telephone </th>
                                                    <th>Operations</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($fournisseurs as $fournisseur) : ?>
                                                <tr>
                                                    <td><?=$fournisseur->id_fournisseur?></td>
                                                    <td><?=$fournisseur->nom_fournisseur?></td>
                                                    <td><?=$fournisseur->adresse_fournisseur?></td>
                                                    <td><?=$fournisseur->telephone_fournisseur?></td>
                                                    <td>
                                                        <div class="form-button-action">
                                                            <a type="button" data-toggle="tooltip" title="" href="<?=ROOT?>/Fournisseurs/edit/<?=$fournisseur->id_fournisseur?>" class="btn  btn-primary btn-sm" data-original-title="Edit Task">
                                                                <i class="icon ni ni-edit"></i>
                                                            </a>
                                                            <button type="button" data-toggle="tooltip" title="" class="btn  btn-danger btn-sm" data-original-title="Remove">
                                                                <i class="icon ni ni-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!-- .card-preview -->
                            </div> <!-- nk-block -->
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


