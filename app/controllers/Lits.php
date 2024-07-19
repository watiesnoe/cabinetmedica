<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 28/11/2022
 * Time: 17:22
 */

class Lits extends Controller
{
    public function index(){
        if(isset($_SESSION['pseudo'])){

            $lit=new Lit();
            if (isset($_POST['submit'])){
                $lit->InsrtionUdateData(['lit','nomSalle']);
            }
            $structure=new Structure();
            $data=$structure->SelectAllData('*','structure');
            $select=$this->dataselect($data);

            $this->view('ajouter_lit',['row'=>$select,'lit'=>$lit->errors]);

        }else{
            $this->redirect('login');
        }
    }
    public function dataselect($data){
        $output="";
        foreach($data as $row)
        {
            $output .="<option value='$row->num_structure'>$row->nom_structure</option>";
        }

        return $output;
    }


    public function liste(){
        if(isset($_SESSION['pseudo'])){
            $lit=new Lit();
            $salle=new Salle();
            $structure=new Structure();
            $lits=$lit->SelectAllData("*","lit");
            $salles=$salle->SelectAllData("*","salle");
            $structures=$structure->SelectAllData("*","structure");
            $this->view('lit',['lits'=>$lits,'lit'=>$lit->errors,"salles"=>$salles,"structures"=>$structures]);
            
        }else{
            $this->redirect('login');
        }
    }

    public function edit($id){
        if(isset($_SESSION['pseudo'])){

            $lit=new Lit();
            if (isset($_POST['submit'])){
                $lit->InsrtionUdateData(['lit','id_lit']);
            }

            $datas=$lit->FetchSelectWhere('*', 'lit',' num_lit=:id_lit',[":id_lit"=>$id]);

            $this->view('ajouter_lit',['lits'=>$datas,'lit'=>$lit->errors,"id"=>$id]);

        }else{
            $this->redirect('login');
        }
    }

}