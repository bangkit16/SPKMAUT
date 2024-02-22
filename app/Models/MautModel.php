<?php

namespace App\Models;

use CodeIgniter\Model;

class MautModel extends Model
{
    protected $table      = 'maut';
    protected $primaryKey = 'ID';

    protected $returnType     = 'array';

    protected $allowedFields = ['Alternatif', 'C1', 'C2', 'C3'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
