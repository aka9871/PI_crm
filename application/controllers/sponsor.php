<?php 

class Sponsor extends CI_Controller{

 function __construct(){parent::__construct();}
//////////////////////////////////////////////////////////////////////// 
function index(){

           if (!$this->tank_auth->is_logged_in()) 
             {
			redirect('/auth/login/');
		      }
		   else {
		        if($this->tank_auth->get_usertype()=='sponsor' || $this->tank_auth->get_usertype()=='admin' )
				 $this->load->view('sponsor');
				 else 
				redirect('/auth/login/');
				 //echo "espace reservŽ aux sponsors";
	
				
				}
				}

//////////////////////////////////////////////////////////////////////// 
function list_sponsor() {


    
    if($this->tank_auth->get_usertype()=='admin')
       {
                $data['rows']=$this->sponsor_model->read();
				$this->load->view('sponsor_list',$data);
	   
	   }
	   else if($this->tank_auth->get_usertype()=='sponsor')
	   {
	    		$data['rows']=$this->sponsor_model->read();
				$this->load->view('simple_sponsor_list',$data);
	   }
}
//////////////////////////////////////////////////////////////////////// 
function delete()
		{
		if($this->uri->segment(3))
		 {
		 $this->sponsor_model->delete($this->uri->segment(3));
		 redirect('/sponsor/list_sponsor/');
		 }
		 else 
		 {
		 redirect(site_url());
		 }
		
		}
//////////////////////////////////////////////////////////////////////// 	
function update()
		{
			if($this->uri->segment(3))
			{
			
			$this->form_validation->set_rules('nom','nom','trim|required|xss_clean');
			$this->form_validation->set_rules('prenom','prenom','trim|required|xss_clean');
			$this->form_validation->set_rules('email','email','trim|required|xss_clean');
			
			if($this->form_validation->run())
			{
			$new_data=array('nom'=>$this->input->post('nom'),'prenom'=>$this->input->post('prenom'),'email'=>$this->input->post('email'));
			$this->sponsor_model->update($this->uri->segment(3),$new_data);
			
			redirect('Sponsor');
			}
			else {
			$data['row']=$this->sponsor_model->get_sponsor($this->uri->segment(3));
			$this->load->view('update_sponsor',$data);
			}
						
			}
			else 
			{
			redirect('Sponsor');
			}

       }
//////////////////////////////////////////////////////////////////////// 


}




?>