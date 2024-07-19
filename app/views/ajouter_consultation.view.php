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
            <?php  $this->view('common/navbare')?>
            <!-- main header @e -->
            <!-- content @s -->

            <!-- content @e -->
            <!-- footer @s -->
            <div class="nk-content ">
                <div class="container-fluid">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            <form action="" class="consultationticket" method="post" id="consultationticket">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="nk-block-head-content">
                                            <h6 class="nk-block-title ">Espace Consultation</h6>
                                        </div><!-- .nk-block-head-content -->
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="card card-bordered card-preview">
                                                    <div class="card-header bg-secondary">
                                                        <span class="text-white" >Information du Patient</Span>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="fils">Fils de </label>
                                                                    <input type="text"
                                                                        class="form-control" name="fils" id="fils" aria-describedby="helpId"  value="<?=isset($get_input['fils']) ?  $get_input['fils'] : "" ?>"  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="">Groupe Sanguin</label>
                                                                    <input type="text"
                                                                        class="form-control" name="groupesangine" id="groupesangine"   value="<?=isset($get_input['groupesangine']) ? $get_input['groupesangine']:""?>"aria-describedby="helpId" placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="stuation_matrimonial">Stuation Matrimonial</label>
                                                                    <input type="text"
                                                                        class="form-control" name="stuation_matrimonial"  value="<?= isset($get_input['stuation_matrimonial'])? $get_input['stuation_matrimonial'] :""?>" id="stuation_matrimonial" aria-describedby="helpId" placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="poids">Poids</label>
                                                                    <input type="number"
                                                                        class="form-control" name="poids" id="poids"  value="<?=isset($get_input['poids'])?$get_input['poids']:""?>" aria-describedby="helpId" placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="">Taille</label>
                                                                    <input type="number"
                                                                        class="form-control" name="taille" id="taille" value="<?=isset($get_input['taille'])?$get_input['taille']:""?>" aria-describedby="helpId" placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Adresse patient</label>
                                                                <input type="text"
                                                                    class="form-control" name="adresse_patient" id="adresse_patient"   value="<?=isset($get_input['adresse_patient'])?$get_input['adresse_patient']:""?>" aria-describedby="helpId" placeholder="">
                                                                <input type="hidden"
                                                                    class="form-control" name="idpatient" id="idpatient" aria-describedby="helpId" placeholder="" value="<?=$datas->num_patient?>">
                                                                <input type="hidden"
                                                                    class="form-control" name="edit" id="edit" aria-describedby="helpId" placeholder="" value="<?=$datas->num_consult?>">
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="resultat_clinique">Resultat du bilan de l'examen clinique</label>
                                                                    <textarea name="resultat_clinique" id="resultat_clinique" cols="10" rows="1" class="form-control"><?=isset($get_input['resultat_clinique'])?$get_input['resultat_clinique']:""?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="">Diagnostique</label>
                                                                    <textarea name="diagnostique" id="diagnostique" cols="10" rows="1" class="form-control"><?=isset($get_input['diagnostique'])?$get_input['diagnostique']:""?></textarea>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div><!-- .card-preview -->
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="card card-bordered card-preview type-info-ticket">
                                                    <div class="card-header bg-secondary">
                                                        <span class="text-white" >Information du Ticket</Span>
                                                    </div>
                                                    <div class="card-inner">
                                                        <div class="card-body">
                                                        <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="antecedant_medicaux">Antécédents Medicaux</label>
                                                                    <textarea name="antecedant_medicaux" id="antecedant_medicaux" cols="5" rows="2" class="form-control"><?=isset($get_input['antecedant_medicaux'])?$get_input['antecedant_medicaux']:""?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="antecedant_chirigicale">Antécédents Chirigicaux</label>
                                                                    <div class="form-control-wrap">
                                                                        <textarea name="antecedant_chirigicale" id="antecedant_chirigicale" cols="5" rows="2" class="form-control"><?=isset($get_input['antecedant_chirigicale'])?$get_input['antecedant_chirigicale']:""?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="antecedant_familiale">Antécdents Familiale</label>
                                                                    <div class="form-control-wrap">
                                                                        <textarea name="antecedant_familiale" id="antecedant_familiale" cols="5" rows="2" class="form-control"><?=isset($get_input['antecedant_familiale'])?$get_input['antecedant_familiale']:""?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="antecedant_autre">Autres Antécédénts</label>
                                                                    <div class="form-control-wrap">
                                                                        <textarea name="antecedant_autre" id="antecedant_autre" cols="5" rows="2" class="form-control"><?=isset($get_input['antecedant_autre'])?$get_input['antecedant_autre']:""?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- .card-preview -->

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="pull-right" align="right">
                                            <button class="btn btn-success btn-sm pull-right" name="envoyer" type="submit">Enregistrer</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
<script>
    $(document).ready(function(){
        $('#consultationticket').on('submit',function (even) {
            even.preventDefault();

            //securite frais_analyse securite dateTicket nom prenom age genre ethnie typeticket
            var fils= $('#fils').val();
            var groupesangine= $('#groupesangine').val();
            var stuation_matrimonial= $('#stuation_matrimonial').val();
            var poids= $('#poids').val();
            var taille= $('#taille').val();
            var adresse_patient= $('#adresse_patient').val();
            var idpatient= $('#idpatient').val();
            var resultat_clinique= $('#resultat_clinique').val();
            var diagnostique= $('#diagnostique').val();
            var antecedant_medicaux= $('#antecedant_medicaux').val();
            var antecedant_chirigicale= $('#antecedant_chirigicale').val();
            var antecedant_familiale= $('#antecedant_familiale').val();
            var antecedant_autre= $('#antecedant_autre').val();
            var edit= $('#edit').val();
         
            if(stuation_matrimonial !== '' && poids !== ''
             && taille !== '' 
            && adresse_patient !== '' && edit !=='' &&
             resultat_clinique !== '' && diagnostique!==''){
               
                // window.setTimeout(location.reload(),6000)
                $.ajax({
                        url:"<?=ROOT?>/Consultations/Store",
                        method:'POST',
                        data:{fils:fils,groupesangine:groupesangine,stuation_matrimonial:stuation_matrimonial,
                        poids:poids,taille:taille,adresse_patient:adresse_patient,idpatient:idpatient,
                        resultat_clinique:resultat_clinique,diagnostique:diagnostique,edit:edit,
                        antecedant_medicaux:antecedant_medicaux,
                        antecedant_chirigicale:antecedant_chirigicale,
                        antecedant_familiale:antecedant_familiale,
                        antecedant_autre:antecedant_autre},
                        dataType:'JSON',
                        success:function(data){
                            $('#consultationticket')[0].reset();
                        }
                    })
            }else{
                alert("L'un des champs est vide ")
            }

        })
    })
</script>
</html>