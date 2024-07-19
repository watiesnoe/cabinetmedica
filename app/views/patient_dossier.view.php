<!DOCTYPE html>
<html>
<?php $this->view('common/header')?>
<body data-background-color="">
<div class="wrapper">
    <div class="main-header">
        <!-- Logo Header -->

        <!-- End Logo Header -->

        <?php $this->view('common/navbare'); ?>
        <!-- Navbar Header -->


        <!-- End Navbar -->
    </div>

    <!-- Sidebar -->
    <?php $this->view('common/sidebare'); ?>
    <!-- End Sidebar -->



    <!-- Custom template | don't include it in your project! -->
    <div class="main-panel">

        <div class="content">

            <!-- Row Card No Padding -->

            <div class="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow mb-4">
                            <div class="card-header">
                                <strong class="card-title">Ajout/ Liste  / Modification  / du menu structure </strong>
                                <div class="btn-group card-option " style="margin-left: 30%">
                                    <button type="button" class="btn dropdown-toggle btn-sm btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                        <li class="dropdown-item full-card"><a href="<?=ROOT?>/Liste_structures"><span><i class="fa fa-list-alt"></i> Liste</span></a></li>
                                    </ul>
                                </div>

                            </div>
                            <div class="card-body">
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
                                <form action="" method="post" id="consultationForm">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <fieldset class="form-group">
                                                <label for="nomPatient">Nom du patient</label>
                                                <input type="text" name="nomPatient" class="form-control"  readonly="readonly" id="nomPatient" value="<?=$data->nomPatient?>">

                                            </fieldset>
                                        </div>
                                        <div class="col-lg-4">
                                            <fieldset class="form-group">
                                                <label for="prenomPatient">Prenom du patient</label>
                                                <input type="text" class="form-control" name="prenomPatient"  readonly="readonly" id="prenomPatient" value="<?=$data->prenomPatient?>">
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-4">
                                            <fieldset class="form-group">
                                                <label for="agePatient">Age du patient</label>
                                                <input type="text" class="form-control" id="agePatient"  readonly="readonly" value="<?=$data->agePatient?>" name="age">
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <fieldset class="form-group">
                                                <label for="ethnie">Ethnie du patient</label>
                                                <input type="text" class="form-control" name="ethnie" readonly="readonly"  id="ethnie" value="<?=$data->ethniPatient?>">
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-4">
                                            <fieldset class="form-group">
                                                <label for="genre">Genre</label>
                                                <input type="text" class="form-control" name="ethnie" readonly="readonly"  id="ethnie" value="<?=$data->sexe?>">
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-4">
                                            <fieldset class="form-group">
                                                <label for="poids">Poids</label>
                                                <input type="text" class="form-control" name="poids"  readonly="readonly" id="poids" placeholder="" value="<?=$data->poidPatient?>">
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <fieldset class="form-group">
                                                <label for="taillePat">Taille du patient</label>
                                                <input type="text" class="form-control" id="taillePat"  readonly="readonly" name="taillePat"  value="<?=$data->taillePat?>">
                                            </fieldset>
                                        </div>
                                        <div class="col-8">
                                            <fieldset class="form-group">
                                                <label for="telephone">N° de Téléphone</label>
                                                <input type="number" class="form-control" id="telephone"  readonly="readonly" name="telephone" value="<?=$data->telephonePat?>">
                                            </fieldset>
                                        </div>
                                    </div>
                                </form>
                                <br>

                                <div class="card">
                                    <div class="card-header mt-2" style="border: 1px solid #000; background-color:#129283;">
                                        <h5 style=" color:#fff; font-size:18px">Les consultation effectuées</h5>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered" id="dataTable-1" style="border: 1px solid #000;">
                                            <thead  style="border: 1px solid #000; background-color:#129283; color:#fff; font-size:12px">
                                            <td style="width: 20px">idConsultation</td>
                                            <td style="width: 200px">dateConsultation</td>

                                            <td>Diagnostique</td>
                                            </thead>
                                            <tbody style="border: 1px solid #000;  font-size:12px">
                                            <?php foreach ($datas  as $patient):?>
                                                <tr>
                                                    <td><?=$patient->idConsultation?></td>

                                                    <td><?=$patient->dateConsultaion?></td>
                                                    <td><?=$patient->resultatConsultation?></td>
                                                </tr>
                                            <?php endforeach ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header mt-2" style="border: 1px solid #000; background-color:#129283;">
                                        <h5 style=" color:#fff; font-size:18px">Les consultations effectuées par renddez-vous</h5>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered" id="dataTable-1" style="border: 1px solid #000;">
                                            <thead  style="border: 1px solid #000; background-color:#129283; color:#fff; font-size:12px">
                                            <td style="width: 10px">idConsultation</td>
                                            <td>dateConsultation</td>

                                            <td>Diagnostique</td>
                                            </thead>
                                            <tbody style="border: 1px solid #000;  font-size:12px">
                                            <?php foreach ($datasRDV  as $patient):?>
                                                <tr>
                                                    <td><?=$patient->idConsultation?></td>

                                                    <td><?=$patient->dateConsultaion  ?></td>
                                                    <td><?=$patient->resultatConsultation?></td>
                                                </tr>
                                            <?php endforeach ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header mt-2" style="border: 1px solid #000; background-color:#129283;">
                                        <h5 style=" color:#fff; font-size:18px">Les analyses effectuées</h5>
                                    </div>
                                    <div class="card-body">
                                        <table class="table datatables " id="dataTable-1">
                                            <thead>
                                            <tr>

                                                <th>Type d'analyse </th >
                                                <th>motif</th>
                                                <th>Date de reponse</th>
                                                <th>Reponse</th>
                                                <th>Medecin analyste</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($analyses  as $analyse):?>
                                                    <tr>
                                                        <td><?=$analyse->nom?></td>
                                                        <td><?=$analyse->motif?></td>
                                                        <td><?=$analyse->dateReponse?></td>
                                                        <td><?=$analyse->bilanExamen ?></td>
                                                        <td><?=$analyse->prenomMed.' '.$analyse->nomMed?></td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <a class="btn btn-success form-control btn-sm" style="color: #fff" href="<?=ROOT?>/PDF/dossier_patient/<?=$id?>" target="_blank">Exporter en Pdf</a>
                                </div>

                            </div> <!-- /.card-body -->
                        </div> <!-- /.card -->
                    </div> <!-- /.col -->
                </div>
            </div>

            <!-- TimeLine -->

        </div>
        <?php $this->view('common/foot'); ?>
    </div>
    <!-- End Custom template -->

</div>

<!--   Core JS Files   -->
<?php $this->view('common/footer'); ?>

</body>
</html>