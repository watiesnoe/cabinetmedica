<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 27/03/2023
 * Time: 11:22
 */

class Tickets extends Controller
{
   public function index()
  {

      unset($_SESSION["medico"]);
     if(isset($_SESSION['pseudo'])){



         $structure=new Structure();

         $securite=new Securite_social();


         $structures=$structure->SelectAllData('*','structure');

         $securites=$securite->SelectAllData('*','securite_sociale');

         $datas=$this->dataselect($structures);

         $datasecurite=$this->dataSociale($securites);
         $examen=new Examen();


         $examens=$examen->SelectAllData('*','examen');


         $this->view('ajouter_ticket',["structure"=>$datas,'examens'=>$examens,"datasecurite"=>$datasecurite]);
     }else{
         $this->redirect('login');
     }
  }

   public function store(){
       if(isset($_SESSION["pseudo"])){
           $ticket=new Ticket();
           if (isset($_POST['typeticket']) && $_POST['typeticket']==="analyse"){

               if (isset($_POST['securite']) && !empty($_POST['securite'])) {

                   echo  $ticket->dataWithSecurityAnalyse(["telephone","nom","prenom","age","genre","ethnie","motif","typeticket","service","securite","frais_analyse"],$_POST['examens']);exit();

               }else{
                   echo  $ticket->dataWithOutSecurityAnalyse(["telephone","nom","prenom","age","genre","ethnie","motif","typeticket","service","frais_analyse"],$_POST['examens']);exit();
               }
           }else{
               if (isset($_POST['securite']) && !empty($_POST['securite'])) {

                   echo $ticket->dataWithSecurityConsultation(["telephone","nom","prenom","age","genre","ethnie","typeticket",'motif',"securite","service","frais"]);exit();
               }else{
                   echo $ticket->dataWithOutSecurityConsultation(["telephone","nom","prenom","age","genre","ethnie","typeticket",'motif',"service","frais"]);exit();
               }
           }

       }else{
           $this->redirect('login');
       }
    }
   public function dataselect($data){
        $output="";
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->num_structure.'">'.$row->nom_structure.' </option>';
        }
        return $output;
    }
   public function dataSociale($data){
        $output="";
        foreach($data as $row)
        {
            $output .= '<input type="radio" value="'.$row->idSecurite.'"  name="pourcantage" class="radio" id="'.$row->nom_societe.'"  checked>  <label for="'.$row->nom_societe.'" >'.$row->nom_societe.'</label>  <br>';
        }
    $output.='<input type="radio" value="autre" id="autre" name="pourcantage" class="radio">  <label for="autre">Autre</label> <br> <div class="autre_pourcentage"><label for="champ">Entrer le  pourcentage</label> <input type="number" value="" class="form-control col-4 champ"  name="champ"   id="champ" ></div> <br>';
        return $output;
    }
   public function liste(){
      if (isset($_SESSION['pseudo'])){
          $ticket=new Ticket();
          $patient=new Patient();
          $tickets=$ticket->SelectAllData('*','ticket');
          $patients=$patient->SelectAllData('*','patient');

          $this->view('ticket',['tickets'=>$tickets,'patients'=>$patients]);
      }else{
          $this->redirect('login');
      }
    }
   public function listeEffectuer(){
      if (isset($_SESSION['pseudo'])){
          $ticket=new Ticket();
          $patient=new Patient();
          $tickets=$ticket->SelectAllData('*','ticket');
          $patients=$patient->SelectAllData('*','patient');

          $this->view('ticketutilise',['tickets'=>$tickets,'patients'=>$patients]);
      }else{
          $this->redirect('login');
      }
    }
   public function DossierPatieint(){
      if (isset($_SESSION['pseudo'])){
          $ticket=new Ticket();
          $patient=new Patient();
          $tickets=$ticket->SelectAllData('*','ticket');
          $patients=$patient->SelectAllData('*','patient');

          $this->view('dossier_patient',['tickets'=>$tickets,'patients'=>$patients]);
      }else{
          $this->redirect('login');
      }
    }
   public function edit($id){

      if (isset($_SESSION['pseudo'])){

          $ticket=new Ticket();

          $patient=new Patient();

          $structure=new Structure();

          $securite=new Securite_social();


          $examen=new Examen();


          $examens=$examen->SelectAllData('*','examen');

          $tickets=$ticket->FetchSelectWhere('*','ticket join structure ON ticket.codeStructure=structure.num_structure 
          JOIN patient on patient.num_patient=ticket.idPatient',
              'num_ticket=:id',[':id'=>$id]);

          $data_examenPanier=$ticket->FetchAllSelectWhere('li.id_examen,num_examen,numDemanceExamen,prix_axamen,nom_examen,code_examen ',
          'demandeexamen de  join ligne_analyse  li on li.examen_dema=de.numDemanceExamen join examen ex  on  li.id_examen=ex.num_examen ',
          'num_ticket=:id',[':id'=>$id]);
//          $patients=$patient->SelectAllData('*','patient');
            
            $data=[];


            foreach ($data_examenPanier as $demande){
                $data[]=$demande->id_examen;
            }

          $structures=$structure->SelectAllData('*','structure');

          $securites=$securite->SelectAllData('*','securite_sociale');

        //   $bdd= $examen->bdd();

        //   $sql="SELECT * from examen  WHERE num_examen IN (".implode(',',$data).")";

        //   $data_examen=$bdd->prepare($sql);

        //   $data_examen->execute();

        //   $data_examenPanier=$data_examen->fetchAll(PDO::FETCH_OBJ);"numDemanceExamens"=>$numDemanceExamens,

          $this->view('edit_ticket',['ticket'=>$tickets,'datapanier'=>$data_examenPanier,'data'=>$data,'examens'=>$data_examenPanier,'id'=>$id,'structures'=>$structures,
              'examens'=>$examens,'patient'=>$patient,"securites"=>$securites]);
      }else{
          $this->redirect('login');
      }
    }
    public function editSotre(){
       if($_SESSION['pseudo']){
           $ticket=new Ticket();

           if (isset($_POST['idTicket']) && $_POST['typeticket']==="analyse"){

               if (isset($_POST['securite']) && !empty($_POST['securite'])) {

                   echo  $ticket->dataWithSecurityAnalyse(["telephone","nom","prenom","age","genre","ethnie",'idPatient',
                       "motif","typeticket",'idTicket',"service","securite","frais_analyse"],$_POST['examens']);exit();
               }else{
                   echo  $ticket->dataWithOutSecurityAnalyse(["telephone","nom","prenom","age","genre","ethnie",'idPatient',"motif","typeticket",'idTicket',"service","frais_analyse"],$_POST['examens']);exit();
               }
           }else{
               if (isset($_POST['securite']) && !empty($_POST['securite'])) {

                   echo $ticket->dataWithSecurityConsultation(["telephone","nom","prenom","age",'idTicket',"genre",'idPatient',"ethnie","typeticket",'motif',"securite","service","frais"]);exit();
               }else{
                   echo $ticket->dataWithOutSecurityConsultation(["telephone","nom","prenom","age","genre",'idTicket','idPatient',"ethnie","typeticket",'motif',"service","frais"]);exit();
               }
           }
       }else{
           $this->redirect('login');
       }
    }


}
