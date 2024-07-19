<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 10/03/2023
 * Time: 22:46
 */

class Utilisateurs extends Controller
{
    public function index(){
        if(isset($_SESSION['pseudo'])){
            $structure=new Structure();
            
            $utilisateur=new Utilisateur();

            if(isset($_POST['envoyer'])){
                $profile=$_FILES['profile']['name'];
                $image_tempo=$_FILES['profile']['tmp_name'];
                $utilisateur->insertionUpdate_function(['nom','prenom','genre','telephone','role','email','codeStructure','pseudo','motdepasse','mot_de_passe_confirme'],
                    $profile,$image_tempo);
            }

            $errors=$utilisateur->errors;
            $structures=$structure->SelectAllData('*','structure');

            $this->view('ajouter_utilisateur',['structures'=>$structures,"errors"=>$errors]);

        }else{
            $this->redirect('login');
        }
    }

    public function liste(){

        if(isset($_SESSION['pseudo'])){

            $utilisateur=new Utilisateur();

            $all_users=$utilisateur->SelectAllData('*','medecin');

            $this->view('utilisateur',["all_users"=>$all_users]);

        }else{
            $this->redirect('login');
        }
    }

    public function edit($id)
    {
        if (isset($_SESSION['pseudo'])) {

            $utilisateur=new Utilisateur();
            $structure=new Structure();

            if(isset($_POST['envoyer'])){

                $utilisateur->insertionUpdate_function(['nom','prenom','genre','numAgent','telephone','role','email','codeStructure','pseudo','motdepasse']);
            }

            $structures=$structure->SelectAllData('*','structure');

            $utilisateurs=$utilisateur->FetchSelectWhere("*",'medecin JOIN structure ON medecin.num_structure=structure.num_structure','num_medecin=:num_medecin',[':num_medecin'=>$id]);
            $this->view('ajouter_utilisateur',['utilisateur'=>$utilisateurs,'structures'=>$structures,'id'=>$id,'errors'=>$utilisateur->errors]);

        }else{
            $this->redirect('login');
        }
    }

}