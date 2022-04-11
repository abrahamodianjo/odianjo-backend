<?php

namespace App\Controllers;

use App\Models\UsersModel;


class Users extends BaseController
{
    public function index()
    {
        $model = model(UsersModel::class);
		
		$data = [
					'users' => $model->getUsers(),
					'title' => 'New Users',
					
		];
		
		$encode_data = json_encode($data);
		echo $encode_data;
    }
	
	public function view($id = null)
	{
		$model = model(UsersModel::class);
		
		$data[] = $model->getUsers($id);
		
		echo view('templates/header', ['title' => 'View User Details']);
		return view('users/view', $data);
		echo view('templates/footer');
	}
	
	//This function is used to create new users on the database 
	public function create()
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
						
						 /* $response = data('message' => 'User added successfully.'); */
						 
						$data = json_encode($model);
						echo $data;
				
		}
		else {
			echo view ('templates/header', ['title'=> 'Create a new user']);
			echo view ('users/create');
			echo view ('templates/footer');
		}
		
		
	}
	
	public function edit ($id) {
		
		$model = new UsersModel();
		
	$data['users'] = $model->getUsers($id);
	
	 
	
	echo view('templates/header',['title' => 'Update The User' ]);
		return view('/users/update', $data);
	echo view('templates/floor');
		
	}
	
	public function update()
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
		
			/* $response = data('message' => 'User updated successfully.'); */
			
		$model->update($id, $data);
		return $this->response->redirect(site_url('/users'));
	}
	
	public function delete_users($id)
	{
		
		$model = UsersModel();
		
		$data['model'] = $model->where('id', $id)->delete($id);
		return $this->response->redirect(site_url('/users'));
		
		/* $response = data('message' => 'User deleted successfully.'); */
	}
	
		
}
