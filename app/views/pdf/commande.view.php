
<?php $output='<!DOCTYPE html>
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
            <td width=""><img  src="http://localhost/Nouveaudossier/public/images/logowassa7.png" alt="" width="100"></td>       
            <td width="40%" >
                <h4 style="margin-top:-35px; margin-left:40px"><span style=" ">REPUBLIQUE DU MALI</span></h4>
                <p style="margin-top:-15px;margin-left:35px""><<span style=" margin-left:00px">Un Peuple - Un But - Une Foi</span></p>
            </td>       
        </tr> 
    </table>
    <br>
    <h4 style="text-decoration:underline; margin-top:-0px" align="center"><span>Commande en cours</span></h4><br>

    <table table width="97%" style="border-collapse: collapse; border: 0px;"
        <thead>
            <tr style="border: 1px solid #000; background-color:#129283; color:#fff; font-size:16px">
                <th style="font-size: 20px" class="col-6">Nom du medicament </th>
                <th style="font-size: 20px" class="col-2">La quantité</th>
                <th style="font-size: 20px" class="col-2">La prix d\'achat</th>
                <th style="font-size: 20px" class="col-2">Montant</th>
                
            </tr>
        </thead>
        <tbody>';
            $total=0;
          $counter=0; foreach ($commandes as $commande) {
              $counter++;
                $output.='<tr>
           
                <td style="border-collapse:collapse ; border:1px solid;padding:6px; font-size:13px;">'.$commande->DCI .'</td>
                <td style="border-collapse:collapse ; border:1px solid;padding:6px; font-size:13px;">'.$commande->qte_commande.'</td>
                <td style="border-collapse:collapse ; border:1px solid;padding:6px; font-size:13px;">'.$commande->prix_achat.'</td>
                <td style="border-collapse:collapse ; border:1px solid;padding:6px; font-size:13px;">'.$commande->prix_achat*$commande->qte_commande.' CFA </td>
                
                </tr>';

    $total+=$commande->prix_achat*$commande->qte_commande;
          }
          $output.='<tr>
                <td colspan="3" style="border-collapse:collapse ; border:1px solid;padding:6px; font-size:13px;text-align: center">Total</td>
               
                <td  style="border-collapse:collapse ; border:1px solid;padding:6px; font-size:13px;">'.$total.' CFA </td>

            </tr>';
            $output.='<tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td> 
                                    <br>
                                    <br>
                                    <span style="text-decoration: underline">Le fournisseur </span>';

                                $fournisseur_commandes->idFournisseur;
                            $output.='</td>
                    </tr>
                ';
$output.=" </tbody>
         </table>
        </body>

      </html>";
