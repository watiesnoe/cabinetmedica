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
                            <div class="nk-block">
                                <div class="card">
                                    <div class="card-aside-wrap" >
                                       <div class="card-inner card-inner-sm">
                                       <?php $this->view('common/_flash')?> <br>
                                            <div class="card-inner">
                                                <?php 
                                                    if (isset($consults) && count($consults) !== 0) {
                                                        echo '<div class="alert alert  alert-pro alert-danger alert-dismissible" >
                                                        <button class="close" data-bs-dismiss="alert"></button>';
                                                        foreach ($consults as $error) {
                                                            echo $error.'</br>';
                                                        }
                                                        echo '</div>';
                                                    }
                                                ?>
                                                <div class="tab-content">
                                                    <div class="tab-pane active " id="diagnostiques">
                                                        <table class="datatable-init-export nowrap table" id="dataTable">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nom</th>
                                                                    <th>Prénom</th>
                                                                    <th>Type d'analyse </th >
                                                                    <th>motif</th>
                                                                    <th>Date d'analyse</th>
                                                                    <?php if(isset($_SESSION['role']) and $_SESSION['role']!='docteur' || $_SESSION['role']!='medecin') :?>
                                                                        <th>Operation</th>
                                                                    <?php endif ?>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                 <?php  if(isset($_SESSION['role']) and $_SESSION['role']==='supAdmin'||$_SESSION['role']==='admin') : ?>
                                                                    <?php foreach ($analysesDemandes  as $analyse) : ?>
                                                                        <?php foreach ($patients  as $patient ) : ?>
                                                                            <?php  if($patient->num_patient===$analyse->idPatient && $analyse->bilanExamen===null && $analyse->num_consult!==null) :?>
                                                                                <tr>
                                                                                    <td><?= $patient->nom_patient ?></td>
                                                                                    <td><?= $patient->prenom_patient ?></td>
                                                                                    <td><?= $analyse->code_examen ?></td>
                                                                                    <td><?= $analyse->motif_axamen ?></td>
                                                                                    <td><?=$analyse->dateDamande ?></td>
                                                                                    <td>
                                                                                        <div class="drodown">
                                                                                            <button class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></button>
                                                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                                                <ul class="link-list-opt no-bdr">

                                                                                                    <?php  if(isset($_SESSION['role']) and $_SESSION['role']==='supAdmin'||$_SESSION['role']==='admin') : ?>
                                                                                                        <a class="dropdown-item" href="<?=ROOT?>/AjouterAnalyses/Reponses/<?=$analyse->numDemanceExamen?>"> Analyser</a>
                                                                                                        <a class="dropdown-item" href="<?=ROOT?>/Analyses/AjoutAnalyseEdite/<?=$analyse->numDemanceExamen?>"> Edit</a>
                                                                                                        <a href="<?=ROOT?>/PDF/detaille_demandeAnalyse/<?=$analyse->numDemanceExamen ?>"  target="_blank" class="dropdown-item">Imprimer</a>

                                                                                                    <?php endif ?>

                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            <?php endif ?>
                                                                        <?php endforeach ?>
                                                                    <?php endforeach ?>
                                                                 <?php elseif($_SESSION['role']==='docteur' || $_SESSION['role']==='medecin'): ?>
                                                                    <?php foreach ($analyseMedecins  as $analyse) : ?>
                                                                        <tr>
                                                                            <td><?= $analyse->nom_patient ?></td>
                                                                            <td><?= $analyse->prenomPatient ?></td>
                                                                            <td><?= $analyse->nom ?></td>
                                                                            <td><?= $analyse->motif ?></td>
                                                                            <td><?=$analyse->dateDamande ?></td>
                                                                            <td>
                                                                                <button class="btn btn-sm dropdown-toggle " type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <span class="text-muted">Action</span>
                                                                                </button>
                                                                                <div class="dropdown-menu dropdown-menu-right" >
                                                                                    <a class="dropdown-item" href="<?=ROOT?>/AjouterAnalyses/AjoutAnalyse/<?=$analyse->numDemanceExamen?>"> Edit</a>
                                                                                    <a href="<?=ROOT?>/PDF/detaille_demandeAnalyse/<?=$analyse->numDemanceExamen ?>"  target="_blank" class="dropdown-item">Imprimer</a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    <?php endforeach ?>
                                                                 <?php else: ?>
                                                                     <?php foreach ($datas  as $analyse) : ?>
                                                                        <tr>
                                                                            <td><?= $analyse->nomPatient ?></td>
                                                                            <td><?= $analyse->prenomPatient ?></td>
                                                                            <td><?= $analyse->nom ?></td>
                                                                            <td><?= $analyse->motif ?></td>
                                                                            <td><?=$analyse->dateDamande ?></td>
                                                                            <td>
                                                                                <button class="btn btn-sm dropdown-toggle " type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <span class="text-muted">Action</span>
                                                                                </button>
                                                                                <div class="dropdown-menu dropdown-menu-right" >
                                                                                    <a class="dropdown-item" href="<?=ROOT?>/AjouterAnalyses/Reponses/<?=$analyse->numDemanceExamen?>"> Analyser</a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    <?php endforeach ?>
                                                                 <?php endif; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
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


