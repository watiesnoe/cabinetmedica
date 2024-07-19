<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 17/03/2023
 * Time: 14:40
 */

class Reglements extends Controller
{
    public function index(){
        if (isset($_SESSION['pseudo'])){
            $reglement=new Reglement();

            if (isset($_POST['submit'])){

                $reglement->insertionUpdate_function(['typereglement','code_paiement']);
            }
            $this->view('ajouter_reglement');

        }else{
            $this->redirect('login');
        }
    }

    public function liste(){
        if (isset($_SESSION['pseudo'])){

            $reglement=new Reglement();
            $reglements=$reglement->SelectAllData('*','reglements');
            $this->view('reglement',['reglements'=>$reglements]);

        }else{
            $this->redirect('login');
        }
    }
    public function edit($id)
    {
        if (isset($_SESSION['pseudo'])){
            $reglement=new Reglement();

            if (isset($_POST['submit'])){

                $reglement->insertionUpdate_function(['typereglement','code_paiement','idReglement']);
            }

            $reglements=$reglement->select_data_table_join_where('select * from reglements WHERE  idReglement=:id ',[":id"=>$id]);
            $this->view('ajouter_reglement',["reglement"=>$reglements,'id'=>$id]);

        }else{
            $this->redirect('login');
        }

    }
}