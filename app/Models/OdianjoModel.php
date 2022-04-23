<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class OdianjoModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
	protected $Key = 'name';
    protected $allowedFields = ['title','name','surname','email','city'];
}