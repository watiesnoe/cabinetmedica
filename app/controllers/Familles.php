<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 28/03/2023
 * Time: 09:26
 */

class Familles extends Controller
{

    public function index(){
        if(isset($_SESSION['pseudo'])){

            $famille=new Famille();
            if (isset($_POST['submit'])){
                $famille->InsrtionUdateData(['nom_famille']);
            }
            $data=$famille->SelectAllData('*','famille');
            $select=$this->dataselect($data);

            $this->view('ajouter_famille',['familles'=>$select,'famille'=>$famille->errors]);

        }else{
            $this->redirect('login');
        }
    }
    public function dataselect($data){
        $output="";
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->id_fami.'">'.$row->nom_famille.'</option>';
        }
        return $output;
    }
    public function liste(){
        if(isset($_SESSION['pseudo'])){
            $famille=new Famille();

            $datas=$famille->SelectAllData('*','famille');

            $this->view('famille',['familles'=>$datas,'famille'=>$famille->errors]);

        }else{
            $this->redirect('login');
        }
    }
    public function edit($id){

        if(isset($_SESSION['pseudo'])){

            $famille=new Famille();

            if (isset($_POST['submit'])){

                $famille->InsrtionUdateData(['nom_famille','id_fami']);
            }

            $datas=$famille->FetchSelectWhere('*', 'famille' ,'id_fami=:id',[":id"=>$id]);

            $this->view('ajouter_famille',['famille'=>$datas,'familles'=>$famille->errors,"id"=>$id]);

        }else{
            $this->redirect('login');
        }
    }
}