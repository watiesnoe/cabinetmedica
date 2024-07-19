<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 18/04/2023
 * Time: 13:44
 */

class AjouterAnalyses extends Controller
{

    public function index($id=null){

        if (isset($_SESSION['pseudo'])) {

            $analyse=new AjouterAnalyse();


            if (isset($_POST['submit']))
            {

                $analyse->InsrtionData(['patient', 'typeAnalyse', 'motif', 'dateDemande', 'nomStructure']);
            }

            $examens=$this->Examen($id);
            $patients=$this->patientData($id);

            $structure=new Structure();
            $data=$structure->SelectAllData('*','structure');

            $this->view('ajouter_analyse',['examens'=>$examens,"patients"=>$patients]);

        }else{
            $this->redirect('login');
        }

    }

    public function AjoutAnalyse($id){

        if (isset($_SESSION['pseudo'])) {

            $analyse=new AjouterAnalyse();

            if (isset($_POST['submit'])) {

                if (isset($id)) {

                    $analyse->InsrtionData(['patient', 'typeAnalyse', 'motif', 'dateDemande', 'nomStructure',"idAnalyse"]);

                }else{
                    $analyse->InsrtionData(['patient', 'typeAnalyse', 'motif', 'dateDemande', 'nomStructure']);
                }
            }

            $examen=NEW Examen();

            $patient=new Patient();
            $patients=$patient->SelectAllData('*','Patient');
            $examens=$examen->SelectAllData('*','examen');

            $structure=new Structure();

            $editAnalyse=$analyse->FetchSelectWhere('*',"demandeexamen de join patient pat pat.num_patient=de.idPatient 
            join examen ex ON ex.num_examen=de.nomExamen","de.numDemanceExamen=id",[':id'=>$id]);

            $data=$structure->SelectAllData('*','structure');


            $this->view('ajouter_analyse',['examens'=>$examens,"patients"=>$patients,"id"=>$id,"editAnalyse"=>$editAnalyse]);

        }else{

            $this->redirect('login');
        }
    }

    public function editFonction($id=null){
        $analyse=new AjouterAnalyse;
        if (isset($id)) {

            $sql="SELECT nomPatient,prenomPatient,nom,motif,nomMed,prenomMed,
				dateDamande,numDemanceExamen,
				telephonePat,nomStructure,patient.idPatient,
				structure.codeStructure,examen.codeExamen FROM patient 
				JOIN  demandeexamen ON `patient`.`idPatient`=`demandeexamen`.`idPatient`
				INNER JOIN examen ON examen.codeExamen=demandeexamen.typeExamen
				INNER JOIN utilisateur ON utilisateur.idUt=demandeexamen.idMedecin
				INNER JOIN structure ON structure.codeStructure=demandeexamen.codeStructure
				INNER join agent ON agent.numAgent=utilisateur.numAgent
				WHERE medecinAnalyste is  NULL AND numDemanceExamen=:id";

            try {

                $stmt = $analyse->bdd()->prepare($sql);

                $stmt->execute([':id'=>$id]);

                $results= $stmt->fetch(PDO::FETCH_OBJ);

                $stmt->closeCursor();

                return $results;


            }catch ( Exception $e ) {

                die ( $e->getMessage() );
            }

        }

    }
    public function Reponses($id=null){

        $analyse=new AjouterAnalyse();


        if (isset($_POST['submit'])){

            $analyse->DoneAnalyseUpdate(['resultat','idAnalyse']);
        }
        $data_examenPanier=$analyse->FetchAllSelectWhere('li.id_examen,num_examen,numDemanceExamen,prix_axamen,nom_examen,code_examen ',
            'demandeexamen de  join ligne_analyse  li on li.examen_dema=de.numDemanceExamen join examen ex  on  li.id_examen=ex.num_examen ',
            'numDemanceExamen=:id',[':id'=>$id]);

        $analyse=$this->editFonctionAnaliste($id);
        $this->view('AnalyseReponse',['analyse'=>$analyse,"id"=>$id,"data_examenPanier"=>$data_examenPanier]);

    }

    public function Edit($id=null){

        $analyse=new AjouterAnalyse();


        if (isset($_POST['submit'])){

            $analyse->DoneAnalyseUpdate(['resultat','idAnalyse']);
        }
        $data_examenPanier=$analyse->FetchAllSelectWhere('li.id_examen,num_examen,numDemanceExamen,prix_axamen,nom_examen,code_examen ',
            'demandeexamen de  join ligne_analyse  li on li.examen_dema=de.numDemanceExamen join examen ex  on  li.id_examen=ex.num_examen ',
            'numDemanceExamen=:id',[':id'=>$id]);

        $analyse=$this->editFonctionAnaliste($id);
        $this->view('AnalyseReponse',['analyse'=>$analyse,"idAliste"=>$id,"data_examenPanier"=>$data_examenPanier]);
    }

    protected function patientData($id=null){
        $analyse=new AjouterAnalyse();
        $bdd=$analyse->bdd();

        if (isset($id)){

            $query ="SELECT * FROM patient WHERE idPatient=:id";

            $statement = $bdd->prepare($query);

            $statement->execute([':id'=>$id]);

            $result = $statement->fetch(PDO::FETCH_OBJ);

            $statement->closeCursor();

            return $result;

        }else{

            $query ="SELECT * FROM patient ";

            $statement = $bdd->query($query);

            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_OBJ);

            $statement->closeCursor();

            return $result;
        }

    }

    private function Examen($id=null){

        $analyse=new AjouterAnalyse();
        $bdd=$analyse->bdd();

        $sql="SELECT * FROM examen";

        try {

            $stmt = $bdd->prepare($sql);

            $stmt->execute();

            $results = $stmt->fetchAll(PDO::FETCH_OBJ);

            $stmt->closeCursor();

            return $results;

        }catch ( Exception $e ) {
            die ( $e->getMessage() );
        }

    }

    public function dataselect($data){
        $output="";
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->codeStructure.'">'.$row->nomStructure.' </option>';
        }

        return $output;
    }


    protected  function editFonctionAnaliste($id=null){

        $analyse=new AjouterAnalyse();
        $bdd=$analyse->bdd();

        if (isset($id)) {

            $sql="SELECT nom_patient,prenom_patient,age_patient,bilanExamen  FROM
                demandeexamen de 
                join patient pat ON pat.num_patient=de.idPatient
            
                 WHERE numDemanceExamen=:id";

            try {

                $stmt = $bdd->prepare($sql);

                $stmt->execute([':id'=>$id]);

                $results= $stmt->fetch(PDO::FETCH_OBJ);

                $stmt->closeCursor();

                return $results;


            }catch ( Exception $e ) {

                die ( $e->getMessage() );
            }

        }

    }

}