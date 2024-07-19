<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 17/03/2023
 * Time: 20:08
 */

class Fournisseur extends Model
{
    public $errors=[];
    public function insertionUpdate_function($vlaue=[]){

        if ($this->VerifyFields($vlaue)){

            $this->e(extract($_POST));

            if(isset($idFournisseur)){

                $q=$this->insertion_update_simples('UPDATE  fournisseur
                      SET 
                      nom_fournisseur=:nomfourni, 	
                      adresse_fournisseur=:adresseFourni,
                      telephone_fournisseur=:telFourni
                      WHERE id_fournisseur=:idFournisseur',
                    [
                        ':nomfourni'=>$nomfourni,
                        ':telFourni'=>$telFourni,
                        ':adresseFourni'=>$adresseFourni,
                        ":idFournisseur"=>$idFournisseur
                    ]);

                if($q){

                    $this->set_flash('Fournisseur  modifier avec success','success');
                    $this->clear_input_data();
                }
            }else{

                $q = $this->insertion_update_simples('INSERT INTO `fournisseur` (nom_fournisseur ,adresse_fournisseur,telephone_fournisseur )  VALUES (:nomfourni,:adresseFourni,:telFourni)',
                    [
                        ':nomfourni'=>$nomfourni,
                        ':telFourni'=>$telFourni,
                        ':adresseFourni'=>$adresseFourni
                    ]);
                if($q){

                    $this->set_flash("Fournisseur enregistrer avec succes",'success');
                }
            }

        }else{

            $this->save_input_data();
            $this->set_flash("L'un des champs est vide!!",'danger');
        }
    }
    public function insertionUpdate_function_modale($vlaue=[]){

        if ($this->VerifyFields($vlaue)){

            $this->e(extract($_POST));

                $q = $this->insertion_update_simples('INSERT INTO `fournisseur` (nom_fournisseur ,adresse_fournisseur,telephone_fournisseur )  VALUES (:nomfourni,:adresseFourni,:telFourni)',
                    [
                        ':nomfourni'=>$nom_fournisseur,
                        ':telFourni'=>$telephone_fournisseur,
                        ':adresseFourni'=>$adresse_fournisseur
                    ]);

                if($q){

                    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){

                       return json_encode(['Insertion'=>"Insertion réussit"]);
                    }
                }

                 $this->clear_input_data();
        
        }else{

            $this->save_input_data();
            $this->set_flash("L'un des champs est vide!!",'danger');
        }
    }
}