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
                            <div class="nk-block">
                                <div class="card">
                                <div class="card-header " style="background-color: #126e80">
                                        <h2 style="color: white;text-align: center"> <b>Réalisation d'une analyse</b></h2>
                                    </div>
                                    <div class="card-aside-wrap" >
                                        
                                       <div class="card-inner card-inner-sm">
                                         <?php $this->view('common/_flash')?> <br>
                                            <div class="card-inner">
                                                
                                                <?php if (isset($idAliste)) : ?>
                                           
                                                    <form method="post" action="">

                                                        <div class="row">
                                                            <div class="col-6">
                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                    <th>Nom et Prenom</th>
                                                                    <th>Analyse demandées</th>
                                                                    </thead>
                                                                    <tbody>
                                                                    <tr>
                                                                        <td><?=$analyse->nom_patient.' '.$analyse->prenom_patient.' '.$analyse->age_patient?></td>

                                                                        <td>
                                                                            <?php foreach ($data_examenPanier as $item) : ?>
                                                                                <?=$item->code_examen?> <br>
                                                                            <?php endforeach; ?>
                                                                        </td>

                                                                    </tr>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="col-6">

                                                                <input type="hidden" class="form-control" name="idAnalyse" id="idAnalysee" value="<?= $idAliste?>">
                                                                <fieldset class="form-group">
                                                                    <label for="">Resulat de la demande</label>
                                                                    <textarea class="form-control" name="resultat" id="resultat" rows="3"><?=$analyse->bilanExamen?></textarea>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div  align="right">
                                                            <button type="submit" class="btn btn-primary" name="submit">Modification</button>
                                                        </div>
                                                    </form>

                                                <?php else : ?>
                                                    <form method="post" action="">

                                                        <div class="row">
                                                            <div class="col-6">
                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                        <th>Nom et Prenom</th>
                                                                        <th>Analyse demandées</th>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><?=$analyse->nom_patient.' '.$analyse->prenom_patient.' '.$analyse->age_patient?></td>

                                                                                <td>
                                                                                    <?php foreach ($data_examenPanier as $item) : ?>
                                                                                      <?=$item->code_examen?> <br>
                                                                                    <?php endforeach; ?>
                                                                                </td>

                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="col-6">
                                                                <input type="hidden" class="form-control" name="idAnalyse" id="idAnalysee" value="<?= $id?>">
                                                                <fieldset class="form-group">
                                                                    <label for="">Resulat de la demande</label>
                                                                    <textarea class="form-control" name="resultat" id="resultat" rows="3"></textarea>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div align="right">
                                                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                                        </div>

                                                    </form>
                                                <?php endif?>
                                            </div>
                                        </div>
                                    </div><!-- .card-aside-wrap -->
                                </div><!-- .card -->
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


