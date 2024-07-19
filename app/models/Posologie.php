<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 11/03/2023
 * Time: 19:18
 */

class Posologie extends  Model
{

    public $errors=[];
    public function InsrtionUdateData($vlaue=[]){

        if ($this->VerifyFields($vlaue)){

            $this->e(extract($_POST));

            if(isset($codeStructure)){
                if (count($this->errors)==0){

                    $q=$this->insertion_update_simples('UPDATE posologie SET  type_posologie=:type_posologie 
                    WHERE num_posologie=:num_posologie',
                        [':type_posologie'=>$type_posologie,':num_posologie'=>$num_posologie]);
                    if($q){

                        $this->set_flash('Rendez-vous  pris avec succès cliquer ici pour voir la liste','success');
                        $this->clear_input_data();
                    }
                    $this->redirect('Posologies/liste');
                }else{
                    $this->save_input_data();
                }

            }else{
                if (count($this->errors)==0){

                    $q=$this->insertion_update_simples('insert into posologie  (type_posologie) values(:type_posologie)',
                        [':type_posologie'=>$posologie]);
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