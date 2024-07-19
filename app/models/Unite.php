<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 17/03/2023
 * Time: 14:41
 */

class Unite extends Model
{
    public $errors=[];

    public function insertionUpdate_function($vlaue=[]){

        if ($this->VerifyFields($vlaue)){

            $this->e(extract($_POST));

            if(isset($id_unite)){
                $q=$this->insertion_update_simples('UPDATE  unite
                      SET 
                      code_unite=:code_paiement,
                      code_nom=:code_nom
                      WHERE id_unit=:id',

                    [':code_paiement'=>$code_unite,
                    ':code_nom'=>$code_nom,
                        ':id'=>$id_unite]);
                if($q){
                    $this->set_flash('Unite de vente  modifier avec success','success');
                    $this->clear_input_data();
                }

                $this->redirect('Unites/liste');

            }else{

                $q = $this->insertion_update_simples_insert_id('INSERT INTO `unite` (code_unite,code_nom)  VALUES (:code_unite,:code_nom)',[':code_unite'=>$code_unite,':code_nom'=>$code_nom]);
                if($q['q']){
                    $this->set_flash("Unité enregistrer avec succes",'success');
                }
            }
        }else{

            $this->save_input_data();
            return array_push($this->errors,"Les champs ne doivent pas etre vide!! ");
        }
    }

}