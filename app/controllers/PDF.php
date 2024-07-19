<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 01/04/2023
 * Time: 22:22
 */

class PDF extends Controller
{
    public function index(){

        if(isset($_SESSION['pseudo'])){

            $this->view('PDFticket');
        }else{
            $this->redirect('login');
        }
    }
    public  function PdfTicket($id){

        $ticket=new Ticket();
        $consultation=new Consultation();
        $patient=new Patient();
        $bdd=$consultation->bdd();
        $patients=$patient->SelectAllData('*','patient');
        $consultations=$consultation->SelectAllData('*','consultation');
        $tickets=$ticket->FetchSelectWhere(" *",'ticket','num_ticket=:id',[':id'=>$id]);
        $this->view('PDFticket',['ticket'=>$tickets,"idTicket"=>$id,"patients"=>$patients,"consultations"=>$consultations,'bdd'=>$bdd]);
    }

    public function detaille_ordo($idOrdo)
    {
        if (isset($_SESSION['pseudo'])) {


            $patient=new Patient();
            $consultation=new Consultation();
            $ordonnance=new Ordonnance();
            $utilisateur=new Utilisateur();
            $patients=$patient->SelectAllData("*","patient");
            $consultations=$consultation->SelectAllData("*","consultation");
            $utilisateurs=$utilisateur->SelectAllData("*","medecin");
            $ordonnances=$ordonnance->FetchSelectWhere("*","ordonnance","num_ordo=:id",[":id"=>$idOrdo]);
            $bdd=$ordonnance->bdd();

            $this->view('Allpdf',["idOrdo"=>$idOrdo,"bdd"=>$bdd,"ordonnace"=>$ordonnances,
               "utilisateurs"=>$utilisateurs,"patients"=>$patients,"consultations"=>$consultations]);

        }else{
            $this->redirect('login');
        }
    }

    public function detaille_demandeAnalyse($idAnalyse)
    {
        if (isset($_SESSION['pseudo'])) {

            $analyse=new Analyse();

           $bdd=$analyse->bdd();

           $this->view('Allpdf',["idAnalyse"=>$idAnalyse,"bdd"=>$bdd]);

        }else{
            $this->redirect('login');
        }
    }

    public function detaille_AnalyseRealise($idAnalyse)
    {
        if (isset($_SESSION['pseudo'])) {

            $analyse=new Analyse();

           $bdd=$analyse->bdd();

           $this->view('PDFanalyse',["idAnalyseRealise"=>$idAnalyse,"bdd"=>$bdd]);

        }else{
            $this->redirect('login');
        }
    }

    public function dossier_patient($dossier)
    {
        if (isset($_SESSION['pseudo'])) {

            $consultation=new Consultation();

           $bdd=$consultation->bdd();

           $this->view('Allpdf',["dossier"=>$dossier,"bdd"=>$bdd]);

        }else{
            $this->redirect('login');
        }
    }

    public function dossier_rendezvous($idRdv)
    {
        if (isset($_SESSION['pseudo'])) {

            $consultation=new Consultation();

           $bdd=$consultation->bdd();

           $this->view('Allpdf',["idRdv"=>$idRdv,"bdd"=>$bdd]);

        }else{
            $this->redirect('login');
        }
    }

    public function commande_pdf($idCommande)
    {
        if (isset($_SESSION['pseudo'])) {

            $commande=new Commande();

           $bdd=$commande->bdd();


           $this->view('Allpdf',["idCommande"=>$idCommande,"bdd"=>$bdd]);

        }else{
            $this->redirect('login');
        }
    }
}