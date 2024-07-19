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
                                    <h4 class="card-title">Add Row</h4>
                                    <a class="btn btn-primary btn-round ml-auto" href="<?=ROOT?>/Symptomes">
                                        <i class="fas fa-plus"></i>
                                        Ajouter
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- Modal ajout de stucture -->
                                <?php $this->view('common/_flash')?>
                                <div class="table-responsive">
                                    <table id="dataTable" class="display table table-striped table-hover" >
                                        <thead>
                                        <tr>

                                            <th>Nom de la maladie</th>
                                            <th>Symptomes</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($symptomes as $symptome) :?>
                                            <tr>

                                                <td><?=$symptome->nom_maladie?></td>
                                                <td><?=$symptome->type_symtome?></td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <a type="button" data-toggle="tooltip" title="" href="<?=ROOT?>/Symptomes/edit/<?=$symptome->num_syptome?>" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
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

</body>
</html>