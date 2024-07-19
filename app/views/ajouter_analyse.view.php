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
                                    <div class="card-aside-wrap" >
                                       <div class="card-inner card-inner-sm">
                                       <?php $this->view('common/_flash')?> <br>
                                            <div class="card-inner">
                                                <?php 
                                                    if (isset($consults) && count($consults) !== 0) {
                                                        echo '<div class="alert alert  alert-pro alert-danger alert-dismissible" >
                                                        <button class="close" data-bs-dismiss="alert"></button>';
                                                        foreach ($consults as $error) {
                                                            echo $error.'</br>';
                                                        }
                                                        echo '</div>';
                                                    }
                                                ?>
                                                <div class="tab-content">
                                                    <div class="tab-pane active " id="diagnostiques">
                                                        <form method="post" action="">
                                                            <?php if (isset($id)) : ?>
                                                                <div class="row">
                                                                    <div class="col-4">
                                                                        <fieldset class="form-group">
                                                                            <label for="">Patient </label>
                                                                            <select name="patient" id="" class="form-control">
                                                                                <option value="<?=$editAnalyse->num_patient?>">
                                                                                    <?=$editAnalyse->nom_patient.' '.$editAnalyse->prenom_patient.' '.$editAnalyse->telephonepat?>
                                                                                </option>
                                                                            </select>
                                                                        </fieldset>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <fieldset class="form-group">
                                                                            <label for="">Type d'examen</label>
                                                                            <select  id="" class="form-control" name="typeAnalyse">
                                                                                <option value="<?=$editAnalyse->num_examen?>" selected><?=$editAnalyse->code_examen ?></option>

                                                                                <?php foreach($examens as $examen):?>
                                                                                    <?php if($examen->num_examen!==$editAnalyse->num_examen) :?>
                                                                                        <option value="<?=$examen->num_examen?>"><?=$examen->code_examen?></option>
                                                                                    <?php endif; ?>
                                                                                <?php endforeach ?>
                                                                            </select>
                                                                        </fieldset>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <fieldset class="form-group">
                                                                            <label for="">Date de demande</label>
                                                                            <input type="text" class="form-control" name="dateDemande" id="dateDamande" value="<?=$editAnalyse->dateDamande?>" placeholder="date de demande d'analyse">
                                                                            <input type="hidden" class="form-control" name="idAnalyse" id="" value="<?=$id?>" >
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <fieldset class="form-group">
                                                                            <label for="">Motif de demande</label>
                                                                            <textarea class="form-control" name="motif" id="motif" rows="3"><?=$editAnalyse->motif_axamen?></textarea>
                                                                        </fieldset>
                                                                    </div>

                                                                </div>
                                                                <br>
                                                                <div class="form-group" align="right">
                                                                    <button type="submit" class="btn btn-primary fo" name="modifier">Modifier</button>
                                                                </div>
                                                            <?php else: ?>
                                                                <div class="row">
                                                                    <div class="col-4">
                                                                        <fieldset class="form-group">
                                                                            <label for="">Patient </label>
                                                                            <select name="patient" id="" class="form-control">
                                                                                <option value="<?=$patients_actus->idpatient?>">
                                                                                    <?=$patients_actus->nom_patient.' '.$patients_actus->prenom_patient.' '.$patients_actus->telephonepat?>
                                                                                </option>
                                                                                <?php foreach($patients as $patient):?>
                                                                                    <?php if($patients_actus->idpatient!==$patient->num_patient) : ?>
                                                                                        <option value="<?=$patient->num_patient ?>"><?=$patient->nom_patient.' '.$patient->prenom_patient.' '.$patient->telephonepat?></option>
                                                                                    <?php endif ?>
                                                                                <?php endforeach ?>

                                                                            </select>
                                                                        </fieldset>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <fieldset class="form-group">
                                                                            <label for="">Type d'examen</label>
                                                                            <select  id="" class="form-control" name="typeAnalyse">

                                                                                <?php foreach($examens as $examen):?>
                                                                                    <option value="<?=$examen->num_examen?>"><?=$examen->code_examen ?></option>
                                                                                <?php endforeach ?>
                                                                            </select>
                                                                        </fieldset>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <fieldset class="form-group">
                                                                            <label for="">Date de demande</label>
                                                                            <input type="hidden" class="form-control" name="idConsultation" id="idConsultation" placeholder="" value="<?=$idConsultation?>">
                                                                            <input type="date" class="form-control" name="dateDemande" id="dateDamande" placeholder="date de demande d'analyse">
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <fieldset class="form-group">
                                                                            <label for="">Motif de demande</label>
                                                                            <textarea class="form-control" name="motif" id="motif" rows="3"></textarea>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="form-group" align="right">
                                                                    <button type="submit" class="btn btn-primary fo" name="submit">Submit</button>
                                                                </div>
                                                            <?php endif ?>

                                                        </form>
                                                    </div>
                                                </div>
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
