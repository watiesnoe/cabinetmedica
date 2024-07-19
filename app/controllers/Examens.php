<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 15/03/2023
 * Time: 19:19
 */

class Examens extends Controller
{
    public function index(){
        if(isset($_SESSION['pseudo'])){

            $examen=new Examen();
            if (isset($_POST['enregistrer'])){
                $examen->insertionUpdate_function(['nom_examen','code_examen','prix_axamen']);
            }
            $this->view('ajouter_examen',['errors'=>$examen->errors]);

        }else{
            $this->redirect('login');
        }
    }
    public function liste(){
        if(isset($_SESSION['pseudo'])){

            $examen=new Examen();

            $datas=$examen->SelectAllData('*','examen');

            $this->view('examen',['examens'=>$datas]);

        }else{
            $this->redirect('login');
        }
    }

    public function edit($id){
        if(isset($_SESSION['pseudo'])){

            $examen=new Examen();
            if (isset($_POST['submit'])){

                $examen->insertionUpdate_function(['codeExamen','nom_examen','code_examen','prix_axamen']);
            }

            $datas=$examen->FetchSelectWhere('*','examen','num_examen=:codeExamen',[":codeExamen"=>$id]);

            $this->view('ajouter_examen',['examen'=>$datas,'errors'=>$examen->errors,"id"=>$id]);

        }else{
            $this->redirect('login');
        }
    }
}