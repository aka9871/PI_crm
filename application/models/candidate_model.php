<?php 

class candidate_model extends CI_Model {


function __construct(){ parent::__construct();}

///////////////////////////////////////////////////////////////////////// 

function read()
    {
	$q=$this->db->get('candidate');
	if($q->num_rows()>0)
	 {
	  foreach($q->result() as $row)
	  {
	  $data[]=$row;
	  }
	  
	 return($data);
	 }
    }
////////////////////////////////////////////////////////////////////////  
function getNumCandidate(){
    $statut='new';
    $this->db->where('statut',$statut);
    $q=$this->db->get('candidate');

return $q->num_rows();


}  
////////////////////////////////////////////////////////////////////////  

function get_candidate_simple($id)
{
   $this->db->where('id',$id);
    $q=$this->db->get('candidate');
	if($q->num_rows()>0)
	{
	$row=$q->row();
	return $row;
	
	}
}
//////////////////////////////////////////////////////////////////////// 
function get_candidate($limit,$start)

{   
   $statut='new';
    $this->db->limit($limit,$start);
   $this->db->where('statut',$statut);
    $query = $this->db->get('candidate');
    
    if($query->num_rows()>0)
    {
        foreach ($query->result() as $row)
        {
            $data[] = $row;
        }
 
        return $data;
    }
    else
    {
        return FALSE;
    }
}
    
    //////////////////////////////////////////////////////////////////////// 
  function update_candidate_statut($id,$new_statut)
  {
  
  $this->db->where('id', $id);
  $this->db->set('statut', $new_statut);
  $this->db->update('candidate');

  
  
    
  }
	







}
?>