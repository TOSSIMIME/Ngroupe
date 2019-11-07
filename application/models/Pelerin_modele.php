<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pelerin_modele extends CI_Model{
    protected  $table='tab_pelerin';
	protected  $tables='tab_quotas';
	protected  $vols='tab_vols';
	protected  $paie='tab_payement';
    
    
    public function ajouter_pelerin($txt_passport, $txt_nom, 
            $txt_prenom, $txt_naiss,$txt_sexe,$txt_nation,$txt_delivre,$txt_expir,$vols,$locals,$txt_phone,$txt_besoin,$txt_photo,$id_ag,$lire_pelerin){
        $del=0;
        $save=date('Y-m-d H:i:s');
      // Ces données seront automatiquement échappées
        $this->db->set('PASSEPORT', $txt_passport);
        $this->db->set('NOM_PELERIN', $txt_nom);
        $this->db->set('PRENOM_PELERIN', $txt_prenom);
        $this->db->set('NAISS_PELERIN', $txt_naiss);
        $this->db->set('SEXE_PELERIN', $txt_sexe);
        $this->db->set('NATIONALITE', $txt_nation);
         $this->db->set('DATE_DELIV', $txt_delivre);
          $this->db->set('DATE_EXPIR', $txt_expir);
          $this->db->set('VOL_PELERIN', $vols);
           $this->db->set('LOCALITE_PELERIN', $locals);
           $this->db->set('PHONE_PELERIN', $txt_phone);
           $this->db->set('BESOIN_PELERIN', $txt_besoin);
           $this->db->set('PHOTO_PELERIN', $txt_photo);
           $this->db->set('AG_PELERIN', $id_ag);
           $this->db->set('LIRE_PELERIN', $lire_pelerin);
           $this->db->set('SAVE_PELERIN', $save);
           $this->db->set('DEL_PELERIN', $del);
        return $this->db->insert($this->table);   
    }
	 public function ajouter_quotas($quotas,$anne_quotas,$motif_quotas, $description ){
        $del=0;
        $save=date('Y-m-d H:i:s');
      // Ces données seront automatiquement échappées
        $this->db->set('QUOTAS ', $quotas);
        $this->db->set('ANNE_QUOTA', $anne_quotas);
        $this->db->set('MOTIF_QUOTA ', $motif_quotas);
        $this->db->set('DESCRIPTION', $description);
		$this->db->set('SAVE_QUOTA', $save);
           $this->db->set('DELETE_QUOTA ', $del);
        return $this->db->insert($this->tables);   
    }
	 public function ajouter_vols($trajet,$arriver,$nom_compagnie,$num_vol, $volume_vol,$tel_vol){
        $del=0;
        $save=date('Y-m-d H:i:s');
      // Ces données seront automatiquement échappées
        $this->db->set('TRAJET_VOLS  ', $trajet);
        $this->db->set('ARRIVER_VOLS', $arriver);
        $this->db->set('COMPAGNIE_VOLS', $nom_compagnie);
        $this->db->set('NUMERO_VOLS', $num_vol);
		$this->db->set('VOLUME_VOLS', $volume_vol);
           $this->db->set('PHONE_VOLS ', $tel_vol);
		   $this->db->set('SAVE_VOLS', $save);
           $this->db->set('DELETE_VOLS', $del);
        return $this->db->insert($this->vols);   
    }
    public function count_agence($where=  array()) {
     return (int) $this->db->where($where)->count_all_results($this->table);   
    }
    

    public function disable_pelerin($id){
        // La condition
         $this->db->set('DEL_PELERIN', 1);
        $this->db->where('ID_PELERIN', (int) $id);
        return $this->db->update($this->table);   
    }
    
    
    public function update_pelerin($id,$txt_passport, $txt_nom, 
            $txt_prenom, $txt_naiss,$txt_sexe,$txt_nation,$txt_delivre,$txt_expir,$vols,$locals,$txt_phone,$txt_besoin,$txt_photo,$id_ag,$lire_pelerin){
                    $update=date('Y-m-d H:i:s');
      // Ces données seront automatiquement échappées
         $this->db->set('PASSEPORT', $txt_passport);
        $this->db->set('NOM_PELERIN', $txt_nom);
        $this->db->set('PRENOM_PELERIN', $txt_prenom);
        $this->db->set('NAISS_PELERIN', $txt_naiss);
        $this->db->set('SEXE_PELERIN', $txt_sexe);
        $this->db->set('NATIONALITE', $txt_nation);
         $this->db->set('DATE_DELIV', $txt_delivre);
          $this->db->set('DATE_EXPIR', $txt_expir);
          $this->db->set('VOL_PELERIN', $vols);
           $this->db->set('LOCALITE_PELERIN', $locals);
           $this->db->set('PHONE_PELERIN', $txt_phone);
           $this->db->set('BESOIN_PELERIN', $txt_besoin);
           $this->db->set('PHOTO_PELERIN', $txt_photo);
           $this->db->set('AG_PELERIN', $id_ag);
           $this->db->set('LIRE_PELERIN', $lire_pelerin);
           $this->db->set('UPDATE_PELERIN', $update);
        // La condition
        $this->db->where('ID_PELERIN', (int) $id);
        return $this->db->update($this->table);
        
    }
	
	
	 public function update_quotas($id,$quotas,$anne_quotas,$motif_quotas, $description){
                    $update=date('Y-m-d H:i:s');
      // Ces données seront automatiquement échappées
        $this->db->set('QUOTAS', $quotas);
        $this->db->set('ANNE_QUOTA', $anne_quotas);
        $this->db->set('MOTIF_QUOTA', $motif_quotas);
        $this->db->set('DESCRIPTION', $description);
          $this->db->set('UPDATE_QUOTA ', $update);
        // La condition
        $this->db->where('ID_QUOTA', (int) $id);
        return $this->db->update($this->tables);
        
    }
    public function delete_agence($id){
        return $this->db->where('ID_AG', (int) $id)->delete($this->table);
        
    }
   
    
    public function liste_pelerin($where=  array()){
         return $this->db->select('*')
   ->from($this->table)
   ->where($where)
      ->join('tab_AGENCE as A','A.ID_AG=AG_PELERIN' )
      ->join('tab_service as S','S.ID_SERVICE=VOL_PELERIN' )
      ->join('tab_facilitateur as F','F.ID_FACILITE=BESOIN_PELERIN' )
      ->join('user as U','U.USER_ID=ID_AGENT' )
   ->order_by('ID_PELERIN', 'desc')
                 
   ->get()
   ->result();
        
    }
	
    public function liste_quotas($where=  array()){
         return $this->db->select('*')
   ->from($this->tables)
   ->where($where)
   ->order_by('ID_QUOTA', 'desc')
                 
   ->get()
   ->result();
        
    }
 public function liste_vols($where=  array()){
         return $this->db->select('*')
   ->from($this->vols)
   ->where($where)
   ->order_by('ID_VOLS', 'desc')
                 
   ->get()
   ->result();
        
    }
    
     public function get_pelerin($where=  array()) {
     return $this->db->select('*')
   ->from($this->table)
   ->where($where)
   ->where('DEL_PELERIN=0')
   ->order_by('ID_PELERIN', 'desc')
   ->get()
   ->result();
        
    } 
	public function simple_detail($id) {
		$this->db->where('PAY_ID',$id);
	 $this->db->join('tab_pelerin as P','P.ID_PELERIN=PAY_PELERIN');
	 $this->db->join('tab_service as S','S.ID_SERVICE=VOL_PELERIN');
	 $this->db->join('user as U','U.USER_ID=P.ID_AGENT');
	 $this->db->join('user as PS','PS.USER_ID=PAY_IDUSER');
      
		$data=$this->db->get($this->paie);
		$output='<table width="100%" cellspacing="0" cellpadding="4" border="1">';
		foreach($data->result() as $row){
		          $output.='<tr >
				  <td height="5%" width="30%"> ID INSCRIT:<strong> OV00'.$row->ID_PELERIN.'</strong></td>
				  <td  width="30%"> NOM: <strong>'.$row->NOM_PELERIN.'</strong></td>
				  </tr>
				  <tr >
				  <td height="5%" width="40%">Date inscription:<strong>'.$row->SAVE_PELERIN.'</strong></td>
				 <td  width="30%">PRENOMS: <strong>'.$row->PRENOM_PELERIN.'</strong></td>
				  </tr></table>';
		
			$output.='<table width="100%" cellspacing="0" cellpadding="0" border="1">
			<tr>
			<th height="5%" align="center" >ID versement</th>
			<th align="center" >Type versement</th>
			<th align="center" >Motif</th>
			<th align="center" >Date versement</th>
			<th align="center" >Montant du versement</th>
			</tr>
			<tr>
			<td align="center" width="20%" height="5%">000'.$row->PAY_ID.'</td>
			<td align="center" width="20%">'.$row->PAY_TYPE.'</td>
			<td align="center" width="20%">'.$row->DESIGNATION.'</td>
			<td align="center" width="40%">'.$row->PAY_SAVE.'</td>
			<td align="center" width="30%">'.$row->PAY_MONTANT.' CFA</td>
			
			</tr>
			<tr>
			<td colspan="5" align="center">
			<p><strong>Montant payé  : &nbsp;&nbsp;&nbsp;&nbsp;'.$row->PAY_MONTANT.' Total verse :&nbsp;&nbsp;&nbsp;&nbsp; '.$row->PAY_MONTANT.' FCFA  Reste a paye :&nbsp;&nbsp;&nbsp;&nbsp;'.$row->PAY_MONTANT.'&nbsp;&nbsp;FCFA</strong></p>
            <p><strong>La somme en lettre  : &nbsp;..........................................................................................................................&nbsp;&nbsp;FCFA</strong></p>			
			</td>
			<tr colspan="4" border="2%">
			<td height="5%" width="50%"align="center" >Agent Comptoir</td>
			<td align="center" width="30%">Benefiaire_ou_S/C</td>
			<td align="center" width="50%">Imprime et Remise le</td>
			<td align="center" ></td>
			<td align="center" width="50%">La caisse</td>
			<tr>
			<td align="center" width="20%" height="5%">'.$row->USER_NOM.'-'.$row->USER_PRENOM.'</td>
			<td align="center" width="20%">'.$row->PAY_AUTRE.'</td>
			<td align="center" width="20%">'.date('Y-m-d H:i:s').'</td>
			<td align="center" width="20%">'.''.'</td>
			<td align="center" width="40%">'.$row->USER_NOM.'-'.$row->USER_PRENOM.'</td>
			
			
			</tr>
			</tr>
			</tr>';
		}
		$output.='<tr>
		   <td colspan="5" > &nbsp;&nbsp;Merci de bien vouloir verifier le montant de vos versement sur le reçu devant notre caisier(e)
		   <br> &nbsp;&nbsp;Orginal pour client<br>
		   ...........................................................................
		   ...............................................................
		   ........................................</td>
		   </tr>';
		   $output.='</table>';
		   
     return $output;
        
    }
     public function count_pelerin($where=  array()) {
     $this->db->where($where);
         $this->db->where('DEL_PELERIN =0');
     return (int) $this->db->count_all_results($this->table);
    }
	 public function count_quota($where=  array()) {
		 // $an=date('Y');
    return $this->db->select('QUOTAS')
	          ->form($this->tables)
			  ->where($where)
             // ->where('DELETE_QUOTA =0 and ANNE_QUOTA',$an)
              ->get()
             ->result();
    }
	//////////somme ou quota
     public function get_sum($where=  array()) {
     $query= $this->db->select_sum('QUOTA_AG ','nb')
   ->from($this->table)
   ->where($where)
   ->where('del_ag=0')
   ->get()
   ->result()          
  ;
     $quota=null;
      foreach ($query as $loop) { 
     $quota=$loop->nb;
     
     }
     return $quota;
      }
     function connect_agence($id){
    $date=date('Y-m-d H:i:s');
    $this->db->set('CONNECT_AG', $date);
    $this->db->where('ID_AG', (int) $id);
    return $this->db->update($this->table);    
    }
function get_pelerin_info($where=  array()) {
            $pelerin=array();
    $query_pelerin = $this->liste_pelerin($where);   
    if (is_array($query_pelerin) && count($query_pelerin)==1) {
            foreach ($query_pelerin as $loop) {
               $pelerin['etat_pelerin']=$loop->DEL_PELERIN;
               $pelerin['id_pelerin']=$loop->ID_PELERIN;
                $pelerin['number']=$loop->PASSEPORT;
                return $pelerin;
                
            }
        }  else {
            return FALSE;    
        }
        
        


        
    }
    
     

}



?>
