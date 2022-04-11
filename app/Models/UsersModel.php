<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
		{
			protected $table = 'users';
			protected $primaryKey = 'id';
			protected $Key = 'name';
			protected $useAutoIncreament = true;
			
			protected $allowedFields = ['id','title', 'name', 'surname' 'email', 'city'];
			
			
			public function getUsers(4id = false)
			{
				if ($id === false){
					return $this->findAll();
				}
				
				return $this->where(['id' => $id]) ->first();
			}
			
			public function getForEdit($id)
			{
				return $this->insert($table,$data);
			}
			
			public function add_users($title, $name, $surname, $email, $city)
			{
				$data = array(
				'title' => $title,
				'name'=>$name,
				'surname'=>$surname,
				'email'=>$email,
				'city'=>$city
				);
				return $this->find($id);
			}
			
		}