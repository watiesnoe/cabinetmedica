<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 27/03/2023
 * Time: 08:13
 */

class Consultations extends Controller
{
    public function  index(){

        if(isset($_SESSION['pseudo'])){

            $consultation=new  Consultation();
            $ticket=new  Ticket();
            $patient=new  Patient();

            $consultations=$consultation->SelectAllData('*','consultation');
            $tickets=$ticket->SelectAllData('*','ticket');
            $patients=$patient->SelectAllData('*','patient');

            $this->view('consultation',['patients'=>$patients,'tickets'=>$tickets,'consultations'=>$consultations]);
        }else{
            $this->redirect('login');
        }
    }
    public function  Consultation($id){

        if(isset($_SESSION['pseudo'])){

            $consultation=new  Consultation();
            $ticket=new  Ticket();
            $patient=new  Patient();
            $structure=new  Structure();
            $symptome=new  Symptome();

           
  
            $data=$ticket->FetchSelectWhere('*','ticket join patient  ON patient.num_patient=ticket.idPatient join consultation con ON con.num_ticket=ticket.num_ticket'
            ,'ticket.num_ticket=:id'
            ,[':id'=>$id]);

            $structures=$structure->SelectAllData('*','structure');

            $symptomes=$symptome->SelectAllData('*','symptome');

            $structures_data=$this->dataselect($structures);

            $consultations=$consultation->SelectAllData('*','consultation');

            $patients=$patient->SelectAllData('*','patient');

            $this->view('ajouter_consultation',['datas'=>$data,'patients'=>$patients,'consultations'=>$consultations,
                'rows'=>$structures_data,'symptomes'=>$symptomes,'consults'=>$consultation->errors,'id'=>$id]);

        }else{
            $this->redirect('login');
        }
    }

    public function dataselect($data){
        $output="";
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->num_structure.'">'.$row->nom_structure.'</option>';
        }

        return $output;
    }

    public function liste(){

        if(isset($_SESSION['pseudo'])){

            $consultation=new  Consultation();

            $ticket=new  Ticket();

            $patient=new  Patient();

            $consultations=$consultation->SelectAllData('*','consultation');

            $tickets=$ticket->SelectAllData('*','ticket');

            $patients=$patient->SelectAllData('*','patient');

            $this->view('consultation_effectue',['patients'=>$patients,'tickets'=>$tickets,'consultations'=>$consultations]);

        }else{
            $this->redirect('login');
        }
    }
    public function liste_rdv(){

        if(isset($_SESSION['pseudo'])){

            $consultation=new  Consultation();

            $rdv=new  Rendezvous();

            $patient=new  Patient();

            $consultations=$consultation->SelectAllData('*','consultation');

            $rdvs=$rdv->SelectAllData('*','rendez_vous');

            $patients=$patient->SelectAllData('*','patient');

            $this->view('consultation_effectue_rdv',['patients'=>$patients,'rdvs'=>$rdvs,'consultations'=>$consultations]);

        }else{
            $this->redirect('login');
        }
    }

    public function edit($id){

        $consultation=new Consultation();
        $structure=new Structure();
        $ticket=new Ticket();
        $patient=new Patient();
       
        $data=$ticket->FetchSelectWhere('*','ticket join patient  ON patient.num_patient=ticket.idPatient 
        join consultation con ON con.num_ticket=ticket.num_ticket'
        ,'con.num_ticket=:id',[':id'=>$id]);
        $structures=$structure->SelectAllData('*','structure');

        $structures_data=$this->dataselect($structures);

        $consultations=$consultation->SelectAllData('*','consultation');

        $patients=$patient->SelectAllData('*','patient');

        $this->view('edit_consultation',['datas'=>$data,'patients'=>$patients,
        'consultations'=>$consultations,
            'rows'=>$structures_data,'consults'=>$consultation->errors,'edit'=>$id]);
    }
    public function edit_rdv($id){

        $consultation=new Consultation();

        $rdv=new Rendezvous();
        $patient=new Patient();

        if (isset($_POST['modifier'])){

            $consultation->Modifiacation_consultation_rdv(["motif_consultation",
              "diagnostique","resultat_clinique"],$id,$_POST["antecedant_medicaux"],$_POST["antecedant_chirigicale"],$_POST["antecedant_familiale"],$_POST["antecedant_autre"]);
        }
       
        $consultations=$consultation->FetchSelectWhere('*','rendez_vous  rdv join patient pat ON pat.num_patient=rdv.idpatient 
            join consultation con ON con.idRendezVous=rdv.num_rendez ','rdv.num_rendez=:id',[':id'=>$id]);    
  

        $patients=$patient->SelectAllData('*','patient');

        $this->view('edit_consultation_rdv',['patients'=>$patients,'datas'=>$consultations,
            'consults'=>$consultation->errors,'edit_rdv'=>$id]);
    }

    public function rdvfetch($id){
        if (isset($_SESSION['pseudo'])) {

            $consultation=new Consultation();
            $rdv=new Rendezvous();

//            if (isset($_POST['rdv_envoyer'])){
//                $consultation->Consultation_rdv(["motif_consultation",
//                "diagnostique","resultat_clinique"],$id,$_POST["antecedant_medicaux"],
//                $_POST["antecedant_chirigicale"],
//                $_POST["antecedant_familiale"],
//                $_POST["antecedant_autre"]);
//            }
            
            $structure=new Structure();
            // $datas=$structure->SelectAllData('*','structure');
            // $select=$this->dataselect($datas);
            $datas=$rdv->FetchSelectWhere('*','rendez_vous  rdv join patient pat ON pat.num_patient=rdv.idpatient 
            ','num_rendez=:id',[':id'=>$id]);

            $this->view('ajouter_consultation_rdv',['datas'=>$datas,'rdv'=>$id]);

        }else{
            $this->redirect('login');
        }

    }

    public function list_consultation_dataille($id){

        if (isset($_SESSION['pseudo'])) {

            $consultation=new Consultation();

            $data=$consultation->select_data_table_join_where('SELECT * from patient WHERE idPatient=:id',[':id'=>$id]);

            $datas=$consultation->FetchAllSelectWhere('*','patient 
    
                INNER JOIN ticket ON patient.num_patient= ticket.idPatient 
    
                INNER JOIN consultation ON ticket.num_ticket = consultation.num_ticket','ticket.idPatient=:id',[":id"=>$id]);

            $datasRDV=$consultation->FetchAllSelectWhere('*','patient INNER JOIN rendezvous ON patient.idPatient=rendezvous.idPatient
                
                INNER JOIN consultation ON consultation.idRendezVous=rendezvous.num_rendez	','patient.num_patient=:id',[":id"=>$id]);

            $analyses=$consultation->FetchAllSelectWhere('*','patient 
				JOIN  demandeexamen ON `patient`.`num_patient`=`demandeexamen`.`idPatient`
				INNER JOIN examen ON examen.codeExamen=demandeexamen.typeExamen
				INNER JOIN utilisateur ON utilisateur.idUt=demandeexamen.medecinAnalyste
				INNER join agent ON agent.numAgent=utilisateur.numAgent
				WHERE medecinAnalyste is not  NULL AND demandeexamen.idPatient=:id AND demandeexamen
				.idMedecin=:idMedecin',[':id'=>$id,':idMedecin'=>$_SESSION['user_id']]);

            $this->view('patient_dossier',['data'=>$data,'datas'=>$datas,'datasRDV'=>$datasRDV,'analyses'=>$analyses,'id'=>$id]);

        }else{
            $this->redirect('login');
        }
    }

   public function Store()  {
        $consultation=new  Consultation();
        $ticket=new  Ticket();
        $patient=new  Patient();
        $structure=new  Structure();
        $symptome=new  Symptome();

        if (isset($_POST['idpatient'])){
            echo  $consultation->Patient(["adresse_patient","idpatient","fils",
            "groupesangine","stuation_matrimonial","poids", "taille",
            "diagnostique","resultat_clinique","edit"],$_POST["antecedant_medicaux"],
            $_POST["antecedant_chirigicale"],
            $_POST["antecedant_familiale"],
            $_POST["antecedant_autre"]);exit();
        }
   }
   public function Store_rdv()  {
        $consultation=new  Consultation();
        $ticket=new  Ticket();
        $patient=new  Patient();
        $structure=new  Structure();
        $symptome=new  Symptome();

         if (isset($_POST['patient'])){
             echo $consultation->Consultation_rdv(["diagnostique","resultat_clinique",'edit','patient'],
             $_POST["antecedant_medicaux"],$_POST["antecedant_chirigicale"],
             $_POST["antecedant_familiale"],$_POST["antecedant_autre"]); exit();
         }
   }

   public function Store_edit()  {
    $consultation=new  Consultation();
    $ticket=new  Ticket();

    if (isset($_POST['edit'])){

       echo $consultation->Modifiacation_consultation(["diagnostique","resultat_clinique",'edit'],
                $_POST["antecedant_medicaux"],$_POST["antecedant_chirigicale"],
                $_POST["antecedant_familiale"],$_POST["antecedant_autre"]);
        exit();

    }

   }

    
}