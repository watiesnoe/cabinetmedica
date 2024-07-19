
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
                                <?php $this->view('common/_flash')?>
                                <form action="" method="post" id="form_submit">

                                    <div class="card card-bordered card-preview">
                                        <div class="card-header bg-blue text-center">
                                            <div class="nk-block-head nk-block-head-sm">
                                                <div class="nk-block-between">
                                                    <div class="nk-block-head-content">
                                                        <h5 class="text-white">Espace de payement d'ordonnance</h5>
                                                    </div><!-- .nk-block-head-content -->
                                                </div><!-- .nk-block-between -->
                                            </div><!-- .nk-block-head -->
                                        </div>
                                        <div class="card-inner">
                                            <?php $this->view('common/_flash')?>
                                            <div class="col-sm-12">
                                                <div class="card card-bordered card-preview">
                                                    <div class="card-header bg-blue ">
                                                        <h5 class="text-white">N° de la facture</h5>
                                                    </div>
                                                    <div class="card-inner">
                                                        <div class="row g-gs">
                                                            <fieldset class="form-group" >

                                                                <select name="vente-input" class="form-control js-example-basic-single  h-25 " id="vente-input" >
                                                                    <option>Open this select menu</option>
                                                                    <?php foreach ($ordonnances as $item) : ?>
                                                                        <option value="<?=$item->num_ordo ?>"><?="Ordonnance N° ".$item->num_ordo?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </fieldset>
                                                        </div><!-- .row -->
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="card card-bordered card-preview ">
                                                    <div class="card-header bg-blue text-center">
                                                        <div class="nk-block-head nk-block-head-sm">
                                                            <div class="nk-block-between">
                                                                <div class="nk-block-head-content">
                                                                    <h6 class="text-white">Choix des medicamants disponibles</h6>
                                                                </div><!-- .nk-block-head-content -->
                                                            </div><!-- .nk-block-between -->

                                                        </div><!-- .nk-block-head -->
                                                    </div>

                                                    <div class="card-inner">
                                                        <div class="row g-gs">
                                                            <table class="table dataTable">
                                                                <thead>
                                                                    <tr class="success">
                                                                        <th>Nom du medicament</th>
                                                                        <th>Posoligie</th>
                                                                        <th>Quantité</th>
                                                                        <th>Prix Unitaire</th>
                                                                        <th>Montant</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td>
                                                                            <input type="text" class="form-control" readonly placeholder=""  id="total">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td>
                                                                            <input type="submit" name="submit"  class="btn btn-success fa-pull-left btn-lg pull-right submit" value="Valider" />
                                                                        </td>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div><!-- .row -->
                                                    </div>

                                                </div>
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
        $('.submit').hide();
        $('#total').hide();
        $('#vente-input').on('change',function () {
            $('.submit').show();
            $('#total').show();
            var medicament = $(this).val();
            $.ajax({
                url:"<?=ROOT?>/selectData_ajax/paiement_ordo",
                method:"POST",
                data:{medicament:medicament},
                dataType:"json",
                success:function(data)
                {
                    var html = '';
                    for(var count = 0; count < data.length; count++)
                    {
                        html += '<tr>';
                        html +='<td>'+data[count].dci+'</td>';
                        html += '<td>'+data[count].posologie+'</td>';
                        html += '<td>'+data[count].quantite_prescite+'</td>';
                        html += '<td>'+data[count].prix_vente+' CFA</td>';
                        html += '<td><input type="hidden" class="form-control prix_total" value="'+data[count].prix_vente*data[count].quantite_prescite+'">'+data[count].prix_vente*data[count].quantite_prescite+' CFA</td>';
                        html += '<td><input type="checkbox" data-dci="'+data[count].dci+'" data-quantite="'+data[count].quantite_prescite+'" data-posologie="'+data[count].posologie+'"  data-ligneVente="'+data[count].id_ligneVente+'" data-prix_total="'+data[count].prix_vente*data[count].quantite_prescite+'" data-prix_pub="'+data[count].prix_vente+'" class="check_box"  id="'+data[count].id_ligneVente+'" data-ordo="'+data[count].num_ordo+'" data-idmedicament="'+data[count].idMedicament+'"/></td>';
                        html += '</tr>'; }

                    $('tbody').html(html);
                    var sum=0;
                    $('.prix_total').each(function () {
                        var num=$(this).val();
                        if (num!==0){
                            sum+=parseFloat(num);
                        }
                    });
                    $("#total").val(sum +' CFA');
                }
            })
        });

        $(document).on('click', '.check_box', function(){
            var html = '';
            if(this.checked)
            {
                html += '<td><input type="hidden" name="dci[]"  readonly class="form-control" value="'+$(this).data("dci")+'" />'+$(this).data("dci")+'</td>';
                html += '<td><input type="hidden" name="posologie[]"  readonly class="form-control" value="'+$(this).data("posologie")+'" />'+$(this).data("posologie")+'</td>';
                html += '<td><input type="hidden" name="quantiteMedi[]" readonly  class="form-control" value="'+$(this).data("quantite")+'" />'+$(this).data("quantite")+'</td>';
                html += '<td><input type="hidden" name="prix_pub[]"  readonly class="form-control" value="'+$(this).data("prix_vente")+'" />' +
                    '<input type="hidden" name="ordo" readonly  class="form-control" value="'+$(this).data("ordo")+'" />'+$(this).data("prix_pub")+' CFA</td>';
                html += '<td><input type="hidden" name="prix_total[]"  readonly class="form-control" value="'+$(this).data("prix_total")+'" />' +
                    '<input type="hidden" name="idmedicament[]"  readonly class="form-control" value="'+$(this).data("idmedicament")+'" />'+$(this).data("prix_total")+' CFA</td>';
                html += '<td><input type="checkbox" data-dci="'+$(this).data('dci')+'" data-quantite="'+$(this).data('quantite')+'" data-posologie="'+$(this).data('posologie')+'"   id="'+$(this).data('ligneVente')+'" data-prix_pub="'+$(this).data('prix_vente')+'" data-prix_total="'+$(this).data('prix_vente')*$(this).data('quantite')+'" class="check_box" checked VALUE="'+$(this).data('idOrdo')+'" data-idmedicament="'+$(this).data('idMedicament')+'"/>' +
                    '<input type="hidden" name="hidden_id[]" value="'+$(this).attr('id')+'" /></td>';
            }else {
                html +='<td>'+$(this).data('dci')+'</td>';
                html += '<td>'+$(this).data('posologie')+'</td>';
                html += '<td>'+$(this).data('quantite')+'</td>';
                html += '<td>'+$(this).data('prix_vente')+ ' CFA</td>';
                html += '<td>'+$(this).data('prix_total')+ ' CFA </td>';
                html += '<td><input type="checkbox" data-dci="'+$(this).data('dci')+'" data-quantite="'+$(this).data('quantite')+'" data-posologie="'+$(this).data('posologie')+'"  data-ligneVente="'+$(this).data('ligneVente')+'" data-prix_pub="'+$(this).data('prix_vente')+'" data-prix_total="'+$(this).data('prix_vente')*$(this).data('quantite')+'" class="check_box"  VALUE="'+$(this).data('idOrdo')+'" data-idmedicament="'+$(this).data('idMedicament')+'"/>' +
                    '<input type="hidden" name="hidden_id[]" value="'+$(this).attr('id')+'" /></td>';
            }
            $(this).closest('tr').html(html);
        });

        $("#form_submit").on('submit',function (event) {
            event.preventDefault();

            if($('.check_box:checked').length > 0)
            {
                $.ajax({
                    url:"<?=ROOT?>/Payement_ord/index",
                    method:"POST",
                    data:$(this).serialize(),
                    dataType:"json",
                    success:function(response)
                    {
                        $('.vente-input').val('');
                        $('#vente-input').before('<div class="container"><div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4>'+response.Vente+'</h4></div></div> <br>')
                    }
                });
                window.setTimeout(function(){location.reload()},2000)
            }
        })
    });

</script>
</body>
</html>