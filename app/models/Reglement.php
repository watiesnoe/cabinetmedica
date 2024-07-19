<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 17/03/2023
 * Time: 14:41
 */

class Reglement extends Model
{
    public function insertionUpdate_function($vlaue=[]){

        if ($this->VerifyFields($vlaue)){

            $this->e(extract($_POST));

            if(isset($idReglement)){
                $q=$this->insertion_update_simples('UPDATE  reglements
                      SET 
                      code_paiement=:code_paiement,
                      nom=:nom 		
                      WHERE idReglement=:idReglement',

                    [   ':code_paiement'=>$code_paiement,
                        ':nom'=>$typereglement,
                        ':idReglement'=>$idReglement]);
                if($q){
                    $this->set_flash('Reglement  modifier avec success','success');
                    $this->clear_input_data();
                }

                $this->redirect('Reglements/liste');

            }else{

                $q = $this->insertion_update_simples_insert_id('INSERT INTO `reglements` (code_paiement,nom)  VALUES (:code_paiement,:typereglement)',[
                    ':code_paiement'=>$code_paiement,
                    ':typereglement'=>$typereglement]);
                if($q['q']){
                    $this->set_flash("Reglement enregistrer avec succes",'success');
                }
            }
        }else{

            $this->save_input_data();
            return array_push($this->errors,"Les champs ne doivent pas etre vide!! ");
        }
    }

}