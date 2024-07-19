
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
                                <form action="" method="post" id="commande_reception">
                                    <div class="card card-bordered card-preview">
                                        <div class="card-header bg-blue text-center">
                                            <div class="nk-block-head nk-block-head-sm">
                                                <div class="nk-block-between">
                                                    <div class="nk-block-head-content">
                                                        <h6 class="text-white">Information de la commande</h6>
                                                    </div><!-- .nk-block-head-content -->
                                                </div><!-- .nk-block-between -->
                                            </div><!-- .nk-block-head -->
                                        </div>
                                        <div class="card-inner">  
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <div class="form-control-wrap">
                                                        <label class="" for="">Date Recption</label>
                                                        <input type="text" class="form-control" id="date_reception" name="date_reception" placeholder="" readonly value="<?=date('Y-m-d')?>">
                                                    </div>
                                                </div>
<!--                                                <div class="form-group col-sm-4">-->
<!--                                                    <div class="form-control-wrap">-->
<!--                                                        <label class="" for="">Reference commande</label>-->
<!--                                                        <input type="text" class="form-control-sm" id="refecetion" name="refecetion" placeholder="" value="">-->
<!--                                                    </div>-->
<!--                                                </div>  -->
                                                <div class="form-group col-sm-6">
                                                    <div class="form-control-wrap">
                                                        <label class="" for="">Forunisseur</label> <br>
                                                        <input type="text" class="form-control" id="fournisseur" name="fournisseur"  readonly placeholder="" value="">
                                                        <input type="hidden" class="form-control" id="idcommande" name="idcommande"  readonly placeholder="" value="">
                                                    </div>
                                                </div>                                         
                                            </div><!-- .row -->
                                        </div>
                                    </div>
                                    <div class="card card-bordered card-preview">
                                        <div class="card-header bg-blue text-center">
                                            <div class="nk-block-head nk-block-head-sm">
                                                <div class="nk-block-between">
                                                    <div class="nk-block-head-content">
                                                        <h6 class="text-white">Selection de la commande</h6>
                                                    </div><!-- .nk-block-head-content -->
                                                </div><!-- .nk-block-between -->
                                            
                                            </div><!-- .nk-block-head -->
                                        </div>
                                        <div class="card-inner">  
                                             <div class="row g-gs">
                                                 <div class="form-control-wrap">
                                                    <select class=" js-select2" data-search="on" id='reception-input'>
                                                        <option value=""></option>
                                                        <?php foreach ($receptions as $item) : ?>
                                                            <option value="<?=$item->num_commande?>"><?='REFERENCE-CMD-'.$item->date_comande.'-'.$item->num_commande ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>                                                                             
                                            </div><!-- .row -->
                                        </div>
                                    </div>
                                    <div class="card card-bordered card-preview">
                                        <div class="card-header bg-blue text-center">
                                            <div class="nk-block-head nk-block-head-sm">
                                                <div class="nk-block-between">
                                                    <div class="nk-block-head-content">
                                                        <h6 class="text-white">Information Reception</h6>
                                                    </div><!-- .nk-block-head-content -->
                                                </div><!-- .nk-block-between -->
                                            
                                            </div><!-- .nk-block-head -->
                                        </div>
                                        <div class="card-inner">  
                                            <div class="row g-gs">
                                                <table id="dataTable" class="display table table-bordered4 table-hover" >
                                                    <thead>
                                                        <tr>
                                                            <th width="30%">Denommination </th>
                                                            <th>Stock</th>
                                                            <th>Qte CMDEE</th>
                                                            <th>QTE RECU</th>
                                                            <th>Qté restant</th>
                                                            <th width="20%">Réception actuelle</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       
                                                    </tbody>
                                                </table>                           
                                            </div><!-- .row -->
                                        </div>
                                        <div class="card-footer">
                                            <div class="pull-right" id="receptionner" align="right">

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
  
<!-- JavaScript -->
<?php $this->view('common/footer') ?>
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on("keyup",'.quantite_actuel',function() {
           var recu=$(this).data('recu');
           var quantite_actuelle=$(this).val();
           var qt_restant=$(this).data('qt_restant');
           var qte_commande=$(this).data('qte_commande');

          if(recu!==0 && qt_restant ){
              if(quantite_actuelle>qt_restant){
                  $('#receptionner').html('');
              }else {
                  $('#receptionner').html(' <button class="btn btn-success pull-right button_reception" name="envoyer" type="submit">Receptionner</button>');
              }
          }else {
              if(quantite_actuelle>qte_commande){
                  $('#receptionner').html('');
              }else {
                  $('#receptionner').html(' <button class="btn btn-success pull-right button_reception" name="envoyer" type="submit">Receptionner</button>');
              }
          }
        });

        $('#reception-input').on('change',function () {

            var idCommande = $(this).val();
            // alert(idCommande)
            $.ajax({
                url:"<?=ROOT?>/selectData_ajax/select_reception",
                method:"POST",
                data:{idCommande:idCommande},
                dataType:"json",
                success:function(data)
                {
                    var html = '';
                    for(var count = 0; count < data.commandes.length; count++)
                    {
                       if(data.commandes[count].qt_recu<data.commandes[count].qte_commande){
                           html += '<tr >';
                           html +='<td><input type="hidden" name="idMedicament" class="form-control idMedicement" data-quantite="" value="'+data.commandes[count].idMedicament+'">'+data.commandes[count].dci+'</td>';
                           html +='<td>'+data.commandes[count].stock+'</td>';
                           html +='<td>'+data.commandes[count].qte_commande+'</td>';
                           html +='<td>'+data.commandes[count].qt_recu+'</td>';
                           html +='<td>'+data.commandes[count].qt_restant+'</td>';
                           html +='<td class="tache"><input  type="text" name="quantite_actuel" data-qt_restant="'+data.commandes[count].qt_restant+'" data-qte_commande="'+data.commandes[count].qte_commande+'" data-recu="'+data.commandes[count].qt_recu+'"  data-id="'+data.commandes[count].idMedicament+'" data-conter="'+count+'" data-idMedicament="'+data.commandes[count].idMedicament+'"  id="quantite_actuel'+count+'" class="form-control quantite_actuel" value=""></td>';
                           html += '</tr>';
                       }
                     }
                    // alert(data)
                    $('tbody').html(html);
                    $('#fournisseur').val(data.fournisseur);
                    $('#idcommande').val(data.idcommande);
                    // $('#receptionner').html('<button class="btn btn-success pull-right button_reception" name="envoyer" type="submit">Receptionner</button>');
                } 
            })
        });

        $('#commande_reception').on('submit',function (even) {
            even.preventDefault();

            var idMedicement=[];
            var quantite_actuel=[];
            var idcommande=$('#idcommande').val();
            $('.quantite_actuel').each(function(){
                quantite_actuel.push($(this).val());
                idMedicement.push($(this).data('id'));
            });
           
            // alert(idMedicement+" "+ quantite_actuel);
            if(idMedicement!=="" && idcommande!==""){
                $.ajax({
                    url:"<?=ROOT?>/Receptions/Insertion",
                    method:'POST',
                    data:{idMedicement:idMedicement,quantite_actuel:quantite_actuel,idcommande:idcommande},
                    dataType:'JSON',
                    success:function(data){
                        // alert(data.reception)
                        $('#commande_reception')[0].reset();
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: data.reception,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        // setTimeout(location.reload(),20000)
                    }
                })
                //    window.setTimeout(location.reload(),10000)
                window.setTimeout(function(){location.reload()},3000)
            }else{
                alert("L'un des champ est rapide")
            }
        })
    })
</script>
</body>
</html>
