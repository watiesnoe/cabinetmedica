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
                                    <h3 class="nk-block-title page-title">Nouvelle salle</h3>
                                </div><!-- .nk-block-head-content -->
                                <div class="nk-block-head-content">
                                    <div class="toggle-wrap nk-block-tools-toggle">
                                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                        <div class="toggle-expand-content" data-content="pageMenu">
                                            <ul class="nk-block-tools g-3">
                                                
                                                <li class="nk-block-tools-opt"><a href="<?=ROOT?>/Lits/liste" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Ajoiuter</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head-content -->
                            </div><!-- .nk-block-between -->
                            <br>
                            <div class="nk-block">
                                <?php $this->view('common/_flash')?>
                                <div class="row g-gs">
                                    <div class="col-lg-4 col-xl-4 col-xxl-3">
                                        <?php $this->view('common/cardParametre') ?>
                                    </div><!-- .col -->
                                    <div class="col-lg-8 col-xl-8 col-xxl-9">
                                    

                                        <div class="card card-bordered card-preview">
                                            <div class="card-inner">
                                                <form action="" method="post" id="ordonnanceForm">
                                                    <?php if (isset($id)) : ?>
                                                        <div class="form-group">
                                                            <input class="form-control" type="text"  name="nomSalle" value="<?=$salle->code_salle ?>" >
                                                            <input class="form-control"  type="hidden" name="codesalle" value="<?=$salle->num_salle ?>" >
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="submit" name="submit" class="btn btn-info fa-pull-right btn-sm " VALUE="Modifier"/>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="form-group " id="IDnomMaladie">

                                                        </div>
                                                        <table class="table  table-bordered" >
                                                            <thead>
                                                                <tr >
                                                                    <th width="900px">Dénomination de la salle</th>
                                                                    <th  ><a href="#" class="addRow btn btn-primary btn-bg"><i class="fa fa-plus"></i></a></th>
                                                                </tr>
                                                            </thead>
                                                        <tbody>
                                                        </tbody>
                                                            <tfoot>

                                                            </tfoot>
                                                        </table>
    
                                                    <?php endif ?>
                                                    <br>
                                                    <div align="left" class="submit">
                                                         <input type="submit" name="submit" class="btn btn-info fa-pull-right btn-sm " value="Ajouter" />
                                                    </div>
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
        $("thead").hide();
        $(".submit").hide();
        
        var count=0;

        $("#IDnomMaladie").append("<div class='submenu' id='submenu'><select  name='structure' class='form-control structure' id='structure' data-structure='"+count+"'><option>selection</option><?=$row?></select></div>");
        $(document).on('change', '.structure', function(){
            var consultat = $(this).val();
            $.ajax({
                url:"<?=ROOT?>/selectData_ajax/index",
                method:"POST",
                data:{consultat:consultat},
                success:function(data)
                {
                    var input = '';
                    input += data;
                    $('#salle').html(input);

                    $("thead").show();
                    $(".submit").show();

                    $('tbody tr').remove();
                }
            });
        });

        $('.addRow').on('click', function () {
            count++;
            addRow();
        });

        function addRow() {
            var tr = '<tr>'+
                '<td ><input class="form-control salle" id="salle'+count+'" name="nomSalle[]" placeholder="Enregistrer une salle"></td>'+
                '<td><a href="#" class="btn btn-danger btn-sm remove"><i class="fa fa-trash"></i></a></td>' +
                '</tr>';
            $('tbody').append(tr);
        }

        $(document).on('click', '.remove', function(){
            var last = $('tbody tr').length;
            if (last<=1){
                $('#structure').prop('selectedIndex',0);
                $('.salle').prop('selectedIndex',0);
                $(this).closest('tr').remove();
                $("thead").hide();
                $(".submit").hide();

            }else {
                $(this).closest('tr').remove();
            }
        });
   })
</script>
</html>

