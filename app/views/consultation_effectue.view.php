
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
                                        <h3 class="nk-block-title page-title">Dashboard</h3>
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
            
                            </div><!-- .nk-block-head -->
                            <div class="nk-block">

                                <div class="card card-bordered card-preview">
                                    <div class="card-inner">
                                        <table class="datatable-init-export nowrap table" data-export-title="Export">
                                            <thead>
                                                <tr>
                                                    <th width="20%">Date de Consultation</th>
                                                   
                                                    <th width="15%">Nom patient</th>
                                                    <th  width="15%">Prenom Patient</th>
                                                    <th>Motif de la consultation</th>
                                                    <th>Examen Clinique</th>
                                                    <th>Operation</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach  ($tickets as $ticket) : ?>
                                                    <?php foreach ($patients as $patient) : ?>
                                                        <?php foreach ($consultations as $consultation) : ?>
                                                            <?php  if(isset($_SESSION['role']) and $_SESSION['role']==='supAdmin'||$_SESSION['role']==='admin') : ?>

                                                                <?php if ($patient->num_patient ===  $ticket->idPatient and 
                                                                $consultation->num_ticket===$ticket->num_ticket && $ticket->statut_ticket!==NULL 
                                                                and $consultation->idRendezVous===NULL) : ?>

                                                                    <tr>
                                                                        
                                                                        <td><?=$consultation->date_consult ?> </td>
                                                                       
                                                                        <td><?=$patient->nom_patient?></td>
                                                                        
                                                                        <td><?=$patient->prenom_patient?></td>
                                                                        <td><?=$consultation->motif_consult?></td>
                                                                        <td><?=$consultation->examen_clinic?></td>
                                                                                                                                              
                                                                        <td>
                                                                            <div class="drodown">
                                                                                <button class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></button>
                                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                                    <ul class="link-list-opt no-bdr">

                                                                                    <a class="dropdown-item" href="<?=ROOT?>/Consultations/edit/<?=$ticket->num_ticket?>">Edit</a>
                                                                                    <a class="dropdown-item" href="<?=ROOT?>/Ordonnances/<?=$consultation->num_consult?>">Ordonnance</a>
                                                                                    <a class="dropdown-item" href="Certificat.php?id=<?=$patient->num_consult ?>">Certificat</a>
                                                                                    <a class="dropdown-item" href="<?=ROOT?>/Analyses/AjoutAnalyse/<?=$consultation->num_consult?>">Analyse</a>
                                                                                    <a class="dropdown-item" href="<?=ROOT?>/AjouterRendezvous/<?=$patient->num_patient?>">Prendre un Rdv</a>
                                                                                    <a class="dropdown-item" href="<?=ROOT?>/Consultations/list_consultation_dataille/<?=$patient->num_patient ?>">Plus de
                                                                                        detaille en PDF</a>

                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                <?php endif; ?>
                                                            <?php else : ?>
                                                                <?php if ($patient->mum_patient ===  $ticket->idpatient and $consultation->num_ticket===$ticket->num_ticket && $ticket->statut!==NULL and $consultation->numAgent===$_SESSION['user_id']) : ?>
                                                                    
                                                                    <tr>
                                                                    <td><?=$consultation->date_consult ?> </td>
                                                                       
                                                                       <td><?=$patient->nom_patient?></td>
                                                                       
                                                                       <td><?=$patient->prenom_patient?></td>
                                                                       <td><?=$consultation->motif_consult?></td>
                                                                       <td><?=$consultation->examen_clinic?></td>
                                                                        <td><?=date('d/m/Y', strtotime($ticket->dateDebut.' +10 day'))?></td>
                                                                        <td>
                                                                           <div class="drodown">
                                                                               <button class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></button>
                                                                               <div class="dropdown-menu dropdown-menu-end">
                                                                                   <ul class="link-list-opt no-bdr">

                                                                                   <a class="dropdown-item" href="<?=ROOT?>/Consultations/edit/<?=$ticket->num_ticket?>">Edit</a>
                                                                                   <a class="dropdown-item" href="<?=ROOT?>/Ordonnances/<?=$consultation->num_consult?>">Ordonnance</a>
                                                                                   <a class="dropdown-item" href="Certificat.php?id=<?=$patient->num_consult ?>">Certificat</a>
                                                                                   <a class="dropdown-item" href="<?=ROOT?>/Analyses/AjoutAnalyse/<?=$consultation->num_consult?>">Analyse</a>
                                                                                   <a class="dropdown-item" href="<?=ROOT?>/AjouterRendezvous/<?=$patient->num_patient?>">Prendre un Rdv</a>
                                                                                   <a class="dropdown-item" href="<?=ROOT?>/Consultations/list_consultation_dataille/<?=$patient->num_patient ?>">Plus de
                                                                                       detaille en PDF</a>

                                                                                   </ul>
                                                                               </div>
                                                                           </div>
                                                                       </td>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                    
                                                                <?php endif; ?>

                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    <?php endforeach; ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
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