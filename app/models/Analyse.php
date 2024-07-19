<?php

class Analyse extends Model
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
					 typeExamen=:typeExamen,
                     motif=:motif,
                     dateDamande=:dateDamande,
                     idPatient=:idPatient,
                     idMedecin=:idMedecin,
                     codeStructure=:nomStructure
                   
							WHERE numDemanceExamen=:id');

                    $q->execute([':typeExamen'=>$typeAnalyse,':motif'=>$motif,':dateDamande'=>$dateDemande,
                        ':idMedecin'=>$_SESSION['user_id'],':idPatient'=>$patient,':nomStructure'=>$nomStructure,':id'=>$idAnalyse]);

                    if($q){

                        $this->set_flash('Analyse realisée avec success','success');
                    }

                }else{
                    $this->save_input_data();
                }

            }else{

                if (count($this->errors)==0){
                    $q = $bdd->prepare('INSERT INTO `demandeexamen`  (typeExamen,motif,dateDamande,idPatient,idMedecin,codeStructure)
						VALUES (:typeExamen,:motif,:dateDamande,:idPatient,:idMedecin,:nomStructure)');

                    $q->execute([':typeExamen'=>$typeAnalyse,':motif'=>$motif,':dateDamande'=>$dateDemande,':idMedecin'=>$_SESSION['user_id'],':idPatient'=>$patient,':nomStructure'=>$nomStructure]);

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
                        medecinAnalyste=:medecinAnalyste,
                        dateReponse=:dateReponse
                              WHERE numDemanceExamen=:id');

                $q->execute([':id'=>$idAnalyse,':bilanExamen'=>$resultat,':medecinAnalyste'=>$_SESSION['user_id'],':dateReponse'=>date('Y-m-d')]);
                if($q){

                    $this->set_flash('Analyse modifier avec success','success');
                    $this->clear_input_data();
                }
            }else{
                $this->save_input_data();
            }
            $this->redirect('Analyses/analyse_realise');
        }else{

            $this->save_input_data();
            return array_push($this->errors,"Les champs ne doivent pas etre vide!! ");
        }
    }
}  

