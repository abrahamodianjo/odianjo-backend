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
		}