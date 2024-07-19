<?php

class Receptions extends Controller
{
    public function index(){

        if (isset($_SESSION['pseudo'])){
            $reception=new  Reception();
            $commande=new Commande();

            if (isset($_POST['receptionner'])){

                $reception->insertionUpdate_function(['idMedicement','quantite','prix_achat','id_ligne_commande','idCommande','date_fabrique','date_peramp','total']);
            }
            $commande_fournisseur=$commande->SelectAllData("fo.nom_fournisseur,co.statut_commande,fo.adresse_fournisseur,fo.telephone_fournisseur,
            co.num_commande,co.date_comande,co.id_fournisseur,co.montant_commande",
                'commande  co JOIN fournisseur fo ON co.id_fournisseur=fo.id_fournisseur
                 WHERE co.statut_commande IS NULL');


            $this->view('ajouter_reception',['receptions'=>$commande_fournisseur]);

        }else{
            $this->redirect('login');
        }
    }

    public function dataselect($data){
        $output="";
        foreach($data as $reception)
        {
            $output .= '<option value="'.$reception->idcommande.'">Réference facture N'.$reception->idcommande.' de '.$reception->nomfourni.' '.$reception->adresseFourni.'</option>';
        }
        return $output;
    }

    public function dataselect_fournisseur($data){
        $output="";
        foreach($data as $fournisseur)
        {
            $output .= '<option value="'.$fournisseur->idFournisseur.'">'.$fournisseur->nomfourni.' '.$fournisseur->adresseFourni.'</option>';
        }
        return $output;
    }


    public function liste(){

        if (isset($_SESSION['pseudo'])) {
            $commande=new Commande();
            $fournisseur=new Fournisseur();
            $datas = $commande->select_data_table_join_where_all('select  DISTINCT commande.*  from commande JOIN ligne_commandes ON ligne_commandes.idCommande=commande.idCommande WHERE  commande.dateAchat IS NOT NULL');

            $fournisseurs= $fournisseur->select_data_all('fournisseur');

            $this->view('reception',['commandes'=>$datas,"fournisseurs"=>$fournisseurs]);

        }else{
            $this->redirect('login');
        }
    }



    public function  unset_panier(){

        if(isset($_POST['id'])){
            unset($_SESSION["panier"][$_POST['id']]);
        }

    }

    public function edit($id){
        if (isset($_SESSION['pseudo'])) {

            $medicament=new Medicament();
            $fournisseur_commande=new Fournisseur();
            $Commande=new Commande();
            $fournisseur_commandes =$fournisseur_commande->select_data_table_join_where("select * from commande join fournisseur ON commande.idFournisseur=fournisseur.idFournisseur WHERE commande.idcommande=:id",[':id'=>$id]);

            if (isset($_POST['enregistrer'])){

                $Commande->insertionUpdate_function(['quantite','prix_achat','idFournisseur','date_actuel','id_ligne_commande','quantite','idcommande']);
            }

            $datas=$medicament->select_data_all('medicament');

            $select=$this->dataselect($datas);

            $forunisseurs=$fournisseur_commande->select_data_all('fournisseur');

            $datas=$medicament->select_data_table_join_where_all('select * from medicament join ligne_commandes ON ligne_commandes.idMedicement=medicament.idMedicement WHERE ligne_commandes.idCommande=:id',[":id"=>$id]);
            $this->view('ajouter_commande',["commandes"=>$datas,'medicaments'=>$select,"edit"=>$id,'fournisseur_commande'=>$fournisseur_commandes,"fournisseurs"=>$forunisseurs]);
        }else{
            $this->redirect('login');
        }
    }

    public function Insertion(){
        if (isset($_SESSION['pseudo'])) {

            $reception=new Reception();
            if (isset($_POST['idcommande'])){

                echo  $reception->insertionUpdate_function(['idMedicement','idcommande'],$_POST["quantite_actuel"]);exit();

            }
        }else{
            $this->redirect('login');
        }
    }


}