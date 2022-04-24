<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\OdianjoModel;
 
class Odianjo extends ResourceController
{
    use ResponseTrait;
    // get all users
    public function index()
    {
        $model = new OdianjoModel();
        $data = $model->findAll();
        return $this->respond($data);
    }
 
    // get single user
    public function show($id = null)
    {
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
		header("Content-type:application/json");
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
		header('Access-Control-Allow-Headers: token, Content-Type');
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
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'User Data Saved'
            ]
        ];
        return $this->respondCreated($response);
    }
 
    // update users
    public function update($id = null)
    {
		
		header("Content-type:application/json");
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
		header('Access-Control-Allow-Headers: token, Content-Type');

		$requestData = json_decode(file_get_contents('php://input'), true);
		
		if(!empty($requestData)) {

		  $title = $requestData['title'];
		  $name = $requestData['name'];
		  $surname = $requestData['surname'];
		  $email = $requestData['email'];
		  $city = $requestData['city'];
	  
        /* $model = new OdianjoModel();
        $input = $this->request->getRawInput(); */
        
		$data = array(
			'title' => $title,
            'name' => $name,
			'surname' => $surname,
			'email' => $email,
			'city' => $city
        );
		$id = $this->OdianjoModel->update($id, $data);
		$response = array(
        'status' => 'success',
        'message' => 'Product updated successfully.'
      );
       // $model->update($id, $data);
        /* $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'User Data Updated'
            ]
        ];
        return $this->respond($response);*/
		} 
		
			 else {
		  $response = array(
			'status' => 'error'
		  );
    }
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