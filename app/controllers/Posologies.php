<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 26/11/2022
 * Time: 07:31
 */

class Posologies extends Controller
{
    public function index()
    {
        if (isset($_SESSION['pseudo'])) {

            $posologie=new Posologie();

            if(isset($_POST['submit'])){

                $posologie->InsrtionUdateData(['posologie']);
            }

            $this->view('ajouter_posologie',["errors"=>$posologie->errors]);


        }else{
            $this->redirect('login');
        }
    }

    public function liste()
    {

        if (isset($_SESSION['pseudo'])) {

            $posologie=new Posologie();
            $posologies=$posologie->SelectAllData('*','posologie');
            $this->view('posologie',['posologies'=>$posologies]);

        }else{
            $this->redirect('login');
        }
    }

    public function edit($id)
    {

        if (isset($_SESSION['pseudo'])) {

            $posologie=new Posologie();

            if(isset($_POST['submit'])){
                $posologie->InsrtionUdateData(['type_posologie','num_posologie']);
            }

            $posologies=$posologie->FetchSelectWhere('*','posologie','num_posologie=:num_posologie',[':num_posologie'=>$id]);
            $this->view('ajouter_posoligie',['posologie'=>$posologies]);

        }else{
            $this->redirect('login');
        }
    }
}