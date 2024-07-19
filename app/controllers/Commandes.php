<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 27/03/2023
 * Time: 11:57
 */
class Commandes extends Controller
{
    public function index(){
        if (isset($_SESSION['pseudo'])){

            $db=new  Medicament();
            $commande=new Commande();
            $fournisseur=new Fournisseur();
            $datas=$db->SelectAllData("*",'medicament');
            $forunisseurs=$fournisseur->SelectAllData("*",'fournisseur');
            $commandes=$commande->SelectAllData('*',' commande');
            $this->view('ajouter_commande',['medicaments'=>$datas,'commandes'=>$commandes,"fournisseurs"=>$forunisseurs]);

        }else{
            $this->redirect('login');
        }
    }
    public  function Liste(){
        if(isset($_SESSION['pseudo'])){
            unset($_SESSION["medico"]);
            $commande=new Commande();
            $fournisseur=new Fournisseur();
            $fournisseurs=$fournisseur->SelectAllData('*',' fournisseur');
            $commandes=$commande->SelectAllData('*',' commande');
            $this->view('commande',['commandes'=>$commandes,'fournisseurs'=>$fournisseurs]);
        }else {
            $this->redirect('login'); 
        }
    }
   public function dataselectOrdonnance(){
       $output="";
       $counter=0;
       $medicament=new Medicament();

       if(isset($_SESSION['medico'])){
           $id=array_keys($_SESSION['medico']);
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
                   $output.="
                       <tr>
                           <td><input TYPE='hidden'  class='form-control idMedicement' VALUE=".$medoc->idMedicament." NAME='idMedicement[]' id='idMedicement$counter' data-id='$counter'>$medoc->dci</td>
                            <td><input TYPE='text'  class='form-control quantite' VALUE=".$_SESSION['medico'][$medoc->idMedicament]." NAME='quantite[]' id='quantite$counter' data-id='$counter'
                            data-quantite=".$_SESSION['medico'][$medoc->idMedicament]." data-prix_achat=".$medoc->prix_achat."></td>

                           <td><input TYPE='text'  class='form-control prix_achat' VALUE=".$medoc->prix_achat."  name='prix_achat[]' id='prix_achat$counter' data-id='$counter'  data-quantite=".$_SESSION['medico'][$medoc->idMedicament]." data-prix_achat=".$medoc->prix_achat."></td>

                           <td><input TYPE='text' readonly class='form-control montant_valeur' VALUE=".$_SESSION['medico'][$medoc->idMedicament]*$medoc->prix_achat." readonly NAME='montant' id='montant_valeur$counter'></td>
                   </tr>";
               }
               $output.=" <tr>
                           <td></td>
                           <td><label for='total'> TOTAL</label><br></td>
                           <td colspan='2'>
                               <label  class='total'></label>
                           </td>
                       </tr>";
             }

       }else{

           $output .= '
               <tr>
                <td colspan="5" align="center">
                 Your Cart is Empty!
                </td>
               </tr>';

       }
       if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])&& $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){

           echo json_encode($output);exit();
       }
   }
//    public function dataselectCommande_update(){
//        $output="";
//        $counter=0;
//        $medicament=new Medicament();
//
//        if(isset($_SESSION['medic']) and isset($_SESSION['ID'])){
//            $id=array_keys($_SESSION['medic']);
//
//            if(empty($id)){
//                $output.="<tr> </tr>";
//            }
//            else{
//                $bdd= $medicament->bdd();
//                $sql="select * from  medicament me JOIN ligne_commande li ON li.idMedicament=me.idMedicament
//                    where li.idMedicament IN (".implode(',',$id).") AND li.num_commande=:id";
//                $data_medicament=$bdd->prepare($sql);
//                $data_medicament->execute([':id'=>$_SESSION['ID']]);
//                $medicamentsPanier=$data_medicament->fetchAll(PDO::FETCH_OBJ);
//                foreach ($medicamentsPanier as $medoc)
//                {
//                    $counter++;
//                    $output.="
//                        <tr>
//                            <td><input TYPE='hidden'  class='form-control idMedicement' VALUE=".$medoc->idMedicament." NAME='idMedicement[]' id='idMedicement$counter' data-id='$counter'>$medoc->dci</td>
//                            <td><input TYPE='text'  class='form-control quantite' VALUE=".$medoc->qte_commande." NAME='quantite[]' id='quantite$counter' data-id='$counter'
//                            data-quantite=".$medoc->qte_commande." data-prix_achat=".$medoc->prix_achat."></td>
//
//                            <td><input TYPE='text'  class='form-control prix_achat' VALUE=".$medoc->prix_achat." name='prix_achat[]' id='prix_achat$counter' data-id='$counter'  data-quantite=".$_SESSION['medic'][$medoc->idMedicament]." data-prix_achat=".$medoc->prix_achat."></td>
//
//                            <td><input TYPE='text' readonly class='form-control montant_valeur' VALUE=".$_SESSION['medic'][$medoc->idMedicament]*$medoc->prix_achat." readonly NAME='montant' id='montant_valeur$counter'></td>
//                        </tr>";
//                }
//                $output.=" <tr>
//                            <td></td>
//                            <td><label for='total'> TOTAL</label><br></td>
//                            <td colspan='2'>
//                                <label  class='total'></label>
//                            </td>
//                        </tr>";
//            }
//
//        }else{
//            $output .= '
//            <tr>
//            <td colspan="5" align="center">
//            Your Cart is Empty!
//            </td>
//            </tr>';
//        }
//        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])&& $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){
//
//            echo json_encode($output);exit();
//        }
//    }
    public function  unset_commande(){

        if(isset($_POST['id'])){
            unset($_SESSION["medico"][$_POST['id']]);
        }
    }
    public function  unset_commande_udate(){

         if(isset($_POST['id'])){
             unset($_SESSION["medic"][$_POST['id']]);
         }
     }
//    public function select_medicament_update(){
//
//         if (isset($_SESSION['pseudo'])) {
//
//             $medicament=new Medicament();
//
//             $counter=0;
//             if(isset($_POST['idMedicament'])){
//
//                 $medicaments=$medicament->FetchSelectWhere('idMedicament',
//                 'medicament',
//                 'idMedicament=:id',
//                 [":id"=>$_POST['idMedicament']]);
//
//                 if(isset($_SESSION['medico_update'][$_POST['idMedicament']])){
//
//                     $_SESSION['medico_update'][$medicaments->idMedicament]++;
//
//                 }else{
//
//                     $_SESSION['medico_update'][$medicaments->idMedicament]=1;
//                 }
//
//             }
//         }else{
//             $this->redirect('login');
//         }
//     }
    public function select_medicament(){

        if (isset($_SESSION['pseudo'])) {

            $medicament=new Medicament();

            $counter=0;
            if(isset($_POST['idMedicament'])){

                $medicaments=$medicament->FetchSelectWhere('idMedicament',
                'medicament',
                'idMedicament=:id',
                [":id"=>$_POST['idMedicament']]);

                if(isset($_SESSION['medico'][$_POST['idMedicament']])){

                    $_SESSION['medico'][$medicaments->idMedicament]++;

                }else{

                    $_SESSION['medico'][$medicaments->idMedicament]=1;
                }

            }
        }else{
            $this->redirect('login');
        }
    }
    public function store(){
        if (isset($_SESSION['pseudo'])) {

            $medicament=new Medicament();

            $counter=0;
            if(isset($_POST['idMedicament'])){

                $medicaments=$medicament->FetchSelectWhere('idMedicament',
                'medicament',
                'idMedicament=:id',
                [":id"=>$_POST['idMedicament']]);

                if(isset($_SESSION['medico'][$_POST['idMedicament']])){

                    $_SESSION['medico'][$medicaments->idMedicament]++;

                }else{

                    $_SESSION['medico'][$medicaments->idMedicament]=1;
                }

            }
        }else{
            $this->redirect('login');
        }
    }
    public function Insertion(){
        if (isset($_SESSION['pseudo'])) {

            $commande=new Commande();
            if (isset($_POST['idFournisseur'])){

               echo  $commande->insertionUpdate_function(['idMedicement','quantite','idFournisseur','total']);exit();
            }
        }else{
            $this->redirect('login');
        }
    }
    public function edit($id){
        if (isset($_SESSION['pseudo'])) {



            $db=new  Medicament();
            $commande=new Commande();

            $fournisseur=new Fournisseur();

            $datas=$db->SelectAllData("*",'medicament');
            // 	id_fournisseur 	montant_commande
            $forunisseurs=$fournisseur->SelectAllData("*",'fournisseur');
            $commande_fournisseur=$commande->FetchSelectWhere("fo.nom_fournisseur,fo.adresse_fournisseur,fo.telephone_fournisseur,
	            co.num_commande,co.date_comande,.co.id_fournisseur,co.montant_commande",
                'commande  co JOIN fournisseur fo ON co.id_fournisseur=fo.id_fournisseur',
                'co.num_commande=:id',[':id'=>$id]);

            $commandes=$commande->FetchAllSelectWhere('li.idMedicament,li.num_commande,li.qte_commande','commande  co JOIN ligne_commande li ON co.num_commande=li.num_commande',
                'co.num_commande=:id',[':id'=>$id]);
            $data=[];

            foreach ($commandes as $item){

                if(isset($_SESSION['medico'][$item->idMedicament])){
                    $_SESSION['medico'][$item->idMedicament]=$item->qte_commande;
                }else{
                    $_SESSION['ID']=$id;
                    $_SESSION['medico'][$item->idMedicament]=$item->qte_commande;
                }
                $data[]= $item->idMedicament;
            }

            $this->view('edit_commande',['medicaments'=>$datas,'data'=>$data,'commandes'=>$commandes,
                "commande_fournisseur"=>$commande_fournisseur,"fournisseurs"=>$forunisseurs,'id'=>$id]);

        }else{
            $this->redirect('login');
        }
    }
    public function editStore(){
        if (isset($_SESSION['pseudo'])) {

            $commande=new Commande();
            if (isset($_POST['edit'])){
                echo  $commande->commandeUpdate(['quantite','edit','idFournisseur','idMedicement','total']);exit();
            }

        }else{
            $this->redirect('login');
        }
    }

}