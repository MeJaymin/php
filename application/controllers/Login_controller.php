<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Category_model');
	}
	public function index()
	{
		if ($this->input->post('submit'))
		{
			$data['fullname'] = $this->input->post('fullname');
			$data['email'] = $this->input->post('email');
			$data['password'] = md5($this->input->post('password'));
			$data['gender'] = $this->input->post('gender');
			$data['address'] = $this->input->post('address');
			$data['status'] = 1;
			$education = $this->input->post('education');
			$education = implode(",",$education);
			$data['education'] = $education;

			$config['upload_path']   = './assets/uploads/';
            $config['allowed_types'] = 'gif|jpg|png';

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('profile_picture'))
            {
                    echo $this->upload->display_errors();
                    //$error = array('error' => $this->upload->display_errors());
                    $this->form_validation->set_message('checkdoc', $data['error'] = $this->upload->display_errors());
                    //$this->load->view('register',$error);
            }
            else
            {
                $uploaddata = $this->upload->data();
                $data['profile_picture'] = $uploaddata['file_name'];
                $inserteddata = $this->User_model->Insert_Data($data);
                if(!empty($inserteddata))
                {
                	redirect('login');
                }
                else
                {
                	$msg = "Email id or phone number already Registered";
	                $this->session->set_flashdata('error_message', $msg);
	                redirect('register');
                }
                
            }
		}
		
		$this->load->view('register');
	}

	public function login()
	{
		if ($this->input->post('submit'))
		{
			$data['email'] = $this->input->post('email');
			$data['password'] = md5($this->input->post('password'));
			$user_exists = $this->User_model->checkData("",$data);
			if(!empty($user_exists))
			{
				$session_data = array(
                    'admin_email' => $user_exists[0]->email,
                    'Admin' => TRUE,
                    'user_id' => $result[0]->id
                );

                // Add user data in session
                $this->session->set_userdata($session_data);
                $msg = "Email id or phone number already Registered";
	            $this->session->set_flashdata('error_message', $msg);
	            redirect('dashboard');
			}
		}
		$this->load->view('login');
	}

	public function dashboard()
	{
		$data['users'] = $this->User_model->checkData();
		$this->load->view('dashboard',$data);	
	}

	public function categories()
	{
		//SELECT * FROM categories WHERE parent_id = $parent_id ORDER BY name ASC
		
		//echo '<select>'.$this->FetchCategory('','').'</select>';
		$data['categories'] = $this->FetchCategory('','');

		// die;
		// $data['category_data'] = $category_data;
		$this->load->view('categories',$data);		
	}

	public function FetchCategory($parent_id = 0,$sub_mark = ''){
		$where['parent_id'] = $parent_id;
		$order_by = "name ASC";
		$fetchcategory = $this->Category_model->FetchCategories("",$where,$order_by);
		foreach($fetchcategory as $c){
			//echo $c->id.' '.$sub_mark. $c->name.'<br>';
			echo $sub_mark.'<input type=checkbox value="'.$c->id.'" class=check />'.$c->name.'<br>';
			$this->FetchCategory($c->id,$sub_mark.'&nbsp;&nbsp;');
		}
		//return $fetchcategory;
	}

	public function edit_user($id = ""){
		if(!empty($id))
		{
			if ($this->input->post('submit'))
			{
				if(!empty($_FILES['profile_picture'])){

					$exist_image_name = $this->input->post('exist_image_name');

					

					$config['upload_path']   = './assets/uploads/';
	            	$config['allowed_types'] = 'gif|jpg|png';

		            $this->load->library('upload', $config);

		            if ( ! $this->upload->do_upload('profile_picture'))
		            {
		                    echo $this->upload->display_errors();
		                    //$error = array('error' => $this->upload->display_errors());
		                    $this->form_validation->set_message('checkdoc', $data['error'] = $this->upload->display_errors());
		                    //$this->load->view('register',$error);
		            }
		            else
		            {
		                $uploaddata = $this->upload->data();
		                $set['profile_picture'] = $uploaddata['file_name'];
		                unlink('./assets/uploads/'.$exist_image_name);
		            }
				}

				$set['fullname'] = $this->input->post('fullname');
				$set['email'] = $this->input->post('email');
				$set['password'] = md5($this->input->post('password'));
				$set['gender'] = $this->input->post('gender');
				$set['address'] = $this->input->post('address');
				$set['status'] = 1;
				$education = $this->input->post('education');
				$education = implode(",",$education);
				$set['education'] = $education;

		        $where['id'] = $id;
		        $update = $this->User_model->update($set, $where);
		        if($update){
		        	redirect('dashboard');
		        }
			}
			else
			{
				$where['id'] = $id;
				$data['editusers'] = $this->User_model->checkData("",$where);
				$this->load->view('add-user',$data);
			}
		}
	}

	public function delete_profilepicture()
	{
		$image_name = $this->input->post('image_name');
		$id = $this->input->post('id');

        unlink('./assets/uploads/'.$image_name);

		$set = array(
            'profile_picture' => "",
            'updated_at' => date("Y-m-d H:i:s")
        );
        $data['id'] = $id;
        $update = $this->User_model->update($set, $data);
        if($update)
        {
            echo 1; //success
        }
	}

	public function nindex(){
		$data = [];
	  	$parent_key = 'parent_id'; // pass any key of the parent
	  	$row = $this->db->query('SELECT id, name from categories WHERE parent_id="'.$parent_key.'"');
	  
	  if($row->num_rows() > 0)
	  {
	   $data = $this->members_tree($parent_key);
	  }
	  else
	  {
	   $data=["id"=>"0","name"=>"No Members presnt in list","text"=>"No Members is presnt in list","nodes"=>[]];
	  }
	  echo json_encode(array_values($data));
	}

	public function members_tree($parent_key)
	{
	  $row1 = [];
	  $row = $this->db->query('SELECT id, name from categories WHERE parent_id="'.$parent_key.'"')->result_array();
	  foreach($row as $key => $value)
      {
	     $id = $value['id'];
	     $row1[$key]['id'] = $value['id'];
	     $row1[$key]['name'] = $value['name'];
	     $row1[$key]['text'] = $value['name'];
	     $row1[$key]['nodes'] = array_values($this->members_tree($value['id']));
       }
        return $row1;
	}

	public function shownodes(){
		$this->load->view('nodes');
	}

	public function checkbox(){
		if($this->input->post('submit')){
			echo 'here'	;
		}
		$this->load->view('checkboxdemo');	
	}
}
