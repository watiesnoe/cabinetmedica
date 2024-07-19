<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 15/03/2023
 * Time: 12:56
 */

class Maladie extends Model
{
    public $errors=[];

    public function insertionUpdate_function($vlaue=[]){

        if ($this->VerifyField($vlaue)){

            $this->e(extract($_POST));

            if(isset($idMaladie)){
                $q=$this->insertion_update_simples('UPDATE maladie SET nom_maladie=:nomMaladie where num_maladie=:idMaladie',
                    [':nomMaladie'=>$nomMaladie,":idMaladie"=>$idMaladie]);
                if($q){
                    $this->set_flash('Maladie  modifier avec success','success');
                    $this->clear_input_data();
                }

                $this->redirect('Maladies/liste');
            }else{

                for ($i=0;$i<count($nomMaladie);$i++){
                    $q=$this->insertion_update_simples('INSERT INTO maladie (nom_maladie) VALUES (:nomMaladie)',
                        [':nomMaladie'=>$nomMaladie[$i]]);
                    if($q){
                        $this->set_flash('Lit ajouter avec success','success');
                        $this->clear_input_data();
                    }
                }
            }
        }else{

            $this->save_input_data();
            return array_push($this->errors,"Les champs ne doivent pas etre vide!! ");
        }
    }
}