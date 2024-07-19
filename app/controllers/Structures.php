<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 26/11/2022
 * Time: 07:31
 */

class Structures extends Controller
{
    public function index()
    {
        if (isset($_SESSION['pseudo'])) {

            $structure=new Structure();

            if(isset($_POST['submit'])){

                $structure->InsrtionUdateData(['nomStructure']);
            }

            $this->view('ajouter_structure',["errors"=>$structure->errors]);


        }else{
            $this->redirect('login');
        }
    }

    public function liste()
    {

        if (isset($_SESSION['pseudo'])) {

            $structure=new Structure();
            $structures=$structure->SelectAllData('*','structure');
            $this->view('structure',['structures'=>$structures]);

        }else{
            $this->redirect('login');
        }
    }

    public function edit($id)
    {

        if (isset($_SESSION['pseudo'])) {

            $structure=new Structure();

            if(isset($_POST['submit'])){
                $structure->InsrtionUdateData(['codeStructure','nomStructure']);
            }

            $structures=$structure->FetchSelectWhere('*','structure','num_structure=:codeStructure',[':codeStructure'=>$id]);
            $this->view('ajouter_structure',['structure'=>$structures]);

        }else{
            $this->redirect('login');
        }
    }
}