<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 16/03/2023
 * Time: 10:06
 */

class Medicament extends Model
{
    public $errors=[];

    public function insertionUpdate_function($vlaue=[]){

        if ($this->VerifyFields($vlaue)){

            $this->e(extract($_POST));

            if(isset($idMedicament)){
                $q=$this->insertion_update_simples('UPDATE  medicament 
                      SET 
                      forme=:forme,
                      dci=:dci,
                      dosage=:dosage,
                      stock_min=:stock_min, 	
                      id_unit=:id_unit, 
                      id_fami=:id_fami,
                      prix_achat=:prix_achat,
                      prix_vente=:prix_vente	
                      WHERE idMedicament=:idMedicament',

                       [':dci'=>$dci,
                        ':dosage'=>$dosage,
                        ':forme'=>$forme,
                        ':id_unit'=>$unite,
                        ':id_fami'=>$famille,
                        ':prix_achat'=>$prix_achat,
                        ':prix_vente'=> $prix_vente,
                        ':stock_min'=>$stock_alert,
//                        ':codebarre'=>$code_bare,
                        ':idMedicament'=>$idMedicament]);
                if($q){
                    $this->set_flash('Medicament  modifier avec success','success');
                    $this->clear_input_data();
                }

                //$this->redirect('Medicaments/liste');
            }else{

                $medoc = $this->insertion_update_simples('INSERT INTO `medicament` (dci,forme,dosage,stock_min,id_unit,id_fami,prix_achat,prix_vente)  
                VALUES (:dci,:forme,:dosage,:stock_min,:id_unit,:id_fami,:prix_achat,:prix_vente)',[
                    ':dci'=>$dci,
                    ':dosage'=>$dosage,
                    ":stock_min"=>$stock_alert,
                    ":id_fami"=>$famille,
                    ":id_unit"=>$unite,
                    ':prix_achat'=>$prix_achat,
                    ':prix_vente'=> $prix_vente,
                    ':forme'=>$forme]);

                if($medoc){
                    $this->set_flash("Médicament enregistrer avec succes",'success');
                }
            }
        }else{

            $this->save_input_data();
            return array_push($this->errors,"Les champs ne doivent pas etre vide!! ");
        }
    }
}