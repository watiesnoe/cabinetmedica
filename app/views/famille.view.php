
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
                                    <h3 class="nk-block-title page-title">Espace liste des familles</h3>
                                </div><!-- .nk-block-head-content -->
                                <div class="nk-block-head-content">
                                    <div class="toggle-wrap nk-block-tools-toggle">
                                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                        <div class="toggle-expand-content" data-content="pageMenu">
                                            <ul class="nk-block-tools g-3">
                                                
                                                <li class="nk-block-tools-opt"><a href="<?=ROOT?>/Familles" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Ajoiuter</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head-content -->
                            </div><!-- .nk-block-between -->
                            <br>
                            <div class="nk-block">
                                <?php $this->view('common/_flash')?>
                                <br>
                                <br>
                                <br>
                                <div class="row g-gs">
                                    <div class="col-lg-12 col-xl-12 col-xxl-12">

                                        <div class="card card-bordered card-preview">
                                         <div class="card-inner">
                                                <div class="table-responsive">
                                                    <table id="dataTable" class="datatable-init-export nowrap table" >
                                                        <thead>
                                                        <tr>

                                                            <th>Nom de famille</th>
                                                            <th style="width: 15%">Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php foreach($familles as $famille) :?>
                                                            <tr>

                                                                <td><?= $famille->nom_famille ?></td>
                                                                <td>
                                                                    <div class="form-button-action">
                                                                        <a type="button" data-toggle="tooltip" title="" href="<?=ROOT?>/Familles/edit/<?=$famille->id_fami ?>" 
                                                                        class="btn btn-sm btn-warning" data-original-title="Edit Task">
                                                                            <i class="ni ni-edit"></i>
                                                                        </a>
                                                                        <button type="button" data-toggle="tooltip" title="" class="btn btn-sm btn-danger" data-original-title="Remove">
                                                                            <i class="ni ni-trash"></i>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach;?>
                                                        </tbody>
                                                    </table>
                                                    <br>
                                                </div>
                                            </div><!-- .card inner -->

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

</html>


