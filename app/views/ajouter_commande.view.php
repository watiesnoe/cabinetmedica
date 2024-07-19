
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
                                <h2 class="text-black">Espace commande</h2>
                                <br>
                                <form action="" method="post" id="commande_ajout">
                                    <div class="card card-bordered card-preview">
                                        <div class="card-header bg-blue text-center">
                                            <div class="nk-block-head nk-block-head-sm">
                                                <div class="nk-block-between">
                                                    <div class="nk-block-head-content">
                                                        <h6 class="text-white">Information du Fournisseur</h6>
                                                    </div><!-- .nk-block-head-content -->
                                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalForm">Add Founisseur</button>
                                                
                                                </div><!-- .nk-block-between -->
                                            
                                            </div><!-- .nk-block-head -->
                                        </div>
                                        <div class="card-inner">  
                                            <div class="row g-gs">
                                                <div class="col-xxl-12 col-md-12">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap" >
                                                            <select class='form-select js-select2' data-search='on' id='idFournisseur'>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div><!-- .col -->                                            
                                            </div><!-- .row -->
                                        </div>
                                    </div>
                                    <div class="card card-bordered card-preview">
                                        <div class="card-header bg-blue text-center">
                                            <div class="nk-block-head nk-block-head-sm">
                                                <div class="nk-block-between">
                                                    <div class="nk-block-head-content">
                                                        <h6 class="text-white">Commande Medicament</h6>
                                                    </div><!-- .nk-block-head-content -->
                                                </div><!-- .nk-block-between -->

                                            </div><!-- .nk-block-head -->
                                        </div>
                                        <div class="card-inner">
                                             <div class="row g-gs">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div class="card card-bordered card-preview">
                                                        <div class="card-header  bg-secondary text-center">
                                                            <span class="text-white">Listes des Medicaments du panier</span>
                                                        </div>
                                                        <div class="card-inner">
                                                            <table class="datatable-init table" data-export-title="Export">
                                                                <thead>
                                                                <tr class="nk-tb-item nk-tb-head">
                                                                    <th class="nk-tb-col tb-col-md"><span class="tb-lead">Denommination </span> </th>
                                                                    <th class="nk-tb-col tb-col-md"><span class="tb-lead">Stock </span></th>
                                                                    <th class="nk-tb-col nk-tb-col-check">Selection cmde</th>
                                                                </tr><!-- .nk-tb-item -->
                                                                </thead>
                                                                <tbody>
                                                                <?php foreach ($medicaments as $medicament) : ?>
                                                                    <tr class="nk-tb-item">
                                                                        <td class="nk-tb-col tb-col-sm">
                                                                    <span class="tb-product">
                                                                        <span class="title" style="font-size: 14px;font-weith:bold"><?=$medicament->dci.'<br>'.$medicament->forme.' <br>'.$medicament->dosage?></span>
                                                                    </span>
                                                                        </td>
                                                                        <td class="nk-tb-col tb-col"><span class="tb-lead"><?=$medicament->stock?></span></td>
                                                                        <td class="nk-tb-col nk-tb-col-check">
                                                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                                                <input type="checkbox" class="custom-control-input  commande" name="commande" id="<?=$medicament->idMedicament?>" value="<?=$medicament->idMedicament?>">
                                                                                <label class="custom-control-label" for="<?=$medicament->idMedicament?>"></label>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div class="card">
                                                        <div class="card-header  bg-secondary text-center">
                                                            <span class="text-white">Listes des Medicaments du panier</span>
                                                        </div>
                                                        <div class="card-body  " id="">
                                                            <table class="table table-bordered " >
                                                                <thead>
                                                                <th >Medicaments</th>
                                                                <th width="20%">Qté</th>
                                                                <th>PAchat</th>
                                                                <th width="25%">Montant</th>
                                                                </thead>
                                                                <tbody class="" id="ajout_tbody">
                                                                </tbody>

                                                            </table>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="commande_medica" align="right">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- .col -->
                                            </div><!-- .row -->
                                        </div>
                                        <div class="card-footer">

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
<div class="modal fade" id="modalForm">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="#" class="form-validate is-alter" id="form_fournisseur" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Formulaire du fournisseur</h5>
                        <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <em class="icon ni ni-cross"></em>
                        </a>
                    </div>
                    <div class="modal-body">
                    
                            <div class="form-group">
                                <label class="form-label" for="full-name">Nom et Prenom fournisseur</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="nom_fournisseur" id="nom_fournisseur" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="email-address">Adresse ville</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="adresse_fournisseur" id="adresse_fournisseur" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="phone-no">Telephone</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="telephone_fournisseur" id="telephone_fournisseur">
                                </div>
                            </div>
                    
                    </div>
                    <div class="modal-footer bg-light">
                        <div class="form-group">
                                <button type="submit" class="btn btn-sm btn-primary">Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
        
        </div>
    </div>
<!-- JavaScript -->
<?php $this->view('common/footer') ?>
<script type="text/javascript">
    $(document).ready(function () {
        id_check=$('.commande');
        id=id_check.attr('id');
        // $('.commande_medica').hide();
        $checkAll=$('#commande');
        $('.commande_button').hide();
        // $('#prescrir').hide();

        $('#ajout_tbody').delegate('.quantite,.prix_achat','keyup',function()
        {
            var tr=$(this).parent().parent();
            var quantite=tr.find('.quantite').val();
            var prix_achat=tr.find('.prix_achat').val();

            var amount=(quantite*prix_achat);
            $('#montant_valeur'+$(this).data('id')).val(amount);
            tr.find('.montant').val(amount);
            total();
        });

        function total()
        {
            var total=0;
            $('.montant_valeur').each(function()
            {
                var montant=$(this).val()-0;
                total +=montant;
            });

            $('.total').html(total+ " CFA");

        }
        var count=0;
        load_panier_data();
        function load_panier_data()
        {
            $.ajax({
                url:"<?=ROOT?>/Commandes/dataselectOrdonnance",
                method:"POST",
                dataType:"json",
                success:function(data)
                {
                    $('#ajout_tbody').html(data);
                    total();
                }
            });
        }
        var fournisseur=  function ()
        {
            $.ajax({
                url:"<?=ROOT?>/Fournisseurs/selecte_fournisseur",
                method:"POST",
                dataType:"json",
                success:function(data)
                {
                    $('#idFournisseur').html(data);

                }
            });

        }
        fournisseur();
        id_check.change(function() {
            if ($(this).prop('checked')) {
                idMedicament= $(this).attr('id');
                $.ajax({
                    url:'<?=ROOT?>/Commandes/select_medicament',
                    method:"POST",
                    data:{idMedicament:idMedicament},
                    success:function(data)
                    {
                        load_panier_data();
                        $('.commande_medica').html('<button class="btn btn-success pull-right commander" name="envoyer" type="submit">Commander</button>');
                    }
                });
            }
            else {
                var last = $('#ajout_tbody tr').length;
                var id = $(this).attr("id");
                if(last>2){
                    $.ajax({
                        url:"<?=ROOT?>/Commandes/unset_commande",
                        method:"POST",
                        data:{id:id},
                        success:function(data)
                        {
                            load_panier_data();

                        }
                    })
                }else{
                    $.ajax({
                        url:"<?=ROOT?>/Commandes/unset_commande",
                        method:"POST",
                        data:{id:id},
                        success:function(data)
                        {
                            load_panier_data();
                            $('.commande_medica').html('');
                        }
                    })

                }
            }
        });


        $('#form_fournisseur').on('submit',function (even) {
            even.preventDefault();

            var nom_fournisseur=$('#nom_fournisseur').val();
            var adresse_fournisseur=$('#adresse_fournisseur').val();
            var telephone_fournisseur=$('#telephone_fournisseur').val();

            if(nom_fournisseur!=="" && telephone_fournisseur!==""){
                $.ajax({
                    url:"<?=ROOT?>/Fournisseurs/store",
                    method:'POST',
                    data:{telephone_fournisseur:telephone_fournisseur,adresse_fournisseur:adresse_fournisseur,nom_fournisseur:nom_fournisseur},
                    dataType:'JSON',
                    success:function(data){
                        $('#modalForm').modal('hide');
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: data.Insertion,
                            showConfirmButton: false,
                            timer: 4000
                        });
                        setTimeout(fournisseur, 1000)
                        $('#form_fournisseur')[0].reset();
                    }
                })
            }
        })

        $('#commande_ajout').on('submit',function (even) {
            even.preventDefault();

            var  idFournisseur  =$('#idFournisseur').val();
            var idMedicement=[];
            var quantite=[];
            var prix_achat=[];
            var montant=[];
            var total=0;
            $('.idMedicement').each(function(){
                idMedicement.push($(this).val());
            });
            $('.quantite').each(function(){
                quantite.push($(this).val());
            });
            $('.prix_achat').each(function(){
                prix_achat.push($(this).val());
            });
            $('.montant_valeur').each(function(){

                total +=$(this).val()-0;
            });

            // alert(idMedicement)
            if(idMedicement!=="" && idFournisseur!==""){
                $.ajax({
                    url:"<?=ROOT?>/Commandes/Insertion",
                    method:'POST',
                    data:{idMedicement:idMedicement,quantite:quantite,idFournisseur:idFournisseur,total:total},
                    dataType:'JSON',
                    success:function(data){
                        // alert(data.Commande)
                        $('#commande_ajout')[0].reset();
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: data.Commande,
                            showConfirmButton: false,
                            timer: 3000
                        });

                        // setTimeout(location.reload(),20000)
                    }
                })
                window.setTimeout(function(){location.reload()},3000)
            }else{
                alert("L'un des champ est rapide")
            }

        })

    })
</script>
</body>
</html>
