<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 11/03/2023
 * Time: 19:18
 */

class Structure extends  Model
{

    public $errors=[];
    public function InsrtionUdateData($vlaue=[]){

        if ($this->VerifyFields($vlaue)){

            $this->e(extract($_POST));

            if(isset($codeStructure)){
                if (count($this->errors)==0){

                    $q=$this->insertion_update_simples('UPDATE structure SET  nom_structure=:nomStructure WHERE num_structure=:CodeStructure',
                        [':nomStructure'=>$nomStructure,':CodeStructure'=>$codeStructure]);
                    if($q){

                        $this->set_flash('Rendez-vous  pris avec succès cliquer ici pour voir la liste','success');
                        $this->clear_input_data();
                    }
                    $this->redirect('Structures/liste');
                }else{
                    $this->save_input_data();
                }

            }else{
                if (count($this->errors)==0){

                    $q=$this->insertion_update_simples('insert into structure  (nom_structure) values(:nomStructure)',
                        [':nomStructure'=>$nomStructure]);
                    if($q){

                        $this->set_flash('Structure ajouter avec success','success');
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