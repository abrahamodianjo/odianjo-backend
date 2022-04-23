<?php 

	namespace App\Controllers;
	
	use Codeigniter\RESTful\ResourceController;
	
		class Odianjo ResourceController {
			
			protected $ModelName = 'App\Models\OdianjoModel';
			protected $format = 'josn';
			
			public function index (){
				$posts = $this->model->findAll();
				return $this->respond($posts);
			}
			
			public function create (){
				helper(['form']);
				
				$rules = [
					'title' => 'required|min_length[6]',
					'name' => 'required',
					'surname' => 'required',
					'email' => 'reuqired',
					'city' => 'required'
					
				];
				
					if(!$this->validate($rules)) {
					return $this->fail($this->validator->getErrors());
					} 
					else 
						{
							$data = [
								'post_title' => $this->request->getVar('title')
						];
					}
				
			}
		}