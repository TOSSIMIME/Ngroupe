<?php

///classe 
class PDF extends FPDF
{
// En-tête
function Header()
{
require('../connexion/bd_conexion.php');
$vol=$_POST['vol'];
$re="SELECT nom_vol FROM vol WHERE  id_vol='$vol'";

$lecto=$dbh->prepare($re);
		$lecto->execute();
								
                                	if($lecto){
								$valu = $lecto->fetch(PDO::FETCH_NUM);
								
								$nomvol=$valu[0];
								}
								
								
	$period=gmstrftime(" %Y",time());
	
	if(isset($_SESSION['etat'])){
	$etat=$_SESSION['etat'];
		}else{

		$etat='';
		}
	//$nom=$_SESSION['agence'];
	// Police Arial gras 15
	$this->SetFont('Arial','B',15);
	
	// Titre
	$this->Cell(0,10,'COMITE NATIONAL DE SUIVI DU PELERINAGE A LA MECQUE',1,0,'C');
	$this->Ln(15);
	$this->SetFont('Arial','B',10);
	//$this->Cell(0,10,'AGENCE: '.strtoupper($nom),0,0,'C');
		//$this->Ln(10);
	$this->Cell(0,10,'LISTE DES PELERINS '.strtoupper($etat).'S AU HADJ '.$period.' : '.strtoupper($nomvol),0,0,'C');
	
	
	// Logo
	$this->Image('img.jpg',10,10,15);
	$this->Image('img.jpg',185,10,15);
	// Saut de ligne
	$this->Ln(15);
}

function Footer()
{
    // Positionnement à 1,5 cm du bas
    $this->SetY(-15);
    // Police Arial italique 8
    $this->SetFont('Arial','I',8);
    // Numéro de page centré
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}
	}

$pdf = new PDF('P','mm','A4');
$pdf->AddPage();

//$id=$_SESSION['idagence'];


$vol=$_POST['vol'];
if($vol!=0){
$req="SELECT * FROM pelerins WHERE etat_pele='definitif'  and id_vol='$vol' ORDER BY id_ag ASC";


$lect=$dbh->prepare($req);
		$lect->execute();

if($lect){
$pdf->SetFont('Arial','B',8);
while($val = $lect->fetch((PDO::FETCH_OBJ))){
$pdf->Cell(10);
$i=0;
$numero_ordre = 0;

	foreach($val as $k => $v){

//echo $numero_ordre;
//$numero_ordre ++;

		switch($k){



case 'passport_pele':
		$k='passeport';
		break;
case 'nom_pele':
		$k='nom';
		break;
		case 'prenom_pele':
		$k='prenom';
		break;
		case 'date_naiss_pele':
		$k='naissance';
		break;
		case 'sexe_pele':
		$k='sexe';
		break;
		/*case 'mail_pele':
		$k='e-mail';
		break;*/
		case 'ariv_pele':
		$k='CNSPM';
        //$k=$numero_ordre;
		break;
		case 'tel_pele':
		$k='telephone';
		break;
		case 'id_ag':
		$k="agence";
		break;
		case 'lieu_dep_pele':
		$k="depart";
		break;
		/*case 'etat_pele':
		$k="etat";
		break;*/
		case 'type_pele':
		$k="type";
		break;
		/*case 'montant_pele':
		$k="montant verse";
		break;*/
		case 'nationalite_pele':
		$k="nationalite";
		break;
}
			
		if($k!='position_ag' && $k!='etat_pele' && $k!='id_admin' && $k!='date_save' && $k!='mail_pele' && $k!='photo_pele' && $k!='telephone'&& $k!='id_vol'&&$k!='montant_pele'){
		$pdf->Cell(16,5,$k,'B',0,'C');
			}
			
			
		$i++;
	}
	if($i!=0) break;
}

$lect=$dbh->prepare($req);
		$lect->execute();

if($lect){
$pdf->Ln();
$pdf->SetFont('Arial','B',6);
while($valu = $lect->fetch((PDO::FETCH_OBJ))){
$pdf->Cell(10);
	foreach($valu as $nom => $v){
		
		if($nom!='position_ag' && $nom!='id_admin'&& $nom!='date_save' && $nom!='etat_pele' && $nom!='mail_pele' && $nom!='photo_pele' && $nom!='tel_pele'&& $nom!='id_vol'&&$nom!='montant_pele'){
			if($nom=='id_ag'){
			$re="SELECT nom_ag FROM agences WHERE  id_ag='$v'";

				$lecto=$dbh->prepare($re);
						$lecto->execute();
								
                                	if($lecto){
								$valu = $lecto->fetch(PDO::FETCH_NUM);
								
								$pdf->Cell(16,15,$valu[0],'B',0,'C');
								}
			
			
			}else
		$pdf->Cell(16,15,$v,'B',0,'C');
		}
		
	}
		$pdf->Ln();
	}
}

}
}

$pdf->Output();

?>