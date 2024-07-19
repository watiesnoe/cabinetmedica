
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
                                        <form action="" method="post" id="ordonnanceForm">
                                            <?php if (isset($id)) : ?>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="" name="lit" value="<?=$lits->nom_lit?>">
                                                    <input type="hidden" class="form-control" id="" name="id_lit" value="<?=$lits->num_lit?>">
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" name="submit" class="btn btn-info fa-pull-right btn-sm " VALUE="Modifier"/>
                                                </div>
                                            <?php else: ?>
                                                <div class="form-group row" id="IDnomMaladie">

                                                </div>
                                                <div class="card">
                                                    <table class="table " >
                                                        <thead>
                                                            <tr >
                                                                <th width="900px">ID de lit</th>
                                                                <th  ><a href="#" class="addRow btn btn-primary btn-sm"><i class="fa fa-plus"></i></a></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                        <tfoot>

                                                        </tfoot>
                                                    </table>
                                                    <div class="card-footer">
                                                        <div align="left">
                                                            <input type="submit" name="submit" class="btn btn-info fa-pull-right btn-sm " value="Ajouter" />
                                                        </div>
                                                    </div>
                                               
                                                </div>
                                                
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

    $(document).ready(function(){
            
        $("thead").hide();
        $(".card-footer").hide();
        var count=0;

       $("#IDnomMaladie").append("<div class='col-lg-6 submenu form-group' id='submenu'><select name='structure' class='form-control structure' id='structure' data-category_id="+count+"><option value=''>Selectionner Structure</option><?=$row?></select></div><div class='col-lg-6 submenu form-group' ><select name='nomSalle' class='form-control salle' id='salle' ></select></div>");

    

        $(".structure").on('change', function(){
            var consultat = $(this).val();
            $.ajax({
                url:"<?=ROOT?>/selectData_ajax/index",
                method:"POST",
                data:{consultat:consultat},
                success:function(data)
                {
                    var input = '<option value="">Select Sub Category</option>';
                    input += data;
                    $('#salle').html(input);

                    $("thead").show();
                    $(".card-footer").show();

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
                '<td ><input class="form-control lit" id="lit'+count+'" name="lit[]" placeholder="indentification de votre lit"></td>'+
                '<td><a href="#" class="btn btn-danger btn-sm remove"><i class="fa fa-trash"></i></a></td>' +
                '</tr>';
            $('tbody').append(tr);
        }

        $(".remove").on('click', function(){
            var last = $('tbody tr').length;
            if (last<=1){
                $('#structure').prop('selectedIndex',0);
                $('.salle').prop('selectedIndex',0);
                $(this).closest('tr').remove();
                $("thead").hide();
                $(".card-footer").hide();

            }else {
                $(this).closest('tr').remove();
            }
        });
       
    })

    
</script>
</body>
      
</html>
