<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 15/03/2023
 * Time: 14:56
 */

class Symptome extends Model
{
    public $errors=[];

    public function insertionUpdate_function($vlaue=[]){

        if ($this->VerifyField($vlaue)){

            $this->e(extract($_POST));

            if(isset($idSyptome)){
                $q=$this->insertion_update_simples('UPDATE symptome  SET type_symtome=:typeSympto where num_syptome=:idSyptome',
                    [':typeSympto'=>$symptome,":idSyptome"=>$idSyptome]);
                if($q){
                    $this->set_flash('Maladie  modifier avec success','success');
                    $this->clear_input_data();
                }
                $this->redirect('Symptomes/liste');

            }else{
                for ($i=0;$i<count($symptome);$i++){
                    $q=$this->insertion_update_simples('INSERT INTO symptome (type_symtome,num_maladie) VALUES (:type_symtome,:idMaladie)',
                        [':type_symtome'=>$symptome[$i],":idMaladie"=>$nomMaladie[0]]);
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