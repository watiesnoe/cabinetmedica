<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 17/03/2023
 * Time: 14:40
 */

class Unites extends Controller
{

    public function index(){

        if (isset($_SESSION['pseudo'])){

            $gestion=new Unite();

            if (isset($_POST['submit'])){

                $gestion->insertionUpdate_function(['code_nom','code_unite']);
            }
            $this->view('ajouter_unite');

        }else{
            $this->redirect('login');
        }
    }

    public function liste(){
        if (isset($_SESSION['pseudo'])){

            $gestion=new Unite();

            $gestions=$gestion->SelectAllData('*','unite');

            $this->view('unite',['gestions'=>$gestions]);

        }else{
            $this->redirect('login');
        }
    }

    public function edit($id)
    {
        if (isset($_SESSION['pseudo'])){

            $gestion=new Unite();

            if (isset($_POST['submit'])){

                $gestion->insertionUpdate_function(['id_unite','code_unite','code_nom']);
            }

            $gestions=$gestion->FetchSelectWhere('*','unite','id_unit=:id',[":id"=>$id]);

            $this->view('ajouter_unite',["gestion"=>$gestions,'id'=>$id]);

        }else{
            $this->redirect('login');
        }

    }
}