<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Scan extends CI_Controller {

    public function __construct() {
        parent::__construct();

        //chargement des ressource du constructeur
        $this->load->helper(array('url', 'assets'));
        $this->load->helper('fn_info');
        $this->load->library('form_validation');
        $this->load->library('session');
        
        //chargement modele
        $this->load->model('user_modele', 'userManager');
		$this->load->model('Agence_modele', 'agenceManager');
		$this->load->model('Pelerin_modele', 'pelerinManager');
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->library('table');

    }
   

    public function index() {
         $type = $this->session->userdata('type');
      $data['agence'] = $this->agenceManager->liste_agence(array('DELETE_AG'=>0));
         $data['profil'] = $this->profil();
		$data['menu_top'] = "template/menu_top";
        if ($type==2 || $type==3) {
            $data['main_content'] = "Add_scan";
            $info = $this->input->post('info');
            if ($info != '') {
                $info = explode(',', $info);
                if (count($info) == 9) {
                    $nom = $info[0];
                    $prenom = $info[1];
                    $sexe = $info[2];
                    $birth = $info[3];
                    $expire = $info[4];
                    $number = $info[5];
                    $etat = $info[6];
                    $pays = $info[7];

                    if (strlen($nom) > 3 && strlen($prenom) > 3 && strlen($sexe) > 3 && strlen($birth) > 3 && strlen($expire) > 3 && strlen($nom) > 3 && strlen($etat) > 3 && strlen($pays) > 3) {
                        $error = "no";
                        $nom = substr($nom, 3);
                        $prenom = substr($prenom, 3);
                        $sexe = substr($sexe, 3);
                        $naiss = substr($birth, 3);
                        $delivrer = substr($expire, 3);
                        $expire = substr($expire, 3);
                        $number = substr($number, 3);
                        $etat = substr($etat, 3);
                        $pays = substr($pays, 3);
                    }
					$data['infos'] = array(
             'nom' => $nom,
             'prenom'   => $prenom,
             'sexe'    => $sexe,
			 'naiss'    => $naiss,
			 'delivrer'    => $delivrer, 
			 'expire'    => $expire,
			 'number'    => $number,
			 'etat'    => $etat,
			 'pays'    => $pays);
                }
            }
			 $infoVisiteur = $this->pelerinManager->count_pelerin(array('PASSEPORT' => $number));
                        if ($infoVisiteur !=0) {
                                $info = warning_info('Ce pelerin existe deja');
                                $this->session->set_flashdata('info', $info);
                            redirect('Pelerin');
                        } 
						$info = scan_succes_info('Scannage avec success');
                                $this->session->set_flashdata('info', $info);
          $data['info'] = $this->session->flashdata('info');
            //$data['profil'] = $this->get_tableau();
            $this->load->view('template/template', $data);
        }else{
			redirect();
		}
		}
  public function new_scan() {
        
    }
	public function new_save() {
          $type = $this->session->userdata('type');
		   $data['agence'] = $this->agenceManager->liste_agence(array('DELETE_AG'=>0));
        if ($type==3) {
       // $data['menu_top']="template/menu_top";
       // $data['main_content'] = "Add_scan";

        
        $this->form_validation->set_rules('txt_nom', '"Nom"', 'trim|required|min_length[2]|max_length[52]|encode_php_tags');
        $this->form_validation->set_rules( 'txt_prenom',"Prénom", 'trim|required|min_length[2]|max_length[50]|encode_php_tags');
        //$this->form_validation->set_rules( 'txt_passport',"CNIB/PASSPORT", 'trim|required|min_length[5]|max_length[50]|encode_php_tags');
       // $this->form_validation->set_rules( 'txt_naiss',"naissance", 'trim|required|min_length[5]|max_length[50]|encode_php_tags');
        //$this->form_validation->set_rules( 'txt_nation',"Nationalité", 'trim|required|min_length[5]|max_length[50]|encode_php_tags');
       // $this->form_validation->set_rules( 'txt_delivre',"delivrance", 'trim|required|min_length[5]|max_length[50]|encode_php_tags');
        //$this->form_validation->set_rules( 'txt_expir',"expiration", 'trim|required|min_length[5]|max_length[50]|encode_php_tags');
        if ($this->form_validation->run()) {
            $isInsert = FALSE;
            //recuperation valeur
            $txt_nom = $this->input->post('txt_nom');
            $txt_prenom = $this->input->post('txt_prenom');
            $txt_passport = $this->input->post('txt_passport');
            $txt_naiss =$this->input->post('txt_naiss');
            $txt_sexe= $this->input->post('txt_sexe');
            $txt_nation= $this->input->post('txt_nation');
            $txt_delivre= $this->input->post('txt_delivre');
            $txt_expir= $this->input->post('txt_expir');
            $vols= $this->input->post('vols');
            $locals= $this->input->post('locals');
            $txt_phone= $this->input->post('txt_phone');
            $txt_besoin= $this->input->post('txt_besoin');
            $txt_photo= $this->input->post('txt_photo');
            $id_ag= $this->input->post('id_ag');
			$lire_pelerin='lecteur 3M';
			if (file_exists($_FILES['txt_photo']['tmp_name'])) {

                $result = NULL;              
                $photoName =  Date('Y-m-d-H-i-s');
                $photoName = str_replace('-', '', $photoName);
                $path='';
              
                $targetFile = "images/photo_pelerin/";
               
                $newFileName = $nom_agence . $contact_agence . $photoName;
                 $photoNom = $nom_agence . $contact_agence . $photoName.".jpg";
                $originalFile = $_FILES['txt_photo']['tmp_name'];
                if ($this->resize($originalFile, $targetFile, $newFileName, 100)) {

                    $newFileName = realpath($targetFile . $newFileName . ".jpg");
                    $newFileName = addslashes($path);
                    $photoNameUp = "txt_photo='" . $path . "',";
                    $ifImage = TRUE;
                } else {
                    $newFileName = '';
                }
            }
            $isInsert = $this->pelerinManager->ajouter_pelerin($txt_passport, $txt_nom, 
            $txt_prenom, $txt_naiss,$txt_sexe,$txt_nation,$txt_delivre,$txt_expir,$vols,$locals,$txt_phone,$txt_besoin,$txt_photo,$id_ag,$lire_pelerin);

            if ($isInsert) {
                $info = ajout_succes_info("Nouveau pelerin");
                $this->session->set_flashdata('info', $info);

                redirect('Pelerin');
            } else {
                $info = ajout_fail_info('Veuillez verifier vos information et réessayez');
                $this->session->set_flashdata('info', $info);
            }
        }
		
        $data['info'] = "";
       $data['tableau'] = $this->get_partenaire();
       // $this->load->view('template/template', $data);
    }
    }
    public function new_paie() {
          $type = $this->session->userdata('type');
        if ($type==4) {
        $data['menu_top']="template/menu_top";
        $data['main_content'] = "Vue_paiement";
        $this->form_validation->set_rules('nom', '"Nom"', 'trim|required|min_length[2]|max_length[52]|encode_php_tags');
        $this->form_validation->set_rules( 'prenom',"Prénom", 'trim|required|min_length[2]|max_length[50]|encode_php_tags');
        $this->form_validation->set_rules( 'email',"Email", 'trim|required|min_length[5]|max_length[50]|encode_php_tags');
        $this->form_validation->set_rules( 'pseudo',"Pseudo", 'trim|required|min_length[3]|max_length[50]|encode_php_tags');
        $this->form_validation->set_rules( 'pass',"Mot de Passe", 'trim|required|min_length[4]|max_length[50]|encode_php_tags');
        $this->form_validation->set_rules( 'etat',"Etat", 'trim|required|min_length[1]|max_length[1]|encode_php_tags');
 if ($this->form_validation->run()) {
            $isInsert = FALSE;
            //recuperation valeur
            $nom = $this->input->post('nom');
            $prenom = $this->input->post('prenom');
            $email = $this->input->post('email');
            $pseudo =$this->input->post('pseudo');
            $pass= $this->input->post('pass');
            $etat= $this->input->post('etat');
            $droit= $this->input->post('droit');
             $pass=md5($pass);

            $isInsert = $this->userManager->ajouter_user($nom, $prenom, 
            $email, $pseudo,$pass,$droit);

            if ($isInsert) {
                $info = ajout_succes_info("Nouveau useristrateur");
                $this->session->set_flashdata('info', $info);

                redirect('Pelerin/new_paie');
            } else {
                $info = ajout_fail_info('Veuillez verifier vos information et réessayez');
                $this->session->set_flashdata('info', $info);
            }
        }
        $data['info'] = "";
       $data['tableau'] = $this->get_tableau();
        $this->load->view('template/template', $data);
    }}
	/////// edite paiements
 function Edit_paie($id = '') {
         //$data['options'] = $this->get_option_guerite();
          $type = $this->session->userdata('type');
        if ($type==4) {
        $data['menu_top']="template/menu_top";
        $data['main_content'] = "Edit_paiement";
        if ($id != '' && $id > 0) {
            $query = $this->pelerinManager->liste_pelerin(array('ID_PELERIN' => $id));
            if ($query) {
                $data['edit_paie'] = $query;
            }
        } elseif ($this->input->post('id')) {
            $id = $this->input->post('id');
        $this->form_validation->set_rules('quotas', '"Quotas"', 'trim|required|min_length[4]|max_length[52]|encode_php_tags');
        $this->form_validation->set_rules( 'anne_quotas',"Année", 'trim|required|min_length[2]|max_length[50]|encode_php_tags');
        $this->form_validation->set_rules( 'motif_quotas',"Motif", 'trim|required|min_length[4]|max_length[50]|encode_php_tags');
            if ($this->form_validation->run()) {
                $isInsert = FALSE;
                //recuperation valeur
          $quotas = $this->input->post('quotas');
            $anne_quotas = $this->input->post('anne_quotas');
            $motif_quotas = $this->input->post('motif_quotas');
            $description = $this->input->post('description');      
 $isInsert = $this->agenceManager->update_quotas($id ,$quotas,$anne_quotas,$motif_quotas, $description);
                if ($isInsert) {
                    $info = ajout_succes_info("Mise à jour Ajouté");
                    $this->session->set_flashdata('info', $info);

                    redirect('Agence/New_quotas');
                   }else{
                    $info = ajout_fail_info('Veuillez verifier vos information et réessayez');
                    $this->session->set_flashdata('info', $info);
                         }
            } else {
                $this->update($id);
            }
        } elseif ($id == "") {
            redirect('Agence/New_quotas');
        }

        $data['info'] = "";
        $data['tableau'] = $this->get_paiement();

        $this->load->view('template/template', $data);
    }}
	 public function New_comite() {
          $type = $this->session->userdata('type');
        if ($type==0) {
        $data['menu_top']="template/menu_top";
        $data['main_content'] = "Vue_comite";
        $this->form_validation->set_rules('noms', '"Nom"', 'trim|required|min_length[2]|max_length[52]|encode_php_tags');
        $this->form_validation->set_rules( 'prenom',"Prénom", 'trim|required|min_length[2]|max_length[50]|encode_php_tags');
        $this->form_validation->set_rules( 'phone',"Telephone", 'trim|required|min_length[5]|max_length[50]|encode_php_tags');
        if ($this->form_validation->run()) {
            $isInsert = FALSE;
            //recuperation valeur
            $noms = $this->input->post('noms');
            $prenom = $this->input->post('prenom');
            $email = $this->input->post('email');
            $phone =$this->input->post('phone');
            $adresse= $this->input->post('adresse');
            $isInsert = $this->userManager->ajouter_partenaire($noms, $prenom, 
            $adresse, $email,$phone);

            if ($isInsert) {
                $info = ajout_succes_info("Nouveau partenaire");
                $this->session->set_flashdata('info', $info);

                redirect('Admin/New_partenaire');
            } else {
                $info = ajout_fail_info('Veuillez verifier vos information et réessayez');
                $this->session->set_flashdata('info', $info);
            }
        }
        $data['info'] = "";
       $data['tableau'] = $this->get_partenaire();
        $this->load->view('template/template', $data);
    }}
 public function New_partenaire() {
          $type = $this->session->userdata('type');
        if ($type==0) {
        $data['menu_top']="template/menu_top";
        $data['main_content'] = "Vue_partenaire";

        
        $this->form_validation->set_rules('noms', '"Nom"', 'trim|required|min_length[2]|max_length[52]|encode_php_tags');
        $this->form_validation->set_rules( 'prenom',"Prénom", 'trim|required|min_length[2]|max_length[50]|encode_php_tags');
        $this->form_validation->set_rules( 'phone',"Telephone", 'trim|required|min_length[5]|max_length[50]|encode_php_tags');
        if ($this->form_validation->run()) {
            $isInsert = FALSE;
            //recuperation valeur
            $noms = $this->input->post('noms');
            $prenom = $this->input->post('prenom');
            $email = $this->input->post('email');
            $phone =$this->input->post('phone');
            $adresse= $this->input->post('adresse');
            $isInsert = $this->userManager->ajouter_partenaire($noms, $prenom, 
            $adresse, $email,$phone);

            if ($isInsert) {
                $info = ajout_succes_info("Nouveau partenaire");
                $this->session->set_flashdata('info', $info);

                redirect('Admin/New_partenaire');
            } else {
                $info = ajout_fail_info('Veuillez verifier vos information et réessayez');
                $this->session->set_flashdata('info', $info);
            }
        }
        $data['info'] = "";
       $data['tableau'] = $this->get_partenaire();
        $this->load->view('template/template', $data);
    }} 
	public function New_pelerin() {
          $type = $this->session->userdata('type');
		   $data['agence'] = $this->agenceManager->liste_agence(array('DELETE_AG'=>0));
        if ($type==3) {
        $data['menu_top']="template/menu_top";
        $data['main_content'] = "New_pelerin";

        
        $this->form_validation->set_rules('txt_nom', '"Nom"', 'trim|required|min_length[2]|max_length[52]|encode_php_tags');
        $this->form_validation->set_rules( 'txt_prenom',"Prénom", 'trim|required|min_length[2]|max_length[50]|encode_php_tags');
        $this->form_validation->set_rules( 'txt_passport',"CNIB/PASSPORT", 'trim|required|min_length[5]|max_length[50]|encode_php_tags');
       // $this->form_validation->set_rules( 'txt_naiss',"naissance", 'trim|required|min_length[5]|max_length[50]|encode_php_tags');
        //$this->form_validation->set_rules( 'txt_nation',"Nationalité", 'trim|required|min_length[5]|max_length[50]|encode_php_tags');
       // $this->form_validation->set_rules( 'txt_delivre',"delivrance", 'trim|required|min_length[5]|max_length[50]|encode_php_tags');
        //$this->form_validation->set_rules( 'txt_expir',"expiration", 'trim|required|min_length[5]|max_length[50]|encode_php_tags');
        if ($this->form_validation->run()) {
            $isInsert = FALSE;
            //recuperation valeur
            $txt_nom = $this->input->post('txt_nom');
            $txt_prenom = $this->input->post('txt_prenom');
            $txt_passport = $this->input->post('txt_passport');
            $txt_naiss =$this->input->post('txt_naiss');
            $txt_sexe= $this->input->post('txt_sexe');
            $txt_nation= $this->input->post('txt_nation');
            $txt_delivre= $this->input->post('txt_delivre');
            $txt_expir= $this->input->post('txt_expir');
            $vols= $this->input->post('vols');
            $locals= $this->input->post('locals');
            $txt_phone= $this->input->post('txt_phone');
            $txt_besoin= $this->input->post('txt_besoin');
            $txt_photo= $this->input->post('txt_photo');
            $id_ag= $this->input->post('id_ag');
			$lire_pelerin='Manuel';
			if (file_exists($_FILES['txt_photo']['tmp_name'])) {

                $result = NULL;              
                $photoName =  Date('Y-m-d-H-i-s');
                $photoName = str_replace('-', '', $photoName);
                $path='';
              
                $targetFile = "images/photo_pelerin/";
               
                $newFileName = $nom_agence . $contact_agence . $photoName;
                 $photoNom = $nom_agence . $contact_agence . $photoName.".jpg";
                $originalFile = $_FILES['txt_photo']['tmp_name'];
                if ($this->resize($originalFile, $targetFile, $newFileName, 100)) {

                    $newFileName = realpath($targetFile . $newFileName . ".jpg");
                    $newFileName = addslashes($path);
                    $photoNameUp = "txt_photo='" . $path . "',";
                    $ifImage = TRUE;
                } else {
                    $newFileName = '';
                }
            }
            $isInsert = $this->pelerinManager->ajouter_pelerin($txt_passport, $txt_nom, 
            $txt_prenom, $txt_naiss,$txt_sexe,$txt_nation,$txt_delivre,$txt_expir,$vols,$locals,$txt_phone,$txt_besoin,$txt_photo,$id_ag,$lire_pelerin);

            if ($isInsert) {
                $info = ajout_succes_info("Nouveau pelerin");
                $this->session->set_flashdata('info', $info);

                redirect('Pelerin/New_pelerin');
            } else {
                $info = ajout_fail_info('Veuillez verifier vos information et réessayez');
                $this->session->set_flashdata('info', $info);
            }
        }
        $data['info'] = "";
       $data['tableau'] = $this->get_partenaire();
        $this->load->view('template/template', $data);
    }}
    public function delete($id) {
          $type = $this->session->userdata('user_type');
        if ($type==0) {
        $result = $this->userManager->delete_user($id);
        if ($result) {
            $info = suppression_succes_info('Element Supprimé avec Succès');
            $this->session->set_flashdata('info', $info);
        } else {
            $info = suppression_fail_info('Echec Suppression Element');
            $this->session->set_flashdata('info', $info);
        }
        redirect('user');
    }}
	public function delete_partenaire($id) {
          $type = $this->session->userdata('type');
        if ($type==0) {
        $result = $this->userManager->delete_partenaire($id);
        if ($result) {
            $info = suppression_succes_info('Element Supprimé avec Succès');
            $this->session->set_flashdata('info', $info);
        } else {
            $info = suppression_fail_info('Echec Suppression Element');
            $this->session->set_flashdata('info', $info);
        }
        redirect('Admin/New_partenaire');
    }}
public function update_partenaire($id = '') {
          $type = $this->session->userdata('user_type');
        if ($type==0) {
        $data['menu_top']="template/menu_top";
        $data['main_content'] = "partenaire_edit_vue";


        if ($id != '' && $id > 0) {
            $query = $this->userManager->liste_partenaire(array('ID_PART' => $id));
            if ($query) {
                $data['partenaire_edit'] = $query;
            }
        } elseif ($this->input->post('id')) {
            $id = $this->input->post('id');
         $this->form_validation->set_rules('noms', '"Nom"', 'trim|required|min_length[2]|max_length[52]|encode_php_tags');
        $this->form_validation->set_rules( 'prenom',"Prénom", 'trim|required|min_length[2]|max_length[50]|encode_php_tags');
        $this->form_validation->set_rules( 'phone',"Telephone", 'trim|required|min_length[5]|max_length[50]|encode_php_tags');
            if ($this->form_validation->run()) {
                $isInsert = FALSE;
                //recuperation valeur
           $noms = $this->input->post('noms');
            $prenom = $this->input->post('prenom');
            $email = $this->input->post('email');
            $phone =$this->input->post('phone');
            $adresse= $this->input->post('adresse');
                  $isInsert = $this->userManager->update_partenaire($id ,$noms, $prenom, 
            $adresse, $email,$phone);
                if ($isInsert) {
                    $info = ajout_succes_info("Mise à jour Ajouté");
                    $this->session->set_flashdata('info', $info);

                    redirect('Admin/New_partenaire');
                   }else{
                    $info = ajout_fail_info('Veuillez verifier vos information et réessayez');
                    $this->session->set_flashdata('info', $info);
                         }
            } else {
                $this->update($id);
            }
        } elseif ($id == "") {
            redirect('Admin/New_partenaire');
        }

        $data['info'] = "";
        $data['tableau'] = $this->get_partenaire();
        $this->load->view('template/template', $data);
    }}
    public function update($id = '') {
          $type = $this->session->userdata('user_type');
        if ($type==0) {
        $data['menu_top']="themes/menu_top";
        $data['main_content'] = "user_edit_vue";


        if ($id != '' && $id > 0) {
            $query = $this->userManager->get_user(array('id_user' => $id));
            if ($query) {
                $data['user_edit'] = $query;
            }
        } elseif ($this->input->post('id')) {
            $id = $this->input->post('id');
        $this->form_validation->set_rules('nom', '"Nom"', 'trim|required|min_length[2]|max_length[52]|encode_php_tags');
        $this->form_validation->set_rules( 'prenom',"Prénom", 'trim|required|min_length[2]|max_length[50]|encode_php_tags');
        $this->form_validation->set_rules( 'email',"Email", 'trim|required|min_length[5]|max_length[50]|encode_php_tags');
        $this->form_validation->set_rules( 'pseudo',"Pseudo", 'trim|required|min_length[3]|max_length[50]|encode_php_tags');
        $this->form_validation->set_rules( 'pass',"Mot de Passe", 'trim|required|min_length[4]|max_length[50]|encode_php_tags');

            if ($this->form_validation->run()) {

                $isInsert = FALSE;

                //recuperation valeur
          
            $nom = $this->input->post('nom');
            $prenom = $this->input->post('prenom');
            $email = $this->input->post('email');
            $pseudo =$this->input->post('pseudo');
            $pass= $this->input->post('pass');
            $etat= $this->input->post('etat');
            $droit= $this->input->post('droit');
            $pass=md5($pass);
                
                  $isInsert = $this->userManager->update_user($id , $nom, $prenom, 
                   $email, $pseudo,$pass,$droit);
                if ($isInsert) {
                    $info = ajout_succes_info("Mise à jour Ajouté");
                    $this->session->set_flashdata('info', $info);

                    redirect('user');
                   }else{
                    $info = ajout_fail_info('Veuillez verifier vos information et réessayez');
                    $this->session->set_flashdata('info', $info);
                         }
            } else {
                $this->update($id);
            }
        } elseif ($id == "") {
            redirect('user');
        }

        $data['info'] = "";
        $data['tableau'] = $this->get_tableau();
        $this->load->view('themes/template', $data);
    }}

    public function liste($id = '') {
        $data['info'] = $this->session->flashdata('info');
        $data['menu_top'] = "template/menu_top";
        $data['main_content'] = "Liste_pelerin";
        $data['tableau'] = $this->get_tableau();
        $this->load->view('template/template', $data);
    }
     public function liste_paie($id = '') {
        $data['info'] = $this->session->flashdata('info');
        $data['menu_top'] = "template/menu_top";
        $data['main_content'] = "Liste_paie";
        $data['tableau'] = $this->get_paiement();
        $this->load->view('template/template', $data);
    }
function get_tableau() {
    $type = $this->session->userdata('type');
        if ($type==3) {  
$template = array('table_open'=> '<table id="tab" class="well  table table-hover table-striped table-bordered" border=1>');
        $this->table->set_heading(array('PASSPORT', "NOM" , 'PRENOM','NAISSANCE', 'SEXE', 'NATIONALITE', 'DATE_DELIVREE', 'DATE_EXPIRE', array('data'=>'ACTIONS', 'colspan'=>2 )));
        
        $query_pelerin = $this->pelerinManager->liste_pelerin();
        if (is_array($query_pelerin) && count($query_pelerin)) {
            $droit="faible";
          
            foreach ($query_pelerin as $loop) {
                $this->table->add_row(array($loop->PASSEPORT, $loop->NOM_PELERIN, $loop->PRENOM_PELERIN,
                    $loop->NAISS_PELERIN, $loop->SEXE_PELERIN, $loop->NATIONALITE, $loop->DATE_DELIV, $loop->DATE_EXPIR, 
                    
                    '<a href="'.site_url("Pelerin/update/$loop->ID_PELERIN").'" ><span class="glyphicon glyphicon-edit"></span> </a>',
                    '<a href="'.site_url("Pelerin/delete/$loop->ID_PELERIN").'" ><span class="glyphicon glyphicon-trash"></span></a>'));
            }
        }

        $this->table->set_template($template);
        return $this->table->generate();
}elseif($type==4){
	$template = array('table_open'=> '<table id="tab" class="well  table table-hover table-striped table-bordered" border=1>');
        $this->table->set_heading(array('PASSPORT', "NOM" , 'PRENOM','NAISSANCE', 'SEXE', array('data'=>'ACTIONS', 'colspan'=>3 )));
        
        $query_pelerin = $this->pelerinManager->liste_pelerin();
        if (is_array($query_pelerin) && count($query_pelerin)) {
            $droit="faible";
          
            foreach ($query_pelerin as $loop) {
                $this->table->add_row(array($loop->PASSEPORT, $loop->NOM_PELERIN, $loop->PRENOM_PELERIN,
                    $loop->NAISS_PELERIN, $loop->SEXE_PELERIN, 
                    '<a href="'.site_url("Pelerin/Edit_paie/$loop->ID_PELERIN").'" ><span class="glyphicon glyphicon-euro btn btn-sucess"> Payer</span> </a>',
                    '<a href="'.site_url("Pelerin/update/$loop->ID_PELERIN").'" ><span class="glyphicon glyphicon-edit"></span> </a>',
                    '<a href="'.site_url("Pelerin/delete/$loop->ID_PELERIN").'" ><span class="glyphicon glyphicon-trash"></span></a>'));
            }
        }

        $this->table->set_template($template);
        return $this->table->generate();
	
	
	
}
}
function get_paiement() {
    $type = $this->session->userdata('type');
        if ($type==3) {  
$template = array('table_open'=> '<table id="tab" class="well  table table-hover table-striped table-bordered" border=1>');
        $this->table->set_heading(array('PASSPORT', "NOM" , 'PRENOM','NAISSANCE', 'SEXE', 'NATIONALITE', 'DATE_DELIVREE', 'DATE_EXPIRE', array('data'=>'ACTIONS', 'colspan'=>2 )));
        
        $query_pelerin = $this->pelerinManager->liste_paie();
        if (is_array($query_pelerin) && count($query_pelerin)) {
            $droit="faible";
          
            foreach ($query_pelerin as $loop) {
                $this->table->add_row(array($loop->PASSEPORT, $loop->NOM_PELERIN, $loop->PRENOM_PELERIN,
                    $loop->NAISS_PELERIN, $loop->SEXE_PELERIN, $loop->NATIONALITE, $loop->DATE_DELIV, $loop->DATE_EXPIR, 
                    
                    '<a href="'.site_url("Pelerin/update/$loop->ID_PELERIN").'" ><span class="glyphicon glyphicon-edit"></span> </a>',
                    '<a href="'.site_url("Pelerin/delete/$loop->ID_PELERIN").'" ><span class="glyphicon glyphicon-trash"></span></a>'));
            }
        }

        $this->table->set_template($template);
        return $this->table->generate();
}elseif($type==4){
	$template = array('table_open'=> '<table id="tab" class="well  table table-hover table-striped table-bordered" border=1>');
        $this->table->set_heading(array('ID PAY', "TYPE" , 'MONTANT','AUTRE PERSONNE', 'PELERIN', array('data'=>'ACTIONS', 'colspan'=>3 )));
        
        $query_pelerin = $this->pelerinManager->liste_paie();
        if (is_array($query_pelerin) && count($query_pelerin)) {
            $droit="faible";
          
            foreach ($query_pelerin as $loop) {
                $this->table->add_row(array($loop->PAY_ID, $loop->PAY_TYPE, $loop->PAY_MONTANT,
                    $loop->PAY_AUTRE, $loop->PAY_PELERIN, 
                    '<a href="'.site_url("Pelerin/update/$loop->PAY_ID").'" ><span class="glyphicon glyphicon-edit"></span> </a>',
                    '<a href="'.site_url("Pelerin/delete/$loop->PAY_ID").'" ><span class="glyphicon glyphicon-trash"></span></a>'));
            }
        }

        $this->table->set_template($template);
        return $this->table->generate();
	
	
	
}
}

function get_partenaire() {
    $type = $this->session->userdata('user_type');
        if ($type==0) {  
$template = array('table_open'=> '<table id="tab" class="well  table table-hover table-striped table-bordered" border=1>');
        $this->table->set_heading(array('Nom', "Prénom" , 'Adresse','E-mail', 'Telephone', array('data'=>'ACTIONS', 'colspan'=>2 )));
        
        $query_partenaire = $this->userManager->liste_partenaire();
        if (is_array($query_partenaire) && count($query_partenaire)) {
            $droit="faible";
          
            foreach ($query_partenaire as $loop) {
                /* if($loop->droit==1){
           $droit='moyen';     
            }elseif ($loop->droit==2) {
                $droit="elevé";
                
                
            }*/
                $this->table->add_row(array($loop->NOM_PART, $loop->PRENOM_PART,$loop->ADRESSE_PART,
                    $loop->MAIL_PART, $loop->PHONE_PART,
                    
                    '<a href="'.site_url("Admin/update_partenaire/$loop->ID_PART").'" ><span class="glyphicon glyphicon-edit"></span> </a>',
                    '<a href="'.site_url("Admin/delete_partenaire/$loop->ID_PART").'" ><span class="glyphicon glyphicon-trash"></span></a>'));
            }
        }

        $this->table->set_template($template);
        return $this->table->generate();
}}

function get_tableau_agence() {
    $type = $this->session->userdata('type');
        if ($type==1) {  
$template = array('table_open'=> '<table id="tab" class="  table table-hover table-striped table-bordered" border=1>' );
        $this->table->set_heading(array('Agence_de_voyages ','Contacts', "E-mail" ,'Siege','Login ',  array('data'=>'ACTIONS', 'colspan'=>2 )));
        
        $query_agence = $this->agenceManager->liste_agence(array('DELETE_AG'=>0));
        if (is_array($query_agence) && count($query_agence)) {
            $droit="faible";
          
            foreach ($query_agence as $loop) {
                $this->table->add_row(array($loop->NOM_AG,$loop->PHONE_AG, $loop->MAIL_AG,
                $loop->SIEGE_AG,$loop->LOGIN_AG,
                    '<a href="'.site_url("Agence/update/$loop->ID_AG").'" ><span class="glyphicon glyphicon-edit"></span> </a>',
                    '<a href="'.site_url("Agence/delete/$loop->ID_AG").'"><span class="glyphicon glyphicon-trash"></span></a>'));
            }
        }

        $this->table->set_template($template);
        return $this->table->generate();
}elseif($type==0){
	$template = array('table_open'=> '<table id="tab" class="  table table-hover table-striped table-bordered" border=1>' );
        $this->table->set_heading(array('Agence_de_voyages ','Contacts', "E-mail" ,'Siege','Aboné SMS','Contrat',  array('data'=>'ACTIONS', 'colspan'=>2 )));
        
        $query_agence = $this->agenceManager->liste_agence(array('DELETE_AG'=>2));
        if (is_array($query_agence) && count($query_agence)) {
            $droit="faible";
          
            foreach ($query_agence as $loop) {
                $this->table->add_row(array($loop->NOM_AG,$loop->PHONE_AG, $loop->MAIL_AG,
                $loop->SIEGE_AG,'<div class="progress md-progress">
    <div class="progress-bar panel panel-primary" role="progressbar" style="width: 0;" aria-valuenow="12" aria-valuemin="12" aria-valuemax="100"></div>
</div>','actif',
                    '<a href="#" ><span class="glyphicon glyphicon-edit"></span> </a>',
                    '<a href="#"><span class="glyphicon glyphicon-trash"></span></a>'));
            }
        }

        $this->table->set_template($template);
        return $this->table->generate();
	
}
}
function profil($id = '') {
        if ($id == '') {
            $apercu = null;
            return NULL;
        } else {


            $query_pelerin = $this->pelerinManager->liste_pelerin(array('ID_PELERIN' => $id));
            if (is_array($query_pelerin) && count($query_pelerin) > 0) {
                foreach ($query_pelerin as $loop) {
                    $apercu = "
                    

    <head>
        <title>Gestion Pelerin</title>
        
        <link rel='stylesheet' type='text/css' media='screen' href='" . css_url('form') . "' />
        <link rel='stylesheet' type='text/css' media='screen' href='" . css_url('bootstrap') . "' />
       <link rel='stylesheet' type='text/css' media='screen' href='" . css_url('datepicker3') . "' />
         <link rel='stylesheet' type='text/css' media='screen' href='" . css_url('style') . "' />
          <link rel='stylesheet' type='text/css' media='screen' href='" . css_url('pnotify.custom.min') . "' />
          <link rel='stylesheet' type='text/css' media='screen' href='" . css_url('fileinput') . "' />
         
          
        
        <script src='" . js_url('jquery-1.8.3.min') . "'></script>
          
       
        <script src='" . js_url('bootstrap') . "'></script>
        <script src='" . js_url('bootstrap-datepicker') . "'></script>
         <script src='" . js_url('fileinput') . "'></script>
          
    </head>
    <body>
                    <br>
        <div  class='modal-dialog '>
        <div class=modal-content>
        <div class='apercu-header  blue '>
            <a href='" . site_url("pelerin/liste") . "' title='fermé' type=button class=close data-dismiss=modal aria-hidden=true>&times;</a>
            <h3 class='modal-title ' align=center>$loop->NOM_PELERIN $loop->PRENOM_PELERIN 
                </h3>
        </div>
 <div class=modal-body>
            <table class=table ><thead><tr><th>COMITE NATIONAL DU SUIVI DU PELERINAGE</th></tr></thead><tbody>
              <tr> 
                  <td rowspan=5 ><img width=100 src='" . img_url($loop->PHOTO_PELERIN) . "'   onerror=this.src='" . img_url("noimage".$loop->SEXE_PELERIN.".jpg") . "'></td> 
              </tr> 
              <tr>           
                <td>Passport:  <b>$loop->PASSEPORT</b></td>
                

</tr>   
              <tr>           
              
                <td>Agence: <b>$loop->NOM_PELERIN</b>
</td>
</tr>   
               <tr> 
                 <td>Lieu Depart: <b>$loop->LOCALITE_PELERIN</b>
</td>
                  <td>Nationalité: <b>$loop->NATIONALITE </b>
</td>
                  
                   </tr>   
               <tr>
                <td>Télephone: <b>$loop->PHONE_PELERIN</b>
</td>
                <td>Email: <b>$loop->PHONE_PELERIN</b>
</td>
                  
                 
              </tr> 
              
               <tr> 
                  
                  <td>Date Naissance: <b>$loop->NAISS_PELERIN </b>  

</td>
  <td>Sexe: <b>$loop->SEXE_PELERIN</b>
</td>              
                  
                 
              </tr> 
              <tr>
                
             <td>Type Vol: <b>$loop->VOL_PELERIN</b>    
                  
                 
</tr>               
<tr> <td colspan=4>'".$this->link_update($loop->ID_PELERIN)."'
</td>
</tr> 
</table>";
                }
            } else {
                $apercu = " <br>
        <div class='modal-dialog'>
        <div class='modal-content '>
        <div class='apercu-header red '>
            <a href='index.php' title='fermé' type=button class=close data-dismiss=modal aria-hidden=true>&times;</a>
            <h4 class='modal-title ' align=center>Element introuvable
                </h4>
        </div><div class=modal-body>
            <table class=table ><thead><tr><th></th></tr></thead><tbody>
         <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
         <br><br><br><br><br><br>
                    
                </tbody></table>
        </div>
        
        
        </div>
    </div> 
     </body> 
      </html> ";
            }
        }
        echo $apercu;
    }
    function link_update($id){
  $type = $this->session->userdata('type');
if($type<2){
      return "<a href='".site_url("Pelerin/update/$id") . "' class=btn  >Modifier</a> ";  
        }else
                    return null;

}
function resize($originalFile, $targetFile, $newFileName, $newWidth) {
        $result = NULL;
        $info = getimagesize($originalFile);
        $mime = $info['mime'];

        switch ($mime) {
            case 'image/jpeg':
                $image_create_func = 'imagecreatefromjpeg';
                $image_save_func = 'imagejpeg';
                $new_image_ext = 'jpg';
                break;

            case 'image/png':
                $image_create_func = 'imagecreatefrompng';
                $image_save_func = 'imagepng';
                $new_image_ext = 'png';
                break;

            case 'image/gif':
                $image_create_func = 'imagecreatefromgif';
                $image_save_func = 'imagegif';
                $new_image_ext = 'gif';
                break;

            default:
                throw Exception('Unknown image type.');
        }

        $img = $image_create_func($originalFile);
        list($width, $height) = getimagesize($originalFile);

        $newHeight = ($height / $width) * $newWidth;
        $tmp = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($tmp, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

        if (file_exists($targetFile)) {
            unlink($targetFile);
        }
        if ($image_save_func($tmp, $targetFile . $newFileName . ".jpg")) {

            return TRUE;
        } else {
            return FALSE;
        }
    }
function  get_option_categorie(){
    $options=  array();
    $query_categorie = $this->categorieManager->liste_categorie();
        if (is_array($query_categorie) && count($query_categorie)) {
            foreach ($query_categorie as $loop) {
                $options[$loop->CAT_ID]=$loop->CAT_NOM;
            }
        }
        return $options;
}

}

