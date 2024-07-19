
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
                                        <h3 class="nk-block-title page-title">Interface Ticket</h3>
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
                                            <span class="preview-title-lg overline-title">Outlined Preview</span>
                                            <div class="row gy-4" id="buttongroup">
                                                <?php $this->view('common/_flash')?>
                                                <?php if (isset($user) && count($user) != 0) {
                                                    echo '<div class="alert alert-danger" >
                                                    <button type="button" class="close"   data-dismiss="alert" aria-hidden="true">&times;</button>';

                                                    foreach ($user as $error) {
                                                        echo $error.'</br>';
                                                    }
                                                    echo '</div>';
                                                }
                                                ?>
                                                <table class="table datatables dataTable-1" id="dataTable">
                                                    <thead>
                                                    <tr>
                                                        <th>Nom</th>
                                                        <th>Prénom</th>
                                                        <th>motif</th>
                                                        <th>Date du rendez-vous</th>
                                                        <th>Heure du rendez-vous</th>
                                                        <th style="font-size: 12px;font-weight: bold">Operation</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php  if(isset($_SESSION['role']) and $_SESSION['role']==='supAdmin'||$_SESSION['role']==='admin') : ?>
                                                        <?php foreach ($datas as $rendezVous) : ?>
                                                            <tr>
                                                                <td><?=$rendezVous->nom_patient ?></td>
                                                                <td><?=$rendezVous->prenom_patient ?></td>
                                                                <td><?=$rendezVous->motif ?></td>
                                                                <td><?=$rendezVous->jour ?></td>
                                                                <td><?=$rendezVous->heure_rendezvous ?></td>
                                                                <td>
                                                                    <div class="drodown">
                                                                        <button class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></button>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <ul class="link-list-opt no-bdr">

                                                                                <?php if ($rendezVous->effectuer===null) :?>
                                                                                    <a class="dropdown-item" href="<?=ROOT?>/AjouterRendezvous/edit/<?=$rendezVous->num_rendez ?>"> Edit</a>

                                                                                    <a class="dropdown-item  statut btn btn-primary" id="<?= $rendezVous->num_rendez ?>" >
                                                                                        <span class="" style="width: 100%">statut</span>
                                                                                    </a>

                                                                                    <a class="dropdown-item" href="<?=ROOT?>/Consultations/rdvfetch/<?=$rendezVous->num_rendez ?>">Faire
                                                                                        Une consultation</a>
                                                                                <?php else:; ?>
                                                                                    <a class=" dropdown-item btn  disabled"   id="" style="width: 100%"><span class="">Desactivé</span></a>
                                                                                    <a class=" dropdown-item btn " href="<?=ROOT?>/PDF/dossier_rendezvous/<?=$rendezVous->num_rendez ?>"  id="" style="width: 100%" target="_blank"><span class="">Voir detaille</span></a>
                                                                                <?php endif; ?>

                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach ?>
                                                    <?php else: ?>
                                                        <?php foreach ($datas as $rendezVous) : ?>
                                                            <?php if ($rendezVous->numAgent===$_SESSION['user_id']) : ?>
                                                                <tr>
                                                                    <td><?=$rendezVous->nom_patient ?></td>
                                                                    <td><?=$rendezVous->prenom_patient ?></td>
                                                                    <td><?=$rendezVous->motif ?></td>
                                                                    <td><?=$rendezVous->jour ?></td>
                                                                    <td><?=$rendezVous->heure_rendezvous ?></td>
                                                                    <td>
                                                                        <div class="drodown">
                                                                            <button class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></button>
                                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                                <ul class="link-list-opt no-bdr">

                                                                                    <?php if ($rendezVous->effectuer===null) :?>
                                                                                        <a class="dropdown-item" href="<?=ROOT?>/AjouterRendezvous/edit/<?=$rendezVous->num_rendez ?>"> Edit</a>

                                                                                        <a class="dropdown-item  statut btn btn-primary" id="<?= $rendezVous->num_rendez ?>" >
                                                                                            <span class="" style="width: 100%">statut</span>
                                                                                        </a>

                                                                                        <a class="dropdown-item" href="<?=ROOT?>/Consultations/rdvfetch/<?=$rendezVous->num_rendez ?>">Faire
                                                                                            Une consultation</a>
                                                                                    <?php else:; ?>
                                                                                        <a class=" dropdown-item btn  disabled"   id="" style="width: 100%"><span class="">Desactivé</span></a>
                                                                                        <a class=" dropdown-item btn " href="<?=ROOT?>/PDF/dossier_rendezvous/<?=$rendezVous->num_rendez ?>"  id="" style="width: 100%" target="_blank"><span class="">Voir detaille</span></a>
                                                                                    <?php endif; ?>

                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php endif; ?>
                                                        <?php endforeach ?>
                                                    <?php endif; ?>
                                                    </tbody>
                                                </table>
                                            </div> <!-- /.card-body -->
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

<script type="text/javascript">

    $('.statut').click(function (e) {

        e.preventDefault();

        var idRdv=$(this).attr('id');

        $.ajax({
            url:'<?=ROOT?>/AjouterRendezvous',
            method:"POST",
            data:{idRdv:idRdv},
            dataType:'json',
            success:function(response)
            {

                $('#buttongroup').before('<div class="container"><div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4>'+response.modification+'</h4></div></div>');
            }
        })
    });
</script>
</body>
</html>