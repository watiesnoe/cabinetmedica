<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 18/04/2023
 * Time: 13:47
 */

class AjouterAnalyse extends Model
{

    public $errors=[];
    public function InsrtionData($vlaue=[]){
        $bdd=$this->bdd();

        if ($this->VerifyFields($vlaue)){

            $this->e(extract($_POST));


            if(isset($idAnalyse) && !empty($idAnalyse)){

                if (count($this->errors)==0){
                    $q = $bdd->prepare('UPDATE `demandeexamen` 
					 SET 
					 nomExamen=:typeExamen,
                     motif_axamen=:motif,
                     dateDamande=:dateDamande                    
                   
					 WHERE numDemanceExamen=:id');

                    $q->execute([':typeExamen'=>$typeAnalyse,':motif'=>$motif,':dateDamande'=>$dateDemande,
                   ':id'=>$idAnalyse]);

                    if($q){

                        $this->set_flash('Analyse realisée avec success','success');
                    }

                }else{
                    $this->save_input_data();
                }

            }else{

                if (count($this->errors)==0){

                    $q = $bdd->prepare('INSERT INTO `demandeexamen`  (nomExamen,motif_axamen,dateDamande,num_consult,medecinDemande,idPatient)
						VALUES (:nomExamen,:motif_axamen,:dateDamande,:num_consult,:medecinDemande,:idPatient)');

                    $q->execute([':nomExamen'=>$typeAnalyse,':motif_axamen'=>$motif,':num_consult'=>$idConsultation,':dateDamande'=>$dateDemande,':medecinDemande'=>$_SESSION['user_id'],':idPatient'=>$patient]);

                    if($q){

                        $id="<a class='d' href='#'> Veillez voir la liste ici </a>";
                        $this->set_flash("Rendez-vous  pris avec succès cliquer ici pour voir la liste $id",'success');
                    }
                }else{
                    $this->save_input_data();
                }
            }
        }else{

            $this->save_input_data();

            return array_push($this->errors,"Les champs ne doivent pas etre vide!! ");
        }
    }
    public function DoneAnalyseUpdate($vlaue=[]){

        $bdd=$this->bdd();
        if ($this->VerifyFields($vlaue)){

            $this->e(extract($_POST));

            if (count($this->errors)==0){
                $q = $bdd->prepare('UPDATE `demandeexamen` 

                        SET 
                        bilanExamen=:bilanExamen,
                        medecinRealisation=:medecinAnalyste
                              WHERE numDemanceExamen=:id');

                $q->execute([':id'=>$idAnalyse,':bilanExamen'=>$resultat,':medecinAnalyste'=>$_SESSION['user_id']]);
                if($q){

                    $this->set_flash('Analyse modifier avec success','success');
                    $this->clear_input_data();
                }
            }else{
                $this->save_input_data();
            }
//            $this->redirect('Analyses/analyse_realise');
        }else{

            $this->save_input_data();
            return array_push($this->errors,"Les champs ne doivent pas etre vide!! ");
        }
    }
}