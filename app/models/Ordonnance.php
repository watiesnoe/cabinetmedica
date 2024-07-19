<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 28/03/2023
 * Time: 08:55
 */

class Ordonnance extends Model
{
    public $errors=[];


    public function insertionUpdate_function($vlaue=[]){

        if ($this->VerifyField($vlaue)){

            $dateOrdonnace=date('Y-m-d H:i:s');

            $this->e(extract($_POST));

            if(isset($idContenir) && !empty($idContenir)){

                for ($i=0; $i < count($idMedicement); $i++) {
                    $q = $this->insertion_update_simples('UPDATE ligne_vente 
                            SET 
                            id_lot=:idMedicament,
                            posologie=:posologie,
                            quantite_prescite=:quantiteMedi
                            WHERE id_ligneVente=:id',[ ":id"=>$idContenir[$i],
                        ":posologie"=>$posologie[$i],
                        ":quantiteMedi"=>$quantite[$i],
                        ":idMedicament"=>$idMedicement[$i]]);

                
                }

                if($q==true){
                    $this->set_flash("Modification realisée avec succes pour l'ordonnance N° : $idOrdonnance[1]",'success');
                    $this->redirect('Ordonnances/liste');
                }

            }else {
                $q =$this-> insertion_update_simples_insert_id('INSERT INTO `ordonnance`(date_ordo,num_consult) 
                VALUES (:dateOrdonnace,:idConsultation)',[
                    ":dateOrdonnace"=>$dateOrdonnace,
                    ":idConsultation"=>$idConsultation
                ]);

                $ordonnanceId = $q['lastInsertId'];
//   id_ligneVente 	num_ordo 	id_lot 	posologie 	qte_vendu 	dure_traitement 	quantite_prescite 	statut_ordo
                for ($i=0; $i < count($idMedicement); $i++) {
                    $ordonnance =$this->insertion_update_simples('INSERT INTO `ligne_vente`(num_ordo ,id_lot,posologie,quantite_prescite)
                            VALUES (:idOrdo,:idMedicament,:posologie,:quantiteMedi)',[ ":posologie"=>$posologie[$i],
                        ":quantiteMedi"=>$quantite[$i],
                        ":idOrdo"=>$ordonnanceId,
                        ":idMedicament"=>$idMedicement[$i]]);
                }

                if ($q && $ordonnance) {
                    $this->set_flash("Insertion realisée avec succes",'success');
                    unset($_SESSION["ordo"]);
                }
            }
        }else{

            $this->save_input_data();
            return array_push($this->errors,"Les champs ne doivent pas etre vide!! ");
        }
    }
}