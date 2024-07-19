<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 15/03/2023
 * Time: 19:20
 */

class Examen extends Model
{
    public $errors=[];

    public function insertionUpdate_function($vlaue=[]){

        if ($this->VerifyField($vlaue)){

            $this->e(extract($_POST));

            if(isset($codeExamen)){
//                codeExamen nom_examen code_examen prix_axamen
                $q=$this->insertion_update_simples('UPDATE examen SET nom_examen=:nom_examen,code_examen=:code_examen,prix_axamen=:prix_axamen
                                  where num_examen=:codeExamen',
                    [':codeExamen'=>$codeExamen, ':nom_examen'=>$nom_examen, ':code_examen'=>$code_examen, ':prix_axamen'=>$prix_axamen]);
                if($q){
                    $this->set_flash('Examen  modifier avec success','success');
                    $this->clear_input_data();
                }

                $this->redirect('Examens/liste');
            }else{
                $q=$this->insertion_update_simples('INSERT INTO examen (nom_examen,code_examen,prix_axamen) VALUES (:nom_examen,:code_examen,:prix_axamen)',
                    [':nom_examen'=>$nom_examen,':code_examen'=>$code_examen,':prix_axamen'=>$prix_axamen]);
                if($q){
                    $this->set_flash('Examens  ajouter avec success','success');
                    $this->clear_input_data();
                }
            }
        }else{
            $this->save_input_data();
            return array_push($this->errors,"Les champs ne doivent pas etre vide!! ");
        }
    }
}