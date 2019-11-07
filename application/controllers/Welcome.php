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
		 $this->load->library('form_validation');
        $this->load->library('session');
		 $this->load->helper('form');
        $this->load->helper('html');
		
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
            if (count($userdata) !=7) {
				  $agencedata = $this->adminManager->get_admin_info(array('LOGIN_AD' => $pseudo, 'MDP_AD' => $passwords));
				   if (count($agencedata) != 3) {
                    $info = echec_connexion('Veuillez verifier vos information et réessayez');
                    $this->session->set_flashdata('info', $info);
                    $data['info'] = $info;
                    $this->load->view("template/menu_top_header");
                    $this->load->view("Index", $data);
                   $this->load->view("template/menu_footer");
                } else {
                    $this->session->set_userdata('login', $pseudo);
                    $this->session->set_userdata('id', $agencedata['id']);
                    $this->session->set_userdata('ag_user', $agencedata['nom']);
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
				$this->session->set_userdata('photo', $userdata['photo']);
                $this->userManager->connect_user($userdata['id']);
                redirect('Admin');
        } 
        } else {
		$this->load->view("template/menu_top_header");
            $this->load->view("Index", $data);
            $this->load->view("template/menu_footer");
			}
	}
	
	public function accounte( $id = ''){
		$type = $this->session->userdata('type');
        if ($type == 0 || $type == 2 || $type == 4 || $type == 3) {
            $data['menu_top'] = "template/menu_top";
            $data['main_content'] = "New_user";
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
                 $this->form_validation->set_rules('login', "Login", 'trim|required|min_length[2]|max_length[50]|encode_php_tags');
                 $this->form_validation->set_rules('password', "Password", 'trim|required|min_length[4]|max_length[50]|encode_php_tags');
				 $this->form_validation->set_rules('passwords', "Confirme Password", 'trim|required|min_length[4]|max_length[50]|matches[password]|encode_php_tags');
               
                if ($this->form_validation->run()) {
                    $isInsert = FALSE;
                    //recuperation valeur
                    $nom = $this->input->post('noms');
                    $prenom = $this->input->post('prenom');
                    $mail = $this->input->post('email');
                    $login = $this->input->post('login');
                    $password = $this->input->post('password');
                    $phone = $this->input->post('phone');
                    $idag = $this->input->post('idag');
					$userphoto = $this->input->post('userphoto');
                    $id = $this->input->post('id');
                    $mdp=md5($password); 
             if (file_exists($_FILES['userphoto']['tmp_name'])) {

                $result = NULL;              
                $photoName =  Date('Y-m-d-H-i-s');
                $photoName = str_replace('-', '', $photoName);
                $path='';
              
                $targetFile = "images/photos/";
               
                $newFileName = $userphoto. $photoName;
                 $photoNom =$userphoto . $photoName.".jpg";
                $originalFile = $_FILES['userphoto']['tmp_name'];
                if ($this->resize($originalFile, $targetFile, $newFileName, 100)) {
                    $newFileName = realpath($targetFile . $newFileName . ".jpg");
                    $newFileName = addslashes($path);
                    $photoNameUp = "userphoto='" . $path . "',";
                    $ifImage = TRUE;
                } else {
                    $newFileName = '';
                }
            }
                    $isInsert = $this->userManager->update_user($id, $nom, $prenom, $phone, $mail, $login, $mdp,$type, $active, $idag,$photoNom);
                    if ($isInsert) {
                        $info = ajout_succes_info("Mise à jour Avec success");
                        $this->session->set_flashdata('info', $info);
                        redirect('Admin');
                    } else {
                        $info = warning_info('Veuillez verifier vos information et réessayez');
                        $this->session->set_flashdata('info', $info);
                    }
                } else {
					 $info = warning_info('Modification \n n a pris en compte veuillez réessayez');
                        $this->session->set_flashdata('info', $info);
                     redirect('Admin');
                }
            } elseif ($id == "") {
				
                redirect('user');
            }

            $data['info'] ="";
           // $data['tableau'] = $this->get_tableau();
            $this->load->view('template/template', $data);
        }
		
		
	}
	
	public function rappel_mdp(){
		$data['info'] = $this->session->flashdata('info');
           $data['agence'] =  $query_agence = $this->adminManager->liste_agence(array('DELETE_AG'=>0));
        $this->load->view("template/menu_top_header");
		 $this->load->view("Vue_mdp", $data);
		  $this->load->view('template/menu_footer');
        
    }
	public function adhesion(){
		 $data['info'] = $this->session->flashdata('info');
		 $this->form_validation->set_rules('nom_user','"Entrez votre nom et prenoms"','trim|required|min_length[2]|max_length[52]|encode_php_tags');
		 $this->form_validation->set_rules('email_user','"Entrez votre email"','trim|required|valid_email|min_length[2]|max_length[52]|encode_php_tags');
		 $this->form_validation->set_rules('phone_user','"Entrez numero du telephone"','trim|required|min_length[2]|max_length[52]|encode_php_tags');
		 $this->form_validation->set_rules('agence','"Entrez le nom de votre structure"','trim|required|min_length[2]|max_length[52]|encode_php_tags');
		 $this->form_validation->set_rules('email_agence','"Entrez email de votre structure"','trim|required|valid_email|min_length[2]|max_length[52]|encode_php_tags');
		 if($this->form_validation->run()){
			 $nom_user=$this->input->post('nom_user');
			 $email_user=$this->input->post('email_user');
			 $phone_user=$this->input->post('phone_user');
			 $agence=$this->input->post('agence');
			 $email_agence=$this->input->post('email_agence');
			 $message=$this->input->post('message');
           $query_agence = $this->adminManager->liste_agence(array('DELETE_AG'=>0));
		   if($query_agence){
			   $this->session->set_flashdata('message', $email_user);
			   $this->session->set_flashdata('phone', $phone_user);
        $this->load->view("template/menu_top_header");
		 $this->load->view("Vue_adheson_envoi", $data);
		  $this->load->view('template/menu_footer');
		   }else{
				  $info = warning_info('Veuillez verifier votre email et réessayez');
				  $this->session->set_flashdata('info', $info);
				  $this->adhesion();
			 }
		 }else{
		
      $this->load->view("template/menu_top_header");
		 $this->load->view("Vue_adheson", $data);
		  $this->load->view('template/menu_footer');
       
		 }
        
    }
public function mdp_envoi(){
		 $data['info'] = $this->session->flashdata('info');
		 $this->form_validation->set_rules('email_user','"Entrez votre E-mail"','trim|required|min_length[2]|max_length[52]|encode_php_tags');
		 $this->form_validation->set_rules('email_agence','"Entrez E-mail de l\'agence"','trim|required|valid_email|min_length[2]|max_length[52]|encode_php_tags');
		 if($this->form_validation->run()){
			 $email_user=$this->input->post('email_user');
			 $email_agence=$this->input->post('email_agence');
			 $idag=$this->input->post('idag');
			  $query_user = $this->userManager->liste_user(array('DELETE_AG'=>0,'USER_MAIL'=>$email_user,'MAIL_AG'=>$email_agence,'USER_DEL'=>0,'USER_ACTIVE'=>0));
		if($query_user){
			$this->session->set_flashdata('message', $email_user);
			//$this->sendMail( $email_user,'MTSOFT.Sarl',$email_agence,'tester tester');
			 $info = ajout_succes_info("Mise à jour Avec success");
                        $this->session->set_flashdata('info', $info);
                 $this->load->view("template/menu_top_header");
		         $this->load->view("Vue_mdp_envoi", $data);
		         $this->load->view('template/menu_footer');
	    }else{
				  $info = warning_info('Veuillez verifier votre email et réessayez');
				  $this->session->set_flashdata('info', $info);
				  redirect('Welcome/rappel_mdp');
			 }
		 }else{
		
       redirect('Welcome/rappel_mdp');
       
		 }
    }
	function senMail($from,$name,$to, $texte){
$this->email->from($from, $name);
$this->email->to($to);
$this->email->subject('Test email MTSOFT.Sarl');
$this->email->message($texte);
$this->email->send();
}
	public function deconnexion(){
		$this->session->sess_destroy();
		redirect();
	}
	
	///////////////////
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
}
