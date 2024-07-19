<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 15/03/2023
 * Time: 09:08
 */

class selectData_ajax extends Controller
{
    public function index()
    {
        if (!empty($_POST['consultat'])) {
            // code...
            $salle=new Salle();
            $finds=$salle->FetchAllSelectWhere("*","salle",'num_structure=:codeStructure',[':codeStructure'=>$_POST['consultat']]);
            $outputs = '';
            foreach($finds as $row)
            {
                $outputs .= '<option value="'.$row->num_salle.'">'.$row->code_salle.'</option>';
            }
            echo $outputs;
        }
    }
    public function select_hospital(){

        if (!empty($_POST['hospitalise'])) {
            // code...
            $lit=new Lit();
//            num_lit	nom_lit	num_salle Ascending 1	statut	frais
            $outputs = '';
            $finds=$lit->FetchAllSelectWhere('*','`lit`','num_salle=:num_salle ORDER BY `lit`.`num_salle` DESC ',[':num_salle'=>$_POST['hospitalise']]);

            foreach($finds as $row)
            {
                $outputs .= '<option value="'.$row->num_lit.'">'.$row->nom_lit.'</option>';
            }
            echo $outputs;
        }
    }

    public function fill_select_box()
    { $ordo=new Ordonnance();
        $bdd=$ordo->bdd();
        if(isset($_POST['category'])){
            $id=strip_tags($_POST['category']);
            $requeste=$bdd->prepare("SELECT * FROM medicament where idMedicament=:idMedicament");
            $requeste->execute([':idMedicament'=>$id]);
            $data =$requeste->fetch();
            $requeste->closeCursor();
            if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])&& $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){
                echo json_encode($data);exit();
            }
        }

    }
    public function paiement_ordo(){

        $id=$_POST['medicament'];


        $ordonnance=new Ordonnance();

        $ordonnances=$ordonnance->FetchAllSelectWhere("*","ordonnance 
        INNER JOIN ligne_vente ON ordonnance.num_ordo=ligne_vente.num_ordo 
                INNER JOIN medicament ON medicament.idMedicament = ligne_vente.id_lot
                   ","ordonnance.num_ordo=:id and ordonnance.dateAchat is nuLL",[':id'=>$id]);

        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])&& $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){

            echo json_encode($ordonnances);exit();
        }
    }



    private function _findBYiD($id=null){
        $ordonnance=new Ordonnance();

        if (isset($id)) {
            $sql="SELECT * FROM patient 
            INNER JOIN consultation ON patient.num_patient=consultation.idpatient
            INNER JOIN ordonnance ON consultation.num_consult = ordonnance.num_consult 
            WHERE ordonnance.num_ordo =:id";

            try {

                $stmt = $ordonnance->bdd()->prepare($sql);

                if ( !empty($id) ) {

                    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                }
                $stmt->execute();

                $results = $stmt->fetch(PDO::FETCH_OBJ);

                $stmt->closeCursor();

                return $results;

            }catch ( Exception $e ) {

                die ( $e->getMessage() );
            }

        }
        else{

            $sql="SELECT * FROM patient 
            INNER JOIN consultation ON patient.num_patient=consultation.idpatient
            INNER JOIN ordonnance ON consultation.num_consult = ordonnance.num_consult 
             ordonnance.num_ordo ORDER BY ordonnance.idOrdo DESC ";

            try {

                $stmt = $ordonnance->bdd()->prepare($sql);

                $stmt->execute();

                $results = $stmt->fetchAll(PDO::FETCH_OBJ);

                $stmt->closeCursor();

                return $results;


            }catch ( Exception $e ) {

                die ( $e->getMessage() );
            }

        }

    }

    public function chartes(){

        $medicament=new Medicament();


        if(isset($_POST["action"]))
        {
            $query = "SELECT DCI, COUNT(idMedicement) AS Total FROM contenir join medicament on medicament.idMedicement=`contenir`.`idMedicament`  GROUP BY idMedicement ";

            $result = $medicament->bdd()->prepare($query);

            $result->execute();

            $statats=$result->fetchAll(PDO::FETCH_OBJ);

            $data = array();
            foreach($statats as $row)
            {
                $data[] = array(
                    'language'		=>	$row->DCI,
                    'total'			=>	$row->Total,
                    'color'			=>	'#' . rand(100000, 999999) . ''
                );
            }

            echo json_encode($data);exit();
        }
    }

    public function Ticketselect(){
        $structure=new Structure();

        $securite=new Securite_social();
        $structures=$structure->SelectAllData('*','structure');

        $securites=$securite->SelectAllData('*','securite_sociale');
        $output='';

        if(isset($_POST['typeTicket']) and !empty($_POST['typeTicket'])){
            if($_POST['typeTicket']==="analyse"){
                $output.='
                    <div class="card card-bordered card-preview ">
                        <div class="card-header bg-secondary">
                           
                        </div>  
                        <div class="card-inner">
                            <div class="row">
                                 <div class="form-group col-sm-6">
                                   <div class="form-control-wrap">
                                       <label class="" for="">Motif</label>
                                       <input type="text" class="form-control motif" id="motif" name="motif" placeholder="" value="">
                                   </div>
                                 </div>
                                 <div class="form-group col-sm-6">
                                       <div class="form-control-wrap">
                                           <label class="" for="">Service</label>
                                           <select id="service" class="form-control service" name="service">';

                                               foreach ( $structures as $item) {
                                                   $output.=' <option value="'.$item->num_structure.'">'.$item->nom_structure.'</option>';
                                              }
                                 $output.='</select>
                                       </div>
                                      
                                  </div> 
                                  <div class="form-group col-sm-6">
                                       <div class="form-control-wrap">
                                           <label class="" for="">Sécurite</label>
                                           <select id="securite" class="form-control" name="securite">
                                               <option value=""></option>
                                           ';

                                               foreach ( $securites as $items) {
                                                   $output.=' <option value="'.$items->idSecurite.'">'.$items->nom_societe.' ( '.$items->pourcentage_montant.'% ) </option>';
                                              }
                                 $output.='</select>
                                       </div>
                                      
                                  </div> 
                                  <div class="form-group col-sm-6">
                                       <div class="form-control-wrap">
                                           <label class="" for="">Frais</label>
                                           <input type="text" class="form-control " id="frais_analyse" name="frais_analyse" readonly="readonly" placeholder="" value="">
                                       </div>
                                  </div>
                            </div>
                        </div>  
                    </div>';
                $output.='
                    <br>
                <div class="card card-bordered card-preview card-analyse">
                    <div class="card-header bg-secondary">
                        <div class="" align="right">
                           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTop">Selection des Analyses</button>
                        </div> 
                    </div>  
                    <div class="card-inner">
                        <div class="card-body table">
                            <table class="table table border-2">
                                <thead>
                                   <th width="80%">Type analyse </th>
                                   <th width="20%">Prix d\'analyse</th>
                                </thead>
                                <tbody class="tbody">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>  
                </div>';
            }else{
                $output.='
                    <div class="card card-bordered card-preview card-analyse">
                        <div class="card-header bg-secondary">
                           
                        </div>  
                        <div class="card-inner">
                            <div class="row">
                                   <div class="form-group col-sm-6">
                                       <div class="form-control-wrap">
                                           <label class="" for="">Motif</label>
                                           <input type="text" class="form-control motif" id="motif" name="motif" placeholder="" value="">
                                       </div>
                                  </div>
                                  <div class="form-group col-sm-6">
                                       <div class="form-control-wrap">
                                           <label class="" for="">Service</label>
                                           <select id="service" class="form-control service" name="service">
                                        
                                           ';

                                               foreach ( $structures as $item) {
                                                   $output.=' <option value="'.$item->num_structure.'">'.$item->nom_structure.'</option>';

                                              }
                                 $output.='</select>
                                       </div>
                                      
                                  </div> 
                                  <div class="form-group col-sm-6">
                                       <div class="form-control-wrap">
                                           <label class="" for="">Sécurite</label>
                                           <select id="securite" class="form-control" name="securite">
                                            <option value=""></option>
                                           ';
                                                
                                               foreach ( $securites as $items) {
                                                   $output.=' <option value="'.$items->idSecurite.'">'.$items->nom_societe.' ( '.$items->pourcentage_montant.'% ) </option>';
                                              }
                                 $output.='</select>
                                       </div>
                                      
                                  </div> 
                                  <div class="form-group col-sm-6">
                                       <div class="form-control-wrap">
                                           <label class="" for="">Frais</label>
                                           <input type="text" class="form-control " id="frais" name="frais" placeholder="" value="">
                                       </div>
                                  </div>
                            </div>
                        </div>  
                    </div>';
            }
        }
       
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])&& $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){

            echo json_encode(["analyse"=>$output]);exit();
        }   
    }
    public function Ticket_select(){
        $output='';
        $examem=new Examen();
        $total=null;
        if(isset($_POST['examem']) and !empty($_POST['examem'])){
            $bdd= $examem->bdd();
            $sql="SELECT * from examen WHERE num_examen IN (".implode(',',$_POST['examem']).")";
            $data_examen=$bdd->prepare($sql);
            $data_examen->execute();
            $data_examenPanier=$data_examen->fetchAll(PDO::FETCH_OBJ);
            foreach ($data_examenPanier as $item) {

                $output.="<tr>
                            <td><input type='hidden' id='examen_tableau' class='examen_tableau' value='".$item->num_examen."'>".$item->nom_examen." ( ".$item->code_examen." )</td>
                            <td>".$item->prix_axamen." FCFA </td>
                </tr>";
                $total+=$item->prix_axamen;
            }
            $output.="<tr>
                            <td class='text-bg-dark text-center'>Total</td>
                            <td> <input type='hidden' value='$total' name='total' class='total' id='total'>".$total." FCFA</td>
                </tr>";
        }

        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])&& $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){

            echo json_encode(["analyse"=>$output]);exit();
        }
    }
    public function dataselectCommande(){
        $output="";
        $counter=0;
        $medicament=new Medicament();
 
        if(isset($_SESSION['medico_update'])){
            $id=array_keys($_SESSION['medico_update']);
            if(empty($id)){
                $output.="<tr> </tr>";
            }else{
                $bdd= $medicament->bdd();
                $sql="SELECT * from medicament WHERE idMedicament IN (".implode(',',$id).")";
                $data_medicament=$bdd->prepare($sql);
                $data_medicament->execute();
                $medicamentsPanier=$data_medicament->fetchAll(PDO::FETCH_OBJ);
                // foreach ($medicamentsPanier as $medoc)
                // {
                //     $counter++;
                //     $output.="
                //     <tr>
                //     <td><input TYPE='hidden'  class='form-control idMedicement' VALUE=".$medoc->idMedicament." NAME='idMedicement[]' id='idMedicement$counter' data-id='$counter'>$medoc->dci</td>
                //     <td><input TYPE='text'  class='form-control quantite' VALUE=".$_SESSION['medico_update'][$medoc->idMedicament]." NAME='quantite[]' id='quantite$counter' data-id='$counter'
                //     data-quantite=".$_SESSION['medico_update'][$medoc->idMedicament]." data-prix_achat=".$medoc->prix_achat."></td>
                
                //     <td><input TYPE='text'  class='form-control prix_achat' VALUE=".$medoc->prix_achat." name='prix_achat[]' id='prix_achat$counter' data-id='$counter'  data-quantite=".$_SESSION['medico_update'][$medoc->idMedicament]." data-prix_achat=".$medoc->prix_achat."></td>
                
                //     <td><input TYPE='text' readonly class='form-control montant_valeur' VALUE=".$_SESSION['medico_update'][$medoc->idMedicament]*$medoc->prix_achat." readonly NAME='montant' id='montant_valeur$counter'></td>
                // </tr>";
                // }
              
              }
        }
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])&& $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){
 
            echo json_encode($output);exit();
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

                if(isset($_SESSION['medico_update'][$_POST['idMedicament']])){

                    $_SESSION['medico_update'][$medicaments->idMedicament];
                }else{

                    $_SESSION['medico_update'][$medicaments->idMedicament]=1;
                }

            }
        }else{
            $this->redirect('login');
        }
    }


    public function select_reception (){
        
        $id=$_POST['idCommande'];
    
    
        $commande=new Commande();

        $commande_fournisseur=$commande->FetchSelectWhere("fo.nom_fournisseur,fo.adresse_fournisseur,fo.telephone_fournisseur,
	            co.num_commande,co.date_comande,.co.id_fournisseur,co.montant_commande",
            'commande  co JOIN fournisseur fo ON co.id_fournisseur=fo.id_fournisseur',
            'co.num_commande=:id',[':id'=>$id]);

        $commandes=$commande->FetchAllSelectWhere("*","medicament me 
                        JOIN ligne_commande li  ON li.idMedicament=me.idMedicament 
                   ","li.num_commande=:id",[':id'=>$id]);

        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])&& $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){

            echo json_encode(['commandes'=>$commandes,'idcommande'=>$commande_fournisseur->num_commande,'fournisseur'=>$commande_fournisseur->nom_fournisseur."-".$commande_fournisseur->adresse_fournisseur."-".$commande_fournisseur->telephone_fournisseur]);exit();
        }
    }
}