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

function register()
	{			$use_username = $this->config->item('use_username', 'tank_auth');
			if ($use_username) {
				$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|min_length['.$this->config->item('username_min_length', 'tank_auth').']|max_length['.$this->config->item('username_max_length', 'tank_auth').']|alpha_dash');
			}
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length['.$this->config->item('password_min_length', 'tank_auth').']|max_length['.$this->config->item('password_max_length', 'tank_auth').']|alpha_dash');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean|matches[password]');

			$data['errors'] = array();
			$data['user_type'] = 'sponsor';

			$email_activation = $this->config->item('email_activation', 'tank_auth');
            // $data['user_type']='sponsor';
			if ($this->form_validation->run()) {								// validation ok
				if (!is_null($data = $this->tank_auth->create_user(
						$use_username ? $this->form_validation->set_value('username') : '',
						$this->form_validation->set_value('email'),
						$this->form_validation->set_value('password'),
						$email_activation))) {									// success

					$data['site_name'] = $this->config->item('website_name', 'tank_auth');

					if ($email_activation) {									// send "activate" email
						$data['activation_period'] = $this->config->item('email_activation_expire', 'tank_auth') / 3600;

						$this->_send_email('activate', $data['email'], $data);

						unset($data['password']); // Clear password (just for any case)

						$this->_show_message($this->lang->line('auth_message_registration_completed_1'));

					} else {
						if ($this->config->item('email_account_details', 'tank_auth')) {	// send "welcome" email

							$this->_send_email('welcome', $data['email'], $data);
						}
						unset($data['password']); // Clear password (just for any case)

						$this->_show_message($this->lang->line('auth_message_registration_completed_2').' '.anchor('/auth/login/', 'Login'));
					}
				} else {
					$errors = $this->tank_auth->get_error_message();
					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
				}
			}

			$data['use_username'] = $use_username;
			$this->load->view('register_form_sponsor', $data);
		}
	

}




?>