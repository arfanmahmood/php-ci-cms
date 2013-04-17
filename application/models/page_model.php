<?php
/* Page Model Class */
class Page_model extends CI_Model {

	/* Class Constructor */
    function __construct()
    {
        parent::__construct();
    }
	
	function loadPageModule($page)
	{
		
		$data 	= array();
		$msg 	= '';
		
		/******************************/
		/* Condition for Sign In Page */
		/******************************/
		if($page=='signin'){
		
			$data = array(
				'base_url' 	=> base_url(),
				'base_css' 	=> 'signin.css',
				'base_js' 	=> 'signin.js',
				'page_name' => 'Sign In'
				);
		
		/**************************************/
		/* Condition for Forgot Password Page */
		/**************************************/
		}else if($page=='forgot_password'){
		
			$data = array(
				'base_url' 	=> base_url(),
				'base_css' 	=> 'forgot_password.css',
				'base_js' 	=> 'forgot_password.js',
				'page_name' => 'Forgot Password'
				);
		
		/********************************/
		/* Condition for Dashboard Page */
		/********************************/
		}else if($page=='dashboard'){
			
			$data = array(
				'base_url' 	=> base_url(),
				'base_css' 	=> 'dashboard.css',
				'base_js' 	=> '',
				'page_name' => 'Dashboard'
				);
			
		/******************************/
		/* Condition for Fabrics Page */
		/******************************/
		}else if($page=='fabrics'){
			
			$this->load->library('pagination');
			
			$qry = "SELECT fabric_id FROM cms_fabrics";
			$qry_count_exec = $this->db->query($qry);
			
			$config['base_url'] = base_url().'fabrics';
			$config['total_rows'] = $qry_count_exec->num_rows();
			$config['per_page'] = 10;
			$config['num_links'] = 4;
			$config['uri_segment'] = 2;
			
			$config['full_tag_open'] = '<ul>';
			$config['full_tag_close'] = '</ul>';
			
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			
			$config['prev_link'] = 'Prev';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
						
			$config['next_link'] = 'Next';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			
			$config['first_link'] = 'First';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			
			$config['last_link'] = 'Last';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';

			$this->pagination->initialize($config); 
			
			$start = ($this->uri->segment(2)=='')?'0':$this->uri->segment(2);
			
			$qry = "SELECT fabric_id, fabric_ref, fabric_article, fabric_type, fabric_category FROM cms_fabrics LIMIT ".$start.", ".$config['per_page'];
			$qry_exec = $this->db->query($qry);
			
			$template_data = array(
							'base_url'			=> base_url(),
							'fabric_entries' 	=> $qry_exec->result_array()
			);
			
			$page_template_data = $this->parser->parse('mhtml/mfabrics', $template_data, TRUE);
			
			$data = array(
					'base_url' 			=> base_url(),
					'base_css' 			=> 'fabrics.css',
					'page_name' 		=> 'Fabrics',
					'base_js' 			=> '',
					'page_msg'			=> '',
					'paging'			=> (($this->pagination->create_links()=='')?' ':$this->pagination->create_links()),
					'page_module_data' 	=> $page_template_data
			);
			
			
		/**********************************/
		/* Condition for Add Fabrics Page */
		/**********************************/
		}else if($page=='add_fabrics'){
			
			/* Setting default message */
			$msg = $this->compileAlert("Please use this page to enter new fabrics information.", 'info');
			
			/* Checking form is submitted */
			if($this->input->post('hdnSubmit')){
				
				//die($this->input->post('inputFeatures'));
				
				/* Setting variables with form values */
				$fabric_reference			= $this->input->post('inputRefrence');
				$fabric_article				= $this->input->post('inputArticle');
				$fabric_weave				= $this->input->post('inputWeave');
				$fabric_gsm					= $this->input->post('inputGSM');
				$fabric_blend				= $this->input->post('inputBlend');
				$fabric_tensile_strength	= $this->input->post('inputTensileStrength');
				$fabric_tear_strength		= $this->input->post('inputTearStrength');
				$fabric_type				= $this->input->post('inputType');
				$fabric_category			= $this->input->post('inputCategory');
				$fabric_features			= implode(",", $this->input->post('inputFeatures'));
				$fabric_uses				= implode(",", $this->input->post('inputUses'));
				$fabric_picture				= '';
				$fabric_small_picture		= '';
				$small_image_error_message	= '';
				$large_image_error_message	= '';
				
				/* Setting image uploading settings */
				$config['upload_path'] = './resources/uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['remove_spaces'] = TRUE;
				
				/* Initializing uploading function */
				$this->upload->initialize($config);
		
				/* Loading upload library with custom settings */
				$this->load->library('upload', $config);
				
				/* Code for uploading of small fabric picture */
				if ( ! $this->upload->do_upload('inputSmallPicture')){
					
					/* Error section of small fabric picture uploading */
					$error = array('error' => $this->upload->display_errors());
					$small_image_error_message = $error['error'];
					
				}else{
					
					/* Successful section of small fabric picture uploading */
					$data = array('upload_data' => $this->upload->data());
					$fabric_small_picture = $data['upload_data']['file_name'];
		
				}
				
				/* Code for uploading of large fabric picture */
				if ( ! $this->upload->do_upload('inputLargePicture')){
					
					/* Error section of large fabric picture uploading */
					$error = array('error' => $this->upload->display_errors());
					$large_image_error_message = $error['error'];
					
				}else{
					
					/* Successful section of large fabric picture uploading */
					$data = array('upload_data' => $this->upload->data());
					$fabric_large_picture = $data['upload_data']['file_name'];
		
				}
				
				/* Condition to check if fabric pictures are uploaded successfully. */
				if($small_image_error_message=='' && $large_image_error_message==''){
				
				  /* Query to insert febric Data into DB. */
				  $ins_fabric_query = "INSERT INTO 
									   cms_fabrics (
									               fabric_ref, 
									               fabric_article, 
												   fabric_weave, 
												   fabric_grm, 
												   fabric_blend, 
												   fabric_tensile, 
												   fabric_tear, 
												   fabric_type, 
												   fabric_category, 
												   fabric_small_pic, 
												   fabric_large_pic, 
												   fabric_feature, 
												   fabric_uses
												   ) 
									   VALUES 	   (
									               '".$fabric_reference."', 
												   '".$fabric_article."', 
												   '".$fabric_weave."', 
												   '".$fabric_gsm."', 
												   '".$fabric_blend."', 
												   '".$fabric_tensile_strength."', 
												   '".$fabric_tear_strength."', 
												   '".$fabric_type."', 
												   '".$fabric_category."', 
												   '".$fabric_small_picture."', 
												   '".$fabric_large_picture."', 
												   '".$fabric_features."', 
												   '".$fabric_uses."'
												   )";
				  
				  /* Executing Fabric Query */
				  if(!$this->db->query($ins_fabric_query)){
					  
					  /* Showing message if there's an error in query */
					  $msg = $this->compileAlert('Unable to insert new fabrics. Please consult with web development team.','error');
					  
				  }else{
					  
					  /* Showing message if query executed successfully */
					  $msg = $this->compileAlert('New fabrics information has been inserted successfully.','success');
					  
				  }
				
				}else{
					
					/* Showing message if fabric pictures are not uploaded successfully. */
					$msg = $small_image_error_message.'<br />'.$large_image_error_message;
					
				}
					
			}
			
			/* Return Data Array for Add Fabric Condition */			
			$data = array(
					'base_url' 	=> base_url(),
					'base_css' 	=> 'add_fabrics.css',
					'page_name'	=> 'Add New Fabrics', 
					'base_js' 	=> 'fabric.js',
					'page_msg'	=> $msg
			
			);
			
		/***************************************/
		/* Condition for Edit Fabrics Page */
		/***************************************/
		}else if($page=='edit_fabrics'){
			
			$msg = $this->compileAlert("Please use this page to update information of existing fabric.", 'info');
			
			$fabric_id = $this->uri->segment(3);
			
			$sel_fabric_query = "SELECT *FROM cms_fabrics WHERE fabric_id=".$fabric_id;
			$exe_fabric_query = $this->db->query($sel_fabric_query);
			
			if ($exe_fabric_query->num_rows() > 0){
				
				$row 				= $exe_fabric_query->row();
				  
				$fabric_ref 		= $row->fabric_ref;
				$fabric_article 	= $row->fabric_article;
				$fabric_weave 		= $row->fabric_weave;
				$fabric_grm 		= $row->fabric_grm;
				$fabric_blend 		= $row->fabric_blend;
				$fabric_tensile 	= $row->fabric_tensile;
				$fabric_tear 		= $row->fabric_tear;
				$fabric_type 		= $row->fabric_type;
				$fabric_category 	= $row->fabric_category;
				$fabric_small_pic 	= $row->fabric_small_pic;
				$fabric_large_pic 	= $row->fabric_large_pic;
				$fabric_feature 	= $row->fabric_feature;
				$fabric_uses 		= $row->fabric_uses;
				
			}
			
			if($this->input->post('hdnSubmit')){
				
				/* Setting variables with form values */
				$fabric_ref					= $this->input->post('inputRefrence');
				$fabric_article				= $this->input->post('inputArticle');
				$fabric_weave				= $this->input->post('inputWeave');
				$fabric_grm					= $this->input->post('inputGSM');
				$fabric_blend				= $this->input->post('inputBlend');
				$fabric_tensile				= $this->input->post('inputTensileStrength');
				$fabric_tear				= $this->input->post('inputTearStrength');
				$fabric_type				= $this->input->post('inputType');
				$fabric_category			= $this->input->post('inputCategory');
				$fabric_feature 			= implode(",", $this->input->post('inputFeatures'));
				$fabric_uses				= implode(",", $this->input->post('inputUses'));
				$fabric_type				= $this->input->post('inputType');
				$fabric_category			= $this->input->post('inputCategory');
				
				$fabric_small_pic			= $this->input->post('isSmallPicture');
				$fabric_large_pic			= $this->input->post('isLargePicture');
				
				$small_image_error_message	= '';
				$large_image_error_message	= '';
				
				/* Setting image uploading settings */
				$config['upload_path'] = './resources/uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['remove_spaces'] = TRUE;
				
				/* Initializing uploading function */
				$this->upload->initialize($config);
		
				/* Loading upload library with custom settings */
				$this->load->library('upload', $config);
				
				/* Code for uploading of small fabric picture */
				if ( ! $this->upload->do_upload('inputSmallPicture')){
					
					/* Error section of small fabric picture uploading */
					$error = array('error' => $this->upload->display_errors());
					$small_image_error_message = $error['error'];
					
				}else{
					
					if($fabric_small_pic!='') unlink('./resources/uploads/'.$fabric_small_pic);
					
					/* Successful section of small fabric picture uploading */
					$data = array('upload_data' => $this->upload->data());
					$fabric_small_pic = $data['upload_data']['file_name'];
		
				}
				
				/* Code for uploading of large fabric picture */
				if ( ! $this->upload->do_upload('inputLargePicture')){
					
					/* Error section of large fabric picture uploading */
					$error = array('error' => $this->upload->display_errors());
					$large_image_error_message = $error['error'];
					
				}else{
					
					if($fabric_large_pic!='') unlink('./resources/uploads/'.$fabric_large_pic);
					
					/* Successful section of large fabric picture uploading */
					$data = array('upload_data' => $this->upload->data());
					$fabric_large_pic = $data['upload_data']['file_name'];
		
				}
				
				$upd_fabric_query = "UPDATE cms_fabrics
									 SET
											 fabric_ref='".$fabric_ref."', 
											 fabric_article='".$fabric_article."', 
											 fabric_weave='".$fabric_weave."', 
											 fabric_grm='".$fabric_grm."', 
											 fabric_blend='".$fabric_blend."', 
											 fabric_tensile='".$fabric_tensile."', 
											 fabric_tear='".$fabric_tear."', 
											 fabric_type='".$fabric_type."', 
											 fabric_category='".$fabric_category."', 
											 fabric_small_pic='".$fabric_small_pic."', 
											 fabric_large_pic='".$fabric_large_pic."', 
											 fabric_feature='".$fabric_feature."', 
											 fabric_uses='".$fabric_uses."' 
									  WHERE fabric_id = ".$fabric_id."		 
									";				
				
				if(!$this->db->query($upd_fabric_query)){
					
					$msg = $this->compileAlert('Unable to update fabrics data. Please consult with web development team.','error');
					
				}else{
					
					$msg = $this->compileAlert('Fabrics information has been updated successfully.','success');
					
				}
				
			}
			
			$data = array(
					'base_url' 			=> base_url(),
					'base_css' 			=> 'add_fabrics.css',
					'page_name'			=> 'Edit Fabrics',
					'fabric_ref' 		=> $fabric_ref,
					'fabric_article' 	=> $fabric_article,
					'fabric_weave' 		=> $fabric_weave,
					'fabric_grm' 		=> $fabric_grm,
					'fabric_blend' 		=> $fabric_blend,
					'fabric_tensile' 	=> $fabric_tensile,
					'fabric_tear' 		=> $fabric_tear,
					'fabric_type' 		=> $fabric_type,
					'fabric_category' 	=> $fabric_category,
					'fabric_small_pic' 	=> $fabric_small_pic,
					'fabric_large_pic' 	=> $fabric_large_pic,
					'fabric_feature' 	=> $fabric_feature,
					'fabric_uses' 		=> $fabric_uses,
					'base_js' 			=> 'fabric.js',
					'page_msg'			=> $msg
			);
			
			
		/********************************/
		/* Condition for Delete Fabrics */
		/********************************/
		}else if($page=='delete_fabrics'){
			
			$fabric_id = $this->uri->segment(3);
			
			$sel_fabric_query = "SELECT *FROM cms_fabrics WHERE fabric_id=".$fabric_id;
			$exe_fabric_query = $this->db->query($sel_fabric_query);
			
			if ($exe_fabric_query->num_rows() > 0){
				
				$row 				= $exe_fabric_query->row();
				  
				$fabric_small_pic 	= $row->fabric_small_pic;
				$fabric_large_pic 	= $row->fabric_large_pic;
				
				if($fabric_small_pic!='') unlink('./resources/uploads/'.$fabric_small_pic);
				if($fabric_large_pic!='') unlink('./resources/uploads/'.$fabric_large_pic);
				
			}
			
			
			if($fabric_id!=''){
				
				$del_fabric_query = "DELETE FROM cms_fabrics WHERE fabric_id=".$fabric_id;
				$del_qry_exec = $this->db->query($del_fabric_query);
				
				if(!$del_qry_exec){
					
					$msg = $this->compileAlert("Unable to delete this fabrics information. Please consult with web development team.", "error");
					
				}else{
					
					$msg = $this->compileAlert("Fabrics infromation has been deleted successfully.", "success");
					
				}
				
			}
			
			$qry = "SELECT fabric_id, fabric_ref, fabric_article, fabric_type, fabric_category FROM cms_fabrics";
			$qry_exec = $this->db->query($qry);
			
			$template_data = array(
							'base_url'			=> base_url(),
							'fabric_entries' 	=> $qry_exec->result_array()
			);
			
			$page_template_data = $this->parser->parse('mhtml/mfabrics', $template_data, TRUE);
			
			$data = array(
					'base_url' 			=> base_url(),
					'base_css' 			=> 'fabrics.css',
					'page_name'			=> 'Fabrics',
					'page_module_data' 	=> $page_template_data,
					'base_js' 			=> '',
					'page_msg'			=> $msg
			);
			
		/**********************************/
		/* Condition for Fabrics Features */
		/**********************************/
		}else if($page=='features'){
			
			$this->load->library('pagination');
			
			$qry = "SELECT feature_id FROM cms_feature";
			$qry_count_exec = $this->db->query($qry);
			
			$config['base_url'] = base_url().'features';
			$config['total_rows'] = $qry_count_exec->num_rows();
			$config['per_page'] = 10;
			$config['num_links'] = 4;
			$config['uri_segment'] = 2;
			
			$config['full_tag_open'] = '<ul>';
			$config['full_tag_close'] = '</ul>';
			
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			
			$config['prev_link'] = 'Prev';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
						
			$config['next_link'] = 'Next';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			
			$config['first_link'] = 'First';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			
			$config['last_link'] = 'Last';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';

			$this->pagination->initialize($config); 
			
			$start = ($this->uri->segment(2)=='')?'0':$this->uri->segment(2);
			
			$qry = "SELECT feature_id, feature_name FROM cms_feature LIMIT ".$start.", ".$config['per_page'];
			$qry_exec = $this->db->query($qry);
			
			$template_data = array(
							'base_url'			=> base_url(),
							'feature_entries' 	=> $qry_exec->result_array()
			);
			
			$page_template_data = $this->parser->parse('mhtml/mfeatures', $template_data, TRUE);
			
			$data = array(
					'base_url' 			=> base_url(),
					'base_css' 			=> 'features.css',
					'page_name'			=> 'Fabrics Features',
					'base_js' 			=> '',
					'paging'			=> $this->pagination->create_links(),
					'page_module_data' 	=> $page_template_data
			
			);
			
		/**************************************/
		/* Condition for Add Fabrics Features */
		/**************************************/
		}else if($page=='add_features'){
			
			$msg = $this->compileAlert("Please use this page to enter new features.", 'info');
			
			if($this->input->post('hdnSubmit')){
				
				$fabric_feature	= $this->input->post('inputFeature');
				
				$sel_fabric_query = "SELECT *FROM cms_feature WHERE feature_name='".$fabric_feature."'";
				$exe_fabric_query = $this->db->query( $sel_fabric_query );
				
				if($exe_fabric_query->num_rows()>0){
					
					$msg = $this->compileAlert('Your entered feature is already existed.','error');
					
				}else{
					
					$ins_fabric_query = "INSERT INTO cms_feature(feature_name) VALUES('".$fabric_feature."')";
					
					if(!$this->db->query($ins_fabric_query)){
						
						$msg = $this->compileAlert('Unable to insert feature. Please consult with web development team.','error');
						
					}else{
						
						$msg = $this->compileAlert('New feature has been inserted successfully.','success');
						
					}
					
				}
				
			}
			
			$data = array(
					'base_url' 	=> base_url(),
					'base_css' 	=> 'add_features.css',
					'page_name'	=> 'Add New Feature',
					'base_js' 	=> 'feature.js',
					'page_msg'	=> $msg
			);
			
		/***************************************/
		/* Condition for Edit Fabrics Features */
		/***************************************/
		}else if($page=='edit_feature'){
			
			$msg = $this->compileAlert("Please use this page to update fabrics features.", 'info');
			
			$feature_id = $this->uri->segment(3);
			
			$sel_feature_query = "SELECT *FROM cms_feature WHERE feature_id=".$feature_id;
			$exe_feature_query = $this->db->query($sel_feature_query);
			
			if ($exe_feature_query->num_rows() > 0){
				
				$row = $exe_feature_query->row();
				  
				$feature_name = $row->feature_name;
				
			}
			
			if($this->input->post('hdnSubmit')){
				
				$feature_name = $this->input->post('inputFeature');
				
				$upd_feature_query = "UPDATE cms_feature SET feature_name='".$feature_name."' WHERE feature_id=".$feature_id;
					
				if(!$this->db->query($upd_feature_query)){
					
					$msg = $this->compileAlert('Unable to update feature. Please consult with web development team.','error');
					
				}else{
					
					$msg = $this->compileAlert('Feature has been updated successfully.','success');
					
				}
				
			}
			
			$data = array(
					'base_url' 		=> base_url(),
					'base_css' 		=> 'add_features.css',
					'page_name'		=> 'Edit Feature',
					'feature_name'	=> $feature_name,
					'base_js' 		=> 'feature.js',
					'page_msg'		=> $msg
			);
			
			
		/*****************************************/
		/* Condition for Delete Fabrics Features */
		/*****************************************/
		}else if($page=='delete_features'){
			
			$feature_id = $this->uri->segment(3);
			
			if($feature_id!=''){
				
				$del_feature_query = "DELETE FROM cms_feature WHERE feature_id=".$feature_id;
				$del_qry_exec = $this->db->query($del_feature_query);
				
				if(!$del_qry_exec){
					
					$msg = $this->compileAlert("Unable to delete this feature. Please consult with web development team.", "error");
					
				}else{
					
					$msg = $this->compileAlert("Feature has been deleted successfully.", "success");
					
				}
				
			}
			
			$qry = "SELECT feature_id, feature_name FROM cms_feature";
			$qry_exec = $this->db->query($qry);
			
			$template_data = array(
							'base_url'			=> base_url(),
							'feature_entries' 	=> $qry_exec->result_array()
			);
			
			$page_template_data = $this->parser->parse('mhtml/mfeatures', $template_data, TRUE);
			
			$data = array(
					'base_url' 			=> base_url(),
					'base_css' 			=> 'features.css',
					'page_name'			=> 'Fabrics Features',
					'page_module_data' 	=> $page_template_data,
					'base_js' 			=> '',
					'page_msg'			=> $msg
			);
			
		/*****************************/
		/* Condition for Fabric Uses */
		/*****************************/
		}else if($page=='uses'){
			
			$this->load->library('pagination');
			
			$qry = "SELECT uses_id FROM cms_uses";
			$qry_count_exec = $this->db->query($qry);
			
			$config['base_url'] = base_url().'uses';
			$config['total_rows'] = $qry_count_exec->num_rows();
			$config['per_page'] = 10;
			$config['num_links'] = 4;
			$config['uri_segment'] = 2;
			
			$config['full_tag_open'] = '<ul>';
			$config['full_tag_close'] = '</ul>';
			
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			
			$config['prev_link'] = 'Prev';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
						
			$config['next_link'] = 'Next';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			
			$config['first_link'] = 'First';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			
			$config['last_link'] = 'Last';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';

			$this->pagination->initialize($config); 
			
			$start = ($this->uri->segment(2)=='')?'0':$this->uri->segment(2);
			
			$qry = "SELECT uses_id, uses_name FROM cms_uses LIMIT ".$start.", ".$config['per_page'];
			$qry_exec = $this->db->query($qry);
			
			$template_data = array(
							'base_url'			=> base_url(),
							'uses_entries' 	    => $qry_exec->result_array()
			);
			
			$page_template_data = $this->parser->parse('mhtml/muses', $template_data, TRUE);
			
			$data = array(
					'base_url' 			=> base_url(),
					'base_css' 			=> 'uses.css',
					'page_name'			=> 'Fabrics Uses',
					'base_js' 			=> '',
					'paging'			=> $this->pagination->create_links(),
					'page_module_data' 	=> $page_template_data 
			
			);

		/*********************************/
		/* Condition for Add Fabric Uses */
		/*********************************/
		}else if($page=='add_uses'){
			
			$msg = $this->compileAlert("Please use this page to enter new uses.", 'info');
			
			if($this->input->post('hdnSubmit')){
				
				$fabric_uses = $this->input->post('inputUses');
				
				$sel_fabric_query = "SELECT *FROM cms_uses WHERE uses_name='".$fabric_uses."'";
				$exe_fabric_query = $this->db->query( $sel_fabric_query );
				
				if($exe_fabric_query->num_rows()>0){
					
					$msg = $this->compileAlert('You have entered a fabrics uses that is already existed.','error');
					
				}else{
					
					$ins_fabric_query = "INSERT INTO cms_uses(uses_name) VALUES('".$fabric_uses."')";
					
					if(!$this->db->query($ins_fabric_query)){
						
						$msg = $this->compileAlert('Unable to insert fabrics uses. Please consult with web development team.','error');
						
					}else{
						
						$msg = $this->compileAlert('New fabrics uses has been inserted successfully.','success');
						
					}
					
				}
				
			}
			
			$data = array(
					'base_url' 	=> base_url(),
					'base_css' 	=> 'add_uses.css',
					'page_name'	=> 'Add New Uses',
					'base_js' 	=> 'uses.js',
					'page_msg'	=> $msg
			);

		/**********************************/
		/* Condition for Edit Fabric Uses */
		/**********************************/
		}else if($page=='edit_uses'){
			
			$msg = $this->compileAlert("Please use this page to update information of existing fabrics uses.", 'info');
			
			$uses_id = $this->uri->segment(3);
			
			$sel_uses_query = "SELECT *FROM cms_uses WHERE uses_id=".$uses_id;
			$exe_uses_query = $this->db->query($sel_uses_query);
			
			if ($exe_uses_query->num_rows() > 0){
				
				$row = $exe_uses_query->row();
				  
				$uses_name = $row->uses_name;
				
			}
			
			if($this->input->post('hdnSubmit')){
				
				$uses_name = $this->input->post('inputUses');
				
				$upd_uses_query = "UPDATE cms_uses SET uses_name='".$uses_name."' WHERE uses_id=".$uses_id;
					
				if(!$this->db->query($upd_uses_query)){
					
					$msg = $this->compileAlert('Unable to update fabrics uses. Please consult with web development team.','error');
					
				}else{
					
					$msg = $this->compileAlert('Fabrics uses has been updated successfully.','success');
					
				}
				
			}
			
			$data = array(
					'base_url' 		=> base_url(),
					'base_css' 		=> 'add_uses.css',
					'page_name'		=> 'Edit Uses',
					'uses_name'		=> $uses_name,
					'base_js' 		=> 'uses.js',
					'page_msg'		=> $msg
			);

		/************************************/
		/* Condition for Delete Fabric Uses */
		/************************************/
		}else if($page=='delete_uses'){
			
			$uses_id = $this->uri->segment(3);
			
			if($uses_id!=''){
				
				$del_uses_query = "DELETE FROM cms_uses WHERE uses_id=".$uses_id;
				$del_qry_exec = $this->db->query($del_uses_query);
				
				if(!$del_qry_exec){
					
					$msg = $this->compileAlert("Unable to delete this usage", "error");
					
				}else{
					
					$msg = $this->compileAlert("Uses has been deleted successfully", "success");
					
				}
				
			}
			
			$qry = "SELECT uses_id, uses_name FROM cms_uses";
			$qry_exec = $this->db->query($qry);
			
			$template_data = array(
							'base_url'			=> base_url(),
							'uses_entries' 	=> $qry_exec->result_array()
			);
			
			$page_template_data = $this->parser->parse('mhtml/muses', $template_data, TRUE);
			
			$data = array(
					'base_url' 			=> base_url(),
					'base_css' 			=> 'uses.css',
					'page_name'			=> 'Fabric Uses',
					'page_module_data' 	=> $page_template_data,
					'base_js' 			=> '',
					'page_msg'			=> $msg
			);

		/**********************************/
		/* Condition for User's main Page */
		/**********************************/
		}else if($page=='users'){
			
			$this->load->library('pagination');
			
			$qry = "SELECT user_id FROM cms_users";
			$qry_count_exec = $this->db->query($qry);
			
			$config['base_url'] = base_url().'users';
			$config['total_rows'] = $qry_count_exec->num_rows();
			$config['per_page'] = 10;
			$config['num_links'] = 4;
			$config['uri_segment'] = 2;
			
			$config['full_tag_open'] = '<ul>';
			$config['full_tag_close'] = '</ul>';
			
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			
			$config['prev_link'] = 'Prev';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
						
			$config['next_link'] = 'Next';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			
			$config['first_link'] = 'First';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			
			$config['last_link'] = 'Last';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';

			$this->pagination->initialize($config); 
			
			$start = ($this->uri->segment(2)=='')?'0':$this->uri->segment(2);
			
			$qry = "SELECT user_id, user_name, user_email, (case when user_status = 0 then 'in active' else 'active' end) as user_status FROM cms_users LIMIT ".$start.", ".$config['per_page'];
			$qry_exec = $this->db->query($qry);
			
			$template_data = array(
							'base_url'			=> base_url(),
							'user_entries' 		=> $qry_exec->result_array()
			);
			
			$page_template_data = $this->parser->parse('mhtml/musers', $template_data, TRUE);
			
			$data = array(
					'base_url' 			=> base_url(),
					'base_css' 			=> 'users.css',
					'page_name'			=> 'Users',
					'base_js' 			=> '',
					'paging'			=> $this->pagination->create_links(),
					'page_module_data' 	=> $page_template_data
			);

		/***********************************/
		/* Condition for Add New User Page */
		/***********************************/
		}else if($page=='add_users'){
			
			$msg = $this->compileAlert("Please use this page to enter new admin users. All fields are required.", 'info');
			
			if($this->input->post('hdnSubmit')){
				
				$user_name 	= $this->input->post('inputUserName');
				$user_pass 	= $this->input->post('inputUserPassword');
				$user_email = $this->input->post('inputUserEmail');
				$is_active 	= ($this->input->post('inputActive')=='')?'0':'1';
				
				$sel_user_query = "SELECT *FROM cms_users WHERE user_name='".$user_name."' OR user_email='".$user_email."'";
				$exe_user_query = $this->db->query( $sel_user_query );
				
				if($exe_user_query->num_rows()>0){
					
					$msg = $this->compileAlert('User name or User email already existed.','error');
					
				}else{
					
					$ins_user_query = "INSERT INTO cms_users(user_name, user_pass, user_email, user_status) VALUES('".$user_name."', '".$user_pass."', '".$user_email."', '".$is_active."')";
					
					if(!$this->db->query($ins_user_query)){
						
						$msg = $this->compileAlert('Unable to insert user. Please consult with web development team.','error');
						
					}else{
						
						$msg = $this->compileAlert('New user has been created successfully.','success');
						
					}
					
				}
				
			}
			
			$data = array(
					'base_url' 	=> base_url(),
					'base_css' 	=> 'add_users.css',
					'page_name'	=> 'Add New User',
					'base_js' 	=> 'user.js',
					'page_msg'	=> $msg
			);
			
		/********************************/
		/* Condition for Edit User Page */
		/********************************/
		}else if($page=='edit_users'){
			
			$msg = $this->compileAlert("Please use this page to update information of existing admin users. All fields are required.", 'info');
			
			$user_id = $this->uri->segment(3);
			
			$sel_user_query = "SELECT *FROM cms_users WHERE user_id=".$user_id;
			$exe_user_query = $this->db->query($sel_user_query);
			
			if ($exe_user_query->num_rows() > 0){
				
				$row = $exe_user_query->row();
				  
				$user_name 	= $row->user_name;
				$user_pass 	= $row->user_pass;
				$user_email = $row->user_email;
				$is_active 	= $row->user_status;
				
			}
			
			if($this->input->post('hdnSubmit')){
				
				$user_pass 	= $this->input->post('inputUserPassword');
				$is_active 	= ($this->input->post('inputActive')=='')?'0':'1';
				
				$upd_user_query = "UPDATE cms_users SET user_pass='".$user_pass."', user_status='".$is_active."' WHERE user_id=".$user_id;
					
				if(!$this->db->query($upd_user_query)){
					
					$msg = $this->compileAlert('Unable to update user info. Please consult with web development team.','error');
					
				}else{
					
					$msg = $this->compileAlert('User info has been updated successfully.','success');
					
				}
				
			}
			
			$data = array(
					'base_url' 		=> base_url(),
					'base_css' 		=> 'add_users.css',
					'page_name'		=> 'Add New User',
					'user_name'		=> $user_name,
					'user_pass'		=> $user_pass,
					'user_email'	=> $user_email,
					'user_status'	=> $is_active,
					'base_js' 		=> 'user.js',
					'page_msg'		=> $msg
			);
			
		/**********************************/
		/* Condition for Delete User Page */
		/**********************************/
		}else if($page=='delete_users'){
			
			$user_id = $this->uri->segment(3);
			
			if($user_id!=''){
				
				$del_user_query = "DELETE FROM cms_users WHERE user_id=".$user_id;
				$del_qry_exec = $this->db->query($del_user_query);
				
				if(!$del_qry_exec){
					
					$msg = $this->compileAlert("Unable to delete this user. Please consult with web development team.", "error");
					
				}else{
					
					$msg = $this->compileAlert("User has been deleted successfully.", "success");
					
				}
				
			}
			
			$qry = "SELECT user_id, user_name, user_email, (case when user_status = 0 then 'in active' else 'active' end) as user_status FROM cms_users";
			$qry_exec = $this->db->query($qry);
			
			$template_data = array(
							'base_url'			=> base_url(),
							'user_entries' 		=> $qry_exec->result_array()
			);
			
			$page_template_data = $this->parser->parse('mhtml/musers', $template_data, TRUE);
			
			$data = array(
					'base_url' 			=> base_url(),
					'base_css' 			=> 'users.css',
					'page_name'			=> 'Users',
					'page_module_data' 	=> $page_template_data,
					'base_js' 			=> '',
					'page_msg'			=> $msg
			);
			
			
			
		}

		return $data;
		
	}
	
	/***************************************/
	/* Function to get features checkboxes */
	/***************************************/
	function get_features_chk_boxes($isChecked=''){
		
		$checked_checkbox = explode(',', $isChecked);
		
		$features_qry = "SELECT *FROM cms_feature";
		$features_qry_exec = $this->db->query($features_qry);
		
		$chkBoxes = '';
		
		$i=1;
		
		foreach($features_qry_exec->result_array() as $row ){
			
			$chkBoxes .= '<label class="control-label">';
			
			if(in_array($row['feature_name'], $checked_checkbox))
				$chkBoxes .= '<input name="inputFeatures[]" value="'.$row['feature_name'].'" type="checkbox" checked="checked" /> '.$row['feature_name'];
			else
				$chkBoxes .= '<input name="inputFeatures[]" value="'.$row['feature_name'].'" type="checkbox" /> '.$row['feature_name'];
				
            $chkBoxes .= '</label>';
			
			if(($i%3)==0) $chkBoxes .= '<br /><br />';
			
			$i++;
			
		}
		
		return $chkBoxes;
		
	}
	
	/***************************************/
	/* Function to get uses checkboxes */
	/***************************************/
	function get_uses_chk_boxes($isChecked=''){
		
		$checked_checkbox = explode(',', $isChecked);
		
		$uses_qry = "SELECT *FROM cms_uses";
		$uses_qry_exec = $this->db->query($uses_qry);
		
		$chkBoxes = '';
		
		$i=1;
		
		foreach($uses_qry_exec->result_array() as $row ){
			
			$chkBoxes .= '<label class="control-label">';
			
			if(in_array($row['uses_name'], $checked_checkbox))
				$chkBoxes .= '<input name="inputUses[]" value="'.$row['uses_name'].'" type="checkbox" checked="checked" /> '.$row['uses_name'];
			else
				$chkBoxes .= '<input name="inputUses[]" value="'.$row['uses_name'].'" type="checkbox" /> '.$row['uses_name'];
				
            $chkBoxes .= '</label>';
			
			if(($i%3)==0) $chkBoxes .= '<br /><br />';
			
			$i++;
			
		}
		
		return $chkBoxes;
		
	}
	
	
	/**************************************/
	/* Function to compile alert messages */
	/**************************************/
	function compileAlert($message, $type){
		
		if($type=='error'){
			
			$msg = '<div class="alert alert-error"><h4>Error!</h4>'.$message.'</div>';
			
		}else if($type=='info'){
			
			$msg = '<div class="alert alert-info"><h4>Help.</h4>'.$message.'</div>';
			
		}else if($type=='success'){
			
			$msg = '<div class="alert alert-success"><h4>Congratulation!.</h4>'.$message.'</div>';
			
		}
		
		return $msg;
		
	}
	
	
}