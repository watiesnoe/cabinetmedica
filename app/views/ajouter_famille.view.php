<!DOCTYPE html>
<html lang="zxx" >

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
                                    <h3 class="nk-block-title page-title">Espace famille </h3>
                                </div><!-- .nk-block-head-content -->
                                <div class="nk-block-head-content">
                                    <div class="toggle-wrap nk-block-tools-toggle">
                                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                        <div class="toggle-expand-content" data-content="pageMenu">
                                            <ul class="nk-block-tools g-3">

                                                <li class="nk-block-tools-opt"><a href="<?=ROOT?>/Familles/liste" class="btn btn-primary">
                                                        <em class="icon ni ni-eye-alt"></em><span>Voir la liste</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head-content -->
                            </div><!-- .nk-block-between -->
                            <br>
                            <div class="nk-block">
                                <div class="row g-gs">

                                    <div class="col-lg-12 col-xl-12 col-xxl-12">

                                        <?php $this->view('common/_flash')?>

                                        <div class="card card-bordered card-preview">
                                            <div class="card-inner">
                                                <form action="" method="post" id="ordonnanceForm">
                                                    <?php if (isset($id)) : ?>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="" name="nom_famille" value="<?=$famille->nom_famille?>">
                                                            <input type="hidden" class="form-control" id="" name="id_fami" value="<?=$famille->id_fami?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="submit" name="submit" class="btn btn-info fa-pull-right btn-sm " VALUE="Modifier"/>
                                                        </div>
                                                    <?php else: ?>
                                                        <table class="table datatables" >

                                                            <thead>
                                                            <tr >
                                                                <th width="90%">Nom de la famille </th>
                                                                <th  ><a href="#" class="addRow btn btn-primary btn-sm"><i class=" ni ni-plus"></i></a></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                            <tfoot>

                                                            </tfoot>
                                                        </table>
                                                        <div class="submit-footer" style="margin-left: 82%">
                                                            <div align="">
                                                                <input type="submit" name="submit" class="btn btn-info  btn-bg " value="Ajouter" />
                                                            </div>
                                                        </div>
                                                    <?php endif ?>
                                                </form>
                                            </div>
                                        </div>


                                    </div><!-- .col -->
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
</body>
<script type="text/javascript">

    $(document).ready(function(){


        var count=0;
        $(".submit-footer").hide();
        $('.addRow').on('click', function () {
            count++;
            addRow();

        });
        function addRow() {
            var tr = '<tr>'+
                '<td ><input class="form-control nom_famille" id="nom_famille'+count+'" name="nom_famille[]" placeholder="famille de la medicament"></td>'+
                '<td><a href="#" class="btn btn-danger btn-sm remove"><i class=" ni ni-trash"></i></a></td>' +
                '</tr>';
            $('tbody').append(tr);
            $(".submit-footer").show()
        }
        $(document).on('click', '.remove', function(){
            var last = $('tbody tr').length;
            if (last<=1){
                $('#structure').prop('selectedIndex',0);
                $('.salle').prop('selectedIndex',0);
                $(this).closest('tr').remove();
                $(".submit-footer").hide();

            }else {
                $(this).closest('tr').remove();
            }
        });
    })

</script>
</html>

