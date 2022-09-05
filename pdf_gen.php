<?php
require_once 'fpdf182/fpdf.php';
include 'mysqli_connect.php';
// $sql = "SELECT * FROM applicants WHERE id = ( SELECT MAX(id) FROM applicants)";

$id = (int)$_GET['appID'];
$sql = "SELECT * FROM applicants WHERE appID = '$id'";
$result = mysqli_query($con, $sql);

    // if(isset($_POST['btn_pdf']))
    if($result)
{
   $pdf = new FPDF('p', 'mm', 'a4');
   $pdf->AddPage();
   $pdf->SetFont('Arial','',14);
   $pdf->Image('images/sponsor2.jpg',10,6,30);
   $pdf->Write(15, ' ');

   
   $pdf->Ln();
   $pdf->Write(5,'Contract between: ');
   $pdf->Ln();
   $pdf->Ln();
   while ($row = mysqli_fetch_assoc($result)){

   $pdf->Write(15, $row['first_name']);
   $pdf->Write(15, ' ');
   $pdf->Write(15, $row['last_name']);
   $pdf->Ln();
   $pdf->Write(5, 'Address: ');
   $pdf->Write(5, $row['address']);
   $pdf->Write(5, ', ');
   $pdf->Write(5, $row['city']);
   $pdf->Write(5, ', ');
   $pdf->Write(5, $row['postcode']);
   $pdf->Write(5, ', ');
   $pdf->Write(5, $row['country']);
   $pdf->Ln();
   $pdf->Ln();
   $pdf->Write(5, 'hereafter mentioned as the "Participant"');
   $pdf->Ln();
   $pdf->Ln();
   $pdf->Write(5, 'and ');
   $pdf->Ln();
   $pdf->Ln();
   $pdf->Write(5, 'NASPA Gegen den Strom- Festival an der Lahn e.V. ');
   $pdf->Ln();
   $pdf->Ln();
   $pdf->Write(5, 'hereafter mentioned as the "Organiser".');
   $pdf->Ln();
   $pdf->Ln();
   $pdf->Write(5, '1. The Participant has paid the Organiser 50 Euro for the participation in the "Jacques Offenbach Grand Prix 2021".  The Participant has provided the Organiser with a receipt of payment.  ');
   $pdf->Ln();   $pdf->Ln();

   $pdf->Write(5, '2. The Participant will respect all the rules of the competition which have been outlined in the "Terms and Conditions" section of the website "offenbachgp.com".  Failure to do so will result in disqualification from the competition, without a refund of the participation fee.');
   $pdf->Ln();   $pdf->Ln();

   $pdf->Write(5, '3. The Organiser states responsibly that he will keep the Participant informed of the progress of the latter in the competition and will ensure that the Participant is treated fairly and without bias by the panel of judges.');
   $pdf->Ln();
   $pdf->Ln();
   $pdf->Write(5, '4. The Organiser will ensure that all correspondence between Participant and panel remain civil and respectful and will also protect the Participant from possible malicious behaviour in the comments section of the material of the latter.');
   $pdf->Ln();
   $pdf->Ln();
   $pdf->Write(5, '5. The Organiser will pay immediately to the Participant one of the prizes, as announced in the website "offenbachgp.com", should the Participant be awarded said prizes by the panel.');
   $pdf->Ln();
   $pdf->Ln();
   $pdf->Write(5, '6. The Organiser will request in due time (3rd round of the competition) the bank details of the Participant.  All prizes are payable only through Bank Transfer and are not payable in any other way.  If the Participant does not have a Bank Account, an account of a family member or any other type of proxy may be provided, with the Participant being solely responsible for receiving the prize from said proxy.');
   $pdf->Ln();
   $pdf->Ln();
   $pdf->Write(5, '7. The Organiser will destroy all personal data of the participants after the end of the competition.  The data and videos will remain accessible to the Organiser and the public until 1 month after the final round has ended and will then be taken down.');

   }
   

   $pdf->Output();
}

?>

<!-- http://www.fpdf.org/ -->