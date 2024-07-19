


<!DOCTYPE html>
<html>
<?php $this->view('common/header')?>
<body data-background-color="">
<div class="wrapper">
<script type="text/javascript">

  $(document).ready(function(){
    $("thead").hide();
    $(".card-footer").hide();

      $('tbody').delegate('.quantite,.prix_achat','keyup',function()
      {
          var tr=$(this).parent().parent();
          var quantite=tr.find('.quantite').val();
          var prix_achat=tr.find('.prix_achat').val();

          var amount=(quantite*prix_achat);
          tr.find('.montant').val(amount);
          total();
      });

      function total()
      {
          var total=0;
          $('.montant').each(function(i,e)
          {
              var montant=$(this).val()-0;
              total +=montant;
          });

          $('.total').val(total);

      }
    
    var count=0;

    $("#IDnomMaladie").append("<div class='submenu' id='submenu'><select  name='structure' class='form-control structure' id='structure' data-structure='"+count+"'><option>selection</option><?=$row?></select></div>");
    $(document).on('change', '.structure', function(){
        var consultat = $(this).val();
        $.ajax({
            url:"<?=ROOT?>/selectData_ajax/index",
            method:"POST",
            data:{consultat:consultat},
            success:function(data)
            {
                var input = '';
                input += data;
                $('#salle').html(input);

                $("thead").show();
                $(".card-footer").show();

                $('tbody tr').remove();
            }
        });
    });

    $('.addRow').on('click', function () {
        count++;
        addRow();
    });

    function addRow() {
        var tr = '<tr>'+
            '<td ><input class="form-control salle" id="salle'+count+'" name="nomSalle[]" placeholder="Enregistrer une salle"></td>'+
            '<td><a href="#" class="btn btn-danger btn-sm remove"><i class="fa fa-trash"></i></a></td>' +
            '</tr>';
        $('tbody').append(tr);
    }

    $(document).on('click', '.remove', function(){
        var last = $('tbody tr').length;
        if (last<=1){
            $('#structure').prop('selectedIndex',0);
            $('.salle').prop('selectedIndex',0);
            $(this).closest('tr').remove();
            $("thead").hide();
            $(".card-footer").hide();

        }else {
            $(this).closest('tr').remove();
        }
    });
})
</script>
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



    <!-- contenu principale-->
    <div class="main-panel">

        <div class="content">

            <!-- Row Card No Padding -->

            <div class="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Lieste des tickets en cours de validation</h4>
                                    <a class="btn btn-primary btn-round ml-auto" href="<?=ROOT?>/Securite_socials">
                                        <i class="fas fa-plus"></i>
                                        Lister
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- Modal ajout de salle -->
                                <?php $this->view('common/_flash')?>
                                <div class="table-responsive">
                                    <table id="dataTable" class="display table table-striped table-hover" >
                                        <thead>
                                        <tr>
                                            <th width="15%">Nom patient</th>
                                            <th  width="15%">Prenom Patient</th>
                                            <th  width="15%">Type de ticket</th>
                                            <th width="15%">Date prise ticket</th>
                                            <th width="15%">Frais</th>
                                            <th width="15%">Date expiration</th>
                                            <th>Operation</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <!--                                        num_patient 	nom_patient 	prenom_patient 	age_patient 	sexe_patient 	taille_patient 	poids_patient -->
                                        <!--num_structure	nom_structure 	-->
                                        <!--num_ticket 	date_ticket 	type_ticket 	motif_ticket 	idPatient 	date_expire 	-->
                                        <?php foreach ($patients as $patient) : ?>
                                            <?php foreach ($tickets as $ticket) : ?>
                                                <?php  if(isset($_SESSION['role']) and $_SESSION['role']==='supAdmin'||$_SESSION['role']==='admin') : ?>
                                                    <?php if ($patient->num_patient === $ticket->idPatient and $ticket->statut_ticket===null ) : ?>
                                                        <tr>
                                                            <td><?=$patient->nom_patient?></td>
                                                            <td><?=$patient->prenom_patient?></td>
                                                            <td><?=$ticket->type_ticket?></td>
                                                            <td><?=date('d/m/Y', strtotime($ticket->date_ticket))?> </td>
                                                            <td><?=$ticket->frais?></td>
                                                            <td><?=date('d/m/Y', strtotime($ticket->date_expire.' +10 day'))?></td>
                                                            <td>
                                                                <button class="btn btn-sm btn-primary dropdown-toggle more-horizontal" type="button"
                                                                        data-toggle="dropdown"
                                                                        aria-haspopup="true" aria-expanded="false">
                                                                    <span >Action</span>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right" >

                                                                    <a class="dropdown-item" href="<?=ROOT?>/PDF/PdfTicket/<?=$ticket->num_ticket?>" target="_blank">Imprimer</a>
                                                                    <a class="dropdown-item" href="<?=ROOT?>/Tickets/edit/<?=$ticket->num_ticket?>">Edit</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <?php if ($patient->num_patient === $ticket->idPatient and $ticket->statut===null and $ticket->idUt===$_SESSION['user_id']) : ?>
                                                        <tr>
                                                            <td><?=$patient->nom_patient?></td>
                                                            <td><?=$patient->prenom_patient?></td>
                                                            <td><?=$ticket->type_ticket?></td>
                                                            <td><?=date('d/m/Y', strtotime($ticket->date_ticket))?> </td>
                                                            <td><?=$ticket->frais?></td>
                                                            <td><?=date('d/m/Y', strtotime($ticket->date_ticket.' +10 day'))?></td>
                                                            <td>

                                                                <button class="btn btn-sm btn-primary dropdown-toggle more-horizontal" type="button"
                                                                        data-toggle="dropdown"
                                                                        aria-haspopup="true" aria-expanded="false">
                                                                    <span >Action</span>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right" >

                                                                    <a class="dropdown-item" href="<?=ROOT?>/PDF/PdfTicket/<?=$ticket->num_ticket?>" target="_blank">Imprimer</a>
                                                                    <a class="dropdown-item" href="<?=ROOT?>/Tickets/edit/<?=$ticket->num_ticket?>">Edit</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

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


<!DOCTYPE html>
<html>
<?php $this->view('common/header')?>
<body data-background-color="">
<div class="wrapper">
    <div class="main-header">
        <!-- End Logo Header -->
        <?php $this->view('common/navbare'); ?>
        <!-- End Navbar -->
    </div>

    <!-- Sidebar -->
    <?php $this->view('common/sidebare'); ?>
    <!-- End Sidebar -->
    <!-- contenu principale-->
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
                                <?php if (isset($consults) && count($consults) != 0) {
                                    echo '<div class="alert alert-danger" >
                                                    <button type="button" class="close"   data-dismiss="alert" aria-hidden="true">&times;</button>';

                                    foreach ($consults as $consult) {
                                        echo $consult.'</br>';
                                    }
                                    echo '</div>';
                                }
                                ?>
                                <?php if (isset($rdv) ): ?>
                                    <form action="" method="post" id="consultationForm">

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <fieldset class="form-group">
                                                    <input type="text" name="nomPatient" class="form-control" id="nomPatient" readonly="readonly" value="<?=$datas->nomPatient ?>">
                                                    <input type="hidden" name="idRendezVous" class="form-control" id="idRendezVous" value="<?=$datas->idRendezVous ?>">
                                                    <input type="hidden" name="idPatient" class="form-control" id="idPatient"
                                                           value="<?=$datas->idPatient ?>">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-4">
                                                <fieldset class="form-group">

                                                    <input type="text" class="form-control" readonly="readonly" name="prenomPatient" id="prenomPatient"
                                                           value="<?= $datas->prenomPatient?>">

                                                </fieldset>
                                            </div>
                                            <div class="col-lg-4">
                                                <fieldset class="form-group">

                                                    <input type="text" class="form-control" id="agePatient" readonly="readonly"
                                                           value="<?=$datas->agePatient ?>" name="age">
                                                </fieldset>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-6">
                                                <fieldset class="form-group">
                                                    <label for="diagnostique">Diagnostique</label>
                                                    <textarea class="form-control" id="diagnostique"  rows="5" cols="5" name="diagnostique"></textarea>
                                                </fieldset>
                                            </div>
                                            <div class="col-6">
                                                <fieldset class="form-group">
                                                    <label for="dateConsult">Date de consultation</label>
                                                    <input type="text" class="form-control" id="dateConsult" name="dateConsult" value="<?=date('Y-m-d H:m:s')?>">
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <fieldset class="form-group">
                                                    <label for="hospitalise"> <h6>Le patient va-t-il être hospitaliser? </h6> </label>
                                                    <input type="checkbox" name="hospitalise" class="hospitalise" style="width: 23px;"  id="hospitalise">
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="row selectedHospitaliser" >

                                        </div>
                                        <br>
                                        <input type="submit" class="btn btn-sm btn-primary fa-pull-right" name="consulter" id="consulter" value="Enregistrer">
                                    </form>
                                <?php endif ?>
                                <?php if (isset($editRDV)) :?>
                                    <form action="" method="post" id="consultationForm">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <fieldset class="form-group">
                                                    <label for="nomPatient">Nom du patient</label>
                                                    <input type="text" name="nomPatient" class="form-control" readonly id="nomPatient" value="<?=$data->nomPatient?>">
                                                    <input type="hidden" name="idPatient" class="form-control" id="idPatient" value="<?=$data->idPatient?>">
                                                    <input type="hidden" name="idRendezVous" class="form-control" id="idRendezVous" value="<?=$data->idConsultation ?>">
                                                    <input type="text" class="form-control" id="telephone" name="telephone" value="<?=$data->telephonePat ?>">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-4">
                                                <fieldset class="form-group">
                                                    <label for="prenomPatient">Prenom du patient</label>
                                                    <input type="text" class="form-control" name="prenomPatient" readonly id="prenomPatient" value="<?=$data->prenomPatient?>">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-4">
                                                <fieldset class="form-group">
                                                    <label for="agePatient">Age du patient</label>
                                                    <input type="text" class="form-control" id="agePatient" readonly value="<?=$data->agePatient?>" name="age">
                                                </fieldset>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label for="diagnostique">Diagnostique</label>
                                                    <textarea class="form-control" id="diagnostique"  rows="5" cols="5" name="diagnostique" ><?=$data->resultatConsultation?></textarea>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <input type="hidden" class="form-control" id="idTicket" name="idTicket"  value="<?=$data->idTicket?>">
                                                    <label for="dateConsult">Date de consultation</label>
                                                    <input type="text" class="form-control" id="dateConsult" name="dateConsult" value="<?=$data->dateConsultaion ?>">
                                                </fieldset>
                                            </div>
                                        </div>

                                        <?php if (isset($hospitaliser->idConsultation)) : ?>

                                            <div class="row">

                                                <div class="col-3">

                                                    <fieldset class="form-group">

                                                        <label for="hospitalise">Le patient est hopisatliser  </label>

                                                        <input type="checkbox" name="hospitalise" class="hospitalise"  onclick="return false;" checked="ckecked" style="width: 23px;"  id="hospitalise">

                                                    </fieldset>

                                                </div>

                                            </div>
                                            <div class="row selectedHospitaliser" >

                                                <div class="col-lg-4 " id="submenu">

                                                    <select name="structure" class="form-control structure" id="structure" >

                                                        <option value="<?=$dataHospitale->codeStructure?>" selected><?=$dataHospitale->nomStructure ?></option>

                                                        <?php foreach ($rows as $structure) : ?>
                                                            <?php if ($structure->codeStructure != $dataHospitale->codeStructure) : ?>
                                                                <option value="<?=$structure->codeStructure?>" ><?=$structure->nomStructure ?></option>
                                                            <?php endif  ?>
                                                        <?php endforeach;  ?>

                                                    </select>
                                                </div>
                                                <div class="col-lg-4 ">

                                                    <select name="salle" class="form-control salle" id="salle" >

                                                        <option value="<?=$dataHospitale->codesalle?>"><?=$dataHospitale->nomSalle?></option>

                                                    </select>

                                                </div>

                                                <div class="col-lg-4 ">

                                                    <select name="lit" class="form-control lit" id="lit">

                                                        <option value="<?=$hospitaliser->id_lit?>"><?=$hospitaliser->code_indenti?></option>

                                                    </select>

                                                </div>
                                            </div>
                                        <?php endif ?>
                                        <br>
                                        <input type="submit" class="btn btn-sm btn-primary fa-pull-right" name="consulter" id="consulter" value="Enregistrer">
                                    </form>
                                <?php endif ?>
                                <?php if (isset($edit) ): ?>
                                    <form action="" method="post" id="consultationForm">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <fieldset class="form-group">
                                                    <label for="nomPatient">Nom du patient</label>
                                                    <input type="text" name="nomPatient" class="form-control" readonly id="nomPatient" value="<?=$data->nomPatient?>">
                                                    <input type="hidden" name="idPatient" class="form-control" id="idPatient" value="<?=$data->idPatient?>">
                                                    <input type="hidden" class="form-control" id="telephone" name="telephone" value="<?=$data->telephonePat ?>">
                                                    <input type="hidden" name="idConsultation" class="form-control" id="idConsultation" value="<?=$data->idConsultation ?>">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-4">
                                                <fieldset class="form-group">
                                                    <label for="prenomPatient">Prenom du patient</label>
                                                    <input type="text" class="form-control" name="prenomPatient" readonly id="prenomPatient" value="<?=$data->prenomPatient?>">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-4">
                                                <fieldset class="form-group">
                                                    <label for="agePatient">Age du patient</label>
                                                    <input type="text" class="form-control" id="agePatient" readonly value="<?=$data->agePatient?>" name="age">
                                                </fieldset>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label for="diagnostique">Diagnostique</label>
                                                    <textarea class="form-control" id="diagnostique"  rows="5" cols="5" name="diagnostique" ><?=$data->resultatConsultation?></textarea>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <input type="hidden" class="form-control" id="idTicket" name="idTicket"  value="<?=$data->idTicket?>">
                                                    <label for="dateConsult">Date de consultation</label>
                                                    <input type="text" class="form-control" id="dateConsult" name="dateConsult" value="<?=$data->dateConsultaion ?>">
                                                </fieldset>
                                            </div>
                                        </div>

                                        <?php if (isset($hospitaliser->idConsultation)) : ?>

                                            <div class="row">
                                                <div class="col-3">
                                                    <fieldset class="form-group">
                                                        <label for="hospitalise">Le patient est hopisatliser  </label>
                                                        <input type="checkbox" name="hospitalise" class="hospitalise"  onclick="return false;" checked="ckecked" style="width: 23px;"  id="hospitalise">
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row selectedHospitaliser" >

                                                <div class="col-lg-4 " id="submenu">
                                                    <select name="structure" class="form-control structure" id="structure" >

                                                        <option value="<?=$dataHospitale->codeStructure?>" selected><?=$dataHospitale->nomStructure ?></option>
                                                        <?php foreach ($rows as $structure) : ?>
                                                            <?php if ($structure->codeStructure != $dataHospitale->codeStructure) : ?>
                                                                <option value="<?=$structure->codeStructure?>" ><?=$structure->nomStructure ?></option>
                                                            <?php endif  ?>
                                                        <?php endforeach;  ?>
                                                    </select>
                                                </div>
                                                <div class="col-lg-4 " >
                                                    <select name="salle" class="form-control salle" id="salle" >
                                                        <option value="<?=$dataHospitale->codesalle?>"><?=$dataHospitale->nomSalle?></option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-4 ">
                                                    <select name="lit" class="form-control lit" id="lit" >
                                                        <option value="<?=$hospitaliser->id_lit?>"><?=$hospitaliser->code_indenti?></option>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php endif ?>
                                        <br>
                                        <input type="submit" class="btn btn-sm btn-primary fa-pull-right" name="consulter" id="consulter" value="Enregistrer">
                                    </form>
                                <?php else: ?>
                                    <?php if (isset($patients) ): ?>
                                        <?php foreach ($patients as $patient) : ?>
                                            <?php foreach ($consultations as $consultation) : ?>
                                                <?php if ($patient->num_patient === $datas->idPatient and $datas->statut_ticket===null and $datas->num_ticket===$consultation->num_ticket and $patient->telephonepat===null) : ?>
                                                    <form action="" method="post" id="consultationForm">

                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <fieldset class="form-group">
                                                                    <label for="nomPatient">Nom du patient</label>
                                                                    <input type="text" name="nomPatient" class="form-control" id="nomPatient" readonly="readonly" value="<?=$patient->nom_patient ?>">
                                                                    <input type="hidden" name="idTicket" class="form-control" id="idTicket" value="<?=$datas->num_ticket ?>">
                                                                    <input type="hidden" name="idConsultation" class="form-control" id="idConsultation" value="<?=$consultation->num_consult ?>">
                                                                    <input type="hidden" name="idPatient" class="form-control" id="idPatient" value="<?=$patient->num_patient ?>">
                                                                </fieldset>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <fieldset class="form-group">
                                                                    <label for="prenomPatient">Prenom du patient</label>
                                                                    <input type="text" class="form-control" readonly="readonly" name="prenomPatient" id="prenomPatient"
                                                                           value="<?= $patient->prenom_patient?>">

                                                                </fieldset>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <fieldset class="form-group">
                                                                    <label for="agePatient">Age du patient</label>
                                                                    <input type="text" class="form-control" id="agePatient" readonly="readonly" value="<?=$patient->age_patient ?>" name="age">
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <fieldset class="form-group">
                                                                    <label for="ethnie">Ethnie du patient</label>
                                                                    <input type="text" class="form-control" name="ethnie" id="ethnie">
                                                                </fieldset>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <fieldset class="form-group">
                                                                    <label for="genre">Genre</label>
                                                                    <select class="form-control" name="genre" id="genre">
                                                                        <option >Selection le genre</option>
                                                                        <option value="M">Masculin</option>
                                                                        <option value="F">Feminin</option>
                                                                    </select>
                                                                </fieldset>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <fieldset class="form-group">
                                                                    <label for="poids">Poids</label>
                                                                    <input type="text" class="form-control" name="poids" id="poids" placeholder="">
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <fieldset class="form-group">
                                                                    <label for="taillePat">Taille du patient</label>
                                                                    <input type="text" class="form-control" id="taillePat" name="taillePat" >
                                                                </fieldset>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <fieldset class="form-group">
                                                                    <label for="telephone">N° de Téléphone</label>
                                                                    <input type="number" class="form-control" id="telephone" name="telephone" value="">
                                                                </fieldset>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <fieldset class="form-group">
                                                                    <label for="dateConsult">Date de consultation</label>
                                                                    <input type="text" class="form-control" id="dateConsult" name="dateConsult" value="<?=date('Y-m-d H:m:s')?>">
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <fieldset class="form-group">
                                                                    <label for="diagnostique">Diagnostique</label> <a href="#" class="addRow btn btn-success btn-xs"><i class="fa fa-plus"></i></a>
                                                                    <textarea class="form-control" id="diagnostique"  rows="5" cols="5" name="diagnostique"></textarea>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <fieldset class="form-group">
                                                                    <label for="hospitalise"><h6>Le patient va-t-il être hospitaliser?</h6> </label>
                                                                    <input type="checkbox" name="hospitalise" class="hospitalise" style="width: 23px;"  id="hospitalise">
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                        <div class="row selectedHospitaliser" >

                                                        </div>
                                                        <br>
                                                        <input type="submit" class="btn btn-sm btn-primary fa-pull-right" name="consulter" id="consulter" value="Enregistrer">
                                                    </form>
                                                <?php endif ?>
                                                <?php if ($patient->num_patient === $datas->idPatient and $datas->statut_ticket===null and $datas->num_ticket===$consultation->num_ticket and $patient->telephonepat!==null) :?>
                                                    <form action="" method="post" id="consultationForm">
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <fieldset class="form-group">
                                                                    <input type="text" name="nomPatient" class="form-control" id="nomPatient" readonly="readonly" value="<?=$patient->nom_patient ?>">
                                                                    <input type="hidden" class="form-control" id="telephone" name="telephone" value="<?=$patient->telephonepat ?>">
                                                                    <input type="hidden" name="idTicket" class="form-control" id="idTicket" value="<?=$id ?>">
                                                                    <input type="hidden" name="idConsultation" class="form-control" id="idConsultation" value="<?=$consultation->idConsultation ?>">
                                                                    <input type="hidden" name="idPatient" class="form-control" id="idPatient" value="<?=$datas->idPatient ?>">
                                                                </fieldset>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <fieldset class="form-group">

                                                                    <input type="text" class="form-control" readonly="readonly" name="prenomPatient" id="prenomPatient"
                                                                           value="<?= $patient->prenom_patient?>">

                                                                </fieldset>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <fieldset class="form-group">

                                                                    <input type="text" class="form-control" id="agePatient" readonly="readonly" value="<?=$patient->age_patient ?>" name="age">
                                                                </fieldset>
                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <div class="col-6">
                                                                <fieldset class="form-group">
                                                                    <label for="diagnostique">Diagnostique</label>
                                                                    <textarea class="form-control" id="diagnostique"  rows="5" cols="5" name="diagnostique"></textarea>
                                                                </fieldset>
                                                            </div>
                                                            <div class="col-6">
                                                                <fieldset class="form-group">
                                                                    <label for="dateConsult">Date de consultation</label>
                                                                    <input type="text" class="form-control" id="dateConsult" name="dateConsult" value="<?=date('Y-m-d H:m:s')?>">
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <fieldset class="form-group">
                                                                    <label for="hospitalise"> <h6>Le patient va-t-il être hospitaliser? </h6> </label>
                                                                    <input type="checkbox" name="hospitalise" class="hospitalise" style="width: 23px;"  id="hospitalise">
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                        <div class="row selectedHospitaliser" >

                                                        </div>
                                                        <br>
                                                        <input type="submit" class="btn btn-sm btn-primary fa-pull-right" name="consulter" id="consulter" value="Enregistrer">
                                                    </form>

                                                <?php endif ?>
                                            <?php endforeach; ?>
                                        <?php endforeach; ?>
                                    <?php endif ?>
                                <?php endif ?>

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
<script>
    $(document).ready(function(){
        var count=0;
        jQuery('#hospitalise').change(function() {
            if ($(this).prop('checked')) {
                count++;
                selectedHospitaliser();
            }
            else {
                $('.selectedHospitaliser').find('.submenu').remove();
            }
        });

        function selectedHospitaliser() {

            var input = '<div class="col-lg-4 submenu" id="submenu"><select name="structure" class="form-control structure" id="structure'+count+'" >' +
                '<option value="">Selectionner Structure</option><?=$rows?></select></div>'+
                '<div class="col-lg-4 submenu" ><select name="salle" class="form-control salle" id="salle'+count+'" ></select></div>'+
                '<div class="col-lg-4 submenu"><select name="lit" class="form-control lit" id="lit" ></select></div>';

            $('.selectedHospitaliser').append(input);

        }

        $(document).on('change', '.structure', function(){
            var consultat = $(this).val();

            $.ajax({
                url:'<?=ROOT?>/selectData_ajax/index',
                method:"POST",
                data:{consultat:consultat},
                success:function(data)
                {
                    var input = '<option value="">Select Sub Category</option>';
                    input += data;
                    $('.salle').html(input);
                }
            })
        });

        $(document).on('change', '.salle', function(){
            var hospitalise = $(this).val();

            $.ajax({
                url:'<?=ROOT?>/selectData_ajax/select_hospital',
                method:"POST",
                data:{hospitalise:hospitalise},
                success:function(data)
                {
                    var input = '<option value="">Select Sub Category</option>';
                    input += data;
                    $('#lit').html(input);
                }
            })
        });

    });

</script>
<script>
    $(document).ready(function(){
        var count=0;

        if ($('.hospitaliseUpdate').prop('checked')) {
            count++;
            selectedHospitaliser();
        }

        else {
            $('.selectedHospitaliser').find('.submenu').remove();
        }

        function selectedHospitaliser() {

            var input ='<div class="col-lg-4 submenu" ><select name="salle" class="form-control salle" id="salle'+count+'" ></select></div>'+
                '<div class="col-lg-4 submenu"><select name="lit" class="form-control lit" id="lit" ></select></div>';

            $('.selectedHospitaliser').append(input);

        }

        $(document).on('change', '.structure', function(){
            var consultat = $(this).val();

            $.ajax({
                url:'<?=ROOT?>/selectData_ajax/index',
                method:"POST",
                data:{consultat:consultat},
                success:function(data)
                {
                    var input = '<option value="">Select Sub Category</option>';
                    input += data;
                    $('.salle').html(input);
                }
            })
        });

        $(document).on('change', '.salle', function(){
            var hospitalise = $(this).val();

            $.ajax({
                url:'<?=ROOT?>/selectData_ajax/select_hospital',
                method:"POST",
                data:{hospitalise:hospitalise},
                success:function(data)
                {
                    var input = '<option value="">Select Sub Category</option>';
                    input += data;
                    $('.lit').html(input);
                }
            })
        });

    });
</script>
<script>
    $('.addRow').on('click', function () {
        count++;
        addRow();
    });
    function addRow() {
        var tr = '<tr>'+
            '<td ><input class="form-control lit" id="lit'+count+'" name="lit[]" placeholder="indentification de votre lit"></td>'+
            '<td><a href="#" class="btn btn-danger btn-sm remove"><i class="fa fa-trash"></i></a></td>' +
            '</tr>';
        $('tbody').append(tr);
    }
    $(document).on('click', '.remove', function(){
        var last = $('tbody tr').length;
        if (last<=1){
            $('#structure').prop('selectedIndex',0);
            $('.salle').prop('selectedIndex',0);
            $(this).closest('tr').remove();
            $("thead").hide();
            $(".card-footer").hide();

        }else {
            $(this).closest('tr').remove();
        }
    });

</script>
</body>
</html>