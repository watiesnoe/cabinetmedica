<?php

use Dompdf\Dompdf;
use Dompdf\Options;
$options = new Options();
$document = new Dompdf($options);
$options->setIsRemoteEnabled(true);
 if(isset($idTicket)){

     $id=strip_tags($idTicket);

     $sql="SELECT patient.nom_patient,patient.prenom_patient,patient.age_patient,ticket.type_ticket,ticket.frais,ticket.date_ticket FROM patient 
         INNER JOIN ticket ON patient.num_patient=ticket.idPatient
         INNER JOIN consultation ON ticket.num_ticket=consultation.num_ticket 
         WHERE ticket.num_ticket=:id ";

     try {

         $stmt = $bdd->prepare($sql);

         $stmt->execute([':id'=>$id]);

         $ticket = $stmt->fetch( PDO::FETCH_OBJ);

         $stmt->closeCursor();


     }catch ( Exception $e ) {

         die ( $e->getMessage() );
     }

     require_once ("pdf/ticketPdf.view.php");
 }

$document->loadHtml($output);

//set page size and orientation
//$document->getOptions()->setChroot(['http://localhost/Nouveaudossier/public']);

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