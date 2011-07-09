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

return $this->db->count_all('candidate');


}  
////////////////////////////////////////////////////////////////////////  


function get_candidate($limit,$start)
{
    $this->db->limit($limit,$start);
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
    
 
	







}
?>