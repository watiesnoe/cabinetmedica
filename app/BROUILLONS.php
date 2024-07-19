<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 20/03/2023
 * Time: 13:15
 */
<?php  if(isset($edit)): ?>
    <?php foreach ($consultations as $consultation): ?>
     <?php if($datas->num_ticket===$consultation->num_ticket) :?>
        <div class='row g-gs'>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="motif_consultation">Motif de la consultation</label>
                    <textarea name="motif_consultation" id="motif_consultation" cols="10" rows="5" class="form-control"><?=$consultation->motif_consult ?></textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Diagnostique</label>
                    <textarea name="diagnostique" id="diagnostique" cols="10" rows="5" class="form-control"><?=$consultation->resultat_diagnos ?></textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="resultat_clinique">Resultat du bilan de l'examen clinique</label>
                    <textarea name="resultat_clinique" id="resultat_clinique" cols="10" rows="5" class="form-control"><?=$consultation-> examen_clinic?></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="antecedant_medicaux">Antécédents Medicaux</label>
                    <textarea name="antecedant_medicaux" id="antecedant_medicaux" cols="10" rows="5" class="form-control"><?=$consultation->antecedant_medicaux ?></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="antecedant_chirigicale">Antécédents Chirigicaux</label>
                    <div class="form-control-wrap">
                        <textarea name="antecedant_chirigicale" id="antecedant_chirigicale" cols="10" rows="5" class="form-control"><?=$consultation->antecedant_chirigicale ?></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="antecedant_familiale">Antécdents Familiale</label>
                    <div class="form-control-wrap">
                        <textarea name="antecedant_familiale" id="antecedant_familiale" cols="10" rows="5" class="form-control"><?=$consultation->antecedant_familiale ?></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="antecedant_autre">Autres Antécédénts</label>
                    <div class="form-control-wrap">
                        <textarea name="antecedant_autre" id="antecedant_autre" cols="10" rows="5" class="form-control"><?=$consultation->antecedant_autre ?></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group"  align="right">
                    <button type="submit" class="btn btn-lg btn-primary" name="modifier" id="envoyer">Save Informations</button>
                </div>
            </div>
        </div>
     <?php endif; ?>
    <?php endforeach ?>
<?php elseif(isset($rdv)): ?>
    <div class='row g-gs'>

        <div class="col-md-4">
            <div class="form-group">
                <label for="motif_consultation">Motif de la consultation</label>
                <textarea name="motif_consultation" id="motif_consultation" cols="10" rows="5" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="">Diagnostique</label>
                <textarea name="diagnostique" id="diagnostique" cols="10" rows="5" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="resultat_clinique">Resultat du bilan de l'examen clinique</label>
                <textarea name="resultat_clinique" id="resultat_clinique" cols="10" rows="5" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="antecedant_medicaux">Antécédents Medicaux</label>
                <textarea name="antecedant_medicaux" id="antecedant_medicaux" cols="10" rows="5" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="antecedant_chirigicale">Antécédents Chirigicaux</label>
                <div class="form-control-wrap">
                    <textarea name="antecedant_chirigicale" id="antecedant_chirigicale" cols="10" rows="5" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="antecedant_familiale">Antécdents Familiale</label>
                <div class="form-control-wrap">
                    <textarea name="antecedant_familiale" id="antecedant_familiale" cols="10" rows="5" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="antecedant_autre">Autres Antécédénts</label>
                <div class="form-control-wrap">
                    <textarea name="antecedant_autre" id="antecedant_autre" cols="10" rows="5" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group"  align="right">
                <button type="submit" class="btn btn-lg btn-primary" name="rdv_envoyer" id="envoyer">Save Informations</button>
            </div>
        </div>
    </div>
<?php elseif(isset($edit_rdv)): ?>
    <div class='row g-gs'>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="motif_consultation">Motif de la consultation</label>
                    <textarea name="motif_consultation" id="motif_consultation" cols="10" rows="5" class="form-control"><?=$consultation->motif_consult ?></textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Diagnostique</label>
                    <textarea name="diagnostique" id="diagnostique" cols="10" rows="5" class="form-control"><?=$consultation->resultat_diagnos ?></textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="resultat_clinique">Resultat du bilan de l'examen clinique</label>
                    <textarea name="resultat_clinique" id="resultat_clinique" cols="10" rows="5" class="form-control"><?=$consultation-> examen_clinic?></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="antecedant_medicaux">Antécédents Medicaux</label>
                    <textarea name="antecedant_medicaux" id="antecedant_medicaux" cols="10" rows="5" class="form-control"><?=$consultation->antecedant_medicaux ?></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="antecedant_chirigicale">Antécédents Chirigicaux</label>
                    <div class="form-control-wrap">
                        <textarea name="antecedant_chirigicale" id="antecedant_chirigicale" cols="10" rows="5" class="form-control"><?=$consultation->antecedant_chirigicale ?></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="antecedant_familiale">Antécdents Familiale</label>
                    <div class="form-control-wrap">
                        <textarea name="antecedant_familiale" id="antecedant_familiale" cols="10" rows="5" class="form-control"><?=$consultation->antecedant_familiale ?></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="antecedant_autre">Autres Antécédénts</label>
                    <div class="form-control-wrap">
                        <textarea name="antecedant_autre" id="antecedant_autre" cols="10" rows="5" class="form-control"><?=$consultation->antecedant_autre ?></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group"  align="right">
                    <button type="submit" class="btn btn-lg btn-primary" name="modifier" id="envoyer">Save Informations</button>
                </div>
            </div>
        </div>
<?php else: ?>
    <div class='row g-gs'>
        <div class="col-md-4">
            <div class="form-group">
                <label for="">Adresse patient</label>
                <input type="text"
                    class="form-control" name="adresse_patient" id="adresse_patient"   value="<?=isset($get_input['adresse_patient'])?$get_input['adresse_patient']:""?>" aria-describedby="helpId" placeholder="">
                <input type="hidden"
                    class="form-control" name="idpatient" id="idpatient" aria-describedby="helpId" placeholder="" value="<?=$datas->num_patient?>">
                <input type="hidden"
                    class="form-control" name="edit" id="edit" aria-describedby="helpId" placeholder="" value="<?=$edit?>">

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="telephone">Telephone</label>
                <input type="number"
                    class="form-control" name="telephone" id="telephone"   value="<?=isset($get_input['telephone'])?$get_input['telephone'] : ""?>" aria-describedby="helpId" placeholder="" >
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="fils">Fils de </label>
                <input type="text"
                    class="form-control" name="fils" id="fils" aria-describedby="helpId"  value="<?=isset($get_input['fils']) ?  $get_input['fils'] : "" ?>"  placeholder="">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="genre">Genre </label>
                <select name="genre" id="genre" class="form-control">
                    <option value="F" >Féminin</option>
                    <option value="M">Masculin</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="">Groupe Sanguin</label>
                <input type="text"
                    class="form-control" name="groupesangine" id="groupesangine"   value="<?=isset($get_input['groupesangine']) ? $get_input['groupesangine']:""?>"aria-describedby="helpId" placeholder="">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="stuation_matrimonial">Stuation Matrimonial</label>
                <input type="text"
                    class="form-control" name="stuation_matrimonial"  value="<?= isset($get_input['stuation_matrimonial'])? $get_input['stuation_matrimonial'] :""?>" id="stuation_matrimonial" aria-describedby="helpId" placeholder="">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="ethinie">Ethnie du patient</label>
                <input type="text"  class="form-control" name="ethinie"  value="<?=isset($get_input['ethinie'])?$get_input['ethinie']:""?>" id="" aria-describedby="helpId" placeholder="">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="poids">Poids</label>
                <input type="number"
                    class="form-control" name="poids" id="poids"  value="<?=isset($get_input['poids'])?$get_input['poids']:""?>" aria-describedby="helpId" placeholder="">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="">Taille</label>
                <input type="number"
                    class="form-control" name="taille" id="taille" value="<?=isset($get_input['taille'])?$get_input['taille']:""?>" aria-describedby="helpId" placeholder="">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="motif_consultation">Motif de la consultation</label>
                <textarea name="motif_consultation" id="motif_consultation" cols="10" rows="5" class="form-control"><?=isset($get_input['motif_consultation'])?$get_input['motif_consultation']:""?></textarea>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="">Diagnostique</label>
                <textarea name="diagnostique" id="diagnostique" cols="10" rows="5" class="form-control"><?=isset($get_input['diagnostique'])?$get_input['diagnostique']:""?></textarea>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="resultat_clinique">Resultat du bilan de l'examen clinique</label>
                <textarea name="resultat_clinique" id="resultat_clinique" cols="10" rows="5" class="form-control"><?=isset($get_input['resultat_clinique'])?$get_input['resultat_clinique']:""?></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="antecedant_medicaux">Antécédents Medicaux</label>
                <textarea name="antecedant_medicaux" id="antecedant_medicaux" cols="10" rows="5" class="form-control"><?=isset($get_input['antecedant_medicaux'])?$get_input['antecedant_medicaux']:""?></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="antecedant_chirigicale">Antécédents Chirigicaux</label>
                <div class="form-control-wrap">
                    <textarea name="antecedant_chirigicale" id="antecedant_chirigicale" cols="10" rows="5" class="form-control"><?=isset($get_input['antecedant_chirigicale'])?$get_input['antecedant_chirigicale']:""?></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="antecedant_familiale">Antécdents Familiale</label>
                <div class="form-control-wrap">
                    <textarea name="antecedant_familiale" id="antecedant_familiale" cols="10" rows="5" class="form-control"><?=isset($get_input['antecedant_familiale'])?$get_input['antecedant_familiale']:""?></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="antecedant_autre">Autres Antécédénts</label>
                <div class="form-control-wrap">
                    <textarea name="antecedant_autre" id="antecedant_autre" cols="10" rows="5" class="form-control"><?=isset($get_input['antecedant_autre'])?$get_input['antecedant_autre']:""?></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group"  align="right">
                <button type="submit" class="btn btn-lg btn-primary" name="envoyer" id="envoyer">Save Informations</button>
            </div>
        </div>
    </div>
<?php endif ?>


class Commandes extends Controller
{
    public function index(){
        if (isset($_SESSION['pseudo'])){

            $db=new  Medicament();
            $forunisseur=new  Fournisseur();
            $Commande=new Commande();

            if (isset($_POST['enregistrer'])){

                $Commande->insertionUpdate_function(['idMedicement','quantite','prix_achat','idFournisseur','date_actuel']);

            }

            $datas=$db->SelectAllData("*",'medicament');
            $forunisseurs=$forunisseur->SelectAllData("*",'fournisseur');

            $select=$this->dataselect($datas);
            $forunisseurs=$forunisseur->SelectAllData('*','fournisseur');
            $this->view('ajouter_commande',['medicaments'=>$select,"forunisseurs"=>$forunisseurs]);

        }else{
            $this->redirect('login');
        }
    }

    public function dataselect($data){
        $output="";
        foreach($data as $medicament)
        {
            $output .= '<option value="'.$medicament->idMedicament.'">'.$medicament->dci.' '.$medicament->dosage.' '.$medicament->forme.'</option>';
        }

        return $output;
    }

    public function dataselect_fournisseur($data){
        $output="";
        foreach($data as $fournisseur)
        {
            $output .= '<option value="'.$fournisseur->idFournisseur.'">'.$fournisseur->nomfourni.' '.$fournisseur->adresseFourni.'</option>';
        }
        return $output;
    }


    public function liste(){

        if (isset($_SESSION['pseudo'])) {
            $commande=new Commande();
            $fournisseur=new Fournisseur();

            $datas = $commande->select_data_table_join_where_all('select  DISTINCT commande.*  from commande JOIN ligne_commandes ON ligne_commandes.idCommande=commande.idCommande WHERE  commande.dateAchat IS NULL');
            $fournisseurs= $fournisseur->select_data_all('fournisseur');
            $this->view('commande',['commandes'=>$datas,"fournisseurs"=>$fournisseurs]);
        }else{
            $this->redirect('login');
        }
    }


    public function select_medicament(){

        if (isset($_SESSION['pseudo'])) {

            $medicament=new Medicament();

            $counter=0;
            if(isset($_POST['idMedicament'])){

                $medicaments=$medicament->FetchSelectWhere('idMedicament',
                    'medicament',
                    'idMedicament=:id',
                    [":id"=>$_POST['idMedicament']]);

                if(isset($_SESSION['ordo'][$_POST['idMedicament']])){

                    $_SESSION['ordo'][$medicaments->idMedicament]++;

                }else{

                    $_SESSION['ordo'][$medicaments->idMedicament]=1;
                }

            }
        }else{
            $this->redirect('login');
        }
    }


    public function  unset_panier(){

        if(isset($_POST['id'])){
            unset($_SESSION["panier"][$_POST['id']]);
        }

    }


    public function select_reception(){

        if (isset($_SESSION['pseudo'])) {

            $medicament=new Medicament();

            $counter=0;
            if(isset($_POST['idMedicament'])){

                $medicaments=$medicament->FetchSelectWhere('idMedicament',
                    'medicament',
                    'idMedicament=:id',
                    [":id"=>$_POST['idMedicament']]);

                if(isset($_SESSION['ordo'][$_POST['idMedicament']])){

                    $_SESSION['ordo'][$medicaments->idMedicament]++;

                }else{

                    $_SESSION['ordo'][$medicaments->idMedicament]=1;
                }

            }
        }else{
            $this->redirect('login');
        }
    }
    public function edit($id){
        if (isset($_SESSION['pseudo'])) {

            $medicament=new Medicament();
            $fournisseur_commande=new Fournisseur();
            $Commande=new Commande();
            $fournisseur_commandes =$fournisseur_commande->select_data_table_join_where("select * from commande join fournisseur ON 
                                                                    commande.idFournisseur=fournisseur.idFournisseur 
                                                                    WHERE commande.idcommande=:id",[':id'=>$id]);

            if (isset($_POST['enregistrer'])){

                $Commande->insertionUpdate_function(['quantite','prix_achat','idFournisseur','date_actuel','id_ligne_commande','quantite','idcommande']);
            }

            $datas=$medicament->select_data_all('medicament');

            $select=$this->dataselect($datas);

            $forunisseurs=$fournisseur_commande->select_data_all('fournisseur');

            $datas=$medicament->select_data_table_join_where_all('select * from medicament join ligne_commandes ON ligne_commandes.idMedicement=medicament.idMedicement WHERE ligne_commandes.idCommande=:id',[":id"=>$id]);
            $this->view('ajouter_commande',["commandes"=>$datas,'medicaments'=>$select,"edit"=>$id,'fournisseur_commande'=>$fournisseur_commandes,"fournisseurs"=>$forunisseurs]);
        }else{
            $this->redirect('login');
        }
    }

    public function delete(){

        if (isset($_POST['id']) and !empty($_POST['id'])){
            $commande=new Commande();
            $commande->select_data_table_join_where('DELETE FROM ligne_commandes WHERE id_ligne_commande=:id',[':id'=>$_POST['id']]);
        }
    }

}