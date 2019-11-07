<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_modele extends CI_Model{
    protected  $table='tab_admin';
    
    
    public function ajouter_administrateur($nom_admin, $prenom_admin, 
            $mail_admin, $login,$mdp_admin,$droit){
      // Ces données seront automatiquement échappées
        $this->db->set('nom_admin', $nom_admin);
        $this->db->set('prenom_admin', $prenom_admin);
        $this->db->set('mail_admin', $mail_admin);
        $this->db->set('login', $login);
         $this->db->set('mdp_admin', $mdp_admin);
          $this->db->set('droit', $droit);

        return $this->db->insert($this->table);   
    }
    public function update_administrateur($id,$nom_admin, $prenom_admin, 
            $mail_admin, $login,$mdp_admin,$droit){
            $this->db->set('nom_admin', $nom_admin);
            $this->db->set('prenom_admin', $prenom_admin);
            $this->db->set('mail_admin', $mail_admin);
            $this->db->set('login', $login);
            $this->db->set('mdp_admin', $mdp_admin);
            $this->db->set('droit', $droit);
        // La condition
        $this->db->where('id_admin', (int) $id);
        return $this->db->update($this->table);
        
    }
    
    public function count_admin($where=  array()) {
     return (int) $this->db->where($where)->count_all_results($this->table);   
    }
    public function delete_administrateur($id){
        return $this->db->where('id_admin', (int) $id)->delete($this->table);
        
    }
   
    
    public function liste_administrateur($where=  array()){
         return $this->db->select('*')
   ->from($this->table)
   ->where($where)
   ->order_by('id_admin', 'asc')
   ->get()
   ->result();
        
    }
    
     public function get_administrateur($where=  array()) {
     return $this->db->select('*')
   ->from($this->table)
   ->where($where)
   ->order_by('id_admin', 'desc')
   ->get()
   ->result();
        
    }

  function get_AdminByPseudo($where=  array()) {
            $user=array();
    $query_user =  $this->liste_administrateur($where);
        
    if (is_array($query_user) && count($query_user)==1) {
            foreach ($query_user as $loop) {
               $user['nom']=($loop->nom_admin).' '.($loop->prenom_admin);
               $user['id']=$loop->id_admin;
               $user['type']=0;
                $user['login']=$loop->login;
               
                
            }
             return $user;
        }  else {
            return FALSE;    
        }
        
        


        
    }
}



?>
