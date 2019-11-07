<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vols extends CI_Controller {

    public function __construct() {
        parent::__construct();

        //chargement des ressource du constructeur
        $this->load->helper(array('url', 'assets'));
        $this->load->helper('fn_info');
        $this->load->library('form_validation');
        $this->load->library('session');
        
        //chargement modele
        $this->load->model('user_modele', 'userManager');
		$this->load->model('Vols_modele', 'volsManager');
		$this->load->model('Agence_modele', 'agenceManager');
		$this->load->model('Pelerin_modele', 'pelerinManager');
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->library('table');

    }
   

    public function index() {
         $type = $this->session->userdata('type');
      $data['agence'] = $this->agenceManager->liste_agence(array('DELETE_AG'=>0));
        //$guerite = $this->session->userdata('gue_id');

        $action = 'false';
        if ($type==2 || $type==3) {
            $data['menu_top'] = "template/menu_top";
            $data['main_content'] = "vols_liste";
            $data['tableau'] = $this->get_vols();
            $this->load->view('template/template', $data);
        }


        echo $action;
		}
 public function New_vols() {
         $type = $this->session->userdata('type');
        if ($type==1) {
        $data['menu_top']="template/menu_top";
        $data['main_content'] = "New_vols";
        $this->form_validation->set_rules('trajet', '"Trajet"', 'trim|required|min_length[4]|max_length[52]|encode_php_tags');
        $this->form_validation->set_rules( 'arriver',"Arrivée", 'trim|required|min_length[2]|max_length[50]|encode_php_tags');
        $this->form_validation->set_rules( 'nom_compagnie',"Nom de la Compagnie", 'trim|required|min_length[4]|max_length[50]|encode_php_tags');
        if ($this->form_validation->run()) {
            $isInsert = FALSE;
            //recuperation valeur
            $trajet = $this->input->post('trajet');
            $arriver = $this->input->post('arriver');
            $nom_compagnie = $this->input->post('nom_compagnie');
            $num_vol = $this->input->post('num_vol');
			$volume_vol = $this->input->post('volume_vol');
			$tel_vol = $this->input->post('tel_vol');
$isInsert = $this->agenceManager->ajouter_vols($trajet,$arriver,$nom_compagnie,$num_vol, $volume_vol,$tel_vol );

            if ($isInsert) {
                $info = ajout_succes_info("Nouveau quotas ajoutée avec success");
                $this->session->set_flashdata('info', $info);

                redirect('Agence/New_vols');
            } else {
                $info = ajout_fail_info('Veuillez verifier vos information et réessayez');
                $this->session->set_flashdata('info', $info);
            }
        }
        $data['info'] = "";
       $data['tableau'] = $this->get_vols();
        $this->load->view('template/template', $data);
    }
    }
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
	public function delete_trajet($id) {
          $type = $this->session->userdata('type');
        if ($type==1) {
        $result = $this->volsManager->delete_trajet($id);
        if ($result) {
            $info = suppression_succes_info('Element Supprimé avec Succès');
            $this->session->set_flashdata('info', $info);
        } else {
            $info = suppression_fail_info('Echec Suppression Element');
            $this->session->set_flashdata('info', $info);
        }
        redirect('Vols/Gerer_vols');
    }}
	////////////////////////gerer vols
	public function Gerer_vols() {
         $type = $this->session->userdata('type');
		 $info = mise_ajour_fail_info('Veuillez verifier vos information et réessayez');
		 $data['info'] = $this->session->flashdata('info');
          $this->session->set_flashdata('info', $info);
        if ($type==1) {
			 $data['vols']=$this->volsManager->liste_vols(array('DELETE_VOLS'=>0));
        $data['menu_top']="template/menu_top";
        $data['main_content'] = "Gerer_vols";
        $this->form_validation->set_rules('id_vols', '"Choix "', 'trim|required|min_length[1]|max_length[52]|encode_php_tags');
        $this->form_validation->set_rules( 'etat',"Trajet", 'trim|required|min_length[1]|max_length[50]|encode_php_tags');
        $this->form_validation->set_rules( 'date_trajet',"Date", 'trim|required|min_length[4]|max_length[50]|encode_php_tags');
        if ($this->form_validation->run()) {
            $isInsert = FALSE;
            //recuperation valeur
            $id_vols = $this->input->post('id_vols');
            $etat = $this->input->post('etat');
            $date_trajet = $this->input->post('date_trajet');
            
$isInsert = $this->volsManager->ajouter_trajet($id_vols,$etat,$date_trajet );

            if ($isInsert) {
                $info = ajout_succes_info("Nouveau quotas ajoutée avec success");
                $this->session->set_flashdata('info', $info);

                redirect('Vols/Gerer_vols');
            } else {
                $info = ajout_fail_info('Veuillez verifier vos information et réessayez');
                $this->session->set_flashdata('info', $info);
            }
        }

        $data['info'] = "";
       $data['tableau'] = $this->get_trajet();
        $this->load->view('template/template', $data);
    }
    }
	//////gerer trajet
	public function Gerer_trajet() {
         $type = $this->session->userdata('type');
		 $info = mise_ajour_fail_info('Veuillez verifier vos information et réessayez');
		 $data['info'] = $this->session->flashdata('info');
          $this->session->set_flashdata('info', $info);
        if ($type==1 || $type==2 || $type==3) {
			 $data['vols']=$this->volsManager->liste_vols(array('DELETE_VOLS'=>0));
        $data['menu_top']="template/menu_top";
        $data['main_content'] = "Gerer_vols";
        $this->form_validation->set_rules('id_vols', '"Choix "', 'trim|required|min_length[1]|max_length[52]|encode_php_tags');
        $this->form_validation->set_rules( 'etat',"Trajet", 'trim|required|min_length[1]|max_length[50]|encode_php_tags');
        $this->form_validation->set_rules( 'date_trajet',"Date", 'trim|required|min_length[4]|max_length[50]|encode_php_tags');
        if ($this->form_validation->run()) {
            $isInsert = FALSE;
            //recuperation valeur
            $id_vols = $this->input->post('id_vols');
            $etat = $this->input->post('etat');
            $date_trajet = $this->input->post('date_trajet');
            
$isInsert = $this->volsManager->ajouter_trajet($id_vols,$etat,$date_trajet );

            if ($isInsert) {
                $info = ajout_succes_info("Nouveau quotas ajoutée avec success");
                $this->session->set_flashdata('info', $info);

                redirect('Vols/Gerer_vols');
            } else {
                $info = ajout_fail_info('Veuillez verifier vos information et réessayez');
                $this->session->set_flashdata('info', $info);
            }
        }

        $data['info'] = "";
       $data['tableau'] = $this->get_trajet();
        $this->load->view('template/template', $data);
    }
    }
	/////lister les trajets
function get_trajet() {
    $type = $this->session->userdata('type');
        if ($type==1 || $type==2) {  
$template = array('table_open'=> '<table id="tab" class="  table table-hover table-striped table-bordered" border=1>' );
        $this->table->set_heading(array('Trajet de: ','Arrivée à:', "Compagnie" ,'Numero vol','Date vols','Type trajet',array('data'=>'ACTIONS', 'colspan'=>2 )));
        
        $query_vols = $this->volsManager->liste_trajet(array('DELETE_TRAJET'=>0));
        if (is_array($query_vols) && count($query_vols)) {
         
          
            foreach ($query_vols as $loop) {
				 if($loop->TYPE_TRAJET==0){
					 $type="Aller";
		  }else{
			  $type="Retour";
		  }
                $this->table->add_row(array($loop->VILLE_TRAJET,$loop->TRAJET_VOLS, $loop->COMPAGNIE_VOLS,$loop->NUMERO_VOLS,$loop->DATE_TRAJET,$type,
					'<a href="'.site_url("Vols/update_trajet/$loop->ID_TRAJET").'" ><span class="glyphicon glyphicon-edit"></span> </a>',
                    '<a href="'.site_url("Vols/delete_trajet/$loop->ID_TRAJET").'"><span class="glyphicon glyphicon-trash"></span></a>'));
            }
        }

        $this->table->set_template($template);
        return $this->table->generate();
}}
    public function update_vols($id = '') {
          $type = $this->session->userdata('type');
        if ($type==1) {
        $data['menu_top']="template/menu_top";
        $data['main_content'] = "edit_vols";


        if ($id != '' && $id > 0) {
            $query = $this->volsManager->liste_vols(array('ID_VOLS' => $id,'DELETE_VOLS'=>0));
            if ($query) {
                $data['edit_vols'] = $query;
            }
        } elseif ($this->input->post('id')) {
            $id = $this->input->post('id');
       $this->form_validation->set_rules('trajet', '"Trajet"', 'trim|required|min_length[4]|max_length[52]|encode_php_tags');
        $this->form_validation->set_rules( 'arriver',"Arrivée", 'trim|required|min_length[2]|max_length[50]|encode_php_tags');
        $this->form_validation->set_rules( 'nom_compagnie',"Nom de la Compagnie", 'trim|required|min_length[4]|max_length[50]|encode_php_tags');
            if ($this->form_validation->run()) {
                $isInsert = FALSE;
                //recuperation valeur
          $trajet = $this->input->post('trajet');
            $arriver = $this->input->post('arriver');
            $nom_compagnie = $this->input->post('nom_compagnie');
            $num_vol = $this->input->post('num_vol');
			$volume_vol = $this->input->post('volume_vol');
			$tel_vol = $this->input->post('tel_vol');
                  $isInsert = $this->volsManager->update_vols($id ,$trajet,$arriver,$nom_compagnie,$num_vol, $volume_vol,$tel_vol);
                if ($isInsert) {
                    $info = ajout_succes_info("Mise à jour Ajouté");
                    $this->session->set_flashdata('info', $info);

                    redirect('Vols/New_vols');
                   }else{
                    $info = ajout_fail_info('Veuillez verifier vos information et réessayez');
                    $this->session->set_flashdata('info', $info);
                         }
            } else {
                $this->update($id);
            }
        } elseif ($id == "") {
            redirect('Vols/New_vols');
        }

        $data['info'] = "";
        $data['tableau'] = $this->get_vols();
        $this->load->view('template/template', $data);
    }}
////////update trajet
 function update_trajet($id = '') {
          $type = $this->session->userdata('type');
        if ($type==1) {
        $data['menu_top']="template/menu_top";
        $data['main_content'] = "edit_trajet";


        if ($id != '' && $id > 0) {
            $query = $this->volsManager->liste_vols(array('ID_VOLS' => $id,'DELETE_VOLS'=>0));
			 $data['vols']=$this->volsManager->liste_trajet(array('DELETE_TRAJET'=>0));
            if ($query) {
                $data['edit_vols'] = $query;
            }
        } elseif ($this->input->post('id')) {
            $id = $this->input->post('id');
       $this->form_validation->set_rules('trajet', '"Trajet"', 'trim|required|min_length[4]|max_length[52]|encode_php_tags');
        $this->form_validation->set_rules( 'arriver',"Arrivée", 'trim|required|min_length[2]|max_length[50]|encode_php_tags');
        $this->form_validation->set_rules( 'nom_compagnie',"Nom de la Compagnie", 'trim|required|min_length[4]|max_length[50]|encode_php_tags');
            if ($this->form_validation->run()) {
                $isInsert = FALSE;
                //recuperation valeur
          $trajet = $this->input->post('trajet');
            $arriver = $this->input->post('arriver');
            $nom_compagnie = $this->input->post('nom_compagnie');
            $num_vol = $this->input->post('num_vol');
			$volume_vol = $this->input->post('volume_vol');
			$tel_vol = $this->input->post('tel_vol');
                  $isInsert = $this->volsManager->update_vols($id ,$trajet,$arriver,$nom_compagnie,$num_vol, $volume_vol,$tel_vol);
                if ($isInsert) {
                    $info = ajout_succes_info("Mise à jour Ajouté");
                    $this->session->set_flashdata('info', $info);

                    redirect('Vols/New_vols');
                   }else{
                    $info = ajout_fail_info('Veuillez verifier vos information et réessayez');
                    $this->session->set_flashdata('info', $info);
                         }
            } else {
                $this->update($id);
            }
        } elseif ($id == "") {
            redirect('Vols/New_vols');
        }

        $data['info'] = "";
        $data['tableau'] = $this->get_trajet();
        $this->load->view('template/template', $data);
    }}
    public function liste($id = '') {
        $data['info'] = $this->session->flashdata('info');
        $data['menu_top'] = "template/menu_top";
        $data['main_content'] = "Liste_pelerin";
        $data['tableau'] = $this->get_vols();
        $this->load->view('template/template', $data);
    }
function get_vols() {
    $type = $this->session->userdata('type');
        if ($type==1) {  
$template = array('table_open'=> '<table id="tab" class="  table table-hover table-striped table-bordered" border=1>' );
        $this->table->set_heading(array('Trajet de: ','Arrivée à:', "Compagnie" ,'Numero vol','Volume vol','Contact',array('data'=>'ACTIONS', 'colspan'=>3 )));
        
        $query_vols = $this->volsManager->liste_vols(array('DELETE_VOLS'=>0));
        if (is_array($query_vols) && count($query_vols)) {
            $droit="faible";
          
            foreach ($query_vols as $loop) {
                $this->table->add_row(array($loop->TRAJET_VOLS,$loop->ARRIVER_VOLS, $loop->COMPAGNIE_VOLS,$loop->NUMERO_VOLS,$loop->VOLUME_VOLS,$loop->PHONE_VOLS ,
                    '<a href="'.site_url("Vols/gerer_vols/$loop->ID_VOLS").'" ><span class="glyphicon glyphicon-edit"></span> </a>',
					'<a href="'.site_url("Vols/update_vols/$loop->ID_VOLS").'" ><span class="glyphicon glyphicon-edit"></span> </a>',
                    '<a href="'.site_url("Vols/delete_vols/$loop->ID_VOLS").'"><span class="glyphicon glyphicon-trash"></span></a>'));
            }
        }

        $this->table->set_template($template);
        return $this->table->generate();
}else{
$template = array('table_open'=> '<table id="tab" class="  table table-hover table-striped table-bordered" border=1>' );
        $this->table->set_heading(array('Trajet de: ','Arrivée à:', "Compagnie" ,'Numero vol','Volume vol','Contact'));
        
        $query_vols = $this->volsManager->liste_vols(array('DELETE_VOLS'=>0));
        if (is_array($query_vols) && count($query_vols)) {
            $droit="faible";
          
            foreach ($query_vols as $loop) {
                $this->table->add_row(array($loop->TRAJET_VOLS,$loop->ARRIVER_VOLS, $loop->COMPAGNIE_VOLS,$loop->NUMERO_VOLS,$loop->VOLUME_VOLS,$loop->PHONE_VOLS));
            }
        }

        $this->table->set_template($template);
        return $this->table->generate();	
}}
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

