<?php 

class admin extends CI_Controller {

 function __construct(){parent::__construct();}
 
 ////////// ////////// ////////// ////////// ////////// //////////
 function index(){

           if (!$this->tank_auth->is_logged_in()) 
             {
			redirect('/auth/login/');
		      }
		   else {
		        if(/* $this->tank_auth->get_usertype()=='sponsor' ||  */$this->tank_auth->get_usertype()=='admin' )
				 $this->load->view('dashboard');
				 else 
				redirect('/auth/login/');

				}
}
				
				////////// ////////// ////////// ////////// ////////// //////////
 
 function list_new_candidate() {
 
    $config['base_url'] = 'http://localhost:8888/PI_crm/index.php/admin/list_new_candidate';
	$config['total_rows'] = $this->sponsor_model->getNumCandidate();
	$config['per_page'] = 2;
	$config['uri_segment'] = 3;
	$config['first_link'] = FALSE;
    $config['last_link'] = FALSE;
    $config['next_link'] = FALSE;
    $config['prev_link'] = FALSE;
	
	$this->pagination->initialize($config);

	$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
	$data['results'] = $this->sponsor_model->get_candidate($config['per_page'],$page);
	$data['links'] = $this->pagination->create_links();
           
				$this->load->view('new_candidate_list',$data);
				
	   
	  /*
 }
	   else if($this->tank_auth->get_usertype()=='sponsor')
	   {
	    		$data['rows']=$this->sponsor_model->read();
				$this->load->view('simple_sponsor_list',$data);
	   }
*/
 
 
 }
 
 function new_candidate_more() {
 
 if($this->uri->segment(3))
			{
			
						
			$data['row']=$this->candidate_model->get_candidate($this->uri->segment(3));
			$this->load->view('new_candidate_more',$data);
			}
						
			else 
			{
			redirect('new_candidate_list');
			}

 
 }
 


function update_new_candidate(){


redirect('new_candidate_list');



}







}





?>