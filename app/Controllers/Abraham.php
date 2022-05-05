<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait; //use response trait 
use App\Models\AbrahamModel;  //use the model created 
use App\Filters\Cors; //included the CORS header 

	//created the controller and call it abraham
class Abraham extends ResourceController
{	

	protected $modelName = 'App\Models\AbrahamModel';
	protected $format    = 'json';
    use ResponseTrait;
    public function index()
    {	
	
		//cross origin headers 
		header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: X-API-KEY, Origin,X-Requested-With, Content-Type, Accept, Access-Control-Requested-Method, Authorization");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PATCH, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "OPTIONS"){
            die();
        }
		
		//calling the model
        $model = new AbrahamModel();
		// pointing the data to the model
        $data = $model->findAll();
		//the data is sent back as a JSON format
        return $this->respond($data); 
    }
		
		//this function is used to display a specific data 
    public function show($id = null)
    {	
		//first call the model 
		$model = new AbrahamModel();
		//tell the data to find a specific id 
        $data = $model->find(['id' => $id]);
		
		//if the data is empty, it should return not found 
        if(!$data) return $this->failNotFound(' not found ');
		// then return the response and display it 
        return $this->respond($data[0]);
    }
	
	//this function is used tp create a new data in the database 
    public function create($id = null)
    {
		// declare the headers
		header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: X-API-KEY, Origin,X-Requested-With, Content-Type, Accept, Access-Control-Requested-Method, Authorization");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PATCH, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "OPTIONS"){
            die();
        }
		//delcare the data that is accepted in the database server (mi-linux.wlv.auk)
		$data = [
            'name' => $this->request->getVar('name'),
            'surname' => $this->request->getVar('surname'),
            'email' => $this->request->getVar('email')

        ];
		//call the model 
        $model = new AbrahamModel();
		//tell the model to point to the data and save it in the database 
        $model->save($data);
		
		// create the response when the data has been accepted 
		// which is status 201
        $response = [
            'status' => 201,
            
            'message'=> [
                'success' => ' User added '
            ]
        ];
		
		// return the response 
        return $this->respondCreated($response);
    }

		// create a function to update the data through an ID number
    public function update($id = null)
    {
		//declare the CORS headers 
		header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: X-API-KEY, Origin,X-Requested-With, Content-Type, Accept, Access-Control-Requested-Method, Authorization");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PATCH, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "OPTIONS"){
            die();
        }
		//ddeclare $data to accept the name, surname and email in the database 
		 $data = [
            'name' => $this->request->getVar('name'),
            'surname' => $this->request->getVar('surname'),
            'email' => $this->request->getVar('email')

        ];
		
		//call the model
        $model = new AbrahamModel();
		//this is to find the specific ID from the database through the model
        $findbyid = $model->find(['id' => $id]);
		//if the number doesnt not exist then the response should return 404 not found 
        if(!$findbyid) return $this->failNotFound('not found ');
		
		//tell the model to update the data from  through the ID in the database 
        $model->update($id, $data);
		//after the data has been updated the response 
		//from the API should be (data updated)
        $response = [
            'status' => 200,
           
            'message'=> [
                'success' => 'data updated'
            ]
        ];
		// should return the response 
        return $this->respond($response);
    }

	// create a function to delete the data 
    public function delete($id = null)
    {	
		// declare the CORS headers 
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: X-API-KEY, Origin,X-Requested-With, Content-Type, Accept, Access-Control-Requested-Method, Authorization");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PATCH, PUT, DELETE");
        
		//call the database through the model 
		$model = new AbrahamModel();
		//this is to find the specific ID from the database through the model
        $findbyid = $model->find(['id' => $id]);
		//if the id number does not exsit then it should return the response not found 
        if(!$findbyid) return $this->failNotFound(' not found ');

		//tell the model to that a delete method is to take place through a ID 
        $model->delete($id);
		//once the delete method is done, a response should be sent "user deleted"
        $response = [
            'status' => 200,
          
            'message'=> [
                'success' => 'User deleted '
            ]
        ];
		//then the API should return the response that the data has been deleted or no data found
        return $this->respond($response);
    }
}
