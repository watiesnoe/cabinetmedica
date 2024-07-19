<?php
include_once '../sys/core/init.inc.php';

require_once 'dompdf/autoload.view.php';

// reference the Dompdf namespace

use Dompdf\Dompdf;

//initialize dompdf class
if (isset($_GET['id']) && !empty($_GET['id']) && $_GET['id']=== 'PDFS'){
    $sql="SELECT *                       
        FROM  patient 
        INNER JOIN ticket ON patient.idPatient= ticket.idPatient 
        INNER JOIN consultation ON ticket.idTicket = consultation.idTicket
         ORDER BY ticket.idTicket DESC";

    try {

        $stmt = $dbo->prepare($sql);

        $stmt->execute();

        $results = $stmt->fetchAll( PDO::FETCH_OBJ);

        $stmt->closeCursor();


    }catch ( Exception $e ) {

        die ( $e->getMessage() );
    }

    require_once ('assets/pdf/ticketListPdf.php');

}
$document = new Dompdf;
if (isset($_GET['id']) && !empty($_GET['id']) && $_GET['id']==='actus'){
    $date=date('Y-m-d');
    $sql="SELECT *
             FROM  patient 

            INNER JOIN ticket ON patient.idPatient= ticket.idPatient 

            INNER JOIN consultation ON ticket.idTicket = consultation.idTicket

              WHERE dateDebut=:dateDebut  ORDER BY `ticket`.`dateDebut` DESC";

    try {

        $stmt = $dbo->prepare($sql);

        $stmt->execute([":dateDebut"=>$date]);

        $results = $stmt->fetchAll( PDO::FETCH_OBJ);

        $stmt->closeCursor();


    }catch ( Exception $e ) {

        die ( $e->getMessage() );
    }

    require_once ('assets/pdf/ticketListPdfActus.php');

}

if (isset($_GET['PDFS']) && !empty($_GET['PDFS'])){

    $id=strip_tags($_GET['PDFS']);

    $sql="SELECT patient.nomPatient,patient.prenomPatient,patient.agePatient,ticket.typeTicket,ticket.frais,ticket.dateDebut FROM patient 
         INNER JOIN ticket ON patient.idPatient=ticket.idPatient
         INNER JOIN consultation ON ticket.idTicket=consultation.idTicket 
          WHERE ticket.idTicket=:id ";

    try {

        $stmt = $dbo->prepare($sql);

        $stmt->execute([':id'=>$id]);

        $item = $stmt->fetch( PDO::FETCH_OBJ);

        $stmt->closeCursor();


    }catch ( Exception $e ) {

        die ( $e->getMessage() );
    }

    require_once ('assets/pdf/ticketPdf.view.php');
}






$document->loadHtml($output);

//set page size and orientation

$document->setPaper('A4', 'portrait');

//Render the HTML as PDFS

$document->render();

//Get output of generated pdf in Browser

$document->stream("Liste des consultations effectuées", array("Attachment"=>0));
//1  = Download
//0 = Preview

