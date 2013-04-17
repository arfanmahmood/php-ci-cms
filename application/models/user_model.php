<?php
/* User Model Class */
class User_model extends CI_Model {

	/* Class Constructor */
    function __construct()
    {
        parent::__construct();
    }
	
	/* Function to Verify User */
	function verifyUser(){
		
		$msg = '';
		
		if($this->input->post('hdnSubmit')){
			
			$userName = $this->input->post('userName');
			$userPass = $this->input->post('userPass');
			
			$sqlQry = "SELECT *FROM cms_users WHERE user_name='".$userName."' AND user_pass='".$userPass."'";
			$exeQry = $this->db->query( $sqlQry );
			
			if($exeQry->num_rows()>0){
			
				$newdata = array(
								   'userName'  => $userName,
								   'logged_in' => TRUE
							   );
				
				$this->session->set_userdata($newdata);
				
				redirect('/dashboard/', 'refresh');						
				
			}else{
				
				$msg = $this->compileAlert(1);
				
			}
			
			
		}else{
			
			$msg = $this->compileAlert(2);
			
		}
		
		return $msg;
		
	}

	
	/* Function to Verify User Email */
	function verifyUserEmail(){
		
		$msg = $user_name = $user_password = $user_email = '';
		
		if($this->input->post('hdnSubmit')){
			
			$userEmail = $this->input->post('userEmail');
			
			$sqlQry = "SELECT *FROM cms_users WHERE user_email='".$userEmail."'";
			$exeQry = $this->db->query( $sqlQry );
			
			if ($exeQry->num_rows() > 0){
				
				$row 			= $exeQry->row();
				$user_name 		= $row->user_name;
				$user_password 	= $row->user_pass;
				$user_email  	= $row->user_email;
				
				$form_email_address = 'admin@sapphiremills.com';
				$str_to_email = $user_email;
				$str_mail_subject = "Password recovery email from sapphiremills.com";
				
				$str_email_message = "<h2>Welcome!</h2><br />";
				$str_email_message .= "<p>Following is the username and password for your cms utility.</p><br />";
				$str_email_message .= "<p><strong>Username:</strong> ".$user_name."</p><br />";
				$str_email_message .= "<p><strong>Password:</strong> ".$user_password."</p><br /><br />";
				$str_email_message .= "<p>* It's highly recommended to change your password after signin into cms.</p><br />";
				
				$this->send_email($form_email_address='', $str_to_email='', $str_mail_subject='', $str_email_message='');
				
				$msg = $this->compileAlert(5);
				
			}else{
				
				$msg = $this->compileAlert(4);
				
			}
			
			
		}else{
			
			$msg = $this->compileAlert(3);
			
		}
		
		return $msg;
		
	}
	
	/* Function to Check User Session */
	function checkUser(){
		
		$userName = $this->session->userdata('userName');
		
		if($userName==''){
			
			redirect('/', 'refresh');
			
		}
		
	}
	
	/* Function to Logout User */
	function logoutUser(){
		
		$this->session->sess_destroy();
		redirect('/', 'refresh');
		
	}
	
	
	/* Function to Compile Alert Messages Content */
	function compileAlert($event){
		
		if($event==1){
			
			$msg = '<div class="alert alert-error"><h4>Error!</h4>Invalid Username or Password. Please enter correct information.</div>';
			
		}elseif($event==2){
			
			$msg = '<div class="alert alert-info"><h4>Welcome!</h4>Please provide your username and password to access cms.</div>';
			
		}elseif($event==3){
			
			$msg = '<div class="alert alert-info">Please provide your valid email address to reterive your password.</div>';
			
		}elseif($event==4){
			
			$msg = '<div class="alert alert-error"><h4>Error!</h4>Invalid email address. Please enter correct email address.</div>';
			
		}elseif($event==5){
			
			$msg = '<div class="alert alert-success"><h4>Success!</h4>An email with username and password has been sent on your email address.</div>';
			
		}
		
		return $msg;
		
	}
	
	/************************************************************/
	/* Main email function used to send email for all the forms */
	/************************************************************/
	function send_email($form_email_address='', $str_to_email='', $str_mail_subject='', $str_email_message=''){

		$str_mail_headers = "MIME-Version: 1.0\r\n";
		$str_mail_headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$str_mail_headers .= "X-Priority: 1\r\n";
		$str_mail_headers .= "X-MSMail-Priority: High\r\n";
		$str_mail_headers .= "X-Mailer: php\r\n";
		$str_mail_headers .= "From: ".$form_email_address." <".$form_email_address.">\r\n";
		
		if(mail($str_to_email, $str_mail_subject, $str_email_message, $str_mail_headers))
		{
		
			return true;
			
		}else{ 
		
			return false;

		} 
		
	}
	
}