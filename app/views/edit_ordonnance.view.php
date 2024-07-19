
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
                                <form action="" method="post" id="commande_reception">

                                    <div class="card card-bordered card-preview">
                                        <div class="card-header bg-blue text-center">
                                            <div class="nk-block-head nk-block-head-sm">
                                                <div class="nk-block-between">
                                                    <div class="nk-block-head-content">
                                                        <h5 class="text-white">Espace de modification ordonnance</h5>
                                                    </div><!-- .nk-block-head-content -->
                                                </div><!-- .nk-block-between -->
                                            </div><!-- .nk-block-head -->
                                        </div>

                                        <div class="card-inner">
                                            <?php $this->view('common/_flash')?>
                                                <div class="col-sm-12">
                                                    <table class="table datatables table-bordered" >
                                                        <thead>
                                                        <tr class="success">
                                                            <th>Nom du medicament</th>
                                                            <th>Forme et Dosage</th>
                                                            <th>Posoligie</th>
                                                            <th class="col-1">Quantité</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $counter=0; foreach($ordonnances as $ordonnace)  : $counter++ ?>

                                                            <tr>
                                                                <td>
                                                                    <input type="hidden"  class="form-control idOrdonnance" readonly   name="idOrdonnance[]" VALUE="<?= $edit?>" >
                                                                    <input type="hidden"  class="form-control idContenir" readonly  id="idContenir<?=$counter?>" name="idContenir[]" VALUE="<?= $ordonnace->id_ligneVente ?>" placeholder="Forme du Medoc">
                                                                    <select name="idMedicement[]" class="form-control idMedicement" id="idMedicement<?=$counter?>"  data-category="<?=$counter?>">

                                                                        <option value="<?= $ordonnace->id_lot ?>" selected><?= $ordonnace->dci?></option>
                                                                        <?php foreach($medicaments as $medicament) :?>
                                                                            <?php if($medicament->idMedicament!==$ordonnace->idMedicament) : ?>
                                                                                <option value="<?= $medicament->idMedicament ?>"><?= $medicament->dci ?></option>
                                                                            <?php endif; ?>
                                                                        <?php endforeach ?>

                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="text"  class="form-control fomMedic0" readonly  id="fomMedic0<?=$counter?>" name="fomMedic0[]" VALUE="<?= $ordonnace->forme.' '.$ordonnace->dosage ?>" placeholder="Forme du Medoc">
                                                                </td>
                                                                <td>
                                                                    <input type="text"  class="form-control posologie" readonly  id="posologie<?=$counter?>" name="posologie[]" VALUE="<?= $ordonnace->posologie ?>" placeholder="Forme du Medoc">
                                                                </td>
                                                                <td >
                                                                    <input type="text"  class="form-control quantite" id="quantiteMedico<?=$counter?>"  name="quantite[]" value="<?=$ordonnace->quantite_prescite?>" placeholder="La quantité du médicament">
                                                                </td>
                                                            </tr>
                                                        <?php endforeach ?>
                                                        </tbody>
                                                    </table>
                                                    <br>
                                                    <div align="right" class="">
                                                        <input type="submit" name="submit" class="btn btn-info fa-pull-left" value="Modifier" />
                                                    </div>
                                                        
                                                </div>
                                            <div class="col-sm-2 mt-5">

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

    $(document).ready(function(){

        var count=0;
        load_panier_data();
        function load_panier_data()
        {
            $.ajax({
                url:"<?=ROOT?>/Ordonnances/dataselectOrdonnance",
                method:"POST",
                dataType:"json",
                success:function(data)
                {
                    $('#ajout_tbody').html(data);
                }
            });
        }

        $(".js-example-basic-single").select2();

        $("#idMedicament").change(function(){
            var idMedicament=$(this).val();
            count++;
            $.ajax({
                url:'<?=ROOT?>/Ordonnances/select_medicament',
                method:"POST",
                data:{idMedicament:idMedicament},
                success:function(data)
                {
                    $("thead").show();
                   load_panier_data();
                    // window.setTimeout(function(){location.reload()},500)
                }
            });

        });

        $(document).on('click', '.remove', function(){

             var last = $('tbody tr').length;
            var id = $(this).attr("id");

            $.ajax({
                url:"<?=ROOT?>/Ordonnances/unset_ordonnances",
                method:"POST",
                data:{id:id},
                success:function(data)
                {

                    load_panier_data();
                    alert("Item has been removed from Cart");
                }
            })
        });

        $(document).on('click', '.edit_remmove', function(){

            var last = $('tbody tr').length;
            var id = $(this).attr("id");

            $.ajax({
                url:"<?=ROOT?>/Commandes/delete",
                method:"POST",
                data:{id:id},
                success:function(data)
                {
                    alert("Item has been removed from Cart");
                }
            })
        });


    });

</script>
<script>
    $(document).on('change', '.idMedicement', function(){
        var category = $(this).val();
        var sub_category_id = $(this).data('category');

        $.ajax({
            url:"<?=ROOT?>/selectData_ajax/fill_select_box",
            method:"POST",
            data:{category:category},
            dataType:'json',
            success:function(data)
            {
                $('#fomMedic0'+ sub_category_id).val(data.forme +" "+data.dosage);
                $('#voiAdmin'+ sub_category_id).val(data.voiAdmin);
            }
        })
    });

</script>
</body>
</html>