<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 18/04/2023
 * Time: 13:23
 */

class Analyses extends Controller
{
    public function index(){
        if (isset($_SESSION['pseudo'])) {

            $analyse=new Analyse();
            $patient=new Patient();
            $structure=new Structure();
            $structures=$structure->SelectAllData('*','structure');
            $patients=$patient->SelectAllData('*','patient');
            $analysesDemandes=$analyse->SelectAllData('*','demandeexamen de join patient pat ON pat.num_patient=de.idPatient where bilanExamen is null and de.idPatient is  NOT null');
            $this->view('analyseTicket',["structures"=>$structures,"analysesDemandes"=>$analysesDemandes,"patients"=>$patients]);
        }else{
            $this->redirect('login');
        }
    }

    public function Liste(){
        if (isset($_SESSION['pseudo'])) {

            $analyse=new Analyse();
            $patient=new Patient();
            $structure=new Structure();
            $structures=$structure->SelectAllData('*','structure');
            $patients=$patient->SelectAllData('*','patient');
            $analysesDemandes=$analyse->SelectAllData('*','demandeexamen de join examen  ex on de.nomExamen=ex.num_examen');
            $this->view('analyse',["structures"=>$structures,"analysesDemandes"=>$analysesDemandes,"patients"=>$patients]);
        }else{
            $this->redirect('login');
        }
    }

    public function analyse_realise(){
        if (isset($_SESSION['pseudo'])) {

            $analyse=new Analyse();
            $patient=new Patient();
            $structure=new Structure();
            $structures=$structure->SelectAllData('*','structure');
            $patients=$patient->SelectAllData('*','patient');
            $analysesDemandes=$analyse->SelectAllData('*','demandeexamen de join patient pat ON pat.num_patient=de.idPatient where bilanExamen is not null and de.idPatient is  NOT null');
            $this->view('analyse_realise',["structures"=>$structures,"analysesDemandes"=>$analysesDemandes,"patients"=>$patients]);
        }else{
            $this->redirect('login');
        }
    }

    public function AjoutAnalyse($id){

        if (isset($_SESSION['pseudo'])) {

            $analyse=new AjouterAnalyse();

            if (isset($_POST['submit'])) {


                    $analyse->InsrtionData(['patient', 'typeAnalyse', 'motif', 'dateDemande',"idConsultation"]);
//                    echo $_POST['dateDemande']."<br> ";
//                    echo $_POST['typeAnalyse']."<br> ";
//                    echo $_POST['motif']."<br> ";
//                    echo $_POST['patient'];exit();

            }

            $structure=new Structure();
            $patient=new Patient();
            $examen=new Examen();
            $patients=$patient->SelectAllData('*','patient');
            $patients_actus=$patient->FetchSelectWhere('*','patient pat join consultation con ON con.idpatient=pat.num_patient','con.num_consult=:id',[':id'=>$id]);
            $examens=$examen->SelectAllData('*','examen');
            $structures=$structure->SelectAllData('*','structure');


            $this->view('ajouter_analyse',["errors"=>$analyse->errors,"structures"=>$structures,"examens"=>$examens,'patients'=>$patients,'patients_actus'=>$patients_actus,"idConsultation"=>$id]);

        }else{
            $this->redirect('login');
        }
    }



    public function AjoutAnalyseEdite($id){

        if (isset($_SESSION['pseudo'])) {

            $analyse=new AjouterAnalyse();

            if (isset($_POST['modifier'])) {

                $analyse->InsrtionData(['typeAnalyse', 'motif', 'dateDemande',"idAnalyse"]);
            }

            $structure=new Structure();
            $patient=new Patient();
            $examen=new Examen();
            $patients=$patient->SelectAllData('*','patient');
            $editAnalyse=$patient->FetchSelectWhere('*','demandeexamen de join patient pat on pat.num_patient=de.idPatient 
            join examen on examen.num_examen=de.nomExamen','de.numDemanceExamen=:id',[':id'=>$id]);
            $examens=$examen->SelectAllData('*','examen');
            $structures=$structure->SelectAllData('*','structure');


            $this->view('ajouter_analyse',["errors"=>$analyse->errors,"structures"=>$structures,"examens"=>$examens,'patients'=>$patients,'editAnalyse'=>$editAnalyse,"id"=>$id]);

        }else{
            $this->redirect('login');
        }
    }

}