<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class PDF extends CI_Controller {

    public function __construct() {
        parent::__construct();

        //chargement des ressource du constructeur
        $this->load->helper(array('url', 'assets'));
        $this->load->helper('fn_info');
        $this->load->library('form_validation');
        $this->load->library('ftp');
        $this->load->library('session');
        $this->load->library('fpdf_gen');
        $this->load->model('pelerin_modele', 'pelerinManager');
        $this->load->model('agence_modele', 'agenceManager');
        $this->load->model('vol_modele', 'volManager');
    }
   
    public function index() {


//		$this->fpdf->SetFont('Arial','B',16);
//		$this->fpdf->Cell(40,10,'Hello World!');

        $period = gmstrftime(" %Y", time());
        $date = Date('y-m-d H:i:s');
        // Police Arial gras 15
        $this->fpdf->SetFont('Arial', 'B', 15);
        $etat = 'Definitif';
        // Titre
        $this->fpdf->Cell(0, 10, 'COMITE NATIONAL DE SUIVI DU PELERINAGE A LA MECQUE', 1, 0, 'C');
        $this->fpdf->Ln(15);
        $this->fpdf->SetFont('Arial', 'B', 10);
        $this->fpdf->Cell(0, 10, 'LISTE DES PELERINS ' . strtoupper($this->etat($etat)) . 'S AU HADJ ' . $period . ' : ' . strtoupper("NomVOL"), 0, 0, 'C');

        // Logo
        $this->fpdf->Image(imgage_url("img.jpg"), 10, 10, 15);
        $this->fpdf->Image(imgage_url("img.jpg"), 185, 10, 15);
        // Saut de ligne
        $this->fpdf->Ln(15);



        echo $this->fpdf->Output("hello_world$date.pdf", 'D');
    }
 
    function recu($id=''){
        $userId = $this->session->userdata('user_id');
        $type = $this->session->userdata('user_type');
        
        setlocale (LC_ALL, "fr");
$date=gmstrftime(" Date: %c",time());
$periode=gmstrftime(" %Y",time());
        if($type==1){
            
        $agence=  $this->get_option_agence();
     // Police Arial gras 15
	$this->fpdf->SetFont('Arial','B',15);
	
	// Titre
	$this->fpdf->Cell(0,10,'COMITE NATIONAL DE SUIVI DU PELERINAGE A LA MECQUE',1,0,'C');
	
	
	// Logo
	$this->fpdf->Image(imgage_url('img.jpg'),10,10,15);
	$this->fpdf->Image(imgage_url('img.jpg'),185,10,15);
	// Saut de ligne
	$this->fpdf->Ln(10);
        
        
        $this->fpdf->SetCreator('desis',true);

	$this->fpdf->SetFont('Courier','B',15);
	$this->fpdf->Ln(3);
	$this->fpdf->Cell(0,6,$date,0,1,'L');
		$this->fpdf->Ln(1);
		//$this->fpdf->Cell(0);
$this->fpdf->Cell(0,10,'AGENCE : '.strtoupper(utf8_decode($agence[$userId])),0,1,'C');
		//$this->fpdf->Ln(2);
$this->fpdf->Cell(0,10,'ACCUSE D\'ENREGISTREMENT AU HADJ '.$periode,'B',1,'C');
$this->fpdf->Ln(0);
$this->fpdf->SetFont('Courier','B',12);



$query_pelerin = $this->pelerinManager->liste_pelerin(array('A.id_ag' => $userId, 'P.id_pele'=>$id));

if(is_array($query_pelerin)){
    foreach ($query_pelerin as $loop) {
  $this->fpdf->Cell(50);
$this->fpdf->Cell(10,10,utf8_decode(strtoupper('N° Passeport')).'  :  '.utf8_decode(strtoupper($loop->passport_pele)),0,0,'L');
$this->fpdf->Ln(12);

$this->fpdf->Cell(50);
$this->fpdf->Cell(10,10,utf8_decode(strtoupper('Nom')).'  :  '.utf8_decode(strtoupper($loop->nom_pele)),0,0,'L');
$this->fpdf->Ln(12);

$this->fpdf->Cell(50);
$this->fpdf->Cell(10,10,utf8_decode(strtoupper('Prenom')).'  :  '.utf8_decode(strtoupper($loop->prenom_pele)),0,0,'L');
$this->fpdf->Ln(12);

$this->fpdf->Cell(50);
$this->fpdf->Cell(10,10,utf8_decode(strtoupper('date de naissance')).'  :  '.utf8_decode(strtoupper($loop->date_naiss_pele)),0,0,'L');
$this->fpdf->Ln(12);
$this->fpdf->Cell(50);
$this->fpdf->Cell(10,10,utf8_decode(strtoupper('sexe')).'  :  '.utf8_decode(strtoupper($loop->sexe_pele)),0,0,'L');
$this->fpdf->Ln(12);

$this->fpdf->Cell(50);
$this->fpdf->Cell(10,10,utf8_decode(strtoupper('e-mail')).'  :  '.utf8_decode(strtoupper($loop->mail_pele)),0,0,'L');
$this->fpdf->Ln(12);

$this->fpdf->Cell(50);
$this->fpdf->Cell(10,10,utf8_decode(strtoupper('ordre d\'enregistrement CNSPM')).'  :  '.utf8_decode(strtoupper($loop->ariv_pele)),0,0,'L');
$this->fpdf->Ln(12);

$this->fpdf->Cell(50);
$this->fpdf->Cell(10,10,utf8_decode(strtoupper('date d\'enregistrement')).'  :  '.utf8_decode(strtoupper($loop->date_save)),0,0,'L');
$this->fpdf->Ln(12);

$this->fpdf->Cell(50);
$this->fpdf->Cell(10,10,utf8_decode(strtoupper('telephone')).'  :  '.utf8_decode(strtoupper($loop->tel_pele)),0,0,'L');
$this->fpdf->Ln(12);


$this->fpdf->Cell(50);
$this->fpdf->Cell(10,10,utf8_decode(strtoupper('Depart')).'  :  '.utf8_decode(strtoupper($loop->lieu_dep_pele)),0,0,'L');
$this->fpdf->Ln(12);


$this->fpdf->Cell(50);
$this->fpdf->Cell(10,10,utf8_decode(strtoupper('Type')).'  :  '.utf8_decode(strtoupper($loop->type_pele)),0,0,'L');
$this->fpdf->Ln(12);

$this->fpdf->Cell(50);
$this->fpdf->Cell(10,10,utf8_decode(strtoupper('montant verse')).'  :  '.utf8_decode(strtoupper($loop->montant_pele)),0,0,'L');
$this->fpdf->Ln(12);

$this->fpdf->Cell(50);
$this->fpdf->Cell(10,10,utf8_decode(strtoupper('nationalite')).'  :  '.utf8_decode(strtoupper($loop->nationalite_pele)),0,0,'L');
$this->fpdf->Ln(12);
        
        
    }
}

$this->fpdf->SetFont('Courier','I',9);
$this->fpdf->Cell(0,5,'NB:verifier votre enregistrement en ligne avec votre numero de passeport au: www.comitehadj.gov.bf ');



// Décalage à droite

$this->fpdf->SetFont('Courier','B',12);

$this->fpdf->Image(imgage_url('11779_Armoiries.png'),0,180,0);
$this->fpdf->Image(imgage_url('logo.png'),40,-10,0);
$this->fpdf->Ln(20);
$this->fpdf->Cell(150);
$this->fpdf->Cell(0,10,utf8_decode(strtoupper("")),0,'R');
$this->fpdf->Ln(5);
$this->fpdf->Cell(140);
$this->fpdf->SetFont('Courier','',10);
$this->fpdf->Cell(0,10,"cachet et signature",0,'R');




$this->fpdf->Ln(50);
$this->fpdf->Image(imgage_url('15544269-certifie-grunge-timbreOKOK.png'),5,230,60);



 echo $this->fpdf->Output("pelerin_$id.pdf", 'D');    
    }}


    
    
     function pelevol() {
       
        $vols = $this->get_option_vol();

        $pelerin = "Tous";
        $vol = $this->input->post('vol');
        $ville=$this->input->post('ville');
        $export=  $this->input->post('export');
        
        if($export=='Export Csv'){
            $this->export_csv($vol, $ville);
        }  else {
         $this->export_pdf($vol, $ville);   
        }

        
    }
    function  export_pdf($vol, $ville){
        $user_id = $this->session->userdata('user_id');
        $type = $this->session->userdata('user_type');
        
if($type==1){
$agence=  $this->get_option_agence(); 
$nom_agence=$agence[$user_id];
}
 if (is_numeric($vol)) {
            $vol_name=  $this->get_option_vol();
            $nom_vol=$vol_name[$vol];}
        
        
        if ($ville=="Toutes") {
        if (is_numeric($vol)) {
                        if ($type==0 || $type==2) {
                            $query_pelerin = $this->pelerinManager->liste_pelerin(array('P.id_vol' => $vol));
                            $this->header('', '', $nom_vol);
                        } elseif ($type == 1) {
                            $query_pelerin = $this->pelerinManager->liste_pelerin(array('A.id_ag' => $user_id, 'P.id_vol' => $vol));
                        $this->header('', $nom_agence, $nom_vol);
                            }
                       
            
        } 
        else {
                        if ($type==0 || $type==2) {
                            $query_pelerin = $this->pelerinManager->liste_pelerin(array());
                          $this->header('', '', '');
                            
                        } elseif ($type == 1) {
                            $query_pelerin = $this->pelerinManager->liste_pelerin(array('A.id_ag' => $user_id));
                        $this->header('', $nom_agence, '');
                            
                        }
                       
            
        } }  else {
   if (is_numeric($vol)) {
                        if ($type==0 || $type==2) {
                            $query_pelerin = $this->pelerinManager->liste_pelerin(array('P.id_vol' => $vol,'lieu_dep_pele'=>$ville));
                        $this->header('', '', $nom_vol,$ville);
                            } elseif ($type == 1) {
                            $query_pelerin = $this->pelerinManager->liste_pelerin(array('A.id_ag' => $user_id, 'P.id_vol' => $vol,'lieu_dep_pele'=>$ville));
                          $this->header('', $nom_agence, $nom_vol,$ville);

                            }
                      
            
        } else {
                        if ($type==0 || $type==2) {
                            $query_pelerin = $this->pelerinManager->liste_pelerin(array('lieu_dep_pele'=>$ville));
                           $this->header('', '', '',$ville);
                            } elseif ($type == 1) {
                            $query_pelerin = $this->pelerinManager->liste_pelerin(array('A.id_ag' => $user_id,'lieu_dep_pele'=>$ville));
                             $this->header('', $nom_agence, '',$ville);

                            }
                     
            
        }         
     
 }

 
      ///ceation PDF
 
 
if($ville=="Toutes"){        

 if($type==0 || $type==2){
  $this->fpdf->SetFont('Arial','B',8);
 $this->fpdf->Cell(8);
 $this->fpdf->Cell(16,5,  utf8_decode("N° Passeport"),'B',0,'C');
 $this->fpdf->Cell(23,5,"Nom",'B',0,'C');
 $this->fpdf->Cell(23,5, utf8_decode('Prénom'),'B',0,'C');
 $this->fpdf->Cell(16,5,"Naissance",'B',0,'C');
 $this->fpdf->Cell(16,5,"sexe",'B',0,'C');
 $this->fpdf->Cell(16,5,  utf8_decode("N° CNSPM"),'B',0,'C');
 $this->fpdf->Cell(16,5,"Phone",'B',0,'C');
 $this->fpdf->Cell(16,5,"Agence",'B',0,'C');
// $this->fpdf->Cell(16,5,"Vol",'B',0,'C');
 $this->fpdf->Cell(16,5,"Depart",'B',0,'C');
// $this->fpdf->Cell(16,5,"Type",'B',0,'C');
 $this->fpdf->Cell(16,5,  utf8_decode( "Nationalité"),'B',0,'C');
 $this->fpdf->SetFont('Arial','',6);
   
 if (is_array($query_pelerin) && count($query_pelerin)) {
     $value=0;
            foreach ($query_pelerin as $loop) {
                 $this->fpdf->Ln();
                $this->fpdf->Cell(10);
               $this->fpdf->Cell(16,10,$loop->passport_pele,'B',0,'C');
               $this->fpdf->Cell(23,10,utf8_decode($loop->nom_pele),'B',0,'C');
               $this->fpdf->Cell(23,10,utf8_decode($loop->prenom_pele),'B',0,'C');
               $this->fpdf->Cell(16,10,$loop->date_naiss_pele,'B',0,'C');
               $this->fpdf->Cell(16,10,$loop->sexe_pele,'B',0,'C');
               $this->fpdf->Cell(16,10,$loop->ariv_pele,'B',0,'C');
               $this->fpdf->Cell(16,10,$loop->tel_pele,'B',0,'C');
               $this->fpdf->Cell(16,10,utf8_decode($loop->nom_ag),'B',0,'C');
//               $this->fpdf->Cell(16,10,$loop->id_vol,'B',0,'C');
               $this->fpdf->Cell(16,10,$this->get_ville($loop->lieu_dep_pele),'B',0,'C');
//               $this->fpdf->Cell(16,10,$loop->type_pele,'B',0,'C');
               $this->fpdf->Cell(16,10,utf8_decode($loop->nationalite_pele),'B',0,'C');


               
            }}   
 }elseif ($type==1) {
  $this->fpdf->SetFont('Arial','B',8);
 $this->fpdf->Cell(8);
 $this->fpdf->Cell(16,5,utf8_decode("N° Passeport"),'B',0,'C');
 $this->fpdf->Cell(23,5,"Nom",'B',0,'C');
 $this->fpdf->Cell(23,5,"Prenom",'B',0,'C');
 $this->fpdf->Cell(16,5,"Naissance",'B',0,'C');
 $this->fpdf->Cell(16,5,"sexe",'B',0,'C');
 $this->fpdf->Cell(16,5,utf8_decode("N° CNSPM"),'B',0,'C');
 $this->fpdf->Cell(16,5,"Phone",'B',0,'C');
// $this->fpdf->Cell(16,5,"Agence",'B',0,'C');
// $this->fpdf->Cell(16,5,"Vol",'B',0,'C');
 $this->fpdf->Cell(16,5,"Depart",'B',0,'C');
 $this->fpdf->Cell(16,5,"Type",'B',0,'C');
 $this->fpdf->Cell(16,5,utf8_decode("Nationalité"),'B',0,'C');
 $this->fpdf->SetFont('Arial','',6);
   
 if (is_array($query_pelerin) && count($query_pelerin)) {
     $value=0;
            foreach ($query_pelerin as $loop) {
                 $this->fpdf->Ln();
                $this->fpdf->Cell(10);
               $this->fpdf->Cell(16,10,$loop->passport_pele,'B',0,'C');
               $this->fpdf->Cell(23,10,utf8_decode($loop->nom_pele),'B',0,'C');
               $this->fpdf->Cell(23,10,utf8_decode($loop->prenom_pele),'B',0,'C');
               $this->fpdf->Cell(16,10,$loop->date_naiss_pele,'B',0,'C');
               $this->fpdf->Cell(16,10,$loop->sexe_pele,'B',0,'C');
               $this->fpdf->Cell(16,10,$loop->ariv_pele,'B',0,'C');
               $this->fpdf->Cell(16,10,$loop->tel_pele,'B',0,'C');
//               $this->fpdf->Cell(16,10,$loop->nom_ag,'B',0,'C');
//               $this->fpdf->Cell(16,10,$loop->id_vol,'B',0,'C');
               $this->fpdf->Cell(16,10,$this->get_ville($loop->lieu_dep_pele),'B',0,'C');
               $this->fpdf->Cell(16,10,$loop->type_pele,'B',0,'C');
               $this->fpdf->Cell(16,10,utf8_decode($loop->nationalite_pele),'B',0,'C');


               
            }}          
 }}  
 

 
 
 
 else {
  if($type==0 || $type==2){
  $this->fpdf->SetFont('Arial','B',8);
 $this->fpdf->Cell(8);
 $this->fpdf->Cell(16,5,utf8_decode(" N° Passeport"),'B',0,'C');
 $this->fpdf->Cell(23,5,"Nom",'B',0,'C');
 $this->fpdf->Cell(23,5,  utf8_decode("Prénom"),'B',0,'C');
 $this->fpdf->Cell(16,5,"Naissance",'B',0,'C');
 $this->fpdf->Cell(16,5,"sexe",'B',0,'C');
 $this->fpdf->Cell(16,5,utf8_decode("N° CNSPM"),'B',0,'C');
 $this->fpdf->Cell(16,5,"Phone",'B',0,'C');
 $this->fpdf->Cell(16,5,"Agence",'B',0,'C');
// $this->fpdf->Cell(16,5,"Vol",'B',0,'C');
// $this->fpdf->Cell(16,5,"Depart",'B',0,'C');
 $this->fpdf->Cell(16,5,"Type",'B',0,'C');
 $this->fpdf->Cell(16,5,utf8_decode("Nationalité"),'B',0,'C');
 $this->fpdf->SetFont('Arial','',6);
   
 if (is_array($query_pelerin) && count($query_pelerin)) {
     $value=0;
            foreach ($query_pelerin as $loop) {
               $this->fpdf->Ln();
                $this->fpdf->Cell(10);
               $this->fpdf->Cell(16,10,$loop->passport_pele,'B',0,'C');
               $this->fpdf->Cell(23,10,utf8_decode($loop->nom_pele),'B',0,'C');
               $this->fpdf->Cell(23,10,utf8_decode($loop->prenom_pele),'B',0,'C');
               $this->fpdf->Cell(16,10,$loop->date_naiss_pele,'B',0,'C');
               $this->fpdf->Cell(16,10,$loop->sexe_pele,'B',0,'C');
               $this->fpdf->Cell(16,10,$loop->ariv_pele,'B',0,'C');
               $this->fpdf->Cell(16,10,$loop->tel_pele,'B',0,'C');
               $this->fpdf->Cell(16,10,utf8_decode($loop->nom_ag),'B',0,'C');
//               $this->fpdf->Cell(16,10,$loop->id_vol,'B',0,'C');
//               $this->fpdf->Cell(16,10,$this->get_ville($loop->lieu_dep_pele),'B',0,'C');
               $this->fpdf->Cell(16,10,utf8_decode($loop->type_pele),'B',0,'C');
               $this->fpdf->Cell(16,10,utf8_decode($loop->nationalite_pele),'B',0,'C');


               
            }}   
 }elseif ($type==1) {
  $this->fpdf->SetFont('Arial','B',8);
 $this->fpdf->Cell(8);
 $this->fpdf->Cell(16,5,utf8_decode("N° Passeport"),'B',0,'C');
 $this->fpdf->Cell(23,5,"Nom",'B',0,'C');
 $this->fpdf->Cell(23,5,utf8_decode("Prénom"),'B',0,'C');
 $this->fpdf->Cell(16,5,"Naissance",'B',0,'C');
 $this->fpdf->Cell(16,5,"sexe",'B',0,'C');
 $this->fpdf->Cell(16,5,utf8_decode("N° CNSPM"),'B',0,'C');
 $this->fpdf->Cell(16,5,"Phone",'B',0,'C');
// $this->fpdf->Cell(16,5,"Agence",'B',0,'C');
// $this->fpdf->Cell(16,5,"Vol",'B',0,'C');
// $this->fpdf->Cell(16,5,"Depart",'B',0,'C');
 $this->fpdf->Cell(16,5,"Type",'B',0,'C');
 $this->fpdf->Cell(16,5,utf8_decode("Nationalité"),'B',0,'C');
 $this->fpdf->SetFont('Arial','',6);
   
 if (is_array($query_pelerin) && count($query_pelerin)) {
     $value=0;
            foreach ($query_pelerin as $loop) {
                 $this->fpdf->Ln();
                $this->fpdf->Cell(10);
               $this->fpdf->Cell(16,10,$loop->passport_pele,'B',0,'C');
               $this->fpdf->Cell(23,10,utf8_decode($loop->nom_pele),'B',0,'C');
               $this->fpdf->Cell(23,10,utf8_decode($loop->prenom_pele),'B',0,'C');
               $this->fpdf->Cell(16,10,$loop->date_naiss_pele,'B',0,'C');
               $this->fpdf->Cell(16,10,$loop->sexe_pele,'B',0,'C');
               $this->fpdf->Cell(16,10,$loop->ariv_pele,'B',0,'C');
               $this->fpdf->Cell(16,10,$loop->tel_pele,'B',0,'C');
//               $this->fpdf->Cell(16,10,$loop->nom_ag,'B',0,'C');
//               $this->fpdf->Cell(16,10,$loop->id_vol,'B',0,'C');
//               $this->fpdf->Cell(16,10,$this->get_ville($loop->lieu_dep_pele),'B',0,'C');
               $this->fpdf->Cell(16,10,$loop->type_pele,'B',0,'C');
               $this->fpdf->Cell(16,10,utf8_decode($loop->nationalite_pele),'B',0,'C');


               
            }}          
 }  
}
 
 
 
      
 
 
 
$dat=  date("d_m_yy_h_i_s");
 echo $this->fpdf->Output("pelerin_$dat.pdf", 'D');
    }
            function export_csv($vol , $ville) {
       
        $vols = $this->get_option_vol();

      
            
       
        
        

        $user_id = $this->session->userdata('user_id');
        $type = $this->session->userdata('user_type');
        
if($type==1){
$agence=  $this->get_option_agence(); 
$nom_agence=$agence[$user_id];
}
 if (is_numeric($vol)) {
            $vol_name=  $this->get_option_vol();
            $nom_vol=$vol_name[$vol];}
        
        
        if ($ville=="Toutes") {
        if (is_numeric($vol)) {
                        if ($type==0 || $type==2) {
                            $query_pelerin = $this->pelerinManager->liste_pelerin(array('P.id_vol' => $vol));
                            $this->header('', '', $nom_vol);
                        } elseif ($type == 1) {
                            $query_pelerin = $this->pelerinManager->liste_pelerin(array('A.id_ag' => $user_id, 'P.id_vol' => $vol));
                        $this->header('', $nom_agence, $nom_vol);
                            }
                       
            
        } 
        else {
                        if ($type==0 || $type==2) {
                            $query_pelerin = $this->pelerinManager->liste_pelerin(array());
                          $this->header('', '', '');
                            
                        } elseif ($type == 1) {
                            $query_pelerin = $this->pelerinManager->liste_pelerin(array('A.id_ag' => $user_id));
                        $this->header('', $nom_agence, '');
                            
                        }
                       
            
        } }  else {
   if (is_numeric($vol)) {
                        if ($type==0 || $type==2) {
                            $query_pelerin = $this->pelerinManager->liste_pelerin(array('P.id_vol' => $vol,'lieu_dep_pele'=>$ville));
                        $this->header('', '', $nom_vol,$ville);
                            } elseif ($type == 1) {
                            $query_pelerin = $this->pelerinManager->liste_pelerin(array('A.id_ag' => $user_id, 'P.id_vol' => $vol,'lieu_dep_pele'=>$ville));
                          $this->header('', $nom_agence, $nom_vol,$ville);

                            }
                      
            
        } else {
                        if ($type==0 || $type==2) {
                            $query_pelerin = $this->pelerinManager->liste_pelerin(array('lieu_dep_pele'=>$ville));
                           $this->header('', '', '',$ville);
                            } elseif ($type == 1) {
                            $query_pelerin = $this->pelerinManager->liste_pelerin(array('A.id_ag' => $user_id,'lieu_dep_pele'=>$ville));
                             $this->header('', $nom_agence, '',$ville);

                            }
                     
            
        }         
     
 }

 
      ///ceation PDF
 
 $fileName = "pelerins_";
            $fileName .= date('Y-m-d_H-i-s');
            $fileName .= ".csv";
             $delimiteur = ';';
             $elements=NULL;
        
            $fichier_csv = fopen($fileName, 'w');
if($ville=="Toutes"){        

 if($type==0 || $type==2){
  
         
             $i = 1;
             
$entete = array(utf8_decode("N° Passeport")
    ,utf8_decode("Nom")
    ,utf8_decode("Prénom")
    ,utf8_decode("Naissance")
    ,utf8_decode("sexe")
    ,utf8_decode("N° CNSPM")
    ,utf8_decode("Téléphone")
    ,utf8_decode(" Agence")
    ,utf8_decode("Vol ")
    ,utf8_decode("Depart ")
    ,utf8_decode( "Type")
    ,utf8_decode("Nationalité")
           );
   
     fputcsv($fichier_csv, $entete, $delimiteur); 
   
 if (is_array($query_pelerin) && count($query_pelerin)) {
     $value=0;
            foreach ($query_pelerin as $loop) {
                
                 $elements[0]=utf8_decode($loop->passport_pele);                      
           $elements[1]=utf8_decode($loop->nom_pele);                            
           $elements[2]=utf8_decode($loop->prenom_pele);                         
           $elements[3]=utf8_decode($loop->date_naiss_pele);                       
           $elements[4]=utf8_decode($loop->sexe_pele);              
           $elements[5]=utf8_decode($loop->ariv_pele);                         
           $elements[6]=utf8_decode($loop->tel_pele);                           
           $elements[7]=utf8_decode($loop->nom_ag); 
             $elements[8]=utf8_decode($vols[$loop->id_vol]);  
           $elements[9]=utf8_decode($loop->lieu_dep_pele);  
            $elements[10]=utf8_decode($loop->type_pele);  
           $elements[11]=utf8_decode($loop->nationalite_pele);              
              
                
             fputcsv($fichier_csv, $elements, $delimiteur);    


               
            }}   
 }elseif ($type==1) {
     
     $entete = array(utf8_decode("N° Passeport")
    ,utf8_decode("Nom")
    ,utf8_decode("Prénom")
    ,utf8_decode("Naissance")
    ,utf8_decode("sexe")
    ,utf8_decode("N° CNSPM")
    ,utf8_decode("Téléphone")
    ,utf8_decode(" Agence")
    ,utf8_decode("Vol ")
    ,utf8_decode("Depart ")
    ,utf8_decode( "Type")
    ,utf8_decode("Nationalité")
           );
  fputcsv($fichier_csv, $entete, $delimiteur);
 if (is_array($query_pelerin) && count($query_pelerin)) {
     $value=0;
            foreach ($query_pelerin as $loop) {
                       $elements[0]=utf8_decode($loop->passport_pele);                      
           $elements[1]=utf8_decode($loop->nom_pele);                            
           $elements[2]=utf8_decode($loop->prenom_pele);                         
           $elements[3]=utf8_decode($loop->date_naiss_pele);                       
           $elements[4]=utf8_decode($loop->sexe_pele);              
           $elements[5]=utf8_decode($loop->ariv_pele);                         
           $elements[6]=utf8_decode($loop->tel_pele);                           
           $elements[7]=utf8_decode($loop->nom_ag); 
            $elements[8]=utf8_decode($vols[$loop->id_vol]);   
           $elements[9]=utf8_decode($loop->lieu_dep_pele);  
            $elements[10]=utf8_decode($loop->type_pele);  
           $elements[11]=utf8_decode($loop->nationalite_pele);              
                

fputcsv($fichier_csv, $elements, $delimiteur);
               
            }}          
 }}  
 

 
 
 
 else {
  if($type==0 || $type==2){
    $entete = array(utf8_decode("N° Passeport")
    ,utf8_decode("Nom")
    ,utf8_decode("Prénom")
    ,utf8_decode("Naissance")
    ,utf8_decode("sexe")
    ,utf8_decode("N° CNSPM")
    ,utf8_decode("Téléphone")
    ,utf8_decode(" Agence")
    ,utf8_decode("Vol ")
    ,utf8_decode("Depart ")
    ,utf8_decode( "Type")
    ,utf8_decode("Nationalité")
           );
   fputcsv($fichier_csv, $entete, $delimiteur);
 if (is_array($query_pelerin) && count($query_pelerin)) {
     $value=0;
            foreach ($query_pelerin as $loop) {
              $elements[0]=utf8_decode($loop->passport_pele);                      
           $elements[1]=utf8_decode($loop->nom_pele);                            
           $elements[2]=utf8_decode($loop->prenom_pele);                         
           $elements[3]=utf8_decode($loop->date_naiss_pele);                       
           $elements[4]=utf8_decode($loop->sexe_pele);              
           $elements[5]=utf8_decode($loop->ariv_pele);                         
           $elements[6]=utf8_decode($loop->tel_pele);                           
           $elements[7]=utf8_decode($loop->nom_ag); 
           $elements[8]=utf8_decode($vols[$loop->id_vol]);  
           $elements[9]=utf8_decode($loop->lieu_dep_pele);  
            $elements[10]=utf8_decode($loop->type_pele);  
           $elements[11]=utf8_decode($loop->nationalite_pele);              
              

fputcsv($fichier_csv, $elements, $delimiteur);
               
            }}   
 }elseif ($type==1) {
    $entete = array(utf8_decode("N° Passeport")
    ,utf8_decode("Nom")
    ,utf8_decode("Prénom")
    ,utf8_decode("Naissance")
    ,utf8_decode("sexe")
    ,utf8_decode("N° CNSPM")
    ,utf8_decode("Téléphone")
    ,utf8_decode(" Agence")
    ,utf8_decode("Vol ")
    ,utf8_decode("Depart ")
    ,utf8_decode( "Type")
    ,utf8_decode("Nationalité")
           );
   fputcsv($fichier_csv, $entete, $delimiteur);
 if (is_array($query_pelerin) && count($query_pelerin)) {
     $value=0;
            foreach ($query_pelerin as $loop) {
           $elements[0]=utf8_decode($loop->passport_pele);                      
           $elements[1]=utf8_decode($loop->nom_pele);                            
           $elements[2]=utf8_decode($loop->prenom_pele);                         
           $elements[3]=utf8_decode($loop->date_naiss_pele);                       
           $elements[4]=utf8_decode($loop->sexe_pele);              
           $elements[5]=utf8_decode($loop->ariv_pele);                         
           $elements[6]=utf8_decode($loop->tel_pele);                           
           $elements[7]=utf8_decode($loop->nom_ag); 
            $elements[8]=utf8_decode($vols[$loop->id_vol]);  
           $elements[9]=utf8_decode($loop->lieu_dep_pele);  
            $elements[10]=utf8_decode($loop->type_pele);  
           $elements[11]=utf8_decode($loop->nationalite_pele);              
              
            fputcsv($fichier_csv, $elements, $delimiteur);   
            }}          
 }  
}
 
 
 
      
 
 
  

             
    
  
    
            
             fclose($fichier_csv);
             header("Content-Type: text/csv");
            
            header("Content-disposition: attachment; filename=E:\export".$fileName);
            header("Content-Type: application/force-download");
            header("Content-Transfer-Encoding: application/vnd.ms-excel\n");
            header("Pragma: no-cache");
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0, public");
            header("Expires: 0");
             readfile($fileName);

    }

//    function footer() {
//        // Positionnement à 1,5 cm du bas
//        $this->fpdf->SetY(-15);
//        // Police Arial italique 8
//        $this->fpdf->SetFont('Arial', 'I', 8);
//        // Numéro de page centré
//        $this->fpdf->Cell(0, 10, 'Page ' . $this->fpdf->PageNo(), 0, 0, 'C');
//    }

    
    function etat($etat='') {
        if($etat==1){
         return "Provisoir";   
        }elseif($etat==2){
          return "Definitif";  
        }
        
    }
    
    
    function get_option_agence(){
    $options=  array();
   $id = $this->session->userdata('user_id');
  $type = $this->session->userdata('user_type');
  
  if($type==0 || $type==2){
   $options[0]="--Choisir Agence--";
   $query_agence = $this->agenceManager->liste_agence();
        if (is_array($query_agence) && count($query_agence)) {
            foreach ($query_agence as $loop) {
                $options[$loop->id_ag]=$loop->nom_ag;
            }
        }   
  }  else {
    $query_agence = $this->agenceManager->liste_agence(array('id_ag'=>$id));
        if (is_array($query_agence) && count($query_agence)) {
            foreach ($query_agence as $loop) {
                $options[$loop->id_ag]=$loop->nom_ag;
            }
        }      
  }

    
        return $options;
}

    
    function get_option_vol() {
        $options = array();
        $options['Tous'] = "--Choisir Vol--";
        $options[0] = "Aucun Vol";
        $query_vol = $this->volManager->liste_vol();
        if (is_array($query_vol) && count($query_vol)) {
            foreach ($query_vol as $loop) {
                $options[$loop->id_vol] = $loop->nom_vol;
            }
        }
        return $options;
    }
    
    function get_ville($nom){
        if($nom=="Ouagadougou"){
            return "Ouaga";    
        }  else {
            return "Bobo"; 
        }
    }
    
    function  header($type='',$nom_agence='',$nom_vol='', $ville=''){
        $period=gmstrftime(" %Y",time());
	//$nom=$_SESSION['agence'];
	// Police Arial gras 15
	$this->fpdf->SetFont('Arial','B',15);
	
	// Titre
	$this->fpdf->Cell(0,10,'COMITE NATIONAL DE SUIVI DU PELERINAGE A LA MECQUE',1,0,'C');
	$this->fpdf->Ln(15);
	$this->fpdf->SetFont('Arial','B',10);
        if($nom_agence!=''){
         $this->fpdf->Cell(0,10,'AGENCE: '.strtoupper(utf8_decode($nom_agence)),0,0,'C');
		$this->fpdf->Ln(10);   
        }if($nom_vol!=''){
          $this->fpdf->Cell(0,10,'VOL: '.strtoupper($nom_vol),0,0,'C');
		$this->fpdf->Ln(10); 
        }
        
	$this->fpdf->Cell(0,10,'LISTE DES PELERINS '.strtoupper($type).' AU HADJ : '.strtoupper($period),0,0,'C');
	
        if($ville!=''){
            $this->fpdf->Ln(10);
         $this->fpdf->Cell(0,10,'DEPART: '.strtoupper($ville),0,0,'C');
		   
        }
	
	// Logo
	 $this->fpdf->Image(imgage_url("img.jpg"), 10, 10, 15);
        $this->fpdf->Image(imgage_url("img.jpg"), 185, 10, 15);
	// Saut de ligne
	$this->fpdf->Ln(15);
        
    }

}

