
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
                                    <br>
                                    <h3 class="nk-block-title page-title">Espace liste medicament</h3>
                                </div><!-- .nk-block-head-content -->
                                <div class="nk-block-head-content">
                                    <div class="toggle-wrap nk-block-tools-toggle">
                                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                        <div class="toggle-expand-content" data-content="pageMenu">
                                            <ul class="nk-block-tools g-3">
                                                
                                                <li class="nk-block-tools-opt"><a href="<?=ROOT?>/Medicaments" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Ajoiuter</span></a></li>
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
                                            <div class="card-inner">
                                                <table class="datatable-init-export nowrap table" data-export-title="Export">
                                                    <thead>
                                                        <tr>
                                                            <th>DCI</th>
                                                            <th>Dosage</th>
                                                            <th>Forme</th>
                                                            <th>Prix d'achat</th>
                                                            <th>Prix de vente</th>
                                                            <th>Sock</th>
                                                            <th width="15%">Operations</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($medicaments as $medicament) : ?>
                                                        <tr>
                                                            <td><?=$medicament->dci?></td>
                                                            <td><?=$medicament->dosage?></td>
                                                            <td><?=$medicament->forme?></td>
                                                            <td><?=$medicament->prix_achat ?></td>
                                                            <td><?=$medicament->prix_vente?></td>
                                                            <td><?=$medicament->stock?></td>
                                                            <td>
                                                                <div class="form-button-action">
                                                                    <a type="button" data-toggle="tooltip" title="" href="<?=ROOT?>/Medicaments/edit/<?=$medicament->idMedicament?>" class="btn btn-sm btn-warning" data-original-title="Edit Task">
                                                                        <i class="ni ni-edit"></i>
                                                                    </a>
                                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-sm btn-danger" data-original-title="Remove">
                                                                        <i class="ni ni-trash"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
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




