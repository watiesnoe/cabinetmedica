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
                                                                <input type="hidden"
                                                                    class="form-control" name="edit" id="edit" aria-describedby="helpId" placeholder="" value="<?=$datas->num_consult?>">
                                                           
                                                                    <label for="resultat_clinique">Resultat du bilan de l'examen clinique</label>
                                                                    <textarea name="resultat_clinique" id="resultat_clinique" cols="10" rows="1" class="form-control"><?=$datas->examen_clinic?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="">Diagnostique</label>
                                                                    <textarea name="diagnostique" id="diagnostique" cols="10" rows="1" class="form-control"><?=$datas->resultat_diagnos?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="antecedant_medicaux">Antécédents Medicaux</label>
                                                                    <textarea name="antecedant_medicaux" id="antecedant_medicaux" cols="5" rows="2" class="form-control"><?=$datas->antecedant_medicaux?></textarea>
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
                                                                    <label for="antecedant_chirigicale">Antécédents Chirigicaux</label>
                                                                    <div class="form-control-wrap">
                                                                        <textarea name="antecedant_chirigicale" id="antecedant_chirigicale" cols="5" rows="2" class="form-control"><?=$datas->antecedant_chirigicale?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="antecedant_familiale">Antécdents Familiale</label>
                                                                    <div class="form-control-wrap">
                                                                        <textarea name="antecedant_familiale" id="antecedant_familiale" cols="5" rows="2" class="form-control"><?=$datas->antecedant_familiale?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="antecedant_autre">Autres Antécédénts</label>
                                                                    <div class="form-control-wrap">
                                                                        <textarea name="antecedant_autre" id="antecedant_autre" cols="5" rows="2" class="form-control"><?=$datas->antecedant_autre?></textarea>
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

            var resultat_clinique= $('#resultat_clinique').val();
            var diagnostique= $('#diagnostique').val();
            var antecedant_medicaux= $('#antecedant_medicaux').val();
            var antecedant_chirigicale= $('#antecedant_chirigicale').val();
            var antecedant_familiale= $('#antecedant_familiale').val();
            var antecedant_autre= $('#antecedant_autre').val();
            var edit= $('#edit').val();

            if( edit !=='' &&
             resultat_clinique !== '' && diagnostique!==''){

                // window.setTimeout(location.reload(),6000)
                $.ajax({
                        url:"<?=ROOT?>/Consultations/Store_edit",
                        method:'POST',
                        data:{
                        resultat_clinique:resultat_clinique,diagnostique:diagnostique,edit:edit,
                        antecedant_medicaux:antecedant_medicaux,
                        antecedant_chirigicale:antecedant_chirigicale,
                        antecedant_familiale:antecedant_familiale,
                        antecedant_autre:antecedant_autre},
                        dataType:'JSON',
                        success:function(data){
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: data.Consultation,
                                showConfirmButton: false,
                                timer: 4000
                            });

                        }
                    })
            }else{
                alert("L'un des champs est vide ")
            }

        })
    })
</script>
</html>