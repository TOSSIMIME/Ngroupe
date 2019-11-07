<?php

    function recu($id=''){
        $userId = $this->session->userdata('user_id');
        $type = $this->session->userdata('user_type');
        if($type==1){
            
        $agence=  $this->get_option_agence();
     // Police Arial gras 15
	$this->SetFont('Arial','B',15);
	
	// Titre
	$this->Cell(0,10,'COMITE NATIONAL DE SUIVI DU PELERINAGE A LA MECQUE',1,0,'C');
	
	
	// Logo
	$this->Image('img.jpg',10,10,15);
	$this->Image('img.jpg',185,10,15);
	// Saut de ligne
	$this->Ln(10);
        
        
        $pdf->SetCreator('desis',true);

	$pdf->SetFont('Courier','B',15);
	$pdf->Ln(3);
	$pdf->Cell(0,6,$date,0,1,'L');
		$pdf->Ln(1);
		//$pdf->Cell(0);
$pdf->Cell(0,10,'AGENCE : '.strtoupper(utf8_decode($agence[$userId])),0,1,'C');
		//$pdf->Ln(2);
$pdf->Cell(0,10,'ACCUSE D\'ENREGISTREMENT AU HADJ '.$periode,'B',1,'C');
$pdf->Ln(0);
$pdf->SetFont('Courier','B',12);



$query_pelerin = $this->pelerinManager->liste_pelerin(array('A.id_ag' => $userId, 'P.id_pele'=>$id));

if(is_array($query_pelerin)){
    foreach ($query_pelerin as $loop) {
  $pdf->Cell(50);
$pdf->Cell(10,10,utf8_decode(strtoupper('N° Passeport')).'  :  '.utf8_decode(strtoupper($loop->passport_pele)),0,0,'L');
$pdf->Ln(12);

$pdf->Cell(50);
$pdf->Cell(10,10,utf8_decode(strtoupper('Nom')).'  :  '.utf8_decode(strtoupper($loop->nom_pele)),0,0,'L');
$pdf->Ln(12);

$pdf->Cell(50);
$pdf->Cell(10,10,utf8_decode(strtoupper('Prenom')).'  :  '.utf8_decode(strtoupper($loop->prenom_pele)),0,0,'L');
$pdf->Ln(12);

$pdf->Cell(50);
$pdf->Cell(10,10,utf8_decode(strtoupper('date de naissance')).'  :  '.utf8_decode(strtoupper($loop->date_naiss_pele)),0,0,'L');
$pdf->Ln(12);
$pdf->Cell(50);
$pdf->Cell(10,10,utf8_decode(strtoupper('sexe')).'  :  '.utf8_decode(strtoupper($loop->sexe_pele)),0,0,'L');
$pdf->Ln(12);

$pdf->Cell(50);
$pdf->Cell(10,10,utf8_decode(strtoupper('e-mail')).'  :  '.utf8_decode(strtoupper($loop->mail_pele)),0,0,'L');
$pdf->Ln(12);

$pdf->Cell(50);
$pdf->Cell(10,10,utf8_decode(strtoupper('ordre d\'enregistrement CNSPM')).'  :  '.utf8_decode(strtoupper($loop->ariv_pele)),0,0,'L');
$pdf->Ln(12);

$pdf->Cell(50);
$pdf->Cell(10,10,utf8_decode(strtoupper('date d\'enregistrement')).'  :  '.utf8_decode(strtoupper($loop->date_save)),0,0,'L');
$pdf->Ln(12);

$pdf->Cell(50);
$pdf->Cell(10,10,utf8_decode(strtoupper('telephone')).'  :  '.utf8_decode(strtoupper($loop->tel_pele)),0,0,'L');
$pdf->Ln(12);

$pdf->Cell(50);
$pdf->Cell(10,10,utf8_decode(strtoupper("Ordre d'enregistrement agence")).'  :  '.utf8_decode(strtoupper($loop->position_ag)),0,0,'L');
$pdf->Ln(12);

$pdf->Cell(50);
$pdf->Cell(10,10,utf8_decode(strtoupper('Depart')).'  :  '.utf8_decode(strtoupper($loop->lieu_dep_pele)),0,0,'L');
$pdf->Ln(12);


$pdf->Cell(50);
$pdf->Cell(10,10,utf8_decode(strtoupper('Type')).'  :  '.utf8_decode(strtoupper($loop->type_pele)),0,0,'L');
$pdf->Ln(12);

$pdf->Cell(50);
$pdf->Cell(10,10,utf8_decode(strtoupper('montant verse')).'  :  '.utf8_decode(strtoupper($loop->montant_pele)),0,0,'L');
$pdf->Ln(12);

$pdf->Cell(50);
$pdf->Cell(10,10,utf8_decode(strtoupper('nationalite')).'  :  '.utf8_decode(strtoupper($loop->nationalite_pele)),0,0,'L');
$pdf->Ln(12);
        
        
    }
}

$pdf->SetFont('Courier','I',9);
$pdf->Cell(0,5,'NB:verifier votre enregistrement en ligne avec votre numero de passeport au: www.comitehadj.gov.bf ');



// Décalage à droite

$pdf->SetFont('Courier','B',12);

$pdf->Image('11779_Armoiries.png',0,180,0);
$pdf->Image('logo.png',40,-10,0);
$pdf->Ln(20);
$pdf->Cell(150);
$pdf->Cell(0,10,utf8_decode(strtoupper($nom)),0,'R');
$pdf->Ln(5);
$pdf->Cell(140);
$pdf->SetFont('Courier','',10);
$pdf->Cell(0,10,"cachet et signature",0,'R');




$this->Ln(50);
	$this->Image('15544269-certifie-grunge-timbreOKOK.png',5,230,60);

        
    }}
?>
