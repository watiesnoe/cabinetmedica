<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 27/03/2023
 * Time: 11:57
 */

class Ordonnances extends Controller
{
    public function index($id){

        if (isset($_SESSION['pseudo'])){

            $ordonnance=new  Ordonnance();
            $db=new  Medicament();

            if(isset($_POST['prescrir'])){

                $ordonnance->insertionUpdate_function(['idMedicement', 'posologie','quantite','idConsultation']);
            }

            $datas=$db->SelectAllData('*','medicament');
            $patient=$db->SelectAllData('*','consultation join patient');

            $select=$this->dataselect($datas);

            $this->view('ajouter_ordonnance',['medicaments'=>$select,'id'=>$id]);

        }else{
            $this->redirect('login');
        }
    }

    public function dataselect($data){
        $output="";
        foreach($data as $medicament)
        {
            $output .= '<option value="'.$medicament->idMedicament.'">Dci :'.$medicament->dci.'; '.' Dosage : '.$medicament->dosage.' ; forme : '.$medicament->forme.'; stock : ('.$medicament->stock.')</option>';
        }

        return $output;
    }

    public function edit($id){

        $ordonnance=new Ordonnance();

        $medicament=new Medicament();
        $medicaments=$medicament->SelectAllData("*",'medicament');
        $ordonnances=$ordonnance->FetchAllSelectWhere("*","ordonnance 
        INNER JOIN ligne_vente ON ordonnance.num_ordo=ligne_vente.num_ordo 
                
                INNER JOIN medicament ON ligne_vente.id_lot = medicament.idMedicament
                   ","ordonnance.num_ordo=:id",[':id'=>$id]);

        $patient=$ordonnance->select_data_table_join_where("SELECT * FROM patient 
            INNER JOIN consultation ON patient.num_patient=consultation.idpatient
            INNER JOIN ordonnance ON consultation.num_consult = ordonnance.num_consult 
            WHERE ordonnance.num_ordo =:id",[':id'=>$id]);


        if (isset($_POST['submit'])){
            $ordonnance->insertionUpdate_function(['idOrdonnance','idContenir', 'fomMedic0','posologie','quantite']);
        }

        $this->view('edit_ordonnance',['edit'=>$id,'ordonnances'=>$ordonnances,"patient"=>$patient,'medicaments'=>$medicaments]);

    }

    public function liste(){

        if (isset($_SESSION['pseudo'])) {

            $ordonnance=new Ordonnance();

            $contenir=$ordonnance->SelectAllData('*','ligne_vente');

            $patients=$ordonnance->SelectAllData('*','patient');

            $consultations=$ordonnance->SelectAllData('*','consultation');

            $ordonnances = $ordonnance->FetchAllSelectWhere('*','patient 
            INNER JOIN consultation ON patient.num_patient=consultation.idpatient
            INNER JOIN ordonnance ON consultation.num_consult = ordonnance.num_consult ',

             'dateAchat IS NULL',[]);

            $this->view('ordonnance',['ordonnances'=>$ordonnances,"patients"=>$patients,'consultations'=>$consultations]);
        }else{
            $this->redirect('login');
        }
    }
    public function dataselectOrdonnance(){
        $output="";
        $counter=0;
        $medicament=new Medicament();

        if(isset($_SESSION['ordo'])){
            $id=array_keys($_SESSION['ordo']);
            if(empty($id)){
                $output.="<tr> </tr>";
            }else{
                $bdd= $medicament->bdd();
                $sql="SELECT * from medicament WHERE idMedicament IN (".implode(',',$id).")";
                $data_medicament=$bdd->prepare($sql);
                $data_medicament->execute();
                $medicamentsPanier=$data_medicament->fetchAll(PDO::FETCH_OBJ);
                foreach ($medicamentsPanier as $medoc)
                {
                    $counter++;
                    $output.="<tr>
                        <td><input TYPE='hidden'  class='form-control idMedicement' VALUE=".$medoc->idMedicament." NAME='idMedicement[]' id='idMedicement$counter' data-id='$counter'>$medoc->dci</td>
                        <td>$medoc->dosage  / $medoc->forme</td>
                        <td>
                            <input TYPE='text'  class='form-control posologie' VALUE='' NAME='posologie[]'  id='posologie$counter' >
                     
                        </td>
                        <td><input TYPE='text'  class='form-control quantite' VALUE=".$_SESSION['ordo'][$medoc->idMedicament]." NAME='quantite[]' id='quantite$counter'></td>
                        <td><a  class='btn btn-danger btn-sm remove' id=".$medoc->idMedicament."><i class='fa fa-trash'></i></a></td>
                    </tr>";
                }

            }

        }else{

            $output .= '
                <tr>
                 <td colspan="5" align="center">
                  Your Cart is Empty!
                 </td>
                </tr>
                
            ';
        }
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])&& $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){

            echo json_encode($output);exit();
        }
    }

    public function  unset_ordonnances(){

        if(isset($_POST['id'])){
            unset($_SESSION["ordo"][$_POST['id']]);
        }
    }

    public function select_medicament(){

        if (isset($_SESSION['pseudo'])) {

            $medicament=new Medicament();

            $counter=0;
            if(isset($_POST['idMedicament'])){

                $medicaments=$medicament->FetchSelectWhere('idMedicament',
                'medicament',
                'idMedicament=:id',
                [":id"=>$_POST['idMedicament']]);

                if(isset($_SESSION['ordo'][$_POST['idMedicament']])){

                    $_SESSION['ordo'][$medicaments->idMedicament]++;

                }else{

                    $_SESSION['ordo'][$medicaments->idMedicament]=1;
                }

            }
        }else{
            $this->redirect('login');
        }
    }
}