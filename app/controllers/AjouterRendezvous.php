<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 20/04/2023
 * Time: 09:13
 */

class AjouterRendezvous extends Controller
{
    public function index($id=null){
        if(isset($_SESSION['pseudo'])){
            $rendezvous=new Rendezvous();

            if (isset($_POST['submit'])){
                $rendezvous->InsrtionData(['idPatient','motif','dateRendezVous','heureRendezVous']);
            }

            if (isset($_POST['idRdv'])){
                echo $rendezvous->statut(['idRdv']);exit();
            }

            $data=  $rendezvous->FetchSelectWhere('*','patient','num_patient=:id',[':id'=>$id]);

            $patients=$rendezvous->SelectAllData("*",'patient');

            $this->view('ajouter_rendezvous',['data'=>$data,'patients'=>$patients]);

        }else{
            $this->redirect('login');
        }
    }
    public function edit($id){

        if(isset($_SESSION['pseudo'])){

            $rendezvous=new Rendezvous();
            $patient=new Patient();

            if (isset($_POST['submit'])){
                $rendezvous->InsrtionData(['idPatient','motif','dateRendezVous','heureRendezVous','idRendezVous']);
                // echo $_POST['dateRendezVous'];exit;
            }

            $data=  $rendezvous->FetchSelectWhere('*','patient 
                INNER JOIN rendez_vous ON patient.num_patient=rendez_vous.idpatient
                ','num_rendez=:id',[':id'=>$id]);
            $patients=$patient->SelectAllData('*','patient');
            $this->view('ajouter_rendezvous',['data'=>$data,'patients'=>$patients,"edit"=>$id]);

        }else{
            $this->redirect('login');
        }
    }

}