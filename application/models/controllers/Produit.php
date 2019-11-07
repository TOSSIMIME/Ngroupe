<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produits extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //chargement des ressource du constructeur
        $this->load->helper(array('url', 'assets'));
        $this->load->helper('fn_info');
		 $this->load->helper('fn_info_helper');
        $this->load->library('form_validation');
        $this->load->library('session');
        //chargement modele
        $this->load->model('categorie_modele', 'categorieManager');
	   //$this->load->model('user_modele', 'userManager');
	  // $this->load->model('hotel_modele', 'hotelManager');
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->library('table');
       // $this->load->library('user_agent');
		$form='';
		
    }

    public function index() {
          $data['info'] = $this->session->flashdata('info');
		  $data['categorie']= $this->categorieManager->get_categorie();
		 $data['info']='<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><center> Vous pouvez proceder le scannage maintenant avec votre appareil 3M à coté! </center></div>';
            $data['menu_top'] = "themes/menu_top";
            $data['main_content'] = "scan_vue";
            $this->load->view('themes/template', $data);
        
    }
    function manuel(){
        $type = $this->session->userdata('etat');
        if ($type == 0) {
            $data['info'] = $this->session->flashdata('info');
            $data['menu_top'] = "themes/menu_top";
            $data['main_content'] = "visiteur_vue";
            $data['tableau'] = $this->get_tableau_manuel();
            $this->load->view('themes/template', $data);
        } elseif ($type == 2) {
            $data['menu_top'] = "themes/menu_top";
            $data['main_content'] = "visiteur_vue";
            $data['tableau'] = $this->get_tableau_manuel();
            $this->load->view('themes/template', $data);
        }
        
    }
	/////////////////////////
	function vue_service($visiteur=''){
        $infoVisiteur = $this->visiteManager->get_visite_info(array('VISIT_ID' => $visiteur));
		 $data['services']= $this->userManager->get_guerite_service();
		 $data['visiteurInfo'] =$infoVisiteur;
            $data['info'] = $this->session->flashdata('info');
			//$data['services']= $this->get_option_service();
            $data['menu_top'] = "themes/menu_top";
            $data['main_content'] = "hotel_vue";
            $this->load->view('themes/template', $data);
        
        
    }
	/////////////////////////
	function vue_services($id){
		 
        $data['visiteurInfo'] = $this->visiteManager->get_visites(array('VISIT_ID' => $id));
		$guerite = $this->session->userdata('gue_id');
		 $data['services']= $this->userManager->get_guerite_service(array('ID_GUE' => $guerite));
		// $data['visiteurInfo'] =$infoVisiteur;
            $data['info'] = $this->session->flashdata('info');
			$data['tableau']= $this->get_tableau_info($id);
            $data['menu_top'] = "themes/menu_top";
            $data['main_content'] = "visiteur_vue_info";
            $this->load->view('themes/template', $data);
        
        
    }
	
	
	///////////////////////// pour un gueritier
	function vue_service_guerite($id){
		 
        $data['visiteurInfo'] = $this->visiteManager->get_visites(array('VISIT_ID' => $id));
		$guerite = $this->session->userdata('gue_id');
		 $data['services']= $this->userManager->get_guerite_service();
		// $data['visiteurInfo'] =$infoVisiteur;
            $data['info'] = $this->session->flashdata('info');
			$data['tableau']= $this->get_tableau_info($id);
            $data['menu_top'] = "themes/menu_top";
            $data['main_content'] = "visiteur_vue_info";
            $this->load->view('themes/template', $data);
        
        
    }
	 function info_plus($visiteur=''){
       // $infoVisiteur = $this->visiteManager->get_visite_info(array('VISIT_ID' => $visiteur));
         // $data['services']= $this->userManager->get_guerite_service();
        $type = $this->session->userdata('type');
        if ($type == 2 || $type==1) {
            

            $this->form_validation->set_rules('direction', '"direction"', 'trim|min_length[2]|max_length[52]|encode_php_tags');
           $this->form_validation->set_rules('observation', '"Motif"', 'trim|min_length[2]|max_length[52]|encode_php_tags');
           
            if ($this->form_validation->run()) {
                $isInsert = FALSE;
                //recuperation valeur
               $direction = $this->input->post('direction');
                $id_visite = $this->input->post('id_visite');
                $telephone = $this->input->post('telephone');
                $observation = $this->input->post('observation');
                

                $isInsert = $this->userManager->ajouter_infos_plus($id_visite,$direction,$telephone,$observation);
				  $isInserts = $this->visiteManager->ajouter_visites($direction,$id_visite);

                if ($isInsert) {
                    $info = ajout_succes_info("Enregistrement reusi");
                    $this->session->set_flashdata('info', $info);

                    redirect('visiteur');
                } else {
                    $info = ajout_fail_info('Veuillez verifier vos information et réessayez');
                    $this->session->set_flashdata('info', $info);
                }
				
            }else{
			 $info = ajout_fail_info('Veuillez verifier vos information et réessayez');
                    $this->session->set_flashdata('info', $info);
            redirect('visiteur');
			}
        }
        
    }
    
    function  new_manuel(){
         $etat = $this->session->userdata('type');
        $user = $this->session->userdata('id');
        $guerite = $this->session->userdata('gue_id');
         $data['menu_top'] = "themes/menu_top";
        $data['main_content'] = "visiteur_vue";
        $data['tableau'] = $this->get_tableau_manuel();
   // $this->form_validation->set_rules('number', 'Numéro', 'required|min_length[6]|alpha_numeric|callback_password_check');
        $this->form_validation->set_rules('nom', '"Nom"', 'trim|required|min_length[2]|max_length[52]|encode_php_tags');
        $this->form_validation->set_rules('prenom', "Prénom", 'trim|required|min_length[2]|max_length[50]|encode_php_tags');
        $this->form_validation->set_rules('sexe', "Sexe", 'trim|required|min_length[1]|max_length[20]|encode_php_tags');
       // $this->form_validation->set_rules('naissance', "Date", 'trim|required|min_length[8]|max_length[20]|encode_php_tags');
       // $this->form_validation->set_rules('expire', "Date", 'trim|required|min_length[8]|max_length[20]|encode_php_tags');
        $this->form_validation->set_rules('nationalite', "Nationalité", 'trim|required|min_length[3]|max_length[20]|encode_php_tags');
  if ($this->form_validation->run()) {

            $isInsert = FALSE;
            //recuperation valeur
            $nom = $this->input->post('nom');
            $prenom = $this->input->post('prenom');
            $number = $this->input->post('number');
            $nationalite = $this->input->post('nationalite');
            $naissance = $this->input->post('naissance');
            $expire = $this->input->post('expire');
            $sexe = $this->input->post('sexe');
            
            $infoVisiteur = $this->visiteManager->get_visite_info(array('VISIT_NUMERO' => $number));
                        if ($infoVisiteur && $infoVisiteur['sortie'] == 0) {
                            $isInsert = $this->visiteManager->sortie_visite($number);

                            if ($isInsert) {
                                $info = ajout_succes_info("Sortie Visiteur");
                                $this->session->set_flashdata('info', $info);
                                $action = 'true';

                               redirect('visite');
                            } else {
                                $info = ajout_fail_info('Veuillez verifier vos information et réessayez');
                                $this->session->set_flashdata('info', $info);
                            }
                        } else {

                            $isInsert = $this->visiteManager->ajouter_visite($number, $nom, $prenom, $naissance, $sexe, $nationalite, $expire, $guerite, $user);

                            if ($isInsert) {
                                $action = 'true';
                                $info = ajout_succes_info("Nouveau Visiteur");
                                $this->session->set_flashdata('info', $info);
                                redirect('visiteur/manuel');
                            }
  
  }
        
        
    }  else {
        $data['info'] = "";
        $this->load->view('themes/template', $data);   
    }}
////////////////////////////////////////////////////////
function  new_infos(){
         
    $this->form_validation->set_rules('direction', 'Numéro', 'required|min_length[6]|alpha_numeric|callback_password_check');
        $this->form_validation->set_rules('nom', '"Nom"', 'trim|required|min_length[2]|max_length[52]|encode_php_tags');
        
  if ($this->form_validation->run()) {

            $isInsert = FALSE;
            //recuperation valeur
            $nom = $this->input->post('nom');
            $prenom = $this->input->post('prenom');
            $number = $this->input->post('number');
            $nationalite = $this->input->post('nationalite');
            $naissance = $this->input->post('naissance');
            $expire = $this->input->post('expire');
            $sexe = $this->input->post('sexe');
            
            $infoVisiteur = $this->visiteManager->get_visite_info(array('VISIT_NUMERO' => $number));
                        if ($infoVisiteur && $infoVisiteur['sortie'] == 0) {
                            $isInsert = $this->visiteManager->sortie_visite($number,$guerite);

                            if ($isInsert) {
                                $info = ajout_succes_info("Sortie Visiteur");
                                $this->session->set_flashdata('info', $info);
                                $action = 'true';

                               redirect('visite');
                            } else {
                                $info = ajout_fail_info('Veuillez verifier vos information et réessayez');
                                $this->session->set_flashdata('info', $info);
                            }
                        } else {

                            $isInsert = $this->visiteManager->ajouter_visite($number, $nom, $prenom, $naissance, $sexe, $nationalite, $expire, $guerite, $user);

                            if ($isInsert) {
                                $action = 'true';
                                $info = ajout_succes_info("Nouveau Visiteur");
                                $this->session->set_flashdata('info', $info);
                                redirect('visiteur/manuel');
                            }
  
  }
        
        
    }  else {
        $data['info'] = "";
        $this->load->view('themes/template', $data);   
    }}

    public function new_scan() {
        $etat = $this->session->userdata('type');
        $user = $this->session->userdata('id');
        $guerite = $this->session->userdata('gue_id');

        $action = 'false';
        if ($etat == 2) {
            $data['menu_top'] = "themes/menu_top";
            $data['main_content'] = "scan_vue";

            $info = $this->input->post('info');
            if ($info != '') {
                $info = explode(',', $info);
                if (count($info) == 8) {
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
                        $birth = substr($birth, 3);
                        $expire = substr($expire, 3);
                        $number = substr($number, 3);
                        $etat = substr($etat, 3);
                        $pays = substr($pays, 3);



                        $infoVisiteur = $this->visiteManager->get_visite_info(array('VISIT_NUMERO' => $number));
                        if ($infoVisiteur && $infoVisiteur['sortie'] == 0) {
                            $isInsert = $this->visiteManager->sortie_visite($number,$guerite);
							

                            if ($isInsert) {
                                $info = ajout_succes_info("Sortie Visiteur");
                                $this->session->set_flashdata('info', $info);
                                $action = 'true';

                               redirect('visite');
                            } else {
                                $info = ajout_fail_info('Veuillez verifier vos information et réessayez');
                                $this->session->set_flashdata('info', $info);
                            }
                        } else {

                            $isInsert = $this->visiteManager->ajouter_visite($number, $nom, $prenom, $birth, $sexe, $pays, $expire, $guerite, $user);

                            if ($isInsert) {
                                $action = 'true';
                                $info = ajout_succes_info("Nouveau Visiteur");
                                $this->session->set_flashdata('info', $info);

                                redirect('visite/liste');
                            } else {

                                $info = ajout_fail_info('Veuillez verifier vos information et réessayez');
                                $this->session->set_flashdata('info', $info);
                            }
                        }
                    }
                }
            }
            $data['info'] = "";
            $data['tableau'] = $this->get_tableau();
            $this->load->view('themes/template', $data);
        }


        echo $action;
    }
    function out($number){
         $etat = $this->session->userdata('type');
        $guerite=$this->session->userdata('gue_id');
        if ($etat) {
        $isInsert = $this->visiteManager->sortie_visite_manuel($number,$guerite);
                            if ($isInsert) {
                                $info = ajout_succes_info("Sortie Visiteur");
                                $this->session->set_flashdata('info', $info);
                                $action = 'true';
                            } else {
                                $info = ajout_fail_info('Veuillez verifier vos information et réessayez');
                                $this->session->set_flashdata('info', $info);
                            }
        redirect($this->agent->referrer());
       
    } }

    public function delete($id) {
        $etat = $this->session->userdata('etat');
        if ($etat == 0) {
            $result = $this->visiteManager->disable_visite($id);
            if ($result) {
                $info = suppression_succes_info('Element Supprimé avec Succès');
                $this->session->set_flashdata('info', $info);
            } else {
                $info = suppression_fail_info('Echec Suppression Element');
                $this->session->set_flashdata('info',$info);
            }
            redirect('visite');
        }
    }
function envoi_image($id) {
	 $guerite = $this->session->userdata('gue_id');
	// $ids = $this->session->userdata('id_visite');
	  $path = "images/uploads/";
	   $extension = 'png'; 
       if(isset($_POST['img_data'])){ 
        $data = $_POST['img_data']; 
        $data = str_replace('data:image/png;base64,', '',$data); 
        $data = base64_decode($data); 
           //   $id=base64_decode($ids);
        $date = date('YmdHis');
$query_visiteur = $this->visiteManager->liste_visite_info(array('VISIT_ID' =>  $_SESSION['id_visite']));
            if (is_array($query_visiteur) && count($query_visiteur) > 0) {
                foreach ($query_visiteur as $loop) {
                   $nom=str_replace('-', '',$loop->VISIT_NUMERO. ' ' .$loop->VISIT_NOM . ' ' . $loop->VISIT_PRENOM);
		              $id=$loop->VISIT_ID;
        $file_name = $date.".".$extension; 
          $isInsert = $this->visiteManager->photo_visite($id,$guerite);
        file_put_contents($path.$file_name, $data); 
        $_SESSION['save_to_file'] = $file_name; 
        header('Content-type: image/png'); 
        $data = file_get_contents($path.$_SESSION['save_to_file']); 
        echo $data; 
				}
			}				
    } else { 
        header('Content-type: image/png'); 
        header('Content-Disposition: attachment; filename="'.$_SESSION['save_to_file'].'"'); 

        $data = file_get_contents($path.$_SESSION['save_to_file']); 

        echo $data; 
    } 
	
   }
    function printTab($date = '') {
        echo $this->get_tableau($date);
    }

 

    function get_tableau($date = '', $guerite = '') {



        $atts = array(
            'width' => 650,
            'height' => 400,
            'scrollbars' => 'yes',
            'status' => 'no',
            'resizable' => 'yes',
            'screenx' => 300,
            'screeny' => 60,
            'window_name' => '_blank'
        );
		
		 $info_plus= array(
            'width' => 320,
            'height' => 280,
            'scrollbars' => 'yes',
            'status' => 'no',
            'resizable' => 'yes',
            'screenx' => 300,
            'screeny' => 60,
            'window_name' => '_blank'
        );

		 $photo= array(
            'width' => 382,
            'height' => 280,
            'scrollbars' => 'yes',
            'status' => 'no',
            'resizable' => 'yes',
            'screenx' => 300,
            'screeny' => 60,
            'window_name' => '_blank'
        );
		
		
        $user = $this->session->userdata('id');

        if ($date == '') {
            $date = date('Y-m-d');
        }
        $type = $this->session->userdata('type');

        if ($type == 0) {
	
            $template = array('table_open' => '<table id="tab" class="well  table table-hover table-striped table-bordered" border=1>');
            $this->table->set_heading(array('Numéro', 'Nom & Prénom', 'Naissance', 'Sexe', 'Pays', 'Expire','Service', 'Entrée', 'Sortie', 'Etat','Info plus', 'Aperçu','Imprimer'));

            if ($guerite == 0) {
                $query_visite = $this->visiteManager->liste_visite();
            } else {
                $query_visite = $this->visiteManager->liste_visite(array('DATE(VISIT_ENTRE)' => $date, 'VISIT_DEL' => 0, 'VISIT_GUERITE' => $guerite));
            }
            if (is_array($query_visite) && count($query_visite) > 0) {

 foreach ($query_visite as $loop) {
                    if ($loop->VISIT_SORTIE == 0) {
                    $this->table->add_row(array($loop->VISIT_NUMERO, $loop->VISIT_NOM . ' ' . $loop->VISIT_PRENOM, $loop->VISIT_NAISSANCE, $loop->VISIT_SEXE
                        , $loop->VISIT_PAYS, $loop->VISIT_EXPIRE, $loop->GUE_NOM,$loop->DIRECTION,$loop->VISIT_ENTRE, $loop->VISIT_SORTIE,
                                               '<span class="label label-danger status" >Interne</a>',
											    
                        anchor_popup(site_url("visiteur/profil/$loop->VISIT_ID"), '<span class="glyphicon glyphicon-eye-open"></span>', $atts), anchor_popup(site_url("visiteur/profiles/$loop->VISIT_ID"), '<span class="glyphicon glyphicon-print"></span>', $atts),
                            )
                    );
					   }else{
						  $this->table->add_row(array($loop->VISIT_NUMERO, $loop->VISIT_NOM . ' ' . $loop->VISIT_PRENOM, $loop->VISIT_NAISSANCE, $loop->VISIT_SEXE
                        , $loop->VISIT_PAYS, $loop->VISIT_EXPIRE, $loop->GUE_NOM,$loop->ID_DIRECTION,$loop->VISIT_ENTRE, $loop->VISIT_SORTIE,
                                               '<a href="#" class="label label-success status" >Externe</a>',
                        anchor_popup(site_url("visiteur/profil/$loop->VISIT_ID"), '<span class="glyphicon glyphicon-eye-open"></span>', $atts), anchor_popup(site_url("visiteur/profiles/$loop->VISIT_ID"), '<span class="glyphicon glyphicon-print"></span>', $atts),
                            )
                    );  
						   
					   }
                }
            }

            $this->table->set_template($template);
            return $this->table->generate();
        } elseif ($type == 1) {
            $guerite = $this->session->userdata('id');
            $template = array('table_open' => '<table id="tab" class="well  table table-hover table-striped table-bordered" border=1>');
            $this->table->set_heading(array('Numéro', 'Nom & Prénom', 'Naissance', 'Sexe', 'Pays', 'Expire', 'Service', 'Entrée', 'Sortie', 'Etat','Ajouter info', 'Aperçu','Imprimer'));


            $query_visite = $this->visiteManager->liste_visite(array('DATE(VISIT_ENTRE)' => $date, 'VISIT_DEL' => 0, 'VISIT_GUERITE' => $guerite));





            if (is_array($query_visite) && count($query_visite) > 0) {

                foreach ($query_visite as $loop) {
                     if ($loop->VISIT_SORTIE == 0) {
                    $this->table->add_row(array($loop->VISIT_NUMERO, $loop->VISIT_NOM . ' ' . $loop->VISIT_PRENOM, $loop->VISIT_NAISSANCE, $loop->VISIT_SEXE
                        , $loop->VISIT_PAYS, $loop->VISIT_EXPIRE,$loop->DIRECTION,$loop->VISIT_ENTRE, $loop->VISIT_SORTIE,
                                               '<span class="label label-danger status" >Interne</a>','<span  title="Interne   " ><a href="'. site_url("visiteur/vue_service_guerite/$loop->VISIT_ID").'" class="btn btn-success btn-sm" disabled >Info plus</a></span>',
											    
                        anchor_popup(site_url("visiteur/profil/$loop->VISIT_ID"), '<span class="glyphicon glyphicon-eye-open"></span>', $atts), anchor_popup(site_url("visiteur/profiles/$loop->VISIT_ID"), '<span class="glyphicon glyphicon-print"></span>', $atts),
                            )
                    );
					   }else{
						  $this->table->add_row(array($loop->VISIT_NUMERO, $loop->VISIT_NOM . ' ' . $loop->VISIT_PRENOM, $loop->VISIT_NAISSANCE, $loop->VISIT_SEXE
                        , $loop->VISIT_PAYS, $loop->VISIT_EXPIRE,$loop->DIRECTION,$loop->VISIT_ENTRE, $loop->VISIT_SORTIE,
                                               '<span class="label label-success status" >Externe</a>','<span  title="Interne   " ><a href="'. site_url("visiteur/vue_service_guerite/$loop->VISIT_ID").'" class="btn btn-warning btn-sm" >Info plus</a></span>',
                        anchor_popup(site_url("visiteur/profil/$loop->VISIT_ID"), '<span class="glyphicon glyphicon-eye-open"></span>', $atts), anchor_popup(site_url("visiteur/profiles/$loop->VISIT_ID"), '<span class="glyphicon glyphicon-print"></span>', $atts),
                            )
                    );  
						   
					   }
                }
            }

            $this->table->set_template($template);
            return $this->table->generate();
        } elseif ($type == 2) {
            $guerite = $this->session->userdata('gue_id');
			
			
            $template = array('table_open' => '<table id="tab" class="well  table table-hover table-striped table-bordered" border=1>');
            $this->table->set_heading(array('photo visiteur','Numéro', 'Nom & Prénom', 'Naissance', 'Sexe', 'Pays', 'Expire', 'Service',  'Entrée', 'Sortie', 'Etat', 'Ajouter Info', 'Aperçu'));
                   
            $query_visite = $this->visiteManager->liste_visite("(DATE(VISIT_ENTRE)='$date' OR DATE(VISIT_SORTIE)=0) AND VISIT_DEL =0 AND VISIT_GUERITE=$guerite");
            if (is_array($query_visite) && count($query_visite) > 0) {
                    
                foreach ($query_visite as $loop) {
					    if ($loop->VISIT_SORTIE == 0  ) {
							     
                    $this->table->add_row(array(anchor_popup(site_url("visiteur/uploade/$loop->VISIT_ID"), '<center><span class="btn btn-primary btn-sm">Prendre photo</span></center>', $photo),$loop->VISIT_NUMERO, $loop->VISIT_NOM . ' ' . $loop->VISIT_PRENOM, $loop->VISIT_NAISSANCE, $loop->VISIT_SEXE
                        , $loop->VISIT_PAYS, $loop->VISIT_EXPIRE, $loop->DIRECTION,$loop->VISIT_ENTRE, $loop->VISIT_SORTIE,
                                               '<a href="#" class="label label-danger status" >Interne</a>',
											   
											    
												'<a href="'.site_url("visiteur/vue_services/$loop->VISIT_ID").'" class="btn btn-primary btn-sm" >Info plus</a>',
												//'<a href="'.site_url("visiteur/vue_service/$loop->VISIT_ID").'" class="btn btn-primary btn-sm" >Affecter</a>',
												//anchor_popup(site_url("visiteur/ajout_info/$loop->VISIT_ID"), '<span class="btn btn-primary btn-sm">Info plus</span>', $info_plus),
												
                        anchor_popup(site_url("visiteur/profil/$loop->VISIT_ID"), '<span class="glyphicon glyphicon-eye-open"></span>', $atts),
                            )
                    );
								  
					
					
					
					   }else{
						  $this->table->add_row(array('<center><img width=50 src="' . image_url('$loop->PHOTO_VISIT') . '"   onerror=this.src="' . image_url("$loop->PHOTO_VISIT".".png") . '" alt="photo"></center>',$loop->VISIT_NUMERO, $loop->VISIT_NOM . ' ' . $loop->VISIT_PRENOM, $loop->VISIT_NAISSANCE, $loop->VISIT_SEXE
                        , $loop->VISIT_PAYS, $loop->VISIT_EXPIRE,$loop->DIRECTION,$loop->VISIT_ENTRE, $loop->VISIT_SORTIE,
						           '<a href="#" class="label label-success status" >Externe</a>',
								   '<span  title="Interne   " ><a href="'. site_url("visiteur/ajout_info/$loop->VISIT_ID").'" class="btn btn-success btn-sm" disabled>Info plus</a></span>',
												//'<a href="'.site_url("visiteur/vue_service/$loop->VISIT_ID").'" class="btn btn-primary btn-sm" >Affecter</a>',
                        anchor_popup(site_url("visiteur/profil/$loop->VISIT_ID"), '<span class="glyphicon glyphicon-eye-open"></span>', $atts),
                            )
                    );  
						   
					   }
                }
            }

            $this->table->set_template($template);
            return $this->table->generate();
        }
		
    }
	
	
	
	
	   function get_tableau_info($id) {



        $atts = array(
            'width' => 650,
            'height' => 400,
            'scrollbars' => 'yes',
            'status' => 'no',
            'resizable' => 'yes',
            'screenx' => 300,
            'screeny' => 50,
            'window_name' => '_blank'
        );

        $user = $this->session->userdata('id');

       
        $type = $this->session->userdata('type');

        
            $guerite = $this->session->userdata('gue_id');
            $template = array('table_open' => '<table id="tab" class="well  table table-hover table-striped table-bordered" border=1>');
           $this->table->set_heading(array('photo','Numéro', 'Nom & Prénom', 'Naissance', 'Sexe', 'Pays', 'Expire',  'Entrée', 'Sortie', 'Etat'));
                   
            $query_visite = $this->visiteManager->liste_visite(array('VISIT_ID' => $id));
            if (is_array($query_visite) && count($query_visite) > 0) {
            
                foreach ($query_visite as $loop) {
					    
                   $this->table->add_row(array('<center><img width=50 src="' . image_url('$loop->PHOTO_VISIT') . '"   onerror=this.src="' . image_url("$loop->PHOTO_VISIT".".png") . '" alt="photo"></center>',$loop->VISIT_NUMERO, $loop->VISIT_NOM . ' ' . $loop->VISIT_PRENOM, $loop->VISIT_NAISSANCE, $loop->VISIT_SEXE
                        , $loop->VISIT_PAYS, $loop->VISIT_EXPIRE,$loop->VISIT_ENTRE, $loop->VISIT_SORTIE,
						           '<a href="#" class="label label-danger status" >Externe</a>'
								   
                            )
                    );  
					   
                }
            }

            $this->table->set_template($template);
            return $this->table->generate();
        
    }
/////////////////////////////////////////////////////////
function get_tableau_manuel($date = '', $guerite = '') {



       $atts = array(
            'width' => 650,
            'height' => 400,
            'scrollbars' => 'yes',
            'status' => 'no',
            'resizable' => 'yes',
            'screenx' => 300,
            'screeny' => 60,
            'window_name' => '_blank'
        );
		
		 $info_plus= array(
            'width' => 320,
            'height' => 280,
            'scrollbars' => 'yes',
            'status' => 'no',
            'resizable' => 'yes',
            'screenx' => 300,
            'screeny' => 60,
            'window_name' => '_blank'
        );

		 $photo= array(
            'width' => 382,
            'height' => 280,
            'scrollbars' => 'yes',
            'status' => 'no',
            'resizable' => 'yes',
            'screenx' => 300,
            'screeny' => 60,
            'window_name' => '_blank'
        );
		
		
        $user = $this->session->userdata('id');

        if ($date == '') {
            $date = date('Y-m-d');
        }
        $type = $this->session->userdata('type');

        if ($type == 0) {
	
            $template = array('table_open' => '<table id="tab" class="well  table table-hover table-striped table-bordered" border=1>');
            $this->table->set_heading(array('Numéro', 'Nom & Prénom', 'Naissance', 'Sexe', 'Pays', 'Expire','Service', 'Entrée', 'Sortie', 'Etat','Info plus', 'Aperçu'));

            if ($guerite == 0) {
                $query_visite = $this->visiteManager->liste_visite(array('DATE(VISIT_ENTRE)' => $date, 'VISIT_DEL' => 0));
            } else {
                $query_visite = $this->visiteManager->liste_visite(array('DATE(VISIT_ENTRE)' => $date, 'VISIT_DEL' => 0, 'VISIT_GUERITE' => $guerite));
            }



            if (is_array($query_visite) && count($query_visite) > 0) {

                foreach ($query_visite as $loop) {
                    if ($loop->VISIT_SORTIE == 0) {
                    $this->table->add_row(array($loop->VISIT_NUMERO, $loop->VISIT_NOM . ' ' . $loop->VISIT_PRENOM, $loop->VISIT_NAISSANCE, $loop->VISIT_SEXE
                        , $loop->VISIT_PAYS, $loop->VISIT_EXPIRE, $loop->GUE_NOM,$loop->ID_DIRECTION,$loop->VISIT_ENTRE, $loop->VISIT_SORTIE,
                                               '<span class="label label-danger status" >Interne</a>',
											    
                        anchor_popup(site_url("visiteur/profil/$loop->VISIT_ID"), '<span class="glyphicon glyphicon-eye-open"></span>', $atts),
                            )
                    );
					   }else{
						  $this->table->add_row(array($loop->VISIT_NUMERO, $loop->VISIT_NOM . ' ' . $loop->VISIT_PRENOM, $loop->VISIT_NAISSANCE, $loop->VISIT_SEXE
                        , $loop->VISIT_PAYS, $loop->VISIT_EXPIRE, $loop->GUE_NOM,$loop->ID_DIRECTION,$loop->VISIT_ENTRE, $loop->VISIT_SORTIE,
                                               '<a href="#" class="label label-success status" >Externe</a>',
                        anchor_popup(site_url("visiteur/profil/$loop->VISIT_ID"), '<span class="glyphicon glyphicon-eye-open"></span>', $atts),
                            )
                    );  
						   
					   }
                }
            }

            $this->table->set_template($template);
            return $this->table->generate();
        } elseif ($type == 1) {
            $guerite = $this->session->userdata('id');
            $template = array('table_open' => '<table id="tab" class="well  table table-hover table-striped table-bordered" border=1>');
            $this->table->set_heading(array('Numéro', 'Nom & Prénom', 'Naissance', 'Sexe', 'Pays', 'Expire', 'Service', 'Entrée', 'Sortie', 'Etat','Ajouter info', 'Aperçu'));


            $query_visite = $this->visiteManager->liste_visite(array('DATE(VISIT_ENTRE)' => $date, 'VISIT_DEL' => 0, 'VISIT_GUERITE' => $guerite));





            if (is_array($query_visite) && count($query_visite) > 0) {

                foreach ($query_visite as $loop) {
                     if ($loop->VISIT_SORTIE == 0) {
                    $this->table->add_row(array($loop->VISIT_NUMERO, $loop->VISIT_NOM . ' ' . $loop->VISIT_PRENOM, $loop->VISIT_NAISSANCE, $loop->VISIT_SEXE
                        , $loop->VISIT_PAYS, $loop->VISIT_EXPIRE,$loop->DIRECTION,$loop->VISIT_ENTRE, $loop->VISIT_SORTIE,
                                              '<a href="'. site_url("visiteur/out/$loop->VISIT_ID").'" class="label label-danger status" >Interne</a>','<span  title="Interne   " ><a href="'. site_url("visiteur/vue_services?q=$loop->VISIT_ID").'" class="btn btn-success btn-sm" disabled >Info plus</a></span>',
											    
                        anchor_popup(site_url("visiteur/profil/$loop->VISIT_ID"), '<span class="glyphicon glyphicon-eye-open"></span>', $atts),
                            )
                    );
					   }else{
						  $this->table->add_row(array($loop->VISIT_NUMERO, $loop->VISIT_NOM . ' ' . $loop->VISIT_PRENOM, $loop->VISIT_NAISSANCE, $loop->VISIT_SEXE
                        , $loop->VISIT_PAYS, $loop->VISIT_EXPIRE,$loop->DIRECTION,$loop->VISIT_ENTRE, $loop->VISIT_SORTIE,
                                               '<span class="label label-success status" >Externe</a>','<span  title="Interne   " ><a href="'. site_url("visiteur/vue_services?q=$loop->VISIT_ID").'" class="btn btn-warning btn-sm" >Info plus</a></span>',
                        anchor_popup(site_url("visiteur/profil/$loop->VISIT_ID"), '<span class="glyphicon glyphicon-eye-open"></span>', $atts),
                            )
                    );  
						   
					   }
                }
            }

            $this->table->set_template($template);
            return $this->table->generate();
        } elseif ($type == 2) {
            $guerite = $this->session->userdata('gue_id');
			
			
            $template = array('table_open' => '<table id="tab" class="well  table table-hover table-striped table-bordered" border=1>');
            $this->table->set_heading(array('photo','Numéro', 'Nom & Prénom', 'Naissance', 'Sexe', 'Pays', 'Expire', 'Service',  'Entrée', 'Sortie', 'Etat', 'Ajouter Info', 'Aperçu'));
                   
            $query_visite = $this->visiteManager->liste_visite("(DATE(VISIT_ENTRE)='$date' OR DATE(VISIT_SORTIE)=0) AND VISIT_DEL =0 AND VISIT_GUERITE=$guerite");
            if (is_array($query_visite) && count($query_visite) > 0) {
                    
                foreach ($query_visite as $loop) {
					    if ($loop->VISIT_SORTIE == 0) {
                    $this->table->add_row(array(anchor_popup(site_url("visiteur/uploade/$loop->VISIT_ID"), '<span class="glyphicon glyphicon-eye-open"></span>', $photo),$loop->VISIT_NUMERO, $loop->VISIT_NOM . ' ' . $loop->VISIT_PRENOM, $loop->VISIT_NAISSANCE, $loop->VISIT_SEXE
                        , $loop->VISIT_PAYS, $loop->VISIT_EXPIRE, $loop->DIRECTION,$loop->VISIT_ENTRE, $loop->VISIT_SORTIE,
                                               '<a href="'. site_url("visiteur/out/$loop->VISIT_ID").'" class="label label-danger status" >Interne</a>',
											   
											    
												anchor_popup(site_url("visiteur/ajout_info/$loop->VISIT_ID"), '<span class="btn btn-primary btn-sm">Info plus</span>', $info_plus),
												
                        anchor_popup(site_url("visiteur/profil/$loop->VISIT_ID"), '<span class="glyphicon glyphicon-book"></span>', $atts),
                            )
                    );
					   }else{
						  $this->table->add_row(array('<center><img width=50 src="' . image_url('$loop->PHOTO_VISIT') . '"   onerror=this.src="' . image_url("$loop->PHOTO_VISIT".".png") . '" alt="photo"></center>',$loop->VISIT_NUMERO, $loop->VISIT_NOM . ' ' . $loop->VISIT_PRENOM, $loop->VISIT_NAISSANCE, $loop->VISIT_SEXE
                        , $loop->VISIT_PAYS, $loop->VISIT_EXPIRE,$loop->DIRECTION,$loop->VISIT_ENTRE, $loop->VISIT_SORTIE,
						           '<a href="#" class="label label-success status" >Externe</a>',
								   '<span  title="Interne   " ><a href="'. site_url("visiteur/ajout_info/$loop->VISIT_ID").'" class="btn btn-success btn-sm" disabled>Info plus</a></span>',
                        anchor_popup(site_url("visiteur/profil/$loop->VISIT_ID"), '<span class="glyphicon glyphicon-eye-open"></span>', $atts),
                            )
                    );  
						   
					   }
                }
            }

            $this->table->set_template($template);
            return $this->table->generate();
        }
		
    }
   
    function get_option_categorie() {
        $options = array();
        $query_categorie = $this->categorieManager->liste_categorie();
        if (is_array($query_categorie) && count($query_categorie)) {
            foreach ($query_categorie as $loop) {
                $options[$loop->CAT_ID] = $loop->CAT_NOM;
            }
        }
        return $options;
    }
    
	
	///////////////////////////////
	function  get_option_service()
    {
        $options = array();
        $type = $this->session->userdata('type');
        $id = $this->session->userdata('id');
		$gue_id = $this->session->userdata('gue_id');
        if ($type == 0) {
            $options[0] = "--Choisir Guerite--";
            $query_guerite = $this->userManager->get_direction();
			if (is_array($query_guerite) && count($query_guerite)) {
            foreach ($query_guerite as $loop) {
                $options[$loop->GUE_ID] = $loop->GUE_NOM;
            }
        }
        } elseif ($type == 1 || $type == 2) {
			 $options[0] = "--Choisir Direction--";
            $query_guerite = $this->userManager->get_guerite_service(array('ID_GUE'=>$gue_id));
			if (is_array($query_guerite) && count($query_guerite)) {
            foreach ($query_guerite as $loop) {
                $options[$loop->GUE_ID] = $loop->GUE_NOM;
            }
        }
        }else{
			
       }
        
        return $options;
    }
   
 
 
 
 
 
 
 function infoSupp($visiteur) {
        $apercu="";
        $query_hotel = $this->hotelManager->liste_hotel(array('HOT_VISIT' => $visiteur));
 if (is_array($query_hotel) && count($query_hotel) > 0) {
            foreach ($query_hotel as $loop) {
         $apercu=" <tr><td>Lieu Naissance :  <b>$loop->HOT_NAISS</b></td>
               <td> Profession :  <b>$loop->HOT_PROF</b></td>    
               <td> Adresse:  <b>$loop->HOT_ADRESSE</b></td></tr>
                  <tr> <td> Ville :  <b>$loop->HOT_VILLE</b></td>
                   <td> Bp :  <b>$loop->HOT_BP</b></td>
                   <td> Ville Depart :  <b>$loop->HOT_VILLE_DEPART</b></td></tr>
                   <tr><td> Ville Destation :  <b>$loop->HOT_VILLE_ARRIVE</b></td>
                       <td> Motif :  <b>$loop->HOT_MOTIF</b></td>
                       <td> Type Identité :  <b>$loop->HOT_TYPE_IDENTITE</b></td></tr>
                        

                       <tr><td> Date Livraison :  <b>$loop->HOT_DELIVRE_IDENTITE</b></td>
                       <td> Lieu Etablissement :  <b>$loop->HOT_LIEU_IDENTITE</b></td>
                       <td> Date Entrée :  <b>$loop->HOT_ENTREE</b></td></tr>
                           
                       <tr><td> Date Sortie :  <b>$loop->HOT_SORTIE</b></td>
                       <td> Numéro Chambre :  <b>$loop->HOT_NUM_CHAMBRE</b></td>
                       <td> Numéro Plaque :  <b>$loop->HOT_NUM__PLAQUE</b></td></tr>
                           
                       
                    ";
         
            }}
return  $apercu; 
    }
  function profil($id = '') {
        if ($id == '') {
            $apercu = null;
            return NULL;
        } else {

            
            
            

            $query_visiteur = $this->visiteManager->liste_visite_info(array('VISIT_ID' => $id));
            if (is_array($query_visiteur) && count($query_visiteur) > 0) {
                foreach ($query_visiteur as $loop) {
                    if($loop->VISIT_SORTIE==0){
                     $btn="btn-danger";     
                    }  else {
                    $btn="btn-success";  
                    }
                    $apercu = "
         <head>
        <title>Profil</title>
        
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
        <div class='apercu-header  $btn '>
            <a href='" . site_url("#") . "' title='fermé' type=button class=close data-dismiss=modal aria-hidden=true></a>
            <h3 class='modal-title ' align=center>$loop->VISIT_NOM $loop->VISIT_PRENOM 
                </h3>
        </div>
 <div class=modal-body>
            <table class=table ><thead><tr><th></th></tr></thead><tbody>
              <tr> 
                  <td rowspan=8 >
				<center> <div class=zoom>
 <div class=image>
				  <img width=180 src='" . image_url( $loop->PHOTO_VISIT . ".pnp") . "'     onerror=this.src='" . image_url( $loop->PHOTO_VISIT . ".png") . "'></td> 
				  </div></div></center>
              </tr> 
              <tr>           
                <td>Passport/CNI:  <b>$loop->VISIT_NUMERO</b></td>
               <td> Passport/CNI Expiration :  <b>$loop->VISIT_EXPIRE</b></td> 

</tr>   
              <tr>           
                <td>Sexe :  <b>" . $loop->VISIT_SEXE . "</b></td>
                <td>Date de Naissance: <b>$loop->VISIT_NAISSANCE</b>
</td>
</tr>   
               <tr> 
                 <td>Pays: <b>$loop->VISIT_PAYS</b>
</td>
                  <td>guerite : <b>$loop->GUE_NOM</b>
</td>
                  
                   
                   
</tr> 
</tr>   
				   <tr> 
                 <td>Service: <b>$loop->DIRECTION</b></td>
                  <td>Telephone : <b>$loop->TELEPHONE</b></td>
                  
                   </tr> 
                   <tr> 
                 <td>Motif: <b>$loop->REMARQUES</b></td>
                  <td>Date prise : <b>$loop->VISIT_SORTIE</b></td>
                  
                   </tr> 				   
               <tr> 
                 <td>Date Entrée: <b>$loop->VISIT_ENTRE</b>
</td>
                  <td>Date Sortie : <b>$loop->VISIT_SORTIE</b>
</td>
                  
                   </tr>   ".$this->infoSupp($id)."
               
</table>";
                }
            } else {
                 $query_visiteur = $this->visiteManager->liste_visite_info(array('VISIT_ID' => 1));
            if (is_array($query_visiteur) && count($query_visiteur) > 0) {
                foreach ($query_visiteur as $loop) {
                    if($loop->VISIT_SORTIE==0){
                     $btn="btn-danger";     
                    }  else {
                    $btn="btn-success";  
                    }
					////
					$apercu = "
         <head>
        <title>Profil</title>
        
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
        <div class='apercu-header  $btn '>
            <a href='" . site_url("#") . "' title='fermé' type=button class=close data-dismiss=modal aria-hidden=true></a>
            <h3 class='modal-title ' align=center>$loop->VISIT_NOM $loop->VISIT_PRENOM 
                </h3>
        </div>
 <div class=modal-body>
            <table class=table ><thead><tr><th></th></tr></thead><tbody>
              <tr> 
                  <td rowspan=8 >
				<center> <div class=zoom>
 <div class=image>
				  <img width=180 src='" . image_url( $loop->PHOTO_VISIT . ".pnp") . "'     onerror=this.src='" . image_url( $loop->PHOTO_VISIT . ".png") . "'></td> 
				  </div></div></center>
              </tr> 
              <tr>           
                <td>Passport/CNI:  <b>$loop->VISIT_NUMERO</b></td>
               <td> Passport/CNI Expiration :  <b>$loop->VISIT_EXPIRE</b></td> 

</tr>   
              <tr>           
                <td>Sexe :  <b>" . $loop->VISIT_SEXE . "</b></td>
                <td>Date de Naissance: <b>$loop->VISIT_NAISSANCE</b>
</td>
</tr>   
               <tr> 
                 <td>Pays: <b>$loop->VISIT_PAYS</b>
</td>
                  <td>guerite : <b>$loop->GUE_NOM</b>
</td>
                  
                   
                   
</tr> 
</tr>   
				   <tr> 
                 <td>Service: <b class='label label-danger'>$loop->DIRECTION</b></td>
                  <td>Telephone : <b>$loop->TELEPHONE</b></td>
                  
                   </tr> 
                   <tr> 
                 <td>Motif: <b>$loop->REMARQUES</b></td>
                  <td>Date prise : <b>$loop->VISIT_SORTIE</b></td>
                  
                   </tr> 				   
               <tr> 
                 <td>Date Entrée: <b>$loop->VISIT_ENTRE</b>
</td>
                  <td>Date Sortie : <b>$loop->VISIT_SORTIE</b>
</td>
                  
                   </tr>   ".$this->infoSupp($id)."
               
</table>";
					
					
				}
			}
            }
        }
        echo $apercu;
    }
	
	
	
	 function uploade($id='') {
        if ($id == '') {
            $apercu = null;
            return NULL;
        } else {

            
            
            $_SESSION['id_visite'] = $id;

            $query_visiteur = $this->visiteManager->liste_visite_info(array('VISIT_ID' => $id));
            if (is_array($query_visiteur) && count($query_visiteur) > 0) {
                foreach ($query_visiteur as $loop) {
                    if($loop->VISIT_SORTIE==0){
                     $btn="btn-danger"; 
					 
                    }  else {
                    $btn="btn-success";  
                    }
                    $apercu = "
         <head>
        <title>Profil</title>
        
        <link rel='stylesheet' type='text/css' media='screen' href='" . css_url('form') . "' />
        <link rel='stylesheet' type='text/css' media='screen' href='" . css_url('bootstrap') . "' />
       <link rel='stylesheet' type='text/css' media='screen' href='" . css_url('datepicker3') . "' />
         <link rel='stylesheet' type='text/css' media='screen' href='" . css_url('style') . "' />
          <link rel='stylesheet' type='text/css' media='screen' href='" . css_url('pnotify.custom.min') . "' />
          <link rel='stylesheet' type='text/css' media='screen' href='" . css_url('fileinput') . "' />
         
		 <style>
           
			.contenu{
				background-color:#B4AF91;
				height:250px;
				width:380px;
			}

			h3{
				color: #FFF;
				font-family: 'Comic Sans MS', sans-serif;
			}

			#video, #image{
				border: 2px solid #FFF;
			}

			#snap,#snap_black_white,#send_snap,#snap_inverse{
				background-color: #ccc;
				color: maroon;
				font-weight: bolder;
				padding: 10px;
				border: none;
				cursor: pointer;
				border-radius: 5px;
			}

		</style>
          
        
        <script src='" . js_url('jquery-1.8.3.min') . "'></script>
          
       
        <script src='" . js_url('bootstrap') . "'></script>
        <script src='" . js_url('jquery-1.11.0.min') . "'></script>
         <script src='" . js_url('fileinput') . "'></script>
         <script>

			$(document).ready(function(){

				function hasGetUserMedia() {
				  return !!(navigator.getUserMedia || navigator.webkitGetUserMedia ||
				            navigator.mozGetUserMedia || navigator.msGetUserMedia);
				}

				if (hasGetUserMedia()) {
				  var canvas = document.getElementById('canvas'),
					context = canvas.getContext('2d'),
					video = document.getElementById('video'),
					videoParams = { 'video': true },
					errorCallback = function(error) {
						console.log('Erreur Capture Video: ', error.code); 
					};

					if(navigator.getUserMedia) { //Standard
						navigator.getUserMedia(videoParams, function(stream) {
							video.src = stream;
							video.play();
						}, errorCallback);
					} else if(navigator.webkitGetUserMedia) { //Webkit
						navigator.webkitGetUserMedia(videoParams, function(stream){
							video.src = window.webkitURL.createObjectURL(stream);
							video.play();
						}, errorCallback);
					} else if(navigator.mozGetUserMedia) { //Mozilla
						navigator.mozGetUserMedia(videoParams, function(stream){
							video.src = window.URL.createObjectURL(stream);
							video.play();
						}, errorCallback);
					} else if(navigator.msGetUserMedia) { //IE
						navigator.msGetUserMedia(videoParams, function(stream){
							video.src = window.URL.createObjectURL(stream);
							video.play();
						}, errorCallback);
					}

					$('#snap').click(function() {
						context.drawImage(video, 0, 0, 140, 120);
						$('#image').attr('src', canvas.toDataURL());
					});


					$('#send_snap').click(function() {
						if($('#image').attr('src') != ''){
							var dataURL = canvas.toDataURL('image/png');
							var elt = document.getElementById('element').value;
							 $.ajax({
								type: 'post',
								url:  '" . site_url('visiteur/envoi_image') . "',
								
								data: {'img_data' : dataURL},
								
								
								success: function(data){
										alert('Enregistrement reusi');
										window.close();
								}
							}); 
						} else {
							alert('Il vous faut premièrement prendre une photo SVP !');
						}
					});

				} else {
				  alert('getUserMedia() n est pas supporté par votre navigateur !');
				}
			});

		</script>
		
		
    </head>
    <body>
                    <div class='contenu'>
       <center><h3>Prendre la photo</h3></center>
	
	   <from method='post' action='" . site_url('visiteur/envoi_image') . "'>
	    <center> <p id='nom'>Nom et Prenom:<b>$loop->VISIT_NOM $loop->VISIT_PRENOM </b></p></center>
		<input type='hidden' name='nom' id='element' value='$loop->VISIT_ID'/>
		
	   <table>
	       <tr>
				<td>
		<video id='video' width='140' height='120' autoplay></video>
		   </td>
		    <td>
		<button id='snap'>prendre</button>
		</td>
		   <td>
		<canvas id='canvas' width='140' height='120' style='display:none;'></canvas>
		</td>
		    <td>
		<img id='image' src='' alt='' width='140' height='120' />
                 </td>
		    
		</tr>
		<tr>
		   <td></td><td><input id='send_snap' type='submit' value='Envoyer'/></td>
		   </tr>
		
		</table>
		</form>
		
		
            ";
                }
            } else {
				$query_visiteur = $this->visiteManager->liste_visite_info(array('VISIT_ID' => 1));
				foreach ($query_visiteur as $loop) {
					 if($loop->VISIT_SORTIE==0){
                     $btn="btn-danger"; 
					 
                    }  else {
                    $btn="btn-success";  
                    }
					$apercu = "
         <head>
        <title>Profil</title>
        
        <link rel='stylesheet' type='text/css' media='screen' href='" . css_url('form') . "' />
        <link rel='stylesheet' type='text/css' media='screen' href='" . css_url('bootstrap') . "' />
       <link rel='stylesheet' type='text/css' media='screen' href='" . css_url('datepicker3') . "' />
         <link rel='stylesheet' type='text/css' media='screen' href='" . css_url('style') . "' />
          <link rel='stylesheet' type='text/css' media='screen' href='" . css_url('pnotify.custom.min') . "' />
          <link rel='stylesheet' type='text/css' media='screen' href='" . css_url('fileinput') . "' />
         
		 <style>
           
			.contenu{
				background-color:#B4AF91;
				height:250px;
				width:380px;
			}

			h3{
				color: #FFF;
				font-family: 'Comic Sans MS', sans-serif;
			}

			#video, #image{
				border: 2px solid #FFF;
			}

			#snap,#snap_black_white,#send_snap,#snap_inverse{
				background-color: #ccc;
				color: maroon;
				font-weight: bolder;
				padding: 10px;
				border: none;
				cursor: pointer;
				border-radius: 5px;
			}

		</style>
          
        
        <script src='" . js_url('jquery-1.8.3.min') . "'></script>
          
       
        <script src='" . js_url('bootstrap') . "'></script>
        <script src='" . js_url('jquery-1.11.0.min') . "'></script>
         <script src='" . js_url('fileinput') . "'></script>
         <script>

			$(document).ready(function(){

				function hasGetUserMedia() {
				  return !!(navigator.getUserMedia || navigator.webkitGetUserMedia ||
				            navigator.mozGetUserMedia || navigator.msGetUserMedia);
				}

				if (hasGetUserMedia()) {
				  var canvas = document.getElementById('canvas'),
					context = canvas.getContext('2d'),
					video = document.getElementById('video'),
					videoParams = { 'video': true },
					errorCallback = function(error) {
						console.log('Erreur Capture Video: ', error.code); 
					};

					if(navigator.getUserMedia) { //Standard
						navigator.getUserMedia(videoParams, function(stream) {
							video.src = stream;
							video.play();
						}, errorCallback);
					} else if(navigator.webkitGetUserMedia) { //Webkit
						navigator.webkitGetUserMedia(videoParams, function(stream){
							video.src = window.webkitURL.createObjectURL(stream);
							video.play();
						}, errorCallback);
					} else if(navigator.mozGetUserMedia) { //Mozilla
						navigator.mozGetUserMedia(videoParams, function(stream){
							video.src = window.URL.createObjectURL(stream);
							video.play();
						}, errorCallback);
					} else if(navigator.msGetUserMedia) { //IE
						navigator.msGetUserMedia(videoParams, function(stream){
							video.src = window.URL.createObjectURL(stream);
							video.play();
						}, errorCallback);
					}

					$('#snap').click(function() {
						context.drawImage(video, 0, 0, 140, 120);
						$('#image').attr('src', canvas.toDataURL());
					});


					$('#send_snap').click(function() {
						if($('#image').attr('src') != ''){
							var dataURL = canvas.toDataURL('image/png');
							var elt = document.getElementById('element').value;
							 $.ajax({
								type: 'post',
								url:  '" . site_url('visiteur/envoi_image') . "',
								
								data: {'img_data' : dataURL},
								
								
								success: function(data){
										alert('Enregistrement reusi');
										window.close();
								}
							}); 
						} else {
							alert('Il vous faut premièrement prendre une photo SVP !');
						}
					});

				} else {
				  alert('getUserMedia() n est pas supporté par votre navigateur !');
				}
			});

		</script>
		
		
    </head>
    <body>
                    <div class='contenu'>
       <center><h3>Prendre la photo</h3></center>
	
	   <from method='post' action='" . site_url('visiteur/envoi_image') . "'>
	    <center> <p id='nom'>Nom et Prenom:<b>$loop->VISIT_NOM $loop->VISIT_PRENOM </b></p></center>
		<input type='hidden' name='nom' id='element' value='$loop->VISIT_ID'/>
		
	   <table>
	       <tr>
				<td>
		<video id='video' width='140' height='120' autoplay></video>
		   </td>
		    <td>
		<button id='snap'>prendre</button>
		</td>
		   <td>
		<canvas id='canvas' width='140' height='120' style='display:none;'></canvas>
		</td>
		    <td>
		<img id='image' src='' alt='' width='140' height='120' />
                 </td>
		    
		</tr>
		<tr>
		   <td></td><td><input id='send_snap' type='submit' value='Envoyer'/></td>
		   </tr>
		
		</table>
		</form>
		
		
            ";
				}
               
            }
        }
        echo $apercu;
    }

	
	
	function  get_option_direction(){
		 $guerite = $this->session->userdata('gue_id');
    $options=  array();
    $options['Tous']="--Choisir une direction--";
    $options[1]="service non defini";
    $services = $this->userManager->get_guerite_service(array('ID_GUE' => $guerite));
        if (is_array($services) && count($services)) {
            foreach ($services as $loop) {
                $options[$loop->ID_DIRECTION]=$loop->DIRECTION;
            }
        }
        return $options;
}
	
	 function ajout_info($id='') {
        if ($id == '') {
            $apercu = null;
            return NULL;
        } else {

            
		    $service= $this->userManager->get_guerite_service();
            $_SESSION['id_visite'] = $id;

            $query_visiteur = $this->visiteManager->liste_visite_info(array('VISIT_ID' => $id));
            if (is_array($query_visiteur) && count($query_visiteur) > 0) {
                foreach ($query_visiteur as $loop) {
                   
					     
                    $apercu = "
         <head>
        <title>Profil</title>
        
        <link rel='stylesheet' type='text/css' media='screen' href='" . css_url('form') . "' />
        <link rel='stylesheet' type='text/css' media='screen' href='" . css_url('bootstrap') . "' />
       <link rel='stylesheet' type='text/css' media='screen' href='" . css_url('datepicker3') . "' />
         <link rel='stylesheet' type='text/css' media='screen' href='" . css_url('style') . "' />
          <link rel='stylesheet' type='text/css' media='screen' href='" . css_url('pnotify.custom.min') . "' />
          <link rel='stylesheet' type='text/css' media='screen' href='" . css_url('fileinput') . "' />
         
		
          
        
        <script src='" . js_url('jquery-1.8.3.min') . "'></script>
          
       
        <script src='" . js_url('bootstrap') . "'></script>
        <script src='" . js_url('jquery-1.11.0.min') . "'></script>
         <script src='" . js_url('fileinput') . "'></script>
         <script>

			$(document).ready(function(){


					$('#send_snap').click(function() {
						
							 $.ajax({
								type: 'post',
								url:  '" . site_url('visiteur/info_plus') . "',
								
								data: {'img_data' : dataURL},
								
								
								success: function(data){
										alert('Enregistrement reusi');
										window.close();
								}
							}); 
						
					});

				
			});

		</script>
    </head>
    <body>
                   
	<div class='input-group '>
	   <from method='post' action='" . site_url('visiteur/info_plus') . "'  role='form' id='form'>
	   
		<div class='title-form btn-primary'>
                            <h3  align='center'>Information suplementaire </h3>
							
							
			</div>
                                       <div class='input-group '>
                            <span class='input-group-addon'>Nom et Prenom </span>  
  <input type='hidden' class='form-control' name='id_visite' id='element' value='$loop->VISIT_ID'readonly/>							
		<input type='text' class='form-control' name='nom' id='element' value='$loop->VISIT_NOM $loop->VISIT_PRENOM'readonly/>
		</div>
		
		<div class='input-group'>  <span class='input-group-addon'>direction  *</span>
				  
                                         <select class='form-control' name='direction'  id='select' required >
                                 if($service){
						  foreach ($service as $loops) {
                                             <option  value='$loops->ID_DIRECTION'> $loops->DIRECTION  </option>
											  }
											}else{
					
					
				}
                                        </select> 
                                   </div>
	   <div class='input-group '>
                            <span class='input-group-addon'>Telephone </span>
                           <input type='tel' class='form-control' name='telephone' />
                        </div>
                       
                    <div class='input-group'>
                           
                            <span class='input-group-addon'>Motif </span>
                             <input type='text' class='form-control' name='observation' />   

                        </div>
                           <p align=center>
                            <input class='btn btn-ms btn-primary btn-block' type='submit' value='Enregistrer' id='send_snap'/>

                        </p>
		</form>
		</div>
		
            </body>";
						
                
				}
            } else {
                $apercu = " <script> alert('Veuillez cliquer d abord sur info plus!!') ";
            }
        }
        echo $apercu;
    }

          function profiles($value) {
        $selects=array();
        
        if(is_array($value)){
         $selects=$value;   
        }elseif (is_numeric($value)) {
         $selects[0]=$value;   
        }  else {
         return NULL;   
        }
       
$entete = " ";  ?>
    <div class="btn-group" style="position: fixed;">
    <button  class="btn btn-file btn-lg" onclick="print();" title="Imprimer"><span class="glyphicon glyphicon-print" > Imprimer</span></button>
  </div>

<script language="javascript">     
function print() 
{ var zone = document.getElementById("imprim"); 
var f = window.open( "", "", "toolbar=0,menubar=0,scrollbars=1,resizable=0,status=0,location=0,left=10,top=10" );
f.document.write('<html><body onload="window.print();window.close();"><br>\n\
'+zone.innerHTML+'</body></html>'); 
f.document.close(); 
return; }
</script>    
     
       <?php 
       
       $entete.="<br>  
         <br>
         <br>
        <div id='imprim' height=100% style='border:1px;'>   "; 
       
      
       
      $content=NULL;
     for($i=0;$i<count($selects);$i++){
   $query_visiteur = $this->visiteManager->liste_visite_info(array('VISIT_ID' => $value));
            if (is_array($query_visiteur) && count($query_visiteur) > 0) {
            foreach ($query_visiteur as $loop) {
             $content.="<div  class='badge '>
        <div class=modal-content>
        <div class='apercu-header  blue '>
            <a href='" . site_url("visiteur/liste") . "' title='fermé' type=button class=close data-dismiss=modal aria-hidden=true></a>
           
        </div>
 <div class='modal-body'  >
            <table class=table border=0  width=500 height=100 style='padding: 3px; line-height: 1.42857143; vertical-align: top; der-top: 1px solid #ddd;font-size: 12px;  '><tr style='outline: thin  #dcdcdc; color:#00F;' ><td colspan=3  align=center>MINISTERE DE LA SECURITE SECTION OFFICE NATIONALE D'IDENTIFICATION(ONI)</td></tr>
<tr  style='outline: thin  #dcdcdc; color:#00F;'><td  colspan=3  align=center>GUERITE DE L'AN ".  date("Y")."</td></tr>
              <tr width='80%' style='outline: thin solid  #dcdcdc;' > 
                  <td rowspan=4><img style='padding: 5px;' class=img-thumbnail width=100 src='" . image_url($loop->PHOTO_VISIT) . "'   onerror=this.src='" . image_url($loop->PHOTO_VISIT.".png") . "'></td> 
<td colspan=2><h3 class='modal-title' style='color:#00F;'  >  </h3></td>              
</tr> 
              <tr style='outline: thin  #dcdcdc;' >           
                <td></td>
                
                                        <td></td> 

</tr>   
               <tr  style='outline: thin  #dcdcdc;'>           
                
                <td>

</td>
</tr>   
 
              
                <tr style='outline: thin  #dcdcdc;'> 
                 <td>
</td>
                  

                  
                   </tr>  



				   
               <tr style='outline: thin solid #dcdcdc;'> 
                <td>CNIB Numéro:
</td>
                <td colspan=2 style='outline: thin solid #dcdcdc;'> <b>$loop->VISIT_NUMERO</b>
</td>
                  
                 
              </tr> 
              
             
<tr style='outline: thin solid #dcdcdc;'> 
                <td>NOM:
</td>
                <td colspan=2 style='outline: thin solid #dcdcdc;'> <b>$loop->VISIT_NOM</b>
</td>
                  
                 
              </tr> 
<tr style='outline: thin solid #dcdcdc;'> 
                <td>PRENOM:
</td>
                <td colspan=2 style='outline: thin solid #dcdcdc;'> <b>$loop->VISIT_PRENOM</b>
</td>
                  
                 
              </tr> 
<tr style='outline: thin solid #dcdcdc;'> 
                <td>DATE Naissance:
</td>
                <td colspan=2 style='outline: thin solid #dcdcdc;'> <b>$loop->VISIT_NAISSANCE</b>
</td>
                  
                 
              </tr> 			  
                   
<tr style='outline: thin solid #dcdcdc;'> 
                <td>SEXE:
</td>
                <td colspan=2 style='outline: thin solid #dcdcdc;'> <b>$loop->VISIT_SEXE</b>
</td>
                  
                 
              </tr> 
		<tr style='outline: thin solid #dcdcdc;'> 
                <td>PAYS OU Nationalité:
</td>
                <td colspan=2 style='outline: thin solid #dcdcdc;'> <b>$loop->VISIT_PAYS</b>
</td>
                  
                 
              </tr> 		   
				   
		<tr style='outline: thin solid #dcdcdc;'> 
                <td>DATE d'expiration:
</td>
                <td colspan=2 style='outline: thin solid #dcdcdc;'> <b>$loop->VISIT_EXPIRE</b>
</td>
                  
                 
              </tr> 

<tr style='outline: thin solid #dcdcdc;'> 
                <td>SERVICE ou Direction:
</td>
                <td colspan=2 style='outline: thin solid #dcdcdc;'> <b>$loop->DIRECTION</b>
</td>
                  
                 
              </tr> 

<tr style='outline: thin solid #dcdcdc;'> 
                <td>DATE ENTRE:
</td>
                <td colspan=2 style='outline: thin solid #dcdcdc;'> <b>$loop->VISIT_ENTRE</b>
</td>
                  
                 
              </tr> 
		<tr style='outline: thin solid #dcdcdc;'> 
                <td>DATE SORTIE:
</td>
                <td colspan=2 style='outline: thin solid #dcdcdc;'> <b>$loop->VISIT_SORTIE</b>
</td>
                  
                 
              </tr> 	  
</table>
        </div>
        
        
        </div>
    </div> ";   
            }}      
     }
     
       $footer="           
    </div> 
     </body> 
      </html> ";
       
         
        echo $entete.$content.$footer;
    }

           
                  
     
      
    
                
//            } else {
//                $apercu = " <br>
//        <div class='modal-dialog'>
//        <div class='modal-content '>
//        <div class='apercu-header red '>
//            <a href='index.php' title='fermé' type=button class=close data-dismiss=modal aria-hidden=true>&times;</a>
//            <h4 class='modal-title ' align=center>Element introuvable
//                </h4>
//        </div><div class=modal-body>
//            <table class=table ><thead><tr><th></th></tr></thead><tbody>
//         <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
//         <br><br><br><br><br><br>
//                    
//                </tbody></table>
//        </div>
//        
//        
//        </div>
//    </div> 
//     </body> 
//      </html> ";
//            }
       
    
           
    
}
