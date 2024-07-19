<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 14/03/2023
 * Time: 13:03
 */

class Salles extends Controller
{
    public  function index(){

        if (isset($_SESSION['pseudo'])) {

            $salle=new Salle();
            $structure=new Structure();
            if(isset($_POST['submit'])){

                $salle->InsrtionUdateData(['nomSalle','structure']);
            }
            
            $structures=$structure->SelectAllData('*','structure');

            $select=$this->dataselect($structures);


            $this->view('ajouter_salle',["row"=>$select]);

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
        if (isset($_SESSION['pseudo'])) {

            $salle=new Salle();
            $salles=$salle->SelectAllData('*',"salle INNER JOIN structure ON salle.num_structure=structure.num_structure ORDER BY num_Salle DESC");

            $this->view('salle',['salles'=>$salles]);


        }else{
            $this->redirect('login');
        }
    }
    public function edit($id){

        if (isset($_SESSION['pseudo'])) {

            $salle=new salle();

            if(isset($_POST['submit'])){

                $salle->InsrtionUdateData(['nomSalle','codesalle']);
            }

            $salles=$salle->FetchSelectWhere("*", "salle INNER JOIN structure ON salle.num_structure=structure.num_structure ",'salle.num_salle=:codeSalle',[':codeSalle'=>$id]);

            $this->view('ajouter_salle',['salle'=>$salles,"id"=>$id]);

        }else{
            $this->redirect('login');
        }
    }
}