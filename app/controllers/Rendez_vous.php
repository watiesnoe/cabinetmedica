<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 19/04/2023
 * Time: 14:30
 */

class Rendez_vous extends Controller
{
    public function index(){
        if (isset($_SESSION['pseudo'])) {
            $rendezvous=new Rendezvous();
            $datas=$this->_findBYiD('id');

            $this->view('rendezvous',['datas'=>$datas]);

        }else{
            $this->redirect('login');
        }
    }
    public function rendezvous_effectue(){
        if (isset($_SESSION['pseudo'])) {

            $datas=$this->_findBYiD();

            $this->view('rendezvous',['datas'=>$datas]);

        }else{
            $this->redirect('login');
        }
    }
    private function _findBYiD($id=null){

        //$date=date('Y-m-d');
        $rendezvous=new Rendezvous();
        if ($_SESSION['role']==='supAdmin'||$_SESSION['role']==='admin'){
            if (isset($id)) {


                $sql="SELECT * FROM patient 
                INNER JOIN rendez_vous ON patient.num_patient=rendez_vous.idpatient
                WHERE rendez_vous.effectuer is NULL ";

                try {

                    $stmt = $rendezvous->bdd()->prepare($sql);


                    $stmt->execute();

                    $results = $stmt->fetchAll(PDO::FETCH_OBJ);

                    $stmt->closeCursor();

                    return $results;

                }catch ( Exception $e ) {

                    die ( $e->getMessage() );
                }

            }else{

                $sql="SELECT * FROM patient 
                INNER JOIN rendez_vous ON patient.num_patient=rendez_vous.idpatient WHERE effectuer is  NOT NULL   ORDER BY rendez_vous.jour";

                try {

                    $stmt = $rendezvous->bdd()->prepare($sql);

                    $stmt->execute();

                    $results = $stmt->fetchAll(PDO::FETCH_OBJ);

                    $stmt->closeCursor();

                    return $results;


                }catch ( Exception $e ) {

                    die ( $e->getMessage() );
                }

            }
        }else{
            if (isset($id)) {


                $sql="SELECT * FROM patient 
                INNER JOIN rendez_vous ON patient.num_patient=rendez_vous.idpatient
                WHERE rendez_vous.effectuer is NULL and numAgent=:id ";

                try {

                    $stmt = $rendezvous->bdd()->prepare($sql);


                    $stmt->execute([':id'=>$_SESSION['user_id']]);

                    $results = $stmt->fetchAll(PDO::FETCH_OBJ);

                    $stmt->closeCursor();

                    return $results;


                }catch ( Exception $e ) {

                    die ( $e->getMessage() );
                }

            }else{

                $sql="SELECT * FROM patient 
                INNER JOIN rendez_vous ON patient.num_patient=rendez_vous.idpatient WHERE effectuer is  NOT NULL  and numAgent=:id  ORDER BY rendez_vous.jour";

                try {

                    $stmt = $rendezvous->bdd()->prepare($sql);

                    $stmt->execute([':id'=>$_SESSION['user_id']]);

                    $results = $stmt->fetchAll(PDO::FETCH_OBJ);

                    $stmt->closeCursor();

                    return $results;

                }catch ( Exception $e ) {

                    die ( $e->getMessage() );
                }

            }
        }
    }
}