<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cms extends CI_Controller {
	
	/* Controller Function for SignIn Page */
	public function index()
	{
		
		$this->load->model('user_model', 'user');
		$this->load->model('page_model', 'page');
		
		$data = $this->page->loadPageModule('signin');
		
		$header = $this->load->view('header', $data, true);
		$footer = $this->load->view('footer', '', true);
		
		$msg = $this->user->verifyUser();
					
		$template = array(
						'page_header' => $header,
						'page_footer' => $footer,
						'msg' => $msg
						);
		
		$this->parser->parse('signin', $template);
		
	}
	
	/* Controller Function for forgot password Page */
	public function forgot_password()
	{
		
		$this->load->model('user_model', 'user');
		$this->load->model('page_model', 'page');
		
		$data = $this->page->loadPageModule('forgot_password');
		
		$header = $this->load->view('header', $data, true);
		$footer = $this->load->view('footer', '', true);
		
		$msg = $this->user->verifyUserEmail();
					
		$template = array(
						'page_header' => $header,
						'page_footer' => $footer,
						'msg' => $msg
						);
		
		$this->parser->parse('forgot-password', $template);
		
	}
	
	/* Controller Function for Dashboard Page */
	public function dashboard()
	{
		
		$this->load->model('user_model', 'user');
		$this->load->model('page_model', 'page');
		
		$data = $this->page->loadPageModule('dashboard');
		
		$header = $this->load->view('header', $data, true);
		$footer = $this->load->view('footer', '', true);
		
		$msg = $this->user->checkUser();
					
		$template = array(
						'page_header' => $header,
						'page_footer' => $footer,
						'base_url' => base_url(),
						'msg' => $msg
						);
		
		$this->parser->parse('dashboard', $template);
		
	}
	
	/* Controller Function for Fabrics Page */
	public function fabrics()
	{
		
		$this->load->model('user_model', 'user');
		$this->load->model('page_model', 'page');
		
		$data = $this->page->loadPageModule('fabrics');
		
		$data['page_msg'] = $this->user->checkUser();
		
		$header = $this->load->view('header', $data, true);
		$footer = $this->load->view('footer', '', true);
		
		$template = array(
						'page_header' 	=> $header,
						'page_footer' 	=> $footer,
						'base_url' 		=> base_url(),
						'page_module' 	=> $data['page_module_data'],
						'paging' 		=> $data['paging'],
						'page_msg' 		=> $data['page_msg']
						);
		
		$this->parser->parse('fabrics', $template);
		
	}

	/* Controller Function for Add Fabrics Page */
	public function add_fabrics()
	{
		
		$this->load->model('user_model', 'user');
		$this->load->model('page_model', 'page');
		
		$data['page_msg'] = $this->user->checkUser();		
		
		$data = $this->page->loadPageModule('add_fabrics');
		
		$header = $this->load->view('header', $data, true);
		$footer = $this->load->view('footer', '', true);
		
		$template = array(
						'page_header' 			=> $header,
						'page_footer' 			=> $footer,
						'base_url' 				=> base_url(),
						'features_check_box' 	=> $this->page->get_features_chk_boxes(),
						'uses_check_box' 		=> $this->page->get_uses_chk_boxes(),
						'page_msg' 				=> $data['page_msg']
						);
						
		$this->parser->parse('add-fabrics', $template);
		
	}
	
	/* Controller Function for Edit Fabric */
	public function edit_fabrics(){
		
		
		$this->load->model('user_model', 'user');
		$this->load->model('page_model', 'page');
		
		$data = $this->page->loadPageModule('edit_fabrics');
		
		$header = $this->load->view('header', $data, true);
		$footer = $this->load->view('footer', '', true);
		
		$this->user->checkUser();
					
		$template = array(
						'page_header' => $header,
						'page_footer' => $footer,
						'base_url' => base_url(),
						'features_check_box' => $this->page->get_features_chk_boxes($data['fabric_feature']),
						'uses_check_box' => $this->page->get_uses_chk_boxes($data['fabric_uses']),
						'page_msg' => $data['page_msg']
						);
		
		$this->parser->parse('edit-fabrics', $template);
		
	}
	
	/* Controller Function to Delete Fabrics */
	public function delete_fabrics(){
		
		$this->load->model('user_model', 'user');
		$this->load->model('page_model', 'page');
		
		$data = $this->page->loadPageModule('delete_fabrics');
		
		$header = $this->load->view('header', $data, true);
		$footer = $this->load->view('footer', '', true);
		
		//$data['page_msg'] = $this->user->checkUser();
		
		$template = array(
						'page_header' => $header,
						'page_footer' => $footer,
						'base_url' => base_url(),
						'page_module' => $data['page_module_data'],
						'page_msg' => $data['page_msg']
						);
						
		
		$this->parser->parse('fabrics', $template);
		
	}

	/* Controller Function for Features Page */
	public function features()
	{
		
		$this->load->model('user_model', 'user');
		$this->load->model('page_model', 'page');
		
		$data = $this->page->loadPageModule('features');
		
		$header = $this->load->view('header', $data, true);
		$footer = $this->load->view('footer', '', true);
		
		$data['page_msg'] = $this->user->checkUser();
					
		$template = array(
						'page_header' 	=> $header,
						'page_footer' 	=> $footer,
						'base_url' 		=> base_url(),
						'page_module' 	=> $data['page_module_data'],
						'paging' 		=> $data['paging'],
						'page_msg' 		=> $data['page_msg']
						);
		
		$this->parser->parse('features', $template);
		
	}

	/* Controller Function for Add New Feature Page */
	public function add_features()
	{
		
		$this->load->model('user_model', 'user');
		$this->load->model('page_model', 'page');
		
		$data = $this->page->loadPageModule('add_features');
		
		$header = $this->load->view('header', $data, true);
		$footer = $this->load->view('footer', '', true);
		
		$msg = $this->user->checkUser();
					
		$template = array(
						'page_header' => $header,
						'page_footer' => $footer,
						'base_url' => base_url(),
						'page_msg' => $data['page_msg'],
						'features_check_box' => $this->page->get_features_chk_boxes()
						);
						
		$this->parser->parse('add-feature', $template);
		
	}
	
	/* Controller Function for Edit Fabric Feature */
	public function edit_features(){
		
		
		$this->load->model('user_model', 'user');
		$this->load->model('page_model', 'page');
		
		$data = $this->page->loadPageModule('edit_feature');
		
		$header = $this->load->view('header', $data, true);
		$footer = $this->load->view('footer', '', true);
		
		$this->user->checkUser();
					
		$template = array(
						'page_header' => $header,
						'page_footer' => $footer,
						'base_url' => base_url(),
						'page_msg' => $data['page_msg']
						);
		
		$this->parser->parse('edit-feature', $template);
		
	}
	
	/* Controller Function to Delete Feature */
	public function delete_features(){
		
		$this->load->model('user_model', 'user');
		$this->load->model('page_model', 'page');
		
		$data = $this->page->loadPageModule('delete_features');
		
		$header = $this->load->view('header', $data, true);
		$footer = $this->load->view('footer', '', true);
		
		$data['page_msg'] = $this->user->checkUser();
					
		$template = array(
						'page_header' => $header,
						'page_footer' => $footer,
						'base_url' => base_url(),
						'page_module' => $data['page_module_data'],
						'page_msg' => $data['page_msg']
						);
		
		$this->parser->parse('features', $template);
		
	}
	

	/* Controller Function for Uses Page */
	public function uses()
	{
		
		$this->load->model('user_model', 'user');
		$this->load->model('page_model', 'page');
		
		$data = $this->page->loadPageModule('uses');
		
		$header = $this->load->view('header', $data, true);
		$footer = $this->load->view('footer', '', true);
		
		$data['page_msg'] = $this->user->checkUser();
					
		$template = array(
						'page_header' => $header,
						'page_footer' => $footer,
						'base_url' => base_url(),
						'page_module' => $data['page_module_data'],
						'paging' => $data['paging'],
						'page_msg' => $data['page_msg']
						);
		
		$this->parser->parse('uses', $template);
		
	}

	/* Controller Function for Add New Fabric Uses Page */
	public function add_uses()
	{
		
		$this->load->model('user_model', 'user');
		$this->load->model('page_model', 'page');
		
		$data = $this->page->loadPageModule('add_uses');
		
		$header = $this->load->view('header', $data, true);
		$footer = $this->load->view('footer', '', true);
		
		$msg = $this->user->checkUser();
					
		$template = array(
						'page_header' => $header,
						'page_footer' => $footer,
						'base_url' => base_url(),
						'page_msg' => $data['page_msg']
						);
		
		$this->parser->parse('add-uses', $template);
		
	}
	
	
	/* Controller Function for Edit Fabric Uses */
	public function edit_uses(){
		
		
		$this->load->model('user_model', 'user');
		$this->load->model('page_model', 'page');
		
		$data = $this->page->loadPageModule('edit_uses');
		
		$header = $this->load->view('header', $data, true);
		$footer = $this->load->view('footer', '', true);
		
		$this->user->checkUser();
					
		$template = array(
						'page_header' => $header,
						'page_footer' => $footer,
						'base_url' => base_url(),
						'page_msg' => $data['page_msg']
						);
		
		$this->parser->parse('edit-uses', $template);
		
	}
	
	
	/* Controller Function to Delete Uses */
	public function delete_uses(){
		
		$this->load->model('user_model', 'user');
		$this->load->model('page_model', 'page');
		
		$data = $this->page->loadPageModule('delete_uses');
		
		$header = $this->load->view('header', $data, true);
		$footer = $this->load->view('footer', '', true);
		
		$data['page_msg'] = $this->user->checkUser();
					
		$template = array(
						'page_header' => $header,
						'page_footer' => $footer,
						'base_url' => base_url(),
						'page_module' => $data['page_module_data'],
						'page_msg' => $data['page_msg']
						);
		
		$this->parser->parse('uses', $template);
		
	}

	/* Controller Function for Users Page */
	public function users()
	{
		
		$this->load->model('user_model', 'user');
		$this->load->model('page_model', 'page');
		
		$data = $this->page->loadPageModule('users');
		
		$header = $this->load->view('header', $data, true);
		$footer = $this->load->view('footer', '', true);
		
		$data['page_msg'] = $this->user->checkUser();
					
		$template = array(
						'page_header' => $header,
						'page_footer' => $footer,
						'base_url' => base_url(),
						'page_module' => $data['page_module_data'],
						'paging' => $data['paging'],
						'page_msg' => $data['page_msg']
						);
		
		$this->parser->parse('users', $template);
		
	}

	/* Controller Function for Add New Users Page */
	public function add_users()
	{
		
		$this->load->model('user_model', 'user');
		$this->load->model('page_model', 'page');
		
		$data = $this->page->loadPageModule('add_users');
		
		$header = $this->load->view('header', $data, true);
		$footer = $this->load->view('footer', '', true);
		
		$this->user->checkUser();
					
		$template = array(
						'page_header' => $header,
						'page_footer' => $footer,
						'base_url' => base_url(),
						'page_msg' => $data['page_msg']
						);
		
		$this->parser->parse('add-user', $template);
		
	}
	
	/* Controller Function for Edit User Page */
	public function edit_users(){
		
		
		$this->load->model('user_model', 'user');
		$this->load->model('page_model', 'page');
		
		$data = $this->page->loadPageModule('edit_users');
		
		$header = $this->load->view('header', $data, true);
		$footer = $this->load->view('footer', '', true);
		
		$this->user->checkUser();
					
		$template = array(
						'page_header' => $header,
						'page_footer' => $footer,
						'base_url' => base_url(),
						'page_msg' => $data['page_msg']
						);
		
		$this->parser->parse('edit-user', $template);
		
	}
	
	
	/* Controller Function to Delete User */
	public function delete_users(){
		
		$this->load->model('user_model', 'user');
		$this->load->model('page_model', 'page');
		
		$data = $this->page->loadPageModule('delete_users');
		
		$header = $this->load->view('header', $data, true);
		$footer = $this->load->view('footer', '', true);
		
		$msg = $this->user->checkUser();
					
		$template = array(
						'page_header' => $header,
						'page_footer' => $footer,
						'base_url' => base_url(),
						'page_module' => $data['page_module_data'],
						'page_msg' => $data['page_msg']
						);
		
		$this->parser->parse('users', $template);
		
	}
	
	/* Controller Function for Logout */
	public function logout()
	{
		
		$this->load->model('user_model', 'user');
		
		$this->user->logoutUser();
					
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */