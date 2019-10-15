<?php

namespace App\Models;

use CodeIgniter\Model;

class PackagesModel extends Model {

	protected $table = 'packages';
	protected $primaryKey = 'packages_id';
	protected $useTimestamps = true;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $allowedFields = ['packages_content'];

}
