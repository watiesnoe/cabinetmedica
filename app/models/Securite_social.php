<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 17/03/2023
 * Time: 20:38
 */

class Securite_social extends Model
{

    public $errors=[];
    public function InsrtionUdateData($vlaue=[]){

        if ($this->VerifyFields($vlaue)){

            $this->e(extract($_POST));

            if(isset($idSecurite)){
                if (count($this->errors)==0){

                    $q=$this->insertion_update_simples('UPDATE securite_sociale SET  
                    nom_societe=:nom_societe,
                    codesociete =:code,
                    pourcentage_montant=:pourcentage_montant
                     WHERE idSecurite=:idSecurite',
                        [':nom_societe'=>$sociale,':code'=>$code,':pourcentage_montant'=>$pourcentage,':idSecurite'=>$idSecurite]);
                    if($q){
                        $this->set_flash('Securite sociale modifier avec success','success');
                        $this->clear_input_data();
                    }

                }else{
                    $this->save_input_data();
                }

            }else{
                if (count($this->errors)==0){

                    $q=$this->insertion_update_simples('INSERT INTO securite_sociale (nom_societe,pourcentage_montant,codesociete) values(:nom_societe,:pourcentage_montant,:codesociete)',
                        [':nom_societe'=>$sociale,':codesociete'=>$code,':pourcentage_montant'=>$pourcentage]);
                    if($q){

                        $this->set_flash('Securité  ajouter avec success','success');
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
}