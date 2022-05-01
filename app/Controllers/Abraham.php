<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\AbrahamModel;  //use the model created 

class Abraham extends ResourceController
{
    use ResponseTrait;
    public function index()
    {
		
		
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: X-API-KEY, Origin,X-Requested-With, Content-Type, Accept, Access-Control-Requested-Method, Authorization");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PATCH, PUT, DELETE");
		//calling the model
        $model = new AbrahamModel();
		// pointing the data to the model
        $data = $model->findAll();
		//the data is sent back as a JSON format
        return $this->respond($data); 
    }

    public function show($id = null)
    {
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: X-API-KEY, Origin,X-Requested-With, Content-Type, Accept, Access-Control-Requested-Method, Authorization");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PATCH, PUT, DELETE");
        $model = new AbrahamModel();
        $data = $model->find(['id' => $id]);
        if(!$data) return $this->failNotFound(' not found ');
        return $this->respond($data[0]);
    }

    public function create($id = null)
    {
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: X-API-KEY, Origin,X-Requested-With, Content-Type, Accept, Access-Control-Requested-Method, Authorization");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PATCH, PUT, DELETE");
        $data = [
            'name' => $this->request->getVar('name'),
            'surname' => $this->request->getVar('surname'),
            'email' => $this->request->getVar('email')

        ];
        $model = new AbrahamModel();
        $model->save($data);
        $response = [
            'status' => 201,
            'error' => null,
            'message'=> [
                'success' => ' User added '
            ]
        ];
        return $this->respondCreated($response);
    }


    public function update($id = null)
    {
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: X-API-KEY, Origin,X-Requested-With, Content-Type, Accept, Access-Control-Requested-Method, Authorization");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PATCH, PUT, DELETE");
        $data = [
            'name' => $this->request->getVar('name'),
            'surname' => $this->request->getVar('surname'),
            'email' => $this->request->getVar('email')

        ];
        $model = new AbrahamModel();
        $findbyid = $model->find(['id' => $id]);
        if(!$findbyid) return $this->failNotFound('not found ');

        $model->update($id, $data);
        $response = [
            'status' => 200,
            'error' => null,
            'message'=> [
                'success' => 'data updated'
            ]
        ];
        return $this->respond($response);
    }

    public function delete($id = null)
    {
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: X-API-KEY, Origin,X-Requested-With, Content-Type, Accept, Access-Control-Requested-Method, Authorization");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PATCH, PUT, DELETE");
        $model = new AbrahamModel();
        $findbyid = $model->find(['id' => $id]);
        if(!$findbyid) return $this->failNotFound(' not found ');

        $model->delete($id);
        $response = [
            'status' => 200,
            'error' => null,
            'message'=> [
                'success' => 'User deleted '
            ]
        ];
        return $this->respond($response);
    }
}
