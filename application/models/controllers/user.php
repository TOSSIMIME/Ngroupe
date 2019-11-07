<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        //chargement des ressource du constructeur
        $this->load->helper(array('url', 'assets'));
        $this->load->helper('fn_info');
        $this->load->library('form_validation');
        $this->load->library('session');

        //chargement modele
        $this->load->model('user_modele', 'userManager');
       // $this->load->model('guerite_modele', 'gueriteManager');
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->library('table');

    }


    public function index()
    {
        $type = $this->session->userdata('type');
        if ($type == 0 || $type == 2) {
            $data['info'] = $this->session->flashdata('info');
            $data['menu_top'] = "template/menu_top";
            $data['main_content'] = "user_vue";
            $data['tableau'] = $this->get_tableau();
            //$data['options'] = $this->get_option_guerite();
            $this->load->view('template/template', $data);
        }
    }
    public function new_user()
    {
		$data['info'] = $this->session->flashdata('info');
        $type = $this->session->userdata('type');
        $id = $this->session->userdata('id');
        if ($type==0 || $type == 2) {
			  $data['liste_user'] = $this->userManager->liste_user(array('USER_DEL' => 0,'AG_USER'=>$id));
        $data['menu_top']="template/menu_top";
        $data['main_content'] = "user_vue";
        $this->form_validation->set_rules('noms', '"Nom"', 'trim|required|min_length[2]|max_length[52]|encode_php_tags');
        $this->form_validation->set_rules( 'prenom',"Prénom", 'trim|required|min_length[2]|max_length[50]|encode_php_tags');
        $this->form_validation->set_rules( 'phone',"Telephone", 'trim|required|min_length[5]|max_length[50]|encode_php_tags');
        if ($this->form_validation->run()) {
            $isInsert = FALSE;
            //recuperation valeur
            $noms = $this->input->post('noms');
            $prenom = $this->input->post('prenom');
			  $phone =$this->input->post('phone');
            $email = $this->input->post('email');
            $login =$this->input->post('login');
            $passe= $this->input->post('passe');
			$type= $this->input->post('type');
			$id_ag= $this->input->post('id_ag');
			$etat= $this->input->post('etat');
			$passe=  md5($passe);
            $isInsert = $this->userManager->ajouter_user($noms, $prenom, 
            $phone, $email,$login,$passe,$type,$id_ag,$etat);

            if ($isInsert) {
                $info = ajout_succes_info("Nouveau utilisateur ajouté avec success");
                $this->session->set_flashdata('info', $info);

                redirect('User');
            } else {
                $info = ajout_fail_info('Veuillez verifier vos information et réessayez');
                $this->session->set_flashdata('info', $info);
            }
        }
        $data['info'] = "";
       $data['tableau'] = $this->get_tableau();
        $this->load->view('template/template', $data);
    }
    }

	
	 public function new_facilitateur()
    {
        $type = $this->session->userdata('type');
		$data['info'] = $this->session->flashdata('info');
        if ($type == 2 || $type == 3) {
            $data['menu_top'] = "template/menu_top";
            $data['main_content'] = "Vue_facilitaire";
            $this->form_validation->set_rules('noms', '"Nom"', 'trim|required|min_length[2]|max_length[52]|encode_php_tags');
            $this->form_validation->set_rules('prenom', "Prénom", 'trim|required|min_length[2]|max_length[50]|encode_php_tags');
            $this->form_validation->set_rules('date_naiss', "Date naissance", 'trim|required|min_length[2]|max_length[50]|encode_php_tags');
            $this->form_validation->set_rules('residence', "Residence", 'trim|required|min_length[2]|max_length[50]|encode_php_tags');
            $this->form_validation->set_rules('phone', "Télephone", 'trim|required|min_length[8]|max_length[8]|is_numeric|encode_php_tags');
            if ($this->form_validation->run()) {
                $isInsert = FALSE;
                //recuperation valeur
                $noms = $this->input->post('noms');
                $prenom = $this->input->post('prenom');
                $date_naiss = $this->input->post('date_naiss');
                $residence = $this->input->post('residence');
                $email = $this->input->post('email');
                $active = $this->input->post('etat');
                $phone = $this->input->post('phone');
                $photo_facilite = $this->input->post('photo_facilite');
                $id_ag = $this->input->post('id_ag');
                 

                $isInsert = $this->userManager->ajouter_facilite($noms, $prenom,$date_naiss,$email,
                    $phone,  $residence, $photo_facilite, $active, $id_ag);

                if ($isInsert) {
                    $info = ajout_succes_info("Nouveau facilitateur");
                    $this->session->set_flashdata('info', $info);

                    redirect('user/new_facilitateur');
                } else {
                    $info = ajout_fail_info('Veuillez verifier vos information et réessayez');
                    $this->session->set_flashdata('info', $info);
                }
            }
            $data['info'] = "";
            $data['tableau'] = $this->get_facilitateur();
            $this->load->view('template/template', $data);
        }
    }
 public function liste($id = '') {
        $data['info'] = $this->session->flashdata('info');
        $data['menu_top'] = "template/menu_top";
        $data['main_content'] = "user_liste";
        $data['tableau'] = $this->get_tableau();
        $this->load->view('template/template', $data);
    }
	 public function liste_facilite($id = '') {
        $data['info'] = $this->session->flashdata('info');
        $data['menu_top'] = "template/menu_top";
        $data['main_content'] = "user_liste";
        $data['tableau'] = $this->get_facilitateur();
        $this->load->view('template/template', $data);
    }
    public function delete($id)
    {
        $type = $this->session->userdata('type');
        if ($type == 0 || $type == 1 || $type == 2) {
            $result = $this->userManager->disable_visite($id);
            if ($result) {
                $info = suppression_succes_info('Element Supprimé avec Succès');
                $this->session->set_flashdata('info', $info);
            } else {
                $info = suppression_fail_info('Echec Suppression Element');
                $this->session->set_flashdata('info', $info);
            }
            redirect('user');
        }
    }

    public function update($id = '')
    {
       // $data['options'] = $this->get_option_guerite();
        $type = $this->session->userdata('type');
        if ($type == 0 || $type == 2) {
            $data['menu_top'] = "template/menu_top";
            $data['main_content'] = "user_edit_vue";


            if ($id != '' && $id > 0) {
                $query = $this->userManager->get_user(array('USER_ID' => $id));
                if ($query) {
                    $data['user_edit'] = $query;
                }
            } elseif ($this->input->post('id')) {
                $id = $this->input->post('id');

                $this->form_validation->set_rules('noms', '"Nom"', 'trim|required|min_length[2]|max_length[52]|encode_php_tags');
                $this->form_validation->set_rules('prenom', "Prénom", 'trim|required|min_length[2]|max_length[50]|encode_php_tags');
                $this->form_validation->set_rules('phone', "Télephone", 'trim|required|min_length[8]|max_length[8]|is_numeric|encode_php_tags');
                $this->form_validation->set_rules('email', "Email", 'trim|required|min_length[5]|max_length[50]|encode_php_tags');
                $this->form_validation->set_rules('login', "Pseudo", 'trim|required|min_length[2]|max_length[50]|encode_php_tags');
                $this->form_validation->set_rules('passe', "Mot de Passe", 'trim|required|min_length[4]|max_length[50]|encode_php_tags');
                $this->form_validation->set_rules('type', "Type", 'trim|required|min_length[1]|max_length[1]|encode_php_tags');
                $this->form_validation->set_rules('etat', "Etat", 'trim|required|min_length[1]|max_length[1]|encode_php_tags');
                $this->form_validation->set_rules('id_ag', "Agence", 'trim|is_numeric|encode_php_tags');


                if ($this->form_validation->run()) {

                    $isInsert = FALSE;

                    //recuperation valeur

                    $nom = $this->input->post('noms');
                    $prenom = $this->input->post('prenom');
                    $mail = $this->input->post('email');
                    $login = $this->input->post('login');
                    $passe = $this->input->post('passe');
                    $active = $this->input->post('etat');
                    $type = $this->input->post('type');
                    $phone = $this->input->post('phone');
                    $id_ag = $this->input->post('id_ag');
                    //$id = $this->input->post('id');
                    $mdp=md5($passe); 

                    $isInsert = $this->userManager->update_user($id, $nom, $prenom, $phone, $mail, $login, $mdp, $type, $active, $id_ag);
                    if ($isInsert) {
                        $info = ajout_succes_info("Mise à jour Avec success");
                        $this->session->set_flashdata('info', $info);

                        redirect('user');
                    } else {
                        $info = ajout_fail_info('Veuillez verifier vos information et réessayez');
                        $this->session->set_flashdata('info', $info);
                    }
                } else {
                    $this->update($id);
                }
            } elseif ($id == "") {
				
                redirect('user');
            }

            $data['info'] ="";
            $data['tableau'] = $this->get_tableau();
            $this->load->view('template/template', $data);
        }
    }
 function get_facilitateur()
    {
        $type = $this->session->userdata('type');
        $id = $this->session->userdata('id');
        $id_ag = $this->session->userdata('id_ag');
        if ($type == 0 || $type==2) {

            if($type==0){
                $query_user = $this->userManager->liste_facilitateur(array('DELETE_FACILITE' => 0));
				 $template = array('table_open' => '<table id="tab" class="  table table-hover table-striped table-bordered" border=1>');
            $this->table->set_heading(array('Nom', "Prénom", 'Telephone', 'Pseudo', 'Agence', 'Type', 'Dernière connexion', array('data'=>'Actions','colspan'=>2)));
if (is_array($query_user) && count($query_user)) {
                $role = "";

                foreach ($query_user as $loop) {
                    if ($loop->USER_TYPE == 2) {
                        $role = 'Administrateur';
					}else{
						$role = "Consultant";
					}
                    $this->table->add_row(array($loop->USER_NOM, $loop->USER_PRENOM, $loop->USER_PHONE,
                        $loop->USER_LOGIN,$loop->NOM_AG, $role, $loop->USER_CONNECT,

                        '<a href="' . site_url("user/update/$loop->USER_ID") . '" ><span class="glyphicon glyphicon-edit"></span> </a>',
                        '<a href="' . site_url("user/delete/$loop->USER_ID") . '" data-href=""  data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span></a>'));
                }
            }
            }else{
                $query_user = $this->userManager->liste_facilitateur(array('DELETE_FACILITE' => 0,'AG_FACILITE'=>$id_ag));
				 $template = array('table_open' => '<table id="tab" class="  table table-hover table-striped table-bordered" border=1>');
            $this->table->set_heading(array('NOM', "PRENOM", 'NAISSANCE',   'TELEPHONE', 'RESIDENCE', 'STATUT','('.'Pelerin'.')','Edite','Supp'));
if (is_array($query_user) && count($query_user)) {
                $role = "";
				$nb=0;

                foreach ($query_user as $loop) {
                    if ($loop->STATUT_FACILITE == 0) {
                        $role = 'Encadreur';
					}else{
						$role = "Demarcheur";
					}
                    $this->table->add_row(array($loop->NOM_FACILITE, $loop->PRENOM_FACILITE, $loop->NAISS_FACILITE,
                        $loop->PHONE_FACILITE,  $loop->RESID_FACILITE,$role,$nb,

                        '<a href="' . site_url("user/update/$loop->ID_FACILITE") . '" ><span class="glyphicon glyphicon-edit"></span> </a>',
                        '<a href="' . site_url("user/delete/$loop->ID_FACILITE") . '" data-href="' . site_url("user/delete/$loop->ID_FACILITE") . '"  data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span></a>'));
                }
            }
            }
           

            

            $this->table->set_template($template);
            return $this->table->generate();
        }
    }

    function get_tableau()
    {
        $type = $this->session->userdata('type');
        $id = $this->session->userdata('id');
        $id_ag = $this->session->userdata('id_ag');
        if ($type == 0 || $type==2) {

            if($type==0){
                $query_user = $this->userManager->liste_user(array('USER_DEL' => 0));
				 $template = array('table_open' => '<table id="tab" class="  table table-hover table-striped table-bordered" border=1>');
            $this->table->set_heading(array('Nom', "Prénom", 'Telephone', 'Pseudo', 'Agence', 'Type', 'Dernière connexion', array('data'=>'Actions','colspan'=>2)));
if (is_array($query_user) && count($query_user)) {
                $role = "";

                foreach ($query_user as $loop) {
                    if ($loop->USER_TYPE == 2) {
                        $role = 'Administrateur';
                    } elseif ($loop->USER_TYPE == 3) {
                        $role = "Utilisateur";
                    }elseif($loop->USER_TYPE == 4){
						$role = "Agent";
					}else{
						$role = "Consultant";
					}
                    $this->table->add_row(array($loop->USER_NOM, $loop->USER_PRENOM, $loop->USER_PHONE,
                        $loop->USER_LOGIN,$loop->NOM_AG, $role, $loop->USER_CONNECT,

                        '<a href="' . site_url("user/update/$loop->USER_ID") . '" ><span class="glyphicon glyphicon-edit"></span> </a>',
                        '<a href="' . site_url("user/delete/$loop->USER_ID") . '" data-href=""  data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span></a>'));
                }
            }
            }else{
                $query_user = $this->userManager->liste_user(array('USER_DEL' => 0,'AG_USER'=>$id_ag));
				 $template = array('table_open' => '<table id="tab" class="  table table-hover table-striped table-bordered" border=1>');
            $this->table->set_heading(array('Nom', "Prénom", 'Telephone', 'Pseudo',  'Type', 'Dernière connexion', array('data'=>'Actions','colspan'=>2)));
if (is_array($query_user) && count($query_user)) {
                $role = "";

                foreach ($query_user as $loop) {
                    if ($loop->USER_TYPE == 2) {
                        $role = 'Administrateur';
                    } elseif ($loop->USER_TYPE == 3) {
                        $role = "Utilisateur";
                    }elseif($loop->USER_TYPE == 4){
						$role = "Agent";
					}else{
						$role = "Consultant";
					}
                    $this->table->add_row(array($loop->USER_NOM, $loop->USER_PRENOM, $loop->USER_PHONE,
                        $loop->USER_LOGIN, $role, $loop->USER_CONNECT,

                        '<a href="' . site_url("user/update/$loop->USER_ID") . '" ><span class="glyphicon glyphicon-edit"></span> </a>',
                        '<a href="' . site_url("user/delete/$loop->USER_ID") . '" data-href="' . site_url("user/delete/$loop->USER_ID") . '"  data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span></a>'));
                }
            }
            }
           

            

            $this->table->set_template($template);
            return $this->table->generate();
        }
    }


    function  get_option_guerite()
    {
        $options = array();
        $type = $this->session->userdata('type');
        $id = $this->session->userdata('id');
        if ($type == 0) {
            $options[0] = "--Choisir Guerite--";
            $query_guerite = $this->gueriteManager->get_guerite();
        } elseif ($type == 1) {
            $query_guerite = $this->gueriteManager->get_guerite(array('GUE_ID' => $id));
        }

        if (is_array($query_guerite) && count($query_guerite)) {
            foreach ($query_guerite as $loop) {
                $options[$loop->GUE_ID] = $loop->GUE_NOM;
            }
        }
        return $options;
    }

}

