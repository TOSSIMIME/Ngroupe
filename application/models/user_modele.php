	<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_modele extends CI_Model{
    protected  $table='user';
    protected  $facilitateur='tab_facilitateur';
	 protected  $service='tab_service';
	 protected  $tables='tab_partenaire';
    
    public function ajouter_user($noms, $prenom, 
            $phone, $email,$login,$passe,$type,$id_ag,$photoNom,$etat,$types){
        $save=date('Y-m-d H:i:s');
        $del=0;
      // Ces données seront automatiquement échappées
        $this->db->set('USER_NOM', $noms);
        $this->db->set('USER_PRENOM', $prenom);
        $this->db->set('USER_PHONE', $phone);
        $this->db->set('USER_MAIL', $email);
        $this->db->set('USER_LOGIN', $login);
         $this->db->set('USER_MDP', $passe);
          $this->db->set('USER_TYPE', $type);
		  $this->db->set('AG_USER', $id_ag);
		  $this->db->set('USER_PHOTO', $photoNom);
		  $this->db->set('USER_SAVE', $save);
			$this->db->set('USER_ACTIVE', $etat);
          $this->db->set('USER_DEL', $del); 
		  $this->db->set('USER_ADMIN', $types);

        return $this->db->insert($this->table);   
    }
    /////////////////////////////////////////partenaire
	public function ajouter_partenaire($noms, $prenom,$adresse, $email,$phone){
        $save=date('Y-m-d H:i:s');
        $del=0;
      // Ces données seront automatiquement échappées
        $this->db->set('NOM_PART', $noms);
        $this->db->set('PRENOM_PART', $prenom);
		$this->db->set('ADRESSE_PART', $adresse);
            $this->db->set('MAIL_PART', $email);
             $this->db->set('PHONE_PART', $phone);
			  $this->db->set('SAVE_PART', $save);
             $this->db->set('DELETE_PART', $del);

        return $this->db->insert($this->tables);   
    }
	///////////////// service Hadj ou Oumrah
	public function ajouter_service($service,$cout, 
            $edition, $observ,$id_ag){
        $save=date('Y-m-d H:i:s');
        $del=0;
      // Ces données seront automatiquement échappées
        $this->db->set('DESIGNATION', $service);
        $this->db->set('COUT_SERVICE', $cout);
		$this->db->set('ANNE_EDITION', $edition);
            $this->db->set('DESCRIPTION_SERVICE', $observ);
             $this->db->set('SERVICE_AG', $id_ag);
			  $this->db->set('SAVE_SERVICE', $save);
             $this->db->set('DEL_SERVICE', $del);

        return $this->db->insert($this->service);   
    }
	//////////// ajoute facilitateur
	 public function ajouter_facilite($noms, $prenom,$date_naiss,$email,
                    $phone,  $residence, $photo_facilite, $active, $id_ag){
        $save=date('Y-m-d H:i:s');
        $del=0;
      // Ces données seront automatiquement échappées
        $this->db->set('NOM_FACILITE ', $noms);
        $this->db->set('PRENOM_FACILITE', $prenom);
        $this->db->set('NAISS_FACILITE', $date_naiss);
        $this->db->set('MAIL_FACILITE', $email);
        $this->db->set('PHONE_FACILITE ', $phone);
         $this->db->set('RESID_FACILITE', $residence);
          $this->db->set('PHOTO_FACILITE', $photo_facilite);
          $this->db->set('STATUT_FACILITE', $active);
		  $this->db->set('AG_FACILITE', $id_ag);
		  $this->db->set('SAVE_FACILITE', $save);
			$this->db->set('DELETE_FACILITE', $del);
        return $this->db->insert($this->facilitateur);   
    }
	////////////////////liste facilitateur
	 public function get_facilitateur($where=array()) {
     return $this->db->select('*')
   ->from($this->facilitateur)
   ->where($where)
   ->order_by('ID_FACILITE', 'desc')
   ->get()
   ->result();
        
    }
	
	 function connect_direction($id){
    $date=date('Y-m-d H:i:s');
    $this->db->set('DIRECTION_SAVE', $date);
    $this->db->where('ID_DIRECTION', (int) $id);
    return $this->db->update($this->table_direction);    
    }
	
	public function update_direction($id,$direction, $Observation){
        $update=date('Y-m-d H:i:s');
            $this->db->set('DIRECTION', $direction);
        $this->db->set('REMARQUE', $Observation);
          
        // La condition
        $this->db->where('ID_DIRECTION', (int) $id);
        return $this->db->update($this->table_direction);
        
    }
	 /////////////////////////////////////////info plus
	public function ajouter_infos_plus($id_visite,$direction,$telephone,$observation){
       // $save=date('Y-m-d H:i:s');
        $saves = Date('Y-m-d H:i:s');
		$sd=date('i:s');
		$so=date('H');
		$som=('02');
		$som1=$so-$som.':'.date('i:s');
		$save=date('Y-m-d'.' '.$som1);
      // Ces données seront automatiquement échappées
         $this->db->set('ID_VISIT', $id_visite);
        $this->db->set('DIRECTION', $direction);
		$this->db->set('TELEPHONE', $telephone);
        $this->db->set('REMARQUES', $observation);
        $this->db->set('SORTE_VISIT', $save);
        return $this->db->insert($this->table_infos);   
    }
    function connect_user($id){
    $date=date('Y-m-d H:i:s');
    $this->db->set('USER_CONNECT', $date);
    $this->db->where('USER_ID', (int) $id);
    return $this->db->update($this->table);    
    }
    
    public function update_user($id,$nom, $prenom, 
           $phone, $mail, $login,$mdp,$type,$active, $idag,$photoNom){
        $update=date('Y-m-d H:i:s');
            $this->db->set('USER_NOM', $nom);
        $this->db->set('USER_PRENOM', $prenom);
        $this->db->set('USER_PHONE', $phone);
        $this->db->set('USER_MAIL', $mail);
        $this->db->set('USER_LOGIN', $login);
         $this->db->set('USER_MDP', $mdp);
          $this->db->set('USER_TYPE', $type);
           $this->db->set('USER_ACTIVE', $active);
           $this->db->set('AG_USER', $idag);
		   $this->db->set('USER_PHOTO', $photoNom);
            $this->db->set('USER_UPDATE', $update);
            
 
        // La condition
        $this->db->where('USER_ID', (int) $id);
        return $this->db->update($this->table);
        
    }
	public function update_service($id,$service,$cout, 
            $edition, $observ,$id_ag){
        $update=date('Y-m-d H:i:s');
            $this->db->set('DESIGNATION', $service);
        $this->db->set('COUT_SERVICE', $cout);
        $this->db->set('ANNE_EDITION', $edition);
        $this->db->set('DESCRIPTION_SERVICE', $observ);
        $this->db->set('SERVICE_AG', $id_ag);
         $this->db->set('UPDATE_SERVICE', $update);
        // La condition
        $this->db->where('ID_SERVICE', (int) $id);
        return $this->db->update($this->service);
        
    }
     public function update_partenaire($id ,$noms, $prenom, 
            $adresse, $email,$phone){
        $update=date('Y-m-d H:i:s');
        $this->db->set('NOM_PART', $noms);
        $this->db->set('PRENOM_PART', $prenom);
        $this->db->set('ADRESSE_PART', $adresse);
        $this->db->set('MAIL_PART', $email);
        $this->db->set('PHONE_PART ', $phone);
        // La condition
        $this->db->where('ID_PART', (int) $id);
        return $this->db->update($this->tables);
        
    }
    public function count($where=  array()) {
     return (int) $this->db->where($where)->count_all_results($this->table);   
    }
    public function count_service($where=  array()) {
     $this->db->where($where);
         $this->db->where('DEL_SERVICE =0');
     return (int) $this->db->count_all_results($this->service);
    }
    public function disable_user($id){
        // La condition
         $this->db->set('USER_DEL', 1);
        $this->db->where('USER_ID', (int) $id);
        return $this->db->update($this->table);   
    }
    
	public function disable_service($id){
        // La condition
         $this->db->set('DEL_SERVICE', 1);
        $this->db->where('ID_SERVICE', (int) $id);
        return $this->db->update($this->service);   
    }
    public function delete_user($id){
        return $this->db->where('USER_ID', (int) $id)->delete($this->table);
        
    }
	public function delete_partenaire($id){
        return $this->db->where('ID_PART', (int) $id)->delete($this->tables);
        
    }
    public function disable_visite($id){
        // La condition
         $this->db->set('USER_DEL', 1);
        $this->db->where('USER_ID', (int) $id);
        return $this->db->update($this->table);   
    }
    
    public function liste_user($where=  array()){
         return $this->db->select('*')
   ->from($this->table.' AS U')
   ->where($where)
  ->join('tab_agence as A','ID_AG=U.AG_USER' )
   ->order_by('USER_ID', 'asc')
   ->get()
   ->result();
        
    }
	 public function liste_facilitateur($where=  array()){
         return $this->db->select('*')
   ->from($this->facilitateur.' AS F')
   ->where($where)
  ->join('tab_agence as A','ID_AG=F.AG_FACILITE' )
   ->order_by('ID_FACILITE', 'asc')
   ->get()
   ->result();
        
    }
    public function liste_service($where=  array()){
         return $this->db->select('*')
   ->from($this->service.' AS S')
   ->where($where)
  ->join('tab_agence as A','ID_AG=S.SERVICE_AG' )
   ->order_by('ID_SERVICE', 'desc')
   ->get()
   ->result();
        
    }
    
   public function liste_partenaire($where=  array()) {
     return $this->db->select('*')
   ->from($this->tables)
   ->where($where)
   ->where('DELETE_PART=0')
   
   ->order_by('ID_PART', 'asc')
   ->get()
   ->result();
        
    }
    
     public function get_user($where=  array()) {
     return $this->db->select('*')
   ->from($this->table.' AS U')
   ->where($where)
   ->join('tab_agence as A','ID_AG=U.AG_USER' )
   ->order_by('USER_ID', 'desc')
   ->get()
   ->result();
        
    }

  function get_user_info($where=  array()) {
            $user=array();
            
    $query_user =  $this->liste_user($where);
        
    if (is_array($query_user) && count($query_user)==1) {
            foreach ($query_user as $loop) {
               $user['nom']=($loop->USER_NOM).' '.($loop->USER_PRENOM);
               $user['id']=$loop->USER_ID;
               $user['type']=$loop->USER_TYPE;
                $user['login']=$loop->USER_LOGIN; 
			   $user['agence']=$loop->NOM_AG;
			   $user['photo']=$loop->LOGO_AG;
                $user['id_ag']=$loop->ID_AG;
                
               
                
            }
             return $user;
        }  else {
            return FALSE;    
        }
        
        


        
    }
}



?>
