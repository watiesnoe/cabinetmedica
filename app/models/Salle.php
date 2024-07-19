<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 14/03/2023
 * Time: 13:02
 */

class Salle extends Model
{

    public $errors=[];
    public function InsrtionUdateData($vlaue=[]){

        if ($this->VerifyField($vlaue)){

            $this->e(extract($_POST));

            if(isset($codesalle)){
                $q=$this->insertion_update_simples('UPDATE salle SET code_salle=:nomSalle where num_salle=:codesalle',
                    [':nomSalle'=>$nomSalle,":codesalle"=>$codesalle]);
                if($q){
                    $this->set_flash('Salle modifier avec success','success');
                    $this->clear_input_data();
                }

                $this->redirect('Salles/liste');
            }else{
                for ($i=0;$i<count($nomSalle);$i++){

                    $q=$this->insertion_update_simples('INSERT INTO salle (code_salle,num_structure) VALUES (:nomSalle,:codeStructure)',
                        [':nomSalle'=>$nomSalle[$i],":codeStructure"=>$structure[0]]);
                    if($q){
                        $this->set_flash("Salle ajouter avec success $structure[0]",'success');
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