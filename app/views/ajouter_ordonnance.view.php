
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
                                                        <h5 class="text-white">Espace de prescription d'ordonnance</h5>
                                                    </div><!-- .nk-block-head-content -->
                                                </div><!-- .nk-block-between -->
                                            </div><!-- .nk-block-head -->
                                        </div>

                                        <div class="card-inner">
                                            <?php $this->view('common/_flash')?>
                                            <div class="col-sm-12">
                                                <div class="card card-bordered card-preview">
                                                    <div class="card-header bg-blue text-center">

                                                    </div>
                                                    <div class="card-inner">
                                                        <div class="row g-gs">
                                                            <div class="col-4">
                                                                <fieldset class="form-group" >
                                                                    <input TYPE='hidden'  class='form-control idConsultation' VALUE='<?=$id?>' NAME='idConsultation'  id='idConsultation'>
                                                                    <select class="form-select js-select2" NAME="idMedicament" ID="idMedicament" data-search="on">
                                                                        <?=$medicaments ?>
                                                                    </select>
                                                                </fieldset>
                                                            </div>
                                                            <div class="col-md-4">

                                                            </div>
                                                        </div><!-- .row -->
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="card card-bordered card-preview ">
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
                                                            <table class="table  table-bordered" >
                                                                <thead>
                                                                <tr class="success">
                                                                    <th CLASS="col">Nom du medicament</th>
                                                                    <th class="col">Forme et Dosage </th>
                                                                    <th class="col">Posoligie</th>
                                                                    <th class="col">Quantité</th>
                                                                    <th class="">Operation</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody class="ajout_tbody" id="ajout_tbody">

                                                                </tbody>

                                                            </table>
                                                        </div><!-- .row -->
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="pull-right" id="receptionner" align="right">
                                                            <div class="form-group"  align="right">
                                                                <input type='submit'  class='btn  btn-primary  ml-auto enregistrer' name='prescrir' value='Prescription'>
                                                            </div>
                                                        </div>
                                                    </div>
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