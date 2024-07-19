<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 27/04/2023
 * Time: 14:42
 */

use Dompdf\Dompdf;
use Dompdf\Options;
$options = new Options();
$document = new Dompdf($options);
$options->set('isRemoteEnabled', TRUE);
// if(isset($idTicket)){
//
//     $id=strip_tags($idTicket);
//
//     $sql="SELECT patient.nomPatient,patient.prenomPatient,patient.agePatient,ticket.typeTicket,ticket.frais,ticket.dateDebut FROM patient
//         INNER JOIN ticket ON patient.idPatient=ticket.idPatient
//         INNER JOIN consultation ON ticket.idTicket=consultation.idTicket
//          WHERE ticket.idTicket=:id ";
//
//     try {
//
//         $stmt = $bdd->prepare($sql);
//
//         $stmt->execute([':id'=>$id]);
//
//         $ticket = $stmt->fetch( PDO::FETCH_OBJ);
//
//         $stmt->closeCursor();
//
//
//     }catch ( Exception $e ) {
//
//         die ( $e->getMessage() );
//     }
//
//     require_once ("pdf/ticketPdf.view.php");
// }
// if(isset($idOrdo)){
//
//     $sql="SELECT * FROM patient
//            INNER JOIN consultation ON patient.num_patient=consultation.idpatient
//            INNER JOIN ordonnance ON consultation.num_consult = ordonnance.num_consult
//            INNER JOIN  medecin on medecin.num_medecin=consultation.num_medecin
//            WHERE ordonnance.num_ordo=:id and consultation.num_medecin=:idUt";
//
//     try {
//
//         $stmt = $bdd->prepare($sql);
//
//         $stmt->execute([':id'=>$idOrdo,':idUt'=>$_SESSION['user_id']]);
//
//         $patient = $stmt->fetch(PDO::FETCH_OBJ);
//
//         $stmt->closeCursor();
//
//
//     }catch ( Exception $e ) {
//
//         die ( $e->getMessage() );
//     }
//     require_once("pdf/pdfOrdonnance.view.php");
// }
//
 if(isset($idAnalyse)){
     $sql="SELECT * FROM patient 
                JOIN  demandeexamen ON `patient`.`num_patient`=`demandeexamen`.`idPatient`
                INNER JOIN examen ON examen.num_examen=demandeexamen.nomExamen
                JOIN medecin ON medecin.num_medecin=demandeexamen.medecinDemande
                WHERE numDemanceExamen=:id";

     try {
         $stmt = $bdd->prepare($sql);

         $stmt->execute([':id'=>$idAnalyse]);

         $patient= $stmt->fetch(PDO::FETCH_OBJ);

         $stmt->closeCursor();

     }catch ( Exception $e ) {

         die ( $e->getMessage() );
     }

     require_once ('pdf/analyseDemande.inc.php');
 }

 if(isset($idAnalyseRealise)){

     $sql="SELECT * FROM patient 
                JOIN  demandeexamen ON `patient`.`num_patient`=`demandeexamen`.`idPatient`
                INNER JOIN examen ON examen.num_examen=demandeexamen.nomExamen
                JOIN medecin ON medecin.num_medecin=demandeexamen.medecinDemande
                
                WHERE numDemanceExamen=:id";

     try {

         $stmt = $bdd->prepare($sql);

         $stmt->execute([':id'=>$idAnalyseRealise]);

         $patient= $stmt->fetch(PDO::FETCH_OBJ);

         $stmt->closeCursor();

     }catch ( Exception $e ) {

         die ( $e->getMessage() );
     }
     require_once ('pdf/analyseReponse.inc.php');
 }
 if(isset($dossier)){
     $consultation=new Consultation();

     $item=$consultation->FetchSelectWhere('*','patient','num_patient=:id',[':id'=>$dossier]);

     $datas=$consultation->FetchAllSelectWhere('*','patient 
    
                INNER JOIN ticket ON patient.idPatient= ticket.idPatient 
    
                INNER JOIN consultation ON ticket.idTicket = consultation.idTicket',' ticket.idPatient=:id',[":id"=>$dossier]);

     $itemRDV=$consultation->FetchAllSelectWhere('*','patient INNER JOIN rendezvous ON patient.idPatient=rendezvous.idPatient
                
                INNER JOIN consultation ON consultation.idRendezVous=rendezvous.idRendezVous ','patient.idPatient=:id',[":id"=>$dossier]);

     $analyses=$consultation->FetchAllSelectWhere('*','patient 
				JOIN  demandeexamen ON `patient`.`idPatient`=`demandeexamen`.`idPatient`
				INNER JOIN examen ON examen.codeExamen=demandeexamen.typeExamen
				INNER JOIN utilisateur ON utilisateur.idUt=demandeexamen.medecinAnalyste
				INNER join agent ON agent.numAgent=utilisateur.numAgent
				 ',"medecinAnalyste is not  NULL AND demandeexamen.idPatient=:id AND demandeexamen
                 .idMedecin=:idMedecin",[':id'=>$dossier,':idMedecin'=>$_SESSION['user_id']]);
     require_once ('pdf/listeConsultationPdf.php');
 }
if(isset($idRdv)){;
    $consultation=new Consultation();
    $item=$consultation->FetchAllSelectWhere('*','patient INNER JOIN rendez_vous ON patient.num_patient=rendezvous.idpatient
                
                INNER JOIN consultation ON consultation.idRendezVous=rendezvous.idRendezVous', 'rendezvous.idRendezVous=:id',[":id"=>$idRdv]);

    $datas=$consultation->FetchAllSelectWhere('*','patient INNER JOIN rendezvous ON patient.idPatient=rendezvous.idPatient
                
                INNER JOIN consultation ON consultation.idRendezVous=rendezvous.idRendezVous ','rendezvous.idRendezVous=:id',[":id"=>$idRdv]);
    require_once ('pdf/PdfRDV.view.php');
}

if(isset($idCommande)){

    $medicament=new Medicament();
    $fournisseur_commande=new Fournisseur();
    $Commande=new Commande();
    $fournisseur_commandes =$fournisseur_commande->FetchAllSelectWhere("*",'commande join fournisseur ON 
        commande.idFournisseur=fournisseur.idFournisseur WHERE commande.idcommande=:id','',[':id'=>$idCommande]);

   $datas=$medicament->SelectAllData("*",'medicament');

    $forunisseurs=$fournisseur_commande->SelectAllData("*",'fournisseur');

    $commandes=$medicament->FetchAllSelectWhere('*','medicament join ligne_commandes ON 
      ligne_commandes.idMedicement=medicament.idMedicement','ligne_commandes.idCommande=:id',[":id"=>$idCommande]);

    require_once ('pdf/commande.view.php');
}

$document->loadHtml($output);

//set page size and orientation
$document->getOptions()->setChroot(['http://localhost/cabinetwassa/public']);

$document->setPaper('A4', 'portrait');

//Render the HTML as PDF

$document->render();

//Get output of generated pdf in Browser


$canvas = $document->getCanvas();
$canvas->page_script(function ($pageNumber, $pageCount, $canvas, $fontMetrics) {
    $text = "Page $pageNumber/$pageCount";
    $font = $fontMetrics->getFont('monospace');
    $pageWidth = $canvas->get_width();
    $pageHeight = $canvas->get_height();
    $size = 12;
    $width = $fontMetrics->getTextWidth($text, $font, $size);
    $canvas->text($pageWidth - $width - 20, $pageHeight - 20, $text, $font, $size);
});

$document->stream("Liste des consultations effectuées", array("Attachment"=>0));
