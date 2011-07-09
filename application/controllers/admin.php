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
 
        $config['base_url'] = base_url() . '/index.php/admin/list_new_candidate';
	$config['total_rows'] = $this->candidate_model->getNumCandidate();
	$config['per_page'] = 2;
	$config['uri_segment'] = 3;
	$config['first_link'] = FALSE;
        $config['last_link'] = FALSE;
        $config['next_link'] = FALSE;
        $config['prev_link'] = FALSE;
	
	$this->pagination->initialize($config);

	$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
	$data['results'] = $this->candidate_model->get_candidate($config['per_page'],$page);
	$data['links'] = $this->pagination->create_links();
           
				$this->load->view('new_candidate_list',$data);
				
	    
 
 }
 ////////// ////////// ////////// ////////// ////////// //////////
 function new_candidate_more() {
 
 if($this->uri->segment(3))
			{
			
						
			$data['row']=$this->candidate_model->get_candidate_simple($this->uri->segment(3));
			$this->load->view('new_candidate_more',$data);
			}
						
			else 
			{
			redirect('new_candidate_list');
			}

 
 }
 
////////// ////////// ////////// ////////// ////////// //////////

function update_new_candidate(){


			
			$new_statut=$this->input->post('statut');
			$id=$this->input->post('id');
			$email=$this->input->post('email');
	 		
		        $this->candidate_model->update_candidate_statut($id,$new_statut);
		        if($new_statut==2)
		          { $this->email->from('placement@pi.com', 'placement International');
					$this->email->to('khedji.ali@gmail.com');// $this->email->to($email); 
					//$this->email->cc('another@another-example.com'); 
					//$this->email->bcc('them@their-example.com'); 

					$this->email->subject('Profil Accepted');
					$this->email->message('Your profil is accepeted');	

					$this->email->send();

					echo $this->email->print_debugger();
				 }
		        else  
		        
		        {echo "refused";}
                        //redirect('admin/list_new_candidate');



}







}





?>