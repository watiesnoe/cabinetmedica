<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 28/03/2023
 * Time: 09:26
 */

class Famille extends Model
{
    public $errors=[];
    public function InsrtionUdateData($vlaue=[]){

        if ($this->VerifyField($vlaue)){

            $this->e(extract($_POST));

            if(isset($id_fami)){
                $q=$this->insertion_update_simples('UPDATE famille SET nom_famille=:nom_famille  where id_fami=:id_fami',
                    [':id_fami'=>$id_fami,":nom_famille"=>$nom_famille]);
                if($q){
                    $this->set_flash('Lit modifier avec success','success');
                    $this->clear_input_data();
                }

                $this->redirect('Familles/liste');
            }else{

                for ($i=0;$i<count($nom_famille);$i++){
                    $q=$this->insertion_update_simples('INSERT INTO famille (nom_famille ) VALUES (:nom_famille)',
                        [':nom_famille'=>$nom_famille[$i]]);
                    if($q){
                        $this->set_flash('Famille  ajouter avec success','success');
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