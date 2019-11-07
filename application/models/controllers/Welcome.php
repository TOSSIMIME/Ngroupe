<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
public function __construct() {
        parent::__construct();
        //chargement des ressource du constructeur
        $this->load->helper(array('url', 'assets'));
        $this->load->model('user_modele', 'userManager');
       $this->load->model('Agence_modele', 'adminManager');
       $this->load->model('Pelerin_modele', 'pelerinManager');
        $this->load->helper('fn_info');
        $this->load->helper('fn_info_helper');
		
    }
	public function index()
	{
		$data['info'] = "";
			$data['nb_agence'] =$this->adminManager->count_agence();
			$data['nb_pelerin'] =$this->pelerinManager->count_pelerin();
			$data['quota'] =$this->adminManager->liste_quotas(array('DELETE_QUOTA'=>0));
			$data['vols'] =$this->adminManager->count_vols(array('DELETE_VOLS'=>0));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('pseudo', '"Nom d\'utilisateur"', 'trim|required|min_length[2]|max_length[52]|alpha_dash|encode_php_tags');
        $this->form_validation->set_rules('mdp', '"Mot de passe"', 'trim|required|min_length[4]|max_length[52]|encode_php_tags');
        if ($this->form_validation->run()) {
            $pseudo = $this->input->post('pseudo');
            $password = $this->input->post('mdp');
         $passwords=  md5($password);
		 $userdata = $this->userManager->get_user_info(array('USER_LOGIN' => $pseudo, 'USER_MDP' => $passwords));
            if (count($userdata) !=6) {
				  $agencedata = $this->adminManager->get_agence_info(array('LOGIN_AG' => $pseudo, 'MDP_AG' => $passwords));
				   if (count($agencedata) != 4) {

                    $info = echec_connexion('Veuillez verifier vos information et réessayez');
                    $this->session->set_flashdata('info', $info);
                    $data['info'] = $info;
                    $this->load->view("template/menu_top_header");
                    $this->load->view("Index", $data);
                   $this->load->view("template/menu_footer");
                } else {
                    $this->session->set_userdata('login', $pseudo);
                    $this->session->set_userdata('id', $agencedata['id']);
                    $this->session->set_userdata('ag_user', $agencedata['ag_user']);
                    $this->session->set_userdata('nom', $agencedata['nom']);
                    $this->session->set_userdata('type', 1);
                    $this->adminManager->connect_agence($agencedata['id']);
                    redirect('Agence');
                }
                   
            }else {
                $this->session->set_userdata('pseudo', $pseudo);
                $this->session->set_userdata('id', $userdata['id']);
                $this->session->set_userdata('id_ag', $userdata['id_ag']);
                $this->session->set_userdata('nom', $userdata['nom']);
                $this->session->set_userdata('type', $userdata['type']);
				$this->session->set_userdata('agence', $userdata['agence']);
                $this->userManager->connect_user($userdata['id']);
                redirect('Admin');
        } 
        } else {
		$this->load->view("template/menu_top_header");
            $this->load->view("Index", $data);
            $this->load->view("template/menu_footer");
			}
	}
	
	public function accounte(){
		$data['info'] = "";
	                $this->load->view("template/menu_top_header");
                    $this->load->view("New_user", $data);
                   $this->load->view("template/menu_footer");
	}
	public function deconnexion(){
		$this->session->sess_destroy();
		redirect();
	}
}
