
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
                                        <div class="card">
                                        <?php $this->view('common/_flash')?>
                                            <div class="card-inner">
                                                <table id="dataTable" class="datatable-init table" >
                                                    <thead>
                                                    <tr>
                                                        <th>Nom de la structure</th>
                                                        <th>Salles</th>
                                                        <th>N° de lit</th>
                                                        <th style="width: 15%">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($lits as $lit) :?>
                                                            <?php foreach($salles as $salle) :?>
                                                                <?php foreach($structures as $structure) :?>
                                                                <?php if($lit->num_salle===$salle->num_salle and $salle->num_structure===$structure->num_structure) :?>
                                                                        <tr>
                                                                            <td><?= $structure->nom_structure?></td>
                                                                            <td><?=$salle->code_salle?></td>
                                                                            <td><?= $lit->nom_lit?></td>
                                                                            <td>
                                                                                <div class="form-button-action">
                                                                                    <a type="button" data-toggle="tooltip" title="" href="<?=ROOT?>/Lits/edit/<?=$lit->num_lit?>" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                                                        <i class="fa fa-edit"></i>
                                                                                    </a>
                                                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                                                                        <i class="fa fa-times"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    <?php endif;?>
                                                                <?php endforeach;?>
                                                            <?php endforeach;?>
                                                        <?php endforeach;?>
                                                    </tbody>
                                                </table>
                                            </div><!-- .card inner -->
                                        </div><!-- .card -->
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