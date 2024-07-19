<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 02/12/2022
 * Time: 12:33
 */

class Payement_ord extends Controller
{
    public function index(){
        if (isset($_SESSION['pseudo'])){

            $vente=new Payement_ordo();

            $ordonnance=new  Ordonnance();
            

            if(isset($_POST['ordo']) and isset($_POST['hidden_id'])){

                echo $vente->InsrtionData(["ordo","hidden_id","prix_total","idmedicament","quantiteMedi"]);exit();
            }

            $ordonnances = $ordonnance->SelectAllData("*",'ordonnance WHERE dateAchat IS NULL');
            $this->view('payement_ord',['ordonnances'=>$ordonnances]);

        }else{
            $this->redirect('login');
        }
    }
    public function dataselect($data){
        $output="";
        foreach($data as $medicament)
        {
            $output .= '<option value="'.$medicament->idMedicament.'">'.$medicament->dci.' '.$medicament->dosage.' '.$medicament->forme.'</option>';
        }

        return $output;
    }

    public function ordonnance_payer()
    {
        if (isset($_SESSION['pseudo'])) {

            $ordonnance=new Ordonnance();
            $consultation=new Consultation();
            $patient=new Patient();

            $contenir=$ordonnance->SelectAllData("*",'ligne_vente');

            $patients=$patient->SelectAllData("*",'patient');

            $consultations=$consultation->SelectAllData("*",'consultation');

            $ordonnances = $ordonnance->SelectAllData("*",'ordonnance where dateAchat IS NOT NULL');

            $this->view('payement_ord_vendu',['ordonnances'=>$ordonnances,"patients"=>$patients,'consultations'=>$consultations]);
        }else{
            $this->redirect('login');
        }
    }

}