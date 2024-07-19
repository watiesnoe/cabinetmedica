<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 20/03/2023
 * Time: 13:18
 */

class Commande extends  Model
{
    public $errors=[];

    public function insertionUpdate_function($vlaue=[],$id=null){
        $bdd=$this->bdd();
        if ($this->VerifyField($vlaue)){

            $this->e(extract($_POST));
            if(!empty($idFournisseur)){
                $dateDebut= date("Y-m-d");
                //  num_commande 	date_comande 	statut_commande 	numAgent 	id_fournisseur 	montant_commande
                $q = $this->insertion_update_simples_insert_id('INSERT INTO `commande`(date_comande,numAgent,id_fournisseur,montant_commande)  
                
                VALUES (:datecommande,:numAgent,:idFournisseur,:montant_commande)',[
                    ":datecommande"=>$dateDebut,
                    ":numAgent"=>$_SESSION['user_id'],
                    ":idFournisseur"=>$idFournisseur,
                    ":montant_commande"=>$total
                ]);

                $commanceId = $q['lastInsertId'];
                //idMedicament 	num_commande 	qte_commande
                for ($i=0; $i < count($idMedicement); $i++) {
                    $ligne_commande =$this->insertion_update_simples('INSERT INTO `ligne_commande`(idMedicament,num_commande,qte_commande)
                        VALUES (:idMedicement,:idcommande,:qte_commande)',
                        [":idcommande"=>$commanceId,
                        ":idMedicement"=>$idMedicement[$i],
                        ":qte_commande"=>$quantite[$i]]);
                }

                if ($q['q'] && $ligne_commande) {

                    unset($_SESSION["medico"]);

                    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){

                        return json_encode(['Commande'=>"Insertion réussit"]);
                    }
                }
            }else{
                $this->set_flash("Insertion realisée avec succes",'danger');
            }


        }else{

            $this->save_input_data();
            return array_push($this->errors,"Les champs ne doivent pas etre vide!! ");
        }
    }
    public function commandeUpdate($vlaue=[]){
        $bdd=$this->bdd();
        if ($this->VerifyField($vlaue)){

            $this->e(extract($_POST));

            if(isset($edit)) {

                $commandeInsert=$this->insertion_update_simples('UPDATE  commande join fournisseur on commande.id_fournisseur=fournisseur.id_fournisseur
                      SET
                      commande.id_fournisseur=:idFournisseur
                      WHERE num_commande=:idcommande',
                    [
                        ":idFournisseur"=>$idFournisseur,
                        ":idcommande"=>$edit
                    ]);

                $sq="select idMedicament,qte_commande,id_ligne
                                from  commande  co JOIN ligne_commande li ON li.num_commande=co.num_commande
                        where li.idMedicament IN (".implode(',',$idMedicement).") AND  co.num_commande=:id";

                $data_avec_existance=$bdd->prepare($sq);
                $data_avec_existance->execute([':id'=>$edit]);

                $data_avec_existances=$data_avec_existance->fetchAll(PDO::FETCH_OBJ);
                foreach ($data_avec_existances as $ite) {

                    $mes_donne[]=$ite->idMedicament;
                    $idligne[]=$ite->id_ligne;
                }
                $donnes_recute=[];
            //                $donnes_recutes=[];
            //                $donnes_existant=[];
                for($i=0;$i<count($idMedicement);$i++){
                    if(empty($mes_donne)){
                        $donnes_recute[]=$idMedicement[$i];
                        $ligne_commande0 =$this->insertion_update_simples('INSERT INTO `ligne_commande`(idMedicament,num_commande,qte_commande)
                        VALUES (:idMedicement,:idcommande,:qte_commande)',
                        [":idcommande"=>$edit,
                        ":idMedicement"=>$idMedicement[$i],
                        ":qte_commande"=>$quantite[$i]]);
                    }else{
                        if(!in_array($idMedicement[$i],$mes_donne)){

                            $donnes_recute[]=$idMedicement[$i];
                            $ligne_commande1 =$this->insertion_update_simples('INSERT INTO `ligne_commande`(idMedicament,num_commande,qte_commande)
                            VALUES (:idMedicement,:idcommande,:qte_commande)',
                            [":idcommande"=>$edit,
                            ":idMedicement"=>$idMedicement[$i],
                            ":qte_commande"=>$quantite[$i]]);

                        }else{

                            $donnes_recute[]=$quantite[$i];
                            $ligne_commande2 =$this->insertion_update_simples('UPDATE   `ligne_commande` SET qte_commande=:qte_commande
                           WHERE num_commande=:idcommande and idMedicament=:idMedicement ',
                            [":idcommande"=>$edit,
                            ":idMedicement"=>$idMedicement[$i],
                            ":qte_commande"=>$quantite[$i]]);
                        }
                    }
                }

                $sq="select id_ligne
                                from  commande  co JOIN ligne_commande li ON li.num_commande=co.num_commande
                        where li.idMedicament NOT IN (".implode(',',$idMedicement).") AND  co.num_commande=:id";

                $data_sup=$bdd->prepare($sq);
                $data_sup->execute([':id'=>$edit]);

                $data_sppre=$data_sup->fetchAll(PDO::FETCH_OBJ);

                $diff=null;
                foreach ($data_sppre as $item) {
                    $supression=$this->insertion_update_simples('DELETE FROM ligne_commande WHERE id_ligne=:id ',
                        [':id'=>$item->id_ligne]);
                }

                if ($ligne_commande2 ==true|| $ligne_commande0 ==true|| $ligne_commande1 ==true||$supression==true){
                    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){
                        unset($_SESSION["medico"]);
                        return json_encode(['Commande'=>"Commande modifiée avec succes !!"]);
                    }
                }
            }

        }else{

            $this->save_input_data();
            return array_push($this->errors,"Les champs ne doivent pas etre vide!! ");
        }
    }
    public function insertionUpdate_function_modale($vlaue=[]){

        if ($this->VerifyFields($vlaue)){

            $this->e(extract($_POST));

             if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){

                    return json_encode(['Commande'=>$idFournisseur]);
                }

           
        }else{

            $this->save_input_data();
            return array_push($this->errors,"Les champs ne doivent pas etre vide!! ");
        }
    }
}