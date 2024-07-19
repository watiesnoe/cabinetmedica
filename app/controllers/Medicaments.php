<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 16/03/2023
 * Time: 10:03
 */

class Medicaments extends Controller
{
    public function index(){
        if (isset($_SESSION['pseudo'])){
            $medicament=new Medicament();
            $conditionnement=new Famille();
            $unite=new Unite();
            if (isset($_POST['submit'])){
                $medicament->insertionUpdate_function(['dci','famille','dosage','forme','prix_vente','prix_achat','stock_alert','unite']);
            }

            $data=$conditionnement->SelectAllData('*','famille');
            $unites=$unite->SelectAllData('*','unite');
            $select=$this->dataselect($data,'id_fami','nom_famille');
            $unites_prod=$this->dataselect($unites,"id_unit","code_nom");
            $errors=$medicament->errors;
            $this->view('ajouter_medicament',['contionnements'=>$select,'unites'=>$unites,"errors"=>$errors]);

        }else{
           $this->redirect('login');
        }
    }

    public function liste(){
        if (isset($_SESSION['pseudo'])){

            $medicament=new Medicament();
            $medicaments=$medicament->SelectAllData("*",'medicament');
            $this->view('medicament',['medicaments'=>$medicaments]);

        }else{
            $this->redirect('login');
        }
    }
    public function edit($id)
    {
        if (isset($_SESSION['pseudo'])){
            $medicament=new Medicament();
            $conditionnement=new Famille();

            $unite=new Unite();
            if (isset($_POST['modifier'])){

                $medicament->insertionUpdate_function(['dci','dosage','forme','prix_vente','prix_achat','stock_alert','unite','famille','idMedicament']);
            }

            $data=$conditionnement->SelectAllData('*','famille');


            $unites=$unite->SelectAllData('*','unite');


            $medicaments=$medicament->FetchSelectWhere('*','medicament join unite on unite.id_unit=medicament.id_unit 
                join famille on famille.id_fami=medicament.id_fami','idMedicament=:id',[":id"=>$id]);
            $this->view('ajouter_medicament',["medicament"=>$medicaments,"familles"=>$data,"unites"=>$unites,'id'=>$id]);

        }else{
            $this->redirect('login');
        }
    }

    public function dataselect($data,$valeur1,$valeur2){
        $output="";
        foreach($data as $row)

        {
            $output .= '<option value="'.$row->$valeur1.'">'.$row->$valeur2.'</option>';
        }
        return $output;
    }

}