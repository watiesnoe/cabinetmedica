
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
            <?php $this->view('common/navbare') ?>
            <!-- main header @e -->
            <!-- content @s -->

            <!-- content @e -->
            <!-- footer @s -->
            <div class="nk-content ">
                <div class="container-fluid">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            <div class="nk-block-between">
                                <div class="nk-block-head-content">
                                    <h3 class="nk-block-title page-title">Dashboard</h3>
                                </div><!-- .nk-block-head-content -->
                                <div class="nk-block-head-content">
                                    <div class="toggle-wrap nk-block-tools-toggle">
                                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                        <div class="toggle-expand-content" data-content="pageMenu">
                                            <ul class="nk-block-tools g-3">
                                                
                                                <li class="nk-block-tools-opt"><a href="<?=ROOT?>/Lits" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Ajoiuter</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head-content -->
                            </div><!-- .nk-block-between -->
                            <br>
                            <div class="nk-block">
                                <div class="row g-gs">
                                    <div class="col-lg-4 col-xl-4 col-xxl-3">
                                        <?php $this->view('common/cardParametre') ?>
                                    </div><!-- .col -->
                                    <div class="col-lg-8 col-xl-8 col-xxl-9">
                                        
                                        <!-- Modal ajout de salle -->
                                        <?php $this->view('common/_flash')?>
                                        <br>
                                        <form action="" method="post" id="maladieForm">
                                            <?php if (isset($id)) : ?>


                                                <div class="form-group">
                                                    <input type="hidden"  class="form-control idMaladie" name="idMaladie" required placeholder="Nom de la maladie" value="<?=$maladie->num_maladie ?>">
                                                    <input type="text"  class="form-control nomMaladie" name="nomMaladie" required placeholder="Nom de la maladie" value="<?=$maladie->nom_maladie ?>">
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" name="submit" class="btn btn-info fa-pull-right btn-sm " VALUE="Modifier"/>
                                                </div>


                                            <?php else: ?>
                                            <table class="table datatables" >
                                                <thead>
                                                <tr class="success " >
                                                    <th class="">Nom de la Maladie</th>
                                                    <th></th>
                                                    <th ><a href="#" class="addRow btn btn-primary btn-sm "><i class="fa fa-plus"></i></a></th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td ><input type="submit" class="btn btn-success  btn-sm pull-right  enregistrer" name="enregistrer" value="Enregistrer"></td>
                                                </tr>
                                                </tfoot>
                                            </table>
                                    <?php endif ?>
                                </form>
                                    </div>
                                </div><!-- .row -->
                            </div><!-- .nk-block -->
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
<script type="text/javascript">
    var count=0;
    $('.enregistrer').hide();

    $('.addRow').on('click', function () {
        count++;

        addRow();
        var conter=count++;
        $('.enregistrer').show();
    });

    function addRow() {

        var tr = '<tr>'+

            '<td class="col-12"><input type="text"  class="form-control nomMaladie pull-right" name="nomMaladie[]"  placeholder="Nom de la maladie"></td><td></td>'+
            '<td><a class="btn btn-danger btn-sm remove"><i class="fa fa-trash"></i></a></td>' +
            '</tr>';
        $('tbody').append(tr);

    }
    
    $(document).on('click', '.remove', function(){
        var last = $('tbody tr').length;
        if (last<=1){
            $('.c-select').prop('selectedIndex',0);
            $(this).closest('tr').remove();
            $('.enregistrer').hide();
        }else {
            count--;
            $(this).closest('tr').remove();
        }
    });
</script>
</body>
      
</html>






