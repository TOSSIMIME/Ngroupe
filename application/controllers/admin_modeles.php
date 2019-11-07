<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Visite extends CI_Controller {

    public function __construct() {
        parent::__construct();

        //chargement des ressource du constructeur
        $this->load->helper(array('url', 'assets'));
        $this->load->helper('fn_info');
        $this->load->library('form_validation');
        $this->load->library('session');
        
        //chargement modele
        $this->load->model('guerite_modele', 'gueriteManager');
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->library('table');

    }
   

    public function index() {
          $type = $this->session->userdata('etat');
        if ($type==0) {
        $data['info'] = $this->session->flashdata('info');
        $data['menu_top']="themes/menu_top";
        $data['main_content'] = "guerite_vue";
        $data['tableau'] = $this->get_tableau();
        $this->load->view('themes/template', $data);
        
      }elseif ($type==2) {
        $data['menu_top']="themes/menu_top";
        $data['main_content'] = "guerite_liste";
        $data['tableau'] = $this->get_tableau();
        $this->load->view('themes/template', $data);
        }}

    public function new_guerite() {
          $type = $this->session->userdata('user_type');
        if ($type==0) {
        $data['menu_top']="themes/menu_top";
        $data['main_content'] = "guerite_vue";
      
        $this->form_validation->set_rules('nom', '"Nom"', 'trim|required|min_length[2]|max_length[52]|encode_php_tags');
        $this->form_validation->set_rules( 'phone',"Télephone", 'trim|required|min_length[2]|max_length[50]|encode_php_tags');
        $this->form_validation->set_rules( 'email',"Email", 'trim|required|min_length[5]|max_length[50]|encode_php_tags');
         $this->form_validation->set_rules( 'adresse',"Adresse", 'trim|encode_php_tags');
        $this->form_validation->set_rules( 'pseudo',"Pseudo", 'trim|required|min_length[3]|max_length[50]|encode_php_tags');
        $this->form_validation->set_rules( 'pass',"Mot de Passe", 'trim|required|min_length[4]|max_length[50]|encode_php_tags');
        $this->form_validation->set_rules( 'quota',"Quota", 'trim|required|min_length[1]|max_length[5]|is_numeric|encode_php_tags');

        if ($this->form_validation->run()) {
            $isInsert = FALSE;
            //recuperation valeur
            $nom = $this->input->post('nom');
            $phone = $this->input->post('phone');
            $email = $this->input->post('email');
            $pseudo =$this->input->post('pseudo');
            $pass= $this->input->post('pass');
            $adresse= $this->input->post('adresse');
            $quota= $this->input->post('quota');

            $isInsert = $this->gueriteManager->ajouter_guerite($nom, 
            $phone ,$email,$adresse,$pseudo ,$pass,$quota);

            if ($isInsert) {
                $info = ajout_succes_info("Nouveau Administrateur");
                $this->session->set_flashdata('info', $info);

                redirect('guerite');
            } else {
                $info = ajout_fail_info('Veuillez verifier vos information et réessayez');
                $this->session->set_flashdata('info', $info);
            }
        }
        $data['info'] = "";
       $data['tableau'] = $this->get_tableau();
        $this->load->view('themes/template', $data);
    }}

    public function delete($id) {
          $type = $this->session->userdata('user_type');
        if ($type==0) {
        $result = $this->gueriteManager->delete_guerite($id);
        if ($result) {
            $info = suppression_succes_info('Element Supprimé avec Succès');
            $this->session->set_flashdata('info', $info);
        } else {
            $info = suppression_fail_info('Echec Suppression Element');
            $this->session->set_flashdata('info', $info);
        }
        redirect('guerite');
    }
    
    
    }

    public function update($id = '') {
          $type = $this->session->userdata('user_type');
        if ($type==0) {
        $data['menu_top']="themes/menu_top";
        $data['main_content'] = "guerite_edit_vue";



        if ($id != '' && $id > 0) {
            $query = $this->gueriteManager->get_guerite(array('id_ag' => $id));
            if ($query) {
                $data['guerite_edit'] = $query;
            }
        } elseif ($this->input->post('id')) {
            $id = $this->input->post('id');
       $this->form_validation->set_rules('nom', '"Nom"', 'trim|required|min_length[2]|max_length[52]|encode_php_tags');
        $this->form_validation->set_rules( 'phone',"Télephone", 'trim|required|min_length[2]|max_length[50]|encode_php_tags');
        $this->form_validation->set_rules( 'email',"Email", 'trim|required|min_length[5]|max_length[50]|encode_php_tags');
         $this->form_validation->set_rules( 'adresse',"Adresse", 'trim|encode_php_tags');
        $this->form_validation->set_rules( 'pseudo',"Pseudo", 'trim|required|min_length[3]|max_length[50]|encode_php_tags');
        $this->form_validation->set_rules( 'pass',"Mot de Passe", 'trim|required|min_length[4]|max_length[50]|encode_php_tags');
        $this->form_validation->set_rules( 'quota',"Quota", 'trim|required|min_length[1]|max_length[5]|is_numeric|encode_php_tags');

            if ($this->form_validation->run()) {

                $isInsert = FALSE;

                //recuperation valeur
          
           $nom = $this->input->post('nom');
            $phone = $this->input->post('phone');
            $email = $this->input->post('email');
            $pseudo =$this->input->post('pseudo');
            $pass= $this->input->post('pass');
            $adresse= $this->input->post('adresse');
            $quota= $this->input->post('quota');

                
                  $isInsert = $this->gueriteManager->update_guerite($id ,$nom, 
            $phone ,$email,$adresse,$pseudo ,$pass,$quota);
                if ($isInsert) {
                    $info = ajout_succes_info("Mise à jour Ajouté");
                    $this->session->set_flashdata('info', $info);

                    redirect('guerite');
                   }else{
                    $info = ajout_fail_info('Veuillez verifier vos information et réessayez');
                    $this->session->set_flashdata('info', $info);
                         }
            } else {
                $this->update($id);
            }
        } elseif ($id == "") {
            redirect('guerite');
        }

        $data['info'] = "";
        $data['tableau'] = $this->get_tableau();

        $this->load->view('themes/template', $data);
    }}

    
    
function get_tableau() {
   $type = $this->session->userdata('user_type');
        if ($type==0) {   
$template = array('table_open'=> '<table id="tab" class="well  table table-hover table-striped table-bordered" border=1>');
        $this->table->set_heading(array('Numéro','Nom' , 'Naissa','Telephone','Email','Pseudo', 'Lieu','Entrée','Sortie'));
        
        $query_guerite = $this->gueriteManager->liste_guerite();
        if (is_array($query_guerite) && count($query_guerite)) {
          
            foreach ($query_guerite as $loop) {
                $this->table->add_row(array($loop->numero,$loop->nom.$loop->prenom, $loop->adresse,$loop->tel
                    ,$loop->mail, $loop->login ,$loop->lieu,
                    
                    
                    '<a href="'.site_url("guerite/update/$loop->id").'" ><span class="glyphicon glyphicon-edit"></span> </a>',
                    '<a href="'.site_url("guerite/delete/$loop->id").'" ><span class="glyphicon glyphicon-trash"></span></a>'));
            }
        }

        $this->table->set_template($template);
        return $this->table->generate();

        
}  elseif($type==2) {
   $template = array('table_open'=> '<table id="tab" class="well  table table-hover table-striped table-bordered" border=1>');
        $this->table->set_heading(array('Nom' , 'Adresse','Telephone','Email','Pseudo', 'Quota'));
        
        $query_guerite = $this->gueriteManager->liste_guerite();
        if (is_array($query_guerite) && count($query_guerite)) {
          
            foreach ($query_guerite as $loop) {
                $this->table->add_row(array($loop->nom_ag, $loop->adresse_ag,$loop->tel_ag
                    ,$loop->mail_ag, $loop->login_ag ,$loop->quotas_ag));
                    
                    
            }
        }

        $this->table->set_template($template);
        return $this->table->generate(); 
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

