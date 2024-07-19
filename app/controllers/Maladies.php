<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 15/03/2023
 * Time: 12:54
 */

class Maladies extends Controller
{
    public function index(){
        if(isset($_SESSION['pseudo'])){

            $maladie=new Maladie();
            if(isset($_POST['enregistrer'])){

                $maladie->insertionUpdate_function(['nomMaladie']);
            }

            $this->view('ajouter_maladie',['maladies'=>$maladie->errors]);

        }else{
            $this->redirect('login');
        }
    }

    public function liste(){

        if(isset($_SESSION['pseudo'])){

            $maladie=new Maladie();

            $maladies=$maladie->SelectAllData("*",'maladie');

            $this->view('maladie',["maladies"=>$maladies]);

        }else{
            $this->redirect('login');
        }
    }

    public function edit($id)
    {
        if (isset($_SESSION['pseudo'])) {

            $Maladie=new Maladie();
            if (isset($_POST['submit'])){
                $Maladie->insertionUpdate_function(['idMaladie','nomMaladie']);
            }

            $maladies=$Maladie->FetchSelectWhere('*','maladie','num_maladie=:idMaladie',[":idMaladie"=>$id]);
            
            $this->view('ajouter_maladie',["maladie"=>$maladies,'id'=>$id]);

        }else{
            $this->redirect('login');
        }
    }
}