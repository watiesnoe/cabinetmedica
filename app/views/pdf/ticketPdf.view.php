<?php $output ='
 <!DOCTYPE html>
  <html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Page Title</title>
        <style>
            *{margin:10px 5px 5px 10px;padding:0}
        </style>
    </head>
    <body>
        <table width="100%" style="border-collapse: collapse; border: 1px;" align="center"> 
        <tr>
            <td width="40%">
                <h4 style=""><span>Ministère de la santé</span></h4><br>
                <p style="margin-top:-15px"><span>Direction Régionale de la Santé de Ségou</span></p> <br>
                <h4 style="margin-top:-15px"><span>Cabinet Médical Wassa</span></h4><br>
                <p style="margin-top:-15px"><span style="border-bottom: 2px solid #000">Tel:</span> <span>(0023) 73 12 33 01</span></p>
            </td>
           <td width=""><img  src="http://127.0.0.1/cabinetwassa2/public/images/logowassa7.png" alt="" width="100"></td>    
            <td width="40%" >
                <h4 style="margin-top:-35px; margin-left:40px"><span style=" ">REPUBLIQUE DU MALI</span></h4>
                <p style="margin-top:-15px;margin-left:35px""><<span style=" margin-left:00px">Un Peuple - Un But - Une Foi</span></p>
            </td>       
        </tr> 
    </table>';

$output.="<br>

         <h4 style='text-decoration:underline; margin-top:-0px' align='center'>
                <span>Ticket de  ". ucfirst($ticket->type_ticket) ."</span>
         </h4><br>";
$output .='
                <p style="margin-left:100px; margin-top:30px;">Patient: 
                <b>'. $ticket->prenom_patient.'  '.$ticket->nom_patient.'</b>
                &nbsp;&nbsp;&nbsp; <span>Age : '.$ticket->age_patient.'
                </span>&nbsp;&nbsp;&nbsp; </p>
            ';
$output .= '
      
            <table table width="90%" style="border-collapse: collapse; border: 0px; margin-left:90px"> 
            
            <tbody>';
$output .= '  
                       <tr>
                            <td class="text" style=" padding:4px; font-size:12px;font-weight: bold">Date de prescription :</td>
                            <td class="text" style=" padding:4px; font-size:12px;">'.date('d/m/Y', strtotime($ticket->date_ticket)).'</td>
                       </tr>
                       <tr>
                            <td class="text" style=" padding:4px; font-size:12px;font-weight: bold">Date d\'expiration :</td>
                            <td class="text" style=" padding:4px; font-size:12px;">'.date('d/m/Y', strtotime($ticket->date_ticket.' +10 day')).'</td>
                       </tr>
                      
                       <tr>
                            <td class="text" style=" padding:4px; font-size:12px;font-weight: bold">Somme :</td>
                            <td class="text" style=" padding:4px; font-size:12px;">'.$ticket->frais.' FCFA</td>
                       </tr> ';

$output.=" 
        </body>
      </html>
        ";