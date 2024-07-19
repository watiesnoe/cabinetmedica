<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 15/03/2023
 * Time: 08:43
 */

class Lit extends Model
{
    public $errors=[];
    public function InsrtionUdateData($vlaue=[]){

        if ($this->VerifyField($vlaue)){

            $this->e(extract($_POST));

            if(isset($id_lit)){

                $q=$this->insertion_update_simples('UPDATE lit SET nom_lit=:nom_lit where num_lit=:num_lit',
                    [':nom_lit'=>$lit,":num_lit"=>$id_lit]);
                if($q){
                    $this->set_flash('Lit modifier avec success','success');
                    $this->clear_input_data();
                }

                $this->redirect('Lits/liste');

            }else{

                for ($i=0;$i<count($lit);$i++){

                    $q=$this->insertion_update_simples('INSERT INTO lit (nom_lit,num_salle) VALUES (:nom_lit,:num_salle)',
                        [':num_salle'=>$nomSalle[0],":nom_lit"=>$lit[$i]]);
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