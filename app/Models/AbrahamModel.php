<?php

namespace App\Models;

use CodeIgniter\Model;
//create the model class and called it AbrahamModel
class AbrahamModel extends Model
{
    protected $DBGroup          = 'default';
	//calling the name of the table in the database 
    protected $table            = 'odianjodata'; 
	//the primary key is the ID 
    protected $primaryKey       = 'id'; 
	//stating that hte auto increment is true 
    protected $useAutoIncrement = true; 
    protected $insertID         = 0;
	//the model should return the data in the database as an array 
    protected $returnType       = 'array';
	//use soft delete should be false 
    protected $useSoftDeletes   = false;
	//state that the protected fields be true 
    protected $protectFields    = true;
	//the allowed fields in the database 
    protected $allowedFields    = ['name','surname','email']; 

}