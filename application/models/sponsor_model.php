<?php 

class sponsor_model extends CI_Model{

 function __construct(){
 
 parent::__construct();
 }
///////////////////////////////////////////////////////////////////////// 
function read()
    {
	$q=$this->db->get('sponsor');
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
function get_sponsor($id)
	{
	$this->db->where('id',$id);
    $q=$this->db->get('sponsor');
	if($q->num_rows()>0)
	{
	$row=$q->row();
	return $row;
	
	}

	
	}
//////////////////////////////////////////////////////////////////////// 

function delete($id){

	$this->db->where('id',$id);
	$this->db->delete('sponsor');

	}
//////////////////////////////////////////////////////////////////////// 
function update($id,$data){
   $this->db->where('id',$id);
   $this->db->update('sponsor',$data);

	}
//////////////////////////////////////////////////////////////////////// 
function create($data){

	$this->db->insert('sponsor',$data);
}



}


?>