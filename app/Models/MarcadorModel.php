<?php

namespace App\Models;
use CodeIgniter\Model;
use App\Entities\Marcador;

class MarcadorModel extends Model
{
    protected $primaryKey = "id";
    protected $table = "marcador";
    protected $returnType = Marcador::class;
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'nome'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'data_criacao';
}