
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
                                <div class="nk-block">

                                       <form action="" class="prendreticket" method="post" id="prendreticket">
                                           <div class="card">
                                               <div class="card-header">
                                                   <div class="nk-block-between">
                                                       <div class="nk-block-head-content">
                                                           <h3 class="nk-block-title page-title">Espace Ticket</h3>
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

                                                                   </ul>
                                                               </div>
                                                           </div>
                                                       </div><!-- .nk-block-head-content -->
                                                   </div><!-- .nk-block-between -->
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
                                                                       <div class="form-group ">
                                                                           <div class="form-control-wrap">
                                                                               <label class="" for="">Nom</label>
                                                                               <input type="hidden" class="form-control " id="idPatient" name="idPatient" placeholder="" value="<?= $ticket->idPatient ?>">
                                                                               <input type="text" class="form-control " id="nom" name="nom" placeholder="" value="<?= $ticket->nom_patient ?>">
                                                                           </div>
                                                                       </div>
                                                                       <div class="form-group ">
                                                                           <div class="form-control-wrap">
                                                                               <label class="" for="">Prenom</label>
                                                                               <input type="text" class="form-control " id="prenom" name="prenom" placeholder="" value="<?=$ticket->prenom_patient?>">
                                                                           </div>
                                                                       </div>
                                                                       <div class="form-group ">
                                                                           <div class="form-control-wrap">
                                                                               <label class="" for="">Age </label>
                                                                               <input type="text" class="form-control " id="age" name="age" placeholder="" value="<?=$ticket->age_patient?>">
                                                                           </div>
                                                                       </div>
                                                                       <div class="form-group ">
                                                                           <div class="form-control-wrap">
                                                                               <label class="" for="">Téléphone </label>
                                                                               <input type="text" class="form-control " id="telephone" name="telephone" placeholder="" value="<?=$ticket->telephonepat?>">
                                                                           </div>
                                                                       </div>
                                                                       <div class="form-group ">
                                                                           <div class="form-control-wrap">
                                                                               <label class="" for="">Genre</label>
                                                                               <select class="form-control" id="genre" name="genre">
                                                                                   <option value="F"<?php echo $ticket->genre==='F'?"selected":""?>>Feminin</option>
                                                                                   <option value="M"<?php echo $ticket->genre==='M'?"selected":""?>>Masculin</option>
                                                                               </select>
                                                                           </div>
                                                                       </div>
                                                                       <div class="form-group ">
                                                                           <div class="form-control-wrap">
                                                                               <label class="" for="">Ethnie</label>
                                                                               <input type="text" class="form-control " id="ethnie" name="ethnie" placeholder="" value="<?=$ticket->ethnie?>">
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
                                                                       <div class="form-control-wrap">
                                                                           <div class="form-group">
                                                                               <label class="form-label" for="">Type de ticket</label>
                                                                               <select class="form-control  typeticket" name="typeticket" id="typeticket">
                                                                                   <option></option>
                                                                                   <option value="consultation"<?php echo $ticket->type_ticket==='consultation'?"selected":""?>>Consultation</option>
                                                                                   <option value="analyse"<?php echo $ticket->type_ticket==='analyse'?"selected":""?>>Analyse</option>
                                                                               </select>
                                                                           </div>
                                                                       </div>
                                                                   </div>
                                                               </div>
                                                           </div><!-- .card-preview -->

                                                           <?php if ($ticket->type_ticket==='consultation'): ?>
                                                               <div class="card card-bordered card-preview mt-1">
                                                                   <div class="card-header bg-secondary">

                                                                   </div>
                                                                   <div class="card-inner">
                                                                       <div class="row">
                                                                           <div class="form-group col-sm-6">
                                                                               <div class="form-control-wrap">
                                                                                   <label class="" for="">Motif</label>
                                                                                   <input type="text" class="form-control motif" id="motif" name="motif" placeholder="" value="<?=$ticket->motif_ticket ?>">
                                                                                   <input type="hidden" class="form-control " id="idTicket" name="idTicket" placeholder="" value="<?=$ticket->num_ticket ?>">
                                                                               </div>
                                                                           </div>
                                                                           <div class="form-group col-sm-6">
                                                                               <div class="form-control-wrap">
                                                                                   <label class="" for="">Service</label>
                                                                                   <select id="service" class="form-control service" name="service" >
                                                                                       <?php  foreach ( $structures as $item) :?>
                                                                                           <option value="<?=$item->num_structure?>" <?= $ticket->codeStructure===$item->num_structure?"selected":""?>> <?= $item->nom_structure?></option>
                                                                                       <?php endforeach; ?>
                                                                                   </select>
                                                                               </div>

                                                                           </div>

                                                                           <div class="form-group col-sm-6">
                                                                               <div class="form-control-wrap">
                                                                                   <label class="" for="">Sécurite</label>
                                                                                   <select id="securite" class="form-control" name="securite">
                                                                                       <option ></option>
                                                                                       <?php
                                                                                       foreach ($securites  as $items)  :?>
                                                                                           <option value="<?=$items->idSecurite?>" <?= $ticket->idsecurite===$items->idSecurite ?"selected":""?>><?=$items->nom_societe.' ( '.$items->pourcentage_montant.'% )' ?></option>

                                                                                       <?php endforeach; ?>
                                                                                     </select>
                                                                               </div>
                                                                           </div>
                                                                           <div class="form-group col-sm-6">
                                                                               <div class="form-control-wrap">
                                                                                   <label class="" for="">Frais</label>
                                                                                   <input type="text" class="form-control " id="frais" name="frais" placeholder="" value="<?=$ticket->frais?>">
                                                                               </div>
                                                                           </div>
                                                                       </div>
                                                                   </div>
                                                               </div>
                                                           <?php else : ?>
                                                               <div class="card card-bordered card-preview mt-3">
                                                                   <div class="card-header bg-secondary">

                                                                   </div>
                                                                   <div class="card-inner">
                                                                       <div class="row">
                                                                           <div class="form-group col-sm-6">
                                                                               <div class="form-control-wrap">
                                                                                   <label class="" for="">Motif</label>
                                                                                   <input type="text" class="form-control motif" id="motif" name="motif" placeholder="" value="<?=$ticket->motif_ticket ?>">
                                                                                   <input type="hidden" class="form-control " id="idTicket" name="idTicket" placeholder="" value="<?=$ticket->num_ticket ?>">
                                                                               </div>
                                                                           </div>
                                                                           <div class="form-group col-sm-6">
                                                                               <div class="form-control-wrap">
                                                                                   <label class="" for="">Service</label>
                                                                                   <select id="service" class="form-control service" name="service">';
                                                                                     <?php  foreach ( $structures as $item) :?>
                                                                                       <option value="<?=$item->num_structure?>" <?= $ticket->codeStructure===$item->num_structure?"selected":""?>> <?= $item->nom_structure?></option>
                                                                                     <?php endforeach; ?>
                                                                                   </select>
                                                                               </div>

                                                                           </div>
                                                                    
                                                                           <div class="form-group col-sm-6">
                                                                               <div class="form-control-wrap">
                                                                                   <label class="" for="">Sécurite</label>
                                                                                   <select id="securite" class="form-control" name="securite">
                                                                                       <option ></option>
                                                                                       <?php
                                                                                       foreach ($securites  as $items)  :?>
                                                                                           <option value="<?=$items->idSecurite?>" <?= $ticket->idsecurite===$items->idSecurite ?"selected":""?>><?=$items->nom_societe.' ( '.$items->pourcentage_montant.'% )' ?></option>

                                                                                       <?php endforeach; ?>
                                                                                   </select>
                                                                               </div>

                                                                           </div>
                                                                           <div class="form-group col-sm-6">
                                                                               <div class="form-control-wrap">
                                                                                   <label class="" for="">Frais</label>
                                                                                   <input type="text" class="form-control " id="frais_analyse" name="frais_analyse" readonly="readonly" placeholder="" value="<?=$ticket->frais?>">
                                                                               </div>
                                                                           </div>
                                                                       </div>
                                                                   </div>
                                                               </div>
                                                               <div class="card card-bordered card-preview card-analyse mt-4">
                                                                   <div class="card-header bg-secondary">
                                                                       <div class="" align="right">
                                                                           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTop">Selection des Analyses</button>
                                                                       </div>
                                                                   </div>
                                                                   <div class="card-inner">
                                                                       <div class="card-body table">
                                                                           <table class="table table border-2">
                                                                               <thead>
                                                                               <th width="80%">Type analyse </th>
                                                                               <th width="20%">Prix d'analyse</th>
                                                                               </thead>
                                                                               <tbody class="tbody">
                                                                                    <?php $total=0; foreach ($datapanier as $axamen):  $total+=$axamen->prix_axamen ?>
                                                                                    <tr>
                                                                                        <td><input type='hidden' id='examen_tableau' class='examen_tableau' value='<?=$axamen->num_examen?>'>
                                                                                        <input type='hidden' id='numDemanceExamen' class='numDemanceExamen' value='<?=$axamen->numDemanceExamen?>'>
                                                                                        <?=$axamen->nom_examen?> (<?=$axamen->code_examen ?>)</td>
                                                                                        <td><?=$axamen->prix_axamen?>  FCFA</td>
                                                                                    </tr>
                                                                                    <?php endforeach ?>
                                                                                   <tr>
                                                                                       <td class='text-bg-dark text-center'>Total</td>
                                                                                       <td> <input type='hidden' value='<?=$total?>' name='total' class='total' id='total'><?=$total?> FCFA</td>
                                                                                   </tr>
                                                                               </tbody>
                                                                           </table>
                                                                       </div>
                                                                   </div>
                                                               </div>
                                                           <?php endif ?>
                                                           <!-- .card-preview -->
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="card-footer">
                                                    <div class="pull-right" align="right">
                                                        <button class="btn btn-success pull-right prendreticket" name="modifier" type="submit">Modifier </button>
                                                    </div>
                                               </div>
                                           </div>
                                       </form>
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
    <div class="modal fade" tabindex="-1" id="modalTop">
        <div class="modal-dialog modal-dialog-top" role="document">
            <div class="modal-content">
                <form action="" method="post" class="ajouter" id="ajouter">
                    <div class="modal-header">
                        <h5 class="modal-title">Selection des Analyses </h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <?php foreach ($examens as $demande): ?>

                                    <div class="flex-wrap">
                                        <div class="col-sm-4">
                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                <?php if(in_array($demande->num_examen,$data)) :?>
                                                    <input type="checkbox" class="custom-control-input examemCheck" name="examemCheck" checked id="<?=$demande->num_examen?>" value="<?=$demande->num_examen?>">
                                                    <label class="custom-control-label" for="<?=$demande->num_examen?>"><?=$demande->code_examen?></label>
                                                <?php else: ?>
                                                    <input type="checkbox" class="custom-control-input examemCheck" name="examemCheck"  id="<?=$demande->num_examen?>" value="<?=$demande->num_examen?>">
                                                    <label class="custom-control-label" for="<?=$demande->num_examen?>"><?=$demande->code_examen?></label>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                            <?php endforeach; ?>
                        </div>

                    </div>
                    <div class="modal-footer bg-light">
                        <button type="submit" class="btn btn-primary ajouter">Ajouter</button>
                        <a href="#" class="btn  btn-mw btn-danger" data-bs-dismiss="modal">Annuler</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- JavaScript -->
    <?php $this->view('common/footer') ?>
</body>
<script>
    $(document).ready(function(){
        var count=0;
        jQuery('#typeticket').change(function() {
            var typeTicket=$(this).val();

            $.ajax({
                url:"<?=ROOT?>/selectData_ajax/Ticketselect",
                method:'POST',
                data:{typeTicket:typeTicket},
                dataType:'JSON',
                success:function(data){

                    $('.analyse_ajax').html(data.analyse)
                }
            })

        });
        jQuery('#examemCheck').change(function() {
            var typeTicket=$(this).val();

            //$.ajax({
            //    url:"<?//=ROOT?>///selectData_ajax/Ticketselect",
            //    method:'POST',
            //    data:{typeTicket:typeTicket},
            //    dataType:'JSON',
            //    success:function(data){
            //
            //        $('.analyse_ajax').html(data.analyse);
            //
            //    }
            //})

        });

        var ckecked=function () {
            even.preventDefault();
            var examem =[];

            $('.examemCheck').each(function(){
                if($(this).is(":checked"))
                {
                    examem.push($(this).val());
                }
            });
        }
        $('#ajouter').submit(function (even) {
            even.preventDefault();
            var examem =[];

            $('.examemCheck').each(function(){
                if($(this).is(":checked"))
                {
                    examem.push($(this).val());
                }
            });

            if(examem!==''){
                $.ajax({
                    url:"<?=ROOT?>/selectData_ajax/Ticket_select",
                    method:'POST',
                    data:{examem:examem},
                    dataType:'JSON',
                    success:function(data){

                        $('#modalTop').modal('hide');
                        $('.tbody').html(data.analyse);
                        var  total =$('#total').val();
                        var  frais_analyse =$('#frais_analyse').val(total);
                    }
                })
            }
        });

        $('#prendreticket').on('submit',function (even) {
            even.preventDefault();

            //securite frais_analyse securite dateTicket nom prenom age genre ethnie typeticket
            var  examens=[];
            var  numDemanceExamen=[];
            var  securite  =$('#securite').val();
            var  service  =$('#service').val();
            var  frais =$('#frais').val();
            var  telephone =$('#telephone').val();
            var  nom =$('#nom').val();
            var  prenom  =$('#prenom').val();
            var  age  =$('#age').val();
            var idPatient=$('#idPatient').val();
            var idTicket=$('#idTicket').val();
            var  genre =$('#genre').val();
            var  ethnie =$('#ethnie').val();
            var  typeticket =$('#typeticket').val();
            var  motif =$('#motif').val();
            var  total =$('#total').val();
            var  frais_analyse =$('#frais_analyse').val();

            $('.examen_tableau').each(function(){
                examens.push($(this).val());
            });

            // $('.numDemanceExamen').each(function(){
            //     numDemanceExamen.push($(this).val());
            // });

            if(telephone!=="" && nom!=="" && prenom!=="" && age!=="" && genre!=="" && ethnie!=="" && typeticket!==""){
                if(typeticket==='analyse'){
                    $.ajax({
                        url:"<?=ROOT?>/Tickets/editSotre",
                        method:'POST',
                        data:{typeticket:typeticket,idPatient:idPatient,
                            idTicket:idTicket,telephone:telephone,nom:nom,service:service,prenom:prenom,motif:motif,examens:examens,
                            age:age, genre:genre,ethnie:ethnie,frais_analyse:frais_analyse,securite:securite},
                        dataType:'JSON',
                        success:function(data){
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: data.Modification,
                                showConfirmButton: false,
                                timer: 4000
                            });
                        }
                    })
                }else {
                    $.ajax({
                        url:"<?=ROOT?>/Tickets/editSotre",
                        method:'POST',
                        data:{typeticket:typeticket,telephone:telephone,idPatient:idPatient,
                            idTicket:idTicket,nom:nom,service:service,prenom:prenom,motif:motif,
                            age:age,genre:genre,ethnie:ethnie,frais:frais,securite:securite},
                        dataType:'JSON',
                        success:function(data){
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title:data.Modification,
                                showConfirmButton: false,
                                timer:4000
                            });
                            // $('#prendreticket').location.reload();
                        }
                    });
                    // window.setTimeout(location.reload(),15000)
                }
                // location.reload()
            }else{
                alert("L'un des champs est vide ")
            }
        })
    });
</script>

</html>