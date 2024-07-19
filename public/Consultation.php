<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 27/03/2023
 * Time: 08:13
 */

class Consultation extends Model
{
 public $errors=[];

    public function verificationUpdate($champ = [])
    {
        $bdd=$this->bdd();

        if ($this->VerifyFields($champ)){

            $this->e(extract($_POST));


            /*$this->chekErrorsString($nomPatient,5,"Le champ nom doit avoir plus de 4 caracteur");*/
            /*    $this->chekErrorsInt($telephone,"Le champs telephone doit etre un entier");*/

            try{

                $bdd->beginTransaction();



                $this->chekErrorsInt($telephone,8,"Le numero de telephone doit comporter 8 chiffre");

                if(isset($hospitalise)){


                    if($this->table_select('patient','telephonePat',$telephone)){
                        $succes = $this->insertion_update_simples('UPDATE patient pat join ticket ti  on pat.idPatient=ti.idPatient 
                                join  consultation con ON ti.idTicket=con.idTicket

                                SET 
                                 ti.statut=:ticketUtilise,
                                 con.resultatConsultation=:resultatConsultation,
                                 con.idPatient=:idPatient,
                                 con.dateConsultaion=:dateConsultaion,
                                 con.numAgent=:numAgent
                                 where ti.idTicket=:id',[
                            ":ticketUtilise"=>'utiliser',
                            ":idPatient"=>$idPatient,
                            ":numAgent"=>$_SESSION['user_id'],
                            ":resultatConsultation"=>$diagnostique,
                            ":dateConsultaion"=>$dateConsult,
                            ":id"=>$idTicket
                        ]);

                        $hospitalises=$this->insertion_update_simples("UPDATE hospitaliser 
                                                                    SET codesalle=:codesalle,
                                                                    numbrelit=:numbrelit,
                                                                    date_hospitale=:date_hospitale
                                                                      WHERE idConsultation=:id",[":id"=>$idConsultation,":codesalle"=>$salle,":numbrelit"=>$lit,':date_hospitale'=>$dateConsult]);
                        if($hospitalises and $succes){

                            $this->set_flash("La consultation realisés du patient $nomPatient avec succès ",'success');
                        }
                    }
                }else{

                    if($this->table_select('patient','telephonePat',$telephone)){
                        $succes = $this->insertion_update_simples('UPDATE patient pat join ticket ti  on pat.idPatient=ti.idPatient 
                                join  consultation con ON ti.idTicket=con.idTicket

                                SET 
                                 con.resultatConsultation=:resultatConsultation,
                                 con.idPatient=:idPatient,
                                 con.dateConsultaion=:dateConsultaion,
                                 con.numAgent=:numAgent
                                 where ti.idTicket=:id',[

                            ":idPatient"=>$idPatient,
                            ":numAgent"=>$_SESSION['user_id'],
                            ":resultatConsultation"=>$diagnostique,
                            ":dateConsultaion"=>$dateConsult,
                            ":id"=>$idTicket
                        ]);
                        if($succes){

                            $this->set_flash("La consultation realisés du patient $nomPatient avec succès ",'success');
                        }
                    }
                }
                $bdd->commit();

            } catch (Exception $e) {

                $bdd->rollback();

                //on affiche un message d'erreur ainsi que les erreurs
                echo 'Tout ne s\'est pas bien passé, voir les erreurs ci-dessous<br />';
                echo 'Erreur : '.$e->getMessage().'<br />';
                echo 'N° : '.$e->getCode();
                //on arrête l'exécution s'il y a du code après
                exit();
            }
        }else{

            $this->save_input_data();
            return array_push($this->errors,"Les champs ne doivent pas etre vide!! ");
        }
    }

    public function verificationRdv($champ = [])
    {
        $bdd=$this->bdd();

        if ($this->VerifyFields($champ)){

            $this->e(extract($_POST));

            try{

                $bdd->beginTransaction();
                $this->chekErrorsInt($telephone,8,"Le numero de telephone doit comporter 8 chiffre");

                if(isset($hospitalise)){
                    if($this->table_select('patient','telephonePat',$telephone)){
                        $q = $this->insertion_update_simples('UPDATE patient pat join rendezvous re  on pat.idPatient=re.idPatient 
                        join  consultation con ON re.idRendezVous=con.idRendezVous

                        SET 
                        
                         con.resultatConsultation=:resultatConsultation,
                         con.idPatient=:idPatient,
                         con.dateConsultaion=:dateConsultaion,
                         con.numAgent=:numAgent
                         where con.idConsultation=:id',[
                            ":ticketUtilise"=>'utiliser',
                            ":idPatient"=>$idPatient,
                            ":numAgent"=>$_SESSION['user_id'],
                            ":resultatConsultation"=>$diagnostique,
                            ":dateConsultaion"=>$dateConsult,
                            ":id"=>$idRendezVous
                        ]);

                        $hospitalises=$this->insertion_update_simples("UPDATE hospitaliser 
                                                                    SET codesalle=:codesalle,
                                                                    numbrelit=:numbrelit,
                                                                    date_hospitale=:date_hospitale
                                                                      WHERE idConsultation=:id",
                            [":id"=>$idConsultation,":codesalle"=>$salle,":numbrelit"=>$lit,':date_hospitale'=>$dateConsult]);

                        if($hospitalises and $q){

                            $this->set_flash("La consultation realisés du patient $nomPatient avec succès ",'success');
                        }
                    }
                }else{

                    if($this->table_select('patient','telephonePat',$telephone)){
                        $q = $bdd->prepare('UPDATE patient pat join rendezvous re  on pat.idPatient=re.idPatient 
                                join  consultation con ON re.idRendezVous=con.idRendezVous

                                SET 
                                
                                 con.resultatConsultation=:resultatConsultation,
                                 con.idPatient=:idPatient,
                                 con.dateConsultaion=:dateConsultaion,
                                 con.numAgent=:numAgent
                                 where con.idConsultation=:id');

                        $succes=$q->execute([

                            ":idPatient"=>$idPatient,
                            ":numAgent"=>$_SESSION['user_id'],
                            ":resultatConsultation"=>$diagnostique,
                            ":dateConsultaion"=>$dateConsult,
                            ":id"=>$idRendezVous
                        ]);
                        if($succes){
                            $this->set_flash("La consultation realisés du patient $nomPatient avec succès ",'success');
                        }
                    }
                }
                $bdd->commit();
                $this->redirect('Liste_consultations/consultation_rendezvous');
            } catch (Exception $e) {
                $bdd->rollback();

                //on affiche un message d'erreur ainsi que les erreurs
                echo 'Tout ne s\'est pas bien passé, voir les erreurs ci-dessous<br />';
                echo 'Erreur : '.$e->getMessage().'<br />';
                echo 'N° : '.$e->getCode();

                //on arrête l'exécution s'il y a du code après
                exit();
            }
        }else{

            $this->save_input_data();
            return array_push($this->errors,"Les champs ne doivent pas etre vide!! ");
        }
    }

    public function _formAddEditRDV($vlaue=[]){

        if ($this->VerifyFields($vlaue)){
            $this->e(extract($_POST));

            $actif="actif";

            if (count($this->errors) == 0) {

                if (isset($hospitalise)) {

                    // code...

                    $updatConsultation = $this->insertion_update_simples_insert_id("INSERT INTO consultation (dateConsultaion,resultatConsultation,idRendezVous,idPatient,numAgent) 
                        VALUES ( :dateConsultaion,:resultatConsultation,:idRendezVous,:idPatient,:numAgent)",[
                        ":idPatient" => $idPatient,
                        ":numAgent" => $_SESSION['user_id'],
                        ":dateConsultaion" => $dateConsult,
                        ":resultatConsultation" => $diagnostique,
                        ":idRendezVous" => $idRendezVous]);

                    $idConsultation=$updatConsultation['lastInsertId'];

                    $hospitalise_insert=$this->insertion_update_simples("INSERT INTO hospitaliser (idConsultation,codesalle,date_hospitale,numbrelit) 
                      VALUES(:idConsultation,:codesalle,:date_hospitale,:numbrelit)"
                    ,[":idConsultation"=>$idConsultation,":codesalle"=>$salle,":numbrelit"=>$lit,':date_hospitale'=>$dateConsult]);

                    if ($updatConsultation AND $hospitalise_insert) {

                        $q = $this->insertion_update_simples('UPDATE `rendezvous` SET
                                                      effectuer=:effectuer
                                                      WHERE idRendezVous=:idRendezVous ',[
                            ':effectuer'=>$actif,
                            ':idRendezVous'=>$idRendezVous
                        ]);

                        $this->set_flash("La consultation realisés du patient $nomPatient $prenomPatient avec succès ", 'success');
                    }

                } else {

                    $updatConsultation = $this->insertion_update_simples("INSERT INTO consultation (dateConsultaion,resultatConsultation,idRendezVous,idPatient,numAgent) 
                        VALUES ( :dateConsultaion,:resultatConsultation,:idRendezVous,:idPatient,:numAgent)",[
                        ":idPatient" => $idPatient,
                        ":numAgent" => $_SESSION['user_id'],
                        ":dateConsultaion" => $dateConsult,
                        ":resultatConsultation" => $diagnostique,
                        ":idRendezVous" => $idRendezVous]);

                    if ($updatConsultation) {

                        $q = $this->insertion_update_simples('UPDATE `rendezvous` SET
                                                      effectuer=:effectuer
                                                      WHERE idRendezVous=:idRendezVous ',[
                            ':effectuer'=>$actif,
                            ':idRendezVous'=>$idRendezVous
                        ]);

                        $this->set_flash("La consultation realisés du patient $nomPatient $prenomPatient avec succès ", 'success');

                    }
                }

            } else {

                $this->save_input_data();
            }

        }

    }
}