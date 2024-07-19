<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 19/04/2023
 * Time: 14:34
 */

class Rendezvous extends Model
{
    public $errors=[];
    public function InsrtionData($vlaue=[]){


        if ($this->VerifyFields($vlaue)){

            $this->e(extract($_POST));
            if(isset($idRendezVous)){
                $q =$this->insertion_update_simples('UPDATE `rendez_vous` 
                                         SET 
                                        jour=:dateRendezVous,
                                        motif=:motif,
                                        heure_rendezvous=:heureRdv,
                                        idpatient=:idPatient,
                                        numAgent=:numAgent WHERE num_rendez=:id',[':dateRendezVous'=>$dateRendezVous,
                    ':motif'=>$motif,
                    ':heureRdv'=>$heureRendezVous,
                    ':idPatient'=>$idPatient,
                    ':numAgent'=>$_SESSION['user_id'],
                    ':id'=>$idRendezVous
                ]);
                if($q){

                    $this->set_flash('Rendez-vous  pris avec succès cliquer ici pour voir la liste','success');
                    $this->clear_input_data();
                }

            }else{
                if (count($this->errors)==0){

                    $q =$this->insertion_update_simples('INSERT INTO rendez_vous  (jour,heure_rendezvous,idpatient,motif,numAgent)
                                                VALUES (:dateRendezVous,:heureRdv,:idPatient,:motif,:numAgent)',[':dateRendezVous'=>$dateRendezVous,
                        ':motif'=>$motif,
                        ':heureRdv'=>$heureRendezVous,
                        ':idPatient'=>$idPatient,
                        ':numAgent'=>$_SESSION['user_id']
                    ]);
                    if($q){

                        $this->set_flash('Rendez-vous  pris avec succès cliquer ici pour voir la liste','success');
                        $this->clear_input_data();
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

    public function statut($vlaue=[]){

        if ($this->VerifyFields($vlaue)){

            $this->e(extract($_POST));

            $actif="actif";

            if(isset($idRdv) && !empty($idRdv)){

                $q = $this->insertion_update_simples('UPDATE `rendez_vous` SET
                                                      effectuer=:effectuer
                                                      WHERE num_rendez=:idRendezVous ',[
                    ':effectuer'=>$actif,
                    ':idRendezVous'=>$idRdv
                ]);

                if( $q){

                    $response=array("success"=>true,"modification"=>"Le rendevous effectuer ");

                    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){
                        return json_encode($response);
                    }
                }
            }
        }else{

            $this->save_input_data();

            return array_push($this->errors,"Les champs ne doivent pas etre vide!! ");

        }

    }
}