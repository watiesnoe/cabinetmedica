<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 24/03/2023
 * Time: 12:40
 */

class Reception extends Model
{

    public $errors=[];

    public function insertionUpdate_function($vlaue=[],$qte_actuelles){
        $bdd=$this->bdd();
        if ($this->VerifyField($vlaue)){

            $this->e(extract($_POST));
//            idMedicement quantite_actuel

            if(isset($idcommande)) {

                $sq="select idMedicament,qte_commande,id_ligne
                                from  commande  co JOIN ligne_commande li ON li.num_commande=co.num_commande
                        where li.idMedicament IN (".implode(',',$idMedicement).") AND  co.num_commande=:id";

                $data_avec_existance=$bdd->prepare($sq);
                $data_avec_existance->execute([':id'=>$idcommande]);

                $data_avec_existances=$data_avec_existance->fetchAll(PDO::FETCH_OBJ);
                foreach ($data_avec_existances as $ite) {

                    $mes_donne[]=$ite->idMedicament;
                    $idligne[]=$ite->id_ligne;
                                    }
                $donnes_recute=[];
                //                $donnes_recutes=[];
                //                $donnes_existant=[];
                for($i=0;$i<count($idMedicement);$i++){
                    if(in_array($idMedicement[$i],$mes_donne)){
                        if($qte_actuelles[$i]!==''){
                            $qte_ancienne=$this->FetchSelectWhere('qte_commande,qt_recu,stock','commande co JOIN ligne_commande li 
                            ON li.num_commande=co.num_commande join  medicament me ON li.idMedicament=me.idMedicament',
                                'li.idMedicament=:idMedicament and co.num_commande=:id',[':id'=>$idcommande,':idMedicament'=>$idMedicement[$i]]);
                            if($qte_ancienne->qte_commande>($qte_actuelles[$i]+$qte_ancienne->qt_recu)){
                                $rete=$qte_ancienne->qte_commande-($qte_actuelles[$i]+$qte_ancienne->qt_recu);
                                $stock_nouvel=(($qte_ancienne->stock)+($qte_actuelles[$i]));
                                $ligne_commande1 =$this->insertion_update_simples('UPDATE  medicament me JOIN ligne_commande li ON li.idMedicament=me.idMedicament
                                      SET 
                                      li.qt_recu=:qt_recu,
                                      li.qt_restant=:qt_restant,
                                      me.stock=:stock
                                     WHERE num_commande=:idcommande and li.idMedicament=:idMedicement ',
                                        [":idcommande"=>$idcommande,
                                            ":idMedicement"=>$idMedicement[$i],
                                            ':stock'=>$stock_nouvel,
                                            ":qt_restant"=>$rete,
                                            ":qt_recu"=>($qte_actuelles[$i]+$qte_ancienne->qt_recu)]);

                            }else if($qte_ancienne->qte_commande<($qte_actuelles[$i]+$qte_ancienne->qt_recu)){
                                $qte_actuelles[$i]=$qte_ancienne->qte_commande;
                                $rete=0;
                                $stock_nouvel=(($qte_ancienne->stock)+($qte_actuelles[$i]));
                                $ligne_commande2 =$this->insertion_update_simples('UPDATE  medicament me JOIN ligne_commande li ON li.idMedicament=me.idMedicament
                                      SET 
                                      li.qt_recu=:qt_recu,
                                      li.qt_restant=:qt_restant,
                                      me.stock=:stock
                                     WHERE num_commande=:idcommande and li.idMedicament=:idMedicement ',
                                    [":idcommande"=>$idcommande,
                                        ":idMedicement"=>$idMedicement[$i],
                                        ':stock'=>$stock_nouvel,
                                        ":qt_restant"=>$rete,
                                        ":qt_recu"=>($qte_actuelles[$i])]);
                            }else{
                                $rete=0;
                                $stock_nouvel=(($qte_ancienne->stock)+($qte_actuelles[$i]));
                                $ligne_commande3 =$this->insertion_update_simples('UPDATE  medicament me JOIN ligne_commande li ON li.idMedicament=me.idMedicament
                                      SET 
                                      li.qt_recu=:qt_recu,
                                       li.qt_restant=:qt_restant,
                                      me.stock=:stock
                                     WHERE num_commande=:idcommande and li.idMedicament=:idMedicement ',
                                    [":idcommande"=>$idcommande,
                                        ":idMedicement"=>$idMedicement[$i],
                                        ":qt_restant"=>$rete,
                                        ':stock'=>$stock_nouvel,

                                        ":qt_recu"=>($qte_actuelles[$i]+$qte_ancienne->qt_recu)]);
                            }
                        }
                    }
                }

                $sq="select id_ligne from ligne_commande 
                        where  qte_commande!=qt_recu AND num_commande=:id";

                $data_sup=$bdd->prepare($sq);
                $data_sup->execute([':id'=>$idcommande]);

                $data_sppre=$data_sup->rowCount();

                if($data_sppre===0){
                    $this->insertion_update_simples("UPDATE commande  
                            SET statut_commande='recu' WHERE num_commande=:id",
                        [':id'=>$idcommande]);
                }
                if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){
                    return json_encode(['reception'=>"Reception pris en compte"]);
                }

            }

        }else{

            $this->save_input_data();
            return array_push($this->errors,"Les champs ne doivent pas etre vide!! ");
        }
    }


}


