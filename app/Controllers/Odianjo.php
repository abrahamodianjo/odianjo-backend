<?php 

namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\OdianjoModel;
 
class Odianjo extends ResourceController
{
    use ResponseTrait;
    // get all users
    public function index()
    {
		header("Access-Control-Allow-Origin: *");
        $model = new OdianjoModel();
        $data = $model->findAll();
        return $this->respond($data);
    }
 
    // get single user
    public function show($id = null)
    {
		header("Access-Control-Allow-Origin: *");
        $model = new OdianjoModel();
        $data = $model->getWhere(['id' => $id])->getResult();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('No Data Found with id '.$id);
        }
    }
 
    // create a user
    public function create()
    {	
		
		$model = new OdianjoModel();
        $data = [
			'title'=> $this->request->getVar('title'),
            'name' => $this->request->getVar('name'),
            'surname' => $this->request->getVar('surname'),
			'email'=> $this->request->getVar('email'),
			'city' => $this->request->getVar('city')
        ];
        $model->insert($data);
		
        $response = [
            
            'messages' => [
                'success' => 'User Data Saved'
            ]
        ];
        return $this->respondCreated($response);
    }
			
			// update product
    public function update($id = null)
    {
         
		$model = new OdianjoModel();
        $input = $this->request->getRawInput();
        $data = [
			'title' => $input['title'],
            'name' => $input['name'],
			'surname' => $input['surname'],
			'email' => $input['email'],
            'city' => $input['city']
			
        ];
        $model->update($id, $data);
        $response = [
            
            'messages' => [
                'success' => 'Data Updated'
            ]
        ];
        return $this->respond($response);
    }
			
			
 
    // delete users 
    public function delete_users($id = null)
    {
        $model = new OdianjoModel();
        $data = $model->find($id);
        if($data){
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'User Data Deleted'
                ]
            ];
            return $this->respondDeleted($response);
        }else{
            return $this->failNotFound('No Data Found with id '.$id);
        }
         
    }
 
}