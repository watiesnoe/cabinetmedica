<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 22/01/2023
 * Time: 21:05
 */

class Payement_ordo extends Model
{
    public $errors=[];
    public function InsrtionData($champ=[]){

        $bdd=$this->bdd();
       $montant=0;
        if ($this->VerifyField($champ)){

            $this->e(extract($_POST));
            $dateVente=date('Y-m-d H:i:s');
           
            $sq="select me.idMedicament,me.stock from medicament me JOIN ligne_vente li ON li.id_lot=me.idMedicament 
            WHERE li.id_lot IN (".implode(',',$idmedicament).") AND  li.num_ordo=:id";

            $data_avec_existance=$bdd->prepare($sq);
            
            $data_avec_existance->execute([":id"=>$ordo]);

            $data_avec_existances=$data_avec_existance->fetchAll(PDO::FETCH_OBJ);

            foreach ($data_avec_existances as $ite) {
                $mes_donne[]=$ite->idMedicament;
            }

            for ($i=0; $i < count($idmedicament); $i++) {

                if(in_array($idmedicament[$i],$mes_donne)){
                        $stock_ancienne=$this->FetchSelectWhere('stock','medicament',
                        'idMedicament=:idMedicament',[':idMedicament'=>$idmedicament[$i]]);
                    $stock_nouvel=(($stock_ancienne->stock)-($quantiteMedi[$i])); 
                  
                  
                        $stock_modify=$bdd->prepare("UPDATE medicament
                        SET
                        stock=:stock
                        WHERE idMedicament=:id");
                        $stock_modify->execute([':id'=>$idmedicament[$i],":stock"=>$stock_nouvel]);

                        $requeste=$bdd->prepare("UPDATE ligne_vente
                                            SET
                                    statut_ordo=:statut,
                                    qte_vendu=:qte_vendu
                                    WHERE id_ligneVente=:id");

                        $requeste->execute([':id'=>$hidden_id[$i],":qte_vendu"=>$quantiteMedi[$i],
                        ":statut"=>"effecuter"]);

                        $montant+=$prix_total[$i];

                 
                }

                
               

            }
                $this->insertion_update_simples("UPDATE ordonnance
                            SET dateAchat=:dateAchat,
                                montant=:montant
                            WHERE num_ordo=:idOrdo",
                [':idOrdo'=>$ordo[0],
                    ":dateAchat"=>$dateVente,
                    ":montant"=>$montant]);
          
//            $mouvement=$bdd->prepare("INSERT INTO mouvements (montant,idOrdo,dateMouvement,typemouvement)
//                                                  VALUES (:montant,:idOrdo,now(),:typemouvement)");
//            $mouvement->execute([":montant"=>$montant,":idOrdo"=>$idOrdos[1],":typemouvement"=>"S"]);

        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])&& $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){
            return json_encode(["Vente"=>$montant]);
        }

        }else{

            $this->save_input_data();
            return array_push($this->errors,"Les champs ne doivent pas etre vide!! ");
        }

    }

}