<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Usuario;

class UsuarioModel extends Model
{
    protected $primaryKey = "id";
    protected $table = "usuario";
    protected $returnType = Usuario::class;
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'nome_completo',
        'usuario',
        'senha',
        'perfil_acesso_id'
    ];

    protected $useTimestamps = false;
    protected $createdField = 'data_criacao';
    protected $updatedField = 'data_modificacao';
}