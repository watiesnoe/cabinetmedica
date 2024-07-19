<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 27/03/2023
 * Time: 11:34
 */

class Ticket extends Model
{
    public $errors=[];

    public function dataWithSecurityAnalyse($value,$examens=null){
        $bdd=$this->bdd();
        if ($this->VerifyFields($value)){
            $this->e(extract($_POST));
            $dateDebut= date("Y-m-d");
            $dateFin= date("Y-m-d", strtotime($dateDebut.'+10 day'));
            if (isset($idTicket)) {
                try{
                    $bdd->beginTransaction();
                    $this->chekErrorsString($frais_analyse,"Les frais doivent en chifre");
                    // nom

                    if (count($this->errors)==0){

                        $patient=$this->insertion_update_simples('UPDATE  patient pat  JOIN ticket ti ON pat.num_patient=ti.idPatient
                        SET
                        pat.prenom_patient=:prenom_patient,
                        pat.nom_patient=:nom_patient,
                        pat.age_patient=:age_patient,
                        pat.genre=:genre,
                        pat.telephonepat=:telephonepat,
                        pat.ethnie=:ethnie,
                        pat.idsecurite=:idsecurite, 
                        ti.date_ticket=:date_ticket,
                        ti.type_ticket=:type_ticket,
                        ti.motif_ticket=:motif_ticket,
                        ti.date_expire=:date_expire,
                        ti.frais=:frais,
                        ti.codeStructure=:codeStructure
                        WHERE ti.num_ticket=:id',[":prenom_patient"=>$prenom,
                            ":nom_patient"=>$nom,
                            ":age_patient"=>$age,
                            ":genre"=>$genre,
                            ":ethnie"=>$ethnie,
                            ":idsecurite"=>$securite,
                            ":telephonepat"=>$telephone,
                            ':date_ticket'=>$dateDebut,
                            ':type_ticket'=>$typeticket,
                            ':id'=>$idTicket,
                            ':date_expire'=>$dateFin,
                            ':frais'=>$frais_analyse,
                            ':codeStructure'=>$service,
                            ":motif_ticket"=>$motif
                        ]);

/*selection pour trouver les donnes avec examen existantes
 *
 */
                        $sq="select li.id_examen,numDemanceExamen,li.examen_dema
                                from demandeexamen de  join ligne_analyse  li on li.examen_dema=de.numDemanceExamen 
                                where li.id_examen IN (".implode(',',$examens).") AND num_ticket=:id";

                        $data_avec_existance=$bdd->prepare($sq);
                        $data_avec_existance->execute([':id'=>$idTicket]);

                        $data_avec_existances=$data_avec_existance->fetchAll(PDO::FETCH_OBJ);

                        foreach ($data_avec_existances as $ite) {
                            $mes_donne[]=$ite->id_examen;
                            $demande_id[]=$ite->examen_dema;
                        }

                        for($i=0;$i<count($examens);$i++){
                            if(empty($mes_donne)){
                                $this->insertion_update_simples('INSERT INTO ligne_analyse (id_examen,examen_dema)
                                VALUES (:id_examen,:examen_dema)',[':id_examen'=>$examens[$i],':examen_dema'=>$demande_id[0]]);

//                                $this->insertion_update_simples('INSERT INTO demandeexamen (nomExamen,dateDamande,num_ticket,idPatient)
//                                     VALUES (:nomExamen,:dateDamande,:num_ticket,:idPatient)',
//                                    [':nomExamen'=>$examens[$i],':dateDamande'=>$dateDebut,':num_ticket'=>$idTicket,':idPatient'=>$idPatient]);

                            }else{
                                if(!in_array($examens[$i],$mes_donne)){
//                                    $insertion= $this->insertion_update_simples('INSERT INTO demandeexamen (nomExamen,dateDamande,num_ticket,idPatient)
//                                     VALUES (:nomExamen,:dateDamande,:num_ticket,:idPatient)',[':nomExamen'=>$examens[$i],':dateDamande'=>$dateDebut,':num_ticket'=>$idTicket,':idPatient'=>$idPatient]);

                                    $insertion=$this->insertion_update_simples('INSERT INTO ligne_analyse (id_examen,examen_dema)
                                VALUES (:id_examen,:examen_dema)',[':id_examen'=>$examens[$i],':examen_dema'=>$demande_id[0]]);

                                }
                            }

                        }
/*
 * fin de selection
 */

                        /**
                         * PARTIE OU LA VERIFICATION EST BASE SUR A LA SELECTION DES ID NE SON PLUS
                         */
                        $sql="select li.id_examen,numDemanceExamen,li.id_analyse
                                from demandeexamen de  join ligne_analyse  li on li.examen_dema=de.numDemanceExamen 
                                where li.id_examen NOT IN (".implode(',',$examens).") AND num_ticket=:id";

                        $data_examen=$bdd->prepare($sql);
                        $data_examen->execute([':id'=>$idTicket]);

                        $data_examenPanier=$data_examen->fetchAll(PDO::FETCH_OBJ);

                        $examens_existant_vide=[];
                        $examens_existant=[];
                        $diff=null;
                        foreach ($data_examenPanier as $item) {
                            $examens_existant_vide_numDemance[]=$item->id_analyse;
                            $supression=$this->insertion_update_simples('DELETE FROM ligne_analyse WHERE id_analyse=:id ',
                                [':id'=>$item->id_analyse]);
                        }

                        /**
                         * Fin de la partie
                         */
                        if ($patient==true || $supression==true || $insertion==true ){
                            if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])&& $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){
                                return json_encode(["Modification"=>"Modifaction effectuer avec succes!!!"]);
                            }
                        }


                    }else{
                        $this->save_input_data();
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
            }else {
                $dateDebut= date("Y-m-d");
                $dateFin= date("Y-m-d", strtotime($dateDebut.'+10 day'));
                try{
                    $bdd->beginTransaction();
                    $this->chekErrorsString($frais_analyse,"Les frais doivent en chifre");
                    // nom
                    if (count($this->errors)==0){
                        $patient=$this->insertion_update_simples_insert_id('INSERT INTO patient (prenom_patient,nom_patient,age_patient,genre,telephonepat,ethnie,idsecurite)
                        VALUES (:prenom_patient,:nom_patient,:age_patient,:genre,:telephonepat,:ethnie,:idsecurite)',
                            [":prenom_patient"=>$prenom,
                            ":nom_patient"=>$nom,
                            ":age_patient"=>$age,
                            ":genre"=>$genre,
                            ":ethnie"=>$ethnie,
                            ":idsecurite"=>$securite,
                            ":telephonepat"=>$telephone]);
                            $id=$patient['lastInsertId'];

                        $ticket=$this->insertion_update_simples_insert_id('INSERT INTO ticket (date_ticket,type_ticket,motif_ticket,idPatient,date_expire,frais,idUt,codeStructure)
                        VALUES (:date_ticket,:type_ticket,:motif_ticket,:idPatient,:date_expire,:frais,:idUt,:codeStructure)',
                            [':date_ticket'=>$dateDebut,
                                ':type_ticket'=>$typeticket,
                                ':idPatient'=>$id,
                                ':date_expire'=>$dateFin,
                                ':frais'=>$frais_analyse,
                                ':idUt'=>$_SESSION['user_id'],
                                ':codeStructure'=>$service,
                                ":motif_ticket"=>$motif]);

                        $idTicket=$ticket['lastInsertId'];

                        $demande=$this->insertion_update_simples_insert_id('INSERT INTO demandeexamen (dateDamande,num_ticket,idPatient)
                                VALUES (:dateDamande,:num_ticket,:idPatient)',[':dateDamande'=>$dateDebut,':num_ticket'=>$idTicket,':idPatient'=>$id]);
                        $demande_id=$demande['lastInsertId'];

                        for ($i=0;$i<count($examens);$i++){
                            $demande=$this->insertion_update_simples('INSERT INTO ligne_analyse (id_examen,examen_dema)
                                VALUES (:id_examen,:examen_dema)',[':id_examen'=>$examens[$i],':examen_dema'=>$demande_id]);

                        }

                        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])&& $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){
                            return json_encode(["Vente"=>$id]);
                        }
                    }else{
                        $this->save_input_data();
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
            }
        }else{

            $this->save_input_data();
            return array_push($this->errors,"Les champs ne doivent pas etre vide!! ");
        }
    }

    public function dataWithOutSecurityAnalyse($value=[],$examens=null){
        $bdd=$this->bdd();
        if ($this->VerifyFields($value)){
            $this->e(extract($_POST));
            $dateDebut= date("Y-m-d");
            $dateFin= date("Y-m-d", strtotime($dateDebut.'+10 day'));
            if(isset($idTicket)){
                try{
                    $bdd->beginTransaction();
                    $this->chekErrorsString($frais_analyse,"Les frais doivent en chifre");
                    // nom
                    $patient="";
                    if (count($this->errors)==0){

                        $patient=$this->insertion_update_simples('UPDATE  patient pat  JOIN ticket ti ON pat.num_patient=ti.idPatient
                        SET
                        pat.prenom_patient=:prenom_patient,
                        pat.nom_patient=:nom_patient,
                        pat.age_patient=:age_patient,
                        pat.genre=:genre,
                        pat.telephonepat=:telephonepat,
                        pat.ethnie=:ethnie,
                        pat.idsecurite=:idsecurite, 
                        ti.date_ticket=:date_ticket,
                        ti.type_ticket=:type_ticket,
                        ti.motif_ticket=:motif_ticket,
                        ti.date_expire=:date_expire,
                        ti.frais=:frais,
                        ti.codeStructure=:codeStructure
                        WHERE ti.num_ticket=:id',[":prenom_patient"=>$prenom,
                            ":nom_patient"=>$nom,
                            ":age_patient"=>$age,
                            ":genre"=>$genre,
                            ":ethnie"=>$ethnie,
                            ":idsecurite"=>"",
                            ":telephonepat"=>$telephone,
                            ':date_ticket'=>$dateDebut,
                            ':type_ticket'=>$typeticket,
                            ':id'=>$idTicket,
                            ':date_expire'=>$dateFin,
                            ':frais'=>$frais_analyse,
                            ':codeStructure'=>$service,
                            ":motif_ticket"=>$motif
                        ]);

                        /*selection pour trouver les donnes avec examen existantes
                         *
                         */
                        $sq="select nomExamen,num_examen,numDemanceExamen,prix_axamen,nom_examen,code_examen  
                                from  demandeexamen de  join examen ex  on  de.nomExamen=ex.num_examen 
                                where de.nomExamen IN (".implode(',',$examens).") AND num_ticket=:id";

                        $data_avec_existance=$bdd->prepare($sq);
                        $data_avec_existance->execute([':id'=>$idTicket]);

                        $data_avec_existances=$data_avec_existance->fetchAll(PDO::FETCH_OBJ);

                        foreach ($data_avec_existances as $ite) {

                            $mes_donne[]=$ite->num_examen;
                        }
                        for($i=0;$i<count($examens);$i++){
                            if(empty($mes_donne)){
                                $this->insertion_update_simples('INSERT INTO demandeexamen (nomExamen,dateDamande,num_ticket,idPatient)
                                     VALUES (:nomExamen,:dateDamande,:num_ticket,:idPatient)',[':nomExamen'=>$examens[$i],':dateDamande'=>$dateDebut,':num_ticket'=>$idTicket,':idPatient'=>$idPatient]);

                            }else{
                                if(!in_array($examens[$i],$mes_donne)){
                                    $insertion= $this->insertion_update_simples('INSERT INTO demandeexamen (nomExamen,dateDamande,num_ticket,idPatient)
                                     VALUES (:nomExamen,:dateDamande,:num_ticket,:idPatient)',[':nomExamen'=>$examens[$i],':dateDamande'=>$dateDebut,':num_ticket'=>$idTicket,':idPatient'=>$idPatient]);

                                }
                            }
                        }
                        /*
                         * fin de selection
                         */

                        /**
                         * PARTIE OU LA VERIFICATION EST BASE SUR A LA SELECTION DES ID NE SON PLUS
                         */
                        $sql="select nomExamen,num_examen,numDemanceExamen,prix_axamen,nom_examen,code_examen
                                from  demandeexamen de  join examen ex  on  de.nomExamen=ex.num_examen
                                where de.nomExamen NOT  IN (".implode(',',$examens).") AND num_ticket=:id";

                        $data_examen=$bdd->prepare($sql);
                        $data_examen->execute([':id'=>$idTicket]);

                        $data_examenPanier=$data_examen->fetchAll(PDO::FETCH_OBJ);

                        $examens_existant_vide=[];
                        $examens_existant=[];
                        $diff=null;
                        foreach ($data_examenPanier as $item) {
                            $examens_existant_vide_numDemance[]=$item->numDemanceExamen;
                            $supression=$this->insertion_update_simples('DELETE FROM demandeexamen WHERE numDemanceExamen=:id ',
                                [':id'=>$item->numDemanceExamen]);
                        }

                        /**
                         * Fin de la partie
                         */
                        if ($patient==true || $supression==true || $insertion==true ){
                            if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])&& $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){
                                return json_encode(["Modification"=>"Modifaction effectuer avec succes!!!"]);
                            }
                        }
                    }else{
                        $this->save_input_data();
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
                try{
                    $bdd->beginTransaction();
                    $this->chekErrorsString($frais_analyse,"Les frais doivent en chifre");
                    // nom
                    if (count($this->errors)==0){
                        $patient=$this->insertion_update_simples_insert_id('INSERT INTO patient (prenom_patient,nom_patient,age_patient,genre,telephonepat,ethnie)
                      VALUES (:prenom_patient,:nom_patient,:age_patient,:genre,:telephonepat,:ethnie)',
                            [":prenom_patient"=>$prenom,
                                ":nom_patient"=>$nom,
                                ":age_patient"=>$age,
                                ":genre"=>$genre,
                                ":ethnie"=>$ethnie,
                                ":telephonepat"=>$telephone]);
                        $id=$patient['lastInsertId'];

                        $ticket=$this->insertion_update_simples_insert_id('INSERT INTO ticket (date_ticket,type_ticket,motif_ticket,idPatient,date_expire,frais,idUt,codeStructure)
                      VALUES (:date_ticket,:type_ticket,:motif_ticket,:idPatient,:date_expire,:frais,:idUt,:codeStructure)',
                            [':date_ticket'=>$dateDebut,
                                ':type_ticket'=>$typeticket,
                                ':idPatient'=>$id,
                                ':date_expire'=>$dateFin,
                                ':frais'=>$frais_analyse,
                                ':idUt'=>$_SESSION['user_id'],
                                ':codeStructure'=>$service,
                                ":motif_ticket"=>$motif]);

                        $idTicket=$ticket['lastInsertId'];

                        //motif_axamen 	dateDamande 	bilanExamen 	num_consult 	num_ticket 	date_realisation 	medecinRealisation 	statut 	medecinDemande 	idPatient 	nomStructure
                        $demande=$this->insertion_update_simples_insert_id('INSERT INTO demandeexamen (dateDamande,num_ticket,idPatient)
                                VALUES (:dateDamande,:num_ticket,:idPatient)',[':dateDamande'=>$dateDebut,':num_ticket'=>$idTicket,':idPatient'=>$id]);
                        $demande_id=$demande['lastInsertId'];

                        for ($i=0;$i<count($examens);$i++){
                            $demande=$this->insertion_update_simples_insert_id('INSERT INTO ligne_analyse (id_examen,examen_dema)
                                VALUES (:id_examen,:examen_dema)',[':id_examen'=>$examens[$i],':examen_dema'=>$demande_id]);
                        }

                        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])&& $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){
                            return json_encode(["Vente"=>$id]);
                        }
                    }else{
                        $this->save_input_data();
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
            }

        }else{

            $this->save_input_data();
            return array_push($this->errors,"Les champs ne doivent pas etre vide!! ");
        }
    }

    public function dataWithSecurityConsultation($value){
        $bdd=$this->bdd();
        if ($this->VerifyFields($value)){
            $this->e(extract($_POST));
            $dateDebut= date("Y-m-d");
            $dateFin= date("Y-m-d", strtotime($dateDebut.'+10 day'));
            if(isset($idTicket)){
                try{
                    $bdd->beginTransaction();
                    $this->chekErrorsString($frais,"Les frais doivent en chifre");
                    // nom
                    if (count($this->errors)==0){
                        $patient=$this->insertion_update_simples('UPDATE  patient pat  JOIN ticket ti ON pat.num_patient=ti.idPatient
                        SET
                        pat.prenom_patient=:prenom_patient,
                        pat.nom_patient=:nom_patient,
                        pat.age_patient=:age_patient,
                        pat.genre=:genre,
                        pat.telephonepat=:telephonepat,
                        pat.ethnie=:ethnie,
                        pat.idsecurite=:idsecurite, 
                        ti.date_ticket=:date_ticket,
                        ti.type_ticket=:type_ticket,
                        ti.motif_ticket=:motif_ticket,
                        ti.date_expire=:date_expire,
                        ti.frais=:frais,
                        ti.codeStructure=:codeStructure
                        WHERE ti.num_ticket=:id',[":prenom_patient"=>$prenom,
                            ":nom_patient"=>$nom,
                            ":age_patient"=>$age,
                            ":genre"=>$genre,
                            ":ethnie"=>$ethnie,
                            ":idsecurite"=>$securite,
                            ":telephonepat"=>$telephone,
                            ':date_ticket'=>$dateDebut,
                            ':type_ticket'=>$typeticket,
                            ':id'=>$idTicket,
                            ':date_expire'=>$dateFin,
                            ':frais'=>$frais,
                            ':codeStructure'=>$service,
                            ":motif_ticket"=>$motif
                        ]);
                        if ($patient==true){
                            if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])&& $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){
                                return json_encode(["Modification"=>"Modification réussie"]);
                            }
                        }

                    }else{
                        $this->save_input_data();
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
                    try{
                    $bdd->beginTransaction();
                    $this->chekErrorsString($frais,"les frais doivent en chifre");
                    // nom
                    if (count($this->errors)==0){
                        $patient=$this->insertion_update_simples_insert_id('INSERT INTO patient (prenom_patient,nom_patient,age_patient,genre,telephonepat,ethnie,idsecurite)
                        VALUES (:prenom_patient,:nom_patient,:age_patient,:genre,:telephonepat,:ethnie,:idsecurite)',
                            [":prenom_patient"=>$prenom,
                                ":nom_patient"=>$nom,
                                ":age_patient"=>$age,
                                ":genre"=>$genre,
                                ":ethnie"=>$ethnie,
                                ":idsecurite"=>$securite,
                                ":telephonepat"=>$telephone]);
                            $id=$patient['lastInsertId'];

                        $ticket=$this->insertion_update_simples_insert_id('INSERT INTO ticket (date_ticket,type_ticket,motif_ticket,idPatient,date_expire,frais,idUt,codeStructure)
                        VALUES (:date_ticket,:type_ticket,:motif_ticket,:idPatient,:date_expire,:frais,:idUt,:codeStructure)',
                            [':date_ticket'=>$dateDebut,
                                ':type_ticket'=>$typeticket,
                                ':idPatient'=>$id,
                                ':date_expire'=>$dateFin,
                                ':frais'=>$frais,
                                ':idUt'=>$_SESSION['user_id'],
                                ':codeStructure'=>$service,
                                ":motif_ticket"=>$motif]);

                        $idTicket=$ticket['lastInsertId'];
                //motif_axamen 	dateDamande 	bilanExamen 	num_consult 	num_ticket 	date_realisation 	medecinRealisation 	statut 	medecinDemande 	idPatient 	nomStructure

                        $consultation=$this->insertion_update_simples('INSERT INTO consultation  (num_ticket)
                            VALUES (:num_ticket)',["num_ticket"=>$idTicket]);

                        if($consultation==true){
                            if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])&& $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){
                                return json_encode(["consultation"=>"Insertion reussie !!!"]);
                            }
                        }

                    }else{
                        $this->save_input_data();
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
            }
           
        }else{

            $this->save_input_data();
            return array_push($this->errors,"Les champs ne doivent pas etre vide!! ");
        }
    }

    public function dataWithOutSecurityConsultation($value=[]){
        $bdd=$this->bdd();
        if ($this->VerifyFields($value)){
            $this->e(extract($_POST));
            $dateDebut= date("Y-m-d");
            $dateFin= date("Y-m-d", strtotime($dateDebut.'+10 day'));
            if(isset($idTicket)){
                try{
                    $bdd->beginTransaction();
                    $this->chekErrorsString($frais,"Les frais doivent en chifre");
                    // nom
                    if (count($this->errors)==0){
                        $patient=$this->insertion_update_simples('UPDATE  patient pat  JOIN ticket ti ON pat.num_patient=ti.idPatient
                        SET
                        pat.prenom_patient=:prenom_patient,
                        pat.nom_patient=:nom_patient,
                        pat.age_patient=:age_patient,
                        pat.genre=:genre,
                        pat.telephonepat=:telephonepat,
                        pat.ethnie=:ethnie,
                        pat.idsecurite=:idsecurite, 
                        ti.date_ticket=:date_ticket,
                        ti.type_ticket=:type_ticket,
                        ti.motif_ticket=:motif_ticket,
                        ti.date_expire=:date_expire,
                        ti.frais=:frais,
                        ti.codeStructure=:codeStructure
                        WHERE ti.num_ticket=:id',[":prenom_patient"=>$prenom,
                            ":nom_patient"=>$nom,
                            ":age_patient"=>$age,
                            ":genre"=>$genre,
                            ":ethnie"=>$ethnie,
                            ":idsecurite"=>'',
                            ":telephonepat"=>$telephone,
                            ':date_ticket'=>$dateDebut,
                            ':type_ticket'=>$typeticket,
                            ':id'=>$idTicket,
                            ':date_expire'=>$dateFin,
                            ':frais'=>$frais,
                            ':codeStructure'=>$service,
                            ":motif_ticket"=>$motif
                        ]);
                        if($patient){
                            if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])&& $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){
                                return json_encode(["Modification"=>"Modication réussit"]);
                            }
                        }

                    }else{
                        $this->save_input_data();
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
                try{
                    $bdd->beginTransaction();
                    $this->chekErrorsString($frais,"les frais doivent en chifre");
                    // nom
                    if (count($this->errors)==0){
                        $patient=$this->insertion_update_simples_insert_id('INSERT INTO patient (prenom_patient,nom_patient,age_patient,genre,telephonepat,ethnie)
                        VALUES (:prenom_patient,:nom_patient,:age_patient,:genre,:telephonepat,:ethnie)',
                            [":prenom_patient"=>$prenom,
                                ":nom_patient"=>$nom,
                                ":age_patient"=>$age,
                                ":genre"=>$genre,
                                ":ethnie"=>$ethnie,
                                ":telephonepat"=>$telephone]);
                        $id=$patient['lastInsertId'];

                        $ticket=$this->insertion_update_simples_insert_id('INSERT INTO ticket (date_ticket,type_ticket,motif_ticket,idPatient,date_expire,frais,idUt,codeStructure)
                        VALUES (:date_ticket,:type_ticket,:motif_ticket,:idPatient,:date_expire,:frais,:idUt,:codeStructure)',
                            [':date_ticket'=>$dateDebut,
                                ':type_ticket'=>$typeticket,
                                ':idPatient'=>$id,
                                ':date_expire'=>$dateFin,
                                ':frais'=>$frais,
                                ':idUt'=>$_SESSION['user_id'],
                                ':codeStructure'=>$service,
                                ":motif_ticket"=>$motif]);

                        $idTicket=$ticket['lastInsertId'];
                    //motif_axamen 	dateDamande 	bilanExamen 	num_consult 	num_ticket 	date_realisation 	medecinRealisation 	statut 	medecinDemande 	idPatient 	nomStructure

                        $consultation=$this->insertion_update_simples('INSERT INTO consultation  (num_ticket)
                            VALUES (:num_ticket)',["num_ticket"=>$idTicket]);

                        if($consultation==true){
                            if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])&& $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){
                                return json_encode(["consultation"=>"Insertion reussie !!!"]);
                            }
                        }

                    }else{
                        $this->save_input_data();
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
            }
        }else{

            $this->save_input_data();
            return array_push($this->errors,"Les champs ne doivent pas etre vide!! ");
        }

    }

    public function modaleAdd($vlaue=[],$numAgent){

        $bdd=$this->bdd();

        if ($this->VerifyFields($vlaue)){

            $this->e(extract($_POST));

            if (count($this->errors)==0){


                $dateFin= date("Y-m-d", strtotime($dateTicket.'+10 day'));


                $ticketSave = $bdd->prepare('INSERT INTO ticket (typeTicket,dateDebut,dateFin,frais,idPatient,codeStructure,idUt)
                                                VALUES (:typeTicket,:dateDebut,:dateFin,:frais, :idPatient,:nomStructure,:idUt)');
                $ticketSave->execute([
                    ":typeTicket"=>$typeTicket,
                    ":dateDebut"=>$dateTicket,
                    ":dateFin"=>$dateFin,
                    ":frais"=>$frais,
                    ":idPatient"=>$idpatient,
                    ":nomStructure"=>$nomStructure,
                    ":idUt"=>$numAgent
                ]);
                $idTicket = $bdd->lastInsertId();
                $ticketConsult = $bdd->prepare('INSERT INTO consultation (idTicket)
                                                VALUES (:idTicket )');
                $ticketConsult->execute([
                    ":idTicket"=>$idTicket,
                ]);

                if($ticketSave && $ticketConsult){


                    if ($typeTicket=='consulation'){
                        $response=array("success"=>true,"modification"=>"Ticket de consultation pris ");

                        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){
                            return json_encode($response);
                        }

                    }
                    else if($typeTicket=='analyse'){

                        $response=array("success"=>true,"modification"=>"Ticket d'analyse pris AVEC succes");

                        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){
                            return json_encode($response);
                        }
                    }
                    $this->clear_input_data();
                }else{
                    $this->set_flash("Erreur lors de l'ajout du code source;Veuillez reessayer SVP.");
                    $this->save_input_data();
                }

            }else{
                $this->save_input_data();
            }

        }else{

            $this->save_input_data();

            return array_push($this->errors,"Les champs ne doivent pas etre vide!! ");

        }

    }

}