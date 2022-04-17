<?php

namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\API\ResponseTrait;

class Users extends ResourceController
{
    /*public function index()
    {
        $model = model(UsersModel::class);
		
		$data = [
					'users' => $model->getUsers(),
					//'title' => 'New Users',
					
		];
		
		$encode_data = json_encode($data);
		echo $encode_data;
    } */
	
		use ResponseTrait;
	 protected $format    = 'json';
	 protected $db, $builder;
	 
    // Get all news items
	public function index()
	{
    $model = model(UsersModel::class);

   return $this->respond($model->getUsers());
	
	
		
	}
	
	/* public function view($id = null)
	{
		$model = model(UsersModel::class);
		
		$data[] = $model->getUsers($id);
		
		echo view('templates/header', ['title' => 'View User Details']);
		return view('users/view', $data);
		echo view('templates/footer');
	} */
	
	public function view($id = null)
    {
        $model = model(UsersModel::class);

        $data['users'] = $model->getUsers($id);
		
		 return $this->respond($data);
		
    }
	
	
	
	//This function is used to create new users on the database 
	/* public function create()
	{
		$model = model(UsersModel::class);
		
		if($this-request->getMethod() === 'post' && $this->validate([
		
				'title' => 'required|min_length[3]|max_length[255]',
				'name'  => 'required',
				'surname'  => 'required',
				'email'  => 'required',
				'city'  => 'required',
				
		
		])) {
			$model->save([
							'title' => $this->request->getPost('title'),
							'name' => $this->request->getPost('name'),
							'surname' => $this->request->getPost('surname'),
							'email' => $this->request->getPost('email'),
							'city' => $this->request->getPost('city'),
						]);
						
						 /* $response = data('message' => 'User added successfully.'); 
						 
					
				
		}
		
		
		
	} */
	
	public function create()
    {
       
        $rules = [
            'title' => 'required',
            'name' => 'required', 
			'surname' => 'required',
			'email' => 'required', 
			'city' => 'required'


        ];
        $data = [
            'title' => $this->request->getVar('title'),
            'name' => $this->request->getVar('name'),
			'surname' => $this->request->getVar('surname'),
			'email' => $this->request->getVar('email'),
			'city' => $this->request->getVar('city')

        ];
        if(!$this->validate($rules)) return $this->fail($this->validator->getErrors());
        $model = new UsersModel();
        $model->save($data);
        $response = [
            'status' => 201,
            'error' => null,
            'message'=> [
                'success' => 'new user added'
            ]
        ];
        return $this->respondCreated($response);
    }
	
	/* public function edit ($id) {
		
		$model = new UsersModel();
		
	$data['users'] = $model->getUsers($id);
	
	 
	
	echo view('templates/header',['title' => 'Update The User' ]);
		return view('/users/update', $data);
	echo view('templates/floor');
		
	} */
	
	public function edit($id=null) {
		 
        $model = new UsersModel();
		//$model = $this->find($id);
        $data['users'] = $model->getUsers($id);
		
		
		
		return $this->respond($data);
        
		
    } 
	
	/* public function update()
	{
		
		$model = new UsersModel();
		$id = $this->request->getVar('id');
		
		$data =[
				'title' => $this->request->getPost('title'),
				'name' => $this->request->getPost('name'),
				'surname' => $this->request->getPost('surname'),
				'email' => $this->request->getPost('email'),
				'city' => $this->request->getPost('city'),
		];
		
			 $response = data('message' => 'User updated successfully.'); 
			
		$model->update($id, $data);
		return $this->response->redirect(site_url('/users'));
	} */
	
	  public function update($id = null)
	{
		
		 $model = new UsersModel();
		
        $json = $this->request->getJSON();
         
        $title = $json -> title;
        $name = $json->name;
		$surname = $json->surname;
	    $email = $json->email;
	    $city = $json->city;
        
        $data = array(
            'title' => $title,
            'name' => $name,
			'surname' => $surname,
			'email' => $email,
			'city' => $city
        );
        
        $this->model->update($id, $data);
        
        $response = array(
            'status'   => 200,
            'messages' => array(
                'success' => 'users updated successfully'
            )
        );
      
        return $this->respond($response);
		 
		
	} 
	 
			/* public function update( $id = INT )
		  {	
		  
			//$data['model'] = $model->where('id', $id)->update($id);
			
			
			
			
			$data =[
				'title' => $this->request->getPut('title'),
				'name' => $this->request->getPut('name'),
				'surname' => $this->request->getPut('surname'),
				'email' => $this->request->getPut('email'),
				'city' => $this->request->getPut('city'),
		];
		
		 	$model->update($id, $data);
			
			
			$response = array('status'   => 200, 'messages' 
						=> array('success' => 'users updated successfully'));
				  
					return $this->respond($response);
		 
		  }
			 */
	
	
	/* public function delete_users($id)
	{
		
		$model = UsersModel();
		
		$data['model'] = $model->where('id', $id)->delete($id);
		return $this->response->redirect(site_url('/users'));
		
		/* $response = data('message' => 'User deleted successfully.'); 
	} */
	
	
	/*function update($id) 
	{ 
		$id= $this->input->post('id'); 
		$data = array( 
		'title'=> $this->input->post('title'), 
		'name' => $this->input->post('name'), 
		'surname'=> $this->input->post('surname'), 
		'email' => $this->input->post('email'), 
		'city' => $this->input->post('city') ); 
		
		if($data ==null){
			
			return("No data applied");
		}
		
		$this->UserModel->update($id,$data); 
		$this->view(); 
		
		$response = array('status'   => 200, 'messages' 
						=> array('success' => 'users updated successfully'));
				  
					return $this->respond($response);
		}
		*/
	
	public function delete_users($id = null)
	{
		 $model = new UsersModel();
		
		$data['model'] = $model->where('id', $id)->delete($id);
		
		
		$response = array(
                'status'   => 200,
                'messages' => array(
                    'success' => 'User Item successfully deleted'
                )
            );
			
			 return $this->respondDeleted($response);
		
       
	}
	
		
}
