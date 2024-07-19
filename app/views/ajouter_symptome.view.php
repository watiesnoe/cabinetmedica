<!DOCTYPE html>
<html>
<?php $this->view('common/header')?>
<body data-background-color="">
<div class="wrapper">
    <div class="main-header">
        <!-- Logo Header -->

        <!-- End Logo Header -->

        <?php $this->view('common/navbare'); ?>
        <!-- Navbar Header -->


        <!-- End Navbar -->
    </div>

    <!-- Sidebar -->
    <?php $this->view('common/sidebare'); ?>
    <!-- End Sidebar -->



    <!-- contenu principale-->
    <div class="main-panel">

        <div class="content">

            <!-- Row Card No Padding -->

            <div class="page-inner">
                <div class="row">
                    <div class="col-md-3">
                        <?php require_once 'common/cardParametre.view.php' ?>
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Voir la liste des maladies</h4>
                                    <a class="btn btn-primary btn-round ml-auto" href="<?=ROOT?>/Symptomes/liste">
                                        <i class="fas fa-plus"></i>
                                        Lister
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- Modal ajout de salle -->
                                <?php $this->view('common/_flash')?>
                                <form action="" method="post" id="maladieForm">
                                    <?php if (isset($id)) : ?>
                                        <div class="form-group">
                                            <input type="hidden" name="idSyptome" class="form-control " value="<?=$symptomes->num_syptome ?>" >
                                            <input class="form-control symptome" id="symptome" name="symptome" value="<?=$symptomes->type_symtome ?>" >
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="submit" class="btn btn-info fa-pull-right btn-sm " VALUE="Modifier"/>
                                        </div>
                                    <?php else: ?>
                                        <div class="form-group" id="IDnomMaladie">
                                            <label for="">Nom des Symptomes</label>
                                        </div>
                                        <table class="table datatables" >

                                            <thead>
                                                <tr>
                                                    <th width="900px">Les Symptomes</th>
                                                    <th><a href="#" class="addRow btn btn-primary"><i class="fa fa-plus"></i></a></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                            <tfoot>

                                            </tfoot>
                                        </table>
                                        <div class="card-footer">
                                            <div align="left">
                                                <input type="submit" name="submit" class="btn btn-info fa-pull-left" value="Prescrir" />
                                            </div>
                                        </div>
                                    <?php endif ?>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- TimeLine -->
        </div>
        <?php $this->view('common/foot'); ?>
    </div>
    <!-- End Custom template -->
</div>

<!--   Core JS Files   -->
<?php $this->view('common/footer'); ?>
<script type="text/javascript">

    $(document).ready(function(){
        var count=0;

        $("#IDnomMaladie").append('<select name="nomMaladie" class="form-control nomMaladie" id="nomMaladie" ' +
            'data-category_id="'+count+'"><option value="">Nom de la maladie</option><?=$row?></select>');

        $("thead").hide();
        $(".card-footer").hide();

        $("#nomMaladie").change(function(){
            $("thead").show();
            $(".card-footer").show();

            $('tbody tr').remove();
        });

        $('.addRow').on('click', function () {
            count++;
            addRow();
        });

        function addRow() {
            var tr = '<tr>'+
                '<td ><textarea class="form-control symptome" id="symptome'+count+'" name="symptome[]" placeholder="YOUR TEXT"></textarea></td>'+
                '<td><a href="#" class="btn btn-danger remove"><i class="fa fa-trash"></i></a></td>' +
                '</tr>';
            $('tbody').append(tr);
        }
        $(document).on('click', '.remove', function(){
            var last = $('tbody tr').length;
            if (last<=1){
                $('#nomMaladie').prop('selectedIndex',0);
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