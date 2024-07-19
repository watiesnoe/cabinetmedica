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
            <?php $this->view ('common/navbare') ?>
            <!-- main header @e -->
            <!-- content @s -->
            <div class="nk-content ">
                <div class="container-fluid">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            <div class="nk-block-head nk-block-head-sm">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h3 class="nk-block-title page-title">Commande Medicament</h3>
                                    </div><!-- .nk-block-head-content -->
                                    <div class="nk-block-head-content">
                                        <div class="toggle-wrap nk-block-tools-toggle">
                                            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                            <div class="toggle-expand-content" data-content="pageMenu">
                                                <ul class="nk-block-tools g-3">
                                                    <li>
                                                        <div class="drodown">
                                                            <a href="#" class="dropdown-toggle btn btn-white btn-dim btn-outline-light" data-bs-toggle="dropdown"><em class="d-none d-sm-inline icon ni ni-calender-date"></em><span><span class="d-none d-md-inline">Last</span> 30 Days</span><em class="dd-indc icon ni ni-chevron-right"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="#"><span>Last 30 Days</span></a></li>
                                                                    <li><a href="#"><span>Last 6 Months</span></a></li>
                                                                    <li><a href="#"><span>Last 1 Years</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="nk-block-tools-opt"><a href="#" class="btn btn-primary"><em class="icon ni ni-reports"></em><span>Reports</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head-content -->
                                </div><!-- .nk-block-between -->
                                <br>
                                <?php $this->view('common/_flash')?>
                            </div><!-- .nk-block-head -->
                            
                            <div class="nk-block">
                                <div class="card card-bordered card-preview">
                                    <div class="card-inner">
                                        <div class="preview-block">
                                            <span class="preview-title-lg overline-title">Commande au Près d'un fournisseur</span>
                                            <div class="row gy-4">
                                                <div class="table-responsive">
                                                    <table id="dataTable" class="display table table-striped table-hover" >
                                                        <thead>
                                                            <tr>
                                                                <th>N° Commande</th>
                                                                <th>Nom fournisseur</th>
                                                                <th>Adresse fournisseur</th>
                                                                <th>telephone </th>
                                                                <th>Operation</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($receptions as $commande) : ?>
                                                                <tr>
                                                                    <td><?="Ref-commande ".$commande->num_commande?></td>
                                                                    <td><?=$commande->nom_fournisseur?></td>
                                                                    <td><?=$commande->adresse_fournisseur?></td>
                                                                    <td><?=$commande->telephone_fournisseur?></td>
                                                                    <td>
                                                                        <div class="form-button-action">
                                                                            <a type="button" data-toggle="tooltip" title="" href="<?=ROOT?>/PDF/commande_pdf/<?=$commande->num_commande ?>" class="btn btn-link btn-primary btn-lg" target="_blank" data-original-title="Imprimer">
                                                                                <i class="fa fa-print"></i>
                                                                            </a>
                                                                            <a type="button" data-toggle="tooltip" title="" href="<?=ROOT?>/Commandes/edit/<?=$commande->num_commande?>" class="btn btn-link btn-primary btn-lg" data-original-title="Editer">
                                                                                <i class="fa fa-edit"></i>
                                                                            </a>
                                                                            <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                                                                <i class="fa fa-times"></i>
                                                                            </button>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .card-preview -->
                            </div><!-- .nk-block -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- content @e -->
            <!-- footer @s -->
            <?php $this->view('common/foot') ?>
            <!-- footer @e -->
        </div>

        <!-- wrap @e -->
    </div>
    <!-- main @e -->
</div>
<!-- app-root @e -->
<!-- select region modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="region">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                <h5 class="title mb-4">Select Your Country</h5>
                <div class="nk-country-region">
                    <ul class="country-list text-center gy-2">
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/arg.png" alt="" class="country-flag">
                                <span class="country-name">Argentina</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/aus.png" alt="" class="country-flag">
                                <span class="country-name">Australia</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/bangladesh.png" alt="" class="country-flag">
                                <span class="country-name">Bangladesh</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/canada.png" alt="" class="country-flag">
                                <span class="country-name">Canada <small>(English)</small></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/china.png" alt="" class="country-flag">
                                <span class="country-name">Centrafricaine</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/china.png" alt="" class="country-flag">
                                <span class="country-name">China</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/french.png" alt="" class="country-flag">
                                <span class="country-name">France</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/germany.png" alt="" class="country-flag">
                                <span class="country-name">Germany</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/iran.png" alt="" class="country-flag">
                                <span class="country-name">Iran</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/italy.png" alt="" class="country-flag">
                                <span class="country-name">Italy</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/mexico.png" alt="" class="country-flag">
                                <span class="country-name">México</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/philipine.png" alt="" class="country-flag">
                                <span class="country-name">Philippines</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/portugal.png" alt="" class="country-flag">
                                <span class="country-name">Portugal</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/s-africa.png" alt="" class="country-flag">
                                <span class="country-name">South Africa</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/spanish.png" alt="" class="country-flag">
                                <span class="country-name">Spain</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/switzerland.png" alt="" class="country-flag">
                                <span class="country-name">Switzerland</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/uk.png" alt="" class="country-flag">
                                <span class="country-name">United Kingdom</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/english.png" alt="" class="country-flag">
                                <span class="country-name">United State</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!-- .modal-content -->
    </div><!-- .modla-dialog -->
</div><!-- .modal -->
<!-- JavaScript -->
<?php $this->view('common/footer') ?>

</body>
</html>
